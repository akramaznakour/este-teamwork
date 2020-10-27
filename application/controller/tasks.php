<?php

use ptejada\uFlex\User;

/**
 * Class Tasks
 */
class Tasks extends Controller
{

    /**
     * @param int $project_id
     */
    public function show($task_id = 1)
    {
        $user = new  User();
        include APP . 'core/auth/validations/auth_validation.php';

        $task = $this->model['Task']->getTask($task_id);


        if (!$this->model['Project']->isMember($user->ID, $task->project_id))
            header('location: ' . URL . 'projects/index');
        else {

            $project = $this->model['Project']->getProject($task->project_id);
            $members = $this->model['Project']->getAllMembers($task->project_id);

            //VIEW
            require APP . 'view/includes/head.php';
            require APP . 'view/includes/header.php';
            require APP . 'view/includes/sidebar.php';
            require APP . 'view/task/index.php';
            require APP . 'view/includes/footer.php';
            require APP . 'view/includes/script.php';

        }

    }


    /**
     * @param int $project_id
     */
    public function create($project_id = 1)
    {

        $user = new  User();
        include APP . 'core/auth/validations/auth_validation.php';
        $project = $this->model['Project']->getProject($project_id);

        $members = $this->model['Project']->getAllMembers($project_id);
        if ($project->admin_id != $user->ID)
            header('location: ' . URL . 'projects/');
        else {

            if (isset($_POST["submit_add_task"])) {

                $style = 'gtaskblue';
                $mile = 0;
                $isGroup = '0';

                if ($_POST['parent'] != 0) {
                    $parentTask = $this->model['Task']->getTask($_POST['parent']);
                    if ($parentTask->isGroup == 0) {
                        $this->model['Task']->turnIntoGroup($parentTask->id);
                    }
                }
                $this->model['Task']->addTask($_POST["name"], $_POST["start_date"], $_POST["end_date"], $style, 0, $mile, $_POST['resources'], $_POST['responsables_ids'], '0', $isGroup, $_POST['parent'], '1', $_POST["depend"], '0', $_POST["note"], $project_id);

                $notificationContent = $user->getProperty('last_name').' '.$user->getProperty('first_name').' added a new task " '.$_POST["name"].'" to the project : '.$project->title;
                foreach ($this->model['Project']->getAllMembers($project_id) as $member) {
                    $this->model['Notification']->addNotification($member->ID,$notificationContent);
                }


            }
        }

        $this->model['Task']->updateAllGroup($project_id);
        $this->model['Project']->updateProgress($project_id);
        $this->model['Task']->updateAllGroup($project_id);
        $this->model['Project']->updateProgress($project_id);
    //    header('location: ' . URL . 'projects/show/' . $project_id);
    }

    /**
     * @param int $task_id
     */
    public function update($task_id = 1)
    {
        $user = new  User();
        include APP . 'core/auth/validations/auth_validation.php';

        $task = $this->model['Task']->getTask($task_id);
        $project = $this->model['Project']->getProject($task->project_id);
        $members = $this->model['Project']->getAllMembers($task->project_id);

        if ($project->admin_id != $user->ID)
            header('location: ' . URL . 'projects/');
        else {

            if (isset($_POST["submit_update_task"])) {


                $link = $mile = '0';
                $open = '1';
                $caption = '';
                if ($_POST['parent'] != 0) {

                    $parentTask = $this->model['Task']->getTask($_POST['parent']);
                    if ($parentTask->isGroup == 0) {
                        $this->model['Task']->turnIntoGroup($parentTask->id);
                    }
                }
                $this->model['Task']->updateTask($_POST["name"], $_POST["start_date"], $_POST["end_date"], $_POST["style"], $link, $mile, $_POST['responsables_ids'], $_POST["isGroup"], $_POST['parent'], $open, $_POST["depend"], $caption, $_POST["note"], $_POST['resources'], $task_id, $task->project_id);

                $notificationContent = $user->getProperty('last_name').' '.$user->getProperty('first_name').' have edited  the task " '.$_POST["name"].'" of the project : '.$project->title;
                foreach ($this->model['Project']->getAllMembers($project->id) as $member) {
                    $this->model['Notification']->addNotification($member->ID,$notificationContent);
                }
            }
        }
        $this->model['Task']->updateAllGroup($task->project_id);
        $this->model['Project']->updateProgress($task->project_id);
        $this->model['Task']->updateAllGroup($task->project_id);
        $this->model['Project']->updateProgress($task->project_id);

       header('location: ' . URL . 'projects/show/' . $task->project_id);
    }

    /**
     * @param int $task_id
     */
    public function updateProgress($task_id = 1)
    {
        $user = new  User();
        include APP . 'core/auth/validations/auth_validation.php';
        $task = $this->model['Task']->getTask($task_id);
        $project = $this->model['Project']->getProject($task->project_id);
        if (!$this->model['Task']->isResponsableOf($task_id, $user->ID) && !$task->isGroup)
            header('location: ' . URL . 'projects/show' . $task->project_id);
        else {

            if (isset($_POST["submit_update_task"]) && $_POST['progress'] < 101 && $_POST['progress'] > -1) {
                $this->model['Task']->updateTaskProgress($_POST['progress'], $task_id);
            }
            if (isset($_POST["submit_finished_task"])) {
                $this->model['Task']->updateTaskProgress(100, $task_id);
            }


            $this->model['Task']->updateAllGroup($task->project_id);
            $this->model['Project']->updateProgress($task->project_id);
            $this->model['Task']->updateAllGroup($task->project_id);
            $this->model['Project']->updateProgress($task->project_id);

            $notificationContent = $user->getProperty('last_name').' '.$user->getProperty('first_name').' have edited the progress of the task " '.$_POST["name"].'" of the project : '.$project->title;
            foreach ($this->model['Project']->getAllMembers($project->id) as $member) {
                $this->model['Notification']->addNotification($member->ID,$notificationContent);
            }

            header('location: ' . URL . 'projects/show/' . $task->project_id);
        }
    }

    /**
     * @param int $task_id
     */
    public function delete($task_id = 1)
    {
        $user = new  User();
        include APP . 'core/auth/validations/auth_validation.php';

        $task = $this->model['Task']->getTask($task_id);
        $project = $this->model['Project']->getProject($task->project_id);

        if ($project->admin_id != $user->ID)
            header('location: ' . URL . 'projects/');
        else {
            if ($task->isGroup != 0)
                $this->model['Task']->deleteChildrenTask($task_id);

            $notificationContent = $user->getProperty('last_name').' '.$user->getProperty('first_name').' have deleted the task " '.$task->name.'" of the project : '.$project->title;
            foreach ($this->model['Project']->getAllMembers($project->id) as $member) {
                $this->model['Notification']->addNotification($member->ID,$notificationContent);
            }

            $this->model['Task']->deleteTask($task_id);
        }

        $this->model['Task']->updateAllGroup($task->project_id);
        $this->model['Project']->updateProgress($task->project_id);
        $this->model['Task']->updateAllGroup($task->project_id);
        $this->model['Project']->updateProgress($task->project_id);

        header('location: ' . URL . 'projects/show/' . $task->project_id);
    }

    public function uploadFiles($task_id = 1)
    {
        $user = new  User();
        include APP . 'core/auth/validations/auth_validation.php';
        $task = $this->model['Task']->getTask($task_id);
        $project = $this->model['Project']->getProject($task->project_id);

        if ($this->model['Task']->isResponsableOf($task_id, $user->ID)) {
            for ($i = 0; $i < count($_FILES['files']['name']); $i++) {

                $target_dir = "files/";
                $target_file = $target_dir . basename($_FILES["files"]["name"][$i]);
                $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $target_file = $target_dir . uniqid() . '.' . $fileType;
                move_uploaded_file($_FILES["files"]["tmp_name"][$i], $target_file);
                $this->model['Task']->addFile($_FILES["files"]["name"][$i], $fileType, $target_file, $task_id);


                $notificationContent = $user->getProperty('last_name').' '.$user->getProperty('first_name').' have uploaded a file to the task " '.$task->name.'" of the project : '.$project->title;
                foreach ($this->model['Project']->getAllMembers($project->id) as $member) {
                    $this->model['Notification']->addNotification($member->ID,$notificationContent);
                }
            }
        }
        header('location: ' . URL . 'tasks/show/' . $task_id);

    }

    public function addRemarK($task_id = 1)
    {
        $user = new  User();
        include APP . 'core/auth/validations/auth_validation.php';
        $task = $this->model['Task']->getTask($task_id);
        $project = $this->model['Project']->getProject($task->project_id);

        $this->model['Task']->addRemarK($_POST['content'], $user->ID, $task_id);


        $notificationContent = $user->getProperty('last_name').' '.$user->getProperty('first_name').' have added a remak to the task " '.$task->name.'" of the project : '.$project->title;
        foreach ($this->model['Project']->getAllMembers($project->id) as $member) {
            $this->model['Notification']->addNotification($member->ID,$notificationContent);
        }

        header('location: ' . URL . 'tasks/show/' . $task_id);

    }


}
