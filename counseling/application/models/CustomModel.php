<?php
/**
 * Created by PhpStorm.
 * User: codingoliver
 * Date: 3/21/2018
 * Time: 2:18 PM
 */

class CustomModel extends CI_Model
{
    public function isUserExist($index_no, $password, $type)
    {
        $res = 0;
        $query = $this->db->get_where('user',
            array(
                'id' => $index_no,
                'password' => $password,
                'type' => $type,
                'status' => 'active'
            )
        );

        foreach ($query->result() as $val) {
            $res = $val->u_id;
        }

        return $res;
    }

    // update user image
    public function updateUserImage($user_id, $image)
    {
        $data = array(
            'image' => $image
        );
        $this->db->where('u_id', $user_id);

        return $this->db->update('user', $data);
    }

    // update user password
    public function updateUserPassword($user_id, $password)
    {
        $data = array(
            'password' => $password
        );
        $this->db->where('u_id', $user_id);

        return $this->db->update('user', $data);
    }

    // update user detail
    public function updateUserDetail($user_id, $password, $image)
    {
        $data = array(
            'password' => $password,
            'image' => $image
        );
        $this->db->where('u_id', $user_id);

        return $this->db->update('user', $data);
    }

    public function getUserDetails($user_id)
    {
        $this->db->select('firstname, lastname, image, email, phone');
        $query = $this->db->get_where('user', array('u_id' => $user_id) );

        return $query->result();
    }

    public function getReply($a_m_id)
    {
        $this->db->select('reply');
        $query = $this->db->get_where('reply', array('a_m_id' => $a_m_id) );

        foreach ($query->result() as $val) {
            return $val->reply;
        }
    }

    public function getAnonymousMsgCounselor($counselor_u_id)
    {
        $this->db->select('a_m_id, message, message AS reply');
        $query = $this->db->get_where('anonymous_message', array('counselor_u_id' => $counselor_u_id) );

        $result = $query->result();

        foreach ($result as $key => $value) {
            $result[$key]->reply = $this->getReplyStatus($value->a_m_id);
        }

        return $result;
    }

    public function getAnonymousMsg($student_u_id)
    {
        $this->db->select('a_m_id, message');
        $query = $this->db->get_where('anonymous_message', array('student_u_id' => $student_u_id) );

        $res = array();
        $res['data']= $query->result();
        $res['num_rows'] = $query->num_rows();

        // get replies
        $data = array();
        foreach ($res['data'] as $val) {
            array_push($data, $this->getReply($val->a_m_id) );
        }

        $res['replies'] = $data;
        return $res;
    }

    public function getReplyStatus($a_m_id)
    {
        $query = " SELECT reply FROM reply WHERE 
                   a_m_id = $a_m_id ORDER BY r_id DESC 
                   LIMIT 1
                   ";

        $query = $this->db->query($query);

        foreach ($query->result() as $val) {
            return $val->reply;
        }
        return 'Not replied';
    }

    public function getRescheduledDate($a_id)
    {
        $query = " SELECT date FROM rescheduled_appointment WHERE 
                   a_id = $a_id ORDER BY r_a_id DESC 
                   LIMIT 1
                   ";

        $query = $this->db->query($query);

        foreach ($query->result() as $val) {
            return $val->date;
        }
        return 0;
    }

    public function getRescheduledTime($a_id)
    {
        $query = " SELECT time FROM rescheduled_appointment WHERE 
                   a_id = $a_id ORDER BY r_a_id DESC 
                   LIMIT 1
                   ";

        $query = $this->db->query($query);

        foreach ($query->result() as $val) {
            return $val->time;
        }
        return 0;
    }


    public function getCounselors($specialty)
    {
        $query = " SELECT u_id, 
					   (SELECT firstname FROM user WHERE counseling_specialty.u_id = user.u_id ) AS firstname,
					   (SELECT lastname FROM user WHERE counseling_specialty.u_id = user.u_id ) AS lastname
					   FROM counseling_specialty 
					   WHERE 
					   specialty = '$specialty'
					    ";
        $query = $this->db->query($query);

        return $query->result();
    }

    public function bookAppointment($u_id, $counselor_id, $date, $time, $reason)
    {
        $data = array(
            'student_u_id' => $u_id,
            'counselor_u_id' => $counselor_id,
            'reason' => $reason,
            'date' => $date,
            'time' => $time
        );

        return $this->db->insert('appointment', $data);
    }

    public function leaveTrail($u_id, $trail, $speciality)
    {
        $data = array(
            'u_id' => $u_id,
            'trail' => $trail,
            'speciality' => $speciality
        );

        return $this->db->insert('activity_trail', $data);
    }

    public function insertAnonymousMessage($student_u_id, $counselor_u_id, $message)
    {
        $data = array(
            'message'=>  $message,
            'counselor_u_id' => $counselor_u_id,
            'student_u_id' => $student_u_id
        );

        return $this->db->insert('anonymous_message', $data);
    }

    public function addSpeciality($user_id, $specialty)
    {
        $data = array(
            'u_id'=>  $user_id,
            'specialty' => $specialty
        );

        return $this->db->insert('counseling_specialty', $data);
    }

    public function insertLog($u_id, $type)
    {
        $data = array(
            'u_id'=>  $u_id,
            'type' => $type
        );

        return $this->db->insert('log', $data);
    }

    public function insertReply($a_m_id, $message_id)
    {
        $data = array(
            'a_m_id'=>  $a_m_id,
            'reply' => $message_id
        );

        return $this->db->insert('reply', $data);
    }


    public function getAppointments($counselor_id, $status)
    {
        $res = array();

        $query = " SELECT a_id, 
                        student_u_id, 
					   (SELECT image FROM user WHERE user.u_id = appointment.student_u_id) AS image,
					   (SELECT firstname FROM user WHERE user.u_id = appointment.student_u_id) AS firstname,
					   (SELECT lastname FROM user WHERE user.u_id = appointment.student_u_id) AS lastname,
					   (SELECT programme FROM user WHERE user.u_id = appointment.student_u_id) AS programme,
					   date, 
					   time,
					   status
					   FROM appointment 
					   WHERE
					   counselor_u_id = $counselor_id
					   AND  
					   status = '$status' 
					   ORDER BY date, time ";


        $query = $this->db->query($query);

        $res['num_rows'] = $query->num_rows();
        $res['data'] = $query->result();

        return $res;
    }

    public function getAppointmentsCanceled($status)
    {
        $res = array();

        $query = " SELECT a_id, 
                        student_u_id, 
					   (SELECT image FROM user WHERE user.u_id = appointment.student_u_id) AS image,
					   (SELECT firstname FROM user WHERE user.u_id = appointment.student_u_id) AS firstname,
					   (SELECT lastname FROM user WHERE user.u_id = appointment.student_u_id) AS lastname,
					   (SELECT programme FROM user WHERE user.u_id = appointment.student_u_id) AS programme,
					   date, 
					   time,
					   status
					   FROM appointment 
					   WHERE 
					   status = '$status'
					   ORDER BY date, time ";

        $query = $this->db->query($query);
        $result = $query->result();

        foreach ($result as $key => $value) {
            $d = $this->getRescheduledDate($value->a_id);
            $t = $this->getRescheduledTime($value->a_id);
            if($d != 0) {
                $result[$key]->date = $d;
            }
            if($t != 0) {
                $result[$key]->time = $t;
            }
        }

        $res['num_rows'] = $query->num_rows();
        $res['data'] = $query->result();

        return $res;
    }

    public function getBookedAppointments($userId)
    {
        $res = array();

        $query = " SELECT a_id, 
                        counselor_u_id, 
					   (SELECT image FROM user WHERE user.u_id = appointment.counselor_u_id) AS image,
					   (SELECT firstname FROM user WHERE user.u_id = appointment.counselor_u_id) AS firstname,
					   (SELECT lastname FROM user WHERE user.u_id = appointment.counselor_u_id) AS lastname,
					   date, 
					   time
					   FROM appointment 
					   WHERE
					   student_u_id = $userId 
					   AND 
					   (status = 'accepted' OR status = 'reschedule_accepted')
					   ORDER BY date, time";

        $query = $this->db->query($query);
        $result = $query->result();

        foreach ($result as $key => $value) {
            $d = $this->getRescheduledDate($value->a_id);
            $t = $this->getRescheduledTime($value->a_id);
            if($d != 0) {
                $result[$key]->date = $d;
            }
            if($t != 0) {
                $result[$key]->time = $t;
            }
        }

        $res['num_rows'] = $query->num_rows();
        $res['data'] = $query->result();

        return $res;
    }

    public function getAppointmentsStudents($userId, $status)
    {
        $res = array();

        $query = " SELECT a_id, 
                        counselor_u_id, 
					   (SELECT image FROM user WHERE user.u_id = appointment.counselor_u_id) AS image,
					   (SELECT firstname FROM user WHERE user.u_id = appointment.counselor_u_id) AS firstname,
					   (SELECT lastname FROM user WHERE user.u_id = appointment.counselor_u_id) AS lastname,
					   date, 
					   time
					   FROM appointment 
					   WHERE
					   student_u_id = $userId 
					   AND 
					  status = '$status' 
					   ORDER BY date, time";

        $query = $this->db->query($query);
        $result = $query->result();

        foreach ($result as $key => $value) {
            $d = $this->getRescheduledDate($value->a_id);
            $t = $this->getRescheduledTime($value->a_id);
            if($d != 0) {
                $result[$key]->date = $d;
            }
            if($t != 0) {
                $result[$key]->time = $t;
            }
        }

        $res['num_rows'] = $query->num_rows();
        $res['data'] = $query->result();

        return $res;
    }

    public function getAcceptedAndRescheduledAppointments($u_id)
    {
        $res = array();

        $query = " SELECT a_id, 
                        student_u_id, 
					   (SELECT image FROM user WHERE user.u_id = appointment.student_u_id) AS image,
					   (SELECT firstname FROM user WHERE user.u_id = appointment.student_u_id) AS firstname,
					   (SELECT lastname FROM user WHERE user.u_id = appointment.student_u_id) AS lastname,
					   (SELECT programme FROM user WHERE user.u_id = appointment.student_u_id) AS programme,
					    date,
					    time,
					   status
					   FROM appointment 
					   WHERE counselor_u_id = $u_id 
					   AND (status = 'accepted' OR status = 'reschedule_accepted') 
					   ORDER BY date, time ";

        $query = $this->db->query($query);
        $result = $query->result();

        foreach ($result as $key => $value) {
            $d = $this->getRescheduledDate($value->a_id);
            $t = $this->getRescheduledTime($value->a_id);
            if($d != 0) {
                $result[$key]->date = $d;
            }
            if($t != 0) {
                $result[$key]->time = $t;
            }
        }

        $res['num_rows'] = $query->num_rows();
        $res['data'] = $query->result();

        return $res;
    }

    public function updateAppointment($a_id, $status)
    {
        $data = array(
            'status' => $status
        );
        $this->db->where('a_id', $a_id);

        return $this->db->update('appointment', $data);
    }

    public function rescheduleAppointment($a_id, $date, $time)
    {
        $data = array(
            'a_id' => $a_id,
            'date' => $date,
            'time' => $time
        );

        return $this->db->insert('rescheduled_appointment', $data);
    }

    public function getCounselorsProfile()
    {
        $this->db->select('u_id, firstname, lastname, image');
        $query = $this->db->get_where('user', array('type' => 'counselor') );

        return $query->result();
    }
    public function getAdminsProfile()
    {
        $this->db->select('u_id, firstname, lastname, image');
        $query = $this->db->get_where('user', array('type' => 'admin') );

        return $query->result();
    }


    public function getStudentsProfile($counselor_u_id)
    {

        $table_name = $this->getMessageTableName($counselor_u_id);

        $query = " SELECT DISTINCT student_u_id as u_id,
                   (SELECT firstname FROM user WHERE user.u_id = student_u_id) as firstname ,
                   (SELECT lastname FROM user WHERE user.u_id = student_u_id) as lastname,
                   (SELECT image FROM user WHERE user.u_id = student_u_id) as image
                   FROM
                   $table_name
                  ";
        $query = $this->db->query($query);

        return $query->result();
    }

    public function checkUser($index_no)
    {
        $query = $this->db->get_where('user',
            array(
                'id' => $index_no
            )
        );

        return count($query->result_array()) > 0;
    }

    public function isSpecialityExist($user_id, $specialty)
    {
        $query = $this->db->get_where('counseling_specialty',
            array(
                'u_id' => $user_id,
                'specialty' => $specialty
            )
        );

        return count($query->result_array()) > 0;
    }

    public function signUpUser($index_no, $password, $firsname, $lastname, $email, $phone, $gender, $programme, $type)
    {
        $res = array();

        $data = array(
            'id' => $index_no,
            'password' => $password,
            'firstname' => $firsname,
            'lastname' => $lastname,
            'email' => $email,
            'phone' => $phone,
            'gender' => $gender,
            'programme' => $programme,
            'type' => $type
        );

        $res['status'] = $this->db->insert('user', $data);
        $res['u_id'] = $this->isUserExist($index_no, $password, $type);

        return $res;
    }

    public function getAllUsers($type)
    {
        $this->db->select('*');
        $query = $this->db->get_where(
            'user',
            array(
                'type' => $type,
                'status' => 'active'
            )
        );

        return $query->result();
    }

    public function getSpecialities($user_id)
    {
        $this->db->select('*');
        $query = $this->db->get_where(
            'counseling_specialty',
            array(
               'u_id' => $user_id
            )
        );

        return $query->result();
    }

    public function getUserLog()
    {
        $query = "  SELECT u_id,
                    (SELECT firstname FROM user WHERE user.u_id = log.u_id) AS firstname, 
                    (SELECT lastname FROM user WHERE user.u_id = log.u_id) AS lastname,
                    (SELECT type FROM user WHERE user.u_id = log.u_id) AS status,
                    datetime,
                    type
                    FROM log
                ";
        $query = $this->db->query($query);
        return $query->result();
    }

    public function getActivityTrail()
    {
        $query = "  SELECT 
                    a_t_id,
                    u_id,
                    (SELECT image FROM user WHERE user.u_id = activity_trail.u_id) AS image, 
                    (SELECT firstname FROM user WHERE user.u_id = activity_trail.u_id) AS firstname,
                    (SELECT lastname FROM user WHERE user.u_id = activity_trail.u_id) AS lastname,
                    trail
                    FROM activity_trail 
                    ORDER BY a_t_id DESC 
                ";
        $query = $this->db->query($query);
        return $query->result();
    }

    public function getActivityGraphData()
    {
        $query = "SELECT speciality,
                  count(speciality) AS count
                  FROM activity_trail
                  WHERE speciality != 'not specified'
                  GROUP BY speciality;
                 ";
        $query = $this->db->query($query);
        return $query->result();
    }

    public function removeUser($u_id)
    {
        $data = array(
            'status' => 'removed'
        );
        $this->db->where('u_id', $u_id);

        return $this->db->update('user', $data);
    }

    public function removeSpeciality($speciality_id)
    {
        $this->db->where('c_s_id', $speciality_id);
        return $this->db->delete('counseling_specialty');
    }

    public function getRandStr($len)
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $chars_len = strlen($chars);
        $randString = '';
        for($i = 0; $i < $chars_len; $i++) {
            $randString .= $chars[rand(0, $chars_len-1)];
        }

        return $randString;
    }


    public function setUpMessagesUsersTable($u_id, $tablename)
    {
        $data = array(
            'u_id' => $u_id,
            'table_name' => $tablename,
        );

        return $this->db->insert('messages_user', $data);
    }

    public function createMessageTable($message_table_name)
    {

        $fields = array(
            'm_id' => array(
                'type' => 'INT',
                'auto_increment' => TRUE
            ),
            'student_u_id' => array(
                'type' => 'INT'
            ),
            'counselor_u_id' => array(
                'type' => 'INT'
            ),
            'message' => array(
                'type' =>'TEXT'
            ),
            'type' => array(
                'type' =>'TEXT'
            ),
            'datetime' => array(
                'type' => 'datetime	',
                'default' => date("Y-m-d")
            ),
        );

        $this->load->dbforge();
        $this->dbforge->add_key('m_id', TRUE);
        $this->dbforge->add_field($fields);
        $this->dbforge->create_table($message_table_name, TRUE);
    }

    public function setUpMessageTable($u_id)
    {
        $tablename = $this->getRandStr(77);
        $res = $this->setUpMessagesUsersTable($u_id, $tablename);

        if($res) {
                $this->createMessageTable($tablename);

                return true;
        }
    }


    public function insertMessage($student_u_id, $counselor_u_id ,$message, $tablename, $type)
    {
        $res = array();
        $data = array(
            'student_u_id' => $student_u_id,
            'counselor_u_id' =>$counselor_u_id,
            'message' => $message,
            'type' => $type,
            'datetime' => date("Y-m-d H:i:s")
        );

        $res['success'] = $this->db->insert($tablename, $data);

        if($type == 'counselor') {
            $table_name = $this->getMessageTableName($counselor_u_id);
            $res['chat_limit'] = $this->getChatLimit($student_u_id, $table_name);
        } else{

            $table_name = $this->getMessageTableName($counselor_u_id);
            $res['chat_limit'] = $this->getChatLimit($student_u_id, $table_name);
        }

        return $res;
    }

    public function getMessageTableName($u_id)
    {
        $this->db->select('table_name');
        $query = $this->db->get_where('messages_user', array('u_id' => $u_id) );

        foreach ($query->result() as $val) {
            return $val->table_name;
        }
    }

    public function getChatLimit($student_u_id, $tablename)
    {
        $this->db->select('m_id');
        $this->db->order_by('m_id', 'DESC');
        $query = $this->db->get_where($tablename, array('student_u_id' => $student_u_id) );

        foreach ($query->result() as $val) {
            return $val->m_id;
        }
    }

    public function getAllMessages($student_u_id, $counselor_u_id)
    {
        $res = array();
        $table_name = $this->getMessageTableName($counselor_u_id);

        $query = " SELECT  $table_name.student_u_id, 
                          $table_name.counselor_u_id, 
					   (SELECT image FROM user WHERE $table_name.counselor_u_id = user.u_id ) AS image,
					   message,
					   datetime,
					   type
					   FROM $table_name
					   WHERE $table_name.student_u_id = $student_u_id 
					   ORDER BY datetime";
        $query = $this->db->query($query);

        $res['data'] = $query->result();
        $res['chat_limit'] = $this->getChatLimit($student_u_id, $table_name);

        return $res;
    }

    public function getMessagesAsynch($student_u_id, $counselor_u_id, $chat_limit)
    {
        $res = array();
        $table_name = $this->getMessageTableName($counselor_u_id);

        $query = " SELECT  $table_name.student_u_id, 
                          $table_name.counselor_u_id, 
					   (SELECT image FROM user WHERE $table_name.student_u_id = user.u_id ) AS image,
					   message,
					   datetime,
					   type
					   FROM $table_name
					   WHERE 
					   m_id > $chat_limit
					   AND
					   $table_name.student_u_id = $student_u_id 
					   ORDER BY datetime";
        $query = $this->db->query($query);

        $res['data'] = $query->result();
        $res['chat_limit'] = $this->getChatLimit($student_u_id, $table_name);


        return $res;
    }

    // call this for the student
    public function getMsgAsynch($student_u_id, $counselor_u_id, $chat_limit)
    {
        $res = array();
        $table_name = $this->getMessageTableName($counselor_u_id);

        $query = " SELECT  $table_name.student_u_id, 
                          $table_name.counselor_u_id, 
					   (SELECT image FROM user WHERE $table_name.counselor_u_id = user.u_id ) AS image,
					   message,
					   datetime,
					   type
					   FROM $table_name
					   WHERE 
					   m_id > $chat_limit
					   AND
					   $table_name.student_u_id = $student_u_id 
					   ORDER BY datetime";
        $query = $this->db->query($query);

        $res['data'] = $query->result();
        $res['chat_limit'] = $this->getChatLimit($student_u_id, $table_name);

        return $res;
    }

    /**
     * @param $userId
     * @param $currentPassword
     * @param $newPassword
     * @return boolean the truth value of the operation
     */
    public function changePassword($userId, $currentPassword, $newPassword)
    {
        if(!$this->isPasswordExist($userId, $currentPassword) ) {
            return false;
        }

        $data = array( 'password' => $newPassword );
        $this->db->where( 'u_id', $userId );

        return $this->db->update('user', $data);
    }

    /**
     * @param $userId
     * @param $currentPassword
     * @return boolean the truth value of this test
     */
    private function isPasswordExist($userId, $currentPassword)
    {
        $query = $this->db->get_where('user',
            array(
                'u_id' => $userId,
                'password' => $currentPassword
            )
        );
        return count($query->result()) > 0;
    }

    /**
     * Updates the
     *
     * @param $userId
     * @param $fieldName
     * @param $fieldValue
     * @return boolean the truth value of this operation
     */
    public function updateField($userId, $fieldName ,$fieldValue)
    {
        $data = array($fieldName => $fieldValue);
        $this->db->where('u_id', $userId);

        return $this->db->update('user', $data);
    }

}