<?php
$crafter_enable_section = get_theme_mod( 'crafter_testimonial_enable', true );
if ( $crafter_enable_section || is_customize_preview() ) :
?>
<div id="testimonials-section" class="testimonials-section" <?php if( false == $crafter_enable_section ): echo 'style="display: none;"'; endif ?>>
    <h2 class="section-title wow fadeIn"><?php echo esc_html( get_theme_mod( 'crafter_testimonial_title', __( 'Testimonials', 'crafter' ) ) ); ?></h2>

    <div class="testimonials-wrap js-flickity wow fadeIn" data-flickity-options='{ "cellAlign": "center", "contain": true, "prevNextButtons": false, "pageDots": true, "autoPlay": 5000 }'>
    	<?php
        $args = array(
            'post_type' => 'jetpack-testimonial',
            'posts_per_page' => -1
        );
        $the_query = new WP_Query( $args );
        if ( $the_query->have_posts() ) {
            while ( $the_query->have_posts() ) { $the_query->the_post();

                echo '<div class="testimonial">';
                    echo '<blockquote cite="' . esc_attr( get_the_title() ) . '">';
                    	the_content();
                    echo '</blockquote>';
                    the_title( '<p class="testimonial-cite">', '</p>' );
                echo '</div>';

            }//while

        }
        wp_reset_postdata();
        ?>
    </div><!-- testimonials-wrap -->

</div><!-- testimonials-section -->
<?php endif ?>