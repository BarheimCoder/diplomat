<?php

function theme_support() {
	// Add WP Thumbnail Support
	add_theme_support( 'post-thumbnails' );

	// Default thumbnail size
	set_post_thumbnail_size( 150, 150, true );

	add_image_size( 'medium-thumbnail', 800, 800, false );

	// Register new thumbnail image size
	function wpshout_custom_sizes( $sizes ) {
		return array_merge( $sizes, array(
			'medium-thumbnail' => __( 'Medium Thumbnail' )
		) );
	}
	add_filter( 'image_size_names_choose', 'wpshout_custom_sizes' );

	// Add Support for WP Controlled Title Tag
	add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'theme_support' );
?>