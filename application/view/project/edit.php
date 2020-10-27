<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Project administritor's dashboard</h3></div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="<?php echo URL . ''; ?>">Home</a></li>
                <li class="breadcrumb-item "><a href="<?php echo URL . 'projects/'; ?>">Projects</a></li>
                <li class="breadcrumb-item active"><?php echo $project->title; ?> </li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-title">
                        <h4>Update a project</h4>

                    </div>
                    <div class="card-body">
                        <div class="basic-elements">
                            <form method="post" action="<?php echo URL . 'projects/update/' . $project->id ?>">


                                <div class="form-group">
                                    <label class="form-control-label" for="name">project name</label>
                                    <input name="title" type="text" value="<?php echo $project->title; ?>" required
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="respo">administrator</label>
                                    <select name="admin_id" class="form-control">
                                        <?php foreach ($members as $member) { ?>
                                            <option value="<?php echo $member->ID ?>"><?php echo $member->First_name . ' ' . $member->Last_name ?></option>
                                        <?php } ?>

                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label class="form-control-label" for="comp">Start date</label>
                                            <input name="start_date" value="<?php echo $project->start_date; ?>"
                                                   type="date" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label class="form-control-label" for="name">End date</label>
                                            <input name="end_date" type="date" value="<?php echo $project->end_date; ?>"
                                                   required class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">description </label>
                                    <textarea name="description" style="height: 136px" required
                                              for="description"
                                              class=" form-control" rows="8"
                                              cols="50"><?php echo $project->description; ?></textarea>

                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" name="submit_update_project"
                                            class="btn btn-primary pull-right">
                                        Update
                                    </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /# column -->
        <div class="col-lg-6">

            <div class="card">
                <div class="card-title">
                    <h4>Add members</h4>

                </div>
                <div class="card-body">
                    <div class="basic-elements">
                        <div class="card-body">
                            <div class="basic-elements">
                                <div class="input-group input-group-default">
                                            <span class="input-group-btn">
                                                <button id="javascript-ajax-button" class="btn btn-primary"
                                                        type="submit">
                                                    <i class="ti-search"></i>
                                                </button>
                                            </span>
                                    <input id="recherche" placeholder=" E-mail "
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
                                    <select id="javascript-ajax-result-box" name="user_invited_id"
                                            multiple="1"
                                            style="height: 200px" class="form-control">
                                    </select>
                                </div>

                                <div class="form-group pull-right">
                                    <button type="submit" name="submit_invite_member"
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
            </div>
            <div class="card">
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
        <!-- /# column -->
    </div>


</div>

</div>
<!-- /# row -->

<!-- End PAge Content -->
</div>
<!-- End Container fluid  -->

<!-- Container fluid  -->
<!-- Start Page Content -->