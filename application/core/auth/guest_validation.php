<?php


if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
    if ($this->model['User']->isValidUser($_SESSION['email'], $_SESSION['password']))
        header('location: ' . URL . 'home');
}