<?php

//Custom Posts Types
require get_template_directory() . '/inc/wp-custom-post-type.php'; 

// Including stylesheet and script files
function load_scripts(){
    wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js');
	wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'isotope', get_template_directory_uri() . '/app/js/isotope.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'imageloaded', get_template_directory_uri() . '/app/js/imageloaded.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'dynamic_adapt', get_template_directory_uri() . '/app/js/dynamic_adapt.js', array('jquery'), '1.0.0', true );
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
	add_theme_support( 'custom-logo' );

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

// Registering our sidebars
add_action( 'widgets_init', 'footer_sidebars' );
function footer_sidebars(){
	register_sidebar(
		array(
			'name' => __( 'Footer Sidebar Button', 'learnwp' ),
			'id' => 'sidebar-1',
			'description' => __( 'This is the Footer Sidebar Button. You can add your widgets here. ' , 'learnwp' ),
			'before_widget' => '<div class="widget-wrapper">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		)
	);
	register_sidebar(
		array(
			'name' => __( 'Footer Logo Sidebar', 'learnwp' ),
			'id' => 'sidebar-2',
			'description' => __( 'This is the Footer Logo Sidebar. You can add your widgets here. ', 'learnwp' ),
			'before_widget' => '<div class="widget-wrapper">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		)
	);		

    register_sidebar(
		array(
			'name' => __( 'Footer Main Logo Sidebar', 'learnwp' ),
			'id' => 'sidebar-3',
			'description' => __( 'This is the Footer Main Logo Sidebar. You can add your widgets here. ', 'learnwp' ),
			'before_widget' => '<div class="widget-wrapper">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		)
	);		
}

//Filter Speakers
add_action('wp_ajax_myfilter', 'misha_filter_function');
add_action('wp_ajax_nopriv_myfilter', 'misha_filter_function');

function misha_filter_function(){
	$args = array(
		'orderby' => 'date',
		'order'	=> $_POST['date']
	);
 
	if( isset( $_POST['speaker-position']) && !empty($_POST['speaker-countries'])) 
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'speaker-position',
				'field' => 'id',
				'terms' => $_POST['speaker-position']
            ),
            array(
				'taxonomy' => 'speaker-countries',
				'field' => 'id',
				'terms' => $_POST['speaker-countries']
            ),
		);

	$query = new WP_Query( $args );
	echo "<div class='speakers__content-row'>";
	if( $query->have_posts() ) :
		while( $query->have_posts() ): $query->the_post();
            $img = get_the_post_thumbnail_url();
            $url = get_the_permalink();
            echo "<div class='speakers__content-column'>";
            echo "<div class='speakers__picture'><a href=".$url."><img src='$img'></a></div>";
			echo '<div class="speakers__name"><a href="'.$url.'">' . $query->post->post_title . '</a></div>';
            echo "</div>";
		endwhile;
		wp_reset_postdata();
	else :
		echo 'No posts found';
	endif;
	echo "</div>";
	die();
}

//Session



