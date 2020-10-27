<?php

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
        $sql = "SELECT ID,First_name,Last_name,Avatar,Email FROM users where email like '%".$q."%' ";
        $query = $this->db->prepare($sql);
        $query->execute();


        return $query->fetchAll();
    }

    public function getUser($user_id)
    {
        $sql = "SELECT * FROM users WHERE id = :user_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':user_id' => $user_id);
        $query->execute($parameters);

        return $query->fetch();
    }

}
