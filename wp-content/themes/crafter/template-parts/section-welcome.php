<?php
$crafter_enable_section = get_theme_mod( 'crafter_welcome_enable', true );
if ( $crafter_enable_section || is_customize_preview() ) :
?>
<?php
$welcome_image = wp_get_attachment_image_src( absint( get_theme_mod( 'crafter_welcome_image' ) ), 'full' );
$welcome_image = $welcome_image[0];
if ( empty( $welcome_image ) ) {
    $welcome_image = get_template_directory_uri() . '/images/slider1.jpg';
}
?>
<div id="welcome-section" class="welcome-section" <?php if( false == $crafter_enable_section ): echo 'style="display: none;"'; else: echo 'style="background-image: url(' . esc_url( $welcome_image ) . ')"'; endif ?>>
    
    <div class="welcome-intro">
        <h2 class="intro-line"><?php echo esc_html( get_theme_mod( 'crafter_welcome_title', get_bloginfo( 'name' ) ) ); ?></h2>
        <?php $crafter_welcome_link_title = get_theme_mod( 'crafter_welcome_link_title', esc_html__( 'Learn More', 'crafter' ) ); ?>
        <p class="intro-text"><?php echo esc_html( get_theme_mod( 'crafter_welcome_text', get_bloginfo( 'description' ) ) ); ?></p>
        <?php if ( ! empty( $crafter_welcome_link_title ) || is_customize_preview() ) { ?>
        <a href="<?php echo esc_url( get_theme_mod( 'crafter_welcome_link_url', '#' ) ); ?>" class="btn-ql"><?php echo esc_html( $crafter_welcome_link_title ); ?></a>
        <?php } ?>
    </div><!-- welcome-intro -->
        
</div><!-- welcome-section -->
<?php endif ?>