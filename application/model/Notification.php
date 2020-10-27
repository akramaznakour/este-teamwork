<?php

/**
 * Class notification
 */
class Notification
{


    /**
     * notification constructor.
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
    public function getAllNotifications($user_id)
    {
        $sql = " SELECT * FROM notifications WHERE vue = 0 AND user_id = " . $user_id;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * @param $project_id
     * @return mixed
     */
    public function hideNotification($notification_id)
    {
        $sql = " UPDATE notifications SET vue = 1 WHERE id =  " . $notification_id;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * @param $notification_id
     * @return mixed
     */
    public function getNotification($notification_id)
    {
        $sql = "SELECT * FROM notifications WHERE id = " . $notification_id;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetch();
    }

    public function setSeen($notification_id){

        $sql = "UPDATE  notifications SET vue = 1  WHERE id = " . $notification_id;
        $query = $this->db->prepare($sql);
        $query->execute();
    }

    public function addNotification($user_id,$content){

        $sql = "INSERT INTO notifications (content , user_id) VALUES (:content, :user_id)";
        $query = $this->db->prepare($sql);
        $parameters = array(':content' => $content, ':user_id' => $user_id);
        $query->execute($parameters);
    }
}
