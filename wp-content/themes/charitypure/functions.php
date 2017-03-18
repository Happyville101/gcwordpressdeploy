<?php

/**
 * Theme Functions
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

// Load text domain.
function charitypure_text_domain() {
	load_theme_textdomain( 'charitypure', get_template_directory() . '/inc/languages' );
	add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'charitypure_text_domain' );

// Load Core
require_once( get_template_directory() . '/cyberchimps/init.php' );

// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

function charitypure_add_site_info() { ?>
	<p>&copy; <?php echo __('Company Name', 'charitypure'); ?></p>	
<?php }
add_action('cyberchimps_site_info', 'charitypure_add_site_info');	

if ( ! function_exists( 'charitypure_cyberchimps_comment' ) ) :
// Template for comments and pingbacks.
// Used as a callback by wp_list_comments() for displaying the comments.
function charitypure_cyberchimps_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'charitypure' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'charitypure' ), ' ' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment hreview">
			<footer>
				<div class="comment-author reviewer vcard">
					<?php echo get_avatar( $comment, 40 ); ?>
					<?php printf( '%s <span class="says">' . __( 'says:', 'charitypure' ) . '</span>', sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author .vcard -->
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em><?php _e( 'Your comment is awaiting moderation.', 'charitypure' ); ?></em>
					<br />
				<?php endif; ?>

				<div class="comment-meta commentmetadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>" class="dtreviewed"><time pubdate datetime="<?php comment_time( 'c' ); ?>">
					<?php
						/* translators: 1: date, 2: time */
						printf( __( '%1$s at %2$s', 'charitypure' ), get_comment_date(), get_comment_time() ); ?>
					</time></a>
					<?php edit_comment_link( __( '(Edit)', 'charitypure' ), ' ' );
					?>
				</div><!-- .comment-meta .commentmetadata -->
			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for charitypure_cyberchimps_comment()


// core options customization Names and URL's
//Pro or Free
function charitypure_theme_check() {
	$level = 'free';
	return $level;
}
//Theme Name
function charitypure_options_theme_name(){
	$text = 'CharityPure';
	return $text;
}
//Doc's URL
function charitypure_options_documentation_url() {
	$url = 'http://cyberchimps.com/guides/c-free/';
	return $url;
}
// Support Forum URL
function charitypure_options_support_forum() {
	$url = 'https://cyberchimps.com/forum/free/charitypure-lite/';
	return $url;
}
// Slider Options Help URL
function charitypure_options_slider_options_help() {
	$url = 'http://cyberchimps.com/guide/how-to-use-the-pro-slider/';
	return $url;
}
add_filter( 'cyberchimps_current_theme_name', 'charitypure_options_theme_name', 1 );
add_filter( 'cyberchimps_documentation', 'charitypure_options_documentation_url' );
add_filter( 'cyberchimps_support_forum', 'charitypure_options_support_forum' );
add_filter( 'cyberchimps_slider_options_help', 'charitypure_options_slider_options_help' );

// Help Section
function charitypure_options_help_header() {
	$text = 'CharityPure';
	return $text;
}
function charitypure_options_help_sub_header(){
	$text = __( 'CharityPure Responsive WordPress Starter Theme', 'charitypure' );
	return $text;
}

add_filter( 'cyberchimps_help_heading', 'charitypure_options_help_header' );
add_filter( 'cyberchimps_help_sub_heading', 'charitypure_options_help_sub_header' );

// Branding images and defaults

// Banner default
function charitypure_banner_default() {
	$url = '/images/branding/banner.jpg';
	return $url;
}
add_filter( 'cyberchimps_banner_img', 'charitypure_banner_default' );

/* Adding thumbnail size for featured image */
add_image_size( 'cyberchimps_thumbnail_new', '270', '155', TRUE );

function cyberchimps_ifp_thumbnail_size() {
	return 'cyberchimps_thumbnail_new';
}

function cyberchimps_ifp_first_thumbnail_size() {
	return 'full';
}



//theme specific skin options in array. Must always include option default
function charitypure_skin_color_options( $options ) {
	// Get path of image
	$imagepath = get_template_directory_uri(). '/inc/css/skins/images/';
	
	$options = array(
		'default'	=> $imagepath . 'default.png'
	);		
	return $options;
}
add_filter( 'cyberchimps_skin_color', 'charitypure_skin_color_options', 1 );

// theme specific typography options
function charitypure_typography_sizes( $sizes ) {
	$sizes = array( '8','9','10','12','14','16','20' );
	return $sizes;
}

function charitypure_typography_styles( $styles ) {
	$styles = array( 'normal' => 'Normal','bold' => 'Bold' );
	return $styles;
}
add_filter( 'cyberchimps_typography_sizes', 'charitypure_typography_sizes' );
add_filter( 'cyberchimps_typography_styles', 'charitypure_typography_styles' );

// turn cyberchimps footer link off

function charitypure_footer_link() {
	$array = array(
								'name' => __('Cyberchimps Link', 'charitypure'),
								'id' => 'footer_cyberchimps_link',
								'std' => 1,
								'type' => 'toggle',
								'section' => 'cyberchimps_footer_section',
								'heading' => 'cyberchimps_footer_heading'
							);
	return $array;
}
add_filter( 'footer_cyberchimps_link', 'charitypure_footer_link' );


// Add Logo + Menu option in the header drag and drop.
function charitypure_add_logo_plus_menu( $options ) {
	
	$options['cyberchimps_logo_menu'] = __( 'Logo + Menu', 'charitypure' );
	unset( $options['cyberchimps_description_icons'] );
	
	return $options;
}
add_filter( 'header_drag_and_drop_options', 'charitypure_add_logo_plus_menu', 20 );


// Set header drag and drop default to Logo + Menu
function charitypure_header_drag_and_drop_default() {
	return array( 'cyberchimps_logo_menu' => __( 'Logo + Menu', 'charitypure' ) );
}
add_filter( 'header_drag_and_drop_default', 'charitypure_header_drag_and_drop_default', 20 );


function charitypure_typography_custom_defaults() {
	$defaults = array(
		'size'  => '16px',
		'face'  => '"Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif',
		'style' => 'normal',
		'color' => '#9a9a9a'
	);

	return $defaults;
}

function charitypure_typography_heading_defaults() {
    $default = array(
        'size'  => '',
        'face'  => 'Google Fonts',
        'style' => '',
        'color' => '',

    );

    return $default;
}

function charitypure_typography_google_font_defaults() {    
    return 'Raleway';
}

function charitypure_max_width_custom_default(){
	return '1180';
}

function charitypure_default_background_color(){
	return '';	
}

/* Setup heading default font */
function charitypure_ifp_font_defaults() {    
    return 'Raleway';
}

add_filter( 'cyberchimps_typography_heading_google_default', 'charitypure_ifp_font_defaults','111' );
add_filter( 'cyberchimps_typography_defaults', 'charitypure_typography_custom_defaults' );
add_filter( 'max_width_default', 'charitypure_max_width_custom_default' );
add_filter( 'default_background_color', 'charitypure_default_background_color', '111' );
add_filter( 'cyberchimps_typography_heading_defaults', 'charitypure_typography_heading_defaults' );
add_filter( 'cyberchimps_typography_heading_google_default', 'charitypure_typography_google_font_defaults','111' );

// Set action for the Logo + Menu header drag & drop option.
function charitypure_logo_plus_menu() {
?>
	<header id="cc-header" class="row">
		<div class="col-md-4">
			<?php if( function_exists( 'cyberchimps_header_logo' ) ) {
				cyberchimps_header_logo();
			} ?>
		</div>

		<div id="header_menu" class="col-md-8">
			<?php if( function_exists( 'cyberchimps_header_menu' ) ) {
				cyberchimps_header_menu();
			} ?>
		</div>
	</header>
<?php
}
add_action( 'cyberchimps_logo_menu', 'charitypure_logo_plus_menu' );


// Change image for social icon default option.
function charitypure_social_default_image( $option ) {
	$option['default'] = get_template_directory_uri() . '/images/branding/social-default.png';
	return $option;
}
add_filter( 'cyberchimps_social_icon_options', 'charitypure_social_default_image' );


/* Adding class to display posts in column for Home, Archive  */

function charitypure_ifp_custom_class( $classes ) {
	global $post;
	$layout_type = '';
	if ( is_home() ) {
		
		$layout_type = get_theme_mod( 'sidebar_images', 'right_sidebar' );
		
		if ( strcmp( 'full_width', $layout_type ) == '0' ) {
			
			/* Added column classes for full width layout */ 
			
			if( charitypure_ifp_first_post() && ! is_paged() && is_home() ){
				$classes[] = 'col-md-6 col-xs-12  ifp-first-post col-eq-height';
				add_filter( 'cyberchimps_post_thumbnail_size', 'cyberchimps_ifp_first_thumbnail_size','1111' );	
			}else{
				$classes[] = 'col-md-3 col-xs-12 col-sm-6 col-eq-height';
				remove_filter( 'cyberchimps_post_thumbnail_size', 'cyberchimps_ifp_first_thumbnail_size' );
				add_filter( 'cyberchimps_post_thumbnail_size', 'cyberchimps_ifp_thumbnail_size','1111' );
			}
		} else if ( strcmp( 'left_right_sidebar', $layout_type ) == '0' || strcmp( 'content_middle', $layout_type ) == '0' ) {
			
			/* Added column classes for 2 sidebar layout */
			
			if( charitypure_ifp_first_post() && ! is_paged() && is_home() ){
				$classes[] = 'col-md-12 col-xs-12 ifp-first-post ';
			}else{
				$classes[] = 'col-md-12 col-xs-12';
			}			
			add_filter( 'cyberchimps_post_thumbnail_size', 'cyberchimps_ifp_first_thumbnail_size','1111' );
		} else {
			
			/* Added column classes for single sidebar layout */ 
			
			if( charitypure_ifp_first_post() && ! is_paged() && is_home() ){
				add_filter( 'cyberchimps_post_thumbnail_size', 'cyberchimps_ifp_first_thumbnail_size','1111' );
				$classes[] = 'col-md-8 col-xs-12 ifp-first-post col-eq-height';
			}else{				
				$classes[] = 'col-md-4 col-xs-12 col-sm-6 col-eq-height';
				remove_filter( 'cyberchimps_post_thumbnail_size', 'cyberchimps_ifp_first_thumbnail_size' );
				add_filter( 'cyberchimps_post_thumbnail_size', 'cyberchimps_ifp_thumbnail_size','1111' );
			}
		}		
	}
	
	return $classes;
}

add_filter( 'post_class', 'charitypure_ifp_custom_class' );

/* Added and removed action hooks functions */
function charitypure_ifp_hooks() {
	remove_action( 'cyberchimps_footer', 'cyberchimps_footer_credit' );
	add_action( 'cyberchimps_footer_widgets_credit', 'cyberchimps_footer_credit' );
	add_action( 'recent_posts', 'charitypure_ifp_recent_posts_display');		
	
	/* Removed default pagination and added pagination */
	add_action( 'cyberchimps_after_container', 'charitypure_nav' );
	
	if( get_theme_mod( 'post_excerpts', 0 ) != 0 ) {
		add_filter( 'excerpt_more', 'charitypure_ifp_blog_excerpt_more', 11111 );
	}
	if( ! is_single() )
		add_filter ( 'cyberchimps_posted_on', 'charitypure_ifp_posted_on' );	
	
	/* Remove default Blog posts loop and added customized loop for columns display*/
	remove_action( 'blog_post_page', 'cyberchimps_post' );
	add_action( 'blog_post_page', 'charitypure_ifp_post');
}

add_action( 'init', 'charitypure_ifp_hooks' );


// Additional Fields
function charitypure_ifp_additional_fields( $fields_list ) {

	/* Blog posts options */
	$fields_list[] = array(
		'name'    => __( 'Blog Description', 'charitypure' ),
		'id'      => 'blog_description',
		'type'    => 'toggle',
		'std'     => 0,
		'section' => 'cyberchimps_blog_options_section',
		'heading' => 'cyberchimps_blog_heading'
	);

	$fields_list[] = array(
		'name'    => __( 'Blog Description Text', 'charitypure' ),
		'id'      => 'blog_description_text',
		'class'   => 'blog_description_toggle',
		'type'    => 'text',
		'std'     => '',
		'section' => 'cyberchimps_blog_options_section',
		'heading' => 'cyberchimps_blog_heading'
	);

	/* Boxes Options */
	$fields_list[] = array(
		'name'    => __( 'Title', 'charitypure' ),
		'id'      => 'boxes_title',
		'std'     => '',
		'type'    => 'toggle',
		'section' => 'cyberchimps_boxes_section',
		'heading' => 'cyberchimps_blog_heading'
	);

	$fields_list[] = array(
		'name'    => __( 'Title Text', 'charitypure' ),
		'id'      => 'boxes_title_text',
		'class'   => 'boxes_title_toggle',
		'std'     => '',
		'type'    => 'text',
		'section' => 'cyberchimps_boxes_section',
		'heading' => 'cyberchimps_blog_heading'
	);

	$fields_list[] = array(
		'name'    => __( 'Category Description', 'charitypure' ),
		'id'      => 'boxes_cats_desc',
		'std'     => '',
		'type'    => 'toggle',
		'section' => 'cyberchimps_boxes_section',
		'heading' => 'cyberchimps_blog_heading'
	);
	
	
	/* Widgets */
	$fields_list[] = array(
		'name'    => __( 'Widget Box title', 'charitypure' ),
		'id'      => 'widget_box_title',
		'std'     => '',
		'type'    => 'text',
		'section' => 'cyberchimps_widget_section',
		'heading' => 'cyberchimps_blog_heading'
	);
	
	$fields_list[] = array(
		'name'    => __( 'Widget Box Description', 'charitypure' ),
		'id'      => 'widget_box_description',
		'std'     => '',
		'type'    => 'editor',
		'section' => 'cyberchimps_widget_section',
		'heading' => 'cyberchimps_blog_heading'
	);
	
	/* Recent Posts */
	$fields_list[] = array(
		'name'    => __( 'No. of Posts to Display', 'charitypure' ),
		'id'      => 'recent_posts_limit',
		'std'     => false,
		'type'    => 'text',
		'section' => 'cyberchimps_recent_posts_section',
		'heading' => 'cyberchimps_blog_heading'
	);
	$fields_list[] = array(
		'name'    => __( 'Category Description', 'charitypure' ),
		'id'      => 'recent_posts_cats_desc',
		'std'     => false,
		'type'    => 'toggle',
		'section' => 'cyberchimps_recent_posts_section',
		'heading' => 'cyberchimps_blog_heading'
	);
	$fields_list[] = array(
		'name'    => __( 'Display Post Date', 'charitypure' ),
		'id'      => 'recent_posts_date',
		'std'     => true,
		'type'    => 'toggle',
		'section' => 'cyberchimps_recent_posts_section',
		'heading' => 'cyberchimps_blog_heading'
	);
	
	$fields_list[] = array(
		'name'    => __( 'Display Comments', 'charitypure' ),
		'id'      => 'recent_posts_comments',
		'std'     => true,
		'type'    => 'toggle',
		'section' => 'cyberchimps_recent_posts_section',
		'heading' => 'cyberchimps_blog_heading'
	);
	
	/* Blog Options */
	$fields_list[] = array(
		'name'    => __( 'Post Excerpts', 'charitypure' ),
		'id'      => 'post_excerpts',
		'type'    => 'toggle',
		'std'     => 1,
		'section' => 'cyberchimps_blog_options_section',
		'heading' => 'cyberchimps_blog_heading'
	);
        
        $fields_list[] = array(
			'name'    => __( 'Slider Background Color', 'charitypure' ),
			'id'      => 'custom_slider_background_color',
			'class'   => 'custom_slider_options_toggle',
			'std'     => '',
			'type'    => 'color',
			'section' => 'cyberchimps_slider_section',
			'heading' => 'cyberchimps_blog_heading'
		);
	
	/* Search toggle for single post */
	$fields_list[] = array(
		'name'    => __( 'Post title search', 'charitypure' ),
		'id'      => 'single_post_title_search_toggle',
		'type'    => 'toggle',
		'std'     => false,
		'section' => 'cyberchimps_single_post_section',
		'heading' => 'cyberchimps_templates_heading'
	);
	
	return $fields_list;
}

add_filter( 'cyberchimps_field_list', 'charitypure_ifp_additional_fields', 20, 1 );


/**
	 * Create Meta Boxes in page for widget area
	 */
	function charitypure_widget_area_meta_boxes() {
		if ( class_exists( 'Cyberchimps_Meta_Box' ) ) {
			$fields = array(
				array(
					'type' => 'text',
					'id' => 'widget_box_title',
					'class' => '',
					'name' => __( 'Widget Box title', 'charitypure' )
				),
				array(
					'type' => 'editor',
					'id' => 'widget_box_description',
					'class' => '',
					'name' => __( 'Widget Box Description', 'charitypure' )
				),
			);
			/*
			 * configure your meta box
			 */
			$config = array(
				'id' => 'cyberchimps_widget_section_options', // meta box id, unique per meta box
				'title' => __( 'Widget Options', 'charitypure' ), // meta box title
				'pages' => array( 'page' ), // post types, accept custom post types as well, default is array('post'); optional
				'context' => 'normal', // where the meta box appear: normal (default), advanced, side; optional
				'priority' => 'high', // order of meta box: high (default), low; optional
				'fields' => apply_filters( 'cyberchimps_widget_metabox_fields', $fields, 'featuredarea' ), // list of meta fields (can be added by field arrays)
				'local_images' => false, // Use local or hosted images (meta box images for add/remove)
				'use_with_theme' => true //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
			);

			/*
			 * Initiate your meta box
			 */
			$my_meta = new Cyberchimps_Meta_Box( $config );
		}
	}

	add_action( 'init', 'charitypure_widget_area_meta_boxes' );
	
	
	function charitypure_ifp_widget_box_begin(){
		global $post;
		// Get all featuredarea options.
		if( is_page() ) {				
			$widget_box_title                     = ( get_post_meta( $post->ID, 'widget_box_title', true ) ) ? get_post_meta( $post->ID, 'widget_box_title', true ) : '';
			$widget_box_text                      = ( get_post_meta( $post->ID, 'widget_box_description', true ) ) ? get_post_meta( $post->ID, 'widget_box_description', true ) : '';
		}else{
			$widget_box_title                     = get_theme_mod( 'widget_box_title' );
			$widget_box_text                      = get_theme_mod( 'widget_box_description' );
		}
		?>
		<div class="widget-box-header">
			<?php if( !empty( $widget_box_title ) ){  ?>
				<h2 class="box-widget-header-title">
					<?php echo esc_attr($widget_box_title); ?>
				</h2>					
			<?php  } ?>
			<?php if( !empty( $widget_box_text ) ){  ?>
				<div class="element-desc" >
					<?php echo esc_attr($widget_box_text); ?>
				</div>					
			<?php  } ?>
		</div>
		<?php
	}

	add_action( 'widget_box_begin', 'charitypure_ifp_widget_box_begin' );
	
/* Displayed title and description for Boxes element */
function charitypure_ifp_before_header() {
	
	if ( is_page() ) {
		$customcategory = get_post_meta( get_the_ID(), 'boxes_category', true );
		$boxes_title_toggle = get_post_meta( get_the_ID(), 'boxes_title', true );
		$boxes_title_text = get_post_meta( get_the_ID(), 'boxes_title_text', true );
		$boxes_description = get_post_meta( get_the_ID(), 'boxes_cats_desc', true );
	} else {
		$boxes_title_toggle = get_theme_mod( 'boxes_title', '' );
		$boxes_title_text = get_theme_mod( 'boxes_title_text', '' );
		$boxes_description = get_theme_mod( 'boxes_cats_desc', '' );
		$customcategory = get_theme_mod( 'boxes_category', '' );
	}

	if ( isset( $boxes_title_toggle ) && $boxes_title_text && ( $boxes_title_toggle == '1' OR $boxes_title_toggle == 'on' ) ):
	?>
		<h2 class="entry-title"><?php echo $boxes_title_text; ?></h2>
	<?php endif; ?>
	<?php if ( $boxes_description && ! empty( $customcategory ) ) { ?>
			<div id="boxes_description">
				<?php
				$box_cat = get_term_by( 'slug', $customcategory, 'boxes_categories' );
				if( !empty(  $box_cat->term_id ))
				echo term_description( $box_cat->term_id, 'boxes_categories' );
				?>
			</div>
		<?php
	}
}

add_action( 'boxes_begin_container', 'charitypure_ifp_before_header' );


/* Added metaboxes for Boxes element title and description */
function charitypure_ifp_box_metabox_fields( $fields ) {

	$fields[] = array(
		'type' => 'checkbox',
		'id' => 'boxes_title',
		'class' => 'checkbox',
		'name' => __( 'Title', 'charitypure' ),
		'std' => false
	);

	$fields[] = array(
		'type' => 'text',
		'id' => 'boxes_title_text',
		'class' => '',
		'name' => __( 'Title Text', 'charitypure' )
	);

	$fields[] = array(
		'type' => 'checkbox',
		'id' => 'boxes_cats_desc',
		'class' => 'checkbox',
		'name' => __( 'Category Description', 'charitypure' ),
		'std' => false
	);
	return $fields;
}

add_filter( 'cyberchimps_boxes_metabox_fields', 'charitypure_ifp_box_metabox_fields' );


/* Added metaboxes for Boxes element title and description */
function charitypure_ifp_portfolio_metabox_fields( $fields ) {

	$fields[] = array(
		'type' => 'text',
		'id' => 'subcaption_text',
		'class' => '',
		'name' => __( 'Sub Caption Text', 'charitypure' )
	);
	
	return $fields;
}

add_filter( 'cyberchimps_portfolio_metabox_fields', 'charitypure_ifp_portfolio_metabox_fields' );


/* Added metaboxes fields for Recent posts */
function charitypure_ifp_recent_posts_metabox_fields( $fields ){
		
	$fields[] = array(
		'type' => 'text',
		'id' => 'recent_posts_limit',
		'std' => true,
		'class' => '',
		'name' => __( 'No. of Posts to Display', 'charitypure' )
	);
	
	$fields[] = array(
		'type' => 'checkbox',
		'id' => 'recent_posts_date',
		'std' => true,
		'class' => 'checkbox',
		'name' => __( 'Display Date', 'charitypure' )
	);	
	
	$fields[] = array(
		'type' => 'checkbox',
		'id' => 'recent_posts_comments',
		'std' => true,
		'class' => 'checkbox',
		'name' => __( 'Display Comments', 'charitypure' )
	);
	
	$fields[] = array(
		'type' => 'checkbox',
		'id' => 'recent_posts_cats_desc',
		'std' => false,
		'class' => 'checkbox',
		'name' => __( 'Category Description', 'charitypure' )
	);
	
	return $fields;
	
}
add_filter( 'cyberchimps_recent_posts_metabox_fields', 'charitypure_ifp_recent_posts_metabox_fields' );


/* Added metabox for pages to display search box in title */
function charitypure_custom_metabox_fields( $fields ){
	$fields[] = array(
			'type'  => 'checkbox',
			'id'    => 'cyberchimps_page_title_search_toggle',
			'class' => 'checkbox',
			'name'  => __( 'Display Search in Title', 'charitypure' ),
			'std'   => 0
		);
	return $fields;
}
add_filter( 'cyberchimps_page_metabox_options', 'charitypure_custom_metabox_fields');

/* Changed default recent post element display for query variable changes */
function charitypure_ifp_recent_posts_display(){
	global $custom_excerpt, $post;
	$custom_excerpt = 'recent';

	if( is_page() ) {
		$title = get_post_meta( $post->ID, 'cyberchimps_recent_posts_title', true );
		$description = get_post_meta( $post->ID, 'recent_posts_cats_desc', true );
		$show_date = get_post_meta( $post->ID, 'recent_posts_date', true );
		$show_comments = get_post_meta( $post->ID, 'recent_posts_comments', true );
		$toggle = get_post_meta( $post->ID, 'cyberchimps_recent_posts_title_toggle', true );
		$recent_posts_image = get_post_meta( $post->ID, 'cyberchimps_recent_posts_images_toggle', true );
		$category = get_post_meta( $post->ID, 'cyberchimps_recent_posts_category', true );
		$limit = get_post_meta( $post->ID, 'recent_posts_limit', true )?get_post_meta( $post->ID, 'recent_posts_limit', true ):'2';

	}
	else {
		$title = get_theme_mod( 'recent_posts_custom_title' );
		$description = get_theme_mod( 'recent_posts_cats_desc' );
		$show_date = get_theme_mod( 'recent_posts_date' );
		$show_comments = get_theme_mod( 'recent_posts_comments' );
		$toggle = get_theme_mod( 'recent_posts_title' );
		$recent_posts_image = get_theme_mod( 'recent_posts_images' );
		$limit = get_theme_mod( 'recent_posts_limit' )?get_theme_mod( 'recent_posts_limit' ):'2';
		if( get_theme_mod( 'recent_posts_post_cats' ) != 'all' ) {
			$category = get_the_category_by_ID( get_theme_mod( 'recent_posts_post_cats' ) );
		}
		else {
			$category = 'all';
		}
	}
	if( $category != 'all' ) {
		$customcategory = $category;
	}
	else {
		$customcategory = "";
	}
	
	// Intialize box counter
	$box_counter    = 1;
	$box_id_counter = 1;
	$boxes_per_row = 3;
	
	$args         = array( 'numberposts' => $limit, 'post__not_in' => get_option( 'sticky_posts' ), 'category_name' => $customcategory, 'suppress_filters' => false );
	$recent_posts = get_posts( $args );;
	?>
	<div class="row">
		<div id="recent_posts">
			<?php if( $toggle == '1' OR $toggle == 'on' ){ ?>
				<?php if( !empty( $title ) ){?>
					<h2 class="entry-title"><?php echo esc_attr($title); ?></h2>
				<?php } ?>
				<?php if( !empty( $description ) && !empty( $customcategory ) ){?>
					<div id="recent_posts_description" class="element-desc">
						<?php 
						$cat = get_term_by( 'slug', $customcategory, 'category' );
						if( !empty(  $cat->term_id ) ){
							echo esc_attr(category_description( $cat->term_id ));
						} ?>
					</div>
				<?php } ?>
			<?php } ?>
			<div id="recent_posts_wrap">
				<div class="boxes row">
				<?php if( $recent_posts ) :
					foreach( $recent_posts as $post ) : setup_postdata( $post );

					// Break after desired number of boxes displayed
					if( $box_counter > $boxes_per_row ) {
						$box_counter = 1;
					}
					
					$class= ( ! has_post_thumbnail() )?' ifp-widget-recent-no-image':'';
					
					?>
				
						<div class="col-md-4 col-sm-6 col-xs-12 recent-post <?php echo $class; ?>">
							<div class="recent-posts-container">
								<?php
								if( has_post_thumbnail() && $recent_posts_image == '1' OR has_post_thumbnail() && $recent_posts_image == 'on' ) {
									?>
									<span class="post-thumbnail-container"><a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
											<?php the_post_thumbnail( 'full' ); ?>
										</a>
									</span>
								<?php } ?>
								<div class="recent-posts-content">
									<h5 class="recent-posts-post-title"><a href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a></h5>							

									<?php 
										if ( $show_date ) { ?>
										<span class="post-date"><?php echo get_the_date(); ?></span>
									<?php 				
										}
										if( !empty(  $show_date) && !empty( $show_comments ) ){ ?>
											<span class="sep">&middot;</span><?php
										}
									?>
									<?php 	
										if ( $show_comments ) { ?>
											<span class="post-comment"><?php comments_popup_link( 'No Comments', '1 Comment', '% Comments' ); ?></span><?php 					
										} 
									?>
								</div>
							</div>
						</div>
					<?php
					$box_counter++;
					$box_id_counter++;
					endforeach;
					wp_reset_postdata(); ?>
				
					<?php else : ?>

						<h2><?php echo __('Not Found', 'charitypure'); ?></h2>

					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
<?php
}


/* Added section for widget element options */
function charitypure_section( $sections_list ){
	$sections_list[] = array(
		'id'      => 'cyberchimps_widget_section',
		'label'   => __( 'Widget Options', 'charitypure' ),
		'heading' => 'cyberchimps_blog_heading'
	);
	return $sections_list;
}
add_filter( 'cyberchimps_sections_filter', 'charitypure_section' );


/* Changed meta separator */
function charitypure_ifp_entry_meta_sep(){
	return '&middot;';
}

add_filter( 'cyberchimps_entry_meta_sep' ,'charitypure_ifp_entry_meta_sep' );


/* Changed meta separator */
function charitypure_ifp_comments_meta_sep(){
	return ' ';
}

add_filter( 'cyberchimps_entry_meta_sep' ,'charitypure_ifp_comments_meta_sep', '1' );

/* Check first posts to display on Blog page */
function charitypure_ifp_first_post(){
	global $wp_query;	
	
	if( $wp_query->current_post == '0' )
		return true;
	else 
		return false;
   
}

/* Added default wordpress navigation Previous post and Next post*/
function charitypure_nav( $html_id ) {
	global $wp_query, $blog_section_order;
	$blog_section_order = ( $blog_section_order == '' ) ? array( 'blog_post_page' ) : $blog_section_order;
	$html_id = esc_attr( $html_id );
	
	if ( ($wp_query->max_num_pages > 1 && is_home() && in_array( 'blog_post_page', $blog_section_order ) ) ||  ( $wp_query->max_num_pages > 1 && !is_home() ) ) :
		?>
		<div class="navigation-section">
			<div id="navigation_container" class="container">
				<div class="row" id="navigation">
					<nav id="navigation-container" class="navigation row-fluid" role="navigation">
						<?php if ( get_next_posts_link() ) { ?>
								<div class="nav-previous col-md-6 pull-left"><?php next_posts_link( __( 'Previous', 'charitypure' ) ); ?></div>
						<?php } ?>
						<?php if ( get_previous_posts_link() ) { ?>
								<div class="nav-next col-md-6 pull-right"><?php previous_posts_link( __( 'Next', 'charitypure' ) ); ?></div>
						<?php } ?>
					</nav>
				</div>
			</div>			
		</div>
		<?php
	endif;
}


function charitypure_ifp_default_container_classes( $classes ) {
	if( is_home() )
		$classes[] = 'row-eq-height';

	return $classes;
}
add_filter( 'cyberchimps_container_class', 'charitypure_ifp_default_container_classes' );
	
	
	
/* Display Archive title on page */
function charitypure_ep_title(){
	if( is_singular() ){
		if(  is_page()){
				// get the page title toggle option
				$page_title = get_post_meta( get_the_ID(), 'cyberchimps_page_title_toggle', true);
				$title_search_toggle = get_post_meta( get_the_ID(), 'cyberchimps_page_title_search_toggle', true);
			}elseif( is_single() ){
				// get the post title toggle option
				$theme_options_main = get_option('theme_mods_'.get_template());
				if(!isset($theme_options_main['single_post_title']))
				{
					set_theme_mod('single_post_title', 1);
				}
				$page_title = get_theme_mod( 'single_post_title' );
				$title_search_toggle = get_theme_mod( 'single_post_title_search_toggle' );
			}

		if( is_page() ){

			?>
			<div class="container" >
				<div class="container-fluid" ><?php 						
				} 
					if( (  is_page() && ($page_title == "1" || $page_title == "")) || ( is_single() && $page_title != false ) ){
					?>
						<div class="separate-title-container " >
							<div class="col-md-9 separate-title">
								
								<h1 class="post-title separate-main-title">
									<?php
									( get_the_title() )? the_title() : the_permalink(); ?>				
								</h1>
							</div>
							<?php 								
							if( !empty( $title_search_toggle ) && !empty( $page_title ) ){
								?>
								<div id="title-search-bar" class="col-md-3">
									<?php
										get_search_form( true );
									?>
								</div>
								<?php
							} 
							?>							
						</div>
					<?php 
					}
				if(is_page()){
				?>
				</div>
			</div>
		<?php 	
		}
	}
}
add_action( 'cyberchimps_before_container', 'charitypure_ep_title' );




/* Added custom script for theme options */
function charitypure_default_admin_scripts(){
	wp_enqueue_script( 'cyberchimps-custom-admin-script',  get_template_directory_uri().'/inc/js'.'/custom-admin-scripts.js', array( 'jquery' ), '', true );
}

add_action( "admin_print_scripts-appearance_page_cyberchimps-theme-options", 'charitypure_default_admin_scripts' );


/* Changed Blog excerpt for default */
function charitypure_ifp_blog_excerpt_more( $more ) {
	global $post;
	
	// Get the value of blog read more text option.
	$read_more = get_theme_mod( 'blog_read_more_text' );
	
	if( !empty( $read_more ))
		return '<p><a class="excerpt-more blog-excerpt" href="' . esc_url(get_permalink( $post->ID )) . '">' . $read_more . '</a></p>';
	else		
		return '...';
}


/* Posted on */
function charitypure_ifp_posted_on() {

	if( is_single() ) {
		$show_date = ( get_theme_mod( 'single_post_byline_date', 1 ) ) ? get_theme_mod( 'single_post_byline_date', 1 ) : false;
	}
	elseif( is_archive() ) {
		$show_date = ( get_theme_mod( 'archive_post_byline_date', 1 ) ) ? get_theme_mod( 'archive_post_byline_date', 1 ) : false;
	}
	else {
		$show_date = ( get_theme_mod( 'post_byline_date', 1 ) ) ? get_theme_mod( 'post_byline_date', 1 ) : false;
	}

	if( $show_date ) {
		$posted_on = sprintf( '<div class="entry-date updated meta-item"><a href="%1$s" title="%2$s" rel="bookmark"><time datetime="%3$s">%4$s</time></a></div>', esc_url( get_permalink() ),
		                      esc_attr( get_the_time() ),
		                      esc_attr( get_the_date( 'c' ) ),
		                      esc_html( get_the_date() )
		);

		echo $posted_on.'&nbsp;<span class="sep"> '. apply_filters( 'cyberchimps_entry_meta_sep', '|' ).'	 </span>';
		
	}
}


/* Changed css set from style */
function charitypure_ifp_custom_css(){
	$text_color = get_theme_mod( 'text_colorpicker' ) ? get_theme_mod( 'text_colorpicker' ) : '';
	$link_color = get_theme_mod( 'link_colorpicker' ) ? get_theme_mod( 'link_colorpicker' ) : '';
	$link_hover_color = get_theme_mod( 'link_hover_colorpicker' ) ? get_theme_mod( 'link_hover_colorpicker' ):'';
	if( !empty( $text_color ) || !empty( $link_color ) || !empty( $link_hover_color ) ){
		$style = '<style type="text/css">';
		$style .= '#boxes_container #boxes_description, #widget_boxes_container .entry-summery{ color: '.$text_color . ' ; }' ;
		$style .= '.odd-row .recent-posts-post-title a, .even-row .recent-posts-post-title a, .portfolio-caption{ color: '.$link_color . ' ; }' ;
		$style .= '.odd-row .recent-posts-post-title a:hover, .even-row .recent-posts-post-title a:hover, .portfolio-caption:hover{ color: '.$link_hover_color . ' ; }' ;
		$style .= '</style>';
		echo $style;
	}
}

add_action( 'wp_head', 'charitypure_ifp_custom_css', 111);


/* Added Subcaption for portfolio element */
function charitypure_ifp_subcaption_text( $text, $post ){
	
	$subcaption = ( get_post_meta( $post, 'subcaption_text', true ) != '' ) ? get_post_meta( $post, 'subcaption_text', true ) : '';
	
	if( !empty( $subcaption ) ){
		$text .= '<div class="subcaption-text">'.$subcaption.'</div>';
	}
	return $text;
}

add_filter( 'cyberchimps_portfolio_caption', 'charitypure_ifp_subcaption_text', '', 2 );



function charitypure_ifp_post() {

	?>
	<div id="container" <?php cyberchimps_filter_container_class(); ?>>

		<?php do_action( 'cyberchimps_before_content_container' ); ?>

		<div id="content" <?php cyberchimps_filter_content_class(); ?>>

			<?php do_action( 'cyberchimps_before_content' ); ?>

			<?php 				
				$layout_type = get_theme_mod( 'sidebar_images', 'right_sidebar' );
				
				$first_row = true;
				$post_counter = $i = 1;
				if ( strcmp( 'full_width', $layout_type ) == '0' ) {
					$col = 4;
					$first_row_col = 3;
				} else if ( strcmp( 'right_sidebar', $layout_type ) == '0' || strcmp( 'left_sidebar', $layout_type ) == '0' ) {
					$col = 3;
					$first_row_col = 2;
				}	
				
				?>
				<div class="posts_container row">
					<?php
					if( have_posts() ) : ?>
					<?php 
						while( have_posts() ) : the_post();					

							if( ( $post_counter > $col && $first_row == false ) || ( $post_counter > $first_row_col && $first_row == true ) ) {
								echo '</div><div class="posts_container row">';
								$post_counter = 1;
							}
							if( $i > $first_row_col ) 
								$first_row = false;				
							?>

							<?php get_template_part( 'content', get_post_format() ); ?>

							<?php 
							$post_counter++;
							$i++;
						endwhile; 
					?>
					<?php elseif( current_user_can( 'edit_posts' ) ) : ?>

						<?php get_template_part( 'no-results', 'index' ); ?>

					<?php endif; ?>
				</div>

			<?php do_action( 'cyberchimps_after_content' ); ?>

		</div>
		<!-- #content -->
		<?php do_action( 'cyberchimps_after_content_container' ); ?>

	</div><!-- #container -->
<?php
}

add_action('admin_head', 'charitypure_backend_custom_fonts');

function charitypure_backend_custom_fonts() {
  echo '<style>
    #featuredarea_img,#socialmedia_img{
    display: inline-block;
float: right;
height: 1.6em;
width: 1.55em;
}

#socialmedia_img{ background: url("'.get_template_directory_uri('template_directory').'/images/social.png") no-repeat; }
#featuredarea_img{ background: url("'.get_template_directory_uri('template_directory').'/images/featured_area.png") no-repeat; }
  </style>';
}

//Removed social icons settings, as not used
function charitypure_customize_register( $wp_customize ) {
	$wp_customize->remove_section( 'cyberchimps_social_media' );
}
add_action( 'customize_register', 'charitypure_customize_register', 15 );


// Remove Boxes Lite Section from the customizer
add_action( 'customize_register', 'charitypure_lite_remove_customizer_boxes_lite_settings', 20 );

function charitypure_lite_remove_customizer_boxes_lite_settings( $wp_customize ){

	$wp_customize->remove_section('cyberchimps_blogboxes_section');
	$wp_customize->remove_control('cyberchimps_display_boxes');

}
add_filter( 'cyberchimps_elements_draganddrop_page_options', 'charitypure_lite_page_elements' , 20 );

function charitypure_lite_page_elements($blog_section_order){

	$options = array(
			"portfolio_lite" => __( 'Portfolio Lite', 'cyberchimps_core' ),
			"page_section"   => __( 'Page', 'cyberchimps_core' ),
			"slider_lite"    => __( 'Slider Lite', 'cyberchimps_core' )
	);

	return $options;
}
add_filter('cyberchimps_remove_more_theme_options','charitypure_lite_remove_options');
add_filter('cyberchimps_remove_boxes_lite_options','charitypure_lite_remove_options');

function charitypure_lite_remove_options($val){
	$val = 1;
	return $val;
}
add_filter('cyberchimps_portfolio_lite_img_one' , 'charitypure_lite_portfolio_lite_img1');
add_filter('cyberchimps_portfolio_lite_img_two' , 'charitypure_lite_portfolio_lite_img2');
add_filter('cyberchimps_portfolio_lite_img_three' , 'charitypure_lite_portfolio_lite_img3');
add_filter('cyberchimps_portfolio_lite_img_four' , 'charitypure_lite_portfolio_lite_img4');

function charitypure_lite_portfolio_lite_img1($img){
	$img = '/images/portfolio/port1.jpg';
	return $img;
}

function charitypure_lite_portfolio_lite_img2($img){
	$img = '/images/portfolio/port2.jpg';
	return $img;
}

function charitypure_lite_portfolio_lite_img3($img){
	$img = '/images/portfolio/port3.jpg';
	return $img;
}

function charitypure_lite_portfolio_lite_img4($img){
	$img = '/images/portfolio/port4.jpg';
	return $img;
}
/**
* Default logo in header
*
* @return url
*/
function grandstandlite_default_logo() {
   $url = get_template_directory_uri() . '/images/logo.png';
   return esc_url($url);
}

add_filter( 'cyberchimps_default_logo', 'grandstandlite_default_logo', 10 );
