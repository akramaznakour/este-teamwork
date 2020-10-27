<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="TEAMWORK">

    <!--  Icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo URL; ?>images/favicon.png">
    <title>TEAMWORK</title>

    <!-- Bootstrap  CSS -->
    <link href="<?php echo URL; ?>css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo URL; ?>css/style.css" rel="stylesheet">

    <?php if (isset($_GET['url']) && (substr($_GET['url'], 0, 13) == 'projects/show')) { ?>
        <link href="<?php echo URL; ?>jsgantt/jsgantt.css" rel="stylesheet">
        <script src="<?php echo URL; ?>jsgantt/jsgantt.js"></script>
    <?php } ?>

</head>