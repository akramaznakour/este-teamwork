<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="<?php echo URL; ?>">Home</a></li>
        <li><a href="<?php echo URL . "projects/"; ?>">Projects list</a></li>
        <li><a href="<?php echo URL . "projects/show/" . $project->id; ?>"><?php echo $project->title; ?></a></li>
        <li class="active"><?php echo $task->name; ?> </li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->

    <h1 class="page-header"><?php echo $task->name ?></h1>

    <div class="row">
        <div class="col-md-8  ">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">Description </h4>
                </div>
                <div class="  clearfix p-20">
                    <?php echo $task->note; ?>
                </div>

            </div>
            <!-- end panel -->
        </div>

        <div class="col-md-4  ">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">Responsables <span
                                class="pull-right label label-success"><?php echo count($this->model['Task']->getTaskResponsables($task->id)) ?>
                            responsable(s) </span></h4>
                </div>
                <ul class="registered-users-list clearfix">
                    <?php foreach ($this->model['Task']->getTaskResponsables($task->id) as $responsable) { ?>


                        <li class=" width-100 ">
                            <a href="javascript:;"><img
                                        src="<?php echo URL . 'uploads/' . $this->model['User']->getUser($responsable->responsable_id)->Avatar ?>"
                                        alt=""></a>
                            <h5 class="username width-100 ">
                                <?php echo $this->model['User']->getUser($responsable->responsable_id)->last_name . ' ' . $this->model['User']->getUser($responsable->responsable_id)->first_name . "<br/>"; ?>
                            </h5>
                        </li>
                    <?php } ?>
                </ul>

            </div>
            <!-- end panel -->
        </div>
        <?php include APP . 'view/task/files.php'; ?>

    </div>


    <?php include APP . 'view/task/remarks.php'; ?>
    <?php include APP . 'view/project/chat.php'; ?>

</div>
<!-- end row -->

</div>
<!-- end #content -->


</div>
