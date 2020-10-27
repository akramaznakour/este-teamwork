<body class="fix-header fix-sidebar">
<!-- Preloader - style you can find in spinners.css -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
    </svg>
</div>
<!-- Main wrapper  -->
<div id="main-wrapper">

    <div class="unix-login">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="login-content card">
                        <div class="login-form">
                            <h4>Register</h4>
                            <form  method="post" action="<?php echo URL . 'auth/store' ?>" >
                                <div class="form-group">
                                    <label>Username</label>
                                    <input name="Username" type="text" required class="form-control" autofocus>
                                </div>

                                <div class="form-group">
                                    <label>First Name</label>
                                    <input name="first_name" type="text" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input name="last_name" type="text" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Email </label>
                                    <input name="Email" type="text" required class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input name="Password" type="password" required class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input name="Password2" type="password" required class="form-control">
                                </div>

                                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>
                                <div class="register-link m-t-15 text-center">
                                    <p>Already have account ? <a href="<?php echo URL . 'auth' ?>"> Sign in</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- End Wrapper -->