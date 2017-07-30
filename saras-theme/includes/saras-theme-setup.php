<?php

// Theme setup
function ap_setup() {

    // show admin bar only if the logged in user is allowed to edit pages
    if (current_user_can('edit_posts')) {
      show_admin_bar(true);
    } else {
      show_admin_bar(false);
    }

    // register main menu
    register_nav_menu('main-menu', __( 'Main Menu', 'saras-theme' ) );

    // add which sizes the images need to have in the theme
      add_image_size( 'page-featured-image', 2580, 450, array('center', 'center') );
      add_image_size( 'post-featured-image', 1280, 853, false ); // width, height
      // add support for featured images 
      add_theme_support( 'post-thumbnails' );
      set_post_thumbnail_size( 300, 300, true );

    // register support for custom logo
    add_theme_support( 'custom-logo', array(
    'height'      => 140,
    'width'       => 140,
    'flex-height' => false,
    'flex-width'  => false,
    'header-text' => array( 'site-title', 'site-description' ),
    ) );

    // backwards compatibility for older versions
    global $wp_version;
    if ( version_compare( $wp_version, '3.4', '>=' ) ) {
        // register support for custom header
        add_theme_support('custom-header', array(
        'width'         => 1080,
        'height'        => 653,
        'flex-width'    => true,
        'flex-height'    => true,
        'default-image' => get_template_directory_uri() . '/images/header.jpg',
        'uploads'       => true,
        ) );
    } else {
        add_custom_image_header( $wp_head_callback, $admin_head_callback );
    }
}
add_action('after_setup_theme', 'ap_setup');

// function to display custom logo
function ap_custom_logo() {
    // Try to retrieve the Custom Logo
    $output = '';
    // ensure theme remains compatible with older versions of WordPress.
    if (function_exists('get_custom_logo')) {
        $output = get_custom_logo();
    }
    // Nothing in the output: Custom Logo is not supported, or there is no selected logo
    // In both cases, display the site's name
    if (empty($output)) {
        $output = '<h1 id="site-title"><a href="' . esc_url(home_url('/')) . '">' . get_bloginfo('name') . '</a></h1>';
    }
    echo $output;
}

// register widget areas
function ap_widgets_init() {
    /* Register 3 footer area widgets */
    // First footer widget area, located in the footer. Empty by default.
    register_sidebar( array(
        'name'          => __( 'First Footer Widget Area', 'saras-theme' ),
        'id'            => 'first-footer-widget-area',
        'description'   => __( 'The first footer widget area', 'saras-theme' ),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
 
    // Second Footer Widget Area, located in the footer. Empty by default.
    register_sidebar( array(
        'name'          => __( 'Second Footer Widget Area', 'saras-theme' ),
        'id'            => 'second-footer-widget-area',
        'description'   => __( 'The second footer widget area', 'saras-theme' ),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    // Third Footer Widget Area, located in the footer. Empty by default.
    register_sidebar( array(
        'name'          => __( 'Third Footer Widget Area', 'saras-theme' ),
        'id'            => 'third-footer-widget-area',
        'description'   => __( 'The third footer widget area', 'saras-theme' ),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'ap_widgets_init' );

// Enqueue functions 
function ap_add_theme_scripts() {
    wp_enqueue_style( 'styles', get_template_directory_uri() . '/assets/css/main.css');

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'ap_add_theme_scripts' );