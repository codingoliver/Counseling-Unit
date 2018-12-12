<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Couseling Unit</title>

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
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
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
                        <a href="index.html"><h1><span>C</span>ounseling-unit</h1></a>
                    </div>
                </div>

                <div class="navbar-collapse collapse">
                    <div class="menu">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation"><a href="<?php echo base_url(); ?>" class="active">Home</a></li>
                            <li role="presentation"><a href="<?php echo 'http://localhost/cs'; ?>">Why Counseling?</a></li>
                            <li role="presentation"><a href="<?php  echo base_url('index.php/Welcome/sign_up')?>">Join</a></li>
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

<div class="slider">
    <div class="img-responsive">
        <ul class="bxslider">
            <li><img src="<?php echo base_url('asset/images/counseling1.jpg'); ?>" alt=""/></li>
            <li><img src="<?php echo base_url('asset/images/counseling2.jpg'); ?>" alt=""/></li>
            <li><img src="<?php echo base_url('asset/images/counseling3.jpg'); ?>" alt=""/></li>
        </ul>
    </div>
</div>


<div class="features">
    <div class="container">
        <div class="text-center">
            <div class="wow bounceInDown" data-wow-offset="0" data-wow-delay="0.3s">
                <h2>Features & Services</h2>
                <p>Individual counselling, Group counseling, Psychological consultation, Drug and alcohol counseling,
                    HIV/AIDS counseling, Career counseling, Professional training, Student advocacy,
                    Presentations/Workshop, Stress management, Wellness, Djusting to college life, Study skills,
                    Relationship counseling, Marriage (Pre-marital and post-marital) counseling, Suicide
                    Prevention/Counseling</p>
            </div>
        </div>
    </div>
</div>


<div class="main-feature">
    <div class="container">
        <div class="col-md-4 wow fadeInUp" data-wow-offset="0" data-wow-delay="0.3s">
            <div class="media">
                <div class="media-left">
                    <i class="fa fa-check-circle-o fa-3x"></i>
                </div>

                <div class="media-body">
                    <h4 class="media-heading">Relationship</h4>
                    <p>We provide advise on relationship, choosing the right partner, resolving relationship
                        issues..</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 wow fadeInUp" data-wow-offset="0" data-wow-delay="0.6s">
            <div class="media">
                <div class="media-left">
                    <i class="fa fa-check-circle-o fa-3x"></i>
                </div>

                <div class="media-body">
                    <h4 class="media-heading">Addiction</h4>
                    <p>We produces expert advice on the addiction. Some addictions like alcoholism, smoking, gambling,
                        wominizing, etc..</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 wow fadeInUp" data-wow-offset="0" data-wow-delay="0.9s">
            <div class="media">
                <div class="media-left">
                    <i class="fa fa-check-circle-o fa-3x"></i>
                </div>

                <div class="media-body">
                    <h4 class="media-heading">Psychological Counsultation</h4>
                    <p>Cras urna felis accumsan at ultricesid posuere masa um socisd natoque penatibus magnisd Lorem
                        ipsum dolor sit ame onsectea dipe.</p>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="services">
    <div class="container">
        <div class="text-center">
            <div class="wow bounceInDown" data-wow-offset="0" data-wow-delay="0.3s">
                <h2>Counselor Talk:</h2>
            </div>

            <div class="wow fadeInRight" data-wow-offset="0" data-wow-delay="0.3s">
                <div class="col-md-4">
                    <img src="<?php echo base_url('asset/images/services/1.jpg'); ?>" alt="">
                    <h3>Dr. Phylis Opare</h3>
                    <p>I am Dr. Phylis Opare. Am a relationship expert. Relationships has their ups and down but when
                        proper counsel is seeked its always get it feet.</p>
                </div>
            </div>

            <div class="wow fadeInRight" data-wow-offset="0" data-wow-delay="0.6s">
                <div class="col-md-4">
                    <img src="<?php echo base_url('asset/images/services/1.jpg'); ?>" alt="">
                    <h3>Dr. Ismeal Arthur</h3>
                    <p>Addiction is a creepy behavior that makes one go insane. Addiction like gambling, smoking,
                        alcoholism, womanizing, etc. is common among students.</p>
                </div>
            </div>

            <div class="wow fadeInLeft" data-wow-offset="0" data-wow-delay="0.3s">
                <div class="col-md-4">
                    <img src="<?php echo base_url('asset/images/services/1.jpg'); ?>" alt="">
                    <h3>SRC President</h3>
                    <p>Am more concern with the welfare of the students populace. I wish to inform all students to use
                        the counselling unit effectively and always should seek advice from the unit.</p>
                </div>
            </div>

        </div>
    </div>
</div>
<br/>
<div class="contact-form">
    <div class="text-center"><h2>Send us a message</h2></div>
    <div class="container">
        <div class="col-md-4">
            <div class="form-group">
                <input type="email" class="form-control" id="exampleInputName" placeholder="name">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="email">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <input type="email" class="form-control" id="exampleInputPhone" placeholder="phone">
            </div>
        </div>
    </div>

    <div class="container">
        <div class="col-lg-12">
            <textarea class="form-control" rows="5"></textarea>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Submit Message
                </button>
            </div>
        </div>
    </div>

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
</script>

</body>
</html>