<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="<?php echo URL; ?>">Home</a></li>
        <li><a href="<?php echo URL . "projects/"; ?>">Projects list</a></li>
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

            <div class="panel panel-default panel-with-tabs">

                <div class="panel-heading p-0">

                    <div class="panel-heading-btn m-r-10 m-t-10">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-inverse"
                           data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    </div>


                    <!-- begin nav-tabs -->
                    <div class="tab-overflow overflow-right overflow-left">
                        <ul class="nav nav-tabs">

                            <li class="prev-button" style=""><a href="javascript:;" data-click="prev-tab" class="text-inverse"><i class="fa fa-arrow-left"></i></a></li>


                            <li <?php if ($page == 'project_infos') { ?> class="active"<?php } ?> ><a href="#nav-tab2-1" data-toggle="tab">Project infos</a></li>
                            <li <?php if ($page == 'members_list') { ?> class="active"<?php } ?>><a href="#nav-tab2-2" data-toggle="tab">Members list</a></li>
                            <li <?php if ($page == 'tasks_list') { ?> class="active"<?php } ?>><a href="#nav-tab2-4" data-toggle="tab">Tasks list</a></li>
                            <li <?php if ($page == 'gant_graph') { ?> class="active"<?php } ?>><a href="#nav-tab2-5" data-toggle="tab">Gantt graph</a></li>
                            <li <?php if ($page == 'remarks') { ?> class="active"<?php } ?>><a href="#nav-tab2-6" data-toggle="tab">Remarks</a></li>


                            <li class="next-button" style=""><a href="javascript:;" data-click="next-tab" class="text-inverse"><i class="fa fa-arrow-right"></i></a></li>

                        </ul>
                    </div>

                </div>
                <div class="tab-content">

                    <div class="tab-pane    <?php if  ($page == 'project_infos'){ ?>  active in <?php } ?>  "id="nav-tab2-1">
                        <?php include APP . 'view/project/partials/show/project_infos.php'; ?>
                    </div>
                    <div class="tab-pane    <?php if  ($page == 'members_list'){ ?>  active in <?php } ?>" id="nav-tab2-2">
                        <?php include APP . 'view/project/partials/commun/members_list.php'; ?>
                    </div>
                    <div class="tab-pane    <?php if  ($page == 'tasks_list'){ ?>   active in <?php } ?>  " id="nav-tab2-4">
                        <?php include APP . 'view/project/partials/commun/tasks_list.php'; ?>
                    </div>
                    <div class="tab-pane    <?php if  ($page == 'gant_graph'){ ?>   active in <?php } ?>"   id="nav-tab2-5">
                        <?php include APP . 'view/project/partials/commun/gant_graph.php'; ?>
                    </div>
                    <div class="tab-pane    <?php if  ($page == 'remarks'){ ?>       active in <?php } ?>"       id="nav-tab2-6">
                        <?php include APP . 'view/project/partials/commun/remaks.php'; ?>
                    </div>

                </div>
            </div>
        </div>
        <!-- end row -->
        <?php include APP . 'view/project/partials/commun/chat.php'; ?>

    </div>
    <!-- end #content -->


</div>
<!-- end page container -->