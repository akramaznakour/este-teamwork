<?php

/**
 * Class task
 */
class task
{


    /**
     * task constructor.
     * @param $db
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    /**
     * @param $project_id
     * @return mixed
     */
    public function getAllTasks($project_id)
    {
        $sql = "SELECT * FROM tasks WHERE project_id = " . $project_id;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * @param $task_id
     * @return mixed
     */
    public function getTask($task_id)
    {
        $sql = "SELECT * FROM tasks WHERE id = " . $task_id;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetch();
    }

    /**
     * @param $task_id
     * @return mixed
     */
    public function getTaskResources($task_id)
    {
        $sql = "SELECT * FROM resources WHERE task_id = " . $task_id;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * @param $task_id
     */
    public function turnIntoisGroup($task_id)
    {
        $sql = "UPDATE tasks SET tasks.isGroup = 1 , tasks.style = 'gisGroupblack'  WHERE id = " . $task_id;
        $query = $this->db->prepare($sql);
        $query->execute();

    }


    /**
     * @param $name
     * @param $start_date
     * @param $end_date
     * @param $style
     * @param $link
     * @param $mile
     * @param $resources
     * @param $responsable_id
     * @param $progress
     * @param $isGroup
     * @param $parent
     * @param $open
     * @param $depend
     * @param $caption
     * @param $note
     * @param $project_id
     */
    public function addTask($name, $start_date, $end_date, $style, $link, $mile, $resources, $responsable_id, $progress, $isGroup, $parent, $open, $depend, $caption, $note, $project_id)
    {
        $sql = "INSERT INTO `tasks` ( `name`, `start_date`, `end_date`, `style`, `link`, `mile`, `responsable_id`, `progress`, `isGroup`, `parent`, `open`, `depend`, `caption`, `note`, `project_id`) VALUES ( :name , :start_date , :end_date , :style , :link , :mile  , :responsable_id , :progress , :isGroup , :parent , :open , :depend , :caption , :note , :project_id)";
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $name, ':start_date' => $start_date, ':end_date' => $end_date, ':style' => $style, ':link' => $link, ':mile' => $mile, ':responsable_id' => $responsable_id, ':progress' => $progress, ':isGroup' => $isGroup, ':parent' => $parent, ':open' => $open, ':depend' => $depend, ':caption' => $caption, ':note' => $note, ':project_id' => $project_id);
        $query->execute($parameters);

        $task_id = 0;

        $sql = "SELECT id from tasks where  name = :name AND start_date = :start_date  AND end_date = :end_date AND project_id = :project_id AND responsable_id = :responsable_id AND project_id = :project_id  ";
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $name, ':start_date' => $start_date, ':end_date' => $end_date, ':responsable_id' => $responsable_id, ':project_id' => $project_id);
        $query->execute($parameters);
        foreach ($query->fetchAll() as $row)
            $task_id = $row->id;

        /**********************/

        $this->addResources($task_id, $resources);
    }

    /**
     * @param $task_id
     * @param $resources
     */
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

    /**
     * @param $task_id
     * @param $resources
     */
    public function updateResources($task_id, $resources)
    {
        $this->deleteAllResources($task_id);
        $this->addResources($task_id, $resources);
    }


    public function updateTask($name, $start_date, $end_date, $style, $link, $mile, $responsable_id, $isGroup, $parent, $open, $depend, $caption, $note, $resources, $task_id, $project_id)
    {
        $sql = "UPDATE `tasks` SET  `name`= :name,`start_date`= :start_date,`end_date`= :end_date,`style`= :style,`link`= :link,`mile`= :mile,`responsable_id`= :responsable_id,`isGroup`= :isGroup,`parent`= :parent,`open`= :open ,`depend`= :depend,`caption`= :caption,`note`= :note,`project_id`= :project_id WHERE id = :task_id ";
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $name, ':start_date' => $start_date, ':end_date' => $end_date, ':style' => $style, ':link' => $link, ':mile' => $mile, ':responsable_id' => $responsable_id, ':isGroup' => $isGroup, ':parent' => $parent, ':open' => $open, ':depend' => $depend, ':caption' => $caption, ':note' => $note, ':project_id' => $project_id, ':task_id' => $task_id);
        $query->execute($parameters);
        $this->updateResources($task_id, $resources);
    }

    /**
     * @param $progress
     * @param $task_id
     */
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

    /**
     * @param $task_id
     */
    public function deleteAllResources($task_id)
    {
        $sql = "DELETE FROM resources WHERE task_id = " . $task_id;
        $query = $this->db->prepare($sql);
        $query->execute();

    }

    /**
     * @param $project_id
     */
    public function deleteAllTasks($project_id)
    {
        foreach ($this->getAllTasks($project_id) as $task) {
            $this->deleteAllResources($task->id);
        }
        $sql = "DELETE FROM tasks WHERE project_id = " . $project_id;
        $query = $this->db->prepare($sql);
        $query->execute();

    }

    /**
     * @param $task_id
     */
    public function deleteTask($task_id)
    {
        $sql = "DELETE FROM tasks WHERE id = " . $task_id;
        $query = $this->db->prepare($sql);
        $query->execute();
    }

    /**
     * @param $task_id
     */
    public function deleteChildrenTask($task_id)
    {
        $sql = "DELETE FROM tasks WHERE parent = " . $task_id;
        $query = $this->db->prepare($sql);
        $query->execute();
    }


}
