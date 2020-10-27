<body class="fix-header fix-sidebar">
<!-- Preloader - style you can find in spinners.css -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
    </svg>
</div>
<!-- Main wrapper  -->
<div id="main-wrapper">
    <div class="header">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <!-- Logo -->
            <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo URL; ?>">
                    <!-- Logo icon
                    <b><img src="<?php echo URL; ?>images/logo.png" alt="homepage" class="dark-logo"/></b>
                    <!--End Logo icon -->
                    <!-- Logo text
                    <span><img src="<?php echo URL; ?>images/logo-text.png" alt="homepage" class="dark-logo"/></span>-->
                </a>
            </div>
            <!-- End Logo -->
            <div class="navbar-collapse">
                <!-- toggle and nav items -->
                <ul class="navbar-nav mr-auto mt-md-0">
                    <!-- This is  -->
                    <li class="nav-item"><a class="nav-link nav-toggler hidden-md-up text-muted  "
                                            href="javascript:void(0)"><i class="mdi mdi-menu"></i></a></li>
                    <li class="nav-item m-l-10"><a class="nav-link sidebartoggler hidden-sm-down text-muted  "
                                                   href="javascript:void(0)"><i class="ti-menu"></i></a></li>


                </ul>
                <!-- User profile and search -->
                <ul class="navbar-nav my-lg-0">

                    <!-- Profile -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false"><img src="<?php echo URL .'uploads/'. $user->Avatar; ?>"
                                                                           alt="user" class="profile-pic"/></a>
                        <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                            <ul class="dropdown-user">
                                <li><a href="<?php echo URL . 'auth/profile' ?>"><i class="ti-user"></i> Profile</a>
                                </li>
                                <li role="separator" class="divider"></li>

                                <li><a href="<?php echo URL . 'auth/edit' ?>"><i class="ti-settings"></i> Setting</a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li><a href="<?php echo URL . 'auth/logout' ?>"><i class="fa fa-power-off"></i>
                                        Logout</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- End header header -->