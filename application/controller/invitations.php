<?php

use ptejada\uFlex\User;

class Invitations extends Controller
{

    public function invite($project_id = 1)
    {
        $user = new  User();
        include APP . 'core/auth/validations/auth_validation.php';
        $project = $this->model['Project']->getProject($project_id);
        if ($project->admin_id != $user->ID)
            header('location: ' . URL . 'projects/index');
        else {

            if (isset($_POST["submit_invite_member"])) {
                 $this->model['Invitation']->addInvitation($project_id,$_POST['user_invited_id']);
            }
            header('location: ' . URL . 'projects/edit/' . $project_id);
        }
    }

    public function accept($invitation_id)
    {
        $user = new  User();
        include APP . 'core/auth/validations/auth_validation.php';
        $invitation = $this->model['Invitation']->getInvitation($invitation_id);
        $project = $this->model['Project']->getProject($invitation->project_id);

        if ($invitation->user_invited_id != $user->ID)
            header('location: ' . URL . 'projects/index');
        else {

            if (isset($_POST["submit_accept_invitation"])) {
                $this->model['Invitation']->acceptInvitation($invitation_id);
                $this->model['Project']->addMember($invitation->project_id,$invitation->user_invited_id);
            }
            header('location: ' . URL . 'projects/show/' . $project->id);
        }
    }

}