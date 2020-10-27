
<div class="modal fade" id="modal-alert-notification-<?php echo $notification->id ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a type="button" class="close" data-dismiss="modal"
                   aria-hidden="true">×
                </a>
                <h4 class="modal-title"> <span class="fa fa-bell"></span> &nbsp; Notification</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-primary m-b-0">

                    <h5 class="text-justify"><?php echo $notification->content ;?></h5>
                    <span class="pull-right"><?php echo $notification->time ;?></span>
                </div>
            </div>
            <div class="modal-footer">
                <form method="post" class="form-inline" action="<?php echo URL.'notifications/setSeen/'.$notification->id?>">
                    <a href="javascript:;" class="btn btn-sm btn-white"
                       data-dismiss="modal">Close</a>

                    <button name="submit_set_seen" type="submit" class="btn btn-sm btn-danger">
                        Set as seen
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>