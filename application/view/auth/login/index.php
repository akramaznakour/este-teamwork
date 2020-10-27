<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8"/>
    <title> Login Page</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo URL; ?>assets/img/teamwork.png">

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="<?php echo URL; ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="<?php echo URL; ?>assets/css/style.min.css" rel="stylesheet"/>
    <link href="<?php echo URL; ?>assets/css/style-responsive.min.css" rel="stylesheet"/>
    <link href="<?php echo URL; ?>assets/css/theme/default.css" rel="stylesheet" id="theme"/>
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="<?php echo URL; ?>assets/plugins/pace/pace.min.js"></script>
    <!-- ================== END BASE JS ================== -->


    <style>
        .login.login-with-news-feed .news-caption, .register.register-with-news-feed .news-caption {
            background: rgba(155, 145, 145, 0.16);
            color: #999;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 250px 200px;
        }

        .login.login-with-news-feed .news-caption .caption-title, .register.register-with-news-feed .news-caption .caption-title{
            font-family: Trajan;
            font-weight: bold;
            font-size: 45px;
        }
        .login.login-with-news-feed .login-header .brand{
        color: #1974be
        }
    </style>
</head>
<body class="pace-top bg-white">
<!-- begin #page-loader -->
<div id="page-loader" class="fade in"><span class="spinner"></span></div>
<!-- end #page-loader -->

<!-- begin #page-container -->
<div id="page-container" class="fade">
    <!-- begin login -->
    <div class="login login-with-news-feed">
        <!-- begin news-feed -->
        <div class="news-feed">
            <div class="news-image">
                <img src="<?php echo URL; ?>assets/img/bg.jpg" data-id="login-cover-image" alt=""/>
            </div>
            <div class="news-caption">
                <h4 class="caption-title" style=""><i class="fa text-success"></i>
                    <center>Teamwork <br/> Project management</center>
                </h4>

            </div>
        </div>
        <!-- end news-feed -->
        <!-- begin right-content -->
        <div class="right-content">
            <!-- begin login-header -->
            <div class="login-header">
                <div class="brand" >
                    &nbsp; Authentication form
                </div>


            </div>
            <!-- end login-header -->
            <!-- begin login-content -->
            <div class="login-content">
                <form method="POST" class="margin-bottom-0"
                      action="<?php echo URL . 'auth/login' ?>">
                    <div class="form-group m-b-15">
                        <input name="Username" type="email" class="form-control input-lg" placeholder="Email Address"
                               required/>
                    </div>
                    <div class="form-group m-b-15">
                        <input name="Password" type="password" class="form-control input-lg" placeholder="Password"
                               required/>
                    </div>
                    <div class="checkbox m-b-30">
                        <label>
                            <input name="auto" type="checkbox"/> Remember Me
                        </label>
                    </div>
                    <div class="login-buttons">
                        <button type="submit" style="background-color: #1974be"
                                class="btn btn-success btn-block btn-lg">Sign me in
                        </button>
                    </div>
                    <div class="m-t-20 m-b-40 p-b-40 text-inverse">
                        Not a member yet? Click <a href="<?php echo URL . 'auth/create' ?>"
                                                   class="text-success">here</a> to register.
                    </div>
                    <hr/>

                </form>
            </div>
            <!-- end login-content -->
        </div>
        <!-- end right-container -->
    </div>
    <!-- end login -->


</div>
<!-- end page container -->

<!-- ================== BEGIN BASE JS ================== -->
<script src="<?php echo URL; ?>assets/plugins/jquery/jquery-1.9.1.min.js"></script>
<script src="<?php echo URL; ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- ================== END BASE JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="<?php echo URL; ?>assets/js/apps.min.js"></script>
<!-- ================== END PAGE LEVEL JS ================== -->

<script>
    $(document).ready(function () {
        App.init();
    });
</script>

</body>
</html>

