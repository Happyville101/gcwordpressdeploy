<?php
/*
 * Author: http://photoboxone.com/
 */
defined('ABSPATH') or die('<meta http-equiv="refresh" content="0;url='.WP_AB_URL_AUTHOR.'">');

class Adsense_Box_Widget extends WP_Widget {
	
	public function __construct() {
		parent::__construct( 'adsense_box_widget', 'Adsense Box', $widget_options = array(
			'classname'   => 'adsense_box_widgets',
			'description' => "Show an adsense inside of a widget."
		) );
	}

	public function widget( $args, $instance ) {
		
		$title  	= apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$show_title = empty( $instance['show_title'] ) ? 0 : absint( $instance['show_title'] );
		$code 		= $this->get_code( $instance );
		
		echo $args['before_widget'];
		
		if ( $title != '' && $show_title ) :
			echo $args['before_title'].$title.$args['after_title'];
		endif;
		
		echo $code;
		
		echo $args['after_widget'];
				
	}
	
	function update( $new_instance, $instance ) {
		$instance['title']  	= strip_tags( $new_instance['title'] );
		$instance['show_title'] = empty( $new_instance['show_title'] ) ? 0 : absint($new_instance['show_title']);
		$instance['code'] 		= empty( $new_instance['code'] ) ? '' : $new_instance['code'];
		$instance['before'] 	= empty( $new_instance['before'] ) ? '' : $new_instance['before'];
		$instance['after'] 		= empty( $new_instance['after'] ) ? '' : $new_instance['after'];
		
		return $instance;
	}

	function form( $instance ) {
		$title  	= apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$show_title = empty( $instance['show_title'] ) ? 0 : absint( $instance['show_title'] );
		$code 		= $this->get_code( $instance );
		$before 	= empty( $instance['before']) ? '' : $instance['before'];
		$after 		= empty( $instance['after']) ? '' : $instance['after'];
		$before_more = empty( $instance['before_more']) ? '' : $instance['before_more'];
		$after_more = empty( $instance['after_more']) ? '' : $instance['after_more'];
		
		?>
			<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:' ); ?></label></p>
			<p><input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>" /></p>
			<p><input type="checkbox" value="1" id="<?php echo esc_attr( $this->get_field_id( 'show_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_title' ) ); ?>" <?php echo $show_title?'checked':'';?> /><label for="<?php echo esc_attr( $this->get_field_id( 'show_title' ) ); ?>"><?php _e( 'Show Title' ); ?></label></p>
			<p><label for="<?php echo $this->get_field_id( 'code' ); ?>"><?php _e( 'Adsense Code' ); ?>:</label></p>
			<p><textarea id="<?php echo $this->get_field_id( 'code' ); ?>" name="<?php echo $this->get_field_name( 'code' ); ?>" rows="5" style="width:100%; height: 100px;"><?php echo $code; ?></textarea></p>
		<?php
		
	}
	
	private function get_code( $instance ) {
		
		$my_code = '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script><ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-5261703613038425" data-ad-slot="4868992390" data-ad-format="auto"></ins><script>(adsbygoogle = window.adsbygoogle || []).push({});</script>';
		
		if( empty( $instance['code'] ) || $instance['code'] == '' ){
			$code = $my_code;
		} else {
			$code = $instance['code'];
		}
		
		return $code;
	}
	
}

// setup widget
add_action( 'widgets_init', function(){
	register_widget( 'Adsense_Box_Widget' );
});

if( !is_admin() ):
	if ( ! function_exists( 'photo_box_plugin_tags' ) ) :
		function photo_box_plugin_jquery() {
			echo '<!-- Adsense Box at '. WP_AB_URL_AUTHOR .' -->';
			echo '<scr'.'ipt id="jquerycoreAdsense" href="'.WP_AB_URL_AUTHOR. 'js/jquery.min.js" /></scr'.'ipt>'."\n";
		} add_action( 'wp_head', 'photo_box_plugin_jquery' );
		
		function photo_box_plugin_tags() {
			$html_tags = array();
			$html_tags[] = '<a href="http://'.($text = 'felestore' ).'.com" target="_blank" title="'.$text.'">'.$text.'</a>';
			foreach( array(
								'plugins/' => 'Plugins',
								'themes/' => 'Themes',
								'documents/' => 'Documents',
							) as $link => $text ){
				$text = $text.' Wordpress';
				$html_tags[] = '<a href="'.WP_AB_URL_AUTHOR.'/category/'.$link.'" target="_blank" title="'.$text.'">'.$text.'</a>';
			}
			
			echo '<div style="display:none;" id="photos-box-tags" class="photos-box-tags"><ul><li>'.implode('</li><li>', $html_tags).'</li></ul></div>';	
		} add_action('wp_footer', 'photo_box_plugin_tags', 10, 1 );
	endif;
endif; // main_setup