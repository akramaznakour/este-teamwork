<?php


class Projects extends Controller
{

    public function index()
    {

        include APP . 'core/auth/auth_validation.php';
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

        include APP . 'core/auth/auth_validation.php';
        //VIEW
        require APP . 'view/includes/head.php';
        require APP . 'view/includes/header.php';
        require APP . 'view/includes/sidebar.php';
        require APP . 'view/project/create.php';
        require APP . 'view/includes/footer.php';
        require APP . 'view/includes/script.php';
    }

    public function store()
    {

        include APP . 'core/auth/auth_validation.php';

        if (isset($_POST["submit_add_project"])) {
            if ($_POST['start_date'] < $_POST['end_date']) {
                $project_id = $this->model['Project']->addProject($_POST['title'], $_POST['description'], $user->id, $_POST['start_date'], $_POST['end_date']);
                header('location: ' . URL . 'projects/show/' . $project_id . '/true');
            }
        } else {
            header('location: ' . URL . 'projects/');
        }
    }

    public function show($project_id = 1, $page = 'members_list')
    {
        include APP . 'core/auth/auth_validation.php';

        if (!$this->model['Project']->isMember($user->id, $project_id))
            header('location: ' . URL . 'projects/index');
        else {
             $project = $this->model['Project']->getProject($project_id);
            $tasks = $this->model['Task']->getAllTasks($project_id);
            $members = $this->model['Project']->getAllMembers($project_id);
            $invited_members = $this->model['Membership']->getInvitedUsers($project_id);

            $invited_users = array();
            if ($project->admin_id == $user->id)
                $invited_users = $this->model['Membership']->getInvitedUsers($project_id);

            //VIEW
            require APP . 'view/includes/head.php';
            require APP . 'view/includes/header.php';
            require APP . 'view/includes/sidebar.php';
            require APP . 'view/project/show.php';
            require APP . 'view/includes/footer.php';
            require APP . 'view/includes/script.php';

        }
    }

    public function edit($project_id = 1,  $page = 'members_list')
    {
        include APP . 'core/auth/auth_validation.php';

        if (!$this->model['Project']->isMember($user->id, $project_id))
            header('location: ' . URL . 'projects/index');
        else {

            $project = $this->model['Project']->getProject($project_id);
            $tasks = $this->model['Task']->getAllTasks($project_id);
            $members = $this->model['Project']->getAllMembers($project_id);
            $invited_members = $this->model['Membership']->getInvitedUsers($project_id);

            $invited_users = array();
            if ($project->admin_id == $user->id)
                $invited_users = $this->model['Membership']->getInvitedUsers($project_id);

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

        include APP . 'core/auth/auth_validation.php';
        $project = $this->model['Project']->getProject($project_id);
        if ($project->admin_id != $user->id)
            header('location: ' . URL . 'projects/index');
        else {

            if (isset($_POST["submit_update_project"])) {
                $this->model['Project']->updateProject($_POST['title'], $_POST['description'], $_POST['admin_id'], $_POST['start_date'], $_POST['end_date'], $project_id);
            }

            $notificationContent = $user->last_namer . ' ' . $user->first_name. ' have edited the project : ' . $project->title;
            foreach ($this->model['Project']->getAllMembers($project->id) as $member) {
                $this->model['Notification']->addNotification($member->id, $notificationContent);
            }

            header('location: ' . URL . 'projects/show/' . $project_id . '/true');
        }
    }

    public function delete($project_id = 1)
    {

        include APP . 'core/auth/auth_validation.php';
        $project = $this->model['Project']->getProject($project_id);

        if ($project->admin_id == $user->id) {
            $this->model['Project']->deleteProject($project_id);
            $this->model['Task']->deleteAllTasks($project_id);
            $this->model['Message']->deleteMessages($project_id);
            foreach ($this->model['Project']->getAllMembers($project->id) as $member) {
                $this->model['Membership']->removeMember($member->id, $project_id);
            }
        }

        header('location: ' . URL . 'projects/index/');

    }


}
