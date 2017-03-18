<?php
$crafter_enable_section = get_theme_mod( 'crafter_about_enable', true );
if ( $crafter_enable_section || is_customize_preview() ) :
?>
<div id="about-section" class="about-section" <?php if( false == $crafter_enable_section ): echo 'style="display: none;"'; endif ?>>
    <h2 class="section-title"><?php echo esc_html( get_theme_mod( 'crafter_about_title', esc_html__( 'About Us', 'crafter' ) ) ); ?></h2>
    
    <?php
    $about_images_amount = 1;
    $about_image_full1 = wp_get_attachment_image_src( absint( get_theme_mod( 'crafter_about_image1' ) ), 'full' );
    $about_image1 = $about_image_full1[0];
    if ( empty( $about_image1 ) ) {
        $about_image1 = get_template_directory_uri() . '/images/aboutus.jpg';
        $about_image_full1[1] = '1500px';
        $about_image_full1[2] = '1000px';
    }
    $about_image_full2 = wp_get_attachment_image_src( absint( get_theme_mod( 'crafter_about_image2' ) ), 'full' );
    $about_image2 = $about_image_full2[0];
    if( ! empty( $about_image2 ) ) { $about_images_amount++; };
    $about_image_full3 = wp_get_attachment_image_src( absint( get_theme_mod( 'crafter_about_image3' ) ), 'full' );
    $about_image3 = $about_image_full3[0];
    if( ! empty( $about_image3 ) ) { $about_images_amount++; };
    $about_image_full4 = wp_get_attachment_image_src( absint( get_theme_mod( 'crafter_about_image4' ) ), 'full' );
    $about_image4 = $about_image_full4[0];
    if( ! empty( $about_image4 ) ) { $about_images_amount++; };

    ?>

    <div class="about-gallery wow fadeInLeft images_amount<?php echo esc_attr( $about_images_amount ); ?>">
        <div class="about-gallery-image" style="background-image: url(<?php echo esc_url( $about_image1 ); ?>);"><a data-width="<?php echo esc_attr( $about_image_full1[1] ); ?>" data-height="<?php echo esc_attr( $about_image_full1[2] ); ?>" href="<?php echo esc_url( $about_image1 ); ?>" class="ql_thumbnail_hover"></a></div>
        <?php if ( ! empty( $about_image2 ) ) { ?>
            <div class="about-gallery-image" style="background-image: url(<?php echo esc_url( $about_image2 ); ?>);"><a data-width="<?php echo esc_attr( $about_image_full2[1] ); ?>" data-height="<?php echo esc_attr( $about_image_full2[2] ); ?>" href="<?php echo esc_url( $about_image2 ); ?>" class="ql_thumbnail_hover"></a></div>
        <?php } ?>
        <?php if ( ! empty( $about_image3 ) ) { ?>
            <div class="about-gallery-image" style="background-image: url(<?php echo esc_url( $about_image3 ); ?>);"><a data-width="<?php echo esc_attr( $about_image_full3[1] ); ?>" data-height="<?php echo esc_attr( $about_image_full3[2] ); ?>" href="<?php echo esc_url( $about_image3 ); ?>" class="ql_thumbnail_hover"></a></div>
        <?php } ?>
        <?php if ( ! empty( $about_image4 ) ) { ?>
            <div class="about-gallery-image" style="background-image: url(<?php echo esc_url( $about_image4 ); ?>);"><a data-width="<?php echo esc_attr( $about_image_full4[1] ); ?>" data-height="<?php echo esc_attr( $about_image_full4[2] ); ?>" href="<?php echo esc_url( $about_image4 ); ?>" class="ql_thumbnail_hover"></a></div>
        <?php } ?>
    </div><!-- about-gallery -->

    <div class="about-text wow fadeInRight">
        <?php
        $id = get_theme_mod( 'crafter_about_page', '' );
        $post = get_post( $id ); 

        if ( is_a( $post, 'WP_Post' ) ) {

            $content = apply_filters( 'the_content', $post->post_content ); 
            echo $content;
            
        }else{
        ?>
        <div class="about-service about-service1">
            <h4><?php echo esc_html( get_theme_mod( 'crafter_about_title1', esc_html__( 'Successful Projects', 'crafter' ) ) ); ?></h4>
            <p><?php echo esc_html( get_theme_mod( 'crafter_about_text1', esc_html__( 'Maecenas sed diam eget risus varius blandit sit amet non magna. Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.', 'crafter' ) ) ); ?></p>
        </div>
        <div class="about-service about-service2">
            <h4><?php echo esc_html( get_theme_mod( 'crafter_about_title2', esc_html__( 'Hard Work', 'crafter' ) ) ); ?></h4>
            <p><?php echo esc_html( get_theme_mod( 'crafter_about_text2', esc_html__( 'Maecenas sed diam eget risus varius blandit sit amet non magna. Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.', 'crafter' ) ) ); ?></p>
        </div>
        <div class="about-service about-service3">
            <h4><?php echo esc_html( get_theme_mod( 'crafter_about_title3', esc_html__( 'Creative Ideas', 'crafter' ) ) ); ?></h4>
            <p><?php echo esc_html( get_theme_mod( 'crafter_about_text3', esc_html__( 'Maecenas sed diam eget risus varius blandit sit amet non magna. Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.', 'crafter' ) ) ); ?></p>
        </div>
        <?php 
        }
        ?>
    </div><!-- about-gallery -->
    
</div><!-- about-section -->
<?php endif ?>