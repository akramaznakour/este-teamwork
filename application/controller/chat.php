<?php


class Chat extends Controller
{


    public function index($project_id,$msg_nbr_to_update){
        
        include APP . 'core/auth/auth_validation.php';

        if (!$this->model['Project']->isMember($user->id, $project_id))
            header('location: ' . URL . 'projects/index');
        else {
            echo json_encode($this->model['Message']->getAllMessages($project_id,$msg_nbr_to_update));
        }
    }
    public function count($project_id){
        
        include APP . 'core/auth/auth_validation.php';

        if (!$this->model['Project']->isMember($user->id, $project_id))
            header('location: ' . URL . 'projects/index');
        else {
            echo json_encode($this->model['Message']->countAllMessages($project_id));
        }
    }

    public function store($project_id)
    {
        
        include APP . 'core/auth/auth_validation.php';

        if (!$this->model['Project']->isMember($user->id, $project_id))
            header('location: ' . URL . 'projects/index');
        else {
            $this->model['Message']->addMessage($project_id,$user->id,$_POST['message']);
        }
    }


}
