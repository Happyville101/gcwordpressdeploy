<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package Crafter
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function crafter_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'crafter_infinite_scroll_render',
		'footer'    => 'page',
	) );
	
	//Testimonials CPT
	add_theme_support( 'jetpack-testimonial' );

} // end function crafter_jetpack_setup
add_action( 'after_setup_theme', 'crafter_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function crafter_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function crafter_infinite_scroll_render
