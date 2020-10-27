<?php

$user->start();
if (!$user->isSigned()) {

        header('location: ' . URL . 'auth/index');
}

$projects = $this->model['Project']->getAllProjects($user->getProperty('ID'));


$uncompletedProjectsMemberOf = $this->model['Project']->getAllUncompletedProjectsMemberOf($user->getProperty('ID'));
$uncompletedProjectsAdminOf = $this->model['Project']->getAllUncompletedProjectsAdminOf($user->getProperty('ID'));
$completedProjectsMemberOf = $this->model['Project']->getAllCompletedProjectsMemberOf($user->getProperty('ID'));
$completedProjectsAdminOf = $this->model['Project']->getAllCompletedProjectsAdminOf($user->getProperty('ID'));

$invitations = $this->model['Invitation']->getAllInvitations ($user->getProperty('ID'));
