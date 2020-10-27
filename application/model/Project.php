<?php

class Project
{

    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }


    public function getAllProjects($user_id)
    {
        $sql = "SELECT * FROM projects where id in (select project_id from project_users where user_id = " . $user_id . ")  order by start_date desc ";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }


    public function getAllUncompletedProjectsMemberOf($user_id)
    {
        $sql = "SELECT * FROM projects where id in (select project_id from project_users where user_id = " . $user_id . ") and end_date > Now() and admin_id not like " . $user_id ." order by start_date desc ";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function getAllUncompletedProjectsAdminOf($user_id)
    {
        $sql = "SELECT * FROM projects where admin_id = " . $user_id . " and end_date > Now()  order by start_date desc ";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }


    public function getAllCompletedProjectsMemberOf($user_id)
    {
        $sql = "SELECT * FROM projects where id in (select project_id from project_users where user_id = " . $user_id . ") and end_date < Now() and admin_id not like " . $user_id ." order by start_date desc ";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function getAllCompletedProjectsAdminOf($user_id)
    {
        $sql = "SELECT * FROM projects where admin_id = " . $user_id . " and end_date < Now()  order by start_date desc ";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function getProject($project_id)
    {
        $sql = "SELECT * FROM projects WHERE id = :project_id LIMIT 1 ";
        $query = $this->db->prepare($sql);
        $parameters = array(':project_id' => $project_id);

        $query->execute($parameters);

        return $query->fetch();
    }

    public function getAllMembers($project_id)
    {
        $sql = "SELECT ID,First_name,Last_name,Avatar,Email from users where id in ( SELECT user_id from project_users WHERE project_id = :project_id) ";
        $query = $this->db->prepare($sql);
        $parameters = array(':project_id' => $project_id);

        $query->execute($parameters);

        return $query->fetchAll();
    }

    public function addProject($title, $description, $admin_id, $start_date, $end_date)
    {
        $sql = "INSERT INTO projects (title,description,admin_id,start_date,end_date) VALUES (:title, :description, :admin_id, :start_date, :end_date)";
        $query = $this->db->prepare($sql);
        $parameters = array(':title' => $title, ':description' => $description, ':admin_id' => $admin_id, ':start_date' => $start_date, ':end_date' => $end_date);
        $query->execute($parameters);

        $project_id = 0;

        $sql = "SELECT id from projects where title = :title and description  = :description and admin_id = :admin_id and start_date = :start_date  and end_date = :end_date";
        $query = $this->db->prepare($sql);
        $parameters = array(':title' => $title, ':description' => $description, ':admin_id' => $admin_id, ':start_date' => $start_date, ':end_date' => $end_date);
        $query->execute($parameters);
        foreach ($query->fetchAll() as $row)
            $project_id = $row->id;

        /**********************/

        $this->addMember($project_id, $admin_id);
    }

    public function addMember($project_id, $user_id)
    {
        $sql = "INSERT INTO project_users (project_id ,user_id) VALUES (:project_id, :user_id)";
        $query = $this->db->prepare($sql);
        $parameters = array(':project_id' => $project_id, ':user_id' => $user_id);

        $query->execute($parameters);
    }

    public function updateProject($title, $description, $admin_id, $start_date, $end_date, $project_id)
    {
        $sql = "UPDATE projects SET title = :title, description = :description, admin_id = :admin_id, start_date = :start_date ,  end_date = :end_date   WHERE id = :project_id ";
        $query = $this->db->prepare($sql);
        $parameters = array(':title' => $title, ':description' => $description, ':admin_id' => $admin_id, ':start_date' => $start_date, ':end_date' => $end_date, ':project_id' => $project_id);

        $query->execute($parameters);
    }

    public function deleteProject($project_id)
    {
        $sql = "DELETE FROM projects WHERE id = :project_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':project_id' => $project_id);

        $query->execute($parameters);

        $sql = "DELETE FROM project_users WHERE project_id = :project_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':project_id' => $project_id);

        $query->execute($parameters);
    }


    public function isMember($user_id, $project_id)
    {
        $is_member = false;

        $sql = "SELECT id FROM projects where id in (select project_id from project_users where user_id = " . $user_id . ")";
        $query = $this->db->prepare($sql);
        $query->execute();
        foreach ($query->fetchAll() as $line)
            if ($line->id == $project_id) {
                $is_member = true;
                break;
            }

        return $is_member;
    }
}
