<!-- begin #sidebar -->
<div id="sidebar" class="sidebar">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
            <li class="nav-profile">
                <div class="image">
                    <a href="javascript:;"><img style="width: 100%;height: 100%;"
                                                src="<?php echo URL . 'uploads/' . $user->Avatar; ?>" alt=""/></a>
                </div>
                <div class="info">
                    Welcome
                    <small><?php echo $user->first_name . ' ' . $user->last_name; ?> </small>
                </div>
            </li>
        </ul>
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav">

            <!-- begin sidebar minify button -->
            <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i
                            class="fa fa-angle-double-left"></i></a></li>
            <!-- end sidebar minify button -->

            <li class="has-sub">
                <a href="<?php echo URL . 'projects/index' ?>">
                    <b class=" pull-right"></b>
                    <i class="fa fa-list"></i>
                    <span>All projects</span>
                    <span class="badge pull-right"><?php echo count($projects); ?></span>

                </a>
            </li>
            <li class="has-sub">
                <a href="<?php echo URL . 'projects/create' ?>">
                    <b class=" pull-right"></b>
                    <i class="fa fa-plus"></i>
                    <span>Create a new project</span>
                </a>
            </li>
            <li class="nav-header">UNCOMPLETED PROJECTS</li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-spinner"></i>
                    <span class="badge pull-right"><?php echo count($uncompletedProjectsMemberOf); ?></span>
                    <span>Member of</span>
                </a>
                <ul class="sub-menu p-0">
                    <?php foreach ($uncompletedProjectsMemberOf as $proj) { ?>
                        <li class="p-l-30 p-5" <?php if( $proj->actual_end =="" && $proj->end_date > Date('Y-m-d')  ){ ?> style="background-color: #00acac ; color: white;" <?php }else { ?> style="background-color: #ff5b57 ;color: white;" <?php } ?> ><a  style="color: white" href="<?php echo URL . "projects/show/" . $proj->id ?>"><?php echo $proj->title ?></a >
                            &nbsp; <?php    echo $proj->start_date ?> &nbsp; <?php echo $proj->end_date ?></li>

                    <?php } ?>

                </ul>
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-spinner"></i>
                    <span class="badge pull-right"><?php echo count($uncompletedProjectsAdminOf); ?></span>
                    <span>Admin of</span>
                </a>
                <ul class="sub-menu p-0">
                    <?php foreach ($uncompletedProjectsAdminOf as $proj) { ?>
                        <li class="p-l-30 p-5" <?php if( $proj->actual_end =="" && $proj->end_date > Date('Y-m-d')  ){ ?> style="background-color: #00acac ; color: white;" <?php }else { ?> style="background-color: #ff5b57 ;color: white;" <?php } ?> ><a  style="color: white" href="<?php echo URL . "projects/show/" . $proj->id ?>"><?php echo $proj->title ?></a >
                            &nbsp; <?php    echo $proj->start_date ?> &nbsp; <?php echo $proj->end_date ?></li>
                    <?php } ?>

                </ul>
            </li>
            <li class="nav-header">COMPLETED PROJECTS</li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-check-square-o"></i>
                    <span class="badge pull-right"><?php echo count($completedProjectsMemberOf); ?></span>
                    <span>Member of</span>
                </a>
                <ul class="sub-menu">
                    <?php foreach ($completedProjectsMemberOf as $proj) { ?>
                        <li><a href="<?php echo URL . "projects/show/" . $proj->id ?>"><?php echo $proj->title ?></a>
                            &nbsp; <?php echo $proj->start_date ?> &nbsp; <?php echo $proj->end_date ?></li>
                    <?php } ?>

                </ul>
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-check-square-o"></i>
                    <span class="badge pull-right"><?php echo count($completedProjectsAdminOf); ?></span>
                    <span>Admin of</span>
                </a>
                <ul class="sub-menu">
                    <?php foreach ($completedProjectsAdminOf as $proj) { ?>
                        <li><a href="<?php echo URL . "projects/show/" . $proj->id ?>"><?php echo $proj->title ?></a>
                            &nbsp; <?php echo $proj->start_date ?> &nbsp; <?php echo $proj->end_date ?></li>
                    <?php } ?>

                </ul>
            </li>
            <li class="nav-header">NOTIFICATIONS</li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-bell-o"></i>
                    <span class="badge  badge-success pull-right"><?php echo count($invitations); ?></span>
                    <span> Invitations</span>
                </a>
                <ul class="sub-menu">
                    <?php foreach ($invitations as $invitation) { ?>


                        <div class="notification p-10">
                            <p style="color: white">
                                You are invited by
                                <STRONG><?php echo $this->model['User']->getUser($this->model['Project']->getProject($invitation->project_id)->admin_id)->first_name . '  ' .$this->model['User']->getUser($this->model['Project']->getProject($invitation->project_id)->admin_id)->    last_name; ?>
                                    <br/></STRONG> to the team
                                <STRONG><?php echo $this->model['Project']->getProject($invitation->project_id)->title; ?></STRONG><br/><br/>
                                PROJECT DESCRIPTION :<br/>
                                <?php echo $this->model['Project']->getProject($invitation->project_id)->description; ?>
                            </p>

                            <form method="post"
                                  action="<?php echo URL . 'memberships/accept/' . $invitation->id ?>">
                                <button name="submit_accept_invitation" type="submit"
                                        class="btn btn-success pull-left btn-sm">Accept
                                </button>
                            </form>

                            </form class=" ">
                            <form method="post"
                                  action="<?php echo URL . 'memberships/refuse/' . $invitation->id ?>">
                                <button name="submit_refuse_invitation" type="submit"
                                        class="btn btn-danger  btn-sm">Refuser
                                </button>

                            </form>
                        </div>
                    <?php } ?>

                </ul>
            </li>



        </ul>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>
<!-- end #sidebar -->