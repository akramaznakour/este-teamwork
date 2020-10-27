<?php

use ptejada\uFlex\User;

class Tasks extends Controller
{

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
                    if ($parentTask->group == 0) {
                        $this->model['Task']->turnIntoGroup($parentTask->id);
                    }
                }

                $this->model['Task']->addTask($_POST["name"], $_POST["actual_start"], $_POST["actual_end"], $style, 0, $mile, $_POST['resources'], $_POST['responsable_id'], '0', $isGroup, $_POST['parent'], '1', $_POST["depend"], '', $_POST["note"], $project_id);
            }
        }
         header('location: ' . URL . 'projects/show/' . $project_id);
    }

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

                $style = 'gtaskblue';
                $mile = 0;
                $isGroup = '0';

                if ($_POST['parent'] != 0) {

                    $parentTask = $this->model['Task']->getTask($_POST['parent']);
                    if ($parentTask->group == 0) {
                        $this->model['Task']->turnIntoGroup($parentTask->id);
                    }
                }

                $this->model['Task']->updateTask($_POST["name"], $_POST["actual_start"], $_POST["actual_end"], $style, 0, $mile, $_POST['resources'], $_POST['responsable_id'], '0', $isGroup, $_POST['parent'], '1', $_POST["depend"], '', $_POST["note"], $task->project_id, $task->id);

            }
        }
            header('location: ' . URL . 'projects/show/' . $task->project_id);
    }


    public function updateProgress($task_id = 1)
    {
        $user = new  User();
        include APP . 'core/auth/validations/auth_validation.php';
        $task = $this->model['Task']->getTask($task_id);
        if ($task->responsable_id != $user->ID && !$task->group)
            header('location: ' . URL . 'projects/show' . $task->project_id);
        else {

            if (isset($_POST["submit_update_task"]) && $_POST['comp'] < 101 && $_POST['comp'] > -1) {
                $this->model['Task']->updateTaskProgress($_POST['comp'], $task_id);
            }
            if (isset($_POST["submit_finished_task"])) {
                $this->model['Task']->updateTaskProgress(100, $task_id);
            }

            $_SESSION["flash_type"] = "success";
            $_SESSION["flash"] = "message";

            header('location: ' . URL . 'projects/show/' . $task->project_id);
        }
    }


}
