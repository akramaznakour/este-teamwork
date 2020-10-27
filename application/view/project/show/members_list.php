<div>
    <h4 class="p-b-20">Members : </h4>

    <?php foreach ($members as $member) { ?>

        <img style="height: 50px;width: 50px" src="<?php echo URL . 'uploads/' . $member->Avatar; ?>" alt="user"
             class="profile-pic"/>
        <span class="h4 p-r-10">        <?php echo $member->First_name . '  ' . $member->Last_name ?>&nbsp;
</span>

    <?php } ?>

    <?php if ($user->ID == $project->admin_id) { ?>

        <hr/>
        <h4 class="p-b-20">In waitung for accting invitation</h4>

        <?php foreach ($invited_users as $member) { ?>

            <img style="height: 50px;width: 50px" src="<?php echo URL . 'uploads/' . $member->Avatar; ?>" alt="user"
                 class="profile-pic"/>

    <span class="h4 p-r-10">        <?php echo $member->First_name . '  ' . $member->Last_name ?>&nbsp;

        <?php } ?>
    <?php } ?>

</div>