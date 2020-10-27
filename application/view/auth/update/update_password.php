<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="<?php echo URL; ?>">Home</a></li>
        <li class="active">Edit password</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header"> Edit password </h1>
    <!-- end page-header -->

    <!-- begin row -->
    <div class="row">
        <!-- begin col-6 -->
        <div class="col-md-12">

            <!-- begin panel -->
            <div class="panel  panel-success " data-sortable-id="form-plugins-4">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">password panel</h4>
                </div>
                <div class="panel-body panel-form">
                    <form class="form-horizontal form-bordered" method="post" action="<?php echo URL . 'auth/update_password' ?>"
                          enctype="multipart/form-data" autocomplete="off">


                        <div class="form-group">
                            <label class="col-md-4 control-label">Your password</label>
                            <div class="col-md-8">
                                <input name="oldPassword" type="password" required  class="form-control"   />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">new password</label>
                            <div class="col-md-8">
                                <input name="newPassword" type="password" required  class="form-control"   />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Confirm  the new password</label>
                            <div class="col-md-8">
                                <input name="newPassword2" type="password" required  class="form-control"   />
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
<a href="<?php echo URL.'auth/edit'?>" class="btn btn-success ">Edit account infos</a>
            <!-- end panel -->
        </div>
        <!-- end col-6 -->

    </div>
    <!-- end row -->
</div>
<!-- end #content -->
