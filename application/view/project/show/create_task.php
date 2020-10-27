<div class="panel-body">
    <form method="POST" action="<?php echo URL . 'tasks/create/' . $project->id; ?>">
        <div id="wizard">
            <ol>
                <li>
                    Parameters
                    <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</small>
                </li>
                <li>
                    Resources
                    <small>Aliquam bibendum felis id purus ullamcorper, quis luctus leo
                        sollicitudin.
                    </small>
                </li>
                <li>
                    Login
                    <small>Phasellus lacinia placerat neque pretium condimentum.</small>
                </li>
            </ol>
            <!-- begin wizard step-1 -->
            <div>
                <fieldset>
                    <legend class="pull-left width-full">The parameters</legend>
                    <!-- begin row -->
                    <div class="form-group ">
                        <label class=" control-label">task name</label>
                        <div class="">
                            <input name="name" class="form-control" type="text">
                        </div>
                    </div>

                    <div class="form-group ">
                        <label class=" control-label">Dates</label>
                        <div class="">
                            <div class="input-group input-daterange">
                                <span class="input-group-addon">Start  </span>
                                <input name="start_date" required="" max="<?php echo $project->end_date?>" min="<?php echo $project->start_date?>"
                                       class="form-control" type="date">
                                <span class="input-group-addon">End  </span>
                                <input name="end_date" required=""  max="<?php echo $project->end_date?>" min="<?php echo $project->start_date?>"
                                       class="form-control"
                                       type="date">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class=" form-group control-label">Description</label>
                        <div class="">
                                                            <textarea name="note" class="form-control form-group"
                                                                      rows="5"></textarea>
                        </div>
                    </div>


                    <!-- end row -->
                </fieldset>
            </div>
            <!-- end wizard step-1 -->
            <!-- begin wizard step-2 -->
            <div>
                <fieldset>
                    <legend class="pull-left width-full">Resources</legend>
                    <!-- begin row -->
                    <div class="row">
                        <!-- begin col-6 -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Lead manager </label>
                                <select name="responsable_id"
                                        class="form-control">
                                    <?php foreach ($members as $member) { ?>
                                        <option value="<?php echo $member->ID; ?>"><?php echo $member->First_name . ' ' . $member->Last_name ?></option>
                                    <?php } ?>
                                </select>
                            </div>


                        </div>
                        <!-- end col-6 -->
                        <!-- begin col-6 -->
                        <div class="row">
                            <div id="resources_tab" class="col-md-12">


                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-control-label"
                                               for="name">resource</label>
                                        <input class="form-control"
                                               name="resources[]" required=""
                                               type="text"
                                               style="display: inline-block;width: 80%">
                                        <div
                                                class=" p-0 pull-right btn resource_delete"><span
                                                    class="fa fa-window-close p-0 "></span>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>
                        <button type="button"
                                class="btn add_resource"><span
                                    class="fa fa-plus-circle">&nbsp;Add resources</span>
                        </button>
                        <!-- end col-6 -->
                    </div>
                    <!-- end row -->
                </fieldset>
            </div>

            <!-- end wizard step-3 -->
            <!-- begin wizard step-4 -->
            <div>
                <legend class="pull-left width-full">Login</legend>
                <!-- begin row -->
                <div class="row">
                    <div class="row">

                        <div class="col-lg-6">

                            <div class="form-group">
                                <label class="form-control-label"
                                       for="parent">parent
                                    task</label>
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
                                <label class="form-control-label"
                                       for="depend">depend</label>
                                <select name="depend" class="form-control">
                                    <option value="0">Non</option>
                                    <?php foreach ($tasks as $task) { ?>
                                        <option value="<?php echo $task->id; ?>"><?php echo $task->name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- end wizard step-4 -->
                    <button type="submit" name="submit_add_task"
                            class="btn">
                        Submit
                    </button>
                </div>

            </div>
    </form>
</div>
</div>