/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title a, .site-description, #jqueryslidemenu a' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );


	

	/*
    Colors
    =====================================================
    */
		//Featured Color
		wp.customize( 'crafter_hero_color', function( value ) {
			value.bind( function( to ) {
				$( '.pagination li.active a, .pagination li.active a:hover, .wpb_wrapper .products .product-category h3, .btn-ql:active, .btn-ql.alternative:hover, .btn-ql.alternative-white:hover, .btn-ql.alternative-gray:hover, .hero_bck, .ql_nav_btn:hover, .ql_nav_btn:active, .cd-popular .cd-select, .no-touch .cd-popular .cd-select:hover, .pace .pace-progress, .btn-ql::before, btn-ql:hover::before, btn-ql:active::before, btn-ql::after, btn-ql:hover::after, btn-ql:active::after, .service .service-category::before, .service .service-category span, .section-title::before, .about-section .about-text .about-service p::before, .video-text-wrap .video-text-title::before, .btn-ql-round::after, btn-ql-round:hover::after, btn-ql-round:active::after, .about-section .about-text .about-service p::after, .team-member .member-image span::before, .team-member .member-image span::after, .team-member .member-image::before, .team-member .member-image::after, .portfolio-section .portfolio-item::before, .portfolio-section .portfolio-item::after, .portfolio-section .portfolio-item span.lines::before, .portfolio-section .portfolio-item span.lines::after, .pricing-section .pricing-table::before, .pricing-section .pricing-table::after, .pricing-section .pricing-table span.lines::before, .pricing-section .pricing-table span.lines::after, .flickity-page-dots .dot.is-selected, .blog-wrap .blog-time-date::after, .contact-section .contact-submit::after' ).css( {
						'background-color': to
				} );
				$( '.btn-ql, .pagination li.active a, .pagination li.active a:hover, .btn-ql:active, .btn-ql.alternative, .btn-ql.alternative:hover, .btn-ql.alternative-white:hover, .btn-ql.alternative-gray:hover, .hero_border, .pace .pace-activity, .section-title::after, .video-text-wrap .video-text-title::after, .btn-ql-round::before, btn-ql-round:hover::before, btn-ql-round:active::before, .flickity-page-dots .dot.is-selected, .blog-wrap .blog-time-date::before, .contact-section .contact-submit::before' ).css( {
						'border-color': to 
				} );
				$( '.pagination .current, .pagination a:hover, .widget_recent_posts ul li h6 a, .widget_popular_posts ul li h6 a, .read-more, .read-more i, .btn-ql.alternative, .hero_color, .cd-popular .cd-pricing-header, .cd-popular .cd-currency, .cd-popular .cd-duration, #sidebar .widget ul li > a:hover, #sidebar .widget_recent_comments ul li a:hover' ).css( {
						'color': to
				} );
			} );
		} );

		//Text Color
		wp.customize( 'crafter_text_color', function( value ) {
			value.bind( function( to ) {
				$( 'body' ).css( {
						'color': to
				} );
			} );
		} );
		//Link Color
		wp.customize( 'crafter_link_color', function( value ) {
			value.bind( function( to ) {
				$( 'a' ).css( {
						'color': to
				} );
			} );
		} );


	/*
    Front Page Sections
    =====================================================
    */

    	/*
    	Welcome
    	------------------------------ */
    	//Welcome Message
		wp.customize( 'crafter_welcome_title', function( value ) {
			value.bind( function( to ) {
				$( '.welcome-intro .intro-line' ).text( to );
			} );
		} );
		//Welcome Message Text
		wp.customize( 'crafter_welcome_text', function( value ) {
			value.bind( function( to ) {
				$( '.welcome-intro .intro-text' ).text( to );
			} );
		} );
		//Link Title
		wp.customize( 'crafter_welcome_link_title', function( value ) {
			value.bind( function( to ) {
				$( '.welcome-section .btn-ql' ).text( to );
			} );
		} );
		//Link URL
		wp.customize( 'crafter_welcome_link_url', function( value ) {
			value.bind( function( to ) {
				$( '.welcome-section .btn-ql' ).attr( 'href', to );
			} );
		} );
		//Background Image
		wp.customize( 'crafter_welcome_image', function( value ) {
			value.bind( function( to ) {
				if ( to != "" ) {
					$( '.welcome-section' ).css( 'background-image', 'url(' + to + ')' );
					console.log(to);
				}else{
					$( '.welcome-section' ).css( 'background-image', 'url(' + wp_customizer.theme_url + "/images/slider1.jpg)" );
				}
			} );
		} );
		//Enable/Disable Section
		wp.customize( 'crafter_welcome_enable', function( value ) {
			value.bind( function( to ) {
				if ( to == true ) {
					$( '.welcome-section' ).show();	
				}else{
					$( '.welcome-section' ).hide();
				}
			} );
		} );

		/*
    	Services
    	------------------------------ */
    	//Enable/Disable Section
		wp.customize( 'crafter_services_enable', function( value ) {
			value.bind( function( to ) {
				if ( to == true ) {
					$( '.services-section' ).show();	
				}else{
					$( '.services-section' ).hide();
				}
			} );
		} );

    	/*
    	About
    	------------------------------ */
    	//Section Title
		wp.customize( 'crafter_about_title', function( value ) {
			value.bind( function( to ) {
				$( '.about-section .section-title' ).text( to );
			} );
		} );
		//Title 1
		wp.customize( 'crafter_about_title1', function( value ) {
			value.bind( function( to ) {
				$( '.about-section .about-text .about-service1 h4' ).text( to );
			} );
		} );
		//Text 1
		wp.customize( 'crafter_about_text1', function( value ) {
			value.bind( function( to ) {
				$( '.about-section .about-text .about-service1 p' ).text( to );
			} );
		} );
		//Title 2
		wp.customize( 'crafter_about_title2', function( value ) {
			value.bind( function( to ) {
				$( '.about-section .about-text .about-service2 h4' ).text( to );
			} );
		} );
		//Text 2
		wp.customize( 'crafter_about_text2', function( value ) {
			value.bind( function( to ) {
				$( '.about-section .about-text .about-service2 p' ).text( to );
			} );
		} );
		//Title 3
		wp.customize( 'crafter_about_title3', function( value ) {
			value.bind( function( to ) {
				$( '.about-section .about-text .about-service3 h4' ).text( to );
			} );
		} );
		//Text 3
		wp.customize( 'crafter_about_text3', function( value ) {
			value.bind( function( to ) {
				$( '.about-section .about-text .about-service3 p' ).text( to );
			} );
		} );



		/*
    	Video
    	------------------------------ */
    	//Title
		wp.customize( 'crafter_video_title', function( value ) {
			value.bind( function( to ) {
				$( '.video-section .video-text-wrap .video-text-title' ).text( to );
			} );
		} );
		//Text
		wp.customize( 'crafter_video_text', function( value ) {
			value.bind( function( to ) {
				$( '.video-section .video-text-wrap p' ).html( to );
			} );
		} );
		//Link Title
		wp.customize( 'crafter_video_link_title', function( value ) {
			value.bind( function( to ) {
				$( '.video-section .btn-ql' ).text( to );
			} );
		} );
		//Link URL
		wp.customize( 'crafter_video_link_url', function( value ) {
			value.bind( function( to ) {
				$( '.video-section .btn-ql' ).attr( 'href', to );
			} );
		} );
		//Enable/Disable Section
		wp.customize( 'crafter_video_enable', function( value ) {
			value.bind( function( to ) {
				if ( to == true ) {
					$( '.video-section' ).show();	
				}else{
					$( '.video-section' ).hide();
				}
			} );
		} );


		/*
    	Bullet Points
    	------------------------------ */
    	//Title
		wp.customize( 'crafter_bullet_points_title', function( value ) {
			value.bind( function( to ) {
				$( '.bullet-points-image .bullet-points-title' ).text( to );
			} );
		} );
		//Text
		wp.customize( 'crafter_bullet_points_main_desc', function( value ) {
			value.bind( function( to ) {
				$( '.bullet-points-image p' ).html( to );
			} );
		} );
		//Link Title
		wp.customize( 'crafter_bullet_points_link_title', function( value ) {
			value.bind( function( to ) {
				$( '.bullet-points-image .btn-ql' ).text( to );
			} );
		} );
		//Link URL
		wp.customize( 'crafter_bullet_points_link_url', function( value ) {
			value.bind( function( to ) {
				$( '.bullet-points-image .btn-ql' ).attr( 'href', to );
			} );
		} );
		//Background Image
		wp.customize( 'crafter_bullet_points_image', function( value ) {
			value.bind( function( to ) {
				if ( to != "" ) {
					$( '.bullet-points-image' ).css( 'background-image', 'url(' + to + ')' );
					console.log(to);
				}else{
					$( '.bullet-points-image' ).css( 'background-image', 'url(' + wp_customizer.theme_url + "/images/bullet-points.jpeg)" );
				}
			} );
		} );
		//Title 1
		wp.customize( 'crafter_bullet_points_title1', function( value ) {
			value.bind( function( to ) {
				$( '.bullet-point1 .bullet-point-text h4' ).html( to );
			} );
		} );
		//Text 1
		wp.customize( 'crafter_bullet_points_text1', function( value ) {
			value.bind( function( to ) {
				$( '.bullet-point1 .bullet-point-text div' ).html( to );
			} );
		} );
		//Title 2
		wp.customize( 'crafter_bullet_points_title2', function( value ) {
			value.bind( function( to ) {
				$( '.bullet-point2 .bullet-point-text h4' ).html( to );
			} );
		} );
		//Text 2
		wp.customize( 'crafter_bullet_points_text2', function( value ) {
			value.bind( function( to ) {
				$( '.bullet-point2 .bullet-point-text div' ).html( to );
			} );
		} );
		//Title 3
		wp.customize( 'crafter_bullet_points_title3', function( value ) {
			value.bind( function( to ) {
				$( '.bullet-point3 .bullet-point-text h4' ).html( to );
			} );
		} );
		//Text 3
		wp.customize( 'crafter_bullet_points_text3', function( value ) {
			value.bind( function( to ) {
				$( '.bullet-point3 .bullet-point-text div' ).html( to );
			} );
		} );
		//Title 4
		wp.customize( 'crafter_bullet_points_title4', function( value ) {
			value.bind( function( to ) {
				$( '.bullet-point4 .bullet-point-text h4' ).html( to );
			} );
		} );
		//Text 4
		wp.customize( 'crafter_bullet_points_text4', function( value ) {
			value.bind( function( to ) {
				$( '.bullet-point4 .bullet-point-text div' ).html( to );
			} );
		} );
		//Enable/Disable Section
		wp.customize( 'crafter_bullet_points_enable', function( value ) {
			value.bind( function( to ) {
				if ( to == true ) {
					$( '.bullet-points-section' ).show();	
				}else{
					$( '.bullet-points-section' ).hide();
				}
			} );
		} );

		/*
    	Testimonials
    	------------------------------ */
    	//Background Image
		wp.customize( 'crafter_testimonial_image', function( value ) {
			value.bind( function( to ) {
				if ( to != "" ) {
					$( '.testimonials-section' ).css( 'background-image', 'url(' + to + ')' );		
				}else{
					$( '.testimonials-section' ).css( 'background-image', 'url(' + wp_customizer.theme_url + "/images/img.jpg)" );
				}
			} );
		} );
		//Enable/Disable Section
		wp.customize( 'crafter_testimonial_enable', function( value ) {
			value.bind( function( to ) {
				if ( to == true ) {
					$( '.testimonials-section' ).show();	
				}else{
					$( '.testimonials-section' ).hide();
				}
			} );
		} );

		

		/*
    	Team
    	------------------------------ */
    	//Title
		wp.customize( 'crafter_team_title', function( value ) {
			value.bind( function( to ) {
				$( '.team-section .section-title' ).text( to );
			} );
		} );
		//Enable/Disable Section
		wp.customize( 'crafter_team_enable', function( value ) {
			value.bind( function( to ) {
				if ( to == true ) {
					$( '.team-section' ).show();	
				}else{
					$( '.team-section' ).hide();
				}
			} );
		} );


		/*
    	Clients
    	------------------------------ */
    	//Title
		wp.customize( 'crafter_clients_title', function( value ) {
			value.bind( function( to ) {
				$( '.clients-section .section-title' ).text( to );
			} );
		} );
		//Background Image
		wp.customize( 'crafter_clients_image', function( value ) {
			value.bind( function( to ) {
				if ( to != "" ) {
					$( '.clients-section' ).css( 'background-image', 'url(' + to + ')' );
					console.log(to);
				}else{
					$( '.clients-section' ).css( 'background-image', 'url(' + wp_customizer.theme_url + "/images/clients.jpg)" );
				}
			} );
		} );
		//Enable/Disable Section
		wp.customize( 'crafter_clients_enable', function( value ) {
			value.bind( function( to ) {
				if ( to == true ) {
					$( '.clients-section' ).show();	
				}else{
					$( '.clients-section' ).hide();
				}
			} );
		} );

		/*
    	Contact
    	------------------------------ */
    	//Title
		wp.customize( 'crafter_contact_title', function( value ) {
			value.bind( function( to ) {
				$( '.contact-section .section-title' ).text( to );
			} );
		} );
		//Text
		wp.customize( 'crafter_contact_text', function( value ) {
			value.bind( function( to ) {
				$( '.contact-section .contact-text' ).html( to.replace(/\n\r?/g, '<br />') );
			} );
		} );
		//Enable/Disable Section
		wp.customize( 'crafter_contact_enable', function( value ) {
			value.bind( function( to ) {
				if ( to == true ) {
					$( '.contact-section' ).show();	
				}else{
					$( '.contact-section' ).hide();
				}
			} );
		} );

		/*
    	Pricing
    	------------------------------ */
    	//Title
		wp.customize( 'crafter_pricing_title', function( value ) {
			value.bind( function( to ) {
				$( '.pricing-section .section-title' ).text( to );
			} );
		} );
		//Enable/Disable Section
		wp.customize( 'crafter_pricing_enable', function( value ) {
			value.bind( function( to ) {
				if ( to == true ) {
					$( '.pricing-section' ).show();	
				}else{
					$( '.pricing-section' ).hide();
				}
			} );
		} );

		/*
    	Portfolio
    	------------------------------ */
    	//Title
		wp.customize( 'crafter_portfolio_title', function( value ) {
			value.bind( function( to ) {
				$( '.portfolio-section .section-title' ).text( to );
			} );
		} );
		//Enable/Disable Section
		wp.customize( 'crafter_portfolio_enable', function( value ) {
			value.bind( function( to ) {
				if ( to == true ) {
					$( '.portfolio-section' ).show();	
				}else{
					$( '.portfolio-section' ).hide();
				}
			} );
		} );

		/*
    	Blog
    	------------------------------ */
    	//Title
		wp.customize( 'crafter_blog_title', function( value ) {
			value.bind( function( to ) {
				$( '.blog-section .section-title' ).text( to );
			} );
		} );
		//Enable/Disable Section
		wp.customize( 'crafter_blog_enable', function( value ) {
			value.bind( function( to ) {
				if ( to == true ) {
					$( '.blog-section' ).show();	
				}else{
					$( '.blog-section' ).hide();
				}
			} );
		} );

} )( jQuery );
