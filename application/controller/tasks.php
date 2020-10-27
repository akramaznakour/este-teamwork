<?php


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

        include APP . 'core/auth/auth_validation.php';

        $task = $this->model['Task']->getTask($task_id);


        if (!$this->model['Project']->isMember($user->id, $task->project_id))
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


        include APP . 'core/auth/auth_validation.php';
        $project = $this->model['Project']->getProject($project_id);

        $members = $this->model['Project']->getAllMembers($project_id);
        if ($project->admin_id != $user->id)
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

                $task = $this->model['Task']->addTask($_POST["name"], $_POST["start_date"], $_POST["end_date"], $style, 0, $mile, $_POST['resources'], $_POST['responsables_ids'], '0', $isGroup, $_POST['parent'], '1', $_POST["depend"], '0', $_POST["note"], $project_id);

                if ($_POST["depend"] != 0) {
                    $dependTask = $this->model['Task']->getTask($_POST["depend"]);
                    if ($dependTask->isGroup == 0) {
                        if ($dependTask->end_date < $task->end_date)
                            $this->model['Task']->updateStartDate($dependTask->end_date, $task->id);
                    } else {
                        echo "whene it is a group";
                    }
                }

                $notificationContent = $user->last_name . ' ' . $user->first_name . ' added a new task " ' . $_POST["name"] . '" to the project : ' . $project->title;
                foreach ($this->model['Project']->getAllMembers($project_id) as $member) {
                    $this->model['Notification']->addNotification($member->id, $notificationContent);
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

        include APP . 'core/auth/auth_validation.php';

        $task = $this->model['Task']->getTask($task_id);
        $project = $this->model['Project']->getProject($task->project_id);
        $oldParentTask = null;
        if ($task->parent != 0)
            $oldParentTask = $this->model['Task']->getTask($task->parent);

        if ($project->admin_id != $user->id)
            header('location: ' . URL . 'projects/');
        else {

            if (isset($_POST["submit_update_task"])) {


                $link = $mile = '0';
                $open = '1';
                $caption = '';

                if ($_POST['parent'] != 0) {

                    $parentTask = $this->model['Task']->getTask($_POST['parent']);

                    if ($parentTask->start_date > $task->start_date)
                        $this->model['Task']->updateStartDate($task->start_date, $parentTask->id);

                    if ($parentTask->end_date < $task->end_date)
                        $this->model['Task']->updateEndDate($task->end_date, $parentTask->id);

                    if ($parentTask->isGroup == 0)
                        $this->model['Task']->turnIntoGroup($parentTask->id);

                    if ($task->parent != 0 && $_POST['depend'] != $task->parent) {
                        echo count($this->model['Task']->getSubTasks($task->parent));
                        if (count($this->model['Task']->getSubTasks($task->parent)) >= 1) {
                            $this->model['Task']->turnIntoTask($task->parent);
                            echo 'turned into ';
                        }
                    }


                }
                $this->model['Task']->updateTask($_POST["name"], $_POST["start_date"], $_POST["end_date"], $_POST["style"], $link, $mile, $_POST['responsables_ids'], $_POST["isGroup"], $_POST['parent'], $open, $_POST["depend"], $caption, $_POST["note"], $_POST['resources'], $task_id, $task->project_id);


                if ($_POST["depend"] != 0) {
                    $dependTask = $this->model['Task']->getTask($_POST["depend"]);
                    if ($dependTask->isGroup == 0) {
                        if ($dependTask->end_date < $task->end_date)

                            $this->model['Task']->updateStartDate(date_add(new DateTime($dependTask->end_date), new  DateInterval('P1D'))->format('Y-m-d'), $task->id);
                    } else {
                        echo "whene it is a group";
                        $this->model['Task']->updateStartDate(date_add(new DateTime($this->model['Task']->getGroupMaxTask($_POST["depend"])->end_date), new  DateInterval('P1D'))->format('Y-m-d'), $task->id);

                    }
                }


                $notificationContent = $user->last_name . ' ' . $user->first_name . ' have edited  the task : ' . $_POST["name"] . '  of the project : ' . $project->title;
                foreach ($this->model['Project']->getAllMembers($project->id) as $member) {
                    $this->model['Notification']->addNotification($member->id, $notificationContent);
                }
            }
        }
        $this->model['Task']->updateAllGroup($task->project_id);
        $this->model['Project']->updateProgress($task->project_id);
        $this->model['Task']->updateAllGroup($task->project_id);
        $this->model['Project']->updateProgress($task->project_id);

        // header('location: ' . URL . 'projects/show/' . $task->project_id . '/tasks_list');
    }

    /**
     * @param int $task_id
     */
    public function updateProgress($task_id = 1)
    {

        include APP . 'core/auth/auth_validation.php';
        $task = $this->model['Task']->getTask($task_id);
        $project = $this->model['Project']->getProject($task->project_id);
        if (!$this->model['Task']->isResponsableOf($task_id, $user->id) && !$task->isGroup)
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

            $notificationContent = $user->last_name . ' ' . $user->first_name . ' have edited the progress of the task : ' . $task->name . ' of the project : ' . $project->title;
            foreach ($this->model['Project']->getAllMembers($project->id) as $member) {
                $this->model['Notification']->addNotification($member->id, $notificationContent);
            }

            header('location: ' . URL . 'projects/show/' . $task->project_id . '/tasks_list');
        }
    }

    /**
     * @param int $task_id
     */
    public function delete($task_id = 1)
    {

        include APP . 'core/auth/auth_validation.php';

        $task = $this->model['Task']->getTask($task_id);
        $project = $this->model['Project']->getProject($task->project_id);

        if ($project->admin_id != $user->id)
            header('location: ' . URL . 'projects/');
        else {
            if ($task->isGroup != 0)
                $this->model['Task']->deleteChildrenTask($task_id);

            $notificationContent = $user->last_name . ' ' . $user->first_name . ' have deleted the task : ' . $task->name . ' of the project : ' . $project->title;
            foreach ($this->model['Project']->getAllMembers($project->id) as $member) {
                $this->model['Notification']->addNotification($member->id, $notificationContent);
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

        include APP . 'core/auth/auth_validation.php';
        $task = $this->model['Task']->getTask($task_id);
        $project = $this->model['Project']->getProject($task->project_id);

        if ($this->model['Task']->isResponsableOf($task_id, $user->id)) {
            for ($i = 0; $i < count($_FILES['files']['name']); $i++) {

                $target_dir = "files/";
                $target_file = $target_dir . basename($_FILES["files"]["name"][$i]);
                $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $target_file = $target_dir . uniqid() . '.' . $fileType;
                move_uploaded_file($_FILES["files"]["tmp_name"][$i], $target_file);
                $this->model['Task']->addFile($_FILES["files"]["name"][$i], $fileType, $target_file, $task_id);


                $notificationContent = $user->last_name . ' ' . $user->first_name . ' have uploaded a file to the task : ' . $task->name . ' of the project : ' . $project->title;
                foreach ($this->model['Project']->getAllMembers($project->id) as $member) {
                    $this->model['Notification']->addNotification($member->id, $notificationContent);
                }
            }
        }
        header('location: ' . URL . 'tasks/show/' . $task_id);

    }

    public function addRemarKProject($project_id = 1)
    {

        include APP . 'core/auth/auth_validation.php';
        $task = $this->model['Task']->getTask($task_id);
        $project = $this->model['Project']->getProject($project_id);

        $this->model['Task']->addRemarK($_POST['content'], $user->id, $project_id, '0');


        $notificationContent = $user->last_name . ' ' . $user->first_name . ' have added a remak to the project : ' . $project->title;
        foreach ($this->model['Project']->getAllMembers($project->id) as $member) {
            $this->model['Notification']->addNotification($member->id, $notificationContent);
        }

        header("Location: " . URL . 'projects/show/' . $project_id . '/remarks');

    }

    public function addRemarK($project_id = 1, $task_id = 0)
    {

        include APP . 'core/auth/auth_validation.php';
        $task = $this->model['Task']->getTask($task_id);
        $project = $this->model['Project']->getProject($project_id);

        $this->model['Task']->addRemarK($_POST['content'], $user->id, $project_id, $task_id);


        $notificationContent = $user->last_name . ' ' . $user->first_name . ' have added a remak to the task : ' . $task->name . ' of the project : ' . $project->title;
        foreach ($this->model['Project']->getAllMembers($project->id) as $member) {
            $this->model['Notification']->addNotification($member->id, $notificationContent);
        }

        header("Location: {$_SERVER['HTTP_REFERER']}");

    }


}
