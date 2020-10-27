<div class="col-md-12  ">
    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Files <span
                        class="pull-right label label-success"><?php echo count($this->model['Task']->getTaskFiles($task->id)) ?>
                    File(s) </span></h4>
        </div>
        <div class="  clearfix">


        </div>

        <ul class="attached-document p-l-20 clearfix">
            <?php foreach ($this->model['Task']->getTaskFiles($task->id) as $file) { ?>

                <li>
                    <div class="document-name"><a
                                href="<?php echo URL . $file->path ?>"><?php echo $file->name ?></a></div>
                    <div class="document-file">
                        <a href="#">
                            <?php if ($file->type == 'pdf') { ?>
                                <i class="fa fa-file-pdf-o"></i>
                            <?php } elseif ($file->type == 'docx') { ?>
                                <i class="fa  fa-file-word-o "></i>
                            <?php } elseif ($file->type == "jpg" || $file->type == "png" || $file->type == "jpeg" || $file->type == "gif") { ?>

                                <i class="fa  fa-file-image-o "></i>
                            <?php } else { ?>
                                <i class="fa fa-file-pdf-o"></i>
                            <?php } ?>
                        </a>
                    </div>
                </li>
            <?php } ?>

        </ul>
        <div class="panel-body">

            <?php if ($this->model['Task']->isResponsableOf($task_id, $user->id)) { ?>

            <form class="p-0 m-0" action="<?php echo URL . 'tasks/uploadFiles/' . $task->id ?>" method="POST"
                  enctype="multipart/form-data">
                <div class="row fileupload-buttonbar">
                    <div class="col-md-7">
                                <span class="btn btn-success fileinput-button"
                                      style="position: relative;overflow: hidden;display: inline-block;">
                                    <i class="fa fa-plus"></i>
                                    <span>Add files</span>
                                    <input name="files[]" multiple="" type="file"
                                           style="position: absolute;top: 0;right: 0;margin: 0;opacity: 0;-ms-filter: 'alpha(opacity=0)';font-size: 200px !important;direction: ltr;">
                                </span>
                        <button type="submit" class="btn btn-primary start">
                            <i class="fa fa-upload"></i>
                            <span>Start upload</span>
                        </button>
                    </div>

                </div>

                <!-- The table listing the files available for upload/download -->
                <table role="presentation" class="table table-striped">
                    <tbody class="files"></tbody>
                </table>
            </form>
 <?php } ?>
        </div>
    </div>
    <!-- end panel -->
</div>