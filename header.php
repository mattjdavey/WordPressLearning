<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">    
    <title><?php the_title() ?></title>
    <?php wp_head(); ?>
</head>

<body class="smoothscroll enable-animation" >

<div id="wrapper">

    <div id="header" class="navbar-toggleable-md sticky shadow-after-3 clearfix">
            
        <!-- TOP NAV -->
        <header id="topNav">
            <div class="container">
                    
                <!-- Mobile Menu Button -->
                <button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- BUTTONS -->
                <ul class="float-right nav nav-pills nav-second-main">

                    <!-- SEARCH -->
                    <li class="search">
                        <a href="javascript:;">
                            <i class="fa fa-search"></i>
                        </a>
                        <div class="search-box">
                            <form action="page-search-result-1.html" method="get">
                                <div class="input-group">
                                    <input type="text" name="src" placeholder="Search" class="form-control" />
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit">Search</button>
                                    </span>
                                </div>
                            </form>
                        </div> 
                    </li>
                    <!-- /SEARCH -->

                </ul>
                <!-- /BUTTONS -->


                <!-- Logo -->
                <a class="logo float-left" href="index.html">
                    WORDPRESS LEARNING
                </a>

                <div class="navbar-collapse collapse float-right nav-main-collapse submenu-dark">
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
            </div>
        </header>
        <!-- TOP NAV -->

    </div>