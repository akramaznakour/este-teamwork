<div class="panel-body">

    <ul class="list-group list-group-lg   list-email">
        <?php foreach ($this->model['Project']->getAllRemarks($project->id) as $remarque) { ?>

            <li class="list-group-item ">
                <a class="email-user">
                    <img src="<?php echo URL . 'uploads/' . $this->model['User']->getUser($remarque->user_id)->avatar; ?>"
                         alt="">
                </a>
                <div class="email-info">
                    <span class="email-time"><?php echo $remarque->time ?></span>
                    <h5 class="email-title">
                        <?php echo $this->model['User']->getUser($remarque->user_id)->last_name . ' ' . $this->model['User']->getUser($remarque->user_id)->first_name ?>

                        <?php if ($remarque->task_id != 0 && $this->model['Task']->isResponsableOf($task->id, $remarque->user_id)) {
                            echo '<span class="label label-success f-s-10">Responsable of the task</span>';
                        } ?>

                        <?php if ($remarque->task_id != 0) { ?>
                            <span class="label label-primary f-s-10"><?php echo 'task : ' . $this->model['Task']->getTask($remarque->task_id)->name; ?></span>
                        <?php } else { ?>
                            <span class="label label-primary f-s-10"><?php echo 'project : ' . $this->model['Project']->getProject($remarque->project_id)->title; ?></span>
                        <?php } ?>


                    </h5>
                    <p class="email-desc">
                        <?php echo $remarque->content ?>
                    </p>
                </div>
            </li>
        <?php } ?>
    </ul>
    <div class="panel-body">

        <form class="form-horizontal" action="<?php echo URL . 'tasks/addRemarKProject/' . $project->id . '/' ?>"
              method="post">
            <div class="form-group">
                <div class="col-md-12">
                    <textarea required class="form-control" placeholder="Add your remark" rows="5"
                              name="content"></textarea>
                </div>
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-sm btn-success">Add Remarque</button>
            </div>
        </form>
    </div>
</div>
