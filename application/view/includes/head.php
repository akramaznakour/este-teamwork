<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>Color Admin | Form Elements</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="<?php echo URL; ?>assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
    <link href="<?php echo URL; ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo URL; ?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo URL; ?>assets/css/style.min.css" rel="stylesheet" />
    <link href="<?php echo URL; ?>assets/css/style-responsive.min.css" rel="stylesheet" />
    <link href="<?php echo URL; ?>assets/css/theme/default.css" rel="stylesheet" id="theme" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="<?php echo URL; ?>assets/plugins/bootstrap-wizard/css/bwizard.min.css" rel="stylesheet" />

    <?php if (isset($_GET['url']) && (substr($_GET['url'], 0, 13) == 'projects/show')) { ?>
        <link href="<?php echo URL; ?>jsgantt/jsgantt.css" rel="stylesheet">
        <script src="<?php echo URL; ?>jsgantt/jsgantt.js"></script>

        <style>
            .chat{
                padding: 0;
                margin: 0;
                right: 10px;
                bottom: 0;
                position: fixed;
                width: 300px;
            }
        </style>
    <?php } ?>

    <!-- ================== END PAGE LEVEL STYLE ================== -->

    <!-- ================== BEGIN BASE JS ================== -->
        <!-- ================== END BASE JS ================== -->


    <style>
        .sidebar .nav > li > a{font-weight: bold;color: white}
        .sidebar .nav > li.nav-header{font-weight: bold;color: wheat}
        table{font-family: Cambria;}
        .panel-heading .nav-tabs > li > a {color: #000000}


    </style>
</head>
<body>