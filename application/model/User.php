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

    public function addUser($first_name, $last_name, $email,$confirmation, $password)
    {
        $sql = "INSERT INTO users ( first_name, last_name,email,confirmation, password) VALUES (:first_name, :last_name, :email, :confirmation, :password )";
        $query = $this->db->prepare($sql);
        $parameters = array(':first_name' => $first_name, ':last_name' => $last_name, ':email' => $email, ':confirmation' => $confirmation, ':password' => $password);
        $query->execute($parameters);

        return $this->getUserByemail($email);

    }

    /**
     * Get all users from database
     */
    public function getAllusers($q)
    {
        $sql = "SELECT ID,first_name,last_name,avatar,email FROM users where email like '%" . $q . "%' ";
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
        $sql = "SELECT ID,first_name,last_name,avatar,email FROM users where email like '%" . $q . "%' and  ID not in (SELECT user_invited_id from invitations where project_id = " . $project_id . " ) and ID not in (SELECT user_id from project_users where project_id = " . $project_id . ")";
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
     * @return mixed
     */
    public function editUser($first_name, $last_name, $email, $user_id)
    {
        $sql = "UPDATE  users SET first_name = :first_name , last_name = :last_name ,email = :email WHERE id = :user_id  ";
        $query = $this->db->prepare($sql);
        $parameters = array(':first_name' => $first_name, ':last_name' => $last_name, ':email' => $email, ':user_id' => $user_id);
        $query->execute($parameters);
    }

    /**
     * @param $user_id
     * @return mixed
     */
    public function editavatar($avatar, $user_id)
    {
        $sql = "UPDATE  users SET avatar = :avatar   WHERE id = :user_id ";
        $query = $this->db->prepare($sql);
        $parameters = array(':avatar' => $avatar, ':user_id' => $user_id);
        $query->execute($parameters);
    }

    /**
     * @param $user_id
     * @return mixed
     */
    public function editPassword($password, $user_id)
    {
        $sql = "UPDATE  users SET password = :password   WHERE id = :user_id ";
        $query = $this->db->prepare($sql);
        $parameters = array(':password' => $password, ':user_id' => $user_id);
        $query->execute($parameters);
    }

    /**
     * @param $user_id
     * @return mixed
     */
    public function getUserByemail($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $query = $this->db->prepare($sql);
        $parameters = array(':email' => $email);
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


    public function deleteUser($user_id)
    {
        $sql = "DELETE FROM users WHERE id = :user_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':user_id' => $user_id);
        $query->execute($parameters);
    }

    public function isValidUser($email, $password)
    {
        $sql = "SELECT count(*) as count FROM users WHERE email = '" . $email . "' AND password = '" . $password . "'";
        $query = $this->db->prepare($sql);
        $query->execute();
        $row = $query->fetch();
        if ($row->count > 0)
            return true;
        else
            return false;
    }

    public function emailExiste($email)
    {
        $sql = "SELECT count(*) as count FROM users WHERE email = '" . $email . "'";
        $query = $this->db->prepare($sql);
        $query->execute();
        $row = $query->fetch();
        if ($row->count > 0)
            return true;
        else
            return false;
    }
}
