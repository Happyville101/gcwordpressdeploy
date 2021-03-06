<?php
add_action( 'admin_menu', 'quemalabs_getting_started_menu' );
function quemalabs_getting_started_menu() {
	add_theme_page( esc_attr__( 'Theme Info', 'crafter' ), esc_attr__( 'Theme Info', 'crafter' ), 'manage_options', 'crafter_theme-info', 'quemalabs_getting_started_page' );
}

/**
 * Theme Info Page
 */
function quemalabs_getting_started_page() {
	if ( ! current_user_can( 'manage_options' ) )  {
		wp_die( esc_html__( 'You do not have sufficient permissions to access this page.', 'crafter' ) );
	}
	echo '<div class="getting-started">';
	?>
	<div class="getting-started-header">
		<div class="header-wrap">
			<div class="theme-image">
				<span class="top-browser"><i></i><i></i><i></i></span>
				<img src="<?php echo get_template_directory_uri() . '/screenshot.png'; ?>" alt="">
			</div>
			<div class="theme-content">
				<div class="theme-content-wrap">
				<h4><?php esc_html_e( 'Getting Started', 'crafter' ); ?></h4>
				<h2 class="theme-name"><?php echo esc_html( QL_THEME_NAME ); ?> <span class="ver"><?php echo 'v' . esc_html( QL_THEME_VERSION ); ?></span></h2>
				<p><?php echo sprintf( esc_html__( 'Thanks for using %s, we appriciate that you create with our products.', 'crafter' ), esc_html( QL_THEME_NAME ) ); ?></p>
				<p><?php esc_html_e( 'Check the content below to get started with our theme.', 'crafter' ); ?></p>
				</div>

				<ul class="getting-started-menu">
					<?php
					if ( isset ( $_GET['tab'] ) ){
						$tab = $_GET['tab'];
					}else{
						$tab = 'docs';
					}
					?>
					<li><a href="?page=crafter_theme-info&amp;tab=docs" class="<?php echo ( $tab == 'docs' ) ? ' active' : ''; ?>"><i class="fa fa-file-text-o"></i> <?php esc_html_e( 'Documentation', 'crafter' ); ?></a></li>
					<li><a href="https://www.quemalabs.com/theme/crafter-pro/" target="_blank"><i class="fa fa-star-o"></i> <?php esc_html_e( 'PRO Version', 'crafter' ); ?></a></li>
					<li><a href="https://www.quemalabs.com/" target="_blank" class="<?php echo ( $tab == 'more-themes' ) ? ' active' : ''; ?>"><i class="fa fa-wordpress"></i> <?php esc_html_e( 'More Themes', 'crafter' ); ?></a></li>
				</ul>

			</div><!-- .theme-content -->
		</div>
		<a href="https://www.quemalabs.com/" class="ql_logo" target="_blank"><img  src="<?php echo get_template_directory_uri() . '/images/quemalabs.png'; ?>" alt="Quema Labs" /></a>
	</div><!-- .getting-started-header -->

	<div class="getting-started-content">

	<?php
	global $pagenow;
	global $updater;
	
	if ( $pagenow == 'themes.php' && $_GET['page'] == 'crafter_theme-info' ){
		if ( isset ( $_GET['tab'] ) ){
			$tab = $_GET['tab'];
		}else{
			$tab = 'docs';
		}

		switch ( $tab ){
			case 'docs' :
	?>

			<div class="theme-docuementation">
				<div class="help-msg-wrap">
					<div class="help-msg"><?php echo sprintf( esc_html__( 'You can find the documentation and more at our %sHelp Center%s.', 'crafter' ), '<a href="https://www.quemalabs.com/help-center/" target="_blank">', '</a>' ); ?></div>
				</div>
				
			</div><!-- .theme-docuementation -->
			<?php
	      	break;
	      
     	}//switch
         ?>


	<?php }//if theme.php ?>

	</div><!-- .getting-started-content -->


	<?php
	echo '</div><!-- .getting-started -->';
}
?>