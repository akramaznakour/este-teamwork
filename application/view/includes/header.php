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
                    <ul class="dropdown-menu media-list pull-right animated fadeInDown">
                        <li class="dropdown-header">Notifications (<?php echo count($notifications); ?>)</li>
                        <?php foreach ($notifications as $notification) { ?>
                            <li class="media">
                                <a href="#modal-alert-notification-<?php echo $notification->id ?>"   data-toggle="modal">

                                    <div class="media-left"><i class="fa fa-envelope media-object bg-blue"></i></div>
                                    <div class="media-body">
                                        <h6 class="media-heading"> <?php echo $notification->content; ?></h6>
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
                        <img src="<?php echo URL . 'uploads/' . $user->Avatar; ?>" alt=""/>
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

    <div class="modal fade" id="modal-alert-notification-<?php echo $notification->id ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a type="button" class="close" data-dismiss="modal"
                       aria-hidden="true">×
                    </a>
                    <h4 class="modal-title"> <span class="fa fa-bell"></span> &nbsp; Notification</h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-primary m-b-0">

                        <h6><?php echo $notification->content ;?></h6>
                        <span class="pull-right"><?php echo $notification->time ;?></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <form method="post" class="form-inline" action="<?php echo URL.'notifications/setSeen/'.$notification->id?>">
                        <a href="javascript:;" class="btn btn-sm btn-white"
                           data-dismiss="modal">Close</a>

                        <button name="submit_set_seen" type="submit" class="btn btn-sm btn-danger">
                            Set as seen
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>