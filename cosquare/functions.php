<?php

// include style
function cosquare_resources(){
    wp_enqueue_style('style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'cosquare_resources');

// include jQuery
function include_jquery() {

	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.4.1.min.js', array(), null, true);
}

add_action('wp_enqueue_scripts', 'include_jquery');

wp_enqueue_script('submenu_jquery', get_template_directory_uri() .'/js/submenu_jquery.js', array('jquery'), null, true);

// include Vuetify
function include_vue() {

    wp_enqueue_script('vue', 'https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js', array(), null, true);
    wp_enqueue_script('vuetify', 'https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js', array(), null, true);
}

add_action('wp_enqueue_scripts', 'include_vue');

wp_enqueue_script('app', get_template_directory_uri() .'/js/app.js', array('vue', 'vuetify'), null, true);

//Navigation Menus
register_nav_menus(array(
    'primary' => __('Header Menu'),
    'navdrawer' => __('Nav Drawer Menu'),
    'secondary' => __('Footer Menu'),
));


//Thumbnail
add_theme_support( 'post-thumbnails' );

//Header Logo
function cosquare_custom_logo() {
    $defaults = array(
    'height'      => 10,
    'width'       => 50,
    'flex-height' => true,
    'flex-width'  => true,
    'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}

add_action( 'after_setup_theme', 'cosquare_custom_logo' );

//Renters Post Type
function cosquare_custom_post_type(){
    register_post_type('lejere',
        array(
            'rewrite' => array('slug' => 'lejere'),
            'labels' => array(
                'name' => 'Lejere',
                'singular_name' => 'Lejer',
                'add_new_item' => 'Tilføj ny lejer',
                'edit_item' => 'Rediger lejer'
            ),
            'menu_icon' => 'dashicons-groups',
            'public' => true,
            'has_archive' => true,
            'supports' => array(
                'title', 'custom-fields', 'editor'
            )
        )
    );
}

add_action('init', 'cosquare_custom_post_type');

//Prices Post Type
function cosquare_custom_post_type_price(){
    register_post_type('priser',
        array(
            'rewrite' => array('slug' => 'priser'),
            'labels' => array(
                'name' => 'Priser',
                'singular_name' => 'Pris',
                'add_new_item' => 'Tilføj ny pristype',
                'edit_item' => 'Rediger pristype'
            ),
            'menu_icon' => 'dashicons-tag',
            'public' => true,
            'has_archive' => true,
            'supports' => array(
                'title', 'custom-fields',
            )
        )
    );
}

add_action('init', 'cosquare_custom_post_type_price');

//Facilities Post Type
function cosquare_custom_post_type_facilities(){
    register_post_type('faciliteter',
        array(
            'rewrite' => array('slug' => 'faciliteter'),
            'labels' => array(
                'name' => 'Faciliteter',
                'singular_name' => 'Facilitet',
                'add_new_item' => 'Tilføj ny facilitet',
                'edit_item' => 'Rediger facilitet'
            ),
            'menu_icon' => 'dashicons-list-view',
            'public' => true,
            'has_archive' => true,
            'supports' => array(
                'title', 'custom-fields'
            )
        )
    );
}

add_action('init', 'cosquare_custom_post_type_facilities');

//Get top ancestor
function get_top_ancestor_id(){
    
    global $post;

    if($post->post_parent){
        $ancestors = array_reverse(get_post_ancestors($post->ID));
        return $ancestors[0];
    }

    return $post->ID;
}

function wps_parent_post(){
    global $post;
    if ($post->post_parent){
      $ancestors=get_post_ancestors($post->ID);
      $root=count($ancestors)-1;
      $parent = $ancestors[$root];
    } else {
      $parent = $post->ID;
    }
    if($post->ID != $parent){
        echo '<a href="'.get_permalink($parent).'" class="parent-post">Tilbage til menu</a>';
    }
  }