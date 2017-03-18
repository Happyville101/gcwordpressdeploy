<div class="clearfix"></div>
<?php
$pagination = get_the_posts_pagination( array(
    'prev_text'          => esc_attr__( 'Previous page', 'crafter' ),
	'next_text'          => esc_attr__( 'Next page', 'crafter' )
) );
if ( $pagination ) {
	echo '<div class="pagination_wrap">';
	echo wp_kses_post( $pagination );
	echo '</div><!-- /pagination_wrap -->';
}
?>