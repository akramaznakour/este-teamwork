<?php

class Message
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
     * Get all Messages from database
     */
    public function getAllMessages($project_id,$msg_nbr_to_update)
    {
        $sql = "SELECT user_id, users.first_name, users.last_name, users.avatar,messages.message, messages.time FROM Messages join users where messages.user_id = users.id and  project_id = ".$project_id."  ORDER  BY  messages.id DESC LIMIT ". $msg_nbr_to_update;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
    public function countAllMessages($project_id)
    {
        $sql = "SELECT COUNT(*) as COUNT FROM Messages where project_id = ".$project_id;
        $query = $this->db->prepare($sql);
        $query->execute();


        return $query->fetchAll();
    }

    public function addMessage($project_id,$user_id,$message)
    {
        $sql = "INSERT INTO Messages (project_id, user_id, message) VALUES (:project_id, :user_id, :message)";
        $query = $this->db->prepare($sql);
        $parameters = array(':project_id' => $project_id, ':user_id' => $user_id, ':message' => $message);

        $query->execute($parameters);
    }

}
