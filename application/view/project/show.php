<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="<?php echo URL . ''; ?>">Home</a></li>
        <li><a href="<?php echo URL . 'projects/'; ?>">Projects</a></li>
        <li class="active"><?php echo $project->title; ?> </li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header"><?php echo $project->title; ?>

    </h1>
    <!-- end page-header -->

    <!-- begin row -->
    <div class="row">

        <div class="col-md-12">

            <div class="progress progress-striped active ">
            <div class="progress-bar progress-bar-success"
                 style="width: <?php echo $project->progress; ?>%"><?php echo $project->progress; ?>%
            </div>
        </div>
    </div>
    <div class="col-md-12">

        <div class="panel panel-default panel-with-tabs" data-sortable-id="ui-unlimited-tabs-2" data-init="true">

            <div class="panel-heading p-0">

                <div class="panel-heading-btn m-r-10 m-t-10">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-inverse"
                       data-click="panel-expand"><i class="fa fa-expand"></i></a>
                </div>


                <!-- begin nav-tabs -->
                <div class="tab-overflow overflow-right overflow-left">
                    <ul class="nav nav-tabs">
                        <li class="prev-button" style=""><a href="javascript:;" data-click="prev-tab"
                                                            class="text-inverse"><i
                                        class="fa fa-arrow-left"></i></a></li>

                        <?php if ($user->ID == $project->admin_id) { ?>

                            <li <?php if ($toEditPage) { ?> class="active"<?php } ?> >
                                <a href="#nav-tab2-1" data-toggle="tab">
                                    Edit project
                                </a>
                            </li>
                            <li class=""><a href="#nav-tab2-2" data-toggle="tab">Members list</a></li>
                            <li class=""><a href="#nav-tab2-3" data-toggle="tab">Create a new task</a></li>
                            <li <?php if (!$toEditPage) { ?> class="active"<?php } ?>><a
                                        href="#nav-tab2-4" data-toggle="tab">Tasks list</a></li>
                            <li class=""><a href="#nav-tab2-5" data-toggle="tab">Gantt graph</a></li>
                        <?php } else { ?>
                            <li class="active"><a href="#nav-tab2-4" data-toggle="tab">Tasks list</a></li>
                            <li class=""><a href="#nav-tab2-2" data-toggle="tab">Members list</a></li>
                            <li class=""><a href="#nav-tab2-5" data-toggle="tab">Gantt graph</a></li>
                        <?php } ?>


                        <li class="next-button" style=""><a href="javascript:;" data-click="next-tab"
                                                            class="text-inverse"><i
                                        class="fa fa-arrow-right"></i></a></li>
                    </ul>
                </div>

            </div>
            <div class="tab-content">
                <?php if ($user->ID == $project->admin_id) { ?>

                    <div class="tab-pane fade <?php if ($toEditPage) { ?>  active in <?php } ?> "
                         id="nav-tab2-1">
                        <?php include APP . 'view/project/show/edit_project.php'; ?>
                    </div>
                    <div class="tab-pane fade" id="nav-tab2-2">
                        <?php include APP . 'view/project/show/members_list.php'; ?>
                    </div>
                    <div class="tab-pane fade" id="nav-tab2-3">
                        <?php include APP . 'view/project/show/create_task.php'; ?>
                    </div>
                    <div class="tab-pane fade  <?php if (!$toEditPage) { ?>  active in <?php } ?> "
                         id="nav-tab2-4">
                        <?php include APP . 'view/project/show/tasks_list.php'; ?>
                    </div>
                    <div class="tab-pane fade" id="nav-tab2-5">
                        <?php include APP . 'view/project/show/gant_graph.php'; ?>
                    </div>
                <?php } else { ?>
                    <div class="tab-pane fade" id="nav-tab2-2">
                        <?php include APP . 'view/project/show/members_list.php'; ?>
                    </div>
                    <div class="tab-pane fade active in " id="nav-tab2-4">
                        <?php include APP . 'view/project/show/tasks_list.php'; ?>
                    </div>
                    <div class="tab-pane fade" id="nav-tab2-5">
                        <?php include APP . 'view/project/show/gant_graph.php'; ?>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
    <!-- end row -->
    <?php include APP . 'view/project/chat.php'; ?>

</div>
<!-- end #content -->


</div>
<!-- end page container -->