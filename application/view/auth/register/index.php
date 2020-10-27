<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8"/>
    <title> Register Page</title>
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
    <!-- begin register -->
    <div class="register register-with-news-feed">
        <!-- begin news-feed -->
        <div class="news-feed">
            <div class="news-image">
                <img src="<?php echo URL; ?>assets/img/bg.jpg" data-id="login-cover-image" alt=""/>
            </div>
            <div class="news-caption">
                <h4 class="caption-title"><i
                            class="fa text-success"></i>
                    <center>Teamwork <br/> Project management</center>
                </h4>

            </div>
        </div>
        <!-- end news-feed -->
        <!-- begin right-content -->
        <div class="right-content">
            <!-- begin register-header -->
            <h1 class="register-header p-l-40 p-b-20 "  style="color: #1974be">
                    &nbsp; Registration form


            </h1>
            <!-- end register-header -->
            <!-- begin register-content -->
            <div class="register-content">
                <form method="POST" class="margin-bottom-0" action="<?php echo URL . 'auth/store' ?>">

                    <label class="control-label">Name <span class="text-danger">*</span></label>
                    <div class="row row-space-10">
                        <div class="col-md-6 m-b-15">
                            <input name="first_name" type="text" class="form-control" placeholder="First name"
                                   required/>
                        </div>
                        <div class="col-md-6 m-b-15">
                            <input name="last_name" type="text" class="form-control" placeholder="Last name" required/>
                        </div>
                    </div>
                    <label class="control-label">Email <span class="text-danger">*</span></label>
                    <div class="row m-b-15">
                        <div class="col-md-12">
                            <input name="email" type="text" class="form-control" placeholder="Email address" required/>
                        </div>
                    </div>
                    <label class="control-label">Password <span class="text-danger">*</span></label>
                    <div class="row row-space-10">
                        <div class="col-md-6 m-b-15">
                            <input name="password" type="password" class="form-control" placeholder="Password"
                                   required/>
                        </div>
                        <div class="col-md-6 m-b-15">
                            <input name="password2" type="password" class="form-control" placeholder="Re-enter password"
                                   required/>
                        </div>
                    </div>
                    <?php if (isset($_SESSION['flash'] ) && $_SESSION['flash']!='' ){?>
                        <div class="alert alert-danger fade in m-b-15">
                            <strong>Error ! &nbsp; </strong>
                            <?php echo $_SESSION['flash']; $_SESSION['flash']='';  ?>
                            <span class="close" data-dismiss="alert">×</span>
                        </div>
                    <?php } ?>

                    <div class="register-buttons">
                        <button type="submit" class="btn btn-primary btn-block btn-lg">Sign Up</button>
                    </div>
                    <div class="m-t-20 m-b-40 p-b-40 text-inverse">
                        Already a member? Click <a href="<?php echo URL . 'auth' ?>">here</a> to login.
                    </div>
                    <hr/>
                    <p class="text-center">

                    </p>
                </form>
            </div>
            <!-- end register-content -->
        </div>
        <!-- end right-content -->
    </div>
    <!-- end register -->

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
