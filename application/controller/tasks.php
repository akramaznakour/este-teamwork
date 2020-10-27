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
    public function index($project_id = 1)
    {
        $user = new  User();
        include APP . 'core/auth/validations/auth_validation.php';
        if (!$this->model['Project']->isMember($user->ID, $project_id))
            header('location: ' . URL . 'projects/index');
        else {
            echo json_encode($this->model['Task']->getAllTasks($project_id));
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

                $this->model['Task']->addTask($_POST["name"], $_POST["start_date"], $_POST["end_date"], $style, 0, $mile, $_POST['resources'], $_POST['responsable_id'], '0', $isGroup, $_POST['parent'], '1', $_POST["depend"], '0', $_POST["note"], $project_id);
            }
        }
        $this->model['Task']->updateAllGroup($project_id);
        $this->model['Project']->updateProgress($project_id);
        header('location: ' . URL . 'projects/show/' . $project_id);
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
                $this->model['Task']->updateTask($_POST["name"], $_POST["start_date"], $_POST["end_date"], $_POST["style"], $link, $mile, $_POST['responsable_id'],  $_POST["isGroup"], $_POST['parent'], $open, $_POST["depend"], $caption, $_POST["note"], $_POST['resources'], $task_id, $task->project_id);
            }
        }
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
        if ($task->responsable_id != $user->ID && !$task->isGroup)
            header('location: ' . URL . 'projects/show' . $task->project_id);
        else {

            if (isset($_POST["submit_update_task"]) && $_POST['progress'] < 101 && $_POST['progress'] > -1) {
                $this->model['Task']->updateTaskProgress($_POST['progress'], $task_id);
            }
            if (isset($_POST["submit_finished_task"])) {
                $this->model['Task']->updateTaskProgress(100, $task_id);
            }

            $_SESSION["flash_type"] = "success";
            $_SESSION["flash"] = "message";

            $this->model['Task']->updateAllGroup($task->project_id);
            $this->model['Project']->updateProgress($task->project_id);
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
            $this->model['Task']->deleteTask($task_id);
        }

        $this->model['Task']->updateAllGroup($task->project_id);
        $this->model['Project']->updateProgress($task->project_id);
        header('location: ' . URL . 'projects/show/' . $task->project_id);
    }

}
