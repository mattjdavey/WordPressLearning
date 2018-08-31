<?php

function everestinvestments_script_enqueue() {
    // Styles  
    wp_enqueue_style( 'bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css', array(), '1.0.0');
    wp_enqueue_style( 'theme-font', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,600%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700', array(), '1.0.0');
    wp_enqueue_style( 'revolution-extralayers', get_template_directory_uri() . '/assets/plugins/slider.revolution/css/extralayers.css', array(), '1.0.0');
    wp_enqueue_style( 'revolution-settings', get_template_directory_uri() . '/assets/plugins/slider.revolution/css/settings.css', array(), '1.0.0');    
    wp_enqueue_style( 'essentials', get_template_directory_uri() . '/assets/css/essentials.css', array(), '1.0.0');
    wp_enqueue_style( 'layout', get_template_directory_uri() . '/assets/css/layout.css', array(), '1.0.0');
    wp_enqueue_style( 'header-1', get_template_directory_uri() . '/assets/css/header-1.css', array(), '1.0.0');
    wp_enqueue_style( 'green', get_template_directory_uri() . '/assets/css/color_scheme/green.css', array(), '1.0.0');
    wp_enqueue_style( 'customstyle', get_template_directory_uri() . '/css/custom.css', array(), '1.0.0');

    // Scripts
    wp_deregister_script('jquery');
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/plugins/jquery/jquery-3.2.1.min.js', array(), '1.0.0', true);        
    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(), array(), '1.0.0', true);
    wp_enqueue_script( 'revolution-tools', get_template_directory_uri() . '/assets/plugins/slider.revolution/js/jquery.themepunch.tools.min.js', array(), array(), '1.0.0', true);
    wp_enqueue_script( 'revolution-slider', get_template_directory_uri() . '/assets/plugins/slider.revolution/js/jquery.themepunch.revolution.min.js', array(), array(), '1.0.0', true);        
    wp_enqueue_script( 'revolution-slider-demo', get_template_directory_uri() . '/assets/js/view/demo.revolution_slider.js', array(), array(), '1.0.0', true);        
    wp_enqueue_script( 'customjs', get_template_directory_uri() . '/js/custom.js', array(), '1.0.0', true);    
    
}

add_action( 'wp_enqueue_scripts', 'everestinvestments_script_enqueue');

function theme_setup() {
    add_theme_support('menus');
    register_nav_menu( 'primary', 'Primary Header Navigation' );
    register_nav_menu( 'secondary', 'Footer Navigation' );
}

add_action('init', 'theme_setup');

/*
    ================================
    Theme support function
    ================================
*/
add_theme_support('post-thumbnails');
add_theme_support('post-formats', array('aside','image','video'));
add_theme_support('html5', array('search-form'));

/*
    ================================
    Sidebar function
    ================================
*/
function widget_setup() {

    register_sidebar(
        array(
            'name' => 'Sidebar',
            'id' => 'sidebar-1',
            'class' => 'custom',
            'description' => 'Standard Sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h2 class="widgettitle">',
            'after_title'   => '</h2>' 
        )
    );

}
add_action('widgets_init', 'widget_setup');



?>