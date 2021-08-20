<?php

function site_scripts() {

	global $wp_styles;

	wp_deregister_style( 'contact-form-7-bootstrap-style' );
	wp_deregister_style( 'columns' );

	
	//wp_enqueue_style( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css', null, null );
	//wp_enqueue_style( 'styles', get_template_directory_uri() . '/assets/dist/styles.css', null, null );
	wp_enqueue_style( 'test' , get_template_directory_uri() . '/assets/test.css');
	//wp_enqueue_script( 'fontawesome', "https://kit.fontawesome.com/25d752ca7a.js", null, null, false);
}
add_action( 'wp_enqueue_scripts', 'site_scripts', 999 );