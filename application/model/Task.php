<?php

/**
 * Class task
 */
class Task
{


    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }


    public function getAllTasks($project_id)
    {
        $sql = "select * from tasks  where project_id = " . $project_id . " group by id,parent  ";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function getAllRemarks($task_id)
    {
        $sql = "select * from remarks  where task_id = " . $task_id ;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }


    public function getTask($task_id)
    {
        $sql = "SELECT * FROM tasks WHERE id = " . $task_id;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetch();
    }


    public function getTaskResponsables($task_id)
    {
        $sql = "SELECT * FROM responsables WHERE task_id = " . $task_id;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }


    public function isResponsableOf($task_id, $user_id)
    {
        $sql = "SELECT count(*) as count FROM responsables WHERE task_id = " . $task_id . " AND responsable_id = " . $user_id;
        $query = $this->db->prepare($sql);
        $query->execute();
        $row = $query->fetch();
        if ($row->count == "1")
            return true;
        else
            return false;
    }


    public function getTaskResources($task_id)
    {
        $sql = "SELECT * FROM resources WHERE task_id = " . $task_id;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }


    public function getTaskRemarks($task_id)
    {
        $sql = "SELECT * FROM remarks WHERE task_id = " . $task_id;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }


    public function getTaskFiles($task_id)
    {
        $sql = "SELECT * FROM files WHERE task_id = " . $task_id;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }


    public function turnIntoisGroup($task_id)
    {
        $sql = "UPDATE tasks SET tasks.isGroup = 1 , tasks.style = 'gisGroupblack'  WHERE id = " . $task_id;
        $query = $this->db->prepare($sql);
        $query->execute();

    }


    public function addTask($name, $start_date, $end_date, $style, $link, $mile, $resources, $responsables, $progress, $isGroup, $parent, $open, $depend, $caption, $note, $project_id)
    {
        $sql = "INSERT INTO `tasks` ( `name`, `start_date`, `end_date`, `style`, `link`, `mile`, `progress`, `isGroup`, `parent`, `open`, `depend`, `caption`, `note`, `project_id`) VALUES ( :name , :start_date , :end_date , :style , :link , :mile   , :progress , :isGroup , :parent , :open , :depend , :caption , :note , :project_id)";
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $name, ':start_date' => $start_date, ':end_date' => $end_date, ':style' => $style, ':link' => $link, ':mile' => $mile, ':progress' => $progress, ':isGroup' => $isGroup, ':parent' => $parent, ':open' => $open, ':depend' => $depend, ':caption' => $caption, ':note' => $note, ':project_id' => $project_id);
        $query->execute($parameters);

        $task_id = 0;

        $sql = "SELECT id from tasks where  name = :name AND start_date = :start_date  AND end_date = :end_date AND project_id = :project_id  AND project_id = :project_id  ";
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $name, ':start_date' => $start_date, ':end_date' => $end_date, ':project_id' => $project_id);
        $query->execute($parameters);
        foreach ($query->fetchAll() as $row)
            $task_id = $row->id;

        /**********************/

        $this->addResponsables($task_id, $responsables);
        $this->addResources($task_id, $resources);
    }


    public function addResponsables($task_id, $responsables)
    {
        foreach ($responsables as $responsable) {
            $sql = "INSERT INTO responsables (task_id , responsable_id) VALUES (:task_id, :responsable_id)";
            $query = $this->db->prepare($sql);
            $parameters = array(':task_id' => $task_id, ':responsable_id' => $responsable);
            $query->execute($parameters);
        }
    }


    public function addResources($task_id, $resources)
    {
        foreach ($resources as $resource) {
            $sql = "INSERT INTO resources (task_id , name) VALUES (:task_id, :resource)";
            $query = $this->db->prepare($sql);
            $parameters = array(':task_id' => $task_id, ':resource' => $resource);
            $query->execute($parameters);
        }
    }

    public function turnIntoGroup($task_id)
    {
        $sql = "UPDATE tasks SET tasks.isGroup = 1 , tasks.style = 'ggroupblack'  WHERE id = " . $task_id;
        $query = $this->db->prepare($sql);
        $query->execute();

    }


    public function updateResources($task_id, $resources)
    {
        $this->deleteAllResources($task_id);
        $this->addResources($task_id, $resources);
    }
    public function updateResponsables($task_id, $responsables)
    {
        $this->deleteAllResponsables($task_id);
        $this->addResponsables($task_id, $responsables);
    }


    public function updateTask($name, $start_date, $end_date, $style, $link, $mile, $responsables, $isGroup, $parent, $open, $depend, $caption, $note, $resources, $task_id, $project_id)
    {
        $sql = "UPDATE `tasks` SET  `name`= :name,`start_date`= :start_date,`end_date`= :end_date,`style`= :style,`link`= :link,`mile`= :mile,`isGroup`= :isGroup,`parent`= :parent,`open`= :open ,`depend`= :depend,`caption`= :caption,`note`= :note,`project_id`= :project_id WHERE id = :task_id ";
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $name, ':start_date' => $start_date, ':end_date' => $end_date, ':style' => $style, ':link' => $link, ':mile' => $mile,  ':isGroup' => $isGroup, ':parent' => $parent, ':open' => $open, ':depend' => $depend, ':caption' => $caption, ':note' => $note, ':project_id' => $project_id, ':task_id' => $task_id);
        $query->execute($parameters);
        $this->updateResources($task_id, $resources);
        $this->updateResponsables($task_id, $responsables);
    }

    public function updateTaskProgress($progress, $task_id)
    {
        $sql = "UPDATE `tasks` SET `progress`= :progress WHERE id = :task_id ";
        $query = $this->db->prepare($sql);
        $parameters = array(':progress' => $progress, ':task_id' => $task_id);
        $query->execute($parameters);

    }

    public function updateGroupProgress($groupTaskId, $project_id)
    {
        $groupProgress = 0;
        $sql = "select round(SUM(progress)/count(*),0) as progress from tasks where project_id = " . $project_id . " and parent = " . $groupTaskId;
        $query = $this->db->prepare($sql);
        $query->execute();
        $groupProgress += $query->fetch()->progress;


        $sql = "UPDATE `tasks` SET `progress`= :progress WHERE id = :task_id ";
        $query = $this->db->prepare($sql);
        $parameters = array(':progress' => $groupProgress, ':task_id' => $groupTaskId);
        $query->execute($parameters);
    }

    public function updateAllGroup($project_id)
    {
        $tasks = $this->getAllTasks($project_id);
        foreach ($tasks as $task) if ($task->isGroup == '1') $this->updateGroupProgress($task->id, $project_id);
    }

    public function deleteAllResources($task_id)
    {
        $sql = "DELETE FROM resources WHERE task_id = " . $task_id;
        $query = $this->db->prepare($sql);
        $query->execute();

    }
    public function deleteAllResponsables($task_id)
    {
        $sql = "DELETE FROM responsables WHERE task_id = " . $task_id;
        $query = $this->db->prepare($sql);
        $query->execute();

    }

    public function deleteAllTasks($project_id)
    {
        foreach ($this->getAllTasks($project_id) as $task) {
            $this->deleteAllResources($task->id);
        }
        $sql = "DELETE FROM tasks WHERE project_id = " . $project_id;
        $query = $this->db->prepare($sql);
        $query->execute();

    }


    public function deleteTask($task_id)
    {
        $sql = "DELETE FROM tasks WHERE id = " . $task_id;
        $query = $this->db->prepare($sql);
        $query->execute();
    }

    public function deleteChildrenTask($task_id)
    {
        $sql = "DELETE FROM tasks WHERE parent = " . $task_id;
        $query = $this->db->prepare($sql);
        $query->execute();
    }

    public function addFile($name, $type, $path, $task_id)
    {
        $sql = "INSERT INTO files (name,type,path,task_id) VALUES (:name,:type,:path,:task_id)";
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $name, ':type' => $type, ':path' => $path, ':task_id' => $task_id);
        $query->execute($parameters);
    }

    public function addRemarK($content, $user_id, $task_id)
    {
        $sql = "INSERT INTO remarks (content,user_id,task_id) VALUES (:content,:user_id,:task_id)";
        $query = $this->db->prepare($sql);
        $parameters = array(':content' => $content, ':user_id' => $user_id, ':task_id' => $task_id);
        $query->execute($parameters);
    }
}
