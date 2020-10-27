<?php

class Invitation
{

    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function getAllInvitations($user_id)
    {
        $sql = "SELECT * FROM invitations where accepted = 0 and  user_invited_id = " . $user_id . "";
        $query = $this->db->prepare($sql);
        $query->execute();


        return $query->fetchAll();
    }

    public function addInvitation($project_id, $user_invited_id)
    {
        $sql = "INSERT INTO invitations (project_id, user_invited_id) VALUES (:project_id, :user_invited_id)";
        $query = $this->db->prepare($sql);
        $parameters = array(':project_id' => $project_id, ':user_invited_id' => $user_invited_id);

        $query->execute($parameters);
    }


    public function deleteInvitation($invitation_id)
    {
        $sql = "DELETE FROM invitations WHERE id = :invitation_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':invitation_id' => $invitation_id);

        $query->execute($parameters);
    }


    public function getInvitation($invitation_id)
    {
        $sql = "SELECT * FROM invitations WHERE id = :invitation_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':invitation_id' => $invitation_id);

        $query->execute($parameters);
        return $query->fetch();
    }


    public function acceptInvitation($invitation_id)
    {
        $sql = "UPDATE invitations SET accepted = 1 WHERE id = :invitation_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':invitation_id' => $invitation_id);

        $query->execute($parameters);
    }


    public function getInvitedUsers($project_id)
    {
        $sql = "SELECT ID,First_name,Last_name,Avatar,Email FROM users where id in (SELECT user_invited_id FROM invitations where project_id =:project_id ) ";
        $query = $this->db->prepare($sql);
        $parameters = array(':project_id' => $project_id);

        $query->execute($parameters);
        return $query->fetchAll();
    }


}
