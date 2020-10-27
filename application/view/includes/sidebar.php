<!-- Left Sidebar  -->
<div class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-devider"></li>

                <li><a class="has-arrow  " href="<?php echo URL . "projects/" ?>" aria-expanded="false"><i
                                class="fa fa-plus-circle "></i><span
                                class="hide-menu">Create a new project</span>
                    </a></li>
                <li><a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-level-down"></i><span
                                class="hide-menu">All projects</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">

                        <li><a class="has-arrow" href="#" aria-expanded="false">Unompleted projects
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a class="has-arrow" href="#" aria-expanded="false">Member of

                                        <span class="label label-rouded label-primary "><?php echo count($uncompletedProjectsMemberOf); ?></span>

                                    </a>
                                    <ul aria-expanded="false" class="collapse">
                                        <?php foreach ($uncompletedProjectsMemberOf as $project) { ?>
                                            <li>
                                                <a href="<?php echo URL . "projects/show/" . $project->id ?>"><?php echo $project->title ?>
                                                    <br/>   <span class="small font-italic ">Start date : <?php echo  $project->start_date ?></span>
                                                    <br/>   <span class="small font-italic ">End date : <?php echo  $project->end_date ?></span>                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <li><a class="has-arrow" href="#" aria-expanded="false">Administritor of
                                        <span class="label label-rouded label-primary "><?php echo count($uncompletedProjectsAdminOf); ?></span>

                                    </a>
                                    <ul aria-expanded="false" class="collapse">
                                        <?php foreach ($uncompletedProjectsAdminOf as $project) { ?>
                                            <li>
                                                <a href="<?php echo URL . "projects/show/" . $project->id ?>"><?php echo $project->title ?>
                                                 <br/>   <span class="small font-italic ">Start date : <?php echo  $project->start_date ?></span>
                                                 <br/>   <span class="small font-italic ">End date : <?php echo  $project->end_date ?></span>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            </ul>

                        </li>
                        <li><a class="has-arrow" href="#" aria-expanded="false">Completed projects
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a class="has-arrow" href="#" aria-expanded="false">Member of
                                        <span
                                                class="label label-rouded label-primary "><?php echo count($completedProjectsMemberOf); ?></span>
                                    </a>
                                    <ul aria-expanded="false" class="collapse">
                                        <?php foreach ($completedProjectsMemberOf as $project) { ?>
                                            <li>
                                                <a href="<?php echo URL . "projects/show/" . $project->id ?>"><?php echo $project->title ?></a>
                                                <br/>   <span class="small font-italic ">Start date : <?php echo  $project->start_date ?></span>
                                                <br/>   <span class="small font-italic ">End date : <?php echo  $project->end_date ?></span>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <li><a class="has-arrow" href="#" aria-expanded="false">Administritor of
                                        <span class="label label-rouded label-primary "><?php echo count($completedProjectsAdminOf); ?></span>

                                    </a>
                                    <ul aria-expanded="false" class="collapse">
                                        <?php foreach ($completedProjectsAdminOf as $project) { ?>
                                            <li>
                                                <a href="<?php echo URL . "projects/show/" . $project->id ?>"><?php echo $project->title ?></a>
                                                <br/>   <span class="small font-italic ">Start date : <?php echo  $project->start_date ?></span>
                                                <br/>   <span class="small font-italic ">End date : <?php echo  $project->end_date ?></span>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            </ul>

                        </li>
                    </ul>
                </li>
                <li class="nav-devider"></li>

                <li class="nav-label">NOTIFICATIONS</li>
                <?php foreach ($invitations as $invitation) { ?>
                    <div class="notification ">
                        <p class="small ">
                            You are invited by  <STRONG><?php echo $this->model['User']->getUser($invitation->user_invited_id)->first_name.'  '. $this->model['User']->getUser($invitation->user_invited_id)->last_name; ?><br/></STRONG> to the team
                            <STRONG><?php echo $this->model['Project']->getProject($invitation->project_id)->title; ?></STRONG><br/><br/>
                            PROJECT DESCRIPTION  :<br/>
                            <?php echo $this->model['Project']->getProject($invitation->project_id)->description; ?>
                        </p>

                        <form method="post"
                              action="<?php echo URL . 'invitations/accept/'. $invitation->id ?>">
                            <button name="submit_accept_invitation" type="submit"
                                    class="btn btn-success pull-left btn-sm">Accept
                            </button>
                        </form>

                        </form class=" ">
                        <form method="post"
                              action="<?php echo URL . 'invitations/refuse/'. $invitation->id ?>">
                            <button name="submit_refuse_invitation" type="submit"
                                    class="btn btn-danger  btn-sm">Refuser
                            </button>

                        </form>
                    </div>
                <?php } ?>

                </span>


            </ul>
        </nav>

        <!-- End Sidebar navigation -->
    </div>  <!-- Sidebar scroll-->

    <!-- End Sidebar scroll-->

</div>
<!-- End Left Sidebar  -->