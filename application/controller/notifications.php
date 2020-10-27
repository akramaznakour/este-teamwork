<?php

use ptejada\uFlex\User;

/**
 * Class Tasks
 */
class Notifications extends Controller
{


    public function setSeen($notification_id = 1)
    {

        $user = new  User();
        include APP . 'core/auth/validations/auth_validation.php';
        $notification = $this->model['Notification']->getNotification($notification_id);

        if ($notification->user_id == $user->ID && isset($_POST["submit_set_seen"]))
                $this->model['Notification']->setSeen($notification_id);
        }
}
