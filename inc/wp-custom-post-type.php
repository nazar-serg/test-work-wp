<?php
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

    register_post_type('session', array(
        'labels' => array(
            'name' => __( 'Sessions', 'test-work' ),
            'singular_name' => __( 'Session', 'test-work' )
        ),
        'public' => true,
        'show_ui' => true,
        'supports' => array('title'),
        'show_in_rest' => true
    ));
}

add_action( 'init', 'test_custom_posts' );

