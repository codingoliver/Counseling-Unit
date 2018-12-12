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
    <link href="<?php echo base_url('asset/css/dataTables.bootstrap.css') ?>" id="theme" rel="stylesheet">
    <link  rel="stylesheet" href="<?php echo base_url('asset/css/sweetalert.css'); ?>">


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
                    <span style="color: white">Counseling Unit</span>
                </a>
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
                            <li><a href="<?php  echo base_url('index.php/Welcome/sign_out') ?>"><i class="mdi mdi-close-circle-outline"></i>Sign Out</a></li>
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
                    <li> <a class="waves-effect waves-dark" href="<?php echo base_url('index.php/Welcome/counselor_dashboard') ?>" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
                    </li>
                    <li> <a class="waves-effect waves-dark" href="<?php echo base_url('index.php/Welcome/counselor_appointments') ?>" aria-expanded="false"><i class="mdi mdi-alarm-multiple"></i><span class="hide-menu">Appointments</span></a>
                    </li>
                    <li> <a class="waves-effect waves-dark" href="<?php echo base_url('index.php/Welcome/counselor_student') ?>" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">View Student Records</span></a>
                    </li>
                    <li> <a class="waves-effect waves-dark" href="<?php echo base_url('index.php/Welcome/anonymous_messages') ?>" aria-expanded="false"><i class="mdi mdi-message-bulleted-off"></i><span class="hide-menu">Anonymous Messages</span></a>
                    </li>
                    <li> <a class="waves-effect waves-dark" href="<?php echo base_url('index.php/Welcome/chatroom_counselor') ?>" aria-expanded="false"><i class="mdi mdi-wechat"></i><span class="hide-menu">Chat</span></a>
                    </li>

                    <li> <a class="waves-effect waves-dark" href="<?php echo base_url('index.php/Welcome/counselor_profile') ?>" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Profile</span></a>
                    </li>

                </ul>

            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->

        <!-- End Bottom points-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <!--BOOK APPOINTMENT  MODAL -->

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
                    <h4 class="text-themecolor">Canceled Appointments</h4>
                </div>
            </div>
            <!--Rescheduled APPOINTMENT  MODAL -->
            <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Rescheduled appointment</h4>
                        </div>
                        <form class="form-horizontal form-material" method="post"
                              action=""
                              onsubmit=" return reschedule()">
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
                                    <div class="col-md-12" id="divError">
                                    </div>
                                </div>

                                <div id="divAppointmentID" data-a_id=0>
                                </div>
                                <div id="divStudent" data-a_id=0>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="form-group ">
                                    <div class="col-sm-12 ">
                                        <input type="submit" class="btn btn-success" value="RESCHEDULE NOW">

                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
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


                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="container">
                            <div class="header">
                                <br/>
                                <h4>

                                </h4>
                                <ul class="header-dropdown m-r--5">

                                </ul>
                            </div>
                            <div class="">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Programme</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Action</th>

                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Programme</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Action</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php

                                        foreach ($data2 as $val) {
                                            $image = base_url($val->image);
                                            $name = $val->firstname.' '.$val->lastname;
                                            echo "
                                                 <tr>   
                                                    <td>$val->a_id</td>
                                                    <td><img src='$image' width='80' height='80'></td>
                                                    <td>$name</td>
                                                    <td>$val->programme</td>
                                                    <td>$val->date</td>
                                                    <td>$val->time</td>
                                                    <td>
                                                    <button class='btn btn-primary' style='margin-right: 5px' data-a_id=\"$val->a_id\" data-status =\"$val->status\" 
                                                    value='accepted'  data-date=\"$val->date\" data-time=\"$val->time\" data-student=\"$name\">
                                                     Accept</button>
                                                    <button class='btn btn-success' data-a_id=\"$val->a_id\" data-status =\"$val->status\" value='rescheduled' 
                                                    data-toggle='modal' data-target='#defaultModal'
                                                     data-date=\"$val->date\" data-time=\"$val->time\" data-student=\"$name\">
                                                        Reschedule</button>
                                                 
                                                    </td>
                                                </tr>    
                                               ";
                                        }
                                        ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
    <script src="<?php echo base_url('asset/js/jquery-datatable.js'); ?>"></script>
    <script src="<?php echo base_url('asset/js/jquery.dataTables.js'); ?>"></script>
    <script src="<?php echo base_url('asset/js/dataTables.bootstrap.js'); ?>"></script>
    <script src="<?php echo base_url('asset/js/sweetalert.min.js'); ?>"></script>
    <script>

        function clicked(a_id, $st, trail) {

            $.post('http://localhost/counseling/index.php/Welcome/update_appointment/'+ $st,
                {
                    a_id : a_id,
                    trail: trail
                },
                function (data, status) {
                   // alert('here');
                    if (status === 'success') {
                      //  alert(status);
                        if($st === 'rescheduled') {
                            swal("Success!", "Appointment rescheduled successfully", "success");
                        } else if($st === 'canceled') {
                            swal("Success!", "Appointment canceled successfully", "success");
                        } else {
                            swal("Success!", "Appointment accepted successfully", "success");
                        }
                        window.location = "http://localhost/counseling/index.php/Welcome/counselor_appointment_item_canceled";
                    } else {
                        swal("Failed!", "Appointment status change failed", 'failure');
                    }
                }
            );
        }

        $('button').on('click', function () {

            a_id = $(this).data('a_id');
            datetime = $(this).data('date') + ' ' + $(this).data('time');
            student = $(this).data('student');
            $status = $(this).val();
            if( ($status === 'rescheduled') ) {
                $('#divAppointmentID').data('a_id', a_id);
                $('#divStudent').data('student', student);
                return;
            }

            var $msg, $trail;
            if($status === 'accepted') {
                $msg = 'accept';
                $trail = 'accepted the appointment with ' + student + ' for ' + datetime;
            } else if($status === 'canceled') {
                $msg = 'cancel';
                $trail = 'canceled the appointment with ' + student + ' for ' + datetime;
            }  else {
                $msg = 'reschedule';
                $trail = 'rescheduled the appointment with ' + student + ' for ' + datetime;
            }
            // proceed dialog
            swal({
                title: "Sure?",
                text: "Are you sure you want to "+$msg+" this appointment",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes",
                closeOnConfirm: false
            }, function () {
                // ajax call to update appointment status
                clicked(a_id, $status, $trail);
            });
        });

        function  reschedule() {

            a_id = $('#divAppointmentID').data('a_id');
            student = $('#divStudent').data('student');
            date = $('#txtDate').val();
            time = $('#txtTime').val();

            $.post('http://localhost/counseling/index.php/Welcome/reschedule_appointment',
                {
                    a_id : a_id,
                    date : date,
                    time : time
                },
                function (data, status) {
                    trail = 'rescheduled the appointment with ' + student + ' for ' + date + ' ' + time;
                    clicked(a_id, 'rescheduled', trail);
                }
            );

            return false;
        }


    </script>
</body>

</html>
