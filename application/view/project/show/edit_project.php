<div class="panel-body">


    <div class="col-md-6">
        <h4>Project information</h4>

        <form class="form-horizontal" method="post"
              action="<?php echo URL . 'projects/update/' . $project->id ?>">
            <div class="form-group ">
                <label class="col-md-2 control-label">Name</label>
                <div class="col-md-10">
                    <input name="title" class="form-control" type="text"
                           value="<?php echo $project->title; ?>">
                </div>
            </div>
            <div class="form-group ">
                <label class="col-md-2 control-label">administrator</label>
                <div class="col-md-10">
                    <select name="admin_id" class="form-control">
                        <?php foreach ($members as $member) { ?>
                            <option value="<?php echo $member->ID ?>"><?php echo $member->First_name . ' ' . $member->Last_name ?></option>
                        <?php } ?>

                    </select>
                </div>
            </div>

            <div class="form-group ">
                <label class="col-md-2 control-label">Dates</label>
                <div class="col-md-10">
                    <div class="input-group input-daterange">
                        <span class="input-group-addon">Start </span>
                        <input name="start_date" required="" class="form-control"
                               type="date"
                               value="<?php echo $project->start_date; ?>">
                        <span class="input-group-addon">End </span>
                        <input name="end_date" required="" class="form-control" type="date"
                               value="<?php echo $project->end_date; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Description</label>
                <div class="col-md-10">
                                            <textarea name="description" class="form-control"
                                                      rows="5"><?php echo $project->description; ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label"></label>
                <div class="col-md-10">
                    <button type="submit" name="submit_update_project"
                            class="btn btn-sm btn-success">Update
                    </button>
                </div>
            </div>

        </form>
    </div>

    <div class="col-md-6">
        <h4>Add members</h4>
        <form>

            <div class="input-group">
                <input id="recherche" placeholder=" E-mail " class="form-control"
                       type="text">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
            </div>

        </form>
        <br/>
        <form method="post"
              action="<?php echo URL . 'memberships/invite/' . $project->id ?>">
            <div class="form-group">
                <select id="javascript-ajax-result-box"
                        name="user_invited_id"
                        multiple="1"
                        style="height: 200px"
                        class="form-control">
                </select>
            </div>

            <div class="form-group pull-right">
                <button type="submit"
                        name="submit_invite_member"
                        class="btn btn-primary pull">
                    <span class="pull-right">Add</span>
                </button>
            </div>


            <div class="form-group">

                You have already added :

                <ul>
                    <?php foreach ($invited_members as $invited_user) { ?>
                       <li class="p-5">
                           <img style="height: 20px;width: 20px"
                                src="<?php echo URL . 'uploads/' . $invited_user->Avatar; ?>"
                                alt="user"
                                class="profile-pic "/>
                           <?php echo $invited_user->First_name . '  ' . $invited_user->Last_name ?>
                       </li>
                    <?php } ?>
                </ul>

            </div>


        </form>
    </div>

    <div class="col-md-12">
        <div class="col-md-16">
            <hr/>

            <h4>Remove a member</h4>
            <br/>
            <form method="post" class="form-inline"
                  action="<?php echo URL . 'memberships/remove/' . $project->id ?>">
                <div class=" " style="display: inline-block">
                    <label class="  control-label" style="padding: 0 30px 0 0;">Member</label>

                    <select name="member_to_remove" class="form-control">
                        <?php foreach ($members as $member) {
                            if ($member->ID != $user->ID) { ?>
                                <option value="<?php echo $member->ID ?>"><?php echo $member->First_name . ' ' . $member->Last_name ?></option>
                            <?php }
                        } ?>

                    </select>

                </div>

                <a href="#modal-alert" class="btn btn-sm btn-danger" data-toggle="modal">Remove</a>
                <div class="modal fade" id="modal-alert">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title">Alert Header</h4>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-danger m-b-0">
                                    <h4><i class="fa fa-info-circle"></i> Alert Header</h4>
                                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                        sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus
                                        viverra
                                        turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue
                                        felis in faucibus.</p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
                                <button type="submit" value="submit_remove_member" class="btn btn-sm btn-danger">Remove
                                    this
                                    member
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


</div>
