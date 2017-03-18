<?php
/**
 * Footer Template
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

if (get_theme_mod('footer_show_toggle') == '1') {	
	do_action('cyberchimps_before_footer_widgets'); ?>

	<div class="container-full-width" id="footer_section">
		<div class="container">
				<div id="footer-widgets" class="row">
					<div id="footer-widget-container" class="col-md-9">
							<div class="row">
						
							<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('cyberchimps-footer-widgets')) : ?>
								<aside class="widget-container col-md-3">
											<h3 class="widget-title"><?php _e('Pages', 'charitypure' ); ?></h3>
									<ul>
										<?php wp_list_pages('title_li=' ); ?>
									</ul>
								</aside>

								<aside class="widget-container col-md-3">
											<h3 class="widget-title"><?php _e( 'Archives', 'charitypure' ); ?></h3>
									<ul>
									<?php wp_get_archives('type=monthly'); ?>
									</ul>
								</aside>
								  
								<aside class="widget-container col-md-3">
											<h3 class="widget-title"><?php _e('Categories', 'charitypure' ); ?></h3>
									<ul>
									  <?php wp_list_categories('show_count=1&title_li='); ?>
									</ul>
								</aside>
								  
								<aside class="widget-container col-md-3">
									<h3 class="widget-title"><?php _e('WordPress', 'charitypure' ); ?></h3>
									<ul>
										<?php wp_register(); ?>
										<li><?php wp_loginout(); ?></li>
										<li><a href="<?php echo esc_url( 'http://wordpress.org/'); ?>" target="_blank" title="<?php esc_attr_e('Powered by WordPress, state-of-the-art semantic personal publishing platform.', 'charitypure'); ?>"> <?php _e('WordPress', 'charitypure' ); ?></a></li>
										<?php wp_meta(); ?>
									</ul>
								</aside>
							<?php endif; ?>
						</div><!-- .row-fluid -->
					</div><!-- #footer-widget-container -->
					<div class="footer-widget-credit-container col-md-3">
							<?php do_action( 'cyberchimps_footer_widgets_credit' ); ?>
						</div>
					</div><!-- #footer-widgets .row-fluid  -->
		</div> 	<!-- .container -->
	</div> 	<!-- #footer_section -->

	<?php do_action('cyberchimps_after_footer_widgets'); ?>
<?php } ?>		

<?php do_action('cyberchimps_before_footer_container'); ?>
	<?php do_action('cyberchimps_footer'); ?>
<?php do_action('cyberchimps_after_footer_container'); ?>

<?php wp_footer(); ?>

</body>
</html>
