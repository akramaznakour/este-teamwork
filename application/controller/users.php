<?php


/**
 * Class Users
 */
class Users extends Controller
{
    /**
     * @param $project_id
     * @param $q
     */
    public function index($project_id, $q)
    {

        include APP . 'core/auth/auth_validation.php';
        echo json_encode($this->model['User']->getUninvitedUsers($project_id,$q));
    }
}
