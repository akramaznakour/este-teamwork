<?php

use ptejada\uFlex\User;

class Tasks extends Controller
{

    public function index($project_id = 1)
    {
        echo json_encode($this->model['Task']->getAllTasks($project_id));

    }


    public function create($project_id = 1)
    {
        $user = new  User();
        include APP . 'core/auth/validations/auth_validation.php';
        $project = $this->model['Project']->getProject($project_id);
        $members = $this->model['Project']->getAllMembers($project_id);
        $invited_users = $this->model['Invitation']->getInvitedUsers($project_id);
        if ($project->admin_id != $user->ID)
            header('location: ' . URL . 'projects/');
        else {
            if (isset($_POST["submit_add_task"])) {
                // print_r($_POST);

                $style = 'gtaskblue';
                $mile = 0;
                print_r($_POST['responsable']);
                $rescource = '';
                /*    for ($i = 0; $i < count($_POST['rescource']); $i++) {
                        $responsables = '';
                        foreach ($_POST['responsable'][$i] as $responsable) {
                           // echo print_r( $_POST['responsable'][1])." <br/> ";
                            $responsables .= $responsable[$i] . ' , ';
                        }
                        $rescource .= 'rescource :' . $_POST['rescource'][$i] . ' responsable : ' . $responsables;
                    }

                   */
                //echo '<br/>' . $responsables;
                //   $this->model['Task']->addTask($_POST["name"], $_POST["actual_start"], $_POST["actual_end"], $_POST["style"], $_POST["link"], $_POST["mile"], $_POST["responsable"], $_POST["comp"], $_POST["group"], $_POST["parent"], $_POST["open"], $_POST["depend"], $_POST["caption"], $_POST["note"], $project_id);
            }
        }
        //    header('location: ' . URL . 'projects/show/' . $project_id);
    }


    public function update($task_id = 1)
    {
        $user = new  User();
        include APP . 'core/auth/validations/auth_validation.php';
        $task = $this->model['Project']->getProject($task_id);
        if ($task->admin_id != $user->ID)
            header('location: ' . URL . 'tasks/index');
        else {

            if (isset($_POST["submit_update_task"])) {
                $this->model['Project']->updateProject($_POST['title'], $_POST['description'], $_POST['admin_id'], $_POST['start_date'], $_POST['end_date'], $task_id);
            }
            header('location: ' . URL . 'tasks/edit/' . $task_id);
        }
    }

    public function delete($task_id)
    {
    }


}
