<?php

/**
 * Class Membership
 */
class Membership
{

    /**
     * Membership constructor.
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
    public function getAllInvitations($user_id)
    {
        $sql = "SELECT * FROM invitations where accepted = 0 and  refuse = 0 and  user_invited_id = " . $user_id . "";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    /**
     * @param $project_id
     * @param $user_invited_id
     */
    public function addInvitation($project_id, $user_invited_id)
    {
        $sql = "INSERT INTO invitations (project_id, user_invited_id) VALUES (:project_id, :user_invited_id)";
        $query = $this->db->prepare($sql);
        $parameters = array(':project_id' => $project_id, ':user_invited_id' => $user_invited_id);

        $query->execute($parameters);
    }


    /**
     * @param $invitation_id
     */
    public function deleteInvitation($invitation_id)
    {
        $sql = "DELETE FROM invitations WHERE id = :invitation_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':invitation_id' => $invitation_id);

        $query->execute($parameters);
    }


    /**
     * @param $invitation_id
     * @return mixed
     */
    public function getInvitation($invitation_id)
    {
        $sql = "SELECT * FROM invitations WHERE id = :invitation_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':invitation_id' => $invitation_id);

        $query->execute($parameters);
        return $query->fetch();
    }


    /**
     * @param $invitation_id
     */
    public function acceptInvitation($invitation_id)
    {
        $sql = "UPDATE invitations SET accepted = 1 WHERE id = :invitation_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':invitation_id' => $invitation_id);

        $query->execute($parameters);
    }

    /**
     * @param $invitation_id
     */
    public function refuseInvitation($invitation_id)
    {
        $sql = "UPDATE invitations SET refuse = 1 WHERE id = :invitation_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':invitation_id' => $invitation_id);
        $query->execute($parameters);
    }


    /**
     * @param $project_id
     * @return mixed
     */
    public function getInvitedMembers($project_id)
    {
        $sql = "SELECT ID,First_name,Last_name,Avatar,Email FROM users where id in (SELECT user_invited_id FROM invitations where project_id =:project_id ) ";
        $query = $this->db->prepare($sql);
        $parameters = array(':project_id' => $project_id);

        $query->execute($parameters);
        return $query->fetchAll();
    }

    /**
     * @param $project_id
     * @return mixed
     */
    public function getInvitedUsers($project_id)
    {
        $sql = "SELECT ID,First_name,Last_name,Avatar,Email FROM users where id in (SELECT user_invited_id FROM invitations where project_id =:project_id AND accepted = 0) ";
        $query = $this->db->prepare($sql);
        $parameters = array(':project_id' => $project_id);

        $query->execute($parameters);
        return $query->fetchAll();
    }

    /**
     * @param $member_id
     * @param $project_id
     */
    public function removeMember($member_id, $project_id)
    {
        $sql = "DELETE FROM project_users WHERE project_id = :project_id AND user_id = :member_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':project_id' => $project_id, ':member_id' => $member_id);

        $query->execute($parameters);

        $sql = "DELETE FROM responsables  WHERE task_id in (SELECT id from tasks where project_id = :project_id) AND responsable_id = :member_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':project_id' => $project_id, ':member_id' => $member_id);

        $query->execute($parameters);

        $sql = "DELETE FROM invitations  WHERE  user_invited_id = :member_id";
        $query = $this->db->prepare($sql);
        $parameters = array( ':member_id' => $member_id);

        $query->execute($parameters);
    }


}
