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


    public function addTask($name, $actual_start, $actual_end, $style, $link, $mile, $responsable, $comp, $group, $parent, $open, $depend, $caption, $note, $project_id)
    {
        $sql = "INSERT INTO `tasks` ( `name`, `actual_start`, `actual_end`, `style`, `link`, `mile`, `responsable`, `comp`, `group`, `parent`, `open`, `depend`, `caption`, `note`, `project_id`) VALUES ( :name , :actual_start , :actual_end , :style , :link , :mile , :responsable , :comp , :group , :parent , :open , :depend , :caption , :note , :project_id)";
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $name ,  ':actual_start' => $actual_start ,  ':actual_end' => $actual_end ,  ':style' => $style ,  ':link' => $link ,  ':mile' => $mile ,  ':responsable' => $responsable ,  ':comp' => $comp ,  ':group' => $group ,  ':parent' => $parent ,  ':open' => $open ,  ':depend' => $depend ,  ':caption' => $caption ,  ':note' => $note ,  ':project_id' => $project_id);
        $query->execute($parameters);

    }


}
