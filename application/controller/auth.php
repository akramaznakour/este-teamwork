<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

use ptejada\uFlex\User;

class Auth extends Controller
{

    public function index()
    {

        $user = new User();
        include APP . 'core/auth/validations/guest_validation.php';
        //VIEW
        require APP . 'view/includes/head.php';
        require APP . 'view/auth/login/index.php';
        require APP . 'view/includes/script.php';
    }

    public function login()
    {
        $user = new User();
        require APP . 'core/auth/validations/guest_validation.php';

        if (count($_POST)) {

            $input = new \ptejada\uFlex\Collection($_POST);

            $user->login($input->Username, $input->Password, $input->auto);

            $errMsg = '';

            if ($user->log->hasError()) {
                $errMsg = $user->log->getErrors();
                $errMsg = $errMsg[0];
            }

            echo json_encode(array(
                'error' => $user->log->getErrors(),
                'confirm' => "You are now login as <b>$user->Username</b>",
                'form' => $user->log->getFormErrors(),
            ));
        }
        header('location: ' . URL . 'home');
    }

    public function logout()
    {
        $user = new User();
        include APP . 'core/auth/validations/guest_validation.php';
        $user->logout();
        header('location: ' . URL . 'home');
    }

    public function create()
    {
        $user = new User();
        include APP . 'core/auth/validations/guest_validation.php';
        //VIEW
        require APP . 'view/includes/head.php';
        require APP . 'view/auth/register/index.php';
        require APP . 'view/includes/script.php';
    }

    public function store()
    {
        $user = new User();
        include APP . 'core/auth/validations/guest_validation.php';
        include APP . 'core/auth/validations/validations.php';

        if (count($_POST)) {

            $input = new \ptejada\uFlex\Collection($_POST);
            $input->filter('Username', 'first_name', 'last_name', 'Email', 'Password', 'Password2', 'Avatar');

            $user->register($input);

            echo json_encode(
                array(
                    'error' => $user->log->getErrors(),
                    'confirm' => 'User Registered Successfully. You may login now!',
                    'form' => $user->log->getFormErrors(),
                )
            );
        }
        header('location: ' . URL . 'auth');
    }

    public function edit()
    {
        $user = new User();
        include APP . 'core/auth/validations/auth_validation.php';
        //VIEW
        require APP . 'view/includes/head.php';
        require APP . 'view/includes/header.php';
        require APP . 'view/includes/sidebar.php';
        require APP . 'view/auth/update/update.php';
        require APP . 'view/includes/footer.php';
        require APP . 'view/includes/script.php';
    }

    public function update()
    {
        $user = new User();
        include APP . 'core/auth/validations/auth_validation.php';
        include APP . 'core/auth/validations/validations.php';

        if (count($_POST)) {

            $input = new \ptejada\uFlex\Collection($_POST);
            print_r($input);
            foreach ($input->toArray() as $name => $val) {
                if (is_null($user->getProperty($name))) {
                    unset($input->$name);
                } else {
                    if ($user->$name == $val) {
                        unset($input->$name);
                    }
                }
            }

            if (!$input->isEmpty()) {
                $user->update($input->toArray());
            } else {
                $user->log->error('No need to update!');
            }

            echo json_encode(array(
                'error' => $user->log->getErrors(),
                'confirm' => 'Account Updated!',
                'form' => $user->log->getFormErrors(),
            ));

            header('location: ' . URL . 'auth/edit');

        }
    }

    public function reset_password()
    {
        $user = new User();
        if (count($_POST)) {

            $input = new \ptejada\uFlex\Collection($_POST);

            $res = $user->resetPassword($input->Email);

            $errorMessage = '';
            $confirmMessage = '';

            if ($res) {

                $url = '/update/password?c=' . $res->Confirmation;
                $confirmMessage = "Use the link below to change your password ";

            } else {
                $errorMessage = $user->log->getErrors();
                $errorMessage = $errorMessage[0];
            }

            echo json_encode(array(
                'error' => $user->log->getErrors(),
                'confirm' => $confirmMessage,
                'form' => $user->log->getFormErrors(),
            ));
        }
    }

    public function edit_password()
    {
        $user = new User();
        include APP . 'core/auth/validations/auth_validation.php';
        //VIEW
        require APP . 'view/includes/head.php';
        require APP . 'view/includes/header.php';
        require APP . 'view/includes/sidebar.php';
        require APP . 'view/auth/update/update_password.php';
        require APP . 'view/includes/footer.php';
        require APP . 'view/includes/script.php';
    }

    public function update_password()
    {
        $user = new User();
        include APP . 'core/auth/validations/auth.php';

        if (count($_POST)) {
            $input = new \ptejada\uFlex\Collection($_POST);
            $hash = $input->c;

            if ($hash) {
                $user->newPassword($hash, array('Password' => $input->Password, 'Password2' => $input->Password2,));
                $redirectPage = "login";
            } else {
                $user->update(array('Password' => $input->Password, 'Password2' => $input->Password2,));
                $redirectPage = 'account';
            }

            echo json_encode(
                array(
                    'error' => $user->log->getAllErrors(),
                    'confirm' => 'Password Changed',
                    'form' => $user->log->getFormErrors(),
                )
            );
            //   header('location: ' . URL . 'auth/logout');

        }
    }

}
