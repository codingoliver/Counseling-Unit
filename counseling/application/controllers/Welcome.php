<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->load->view('index');
    }

    public function why_counseling()
    {
        $this->load->view('why_counseling');
    }

    public function sign_out()
    {
        $this->log('logout');
        header('location: ' . base_url('index.php/Welcome/index'));
    }

    public function sign_up()
    {
        $this->load->view('sign_up');
    }

    public function user_verification($type)
    {
        $res = $this->CustomModel->isUserExist($this->input->get('index_no'), $this->input->get('password'), $type);

        if ($res) {
            $_SESSION['u_id'] = $res;

            // log the user when logged in
            $this->log('login');

            echo 'exists';
        }
    }

    public function student()
    {
        $res = $this->CustomModel->getUserDetails($_SESSION['u_id']);
        $data['data'] = $res;
        $this->load->view('student', $data);
    }

    public function admin()
    {
        $res = $this->CustomModel->getUserDetails($_SESSION['u_id']);
        $data['data'] = $res;
        $this->load->view('admin', $data);
    }

    public function admin_log()
    {
        $res = $this->CustomModel->getUserDetails($_SESSION['u_id']);
        $res2 = $this->CustomModel->getUserLog();
        $data['data'] = $res;
        $data['data2'] = $res2;
        $this->load->view('admin_log', $data);
    }

    public function counselor()
    {
        $res = $this->CustomModel->getUserDetails($_SESSION['u_id']);
        $res2 = $this->CustomModel->getAllUsers('counselor');
        $data['data'] = $res;
        $data['data2'] = $res2;
        $this->load->view('counselor', $data);
    }

    public function activity_trail()
    {
        $res = $this->CustomModel->getUserDetails($_SESSION['u_id']);
        $res2 = $this->CustomModel->getActivityTrail();
        $data['data'] = $res;
        $data['data2'] = $res2;
        $this->load->view('activity_trail', $data);
    }

    public function activity_graph()
    {
        $res = $this->CustomModel->getUserDetails($_SESSION['u_id']);
        $data['data'] = $res;
        $this->load->view('activity_graph', $data);
    }

    public function load_activity_graph_data()
    {
        $res = $this->CustomModel->getActivityGraphData();
        if($res) {
            echo json_encode($res);
        }
    }

    public function admin_student()
    {
        $res = $this->CustomModel->getUserDetails($_SESSION['u_id']);
        $res2 = $this->CustomModel->getAllUsers('student');
        $data['data'] = $res;
        $data['data2'] = $res2;
        $this->load->view('admin-student', $data);
    }

    public function counselor_student()
    {
        $res = $this->CustomModel->getUserDetails($_SESSION['u_id']);
        $res2 = $this->CustomModel->getAllUsers('student');
        $data['data'] = $res;
        $data['data2'] = $res2;
        $this->load->view('counselor-student', $data);
    }

    public function anonymous_messages()
    {
        $res = $this->CustomModel->getUserDetails($_SESSION['u_id']);
        $res2 = $this->CustomModel->getAnonymousMsgCounselor($_SESSION['u_id']);
        $data['data'] = $res;
        $data['data2'] = $res2;
        $this->load->view('anonymous_messages', $data);
    }

    public function counselor_profile()
    {
        $res = $this->CustomModel->getUserDetails($_SESSION['u_id']);
        $data['data'] = $res;
        $this->load->view('counselor_profile', $data);

        // used for displaying feedback for profile update
        $isProfileUpdated = 'is_' . 'counselor' . '_profile_updated';

        if (isset($_SESSION[$isProfileUpdated]) && $_SESSION[$isProfileUpdated]) {

            $this->showSuccessDialog();
            $_SESSION[$isProfileUpdated] = false; // refresh
        }
    }

    private function showSuccessDialog()
    {
        echo "<script>
                   onload = function () {  
                       swal('Success!', 'Profile updated successfully!', 'success');
                   }
             </script>
            ";
    }

    public function counselor_specialty()
    {
        $res = $this->CustomModel->getUserDetails($_SESSION['u_id']);
        $specialities = $this->CustomModel->getSpecialities($_SESSION['u_id']);
        $data['data'] = $res;
        $data['specialities'] = $specialities;
        $this->load->view('counselor_specialty', $data);
    }

    public function addSpeciality($specialty)
    {
        $isSpecialityExist = $this->CustomModel->isSpecialityExist($_SESSION['u_id'], $specialty);
        if (!$isSpecialityExist) {
            $res = $this->CustomModel->addSpeciality($_SESSION['u_id'], $specialty);
            if ($res) {
                echo 'success';
            }
        } else {
            echo 'already added';
        }
    }

    public function student_profile()
    {
        $res = $this->CustomModel->getUserDetails($_SESSION['u_id']);
        $data['data'] = $res;
        $this->load->view('student_profile', $data);
    }

    public function admin_profile()
    {
        $res = $this->CustomModel->getUserDetails($_SESSION['u_id']);
        $data['data'] = $res;
        $this->load->view('admin_profile', $data);
    }

    public function student_appointment()
    {
        $res = $this->CustomModel->getUserDetails($_SESSION['u_id']);
        $data['data'] = $res;
        $this->load->view('student_appointment', $data);
    }

    public function student_anonymous()
    {
        $res = $this->CustomModel->getUserDetails($_SESSION['u_id']);
        $res2 = $this->CustomModel->getAnonymousMsg($_SESSION['u_id']);
        $data['data'] = $res;
        $data['num_rows'] = $res2['num_rows'];
        $data['data2'] = $res2['data'];
        $data['replies'] = $res2['replies'];
        $this->load->view('student_anonymous', $data);
    }

    public function counselor_dashboard()
    {
        $res = $this->CustomModel->getUserDetails($_SESSION['u_id']);
        $waiting_appointments = $this->CustomModel->getAppointments($_SESSION['u_id'], 'waiting');
        $data['data'] = $res;
        $data['waiting_appointments'] = $waiting_appointments['data'];
        $data['waiting_appointments_total_number'] = $waiting_appointments['num_rows'];
        $this->load->view('counselor_dashboard', $data);
    }

    public function counselor_appointments()
    {
        $res = $this->CustomModel->getUserDetails($_SESSION['u_id']);
        $data['data'] = $res;
        $this->load->view('counselor_appointments', $data);
    }

    public function student_appointment_item($status)
    {
        $res = $this->CustomModel->getUserDetails($_SESSION['u_id']);
        $data['data'] = $res;

        $data['status'] = $status;

        if($status == 'accepted') {
            $res = $this->CustomModel->getBookedAppointments($_SESSION['u_id']);
            $data['status'] = 'booked';
        } else {
            $res = $this->CustomModel->getAppointmentsStudents($_SESSION['u_id'], $status);
        }

        $data['num_rows'] = $res['num_rows'];
        $data['data2'] = $res['data'];

        // choose which message to display at header text
        $messageHead = '';
        $messageSub = '';
        if ($status == 'waiting') {
            $messageHead = 'Appointments on hold';
            $messageSub = 'These appointments are waiting to be considered';
        } else if ($status == 'accepted') {
            $messageHead = 'Booked Appointments';
            $messageSub = 'These appointments have been booked and are due on the given date & time';
        } else if ($status == 'rescheduled') {
            $messageHead = 'Rescheduled Appointments';
            $messageSub = 'These appointments have been rescheduled and waiting for your approval';
        } else {
            $messageHead = 'Cancelled Appointments';
            $messageSub = 'These appointments have been warmly rejected';
        }

        $data['messageHead'] = $messageHead;
        $data['messageSub'] = $messageSub;

        $this->load->view('student_appointment_item', $data);
    }

    public function counselor_appointment_item($filter_string)
    {
        $res = $this->CustomModel->getUserDetails($_SESSION['u_id']);
        $data['data'] = $res;

        $data['status'] = 'waiting';
        $data['filter_string'] = $filter_string;
        $res = $this->CustomModel->getAppointments($_SESSION['u_id'], 'waiting');
        $data['num_rows'] = $res['num_rows'];
        $data['data2'] = $res['data'];
        $this->load->view('counselor_appointment_item', $data);
    }

    public function counselor_appointment_item_accepted()
    {
        $status = 'accepted';
        $res = $this->CustomModel->getUserDetails($_SESSION['u_id']);
        $data['data'] = $res;

        $data['status'] = $status;
        $res = $this->CustomModel->getAcceptedAndRescheduledAppointments($_SESSION['u_id']);
        $data['num_rows'] = $res['num_rows'];
        $data['data2'] = $res['data'];
        $this->load->view('counselor_appointment_item_accepted', $data);
    }

    public function counselor_appointment_item_canceled()
    {
        $status = 'canceled';
        $res = $this->CustomModel->getUserDetails($_SESSION['u_id']);
        $data['data'] = $res;

        $data['status'] = $status;
        $res = $this->CustomModel->getAppointmentsCanceled($status);
        $data['num_rows'] = $res['num_rows'];
        $data['data2'] = $res['data'];
        $this->load->view('counselor_appointment_item_canceled', $data);
    }

    public function counselor_appointment_item_honored()
    {
        $status = 'honored';
        $res = $this->CustomModel->getUserDetails($_SESSION['u_id']);
        $data['data'] = $res;

        $data['status'] = $status;
        $res = $this->CustomModel->getAppointmentsCanceled($status);
        $data['num_rows'] = $res['num_rows'];
        $data['data2'] = $res['data'];
        $this->load->view('counselor_appointment_item_honored', $data);
    }

    public function get_counselors($specialty)
    {
        $res = $this->CustomModel->getCounselors($specialty);
        if ($res) {
            echo json_encode($res);
        }

    }

    public function book_appointment()
    {
        $res = $this->CustomModel->bookAppointment(
            $_SESSION['u_id'],
            $this->input->post('counselor_id'),
            $this->input->post('date'),
            $this->input->post('time'),
            $this->input->post('reason')
        );

        // leave activity trail
        $isLeftTrail = $this->CustomModel->leaveTrail(
            $_SESSION['u_id'],
            $this->input->post('trail'),
            $this->input->post('speciality')
        );

        if ($res && $isLeftTrail) {
            echo 'success';
        }
    }

    public function insert_anonymous_appointment()
    {
        $res = $this->CustomModel->insertAnonymousMessage(
            $_SESSION['u_id'],
            $this->input->post('counselor_id'),
            $this->input->post('message')
        );

        if ($res) {
            echo 'success';
        }
    }

    public function log($type)
    {
        $this->CustomModel->insertLog(
            $_SESSION['u_id'],
            $type
        );
    }

    public function reschedule_appointment()
    {
        $res = $this->CustomModel->rescheduleAppointment(
            $this->input->post('a_id'),
            $this->input->post('date'),
            $this->input->post('time')
        );
    }

    public function update_appointment($status)
    {
        $res = $this->CustomModel->updateAppointment(
            $this->input->post('a_id'),
            $status
        );

        // leave activity trail
        $this->CustomModel->leaveTrail(
            $_SESSION['u_id'],
            $this->input->post('trail'),
            'not specified'
        );
    }

    /**
     * CHAT ROOM CODE
     *
     */
    public function chatroom_student()
    {
        $res = $this->CustomModel->getUserDetails($_SESSION['u_id']);
        $res2 = $this->CustomModel->getCounselorsProfile();
        $res3 = $this->CustomModel->getAdminsProfile();
        $data['data'] = $res;
        $data['data2'] = $res2;
        $data['data3'] = $res3;
        $this->load->view('chatroom_student', $data);
    }

    public function chatroom_counselor()
    {
        $res = $this->CustomModel->getUserDetails($_SESSION['u_id']);
        $res2 = $this->CustomModel->getStudentsProfile($_SESSION['u_id']);
        $data['data'] = $res;
        $data['data2'] = $res2;
        $this->load->view('chatroom_counselor', $data);
    }

    public function chatroom_admin()
    {
        $res = $this->CustomModel->getUserDetails($_SESSION['u_id']);
        $res2 = $this->CustomModel->getStudentsProfile($_SESSION['u_id']);
        $data['data'] = $res;
        $data['data2'] = $res2;
        $this->load->view('chatroom_admin', $data);
    }

    // check for existing user ID
    public function check_user()
    {
        $res = $this->CustomModel->checkUser(
            $this->input->get('index_no')
        );

        if (!$res) {
            echo 'not exists';
        }
    }

    // sign up
    public function sign_up_user($type)
    {
        $res = $this->CustomModel->signUpUser(
            $this->input->post('index_no'),
            $this->input->post('password'),
            $this->input->post('firstname'),
            $this->input->post('lastname'),
            $this->input->post('email'),
            $this->input->post('phone'),
            $this->input->post('gender'),
            $this->input->post('programme'),
            $type
        );

        if ($res['status']) {

            // set up messages table for the newly added counselor
            if ($type == 'counselor') {

                $this->CustomModel->setUpMessageTable($res[u_id]);
            }
        }
    }

    public function getRandomString($len)
    {
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $chars_len = strlen($chars);
        $randString = '';
        for ($i = 0; $i < $chars_len; $i++) {
            $randString .= $chars[rand(0, $chars_len - 1)];
        }
        return $randString . '.jpg';
    }

    function load_user_view($type)
    {

        switch ($type) {
            case 'student':
                header('location: ' . base_url('index.php/Welcome/student_profile'));
                break;
            case 'counselor':
                header('location: ' . base_url('index.php/Welcome/counselor_profile'));
                break;
            case 'admin':
                header('location: ' . base_url('index.php/Welcome/admin_profile'));
                break;
        }
    }


    /**
     * Sets the config for image upload
     *
     * @return String the filename of the image
     */
    public function setUpImageUploadConfig()
    {
        $filename = $this->getRandomString(20);
        $config['upload_path'] = "./uploads/";
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 200000;
        $config['file_name'] = $filename;
        $this->load->library('upload', $config);

        return $filename;
    }


    /**
     * Updates the user's profile
     *
     * @param $typeOfUser [student, counselor, admin]
     */
    public function update_user_profile($typeOfUser)
    {
        // used for displaying feedback for profile update
        $isProfileUpdated = 'is_' . $typeOfUser . '_profile_updated';
        $_SESSION[$isProfileUpdated] = false;

        $email = trim($this->input->post('txtEmail'));
        $phone = trim($this->input->post('txtPhone'));

        if ($email != '') {
            $this->CustomModel->updateField($_SESSION['u_id'], 'email', $email);
            $_SESSION[$isProfileUpdated] = true;
        }
        if ($phone != '') {
            $this->CustomModel->updateField($_SESSION['u_id'], 'phone', $phone);
            $_SESSION[$isProfileUpdated] = true;
        }

        $filename = 'uploads/' . $this->setUpImageUploadConfig();
        if ($this->upload->do_upload('image')) {

            $this->CustomModel->updateUserImage($_SESSION['u_id'], $filename);
            $this->resizeImage($filename, 512, 512);
            $_SESSION[$isProfileUpdated] = true;
        }

        // load the corresponding user view
        $this->load_user_view($typeOfUser);
    }

    // remove user
    public function remove_user($u_id)
    {
        $res = $this->CustomModel->removeUser(
            $u_id
        );

        if ($res) {
            echo 'success';
        }
    }

    public function remove_speciality($speciality_id)
    {
        $res = $this->CustomModel->removeSpeciality(
            $speciality_id
        );

        if ($res) {
            echo 'success';
        }
    }

    public function insert_message($type)
    {
        $tablename = $this->CustomModel->getMessageTableName($this->input->post('counselor_id'));

        $res = $this->CustomModel->insertMessage(
            $_SESSION['u_id'],
            $this->input->post('counselor_id'),
            $this->input->post('message'),
            $tablename,
            $type
        );
        if ($res['success']) {
            $_SESSION['chat_limit'] = $res['chat_limit'];
            echo 'success';
        }
    }

    public function insert_message_counselor($type)
    {
        $tablename = $this->CustomModel->getMessageTableName($_SESSION['u_id']);

        $res = $this->CustomModel->insertMessage(
            $this->input->post('counselor_id'),
            $_SESSION['u_id'],
            $this->input->post('message'),
            $tablename,
            $type
        );

        if ($res['success']) {
            $_SESSION['chat_limit'] = $res['chat_limit'];
            echo 'success';
        }
    }

    public function load_messages()
    {
        $res = $this->CustomModel->getAllMessages(
            $_SESSION['u_id'],
            $this->input->get('counselor_id')
        );

        $_SESSION['counselor_id'] = $this->input->get('counselor_id');
        $_SESSION['chat_limit'] = $res['chat_limit'];

        echo json_encode($res['data']);
    }

    // just exchange params
    public function load_messages_counselor()
    {
        $res = $this->CustomModel->getAllMessages(
            $this->input->get('counselor_id'),
            $_SESSION['u_id']
        );

        $_SESSION['counselor_id'] = $this->input->get('counselor_id');
        $_SESSION['chat_limit'] = $res['chat_limit'];

        echo json_encode($res['data']);
    }


    public function get_message_asynch()
    {
        $res = $this->CustomModel->getMsgAsynch(
            $_SESSION['u_id'],
            $_SESSION['counselor_id'],
            $_SESSION['chat_limit']
        );

        $_SESSION['chat_limit'] = $res['chat_limit'];

        echo json_encode($res['data']);
    }


    public function get_message_asynch_counselor()
    {
        $res = $this->CustomModel->getMessagesAsynch(
            $_SESSION['counselor_id'],
            $_SESSION['u_id'],
            $_SESSION['chat_limit']
        );

        $_SESSION['chat_limit'] = $res['chat_limit'];

        echo json_encode($res['data']);
    }

    public function reply()
    {
        $res = $this->CustomModel->insertReply(
            $this->input->post('a_m_id'),
            $this->input->post('message')
        );

        if ($res) {
            echo 'success';
        }
    }

    /**
     * Changes the password of the user if the current password provided is valid
     *
     */
    public function change_password()
    {
        $currentPassword = $this->input->post('currentPassword');
        $newPassword = $this->input->post('newPassword');

        $isPasswordChanged = $this->CustomModel->changePassword(
            $_SESSION['u_id'], $currentPassword, $newPassword
        );

        if ($isPasswordChanged) {
            echo 'success';
        }
    }

    /**
     * Resize the specified image
     *
     * @param $filename
     * @param width the width to be resized to
     * @param height the height to be resized to
     */
    private function resizeImage($filename, $width, $height)
    {
        $config['image_library'] = 'gd2';
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = $width;
        $config['height'] = $height;
        $config['source_image'] = $filename;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }

}
