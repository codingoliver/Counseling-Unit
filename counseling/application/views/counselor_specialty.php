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
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            
                            <!-- Light Logo icon -->

                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span style="color: white">
                         Online Counseling Unit
                        </span> </a>
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
        <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Add new speciality</h4>
                    </div>
                    <form class="form-horizontal form-material" method="post"
                          action=""
                          onsubmit="return addSpeciality()">
                        <div class="modal-body">
                            <div class="form-group">

                                <div class="col-md-12">

                                    <label for="reply">Choose speciality</label>
                                    <select id="speciality" name="speciality" class="form-control form-control-line" required>
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
                            <div class="form-group ">
                                <div class="col-sm-12" id="divError">
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <div class="form-group ">
                                <div class="col-sm-12 ">
                                    <input type="submit" class="btn btn-success" value="ADD">

                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
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
                        <li> <a class="waves-effect waves-dark" href="<?php echo base_url('index.php/Welcome/counselor_specialty') ?>" aria-expanded="false"><i class="mdi mdi-auto-fix"></i><span class="hide-menu">Speciality</span></a>
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
            <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 col-8 align-self-center">
                    <h3 class="text-themecolor">Specialities</h3>

                    <a href="javascript:void(0)" class=" waves-effect waves-dark btn btn-primary btn-md btn-success"
                       data-toggle="modal" data-target="#defaultModal">Add new speciality</a>

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
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                        <tr>
                                            <th>Speciality</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>Speciality</th>
                                            <th>Action</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>

                                        <?php

                                            foreach ($specialities as $speciality) {

                                                echo "
                                                    <tr>
                                                        <td>$speciality->specialty</td>
                                                         <td> 
                                                        <button class='btn btn-danger' data-type=\"$speciality->c_s_id\"><i class='ti-trash fa-fw' >
                                                        </i> Remove</button>
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
        function addSpeciality()
        {
            $('#divError').html("");
            var speciality = $('#speciality').val().trim();

            $.post('http://localhost/counseling/index.php/Welcome/addSpeciality/'+speciality, {},
                function (data, status) {
                    if (data === 'success') {
                        swal("Speciality added successfully!");
                        window.location = "http://localhost/counseling/index.php/Welcome/counselor_specialty";
                    }
                    else if (data === 'already added') {
                        $('#divError').html("<p style='color: red'>Speciality already added!</p>");
                    } else {
                        swal("Failed to add speciality");
                    }
                }
            );

            return false;
        }

        // remove button clicked
        $('button').click(function() {

            speciality_id = $(this).data('type');

            swal({
                title: "Sure?",
                text: "You will not be able to undo this operation",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes",
                closeOnConfirm: false
            }, function () {
                // ajax call
                $.post('http://localhost/counseling/index.php/Welcome/remove_speciality/'+speciality_id,
                    {  },
                    function(data, status) {
                        if(data === 'success') {
                            swal("Removed!", "Speciality removed successful", "success");
                            window.location = 'http://localhost/counseling/index.php/Welcome/counselor_specialty';

                        } else {
                            swal("Failed!", "Speciality could not be deleted", "failure");
                        }
                    }
                );
            });

        });
    </script>
   
    <!-- Bootstrap tether Core JavaScript -->
</body>

</html>
