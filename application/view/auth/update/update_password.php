

<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Dashboard</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
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
                            <form method="post" action="<?php echo URL . 'auth/update_password' ?>"  >

                                <div class="row">
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input name="Password" type="password" class="form-control" required autofocus>
                                        </div>

                                        <div class="form-group">
                                            <label>Confirm New Password</label>
                                            <input name="Password2" type="password" class="form-control" required>
                                        </div>
                                        <input name="c" type="hidden" value="<?php echo getVar("c")?>">

                                        <button type="submit" class="btn btn-primary pull-right">Update</button>

                                    </div>


                                </div>
                                <div class="form-group text-center">


                                </div>
                                <a href="<? echo URL?>" class="pull-left">Back to my account</a>
                                &nbsp;
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

