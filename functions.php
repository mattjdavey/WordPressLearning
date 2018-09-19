<?php

/*
    ================================
    Include Scripts
    ================================
*/
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

/*
    ================================
    Include Walker file
    ================================
*/
require get_template_directory() . '/inc/walker.php';

/*
    ================================
    Head function
    ================================
*/
function theme_remove_version() {
    return '';
}
add_filter('the_generator', 'theme_remove_version');

/*
    ================================
    Custom Post Type
    ================================
*/
function custom_post_type() {

    $labels = array(
        'name' => 'Portfolio',
        'singular_name' => 'Portfolio',
        'add_new' => 'Add Item',
        'add_new_item' => 'Add Item',
        'edit_item' => 'Edit Item',
        'new_item' => 'New Item',
        'view_item' => 'View Item',
        'search_item' => 'Search Portfolio',
        'not_found' => 'No items found',
        'not_found_in_trash' => 'No items found in trash',
        'parent_item_colon' => 'Parent Item'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive'=> true,
        'publicly_queryable' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'heirarchical' => false,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'revision'
        ),
        //'taxonomies' => array('category', 'post_tag'),
        'menu_position' => 5,
        'exclude_from_search' => false
    );
    register_post_type('portfolio', $args);    

}
add_action('init', 'custom_post_type');

function custom_taxonomies() {

    // add new taxonomy hierarchical
    $labels = array(
        'name' => 'Fields',
        'singular_name' => 'Field',
        'search_items' => 'Search Fields',
        'all_items' => 'All Fields',
        'parent_item' => 'Parent Field',
        'parent_item_colon' => 'Parent Field:',
        'edit_item' => 'Edit Field',
        'update_item' => 'Update Field',
        'add_new_item' => 'Add New Field',
        'new_item_name' => 'New Field Name',
        'menu_name' => 'Field'
    );

    $args = array(
        'hierarchical' => true,        
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'field' )
    );

    register_taxonomy('field', array('portfolio'), $args);

    // add new taxonomy NOT hierarchical
    register_taxonomy('software', 'portfolio', array(
        'label' => 'Software',
        'rewrite' => array( 'slug' => 'software' ),
        'hierarchical' => false
    ));
    
}
add_action('init', 'custom_taxonomies');

/*
    ================================
    Custom Term Function
    ================================
*/

function smarty_get_terms( $postID, $term ) {

    $terms_list = wp_get_post_terms($postID, $term); 
    $output = '';

    $i = 0;
    foreach ($terms_list as $term) { $i++;
        if( $i > 1 ) { $output .= ', '; }
        $output .= '<a href="' . get_term_link( $term ) . '">' . $term ->name . '</a>';
    }

    return $output;
}


?>