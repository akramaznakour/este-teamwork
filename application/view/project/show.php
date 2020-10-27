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

                            <?php if ($user->ID == $project->admin_id) { ?>


                                <li class="nav-item"><a
                                            class="nav-link  <?php if ($user->ID == $project->admin_id) { ?> show active <?php } ?> "
                                            data-toggle="tab" href="#edit_project"
                                            role="tab"
                                            aria-selected="false"><span class="hidden-sm-up"><i
                                                    class="ti-email"></i></span> <span
                                                class="hidden-xs-down">Edit project</span></a>
                                </li>

                            <?php } ?>


                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#members_list" role="tab"
                                                    aria-selected="false"><span class="hidden-sm-up"><i
                                                class="ti-email"></i></span> <span
                                            class="hidden-xs-down">Members list</span></a>
                            </li>

                            <?php if ($user->ID == $project->admin_id) { ?>

                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#CREATE_A_NEW_TASK"
                                                        role="tab"
                                                        aria-selected="false"><span class="hidden-sm-up"><i
                                                    class="ti-user"></i></span> <span
                                                class="hidden-xs-down">Create a new task</span></a>
                                </li>
                            <?php } ?>

                            <li class="nav-item"><a
                                        class="nav-link primary  <?php if ($user->ID != $project->admin_id) { ?> show active <?php } ?>"
                                        data-toggle="tab" href="#TASKS_LIST"
                                        role="tab"
                                        aria-selected="false"><span class="hidden-sm-up"><i
                                                class="ti-email"></i></span> <span
                                            class="hidden-xs-down">TASKS LIST</span></a>
                            </li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#GANNT_GRAPH"
                                                    role="tab" aria-selected="true"><span class="hidden-sm-up"><i
                                                class="ti-home"></i></span> <span
                                            class="hidden-xs-down">Gantt graph</span></a>
                            </li>

                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane " id="GANNT_GRAPH" role="tabpanel">
                                <br/>
                                <div id="embedded-Gantt"></div>

                            </div>

                            <?php if ($user->ID == $project->admin_id) { ?>


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
                                                                               type="text" required="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3">

                                                                    <div class="form-group">
                                                                        <label class="form-control-label"
                                                                               for="actual_start">Start
                                                                            date</label>
                                                                        <input name="actual_start"
                                                                               class="form-control" required=""
                                                                               type="date">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3">

                                                                    <div class="form-group">
                                                                        <label class="form-control-label"
                                                                               for="actual_end">End
                                                                            date</label>
                                                                        <input name="actual_end" required=""
                                                                               class="form-control"
                                                                               type="date">
                                                                    </div>
                                                                </div>


                                                            </div>


                                                            <div class="form-group">
                                                                <label class="form-control-label">Description </label>
                                                                <textarea name="note" style="height: 100px"
                                                                          class=" form-control" rows="8" required=""
                                                                          cols="50">description..</textarea>

                                                            </div>
                                                            <button type="button" class="btn btn-next">Next</button>
                                                        </div>
                                                    </fieldset>

                                                    <fieldset>
                                                        <div class="form-top">
                                                            <div class="form-top-left">
                                                                <h3>The resources</h3>
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
                                                                               name="resources[]" required=""
                                                                               type="text"
                                                                               style="display: inline-block;width: 80%">
                                                                        <div
                                                                                class=" pull-right btn resource_delete"><span
                                                                                    class="fa fa-window-close-o"></span>
                                                                        </div>
                                                                    </div>

                                                                </div>


                                                            </div>
                                                            <button type="button"
                                                                    class="btn add_resource"><span
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
                                    </div>
                                </div>

                                <div class="tab-pane p-20  <?php if ($user->ID == $project->admin_id) { ?> show active <?php } ?>"
                                     id="edit_project" role="tabpanel"><br/>
                                    <div class="assessment-container container">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="card-title">
                                                    <h4>Update a project</h4>

                                                </div>
                                                <div class="card-body">
                                                    <div class="basic-elements">
                                                        <form method="post"
                                                              action="<?php echo URL . 'projects/update/' . $project->id ?>">


                                                            <div class="form-group">
                                                                <label class="form-control-label"
                                                                       for="name">project name</label>
                                                                <input name="title" type="text"
                                                                       value="<?php echo $project->title; ?>"
                                                                       required
                                                                       class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-control-label"
                                                                       for="respo">administrator</label>
                                                                <select name="admin_id"
                                                                        class="form-control">
                                                                    <?php foreach ($members as $member) { ?>
                                                                        <option value="<?php echo $member->ID ?>"><?php echo $member->First_name . ' ' . $member->Last_name ?></option>
                                                                    <?php } ?>

                                                                </select>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">

                                                                    <div class="form-group">
                                                                        <label class="form-control-label"
                                                                               for="comp">Start date</label>
                                                                        <input name="start_date"
                                                                               value="<?php echo $project->start_date; ?>"
                                                                               type="date" required=""
                                                                               class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">

                                                                    <div class="form-group">
                                                                        <label class="form-control-label"
                                                                               for="name">End date</label>
                                                                        <input name="end_date" type="date"
                                                                               value="<?php echo $project->end_date; ?>"
                                                                               required
                                                                               class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="form-control-label">description </label>
                                                                <textarea name="description"
                                                                          style="height: 136px" required
                                                                          for="description"
                                                                          class=" form-control" rows="8"
                                                                          cols="50"><?php echo $project->description; ?></textarea>

                                                            </div>
                                                            <div class="form-group text-center">
                                                                <button type="submit"
                                                                        name="submit_update_project"
                                                                        class="btn btn-primary pull-right">
                                                                    Update
                                                                </button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">

                                                <div class="card-title">
                                                    <h4>Add members</h4>

                                                </div>
                                                <div class="card-body">
                                                    <div class="basic-elements p-10 ">
                                                        <div class="card-body">
                                                            <div class="basic-elements">
                                                                <div class="input-group input-group-default">
                                            <span class="input-group-btn">
                                                <button id="javascript-ajax-button" class="btn btn-primary"
                                                        type="submit">
                                                    <i class="ti-search"></i>
                                                </button>
                                            </span>
                                                                    <input id="recherche"
                                                                           placeholder=" E-mail "
                                                                           class="form-control" type="text">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="basic-elements">

                                                        <form method="post"
                                                              action="<?php echo URL . 'Invitations/invite/' . $project->id ?>">

                                                            <div class="">

                                                                <div class="form-group">
                                                                    <select id="javascript-ajax-result-box"
                                                                            name="user_invited_id"
                                                                            multiple="1"
                                                                            style="height: 200px"
                                                                            class="form-control">
                                                                    </select>
                                                                </div>

                                                                <div class="form-group pull-right">
                                                                    <button type="submit"
                                                                            name="submit_invite_member"
                                                                            class="btn btn-primary pull">
                                                                        <span class="pull-right">Add</span>
                                                                    </button>
                                                                </div>


                                                                <div class="form-group">

                                                                    You have already added :

                                                                    <ul>
                                                                        <?php foreach ($invited_users as $invited_user) {
                                                                            echo "<li class='class=\"center\"'>" . $invited_user->First_name . ' ' . $invited_user->Last_name . "</li>";
                                                                        } ?>
                                                                    </ul>

                                                                </div>


                                                            </div>


                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="card-title">
                                                    <h4>Members list : </h4>
                                                    <ul>
                                                        <?php foreach ($members as $member) { ?>
                                                            <li value="<?php echo $member->ID ?>"><?php echo $member->First_name . '  ' . $member->Last_name ?></li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>

                            <div class="tab-pane p-20   <?php if ($user->ID != $project->admin_id) { ?> show active <?php } ?>"
                                 id="TASKS_LIST" role="tabpanel">
                                <br/>

                                <div class="table-responsive table-striped ">
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
                                        <tr></tr>
                                        <?php foreach ($tasks

                                                       as $task) { ?>
                                            <tr style="font-size: 15px">
                                                <td><?php echo $task->name; ?></td>

                                                <td><?php echo $task->actual_start; ?></td>
                                                <td><?php echo $task->actual_end; ?></td>
                                                <td><?php echo $this->model['User']->getUser($task->responsable_id)->first_name . ' ' . $this->model['User']->getUser($task->responsable_id)->last_name; ?></td>

                                                <td>
                                                    <?php if ($task->comp < 100 && $task->comp != 0 && $task->group != 1) { ?>
                                                        <span class="btn btn-sm btn-info">in progress</span>
                                                    <?php } elseif ($task->comp == '100') { ?>
                                                        <span class="btn btn-sm btn-success">finished</span>
                                                    <?php } elseif ($task->comp == 0 && $task->group != 1) { ?>
                                                        <span class="btn btn-sm btn-primary">just initiated</span>
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
                                                <td>
                                                    <?php foreach ($this->model['Task']->getTaskResources($task->id) as $resource) {
                                                        echo $resource->name . ' <br/>';
                                                    } ?>
                                                </td>
                                                <?php if ($user->ID == $project->admin_id) { ?>

                                                    <td>
                                                        <button data-form="hidden_form_<?php echo $task->id; ?>"
                                                                class="btn_hidden_form btn btn-danger btn-sm">EDIT
                                                        </button>
                                                    </td>
                                                <?php } ?>

                                            </tr>

                                            <tr id="hidden_form_<?php echo $task->id; ?>" class="hidden the_tr_form">
                                                <td colspan="8">
                                                    <form method="post" class="registration-form container"
                                                          action="<?php echo URL . 'tasks/update/' . $task->id; ?>"
                                                          style="text-align: left">
                                                        <fieldset>
                                                            <div class="form-top">
                                                                <div class="form-top-left ">
                                                                    <h3> the parameters</h3>
                                                                </div>
                                                            </div>
                                                            <div class="form-bottom">

                                                                <div id="line_form" class="row">
                                                                    <div class="col-lg-6">

                                                                        <div class="form-group">
                                                                            <label class="form-control-label"
                                                                                   for="name">Task
                                                                                name</label>
                                                                            <input name="name"
                                                                                   class="form-control"
                                                                                   value="<?php echo $task->name ?>"
                                                                                   type="text">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3">

                                                                        <div class="form-group">
                                                                            <label class="form-control-label"
                                                                                   for="actual_start">Start
                                                                                date</label>
                                                                            <input name="actual_start"
                                                                                   value="<?php echo $task->actual_start ?>"

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
                                                                                   value="<?php echo $task->actual_end ?>"

                                                                                   class="form-control"
                                                                                   type="date">
                                                                        </div>
                                                                    </div>


                                                                </div>


                                                                <div class="form-group">
                                                                    <label class="form-control-label">Description </label>
                                                                    <textarea name="note"
                                                                              style="height: 100px"
                                                                              class=" form-control" rows="8"
                                                                              cols="50"><?php echo $task->note ?></textarea>

                                                                </div>
                                                                <button type="button"
                                                                        class="btn btn-next btn-success pull-right">
                                                                    Next
                                                                </button>
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
                                                                                   for="name">lead
                                                                                manager </label>
                                                                            <select name="responsable_id"

                                                                                    class="form-control">
                                                                                <?php foreach ($members as $member) { ?>
                                                                                    <option value="<?php echo $member->ID; ?>" <?php if ($member->ID == $task->responsable_id) { ?> selected="selected" <?php } ?> ><?php echo $member->First_name . ' ' . $member->Last_name ?></option>
                                                                                <?php } ?>
                                                                            </select>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="resources_tab" class="row">

                                                                    <?php foreach ($this->model['Task']->getTaskResources($task->id) as $resource) { ?>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group d-xl-inline">
                                                                                <label class="form-control-label"
                                                                                       for="name">resource</label>
                                                                                <input class="form-control "
                                                                                       style="display: inline-block;width: 80%"
                                                                                       name="resources[]"
                                                                                       value="<?php echo $resource->name ?>"
                                                                                       type="text">
                                                                                <div
                                                                                        class=" pull-right btn resource_delete"><span
                                                                                            class="fa fa-window-close-o"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    <?php } ?>

                                                                </div>

                                                                <br/> 
                                                                <button
                                                                        class="btn btn-primary add_resource"><span
                                                                            class="fa fa-plus-circle pull-right">&nbsp;Add resources</span>
                                                                </button>

                                                                <button type="button"
                                                                        class="btn btn-previous  btn-danger ">Previous
                                                                </button>
                                                                <button type="button"
                                                                        class="btn btn-next btn-success pull-right">
                                                                    Next
                                                                </button>


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
                                                                    </div>
                                                                    <div class="col-lg-6">

                                                                        <div class="form-group">
                                                                            <label class="form-control-label"
                                                                                   for="depend">depend</label>
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
                                                                    </div>
                                                                </div>


                                                                <button type="button"
                                                                        class="btn btn-previous btn-danger">
                                                                    Previous
                                                                </button>
                                                                <button type="submit" name="submit_update_task"
                                                                        class="btn btn-success pull-right">Submit
                                                                </button>
                                                            </div>
                                                        </fieldset>
                                                    </form>
                                                </td>
                                            </tr>

                                        <?php } ?>


                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div class="tab-pane p-20 " id="members_list" role="tabpanel">
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

</div>
