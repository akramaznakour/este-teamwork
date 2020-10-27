<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Home</a></li>
        <li><a href="javascript:;">Form Stuff</a></li>
        <li class="active">Form Elements</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Projects Dashboard
        <small>header small text goes here...</small>
    </h1>
    <!-- end page-header -->

    <!-- begin row -->
    <div class="row">

        <div class="col-md-12 ">
            <!-- begin panel -->
            <div class="panel  panel-success " data-sortable-id="table-basic-7">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                           data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
                           data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                           data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger"
                           data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Responsive Table</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-responsive">
                            <thead>
                            <tr>
                            <tr>
                                <th>Project</th>
                                <th>admin</th>
                                <th>description</th>
                                <th>Start date</th>
                                <th>End date</th>
                                <th>members</th>
                                <th>Progress</th>
                                <th>Status</th>
                                <th>Edit</th>
                            </tr>

                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($projects as $project) { ?>

                                <tr>
                                    <td>
                                        <?php echo $project->title; ?>

                                    </td>
                                    <td>
                                        <div class="p-b-5">
                                            <img style="height: 20px;width: 20px"
                                                 src="<?php echo URL . 'uploads/' .   $this->model['User']->getUser($project->admin_id)->Avatar; ?>"
                                                 alt="user"
                                                 class="profile-pic "/>
                                            <?php echo   $this->model['User']->getUser($project->admin_id)->first_name . '  ' .   $this->model['User']->getUser($project->admin_id)->last_name ?>
                                            &nbsp;<br/>
                                        </div>
                                    </td>
                                    <td>
                                        <span>
                                            <?php echo $project->description; ?>
                                        </span>
                                    </td>

                                    <td>
                                        <span><?php echo $project->start_date; ?></span>
                                    </td>
                                    <td>
                                        <span><?php echo $project->end_date; ?></span>
                                    </td>
                                    <td>
                                        <div>
                                            <?php foreach ($this->model['Project']->getAllMembers($project->id) as $member) { ?>
                                                <div class="p-b-5">
                                                    <img style="height: 20px;width: 20px"
                                                         src="<?php echo URL . 'uploads/' . $member->Avatar; ?>"
                                                         alt="user"
                                                         class="profile-pic "/>
                                                    <?php echo $member->First_name . '  ' . $member->Last_name ?>
                                                    &nbsp;<br/>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </td>
                                    <td>
                                        <span>  <span><?php echo $project->progress; ?>%</span></span>
                                    </td>
                                    <td>
                                        <span><?php echo $project->progress; ?></span>
                                    </td>
                                    <td>
                                            <a class="badge badge-success "
                                           href="<?php echo URL . 'projects/show/' . $project->id ?>">
                                            SHOW
                                        </a>
                                        <a class="badge badge-warning "
                                                href="<?php echo URL . 'projects/show/' . $project->id . '/true' ?>">
                                            EDIT
                                        </a>
                                        <?php if ($project->admin_id == $user->ID) { ?>
                                            <a href="#modal-alert" class="badge badge-danger"
                                               data-toggle="modal">DELETE</a>
                                            <div class="modal fade" id="modal-alert">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">×
                                                            </button>
                                                            <h4 class="modal-title">Alert Header</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="alert alert-danger m-b-0">
                                                                <h4><i class="fa fa-info-circle"></i> Deleting a project
                                                                </h4>
                                                                <p>Are you sure you want to delete this project ?</p>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form method="post" class="form-inline"
                                                                  action="<?php echo URL . 'projects/delete/' . $project->id ?>">
                                                                <a href="javascript:;" class="btn btn-sm btn-white"
                                                                   data-dismiss="modal">Close</a>
                                                                <button type="submit" class="btn btn-sm btn-danger">
                                                                    DELETE
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end panel -->
        </div>
    </div>
    <!-- end theme-panel -->

    <!-- begin scroll to top btn -->
    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i
                class="fa fa-angle-up"></i></a>
    <!-- end scroll to top btn -->
</div>
<!-- end page container -->