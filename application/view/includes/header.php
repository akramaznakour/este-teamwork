<!-- begin #page-loader -->
<div id="page-loader" class="fade in"><span class="spinner"></span></div>
<!-- end #page-loader -->

<!-- begin #page-container -->
<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
    <!-- begin #header -->
    <div id="header" class="header navbar navbar-default navbar-fixed-top">
        <!-- begin container-fluid -->
        <div class="container-fluid">
            <!-- begin mobile sidebar expand / collapse button -->
            <div class="navbar-header">
                <a href="<?php echo URL; ?>" style="width: 600px;font-family: 'Segoe UI Semilight' "
                   class="navbar-brand">
                    <img style="display: inline" height="40" src="<?php echo URL . "assets/img/teamwork.png" ?>">
                    <span class="p-0">Teamwork : Project management</span>
                </a>
                <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- end mobile sidebar expand / collapse button -->

            <!-- begin header navigation right -->
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14" aria-expanded="tu">
                        <i class="fa fa-bell-o"></i>
                        <span class="label"><?php echo count($notifications); ?></span>
                    </a>
                    <ul class="dropdown-menu media-list pull-right animated fadeInDown" style="height: 300px;overflow: auto">
                        <li class="dropdown-header">Notifications (<?php echo count($notifications); ?>)</li>
                        <?php foreach ($notifications as $notification) { ?>
                            <li class="media">
                                <a href="#modal-alert-notification-<?php echo $notification->id ?>"   data-toggle="modal">

                                     <div class="media-body">
                                        <h6 class="media-heading"> <?php echo substr($notification->content,0,30); ?>...</h6>
                                        <div class="text-muted f-s-11"><?php echo $notification->time ?></div>
                                    </div>
                                </a>


                            </li>
                        <?php } ?>

                        <li class="dropdown-footer text-center">
                         </li>
                    </ul>






                </li>
                <li class="dropdown navbar-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo URL . 'uploads/' . $user->avatar; ?>" alt=""/>
                        <span class="hidden-xs"><?php echo $user->first_name . ' ' . $user->last_name; ?> </span> <b
                                class="caret"></b>
                    </a>
                    <ul class="dropdown-menu animated fadeInLeft">
                        <li class="arrow"></li>
                        <li><a href="<?php echo URL . 'auth/edit' ?>">Edit account</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo URL . 'auth/logout' ?>">Log Out</a></li>
                    </ul>
                </li>
            </ul>
            <!-- end header navigation right -->
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end #header -->

    <?php foreach ($notifications as $notification) { ?>

    <?php include APP.'view/includes/notification.php'?>
<?php } ?>