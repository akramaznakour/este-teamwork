<?php


/**
 * Class Tasks
 */
class Notifications extends Controller
{


    public function setSeen($notification_id = 1)
    {

        include APP . 'core/auth/auth_validation.php';
        $notification = $this->model['Notification']->getNotification($notification_id);

        if ($notification->user_id == $user->id && isset($_POST["submit_set_seen"]))
            $this->model['Notification']->setSeen($notification_id);
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }

}
