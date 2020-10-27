<!-- Page wrapper  -->
<div class="page-wrapper">

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


    <div class="container-fluid">

        <?php if (isset($_SESSION["flash"]) && $_SESSION["flash"] != '') { ?>
            <div class="alert alert-<?php echo $_SESSION["flash_type"]; ?> alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <?php echo $_SESSION["flash"]; ?>
            </div>
        <?php }
        $_SESSION["flash"] = '' ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body p-b-0">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs customtab2" role="tablist">
                            <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#GANNT_GRAPH"
                                                    role="tab" aria-selected="true"><span class="hidden-sm-up"><i
                                                class="ti-home"></i></span> <span
                                            class="hidden-xs-down">GANNT GRAPH</span></a>
                            </li>
                            <?php if ($user->ID == $project->admin_id) { ?>

                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#CREATE_A_NEW_TASK"
                                                        role="tab"
                                                        aria-selected="false"><span class="hidden-sm-up"><i
                                                    class="ti-user"></i></span> <span
                                                class="hidden-xs-down">CREATE A NEW TASK</span></a>
                                </li>
                            <?php } ?>

                            <li class="nav-item"><a class="nav-link primary" data-toggle="tab" href="#TASKS_LIST"
                                                    role="tab"
                                                    aria-selected="false"><span class="hidden-sm-up"><i
                                                class="ti-email"></i></span> <span
                                            class="hidden-xs-down">TASKS LIST</span></a>
                            </li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#MEMBERS_LIST" role="tab"
                                                    aria-selected="false"><span class="hidden-sm-up"><i
                                                class="ti-email"></i></span> <span
                                            class="hidden-xs-down">MEMBERS LIST</span></a>
                            </li>
                            <?php if ($user->ID == $project->admin_id) { ?>

                                <li class="nav-item"><a class="nav-link"
                                                        href="<?php echo URL . 'projects/edit/' . $project->id; ?>"
                                                        role="tab"
                                                        aria-selected="false"><span class="hidden-sm-up"><i
                                                    class="ti-email pull-right"></i></span> <span
                                                class="hidden-xs-down ">EDIT PROJECT</span></a>

                                </li>
                            <?php } ?>

                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active show" id="GANNT_GRAPH" role="tabpanel">
                                <br/>
                                <div id="embedded-Gantt"></div>

                            </div>

                            <?php if ($user->ID == $project->admin_id) { ?>
                                <br/>

                                <div class="tab-pane p-20" id="CREATE_A_NEW_TASK" role="tabpanel"><br/>
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
                                                                    <label class="form-control-label"
                                                                           for="name">Task
                                                                        name</label>
                                                                    <input name="name" class="form-control"
                                                                           value="task"
                                                                           type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">

                                                                <div class="form-group">
                                                                    <label class="form-control-label"
                                                                           for="actual_start">Start
                                                                        date</label>
                                                                    <input name="actual_start"
                                                                           class="form-control"
                                                                           type="date">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">

                                                                <div class="form-group">
                                                                    <label class="form-control-label"
                                                                           for="actual_end">End
                                                                        date</label>
                                                                    <input name="actual_end"
                                                                           class="form-control"
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
                                                            <h3>The resources</h3>
                                                            <p>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="form-bottom">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="form-control-label"
                                                                           for="name">lead manager </label>
                                                                    <select name="responsable_id"
                                                                            class="form-control">
                                                                        <?php foreach ($members as $member) { ?>
                                                                            <option value="<?php echo $member->ID; ?>"><?php echo $member->First_name . ' ' . $member->Last_name ?></option>
                                                                        <?php } ?>
                                                                    </select>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="resources_tab" class="row">


                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="form-control-label"
                                                                           for="name">resource</label>
                                                                    <input class="form-control"
                                                                           name="resource[]"
                                                                           type="text">
                                                                </div>
                                                            </div>


                                                        </div>
                                                        <button id="add_resource" type="button"
                                                                class="btn "><span
                                                                    class="fa fa-plus-circle">&nbsp;Add resources</span>
                                                        </button>

                                                        <br/><br/>
                                                        <button type="button" class="btn btn-previous">Previous
                                                        </button>
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


                                                        <button type="button" class="btn btn-previous">Previous
                                                        </button>
                                                        <button type="submit" name="submit_add_task"
                                                                class="btn">
                                                            Submit
                                                        </button>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </div></div><?php } ?>

                            <div class="tab-pane p-20 small" id="TASKS_LIST" role="tabpanel">
                                <br/>

                                <div class="table-responsive small">
                                    <table class="table ">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Start date</th>
                                            <th>End date</th>
                                            <th>Responsable</th>
                                            <th>Status</th>
                                            <th>Progress</th>
                                            <th>Resources</th>
                                            <?php if ($user->ID == $project->admin_id) { ?>

                                                <th>Admin panel</th>
                                            <?php } ?>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($tasks

                                                       as $task) { ?>
                                            <tr>
                                                <td><?php echo $task->name; ?></td>

                                                <td><?php echo $task->actual_start; ?></td>
                                                <td><?php echo $task->actual_end; ?></td>
                                                <td><?php echo $this->model['User']->getUser($task->responsable_id)->first_name . ' ' . $this->model['User']->getUser($task->responsable_id)->last_name; ?></td>

                                                <td>
                                                    <?php if ($task->comp < 100 && $task->comp != 0 && $task->group == 0) { ?>
                                                        <span class="btn btn-sm btn-info">in progress</span>
                                                    <?php } elseif ($task->comp == '100') { ?>
                                                        <span class="btn btn-sm btn-success">finished</span>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if ($task->group == '1') { ?>

                                                    <?php } elseif ($task->responsable_id == $user->ID) { ?>
                                                        <form method="post" class="form-inline"
                                                              action="<?php echo URL . 'tasks/updateProgress/' . $task->id ?>">
                                                            <input style="width: 70px" name="comp"
                                                                   class="form-control input-sm" type="number"
                                                                   value="<?php echo $task->comp ?>"> &nbsp; %
                                                            &nbsp;
                                                            <button class="btn btn-sm btn-primary small"
                                                                    name="submit_update_task"
                                                                    type="submit">UPDATE
                                                            </button>
                                                            <button class="btn btn-sm btn-success small"
                                                                    name="submit_finished_task"
                                                                    type="submit">FINISHE
                                                            </button>
                                                        </form>
                                                    <?php } else { ?>
                                                        <form class="form-inline">
                                                            <input style="width: 70px" name="comp"
                                                                   class=" input-sm" type="number" disabled
                                                                   value="<?php echo $task->comp ?>"> &nbsp; %
                                                        </form>
                                                    <?php } ?>

                                                </td>
                                                <td><?php echo $task->resources; ?></td>
                                                <?php if ($user->ID == $project->admin_id) { ?>

                                                    <td><a href="" class="btn btn-danger btn-sm">EDIT</a></td>
                                                <?php } ?>

                                            </tr>

                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div class="tab-pane p-20" id="MEMBERS_LIST" role="tabpanel">
                                <br/>
                                <ul>
                                    <?php foreach ($members as $member) { ?>
                                        <img style="height: 50px;width: 50px"
                                             src="<?php echo URL . 'uploads/' . $member->Avatar; ?>" alt="user"
                                             class="profile-pic"/>
                                        <?php echo $member->First_name . '  ' . $member->Last_name ?>
                                        &nbsp;
                                    <?php } ?>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
