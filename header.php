<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php wp_head();?>
</head>

<?php

if (is_front_page()):
    $awesome_classes = array('awesome-class', 'my-class');
else:
    $awesome_classes = array('no-awesome-class');
endif;

?>


<body <?php body_class($awesome_classes);?> >
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <?php
        $args = array(
            'menu_class' => 'navbar-nav',
            'theme_location' => 'primary',            
        );
        wp_nav_menu($args);
    ?>
</nav>

    <img src="<?php header_image();?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
    <div class="container" style="margin-top:30px">