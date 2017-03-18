<?php
$crafter_enable_section = get_theme_mod( 'crafter_video_enable', true );
if ( $crafter_enable_section || is_customize_preview() ) :
?>
<div id="video-section" class="video-section" <?php if( false == $crafter_enable_section ): echo 'style="display: none;"'; endif ?>>
    <div class="video-wrap wow fadeInLeft">
        <div class="responsive-wrap">
        	<?php
        	$video_url = esc_url( get_theme_mod( 'crafter_video_url', 'https://vimeo.com/137643804' ) );
        	global $wp_embed;
			$post_embed = $wp_embed->run_shortcode('[embed]' . $video_url . '[/embed]');
			echo $post_embed;
        	?>
        </div>
        
    </div><div class="video-text-wrap wow fadeInRight" data-wow-delay="300ms">
    	<?php /* translators: Lorem ipsum text, It is not strictly necessary to translate. */ ?>
        <h3 class="video-text-title"><?php  echo esc_html( get_theme_mod( 'crafter_video_title' ) ); ?></h3>
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
		$video_text = wp_kses( get_theme_mod( 'crafter_video_text' ), $wp_kses_args );
        ?>
        <p><?php echo $video_text; ?></p>
        <?php $crafter_video_link_title = get_theme_mod( 'crafter_video_link_title', esc_html__( 'Learn More', 'crafter' ) ); ?>
        <?php if ( !empty( $crafter_video_link_title ) || is_customize_preview() ) { ?>
        <a href="<?php echo esc_url( get_theme_mod( 'crafter_video_link_url', '#' ) ); ?>" class="btn-ql-round"><?php echo esc_html( $crafter_video_link_title ); ?></a>
        <?php } ?>
        
    </div>     
</div><!-- video-section -->
<?php endif ?>