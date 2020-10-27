<div class="panel-body">
    <form method="POST" action="<?php echo URL . 'tasks/create/' . $project->id; ?>">
        <div id="wizard">
            <ol>
                <li>
                    Parameters
                    <small>Define the task's parameters.</small>
                </li>
                <li>
                    Resources
                    <small>Define the task's resources and Lead manager.
                    </small>
                </li>
                <li>
                    Parent task & Dependence
                    <small>define parent task and dependence</small>
                </li>
            </ol>
            <!-- begin wizard step-1 -->
            <div>
                <fieldset>
                    <!-- begin row -->
                    <div class="form-group ">
                        <label class=" control-label">task name</label>
                        <div>
                            <input name="name" class="form-control" type="text">
                        </div>
                    </div>

                    <div class="form-group ">
                        <label class=" control-label">Dates</label>

                        <div>
                            <div class="input-group input-daterange">

                                <span class="input-group-addon">Start  </span>

                                <input name="start_date" required="" max="<?php echo $project->end_date ?>"
                                       min="<?php echo $project->start_date ?>" class="form-control" type="date">

                                <span class="input-group-addon">End</span>

                                <input name="end_date" required="" max="<?php echo $project->end_date ?>"
                                       min="<?php echo $project->start_date ?>" class="form-control" type="date">
                            </div>
                        </div>

                    </div>
                    <div class="form-group">

                        <label class=" form-group control-label">Description</label>

                        <div><textarea name="note" class="form-control form-group" rows="5"></textarea></div>

                    </div>

                </fieldset>
            </div>


            <div>
                <fieldset>
                    <!-- begin row -->
                    <div class="row">
                        <div class="row">
                            <div id="responsable_tab" class="col-md-12">


                                <div class="col-md-4">

                                    <div class="form-group">
                                        <label> Responsable </label>

                                        <select name="responsables_ids[]" class="form-control"
                                                style="display: inline-block;width: 80%">

                                            <?php foreach ($members as $member) { ?>
                                                <option value="<?php echo $member->id; ?>"><?php echo $member->first_name . ' ' . $member->last_name ?></option>
                                            <?php } ?>

                                        </select>

                                        <span class=" p-0  btn delete-btn"><i class="fa fa-window-close p-0 "></i></span>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn m-l-15 m-b-15 add_responsable"><span class="fa fa-plus">&nbsp;Add</span>
                        </button>

                        <div class="row">

                            <div id="resources_tab" class="col-md-12">

                                <div class="col-md-3">

                                    <div class="form-group">

                                        <label class="form-control-label" for="name">resource</label>

                                        <input class="form-control" name="resources[]" required="" type="text"
                                               style="display: inline-block;width: 80%">

                                        <div class=" p-0  btn delete-btn"><span
                                                    class="fa fa-window-close p-0 "></span></div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn m-l-15 add_resource"><span class="fa fa-plus">&nbsp;Add</span>
                        </button>
                        <!-- end col-6 -->
                    </div>
                    <!-- end row -->
                </fieldset>
            </div>

            <div>
                <!-- begin row -->
                <div class="row">

                    <div class="col-lg-6">

                        <div class="form-group">
                            <label class="form-control-label" for="parent">parent task</label>

                            <select name="parent" class="form-control">
                                <option value="0">Non</option>

                                <?php foreach ($tasks as $task) { ?>
                                    <option value="<?php echo $task->id; ?>"><?php echo $task->name ?></option>
                                <?php } ?>

                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">

                        <div class="form-group">

                            <label class="form-control-label" for="depend">depend</label>

                            <select name="depend" class="form-control">
                                <option value="0">Non</option>

                                <?php foreach ($tasks as $task) { ?>
                                    <option value="<?php echo $task->id; ?>"><?php echo $task->name ?></option>
                                <?php } ?>

                            </select>
                        </div>

                    </div>
                    <button type="submit" name="submit_add_task" class="btn btn-success ">ADD</button>

                </div>

            </div>
    </form>
</div>
</div>