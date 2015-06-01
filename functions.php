<?php

// Register Styles and fonts
function custom_styles() {

	wp_register_style( 'style-normalize', get_template_directory_uri() . '/css/normalize.css', false, false, 'all' );
	wp_enqueue_style( 'style-normalize' );

	wp_register_style( 'style-main', get_stylesheet_uri(), false, false );
	wp_enqueue_style( 'style-main' );

	wp_register_style( 'style-opensans', 'http://fonts.googleapis.com/css?family=Montserrat|Open+Sans:400,300', false, false );
	wp_enqueue_style( 'style-opensans' );

	wp_register_script( 'html5shiv', get_template_directory_uri() . '/scripts/html5shiv.js', false, false );
	wp_enqueue_script( 'html5shiv' );

}

// Register jQuery if not admin.

if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}

// Hook into the 'wp_enqueue_scripts' action
add_action( 'wp_enqueue_scripts', 'custom_styles' );



// Register Menus.

function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'mobile-menu' => __( 'Mobile Menu' ),
      'footer-menu' => __( 'Footer Menu' )
    )
  ); 
}
add_action( 'init', 'register_my_menus' );

?>