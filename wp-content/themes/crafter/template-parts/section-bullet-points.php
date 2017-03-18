<?php
$crafter_enable_section = get_theme_mod( 'crafter_bullet_points_enable', true );
if ( $crafter_enable_section || is_customize_preview() ) :
?>
<div id="bullet-points-section" class="bullet-points-section" <?php if( false == $crafter_enable_section ): echo 'style="display: none;"'; endif ?>>
   <div class="bullet-points-wrap wow fadeInLeft">

    <?php
    $id = get_theme_mod( 'crafter_bullet_points_page', '' );
    $post = get_post( $id ); 

    if ( is_a( $post, 'WP_Post' ) ) {

        $content = apply_filters( 'the_content', $post->post_content ); 
        echo $content;
        
    }
            $bullet_points_image = wp_get_attachment_image_src( absint( get_theme_mod( 'crafter_bullet_points_image' ) ), 'full' );
            $bullet_points_image = $bullet_points_image[0];
            if ( empty( $bullet_points_image ) ) {
                $bullet_points_image = get_template_directory_uri() . '/images/bullet-points.jpeg';
            }
            ?>
            </div><div class="bullet-points-image wow fadeInRight" data-wow-delay="300ms" style="background-image: url(<?php echo esc_url( $bullet_points_image ) ?>);">
                <h3 class="bullet-points-title"><?php  echo esc_html( get_theme_mod( 'crafter_bullet_points_title' ) ); ?></h3>

                <?php
                $wp_kses_args = array(
                    'a' => array(
                        'href' => array(),
                        'title' => array()
                    ),
                    'br' => array(),
                    'em' => array(),
                    'strong' => array(),
                    'span' => array(),
                );
                /* translators: Lorem ipsum text, It is not strictly necessary to translate. */
                $main_text = wp_kses( get_theme_mod( 'crafter_bullet_points_main_desc' ), $wp_kses_args );
                ?>
                <p><?php echo $main_text; ?></p>
                <?php $crafter_bullet_points_link_title = get_theme_mod( 'crafter_bullet_points_link_title', esc_html__( 'Learn More', 'crafter' ) ); ?>
                <?php if ( !empty( $crafter_bullet_points_link_title ) || is_customize_preview() ) { ?>
                <a href="<?php echo esc_url( get_theme_mod( 'crafter_bullet_points_link_url', '#' ) ); ?>" class="btn-ql"><?php echo esc_html( $crafter_bullet_points_link_title ); ?></a>
                <?php } ?>
                
            </div>     
</div><!-- bullet-points-section -->
<?php endif ?>