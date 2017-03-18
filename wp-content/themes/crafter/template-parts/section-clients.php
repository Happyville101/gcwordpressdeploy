<?php
$crafter_enable_section = get_theme_mod( 'crafter_clients_enable', true );
if ( $crafter_enable_section || is_customize_preview() ) :

$clients_image = wp_get_attachment_image_src( absint( get_theme_mod( 'crafter_clients_image' ) ), 'full' );
$clients_image = $clients_image[0];
if ( empty( $clients_image ) ) {
    $clients_image = get_template_directory_uri() . '/images/clients.jpg';
}
?>
<div id="clients-section" class="clients-section" <?php if( false == $crafter_enable_section ): echo 'style="display: none;"'; else: echo 'style="background-image: url(' . esc_url( $clients_image ) . ')"'; endif ?>>
    <h2 class="section-title wow fadeIn"><?php echo esc_html( get_theme_mod( 'crafter_clients_title', __( 'People Who Trust Us', 'crafter' ) ) ); ?></h2>

    <div class="clients-wrap">
        <?php
        if ( is_active_sidebar( 'clients-section' ) ){

            dynamic_sidebar( 'clients-section' );

        }else{

            $widget_instance = array(
                'title' => 'WordPress',
                'image_uri' => get_template_directory_uri() . '/images/logo1.png', 
                );
            the_widget( 'crafter_Client', $widget_instance, array( 'before_widget' => '<div class="widget clients-logo wow flipInX">', 'after_widget' => '</div>' ) );

            $widget_instance = array(
                'title' => 'WooCommerce',
                'image_uri' => get_template_directory_uri() . '/images/logo2.png', 
                );
            the_widget( 'crafter_Client', $widget_instance, array( 'before_widget' => '<div class="widget clients-logo wow flipInX">', 'after_widget' => '</div>' ) );

            $widget_instance = array(
                'title' => 'Dribbble',
                'image_uri' => get_template_directory_uri() . '/images/logo3.png', 
                );
            the_widget( 'crafter_Client', $widget_instance, array( 'before_widget' => '<div class="widget clients-logo wow flipInX">', 'after_widget' => '</div>' ) );

            $widget_instance = array(
                'title' => 'WPML',
                'image_uri' => get_template_directory_uri() . '/images/logo4.png', 
                );
            the_widget( 'crafter_Client', $widget_instance, array( 'before_widget' => '<div class="widget clients-logo wow flipInX">', 'after_widget' => '</div>' ) );

            $widget_instance = array(
                'title' => 'jQuery',
                'image_uri' => get_template_directory_uri() . '/images/logo5.png', 
                );
            the_widget( 'crafter_Client', $widget_instance, array( 'before_widget' => '<div class="widget clients-logo wow flipInX">', 'after_widget' => '</div>' ) );

        }
        ?>
    </div><!-- clients-wrap -->

</div><!-- clients-section -->
<?php endif ?>