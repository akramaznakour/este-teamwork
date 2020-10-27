<?php

class task
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
        $sql = "SELECT * FROM tasks WHERE project_id = " . $project_id;
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

    public function getTaskResources($task_id)
    {
        $sql = "SELECT * FROM resources WHERE task_id = " . $task_id;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function turnIntoGroup($task_id)
    {
        $sql = "UPDATE tasks SET tasks.group = 1 , tasks.style = 'ggroupblack'  WHERE id = " . $task_id;
        $query = $this->db->prepare($sql);
        $query->execute();

    }


    public function addTask($name, $actual_start, $actual_end, $style, $link, $mile, $resources, $responsable_id, $comp, $group, $parent, $open, $depend, $caption, $note, $project_id)
    {
        $sql = "INSERT INTO `tasks` ( `name`, `actual_start`, `actual_end`, `style`, `link`, `mile`, `responsable_id`, `comp`, `group`, `parent`, `open`, `depend`, `caption`, `note`, `project_id`) VALUES ( :name , :actual_start , :actual_end , :style , :link , :mile  , :responsable_id , :comp , :group , :parent , :open , :depend , :caption , :note , :project_id)";
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $name, ':actual_start' => $actual_start, ':actual_end' => $actual_end, ':style' => $style, ':link' => $link, ':mile' => $mile, ':responsable_id' => $responsable_id, ':comp' => $comp, ':group' => $group, ':parent' => $parent, ':open' => $open, ':depend' => $depend, ':caption' => $caption, ':note' => $note, ':project_id' => $project_id);
        $query->execute($parameters);

        $task_id = 0;

        $sql = "SELECT id from tasks where  name = :name AND actual_start = :actual_start  AND actual_end = :actual_end AND project_id = :project_id AND responsable_id = :responsable_id AND project_id = :project_id  ";
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $name, ':actual_start' => $actual_start, ':actual_end' => $actual_end, ':responsable_id' => $responsable_id, ':project_id' => $project_id);
        $query->execute($parameters);
        foreach ($query->fetchAll() as $row)
            $task_id = $row->id;

        /**********************/

        $this->addResources($task_id, $resources);
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

    public function updateTask($name, $actual_start, $actual_end, $style, $link, $mile, $resources, $responsable_id, $comp, $group, $parent, $open, $depend, $caption, $note, $project_id, $task_id)
    {
        $sql = "UPDATE `tasks` SET  `name`= :name,`actual_start`= :actual_start,`actual_end`= :actual_end,`style`= :style,`link`= :link,`mile`= :mile,`resources`= :resources,`responsable_id`= :responsable_id,`comp`= :comp,`group`= :group,`parent`= :parent,`open`= :open,`depend`= :depend,`caption`= :caption,`note`= :note,`project_id`= :project_id WHERE id = :task_id ";
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $name, ':actual_start' => $actual_start, ':actual_end' => $actual_end, ':style' => $style, ':link' => $link, ':mile' => $mile, ':resources' => $resources, ':responsable_id' => $responsable_id, ':comp' => $comp, ':group' => $group, ':parent' => $parent, ':open' => $open, ':depend' => $depend, ':caption' => $caption, ':note' => $note, ':project_id' => $project_id, ':task_id' => $task_id);
        $query->execute($parameters);
    }

    public function updateTaskProgress($comp, $task_id)
    {
        $sql = "UPDATE `tasks` SET `comp`= :comp WHERE id = :task_id ";
        $query = $this->db->prepare($sql);
        $parameters = array(':comp' => $comp, ':task_id' => $task_id);
        $query->execute($parameters);

    }


}
