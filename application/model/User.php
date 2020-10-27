<?php

/**
 * Class User
 */
class User
{
    /**
     * @param object $db A PDO database connection
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
     * Get all users from database
     */
    public function getAllusers($q)
    {
        $sql = "SELECT ID,First_name,Last_name,Avatar,Email FROM users where email like '%" . $q . "%' ";
        $query = $this->db->prepare($sql);
        $query->execute();


        return $query->fetchAll();
    }


    /**
     * @param $project_id
     * @param $q
     * @return mixed
     */
    public function getUninvitedUsers($project_id, $q)
    {
        $sql = "SELECT ID,First_name,Last_name,Avatar,Email FROM users where email like '%" . $q . "%' and  ID not in (SELECT user_invited_id from invitations where project_id = " . $project_id . " ) and ID not in (SELECT user_id from project_users where project_id = " . $project_id . ")";
        $query = $this->db->prepare($sql);
        $query->execute();


        return $query->fetchAll();
    }

    /**
     * @param $user_id
     * @return mixed
     */
    public function getUser($user_id)
    {
        $sql = "SELECT * FROM users WHERE id = :user_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':user_id' => $user_id);
        $query->execute($parameters);

        return $query->fetch();
    }

    /**
     * @param $user_id
     */
    public function activateUser($user_id)
    {
        $sql = "UPDATE users SET Activated =1 WHERE id = :user_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':user_id' => $user_id);
        $query->execute($parameters);
    }

}
