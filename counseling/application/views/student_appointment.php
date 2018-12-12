<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Online Counseling Unit</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('asset/stud/plugins/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- chartist CSS -->
    <link href=" <?php echo base_url('asset/stud/plugins/chartist-js/dist/chartist.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('asset/stud/plugins/chartist-js/dist/chartist-init.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('asset/stud/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css') ?>" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="<?php echo base_url('asset/stud/plugins/c3-master/c3.min.css') ?> " rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url('asset/stud/css/style.css"') ?>"  rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?php echo base_url('asset/stud/css/colors/blue.css') ?>" id="theme" rel="stylesheet">
    <link  rel="stylesheet" href="<?php echo base_url('asset/css/sweetalert.css'); ?>">

<![endif]-->
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            
                            <!-- Light Logo icon -->

                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span style="color: white">
                         
                         <!-- Light Logo text -->    
                         Online Counseling Unit</span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url($data[0]->image) ?>" alt="" class="profile-pic m-r-10" />
                                <?php echo $data[0]->firstname.' '.$data[0]->lastname; ?></a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="JavaScript:void(0)"><i class="mdi mdi-account-check"></i>Profile</a></li>
                                <li role="seperator" class="divider"></li>
                                <li><a href="<?php echo base_url('index.php/Welcome/sign_out') ?>"><i class="mdi mdi-close-circle-outline"></i>Sign Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="<?php echo base_url('index.php/Welcome/student') ?>" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="<?php echo base_url('index.php/Welcome/student_appointment') ?>" aria-expanded="false"><i class="mdi mdi-alarm-multiple"></i><span class="hide-menu">Appointments</span></a>
                        </li>

                        <li> <a class="waves-effect waves-dark" href="<?php echo base_url('index.php/Welcome/student_anonymous') ?>" aria-expanded="false"><i class="mdi mdi-message-bulleted-off"></i><span class="hide-menu">Anonymous Messages</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="<?php echo base_url('index.php/Welcome/chatroom_student') ?>" aria-expanded="false"><i class="mdi mdi-wechat"></i><span class="hide-menu">Chat</span></a>
                        </li>

                        <li> <a class="waves-effect waves-dark" href="<?php echo base_url('index.php/Welcome/student_profile') ?>" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Profile</span></a>
                        </li>

                    </ul>
                   
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <!-- Bottom points-->
            <div class="sidebar-footer">
                          <!-- End Bottom points-->
        </aside>
        <!--BOOK APPOINTMENT  MODAL -->
        <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Book new appointment</h4>
                    </div>
                    <form class="form-horizontal form-material" method="post"
                          action="http://localhost/olmart/index.php/Welcome/insert_category_details"
                          onsubmit="return book()">
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-md-12">Date</label>
                                <div class="col-md-12">
                                    <input type="date" id="txtDate" name="category_name"
                                           class="form-control form-control-line" required></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Time</label>
                                <div class="col-md-12">
                                    <input type="time" id="txtTime" name="category_name"
                                           class="form-control form-control-line" required></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Reason</label>
                                <div class="col-md-12">
                                    <textarea id="reason" class="form-control form-control-line" required></textarea></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Counseling Type</label>
                                <div class="col-md-12">
                                    <select id="counseling_type" class="form-control form-control-line" value="" onchange="getCounselors()" required>
                                        <option>DrugAbuse</option>
                                        <option>Relationship</option>
                                        <option>SexualHarassment</option>
                                        <option>EatingDisorder</option>
                                        <option>Anxiety</option>
                                        <option>Depression</option>
                                        <option>Bereavement</option>
                                        <option>DrugAddiction</option>
                                        <option>AlcoholAddiction</option>
                                        <option>Pornography</option>
                                        <option>SexAddiction</option>
                                        <option>Womanizing</option>
                                        <option>Rebellion</option>
                                        <option>AngerIssues</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Counselor</label>
                                <div class="col-md-12">
                                    <select id="option_couselors" class="form-control form-control-line">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-md-12" id="divError">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="form-group ">
                                <div class="col-sm-12 ">
                                    <input type="submit" class="btn btn-success" value="BOOK NOW">

                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">Appointments Section</h3>
                        
                         <a href="javascript:void(0)" class=" waves-effect waves-dark btn btn-primary btn-md btn-success"
                            data-toggle="modal" data-target="#defaultModal">Book new appointment</a>
                         
                    </div>
                  
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-8 col-md-7">
                       
                    </div>
                    <div class="col-lg-4 col-md-5">
                     
                    </div>
                </div>
                <!-- Row -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-3 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-block">
                                <center class="m-t-30">  <a href="<?php echo base_url('index.php/Welcome/student_appointment_item/waiting')?>">
                                        <img src="<?php echo base_url('asset/images/waiting.png') ?>" class="img-circle" width="150" /></a>
                                    <a href="<?php echo base_url('index.php/Welcome/student_appointment_item/waiting')?>"><h4 class="card-title m-t-10">Onhold</h4></a>
                                    <h6 class="card-subtitle">check out pending appointments</h6>
                                    <div class="row text-center justify-content-md-center">
                                    </div>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-block">
                                <center class="m-t-30">
                                    <a href="<?php echo base_url('index.php/Welcome/student_appointment_item/accepted')?>">
                                        <img src="<?php echo base_url('asset/images/booked.jpg') ?>" class="img-circle" width="150" />
                                    </a>
                                    <a href="<?php echo base_url('index.php/Welcome/student_appointment_item/accepted')?>"> <h4 class="card-title m-t-10">Booked</h4></a>
                                    <h6 class="card-subtitle">Check out upcoming appointments</h6>
                                    <div class="row text-center justify-content-md-center">
                                    </div>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-block">
                                <center class="m-t-30"> <a href="<?php echo base_url('index.php/Welcome/student_appointment_item/rescheduled')?>">
                                        <img src="<?php echo base_url('asset/images/appointment.png') ?>" class="img-circle" width="150" /></a>
                                    <a href="<?php echo base_url('index.php/Welcome/student_appointment_item/rescheduled')?>"><h4 class="card-title m-t-10">Rescheduled</h4></a>
                                    <h6 class="card-subtitle">check out new dates for appointments</h6>
                                    <div class="row text-center justify-content-md-center">
                                    </div>
                                </center>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-block">
                                <center class="m-t-30">
                                    <a href="<?php echo base_url('index.php/Welcome/student_appointment_item/canceled')?>">
                                        <img src="<?php echo base_url('asset/images/canceled.jpg') ?>" class="img-circle" width="150" />
                                    </a>
                                    <a href="<?php echo base_url('index.php/Welcome/student_appointment_item/canceled')?>">
                                        <h4 class="card-title m-t-10">Canceled</h4>
                                    </a>
                                    <h6 class="card-subtitle">check out rejected appointments</h6>
                                    <div class="row text-center justify-content-md-center">
                                    </div>
                                </center>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer"> © 2018 Online Counseling Unit </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url('asset/stud/plugins/jquery/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('asset/stud/plugins/bootstrap/js/tether.min.js') ?>"></script>
    <script src="<?php echo base_url('asset/stud/plugins/bootstrap/js/bootstrap.min.js') ?>"></script>


    <script src="<?php echo base_url('asset/stud/js/jquery.slimscroll.js') ?>"></script>
    <script src="<?php echo base_url('asset/stud/js/waves.js') ?>"></script>
    <script src="<?php echo base_url('asset/stud/js/sidebarmenu.js') ?>"></script>
    <script src="<?php echo base_url('asset/stud/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js') ?>"></script>
    <script src="<?php echo base_url('asset/stud/js/custom.min.js') ?>"></script>


    <script src="<?php echo base_url('asset/stud/plugins/chartist-js/dist/chartist.min.js') ?>"></script>
    <script src="<?php echo base_url('asset/stud/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js') ?>"></script>
    <script src="<?php echo base_url('asset/stud/plugins/d3/d3.min.js') ?>"></script>
    <script src="<?php echo base_url('asset/stud/plugins/c3-master/c3.min.js') ?>"></script>
    <script src="<?php echo base_url('asset/stud/js/dashboard1.js') ?>"></script>
    <script src="<?php echo base_url('asset/js/sweetalert.min.js'); ?>"></script>
    <script>

        // get counselors for selected counseling type after document's finished loading
        onload = function () {
          getCounselors();
        };

        var msgs;

        $(function () {
            option_couselors = $('#option_couselors');
            option_couselors.hide();
        });

        function getCounselors() {

            $('#divError').html("");

            option = $('#counseling_type').val().trim();
            option_couselors = $('#option_couselors');
            option_couselors.html('');

            $.get('http://localhost/counseling/index.php/Welcome/get_counselors/'+option, {

                },
                function (data, status) {

                    if(status === 'success'){
                        msgs = jQuery.parseJSON(data);
                        var str = '';
                        $.each(msgs, function (key, value) {
                            str += "<option data-name="+value.u_id+">"+"#"+value.u_id+" "+value.firstname+" "+value.lastname+"</option>";
                        });
                        option_couselors.html(str);
                        option_couselors.show();
                    }

                }
            );
        }

        function book()
        {
            date = $('#txtDate').val();
            time = $('#txtTime').val();
            reason = $('#reason').val();

            counselor = $('#option_couselors').val();
            if(counselor === null) {
                $('#divError').html("<p style='color: red'>No counselor available for the chosen counseling type</p>");
                return false;
            }

            counselor_id = counselor.split(' ')[0].slice(1);
            option = $('#counseling_type').val().trim();
            counselor_name = counselor.split(' ');
            counselor_name = counselor_name[1] + ' ' + counselor_name[2];
            trail = 'booked an appointment with ' + counselor_name + ' on ' + option + ' for ' + date + ' ' + time;
            speciality = option;

            $.post('http://localhost/counseling/index.php/Welcome/book_appointment',
                {
                    counselor_id : counselor_id,
                    date : date,
                    time : time,
                    reason : reason,
                    trail: trail,
                    speciality: speciality
                },
                function (data, status) {

                    if(data === 'success') {
                        swal('Success!', 'Appointment booked successfully', 'success');
                       window.location = 'http://localhost/counseling/index.php/Welcome/student_appointment_item/waiting';
                    }
                }
            );

            return false;
        }

        function sendMessage()
        {
            message = $('#message').val();
            counselor = $('#option_cous').val().trim();
            counselor_id = counselor.split(' ')[0].slice(1);

            $.post('http://localhost/counseling/index.php/Welcome/insert_anonymous_appointment',
                {
                    counselor_id : counselor_id,
                    message : message
                },
                function (data, status) {

                    if(data === 'success') {
                        swal('Sent!', 'Anonymous message Sent', 'success');
                        window.location = 'http://localhost/counseling/index.php/Welcome/student_appointment';

                    }
                }
            );


            return false;
        }
    </script>
</body>

</html>
