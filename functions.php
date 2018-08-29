<?php

function everestinvestments_script_enqueue() {
    // Styles
    wp_enqueue_style( 'customstyle', get_template_directory_uri() . '/css/custom.css', array(), '1.0.0');
    wp_enqueue_style( 'bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css', array(), '1.0.0');

    // Scripts
    wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', array(), '1.0.0', true);    
    wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', array(), '1.0.0', true);
    wp_enqueue_script( 'customjs', get_template_directory_uri() . '/js/custom.js', array(), '1.0.0', true);
    
}

add_action( 'wp_enqueue_scripts', 'everestinvestments_script_enqueue');

function theme_setup() {
    add_theme_support('menus');
    register_nav_menu( 'primary', 'Primary Header Navigation' );
    register_nav_menu( 'secondary', 'Footer Navigation' );
}

add_action('init', 'theme_setup');

add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('post-thumbnails');
add_theme_support('post-formats', array('aside','image','video'));

// Filter to add nav-link class to a elements on navigation
add_filter( 'nav_menu_link_attributes', function($atts) {
    $atts['class'] = "nav-link";
    return $atts;
});

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