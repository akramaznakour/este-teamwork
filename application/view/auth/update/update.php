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

        <!-- /# row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">
                        <h4>Update Account</h4>

                    </div>
                    <div class="card-body">
                        <div class="basic-elements">
                            <form method="post" action="<?php echo URL . 'auth/update' ?>">

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
                                        <div class="form-group">
                                            <label>Avatar </label>
                                            <input name="Avatar" type="text" required value="<?php echo $user->Avatar ?>"
                                                   class="form-control">
                                        </div>


                                    </div>

                                </div>
                                <div class="form-group text-center">
                                    <a class="btn btn-primary pull-left" href="<? echo URL . 'auth/edit_password' ?>">update
                                        password</a>
                                    <button type="submit" class="btn btn-primary pull-right">Update</button>
                                    <br>

                                </div>
                                <br/><BR>&nbsp;
                            </form>
                            <a href="<? echo URL ?>" class="pull-left">Back to my account</a>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /# row -->

        <!-- End PAge Content -->
    </div>
    <!-- End Container fluid  -->

