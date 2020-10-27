<!-- Left Sidebar  -->
<div class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <nav class="sidebar-nav active">
                <ul id="sidebarnav" class="in">
                    <li class="nav-devider"></li>
                    <li><a class="  " href="<?php echo URL.'projects/create'?>" aria-expanded="false"><i class="fa fa-plus  "></i><span
                                    class="hide-menu">Create a new project </span></a>
                    </li>
                    <li class="nav-devider"></li>

                    <li class="nav-label">UNCOMPLETED PROJECTS</li>
                    <li><a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-spinner   "></i><span
                                    class="hide-menu">Member of <span
                                        class="label label-rouded label-primary pull-right"><?php echo count($uncompletedProjectsMemberOf); ?></span></span></a>
                        <ul aria-expanded="false" class="collapse">
                            <?php foreach ($uncompletedProjectsMemberOf as $proj) { ?>
                                <li>
                                    <a href="<?php echo URL . "projects/show/" . $proj->id ?>"><?php echo $proj->title ?>
                                        <br/> <span
                                                class="small font-italic "> <?php echo $proj->start_date ?></span>
                                        <span
                                                class="small font-italic ">/ <?php echo $proj->end_date ?></span>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li><a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-spinner  "></i><span
                                    class="hide-menu">Admin of <span
                                        class="label label-rouded label-primary pull-right"><?php echo count($uncompletedProjectsAdminOf); ?></span></span></a>
                        <ul aria-expanded="false" class="collapse">
                            <?php foreach ($uncompletedProjectsAdminOf as $proj) { ?>
                                <li>
                                    <a href="<?php echo URL . "projects/show/" . $proj->id ?>"><?php echo $proj->title ?>
                                        <br/> <span
                                                class="small font-italic "> <?php echo $proj->start_date ?></span>
                                        <span
                                                class="small font-italic "> : <?php echo $proj->end_date ?></span>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li class="nav-devider"></li>
                    <li class="nav-label">COMPLETED PROJECTS</li>
                    <li><a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-check-square-o"></i><span
                                    class="hide-menu">Member of <span
                                        class="label label-rouded label-primary pull-right"><?php echo count($completedProjectsMemberOf); ?></span></span></a>
                        <ul aria-expanded="false" class="collapse">
                            <?php foreach ($completedProjectsMemberOf as $proj) { ?>
                                <li>
                                    <a href="<?php echo URL . "projects/show/" . $proj->id ?>"><?php echo $proj->title ?>
                                        <br/> <span
                                                class="small font-italic "> <?php echo $proj->start_date ?></span>
                                        <span
                                                class="small font-italic ">/ <?php echo $proj->end_date ?></span>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li><a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-check-square-o"></i><span
                                    class="hide-menu">Admin of <span
                                        class="label label-rouded label-primary pull-right"><?php echo count($completedProjectsAdminOf); ?></span></span></a>
                        <ul aria-expanded="false" class="collapse">
                            <?php foreach ($completedProjectsAdminOf as $proj) { ?>
                                <li>
                                    <a href="<?php echo URL . "projects/show/" . $proj->id ?>"><?php echo $proj->title ?>
                                        <br/> <span
                                                class="small font-italic "> <?php echo $proj->start_date ?></span>
                                        <span
                                                class="small font-italic "> : <?php echo $proj->end_date ?></span>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>


                </ul>
            </nav>
            <ul id="sidebarnav">


                <li class="nav-devider"></li>

                <li class="nav-label">NOTIFICATIONS</li>
                <?php foreach ($invitations as $invitation) { ?>
                    <div class="notification ">
                        <p class="small ">
                            You are invited by
                            <STRONG><?php echo $this->model['User']->getUser($invitation->user_invited_id)->first_name . '  ' . $this->model['User']->getUser($invitation->user_invited_id)->last_name; ?>
                                <br/></STRONG> to the team
                            <STRONG><?php echo $this->model['Project']->getProject($invitation->project_id)->title; ?></STRONG><br/><br/>
                            PROJECT DESCRIPTION :<br/>
                            <?php echo $this->model['Project']->getProject($invitation->project_id)->description; ?>
                        </p>

                        <form method="post"
                              action="<?php echo URL . 'invitations/accept/' . $invitation->id ?>">
                            <button name="submit_accept_invitation" type="submit"
                                    class="btn btn-success pull-left btn-sm">Accept
                            </button>
                        </form>

                        </form class=" ">
                        <form method="post"
                              action="<?php echo URL . 'invitations/refuse/' . $invitation->id ?>">
                            <button name="submit_refuse_invitation" type="submit"
                                    class="btn btn-danger  btn-sm">Refuser
                            </button>

                        </form>
                    </div>
                <?php } ?>


            </ul>
        </nav>

        <!-- End Sidebar navigation -->
    </div>  <!-- Sidebar scroll-->

    <!-- End Sidebar scroll-->

</div>
<!-- End Left Sidebar  -->