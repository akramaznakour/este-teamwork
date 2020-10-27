<?php

/**
 * Class Project
 */
class Project
{

    /**
     * Project constructor.
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
     * @param $user_id
     * @return mixed
     */
    public function getAllProjects($user_id)
    {
        $sql = "SELECT * FROM projects where id in (select project_id from project_users where user_id = " . $user_id . ")  order by start_date desc ";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * @param $project_id
     * @return mixed
     */
    public function getProject($project_id)
    {
        $sql = "SELECT * FROM projects WHERE id = :project_id  ";
        $query = $this->db->prepare($sql);
        $parameters = array(':project_id' => $project_id);

        $query->execute($parameters);

        return $query->fetch();
    }

    /**
     * @param $title
     * @param $description
     * @param $admin_id
     * @param $start_date
     * @param $end_date
     */
    public function addProject($title, $description, $admin_id, $start_date, $end_date)
    {
        $sql = "INSERT INTO projects (title,description,admin_id,start_date,end_date) VALUES (:title, :description, :admin_id, :start_date, :end_date)";
        $query = $this->db->prepare($sql);
        $parameters = array(':title' => $title, ':description' => $description, ':admin_id' => $admin_id, ':start_date' => $start_date, ':end_date' => $end_date);
        $query->execute($parameters);

        $project_id = $this->getProjectId($title, $description, $admin_id, $start_date, $end_date);
        $this->addMember($project_id, $admin_id);

        return $project_id;
    }

    /**
     * @param $title
     * @param $description
     * @param $admin_id
     * @param $start_date
     * @param $end_date
     * @param $project_id
     */
    public function updateProject($title, $description, $admin_id, $start_date, $end_date, $project_id)
    {
        $sql = "UPDATE projects SET title = :title, description = :description, admin_id = :admin_id, start_date = :start_date ,  end_date = :end_date   WHERE id = :project_id ";
        $query = $this->db->prepare($sql);
        $parameters = array(':title' => $title, ':description' => $description, ':admin_id' => $admin_id, ':start_date' => $start_date, ':end_date' => $end_date, ':project_id' => $project_id);

        $query->execute($parameters);
    }

    /**
     * @param $project_id
     */
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

    /**
     * @param $project_id
     * @param $user_id
     */
    public function addMember($project_id, $user_id)
    {
        $sql = "INSERT INTO project_users (project_id ,user_id) VALUES (:project_id, :user_id)";
        $query = $this->db->prepare($sql);
        $parameters = array(':project_id' => $project_id, ':user_id' => $user_id);

        $query->execute($parameters);
    }

    /**
     * @param $project_id
     */
    public function updateProgress($project_id)
    {
        $progress = 0;
        $firstLevetTaskCount = 0;

        $sql = "SELECT * FROM tasks WHERE project_id = " . $project_id;
        $query = $this->db->prepare($sql);
        $query->execute();
        $tasks = $query->fetchAll();

        foreach ($tasks as $task) {
            if ($task->parent == 0) {
                $progress += $task->progress;
                $firstLevetTaskCount++;
            }

        }


        $sql = "UPDATE projects SET progress = round(" . $progress / $firstLevetTaskCount . ",0) WHERE id = " . $project_id;
        $query = $this->db->prepare($sql);
        $query->execute();

        if ($progress / $firstLevetTaskCount == 100) {
            $sql = "UPDATE projects SET actual_end = NOW() WHERE id = " . $project_id;
            $query = $this->db->prepare($sql);
            $query->execute();
        }

    }


    /**
     * @param $user_id
     * @return mixed
     */
    public
    function getAllUncompletedProjectsMemberOf($user_id)
    {
        $sql = "SELECT * FROM projects where id in (select project_id from project_users where user_id = " . $user_id . ") and   not progress = 100  and admin_id not like " . $user_id . " order by start_date desc ";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * @param $user_id
     * @return mixed
     */
    public
    function getAllUncompletedProjectsAdminOf($user_id)
    {
        $sql = "SELECT * FROM projects where admin_id = " . $user_id . " and not progress = 100    order by start_date desc ";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }


    /**
     * @param $user_id
     * @return mixed
     */
    public
    function getAllCompletedProjectsMemberOf($user_id)
    {
        $sql = "SELECT * FROM projects where id in (select project_id from project_users where user_id = " . $user_id . ") and   progress = 100 and admin_id not like " . $user_id . " order by start_date desc ";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * @param $user_id
     * @return mixed
     */
    public
    function getAllCompletedProjectsAdminOf($user_id)
    {
        $sql = "SELECT * FROM projects where admin_id = " . $user_id . "   and   progress = 100  order by start_date desc ";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * @param $project_id
     * @return mixed
     */
    public
    function getAllMembers($project_id)
    {
        $sql = "SELECT id,first_name,last_name,avatar,email from users where id in ( SELECT user_id from project_users WHERE project_id = :project_id) ";
        $query = $this->db->prepare($sql);
        $parameters = array(':project_id' => $project_id);

        $query->execute($parameters);

        return $query->fetchAll();
    }

    /**
     * @param $user_id
     * @param $project_id
     * @return bool
     */
    public
    function isMember($user_id, $project_id)
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

    public
    function getProjectId($title, $description, $admin_id, $start_date, $end_date)
    {

        $sql = "SELECT id from projects where title = :title and description  = :description and admin_id = :admin_id and start_date = :start_date  and end_date = :end_date";
        $query = $this->db->prepare($sql);
        $parameters = array(':title' => $title, ':description' => $description, ':admin_id' => $admin_id, ':start_date' => $start_date, ':end_date' => $end_date);
        $query->execute($parameters);
        foreach ($query->fetchAll() as $row)
            $project_id = $row->id;
        return $project_id;
    }

    function getAllRemarks($project_id)
    {
        $sql = "SELECT * from remarks   WHERE project_id = :project_id  ORDER BY time DESC";
        $query = $this->db->prepare($sql);
        $parameters = array(':project_id' => $project_id);
        $query->execute($parameters);
        return $query->fetchAll();
    }
}
