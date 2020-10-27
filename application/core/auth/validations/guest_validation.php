<?php

$user->start();
if ($user->isSigned()) {
        header('location: ' . URL . 'home/index');
}


