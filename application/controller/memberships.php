<?php

use ptejada\uFlex\User;

/**
 * Class Memberships
 */
class Memberships extends Controller
{

    /**
     * @param int $project_id
     */
    public function invite($project_id = 1)
    {
        $user = new  User();
        include APP . 'core/auth/validations/auth_validation.php';
        $project = $this->model['Project']->getProject($project_id);
        if ($project->admin_id != $user->ID)
            header('location: ' . URL . 'projects/index');
        else {

            if (isset($_POST["submit_invite_member"])) {
                $this->model['Membership']->addInvitation($project_id, $_POST['user_invited_id']);
            }
            header('location: ' . URL . 'projects/show/' . $project_id . '/true');
        }
    }

    /**
     * @param $invitation_id
     */
    public function accept($invitation_id)
    {
        $user = new  User();
        include APP . 'core/auth/validations/auth_validation.php';
        $invitation = $this->model['Membership']->getInvitation($invitation_id);
        $project = $this->model['Project']->getProject($invitation->project_id);

        if ($invitation->user_invited_id != $user->ID)
            //  header('location: ' . URL . 'projects/index');
            echo 'her';
        else {

            if (isset($_POST["submit_accept_invitation"])) {
                $this->model['Membership']->acceptInvitation($invitation_id);
                $this->model['Project']->addMember($invitation->project_id, $invitation->user_invited_id);
            }
            header('location: ' . URL . 'projects/show/' . $project->id);
        }
    }

    /**
     * @param $invitation_id
     */
    public function refuse($invitation_id)
    {
        $user = new  User();
        include APP . 'core/auth/validations/auth_validation.php';
        $invitation = $this->model['Membership']->getInvitation($invitation_id);
        $project = $this->model['Project']->getProject($invitation->project_id);

        if ($invitation->user_invited_id != $user->ID)
            //  header('location: ' . URL . 'projects/index');
            echo 'her';
        else {
            if (isset($_POST["submit_refuse_invitation"])) {
                $this->model['Membership']->refuseInvitation($invitation_id);
            }
            header('location: ' . URL . 'projects/show/' . $project->id);
        }
    }

    /**
     * @param $project_id
     */
    public function remove($project_id)
    {
        print_r($_POST);
        $user = new  User();
        include APP . 'core/auth/validations/auth_validation.php';

        $project = $this->model['Project']->getProject($project_id);

        if ($project->admin_id != $user->ID)
            header('location: ' . URL . 'projects/index');
        else {
            if ($this->model['Project']->isMember($_POST['member_to_remove'], $project_id))
                $this->model['Membership']->removeMember($_POST['member_to_remove'], $project_id);
            header('location: ' . URL . 'projects/show/' . $project_id . '/true');
        }
    }

}