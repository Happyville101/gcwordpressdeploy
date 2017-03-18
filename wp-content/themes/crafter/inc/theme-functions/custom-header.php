<?php
/**
 * Sample implementation of the Custom Header feature.
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>
 *
 * @link http://codex.wordpress.org/Custom_Headers
 *
 * @package Crafter
 */


if ( ! function_exists( 'crafter_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see crafter_custom_header_setup().
 */
function crafter_header_style() {
	$header_text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value.
	if ( HEADER_TEXTCOLOR === $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
	?>
		.logo_container .ql_logo {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that.
		else :
	?>
		.logo_container .ql_logo {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
		#primary-menu a {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
			opacity: 0.8;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // crafter_header_style
