<?php

/**
 * Enqueues front-end CSS for color scheme.
 *
 * @see wp_add_inline_style()
 */
function crafter_custom_css() {
	$heroColor = get_theme_mod( 'crafter_hero_color', '#e9ac40' );
	$text_color = get_theme_mod( 'crafter_text_color', '#999999' );
	$link_color = get_theme_mod( 'crafter_link_color', '#00b09a' );
	$background_color = '#' . get_background_color();

	$colors = array(
		'heroColor'            => $heroColor,
		'text_color'           => $text_color,
		'link_color'     	   => $link_color,
		'background_color'     => $background_color
	);

	$custom_css = crafter_get_custom_css( $colors );

	wp_add_inline_style( 'crafter_style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'crafter_custom_css' );



/**
 * Returns CSS for the color schemes.
 *
 * @param array $colors colors.
 * @return string CSS.
 */
function crafter_get_custom_css( $colors ) {

	//Default colors
	$colors = wp_parse_args( $colors, array(
		'heroColor'            => '',
		'text_color'           => '',
		'link_color'           => '',
		'background_color'     => ''
	) );

	$css = <<<CSS

	/* Text Color */
	body{
		color: {$colors['text_color']};
	}
	/* Link Color */
	a{
		color: {$colors['link_color']};
	}

	/* Copy background color */
	.section-title::before,
	.video-text-wrap .video-text-title::before{
		border-color: {$colors['background_color']};
	}


CSS;

	return $css;
}