<?php

use ptejada\uFlex\User;

class Chat extends Controller
{


    public function index($project_id,$msg_nbr_to_update){
        $user = new  User();
        include APP . 'core/auth/validations/auth_validation.php';

        if (!$this->model['Project']->isMember($user->ID, $project_id))
            header('location: ' . URL . 'projects/index');
        else {
            echo json_encode($this->model['Message']->getAllMessages($project_id,$msg_nbr_to_update));
        }
    }
    public function count($project_id){
        $user = new  User();
        include APP . 'core/auth/validations/auth_validation.php';

        if (!$this->model['Project']->isMember($user->ID, $project_id))
            header('location: ' . URL . 'projects/index');
        else {
            echo json_encode($this->model['Message']->countAllMessages($project_id));
        }
    }

    public function store($project_id)
    {
        $user = new  User();
        include APP . 'core/auth/validations/auth_validation.php';

        if (!$this->model['Project']->isMember($user->ID, $project_id))
            header('location: ' . URL . 'projects/index');
        else {
            $this->model['Message']->addMessage($project_id,$user->ID,$_POST['message']);
        }
    }


}
