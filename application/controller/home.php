<?php


class Home extends Controller
{
    public function index()
    {

        include APP . 'core/auth/auth_validation.php';
        require APP . 'view/includes/head.php';
        require APP . 'view/includes/header.php';
        require APP . 'view/includes/sidebar.php';
        require APP . 'view/home/index.php';
        require APP . 'view/includes/footer.php';
        require APP . 'view/includes/script.php';
    }


}
