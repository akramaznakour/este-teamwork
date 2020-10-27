<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Home</a></li>
        <li><a href="javascript:;">Form Stuff</a></li>
        <li class="active">Form Plugins</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header"> Edit Account  <small>header small text goes here...</small></h1>
    <!-- end page-header -->

    <!-- begin row -->
    <div class="row">
        <!-- begin col-6 -->
        <div class="col-md-12">

            <!-- begin panel -->
            <div class="panel panel-inverse" data-sortable-id="form-plugins-4">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Account panel</h4>
                </div>
                <div class="panel-body panel-form">
                    <form class="form-horizontal form-bordered" method="post" action="<?php echo URL . 'auth/update' ?>"
                          enctype="multipart/form-data" autocomplete="off">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Username</label>
                            <div class="col-md-8">
                                <input disabled name="Username" type="text"
                                       value="<?php echo $user->Username ?>"class="form-control"  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Name</label>
                            <div class="col-md-8">
                                <div class="input-group input-daterange">
                                    <span class="input-group-addon">First name</span>
                                    <input  name="first_name" type="text" value="<?php echo $user->first_name ?>" class="form-control"  />
                                    <span class="input-group-addon">Last name</span>
                                    <input name="last_name" type="text" value="<?php echo $user->last_name ?>" class="form-control"  />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Email</label>
                            <div class="col-md-8">
                                <input name="Email" type="text" required value="<?php echo $user->Email ?>" class="form-control"   />
                            </div>
                        </div>
                        <div class="form-group"  >
                            <label class="col-md-4 control-label">Avatar</label>
                            <div class="col-md-8">
                                <input  type="file"  name="Avatar" class="file" >
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

    </div>
    <!-- end row -->
</div>
<!-- end #content -->
