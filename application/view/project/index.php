<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Teams Dashboard</h3></div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="<?php echo URL; ?>">Home</a></li>
                <li class="breadcrumb-item active">Teams</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">

        <!-- /# row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">
                        <h4>Create a new project</h4>

                    </div>
                    <div class="card-body">
                        <div class="basic-elements">
                            <form method="post" action="<?php echo URL . 'projects/create' ?>">

                                <div class="row">
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label class="form-control-label" for="name">project name</label>
                                            <input name="title" type="text" required class="form-control">
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">

                                                <div class="form-group">
                                                    <label class="form-control-label" for="name">Start date</label>
                                                    <input name="start_date" type="date" required class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">

                                                <div class="form-group">
                                                    <label class="form-control-label" for="name">End date</label>
                                                    <input name="end_date" type="date" required class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">description </label>
                                            <textarea name="description" style="height: 136px" required
                                                      for="description"
                                                      class=" form-control" rows="8" cols="50">description..</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" name="submit_add_project" class="btn btn-primary pull-right">
                                        Create
                                    </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /# row -->

        <!-- End PAge Content -->
    </div>
    <!-- End Container fluid  -->

    <!-- Container fluid  -->
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <h4>Your projects </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>

                            <tr>
                                <th>Project</th>
                                <th>admin</th>
                                <th>description</th>
                                <th>members</th>
                                <th>Status</th>
                                <th>Edit</th>
                            </tr>


                            </thead>
                            <tbody>
                            <?php foreach ($projects as $project) { ?>
                                <tr>
                                    <td>
                                        <?php echo $project->title; ?>

                                    </td>
                                    <td>
                                        <?php echo $this->model['User']->getUser($project->admin_id)->first_name; ?>
                                        <?php echo $this->model['User']->getUser($project->admin_id)->last_name; ?>

                                    </td>
                                    <td>
                                        <span>
                                            <?php echo $project->description; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="round-img">
                                            <?php foreach ($this->model['Project']->getAllMembers($project->id) as $member) {
                                                echo $member->First_name . ' ' . $member->Last_name . '<br/>';
                                            } ?>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge badge-success">Done</span>
                                    </td>
                                    <td>
                                        <?php if ($project->admin_id == $user->ID) { ?>
                                            <a class="badge badge-info"
                                               href="<?php echo URL . 'projects/edit/' . $project->id ?>">
                                                EDIT
                                            </a>
                                        <?php } ?>
                                        <a class="badge badge-primary "
                                           href="<?php echo URL . 'projects/show/' . $project->id ?>">
                                            SHOW
                                        </a>
                                        <?php if ($project->admin_id == $user->ID) { ?>
                                            <a class="badge badge-info"
                                               href="<?php echo URL . 'projects/delete/' . $project->id ?>">
                                                DELETE
                                            </a>
                                        <?php } ?>
                                    </td>
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