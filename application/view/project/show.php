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

    <?php if ($user->ID == $project->admin_id) { ?>

        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12">
                    <div class="">
                        <div class="card-body ">
                            <a class="btn btn-outline-primary pull-right"
                               href="<?php echo URL . 'projects/edit/' . $project->id; ?>">EDIT</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php }; ?>

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-12">
                <div class="card ">
                    <div class="card-title">
                        All Members
                    </div>
                    <div class="card-body">
                        <ul >
                            <?php foreach ($members as $member) { ?>

                                    <img style="height: 50px;width: 50px" src="<?php echo URL . 'uploads/' . $member->Avatar; ?>" alt="user"
                                         class="profile-pic"/>
                                    <?php echo $member->First_name . '  ' . $member->Last_name ?>
                                &nbsp;

                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-12">
                <div class="card ">
                    <div class="card-body">

                        <!-- Column -->
                        <div id="embedded-Gantt"></div>

                        <!-- Column -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if ($user->ID == $project->admin_id) { ?>
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12">

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
                                                                        <input class="form-control"
                                                                               name="rescource[]"
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
                                                                        <button type="button"
                                                                                class="btn add_respo">
                                                                    <span class="fa fa-plus-circle">
                                                                        &nbsp;Add Responsable
                                                                    </span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <button id="add_rescource" type="button"
                                                                class="btn "><span
                                                                    class="fa fa-plus-circle">&nbsp;Add Rescource</span>
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
                        </div>
                    </div>

                </div>
            </div>
        </div>

    <?php }; ?>


    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">
                        <h4>Tasks Table </h4>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Progress</th>
                                    <th>Start date</th>
                                    <th>End date</th>
                                    <th>Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($tasks as $task) { ?>
                                    <tr>
                                        <td><?php echo $task->name; ?></td>
                                        <td><span class="badge badge-primary"><?php echo $task->comp; ?>%</span></td>
                                        <td><?php echo $task->actual_start; ?></td>
                                        <td><?php echo $task->actual_end; ?></td>
                                        <td class="color-primary">$21.56</td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
