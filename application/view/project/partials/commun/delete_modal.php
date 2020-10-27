<div class="modal fade" id="modal-alert-<?php echo $task->id; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a type="button" class="close" data-dismiss="modal"
                   aria-hidden="true">×
                </a>
                <h4 class="modal-title">Alert</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger m-b-0">
                    <h4><i class="fa fa-info-circle"></i> Deleting a task</h4>
                    <p>Are you sure you want to delete this task ?</p>
                </div>
            </div>
            <div class="modal-footer">
                <form method="post" class="form-inline"
                      action="<?php echo URL . 'tasks/delete/' . $task->id ?>">
                    <a href="javascript:;" class="btn btn-sm btn-white"
                       data-dismiss="modal">Close</a>
                    <button type="submit" class="btn btn-sm btn-danger">
                        DELETE
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
