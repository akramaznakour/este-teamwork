<div class="modal fade" id="modal-dialog-<?php echo $task->id; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Edit task</h4>
            </div>
            <div class="modal-body">
                <div>
                    <div class="row">


                        <form method="post" class="registration-form container col-md-12"
                              action="<?php echo URL . 'tasks/update/' . $task->id; ?>">
                            <div class="col-md-12">
                                <label class="form-control-label p-b-5 p-t-5">Task
                                    name</label>
                                <input name="name" class="form-control" value="<?php echo $task->name ?>" type="text">
                            </div>

                            <div class="col-md-12 hidden">

                                <input name="style" class="form-control"
                                       value="<?php echo $task->style ?>"
                                       type="text"></div>
                            <div class="col-md-12 hidden">

                                <input name="isGroup" class="form-control" value="<?php echo $task->isGroup ?>"
                                       type="text"></div>

                            <div class="col-md-6 ">

                                <label class="form-control-label p-b-5 p-t-5">Start date</label>
                                <input name="start_date" value="<?php echo $task->start_date ?>"
                                       max="<?php echo $project->end_date ?>" min="<?php echo $project->start_date ?>"
                                       class="form-control" type="date"></div>

                            <div class="col-md-6">

                                <label class="form-control-label p-b-5 p-t-5"> End date </label>
                                <input name="end_date" value="<?php echo $task->end_date ?>"
                                       max="<?php echo $project->end_date ?>" min="<?php echo $project->start_date ?>"
                                       class="form-control" type="date">

                            </div>
                            <div class="col-md-12">

                                <label class="form-control-label p-b-5 p-t-5">Description </label>
                                <textarea name="note" class=" form-control"
                                          required><?php echo $task->note ?></textarea>

                            </div>




                            <div class="col-md-12 p-0 p-b-20 p-t-20">

                                <div id="responsable_tab">

                                    <?php foreach ($this->model['Task']->getTaskResponsables($task->id) as $responsable) { ?>
                                        <div class="col-md-4">
                                            <div class=" p-0">
                                                <label> Responsable </label>

                                                <select name="responsables_ids[]" class="form-control"
                                                        style="display: inline-block;width: 80%">

                                                    <?php foreach ($members as $member) { ?>
                                                        <option value="<?php echo $member->id; ?>" <?php if ($member->id == $responsable->responsable_id)echo 'selected' ;?>><?php echo $member->first_name . ' ' . $member->last_name ?></option>
                                                    <?php } ?>

                                                </select>

                                                <span class=" p-0 btn delete-btn"><i class="fa fa-window-close p-0 "></i></span>

                                            </div>
                                        </div>

                                    <?php } ?>

                                </div>

                            </div>
                            <div class="col-md-12">
                                <button type="button"
                                        class="btn btn-primary btn-sm add_responsable_edit"><span
                                            class="fa fa-plus">&nbsp;Add</span>
                                </button>

                            </div>

                            <div class="col-md-12 p-0 p-b-20 p-t-20">

                                <div id="resources_tab">

                                    <?php foreach ($this->model['Task']->getTaskResources($task->id) as $resource) { ?>
                                        <div class="col-md-3">
                                            <div class=" p-0">
                                                <label class="form-control-label"
                                                >resource</label>
                                                <input class="form-control "
                                                       style="display: inline-block;width: 80%"
                                                       name="resources[]"
                                                       value="<?php echo $resource->name ?>"
                                                       type="text">
                                                <i class=" btn delete-btn p-0" style="padding: 0"><span
                                                            class="fa fa-window-close"></span>
                                                </i>
                                            </div>
                                        </div>

                                    <?php } ?>

                                </div>

                            </div>
                            <div class="col-md-12">
                                <button type="button"
                                        class="btn btn-primary btn-sm add_resource_edit"><span
                                            class="fa fa-plus">&nbsp;Add</span>
                                </button>

                            </div>
                            <div class="col-md-12">

                                <label class="form-control-label p-b-5 p-t-5"> parent task</label>

                                <select name="parent"
                                        class="form-control">
                                    <option value="0" <?php if ($task->parent == '0') { ?> selected="selected" <?php } ?>>
                                        Non
                                    </option>
                                    <?php foreach ($tasks as $ta) { ?>
                                        <option value="<?php echo $ta->id; ?>" <?php if ($ta->id == $task->parent) { ?> selected="selected" <?php } ?> > <?php echo $ta->name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="form-control-label p-b-5 p-t-5"> depend</label>
                                <select name="depend"
                                        class="form-control">
                                    <option value="0" <?php if ($task->depend == '0') { ?> selected="selected" <?php } ?>>
                                        Non
                                    </option>
                                    <?php foreach ($tasks as $ta) { ?>
                                        <option value="<?php echo $ta->id; ?>" <?php if ($ta->id == $task->depend) { ?> selected="selected" <?php } ?> > <?php echo $ta->name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <div class="modal-footer">
                                    <button class="btn btn-white pull-left" data-dismiss="modal">Close</button>
                                    <button type="submit" name="submit_update_task"
                                            class="btn btn-success pull-right">Update
                                    </button>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
