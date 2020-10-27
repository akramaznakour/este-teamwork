<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Dashboard</h3></div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="<?php echo URL . ''; ?>">Home</a></li>
                <li class="breadcrumb-item "><a href="<?php echo URL . 'auth/edit'; ?>">Acount</a></li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">
                        <h4>Update Account</h4>

                    </div>
                    <div class="card-body">
                        <div class="basic-elements">
                            <form method="post" action="<?php echo URL . 'auth/update' ?>"
                                  enctype="multipart/form-data" autocomplete="off">

                                <div class="row">
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label>Username</label>
                                            <input disabled name="Username" type="text"
                                                   value="<?php echo $user->Username ?>" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input name="first_name" type="text" value="<?php echo $user->first_name ?>"
                                                   class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input name="last_name" type="text" value="<?php echo $user->last_name ?>"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Email </label>
                                            <input name="Email" type="text" required value="<?php echo $user->Email ?>"
                                                   class="form-control">
                                        </div>

                                        <div class=" form-control-file">
                                            <label>Avatar </label>

                                            <label class="custom-file pull-right"
                                                   style="width: 100px;height: 100px;position: relative">
                                                <img src="<?php echo URL . 'uploads/' . $user->Avatar; ?>"
                                                     alt="user" class="profile-pic"/>

                                                <input type="file" id="file" name="Avatar" class="custom-file-input">
                                            </label>
                                        </div>


                                    </div>

                                </div>
                                <div class="form-group text-center">

                                    <button type="submit" class="btn btn-primary pull-right">Update</button>
                                    <br>

                                </div>
                                <br/><BR>&nbsp;
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /# row -->
        <!-- /# row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">


                    </div>
                    <div class="card-body">
                        <a class="btn btn-primary pull-left" href="<? echo URL . 'auth/edit_password' ?>">update
                            password</a>
                        <a href="<? echo URL ?>" class="pull-right">Back to my account</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End PAge Content -->
    </div>
    <!-- End Container fluid  -->

