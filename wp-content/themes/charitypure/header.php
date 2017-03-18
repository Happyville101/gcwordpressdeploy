<?php
/**
 * Header Template
 *
 * Please do not edit this file. This file is part of the Cyber Chimps Framework and all modifications
 * should be made in a child theme.
 *
 * @category CyberChimps Framework
 * @package  Framework
 * @since    1.0
 * @author   CyberChimps
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v3.0 (or later)
 * @link     http://www.cyberchimps.com/
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="ie ie6 lte9 lte8 lte7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html class="ie ie7 lte9 lte8 lte7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 lte9 lte8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 9]>
<html class="ie ie9" <?php language_attributes(); ?>> 
<![endif]-->
<!--[if gt IE 9]>  <html <?php language_attributes(); ?>> <![endif]-->
<!--[if !IE]><!--> 
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="initial-scale=1.0,maximum-scale=3.0,width=device-width" />
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<!-- ---------------- Header --------------------- -->
	<div class="container-full-width" id="header_section">
			<?php do_action('cyberchimps_before_wrapper'); ?>
			<div class="container">
				<?php do_action('cyberchimps_header'); ?>
				 <div id="description" class="col-md-5 col-lg-5">
			    <?php if ( function_exists( 'cyberchimps_description' ) ) {
				echo cyberchimps_description();
			   } ?>
		</div>
			</div> 	<!-- .container-->
	</div> 	<!-- #header_section -->
	
	<?php
	// Get header drag & drop options.
	$header_section = get_theme_mod( 'header_section_order', charitypure_header_drag_and_drop_default() );
	
	/******************* Markup for Menu ***************************/
	function cyberchimps_header_menu() {
	
		do_action('cyberchimps_before_navigation');
		?>
		<div class="container-full-width" id="cyberchimps_navbar">
			<div class="container">
					<nav id="navigation" class="navbar" role="navigation">
						<?php /* hide collapsing menu if not responsive */
								if( get_theme_mod( 'responsive_design', 'checked' ) ): ?>
									<div id="cyberchimps_menu" class="collapse navbar-collapse">
								<?php endif; ?>
								
									<?php wp_nav_menu( array( 'theme_location'  => 'primary', 'menu_class' => 'nav navbar-nav', 'walker' => new cyberchimps_walker(), 'fallback_cb' => 'cyberchimps_fallback_menu' ) ); ?>
							
									<?php if( get_theme_mod( 'searchbar') == "1" ) : ?>
										<?php get_search_form(); ?>
									<?php endif; ?>
								
								<?php /* hide collapsing menu if not responsive */
								if( get_theme_mod( 'responsive_design', 'checked' ) ): ?>
									</div><!-- collapse -->
							
								<!-- .btn-navbar is used as the toggle for collapsed navbar content -->
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#cyberchimps_menu">
							<span class="sr-only"><?php _e('Toggle navigation','charitypure') ?></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
								<?php endif; ?>
					</nav><!-- #navigation -->
			</div> 	<!-- .container -->
		</div> 	<!-- #navigation_menu -->
		
		<?php
		do_action('cyberchimps_after_navigation');
	} ?>
