<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Crafter_Pro
 */

?>
<?php if ( get_option( 'show_on_front' ) == 'posts' || !is_front_page() ) : ?>
        <div class="clearfix"></div>
    </div><!-- /row -->
            
</div><!-- /#container -->
<?php endif; ?>

    <div class="sub-footer">
        <div class="container">
            <div class="row">

                <div class="col-md-5">
                    <p>
                    <?php esc_html_e( '&copy;', 'crafter' ); echo ' ' . date_i18n( 'Y' ) . ' ' . get_bloginfo( 'name' );  ?>.
                    <?php printf( esc_html__( 'Designed by %s.', 'crafter' ), '<a href="https://www.quemalabs.com/" rel="designer">Quema Labs</a>' ); ?>
                    </p>
                </div>
                <div class="col-md-7">
                    <?php get_template_part( '/template-parts/social-menu', 'footer' ); ?>
                </div>

            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .sub-footer -->


<?php wp_footer(); ?>

</body>
</html>