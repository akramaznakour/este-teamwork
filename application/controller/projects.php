<?php

use ptejada\uFlex\User;

class Projects extends Controller
{

    public function index()
    {
        $user = new  User();
        include APP . 'core/auth/validations/auth_validation.php';
        //VIEW
        require APP . 'view/includes/head.php';
        require APP . 'view/includes/header.php';
        require APP . 'view/includes/sidebar.php';
        require APP . 'view/project/index.php';
        require APP . 'view/includes/footer.php';
        require APP . 'view/includes/script.php';
    }

    public function create()
    {
        $user = new  User();
        include APP . 'core/auth/validations/auth_validation.php';

        if (isset($_POST["submit_add_project"])) {
            $this->model['Project']->addProject($_POST['title'], $_POST['description'], $user->getProperty('ID'), $_POST['start_date'], $_POST['end_date']);
        }
        header('location: ' . URL . 'projects/');
    }

    public function show($project_id)
    {
        $user = new  User();
        include APP . 'core/auth/validations/auth_validation.php';


        if (!$this->model['Project']->isMember($user->ID, $project_id))
            header('location: ' . URL . 'projects/index');
        else {


            $project = $this->model['Project']->getProject($project_id);
            $tasks = $this->model['Task']->getAllTasks($project_id);
            $members = $this->model['Project']->getAllMembers($project_id);

            $invited_users = $this->model['Invitation']->getInvitedUsers($project_id);


            //VIEW
            require APP . 'view/includes/head.php';
            require APP . 'view/includes/header.php';
            require APP . 'view/includes/sidebar.php';
            require APP . 'view/project/show.php';
            require APP . 'view/includes/footer.php';
            require APP . 'view/project/chat.php';
            require APP . 'view/includes/script.php';

        }
    }

    public function edit($project_id = 1)
    {
        $user = new  User();
        include APP . 'core/auth/validations/auth_validation.php';

        $project = $this->model['Project']->getProject($project_id);
        $members = $this->model['Project']->getAllMembers($project_id);
        $invited_users = $this->model['Invitation']->getInvitedUsers($project_id);
        if ($project->admin_id != $user->ID)
            header('location: ' . URL . 'projects/');
        else {
            //VIEW
            require APP . 'view/includes/head.php';
            require APP . 'view/includes/header.php';
            require APP . 'view/includes/sidebar.php';
            require APP . 'view/project/edit.php';
            require APP . 'view/includes/footer.php';
            require APP . 'view/includes/script.php';
        }
    }


    public function update($project_id = 1)
    {
        $user = new  User();
        include APP . 'core/auth/validations/auth_validation.php';
        $project = $this->model['Project']->getProject($project_id);
        if ($project->admin_id != $user->ID)
            header('location: ' . URL . 'projects/index');
        else {

            if (isset($_POST["submit_update_project"])) {
                $this->model['Project']->updateProject($_POST['title'], $_POST['description'], $_POST['admin_id'], $_POST['start_date'], $_POST['end_date'], $project_id);
            }
            header('location: ' . URL . 'projects/edit/' . $project_id);
        }
    }

    public function delete($project_id)
    {
    }


}
