<?php

use ptejada\uFlex\User;

class Users extends Controller
{
    public function index($project_id,$q)
    {
        $user = new  User();
        include APP . 'core/auth/validations/auth_validation.php';
        echo json_encode($this->model['User']->getUninvitedUsers($project_id,$q));
    }
}
