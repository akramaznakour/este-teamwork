<div>
    <h4 class="p-b-20">Members : </h4>

    <?php foreach ($members as $member) { ?>

        <img style="height: 50px;width: 50px" src="<?php echo URL . 'uploads/' . $member->avatar; ?>" alt="user"
             class="profile-pic"/>
        <span class="h4 p-r-10">        <?php echo $member->first_name . '  ' . $member->last_name ?>&nbsp;
</span>

    <?php } ?>

    <?php if ($user->id == $project->admin_id) { ?>

        <hr/>
        <h4 class="p-b-20">Waiting for accepting the invitation</h4>

        <?php foreach ($invited_users as $member) { ?>

            <img style="height: 50px;width: 50px" src="<?php echo URL . 'uploads/' . $member->avatar; ?>" alt="user"
                 class="profile-pic"/>

    <span class="h4 p-r-10">        <?php echo $member->first_name . '  ' . $member->last_name ?>&nbsp;

        <?php } ?>
    <?php } ?>

</div>