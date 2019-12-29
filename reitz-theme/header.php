<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!--Import materialize.css-->
    <title><?php echo get_bloginfo('name'); ?></title>
    <link type="text/css" rel="stylesheet"
          href="<?php echo get_bloginfo('template_directory'); ?>/assets/css/materialize.min.css"
          media="screen,projection"/>
    <link href="<?php echo get_bloginfo('template_directory'); ?>/assets/css/main.css" rel="stylesheet">

    <?php wp_head(); ?>
</head>

<body>
<script type="text/javascript"
        src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript"
        src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/materialize.min.js"></script>
<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/main.js"></script>

<nav>
    <div class="nav-wrapper myblack">
        <a href="#" class="brand-logo right"><img
                    src="<?php echo get_bloginfo('template_directory'); ?>/assets/img/logo_light.svg" alt="Logo"
                    width="55px"></a>
        <a href="#" data-target="mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="left hide-on-med-and-down">
            <?php
            wp_nav_menu(array('menu' => 'main-menu'));
            ?>
        </ul>
    </div>
</nav>