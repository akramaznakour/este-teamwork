<!-- begin panel -->
<div class="panel panel-inverse">
    <div class="panel-heading">

        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
                        class="fa fa-expand"></i></a>
        </div>
        <h4 class="panel-title">Remarks</h4>
    </div>
    <div class="panel-body">

        <ul class="list-group list-group-lg   list-email">
            <?php foreach ($this->model['Task']->getTaskRemarks($task->id) as $remarque) { ?>

                <li class="list-group-item ">
                    <a href="email_detail.html" class="email-user">
                        <img src="<?php echo URL . 'uploads/' . $this->model['User']->getUser($remarque->user_id)->avatar; ?>"
                             alt="">
                    </a>
                    <div class="email-info">
                        <span class="email-time"><?php echo $remarque->time ?></span>
                        <h5 class="email-title">
                            <?php echo $this->model['User']->getUser($remarque->user_id)->last_name . ' ' . $this->model['User']->getUser($remarque->user_id)->first_name ?>
                            <?php if ($this->model['Task']->isResponsableOf($task->id, $remarque->user_id)) {
                                echo '<span class="label label-success f-s-10">Responsable of the task</span>';
                            } ?>
                        </h5>
                        <p class="email-desc">
                            <?php echo $remarque->content ?>
                        </p>
                    </div>
                </li>
            <?php } ?>

        </ul>
        <div class="panel-body">

            <form class="form-horizontal" action="<?php echo URL . 'tasks/addRemark/' . $project->id .'/'.$task->id  ?>" method="post">
                <div class="form-group">
                    <div class="col-md-12">
                        <textarea class="form-control" placeholder="Add your remark" rows="5" name="content"></textarea>
                    </div>
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-sm btn-success">Add Remarque</button>
                </div>
            </form>
        </div>
    </div>
</div>
