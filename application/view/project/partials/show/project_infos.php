<div class="panel-body">


    <div class="col-md-12">
        <h4>Project information</h4>

        <form class="form-horizontal" method="post" >
            <div class="form-group ">
                <label class="col-md-2 control-label">Name</label>
                <div class="col-md-10">
                    <input DISABLED name="title" class="form-control" type="text"
                           value="<?php echo $project->title; ?>">
                </div>
            </div>
            <div class="form-group ">
                <label class="col-md-2 control-label">administrator</label>
                <div class="col-md-10">
                    <select disabled name="admin_id" class="form-control">
                        <?php foreach ($members as $member) { ?>
                            <option value="<?php echo $member->id ?>"><?php echo $member->first_name . ' ' . $member->last_name ?></option>
                        <?php } ?>

                    </select>
                </div>
            </div>

            <div class="form-group ">
                <label class="col-md-2 control-label">Dates</label>
                <div class="col-md-10">
                    <div class="input-group input-daterange">
                        <span class="input-group-addon">Start </span>
                        <input disabled name="start_date" required="" class="form-control"
                               type="date"
                               value="<?php echo $project->start_date; ?>">
                        <span class="input-group-addon">End </span>
                        <input disabled name="end_date" required="" class="form-control" type="date"
                               value="<?php echo $project->end_date; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Description</label>
                <div class="col-md-10">
                                            <textarea disabled name="description" class="form-control"
                                                      rows="5"><?php echo $project->description; ?></textarea>
                </div>
            </div>


        </form>
    </div>



</div>
