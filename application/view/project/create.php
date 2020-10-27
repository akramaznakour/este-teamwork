<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="<?php echo URL; ?>">Home</a></li>
        <li class="active">Create a project</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header p-20">
     </h1>
    <!-- end page-header -->

    <!-- begin row -->
    <div class="row">
        <!-- begin col-6 -->
        <div class="col-md-12">
            <!-- begin panel -->
            <div class="panel  panel-success "  >
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                           data-click="panel-expand"><i class="fa fa-expand"></i></a>

                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                           data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger"
                           data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Create a project</h4>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="<?php echo URL . 'projects/store' ?>">

                        <div class="col-md-12">
                            <div class="form-group ">
                                <label class="col-md-2 control-label">project name</label>
                                <div class="col-md-10">
                                    <input name="title" type="text" class="form-control"  />
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="col-md-2 control-label">Dates</label>
                                <div class="col-md-10">
                                    <div class="input-group input-daterange">
                                        <span class="input-group-addon">Start Date</span>
                                        <input name="start_date" type="date" required class="form-control"/>
                                        <span class="input-group-addon">End Date</span>
                                        <input name="end_date" type="date" required class="form-control"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Description</label>
                                <div class="col-md-10">
                                    <textarea  name="description"  class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label"></label>
                                <div class="col-md-10">
                                    <button type="submit" name="submit_add_project" class="btn btn-sm btn-success">Create</button>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
            <!-- end panel -->
        </div>
     </div>
    <!-- end theme-panel -->

    <!-- begin scroll to top btn -->
    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i
            class="fa fa-angle-up"></i></a>
    <!-- end scroll to top btn -->
</div>
<!-- end page container -->