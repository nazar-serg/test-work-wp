<?php

// Including stylesheet and script files
function load_scripts(){
    wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js');
	wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'isotope', get_template_directory_uri() . '/app/js/isotope.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'imageloaded', get_template_directory_uri() . '/app/js/imageloaded.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'script', get_template_directory_uri() . '/app/js/app.min.js', array( 'jquery' ), '4.0.0', true );


    wp_enqueue_style( 'google-montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;900&display=swap',array(), '1.0.0', 'all');
	wp_enqueue_style( 'style', get_template_directory_uri() . '/app/css/app.min.css', array(), '1.0', 'all' );	
}
add_action( 'wp_enqueue_scripts', 'load_scripts' );

// Main configuration function
function learnwp_config(){

	// Registering our menus
	register_nav_menus(
		array(
			'my_main_menu' => __( 'Main Menu', 'test-work' ),
			'footer_menu' => __( 'Footer Menu', 'test-work' )
		)
	);

	add_theme_support( 'post-thumbnails', array('speaker') );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height' => 46,
		'width' => 98
	) );

}
add_action( 'after_setup_theme', 'learnwp_config', 0 );

//Adding a class to "a"
function add_menu_link_class( $atts, $item, $args ) {
    if (property_exists($args, 'link_class')) {
      $atts['class'] = $args->link_class;
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );

//Adding a class to "li"
function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

//Custom Posts Types
function test_custom_posts() {

    //Speakers custom posts
    register_post_type('speaker', array(
        'labels' => array(
            'name' => __( 'Speakers', 'test-work' ),
            'singular_name' => __( 'Speaker', 'test-work' )
        ),
        'public' => true,
        'show_ui' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
		'taxonomies' => array( 'speaker-position', 'speaker-countries' )
    ));

    register_taxonomy( 'speaker-position', 'speaker', array(
        'labels' => array(
            'name' => __('Positions', 'test-work'),
            'singular_name' => __('category', 'test-work')
        ),
        'slug' => 'speaker-position',
        'hierarchical' => true,
        'show_admin_column' => true
    ) );

	register_taxonomy( 'speaker-countries', 'speaker', array(
        'labels' => array(
            'name' => __('Countries', 'test-work'),
            'singular_name' => __('category', 'test-work')
        ),
        'slug' => 'speaker-countries',
        'hierarchical' => true,
        'show_admin_column' => true
    ) );
}

add_action( 'init', 'test_custom_posts' );
