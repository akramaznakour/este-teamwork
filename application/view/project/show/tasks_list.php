<div class="table-responsive table-striped ">
    <table class="table ">
        <thead>
        <tr>
            <th style="width: 15%">Name</th>
            <th>Start date</th>
            <th>End date</th>
            <th>Responsable</th>
            <th>Progress</th>
            <th>Resources</th>
            <th>Show</th>
            <?php if ($user->ID == $project->admin_id) { ?>

                <th>Admin panel</th>
            <?php } ?>

        </tr>
        </thead>
        <tbody>

        <?php foreach ($tasks as $task) { ?>
            <tr <?php if ($task->parent == 0) { ?> class="active p-l-10"  <?php } ?> style="font-size: 15px">
                <td <?php if (!$task->isGroup && $task->parent) { ?> style="padding-left: 60px;"  <?php } else { ?> style="font-weight: bolder;"   <?php } ?> ><?php echo $task->name; ?></td>

                <td><?php echo $task->start_date; ?></td>
                <td><?php echo $task->end_date; ?></td>
                <td>
                    <?php foreach ($this->model['Task']->getTaskResponsables($task->id) as $responsable) { ?>
                        <?php echo $this->model['User']->getUser($responsable->responsable_id)->last_name . ' ' . $this->model['User']->getUser($responsable->responsable_id)->first_name . "<br/>"; ?>
                    <?php } ?>

                </td>


                <td>
                    <?php if ($task->isGroup == '1') { ?>
                        <form class="form-inline">
                            <input style="width: 70px" name="progress"
                                   class=" input-sm" type="number" disabled min="0" max="100"
                                   value="<?php echo $task->progress ?>"> &nbsp; %
                        </form>
                    <?php } elseif ($this->model['Task']->isResponsableOf($task->id, $user->ID)) { ?>

                        <form method="post" class="form-inline"
                              action="<?php echo URL . 'tasks/updateProgress/' . $task->id ?>">
                            <input style="width: 70px" name="progress"
                                   class="form-control input-sm" type="number" min="0" max="100"
                                   value="<?php echo $task->progress ?>"> &nbsp; %
                            &nbsp;
                            <button class="btn btn-sm btn-primary small"
                                    name="submit_update_task"
                                    type="submit"><i class="fa fa-save "></i>
                            </button>
                            <button class="btn btn-sm btn-success small"
                                    name="submit_finished_task"
                                    type="submit"><i class="fa fa-check-square-o "></i>
                            </button>

                        </form>
                    <?php } else { ?>
                        <form class="form-inline">
                            <input style="width: 70px" name="progress"
                                   class=" input-sm" type="number" disabled min="0" max="100"
                                   value="<?php echo $task->progress ?>"> &nbsp; %
                        </form>
                    <?php } ?>

                </td>
                <td>
                    <?php foreach ($this->model['Task']->getTaskResources($task->id) as $resource) {
                        echo $resource->name . ' <br/>';
                    } ?>
                </td>
                <td>
                    <a class="btn btn-sm btn-primary" href="<?php echo URL.'tasks/show/'.$task->id?>"><span class="fa fa-search"></span></a>
                </td>
                <?php if ($user->ID == $project->admin_id) { ?>

                    <td>

                        <button href="#modal-dialog-<?php echo $task->id; ?>" class="btn btn-sm btn-success"
                                data-toggle="modal"><i class="fa fa-edit "></i>
                        </button>
                        <?php if ($user->ID == $project->admin_id) { ?>
                            <!-- #modal-dialog -->
                            <?php include APP . 'view/project/show/edit_modal.php'; ?>

                        <?php } ?> <?php include APP . 'view/project/show/delete_modal.php'; ?>
                        <button href="#modal-alert-<?php echo $task->id; ?>" class="btn btn-sm btn-danger"
                                data-toggle="modal"><i class="fa fa-trash-o"></i></button>

                    </td>

                <?php } ?>

            </tr>


        <?php } ?>


        </tbody>
    </table>
</div>