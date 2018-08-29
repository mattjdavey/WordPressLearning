<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">    
    <title><?php the_title() ?></title>
    <?php wp_head(); ?>
</head>

<?php

    if (is_front_page()) :
        $awesome_classes = array('awesome-class', 'my-class');
    else :
        $awesome_classes = array('no-awesome-class');
    endif;

?>

<body <?php body_class($awesome_classes); ?> >

<div id="wrapper">
    <div id="header" class="navbar-toggleable-md sticky shadow-after-3 clearfix">

        <!-- TOP NAV -->
        <header id="topNav">
            <div class="container">
                
                <button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>

                <nav class="nav-main">
                    <?php
                        $args = array(
                        'menu_id' => 'topMain',
                        'menu_class' => 'nav nav-pills nav-main',
                        'theme_location' => 'primary',
                        );
                        wp_nav_menu($args);
                    ?>
                </nav>
            </div>
        </header>
        <!-- TOP NAV -->

    </div>
