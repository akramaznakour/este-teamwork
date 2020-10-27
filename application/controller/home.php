<?php

use ptejada\uFlex\User;

class Home extends Controller
{
    public function index()
    {
        $user = new  User();

        include APP . 'core/auth/validations/auth_validation.php';

        require APP . 'view/includes/head.php';
        require APP . 'view/includes/header.php';
        require APP . 'view/includes/sidebar.php';
        require APP . 'view/home/index.php';
        require APP . 'view/includes/footer.php';
        require APP . 'view/includes/script.php';
    }


}
