<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Multi-purpose theme</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('asset/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('asset/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('asset/css/jquery.bxslider.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/isotope.css') ?>" media="screen"/>
    <link rel="stylesheet" href="<?php echo base_url('asset/css/animate.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('asset/js/fancybox/jquery.fancybox.css') ?>" type="text/css"
          media="screen"/>
    <link href="<?php echo base_url('asset/css/prettyPhoto.css') ?>" rel="stylesheet"/>
    <link href="<?php echo base_url('asset/css/style.css') ?>" rel="stylesheet"/>
    <link  rel="stylesheet" href="<?php echo base_url('asset/css/sweetalert.css'); ?>">
    <![endif]-->
</head>
<body>
<header>
    <nav class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target=".navbar-collapse.collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-brand">
                        <a href="<?php echo base_url()?>"><h1><span>C</span>ounseling-unit</h1></a>
                    </div>
                </div>

                <div class="navbar-collapse collapse">
                    <div class="menu">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation"><a href="<?php echo base_url()?>" class="active">Home</a></li>
                            <li role="presentation"><a href="<?php echo 'http://localhost/cs'; ?>">Why Counseling?</a></li>
                            <li role="presentation"><a href="JavaScript:void(0)">Join</a></li>
                            <li role="presentation" class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login <i class="fa"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#" data-toggle="modal" data-target="#defaultModal">Student</a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#defaultModal2">Counselor</a>
                                    <li><a href="#" data-toggle="modal" data-target="#defaultModal3">ADMIN</a>
                                    </li>

                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

<!--STUDENT LOGIN MODAL -->
<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">STUDENT LOGIN</h4>
            </div>
            <form class="form-horizontal form-material" method="post"
                  action="http://localhost/olmart/index.php/Welcome/insert_category_details"
                  onsubmit="return verify_user()">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-md-12" style="color: #292929">Index Number</label>
                        <div class="col-md-12">
                            <input type="text" id="txtUser" name="category_name"
                                   class="form-control form-control-line" required></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12" style="color: #292929">Password</label>
                        <div class="col-md-12">
                            <input type="Password" id="txtPassword" name="category_name"
                                   class="form-control form-control-line" required></div>
                    </div>
                    <div id="divError">
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group ">
                        <div class="col-sm-12 ">
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="LOGIN">

                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
<!--COUNSELOR LOGIN MODAL -->
<div class="modal fade" id="defaultModal2" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">COUNSELOR LOGIN</h4>
            </div>
            <form class="form-horizontal form-material" method="post"
                  action="http://localhost/olmart/index.php/Welcome/insert_category_details"
                  onsubmit="return verify_counselor()">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-md-12" style="color: #292929">Staff ID</label>
                        <div class="col-md-12">
                            <input type="text" id="txtUserCounselor" name="category_name" placeholder=""
                                   class="form-control form-control-line" required></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12" style="color: #292929">Password</label>
                        <div class="col-md-12">
                            <input type="Password" id="txtPasswordCounselor" name="category_name" placeholder=""
                                   class="form-control form-control-line" required></div>
                    </div>
                    <div id="divErrorCounselor">
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group ">
                        <div class="col-sm-12 ">
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="LOGIN">

                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
<!--admins LOGIN MODAL -->
<div class="modal fade" id="defaultModal3" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">ADMIN LOGIN</h4>
            </div>
            <form class="form-horizontal form-material" method="post"
                  action=""
                  onsubmit="return verify_admin()">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-md-12" style="color: #292929">ID</label>
                        <div class="col-md-12">
                            <input type="text" id="txtUserAdmin" name="category_name" placeholder=""
                                   class="form-control form-control-line" required></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12" style="color: #292929">Password</label>
                        <div class="col-md-12">
                            <input type="Password" id="txtPasswordAdmin" name="category_name" placeholder=""
                                   class="form-control form-control-line" required></div>
                    </div>
                    <div id="divErrorAdmin">
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group ">
                        <div class="col-sm-12 ">
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="LOGIN">

                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<br/>
<div class="contact-form">
    <div class="text-center"><h2>SIGN UP</h2></div>
    <form action="" method="post" onsubmit="return signup('student')">
    <div class="container ">

        <div class="col-md-8">
            <div class="form-group">
                <input type="text" class="form-control" id="index_no" placeholder="Index No" required>
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <input type="text" class="form-control" id="firstname" placeholder="Firstname" required>
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <input type="text" class="form-control" id="lastname" placeholder="Lastname" required>
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <input type="email" class="form-control" id="email" placeholder="Email" required>
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <input type="number" class="form-control" id="phone" placeholder="Phone" required>
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <select class="form-control" id="gender" required>
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <select class="form-control" id="programme" required>
                    <option>BSc. Computer Science</option>
                    <option>BSc. Hospitality Management</option>
                </select>
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <input type="password" class="form-control" id="password" placeholder="Password" required>
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <input type="password" class="form-control" id="confirmpassword" placeholder="Confirm password" required>
            </div>
        </div>

    </div>


    <div class="container">

        <div class="col-lg-12">
            <div class="form-group" id="divError">

            </div>
        </div>

        <div class="col-lg-12">
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Sign up
                </button>
            </div>
        </div>

    </div>
    </form>

</div>
<footer>

    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    &copy; 2018 <a target="_blank" href="Javascript:void(0)" title="">Online Counseling Unit</a>.
                    All Rights Reserved.
                </div>

            </div>
            <div class="pull-right">
                <a href="#home" class="scrollup"><i class="fa fa-angle-up fa-3x"></i></a>
            </div>
        </div>
    </div>
</footer>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<script src="<?php echo base_url('asset/js/jquery-2.1.1.min.js') ?>"></script>
<script src="<?php echo base_url('asset/js/bootstrap.min.js') ?>"></script>

<script src="<?php echo base_url('asset/js/wow.min.js') ?>"></script>
<script src="<?php echo base_url('asset/js/fancybox/jquery.fancybox.pack.js') ?>"></script>
<script src="<?php echo base_url('asset/js/jquery.easing.1.3.js') ?>"></script>
<script src="<?php echo base_url('asset/js/jquery.bxslider.min.js') ?>"></script>
<script src="<?php echo base_url('asset/js/jquery.prettyPhoto.js') ?>"></script>
<script src="<?php echo base_url('asset/js/jquery.isotope.min.js') ?>"></script>
<script src="<?php echo base_url('asset/js/functions.js') ?>"></script>
<script src="<?php echo base_url('asset/js/sweetalert.min.js'); ?>"></script>

<script>
    wow = new WOW(
        {})
        .init();
</script>

<script>
    function verify_user() {

        index_no = $('#txtUser').val().trim();
        password = $('#txtPassword').val().trim();
        $('#divError').html("");

        $.get('http://localhost/counseling/index.php/Welcome/user_verification/student', {
                index_no: index_no,
                password: password
            },
            function (data, status) {
                if (data === 'exists') {
                    window.location = "http://localhost/counseling/index.php/Welcome/student";
                }
                else {
                    $('#divError').html("<p style='color: red'>Invalid Index number or password</p>");
                }
            }
        );

        return false;
    }

    function verify_counselor() {

        index_no = $('#txtUserCounselor').val().trim();
        password = $('#txtPasswordCounselor').val().trim();
        $('#divErrorCounselor').html("");

        $.get('http://localhost/counseling/index.php/Welcome/user_verification/counselor', {
                index_no: index_no,
                password: password
            },
            function (data, status) {
                if (data === 'exists') {
                    window.location = "http://localhost/counseling/index.php/Welcome/counselor_dashboard";
                }
                else {
                    $('#divErrorCounselor').html("<p style='color: red'>Invalid Index number or password</p>");
                }
            }
        );

        return false;
    }

    function verify_admin() {

        index_no = $('#txtUserAdmin').val().trim();
        password = $('#txtPasswordAdmin').val().trim();
        $('#divErrorAdmin').html("");

        $.get('http://localhost/counseling/index.php/Welcome/user_verification/admin', {
                index_no: index_no,
                password: password
            },
            function (data, status) {
                if (data === 'exists') {
                    window.location = "http://localhost/counseling/index.php/Welcome/admin";
                }
                else {
                    $('#divErrorAdmin').html("<p style='color: red'>Invalid ID or password</p>");
                }
            }
        );

        return false;
    }


    function signup(type)
    {
        // clear div error
        $('#divError').html("");

        index_no = $('#index_no').val().trim();
        password = $('#password').val().trim();
        confirmpassword = $('#confirmpassword').val().trim();
        firstname = $('#firstname').val().trim();
        lastname = $('#lastname').val().trim();
        email = $('#email').val().trim();
        phone = $('#phone').val().trim();
        gender = $('#gender').val().trim();
        programme = $('#programme').val().trim();


        if(password !== confirmpassword) {

            $('#divError').html("<p style='color: red'> Password and Confirm password does not match</p>");
            return false;
        }

        // ajax call to check for existing ID
        $.get('http://localhost/counseling/index.php/Welcome/check_user',
            {
                index_no : index_no
            },
            function(data, status) {

                if(data === 'not exists') {

                    // ajax call to sign up
                    $.post('http://localhost/counseling/index.php/Welcome/sign_up_user/'+type,
                        {
                            index_no : index_no,
                            password : password,
                            firstname : firstname,
                            lastname : lastname,
                            email : email,
                            phone : phone,
                            gender : gender,
                            programme : programme

                        },
                        function(data, status) {

                            if(status === 'success') {
                                swal('Success!', 'Thanks for signing up, you can login now', 'success');
                                window.location = 'http://localhost/counseling/index.php/Welcome/sign_up';
                            } else {
                                swal('Failure!', "Couldn't sign you up, please try again later", 'failure');
                            }
                        }
                    );

                } else {
                    $('#divError').html("<p style='color: red'> User ID already exists!</p>");
                }
            }
        );

        return false;
    }
</script>

</body>
</html>

























