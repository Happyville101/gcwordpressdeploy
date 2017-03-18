<?php
$crafter_enable_section = get_theme_mod( 'crafter_services_enable', true );
if ( $crafter_enable_section || is_customize_preview() ) :
?>
<div id="services-section" class="services-section"  <?php if( false == $crafter_enable_section ): echo 'style="display: none;"'; endif ?>>
	<h2 class="section-title"><?php echo esc_html( get_theme_mod( 'crafter_services_title', esc_html__( 'What We Do', 'crafter' ) ) ); ?></h2>


			<?php
			$id = get_theme_mod( 'crafter_services_page', '' );
			$post = get_post( $id ); 

			if ( is_a( $post, 'WP_Post' ) ) {

				$content = apply_filters( 'the_content', $post->post_content ); 
				echo $content;
				
			}else{
			?>
			<div class="widget widget_service-widget service wow fadeInUp">
			    <div class="service-category">Success <span></span></div>
			        
			    <div class="service-text">
			        <img src="http://demo.quemalabs.com/crafter/wp-content/uploads/2016/11/layers_64px.png" alt="" class="service-icon">
			        <h4>Start Up Projects</h4>
			        <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>  
			        <a href="#" class="read-more">Learn More <i class="fa fa-angle-right"></i></a>
			    </div>
			    <div class="clearfix"></div>
			</div>

			<div class="widget widget_service-widget service wow fadeInUp">
			    <div class="service-category">Economy <span></span></div>

			    <div class="service-text">
			        <img src="http://demo.quemalabs.com/crafter/wp-content/uploads/2016/11/linegraph_64px.png" alt="" class="service-icon">
			        <h4>Marketing Strategy</h4>
			        <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>  
			        <a href="#" class="read-more">Learn More <i class="fa fa-angle-right"></i></a>
			    </div>
			    <div class="clearfix"></div>


			</div>

			<div class="widget widget_service-widget service wow fadeInUp">

			    <div class="service-category">Inspiring <span></span></div>
			        
			    <div class="service-text">
			        <img src="http://demo.quemalabs.com/crafter/wp-content/uploads/2016/11/megaphone_64px.png" alt="" class="service-icon">
			        <h4>Creative Campaigns</h4>
			        <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>  
			        <a href="#" class="read-more">Learn More <i class="fa fa-angle-right"></i></a>
			    </div>
			    <div class="clearfix"></div>

			</div>

			<div class="widget widget_service-widget service wow fadeInUp">
			    <div class="service-category">Creative <span></span></div>

			    <div class="service-text">
			        <img src="http://demo.quemalabs.com/crafter/wp-content/uploads/2016/11/tools_64px.png" alt="" class="service-icon">
			        <h4>Innovative Ideas</h4>
			        <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>  
			        <a href="#" class="read-more">Learn More <i class="fa fa-angle-right"></i></a>
			    </div>
			    <div class="clearfix"></div>

			</div>
			<?php

			};
			?>
    
</div><!-- services-section -->
<?php endif ?>