<div class="panel-body">

    <?php foreach ($this->model['Task']->getAllTasks($project->id) as $task) { ?>
        <ul class="list-group list-group-lg   list-email">
            <h2><?php echo $task->name?></h2>
            <?php foreach ($this->model['Task']->getAllRemarks($task->id) as $remarque) { ?>

                <li class="list-group-item ">
                    <a class="email-user">
                        <img src="<?php echo URL . 'uploads/' . $this->model['User']->getUser($remarque->user_id)->Avatar; ?>"
                             alt="">
                    </a>
                    <div class="email-info">
                        <span class="email-time"><?php $t = new DateTime($remarque->time);
                            echo $t->diff(new DateTime())->format('%R%a days'); ?></span>
                        <h5 class="email-title">
                            <?php echo $this->model['User']->getUser($remarque->user_id)->last_name . ' ' . $this->model['User']->getUser($remarque->user_id)->first_name ?>
                            <span class="label label-primary f-s-10"><?php if ($this->model['Task']->isResponsableOf($task->id, $remarque->user_id)) {
                                    echo 'Responsable';
                                } else {
                                    echo 'Member';
                                } ?></span>
                        </h5>
                        <p class="email-desc">
                            <?php echo $remarque->content ?>
                        </p>
                    </div>
                </li>
            <?php } ?>
        </ul>

    <?php } ?>


</div>
