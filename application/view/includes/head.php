<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>Teamwork Project management</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo URL; ?>assets/img/teamwork.png">
    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="<?php echo URL; ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="<?php echo URL; ?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="<?php echo URL; ?>assets/css/style.min.css" rel="stylesheet"/>
    <link href="<?php echo URL; ?>assets/css/style-responsive.min.css" rel="stylesheet"/>

    <?php if (isset($_GET['url']) && (substr($_GET['url'], 0, 13) == 'projects/show' || substr($_GET['url'], 0, 10) == 'tasks/show'  ) ) { ?><!-- ================== BEGIN PAGE projects/show ================== --><?php if ($project->admin_id == $user->ID) { ?>
        <link href="<?php echo URL; ?>assets/plugins/bootstrap-wizard/css/bwizard.min.css" rel="stylesheet"/><?php } ?>
    <link href="<?php echo URL; ?>assets/jsgantt/jsgantt.css" rel="stylesheet">
    <script src="<?php echo URL; ?>assets/jsgantt/jsgantt.js"></script>
    <style>.chat {
            padding: 0;
            margin: 0;
            right: 10px;
            bottom: 0;
            position: fixed;
            width: 300px;
        }</style><!-- ================== END PAGE projects/show ================== -->
    <?php } ?><?php if (!isset($_GET['url'])) { ?><!-- ================== BEGIN PAGE welcome ================== -->
    <style>@font-face {
            font-family: LeafyShade;
            src: url(<?php echo  URL.'assets/fonts/Thrones.otf'?>);
        }

        .firstLetter {
            font-size: 120%;
        }

        #LeafyShadeP {
            font-family: LeafyShade
        }</style><!-- ================== END PAGE welcome ================== --><?php } ?>
    <style>.sidebar .nav > li > a {
            font-weight: bold;
            color: white
        }

        .sidebar .nav > li.nav-header {
            font-weight: bold;
            color: wheat
        }

        table {
            font-family: Cambria;
        }

        .panel-heading .nav-tabs > li > a {
            color: #000000
        }

        .page-header {
            font-family: Cambria
        }</style>

</head>
<body>