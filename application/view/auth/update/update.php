<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="<?php echo URL; ?>">Home</a></li>
        <li class="active">Edit account</li>

    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header"> Edit Account  </h1>
    <!-- end page-header -->

    <!-- begin row -->
    <div class="row">
        <!-- begin col-6 -->
        <div class="col-md-12">

            <!-- begin panel -->
            <div class="panel panel-success " data-sortable-id="form-plugins-4">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Account panel</h4>
                </div>
                <div class="panel-body panel-form">
                    <form class="form-horizontal form-bordered" method="post" action="<?php echo URL . 'auth/update' ?>"
                          enctype="multipart/form-data" autocomplete="off">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Name</label>
                            <div class="col-md-8">
                                <div class="input-group input-daterange">
                                    <span class="input-group-addon">First name</span>
                                    <input  name="first_name" type="text" value="<?php echo $user->first_name ?>" class="form-control col-xs-12"  />
                                    <span class="input-group-addon">Last name</span>
                                    <input name="last_name" type="text" value="<?php echo $user->last_name ?>" class="form-control"  />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">email</label>
                            <div class="col-md-8">
                                <input name="email" type="text" required value="<?php echo $user->email ?>" class="form-control"   />
                            </div>
                        </div>
                        <div class="form-group"  >
                            <label class="col-md-4 control-label">Avatar</label>
                            <div class="col-md-8">
                                <input  type="file"  name="avatar" class="file" >
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-sm btn-success">Update</button>
                            </div>
                         </div>
                    </form>
                </div>
            </div>

            <!-- end panel -->
        </div>
        <!-- end col-6 -->
        <a href="<?php echo URL.'auth/edit_password'?>" class="btn m-l-10 btn-success">Change password</a>

    </div>
    <!-- end row -->
</div>
<!-- end #content -->
