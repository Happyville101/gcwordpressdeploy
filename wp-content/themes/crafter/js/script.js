jQuery(document).ready(function($) {

			//Anomation at load -----------------
			Pace.on('done', function(event) {
				
			});//Pace

			 wow = new WOW(
                    {
                      offset:       150,
                    }
            )
            wow.init();

            $("body").on('click', '#primary-menu > li > a[href^="#"]', function(event) {
            	event.preventDefault();
            	/* Act on the event */
            	$("html, body").animate({
			    	scrollTop: $( $(this).attr('href') ).offset().top
			    }, 1000);
            });


			$(".ql_scroll_top").click(function() {
			  $("html, body").animate({ scrollTop: 0 }, "slow");
			  return false;
			});

			$("#primary-menu > li > ul > li.dropdown").each(function(index, el) {
				$(el).removeClass('dropdown').addClass('dropdown-submenu');
			});


			//PhotoSwipe for About Section
			initPhotoSwipe('.about-gallery', '.about-gallery-image a', '');

			//Team Section
			//Wait to images load
			$team_wrap = $('.team-wrap');
			$team_wrap.imagesLoaded(  function( $images, $proper, $broken ) {

				$team_wrap.flickity({
					cellAlign: 'center',
					contain: true,
					prevNextButtons: false,
					pageDots: true,
					autoPlay: 5000,
					watchCSS: true
				});
						
			});//images loaded

			//Clients Section
			//Wait to images load
			$clients_wrap = $('.clients-wrap');
			$clients_wrap.imagesLoaded(  function( $images, $proper, $broken ) {

				$clients_wrap.flickity({
					cellAlign: 'center',
					contain: true,
					prevNextButtons: false,
					pageDots: false,
					autoPlay: 5000
				});
						
			});//images loaded
			

			
			$('.dropdown-toggle').dropdown();


			$('*[data-toggle="tooltip"]').tooltip();
			

			//Sidebar Menu Function
			$('#sidebar .widget ul:not(.product-categories) li ul').parent().addClass('hasChildren').append("<i class='fa fa-angle-down'></i>");
			var children;
			$("#sidebar .widget ul:not(.product-categories) li").hoverIntent(
				function () {
					children = $(this).children("ul");
					if($(children).length > 0){ $(children).stop(true, true).slideDown('fast'); }
				}, 
				function () {
				  $(this).children('ul').stop(true, true).slideUp(500);
				}
			);
			//Footer Menu Function
			$('footer .widget ul:not(.product-categories) li ul').parent().addClass('hasChildren').append("<i class='fa fa-angle-down'></i>");
			var children;
			$("footer .widget ul:not(.product-categories) li").hoverIntent(
				function () {
					children = $(this).children("ul");
					if($(children).length > 0){ $(children).stop(true, true).slideDown('fast'); }
				}, 
				function () {
				  $(this).children('ul').stop(true, true).slideUp(500);
				}
			);	

			
			
								
							
														

});