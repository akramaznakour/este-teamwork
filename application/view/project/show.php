<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Members Dashboard</h3></div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="<?php echo URL . ''; ?>">Home</a></li>
                <li class="breadcrumb-item "><a href="<?php echo URL . 'projects/'; ?>">Projects</a></li>
                <li class="breadcrumb-item active"><?php echo $project->title; ?> </li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <div class="container-fluid">
        <?php if ($user->ID == $project->admin_id) { ?>
            <a class="btn btn-outline-primary pull-right" style="position: relative"
               href="<?php echo URL . 'projects/edit/' . $project->id; ?>">EDIT</a>
        <?php }; ?>
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <!-- Column -->
                        <div id="embedded-Gantt"></div>

                        <!-- Column -->
                    </div>
                </div>
                <div class="card">
                    <div class="card-title">

                    </div>
                    <div class="card-body">
                        <div class="basic-elements">

                            <div class="assessment-container container">
                                <div class="row">
                                    <div class="col-md-12 form-box">
                                        <form method="post" class="registration-form"
                                              action="<?php echo URL . 'tasks/create/' . $project->id; ?>">
                                            <fieldset>
                                                <div class="form-top">
                                                    <div class="form-top-left ">
                                                        <h3> the parameters</h3>
                                                        <p> description to the parameters</p>
                                                    </div>
                                                </div>
                                                <div class="form-bottom">

                                                    <div id="line_form" class="row">
                                                        <div class="col-lg-6">

                                                            <div class="form-group">
                                                                <label class="form-control-label" for="name">Task
                                                                    name</label>
                                                                <input name="name" class="form-control" value="task"
                                                                       type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">

                                                            <div class="form-group">
                                                                <label class="form-control-label" for="actual_start">Start
                                                                    date</label>
                                                                <input name="actual_start" class="form-control"
                                                                       type="date">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">

                                                            <div class="form-group">
                                                                <label class="form-control-label" for="actual_end">End
                                                                    date</label>
                                                                <input name="actual_end" class="form-control"
                                                                       type="date">
                                                            </div>
                                                        </div>


                                                    </div>


                                                    <div class="form-group">
                                                        <label class="form-control-label">Description </label>
                                                        <textarea name="note" style="height: 100px"
                                                                  class=" form-control" rows="8"
                                                                  cols="50">description..</textarea>

                                                    </div>
                                                    <button type="button" class="btn btn-next">Next</button>
                                                </div>
                                            </fieldset>

                                            <fieldset>
                                                <div class="form-top">
                                                    <div class="form-top-left">
                                                        <h3>The rescuers</h3>
                                                        <p>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="form-bottom">

                                                    <div id="resources_tab">
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <div class="form-group">
                                                                    <label class="form-control-label"
                                                                           for="name">rescource</label>
                                                                    <input class="form-control" name="rescource[]"
                                                                           type="text">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-5" id="respo">
                                                                <div class="form-group">
                                                                    <label class="form-control-label"
                                                                           for="name">responsable</label>
                                                                    <select name="responsable[1][]"
                                                                            class="form-control">
                                                                        <?php foreach ($members as $member) { ?>
                                                                            <option value="<?php echo $member->First_name . ' ' . $member->Last_name ?>"><?php echo $member->First_name . ' ' . $member->Last_name ?></option>
                                                                        <?php } ?>
                                                                    </select>

                                                                </div>
                                                            </div>

                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label class="form-control-label"
                                                                           for="name">&nbsp;</label>
                                                                    <button type="button" class="btn add_respo">
                                                                    <span class="fa fa-plus-circle">
                                                                        &nbsp;Add Responsable
                                                                    </span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <button id="add_rescource" type="button" class="btn "><span
                                                                class="fa fa-plus-circle">&nbsp;Add Rescource</span>
                                                    </button>

                                                    <br/><br/>
                                                    <button type="button" class="btn btn-previous">Previous</button>
                                                    <button type="button" class="btn btn-next">Next</button>


                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-top">
                                                    <div class="form-top-left">
                                                        <h3> Lorem ipsum dolor sit amet</h3>
                                                        <p>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="form-bottom">
                                                    <div class="row">

                                                        <div class="col-lg-6">

                                                            <div class="form-group">
                                                                <label class="form-control-label" for="parent">parent
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


                                                    <button type="button" class="btn btn-previous">Previous</button>
                                                    <button type="submit" name="submit_add_task" class="btn">Submit
                                                    </button>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <!-- End PAge Content -->
    </div>
    <!-- End PAge Content -->

    <!-- Container fluid  -->
