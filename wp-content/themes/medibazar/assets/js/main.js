jQuery.noConflict();
(function ($) {
	"use strict";

	// meanmenu
	$('#mobile-menu').meanmenu({
		meanMenuContainer: '.mobile-menu',
		meanScreenWidth: "992"
	});

	// info-bar
	$('.info-bar').on('click', function (e) {
		e.preventDefault();
		$('.extra-info').addClass('info-open');
	})

	$('.close-icon').on('click', function () {
		$('.extra-info').removeClass('info-open');
	})

	$('.sidebar-overlay').on('click', function () {
		$('.extra-info').removeClass('info-open');
	})

	// cat - toggle
	$('.cat-toggle').on('click', function () {
		$('.category-menu').slideToggle(500);
	});


	// sticky
	var wind = $(window);
	var sticky = $('#sticky-header');
	wind.on('scroll', function () {
		var scroll = wind.scrollTop();
		if (scroll < 100) {
			sticky.removeClass('sticky');
		} else {
			sticky.addClass('sticky');
		}
	});


	/* OWL CAROUSEL */
		$('.carousel_slider').each( function() {
			var $carousel = $(this);
			$carousel.owlCarousel({
				dots : $carousel.data("dots"),
				loop : $carousel.data("loop"),
				items: $carousel.data("items"),
				margin: $carousel.data("margin"),
				mouseDrag: $carousel.data("mouse-drag"),
				touchDrag: $carousel.data("touch-drag"),
				autoHeight: $carousel.data("autoheight"),
				center: $carousel.data("center"),
				nav: $carousel.data("nav"),
				rewind: $carousel.data("rewind"),
				navText: ['<i class="ion-ios-arrow-left"></i>', '<i class="ion-ios-arrow-right"></i>'],
				autoplay : $carousel.data("autoplay"),
				animateIn : $carousel.data("animate-in"),
				animateOut: $carousel.data("animate-out"),
				autoplayTimeout : $carousel.data("autoplay-timeout"),
				smartSpeed: $carousel.data("smart-speed"),
				responsive: $carousel.data("responsive")
			});	
		});

	
	/* HOME SLIDER */
			$('.banners-active').slick({
			dots: true,
			arrows: false,
			infinite: true,
			speed: 300,
			prevArrow: '<button type="button" class="slick-prev"><i class="fal fa-long-arrow-left"></i></button>',
			nextArrow: '<button type="button" class="slick-next"><i class="fal fa-long-arrow-right"></i></button>',
			slidesToShow: 1,
			slidesToScroll: 1,
			responsive: [
				{
					breakpoint: 1500,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
					}
				},
				{
					breakpoint: 1200,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
					}
				},
				{
					breakpoint: 992,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
					}
				},
				{
					breakpoint: 767,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
				},
				{
					breakpoint: 550,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
						dots: false,
					}
				}
			]
		});

	
	/* HOME SLIDER 2*/
		// mainSlider
		function mainSlider() {
			var BasicSlider = $('.slider-active');
			BasicSlider.on('init', function (e, slick) {
				var $firstAnimatingElements = $('.single-slider:first-child').find('[data-animation]');
				doAnimations($firstAnimatingElements);
			});
			BasicSlider.on('beforeChange', function (e, slick, currentSlide, nextSlide) {
				var $animatingElements = $('.single-slider[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
				doAnimations($animatingElements);
			});
			BasicSlider.slick({
				autoplay: false,
				autoplaySpeed: 10000,
				dots: false,
				fade: true,
				arrows: true,
				prevArrow: '<button type="button" class="slick-prev"><i class="far fa-long-arrow-left"></i></button>',
				nextArrow: '<button type="button" class="slick-next"><i class="far fa-long-arrow-right"></i></button>',
				responsive: [
					{
						breakpoint: 1200,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1,
							arrows: false,
						}
					},
					{
						breakpoint: 991,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1,
							arrows: false,
						}
					},
					{
						breakpoint: 767,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1,
							arrows: false,
						}
					}
				]
			});

			function doAnimations(elements) {
				var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
				elements.each(function () {
					var $this = $(this);
					var $animationDelay = $this.data('delay');
					var $animationType = 'animated ' + $this.data('animation');
					$this.css({
						'animation-delay': $animationDelay,
						'-webkit-animation-delay': $animationDelay
					});
					$this.addClass($animationType).one(animationEndEvents, function () {
						$this.removeClass($animationType);
					});
				});
			}
		}
		mainSlider();


	/* DATA BACKGROUND */

	$("[data-background]").each(function () {
		$(this).css("background-image", "url(" + $(this).attr("data-background") + ")")
	});


	/* Data BG Color */

		$("[data-bg-color]").each(function () {
			$(this).css("background", $(this).attr("data-bg-color"))
		})

	
	// COUNTDOWN
		$('[data-countdown]').each(function () {
			var $this = $(this), finalDate = $(this).data('countdown');
			$this.countdown(finalDate, function (event) {
				$this.html(event.strftime('<div class="time-count">%D <span>' + $(this).data('days') + '</span></div><div class="time-count">%H <span>' + $(this).data('hour') + '</span></div><div class="time-count">%M <span>' + $(this).data('minute') + '</span></div><div class="time-count">%S <span>' + $(this).data('second') + '</span></div>'));
			});
		});
	
	// TESTIMONIAL
		$('.test-active').slick({
			dots: true,
			arrows: true,
			infinite: true,
			autoplay:true,
			speed: 300,
			prevArrow: '<button type="button" class="slick-prev"><i class="fal fa-long-arrow-left"></i></button>',
			nextArrow: '<button type="button" class="slick-next"><i class="fal fa-long-arrow-right"></i></button>',
			slidesToShow: 2,
			slidesToScroll: 1,
			responsive: [
				{
					breakpoint: 1500,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1,
					}
				},
				{
					breakpoint: 1200,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1,
					}
				},
				{
					breakpoint: 992,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1,
					}
				},
				{
					breakpoint: 767,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1
					}
				},
				{
					breakpoint: 550,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
				}
			]
		});

	// active
	$('.service-box').on('mouseenter', function () {
		$(this).addClass('active').parent().siblings().find('.service-box').removeClass('active');
	})

	// test-02-active
	$('.test-02-active').slick({
		dots: true,
		arrows: true,
		infinite: true,
		autoplay:true,
		speed: 300,
		prevArrow: '<button type="button" class="slick-prev"><i class="fal fa-long-arrow-left"></i></button>',
		nextArrow: '<button type="button" class="slick-next"><i class="fal fa-long-arrow-right"></i></button>',
		slidesToShow: 1,
		slidesToScroll: 1,
		responsive: [
			{
				breakpoint: 1500,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
				}
			},
			{
				breakpoint: 1200,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
				}
			},
			{
				breakpoint: 992,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
				}
			},
			{
				breakpoint: 767,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					arrows: false,
				}
			},
			{
				breakpoint: 550,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					arrows: false,
				}
			}
		]
	});
	
	// test-03-active
	$('.test-03-active').slick({
		dots: false,
		arrows: true,
		infinite: true,
		autoplay:true,
		speed: 300,
		prevArrow: '<button type="button" class="slick-prev"><i class="fal fa-long-arrow-left"></i></button>',
		nextArrow: '<button type="button" class="slick-next"><i class="fal fa-long-arrow-right"></i></button>',
		slidesToShow: 1,
		slidesToScroll: 1,
		responsive: [
			{
				breakpoint: 1500,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
				}
			},
			{
				breakpoint: 1200,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					arrows: false,
				}
			},
			{
				breakpoint: 992,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					arrows: false,
				}
			},
			{
				breakpoint: 767,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					arrows: false,
				}
			},
			{
				breakpoint: 550,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					arrows: false,
				}
			}
		]
	});

	// pro-active
	$('.pro-active').slick({
		dots: false,
		arrows: false,
		infinite: true,
		speed: 300,
		prevArrow: '<button type="button" class="slick-prev"><i class="fal fa-long-arrow-left"></i></button>',
		nextArrow: '<button type="button" class="slick-next"><i class="fal fa-long-arrow-right"></i></button>',
		slidesToShow: 3,
		slidesToScroll: 1,
		responsive: [
			{
				breakpoint: 1500,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 1,
				}
			},
			{
				breakpoint: 1200,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 1,
				}
			},
			{
				breakpoint: 992,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
				}
			},
			{
				breakpoint: 767,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			},
			{
				breakpoint: 550,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		]
	});

	/* magnificPopup video view */
	$('.popup-video').magnificPopup({
		type: 'iframe'
	});

	/* magnificPopup img view */
	$('.popup-image').magnificPopup({
		type: 'image',
		gallery: {
			enabled: true
		}
	});

	// scrollToTop
	$.scrollUp({
		scrollName: 'scrollUp', // Element ID
		topDistance: '300', // Distance from top before showing element (px)
		topSpeed: 300, // Speed back to top (ms)
		animation: 'fade', // Fade, slide, none
		animationInSpeed: 200, // Animation in speed (ms)
		animationOutSpeed: 200, // Animation out speed (ms)
		scrollText: '<i class="fas fa-angle-up"></i>', // Text for element
		activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	});

	// WOW active
	new WOW().init();


	if (typeof ($.fn.knob) != 'undefined') {
		$('.knob').each(function () {
		  var $this = $(this),
			knobVal = $this.attr('data-rel');

		  $this.knob({
			'draw': function () {
			  $(this.i).val(this.cv + '%')
			}
		  });

		  $this.appear(function () {
			$({
			  value: 0
			}).animate({
			  value: knobVal
			}, {
			  duration: 2000,
			  easing: 'swing',
			  step: function () {
				$this.val(Math.ceil(this.value)).trigger('change');
			  }
			});
		  }, {
			accX: 0,
			accY: -150
		  });
		});
	}

	$(document).ready(function () {
		setTimeout(() => {
			$(".flex-control-thumbs").addClass("owl-carousel");
			
			$('.flex-control-thumbs').owlCarousel({
				items: 4,
				pagination: true,
				rewindNav: true,
				itemsTablet : [992,3],
				itemsDesktopSmall :[768,3],
				itemsDesktop : [992,1],
				itemsMobile : [479,3],
			});
		}, 100);
		
		$('.dropdown').click(function(e) {
			e.stopPropagation();
		});

		$('.dropdown').children('.dropdown-toggle').on('click', function(event){
			event.preventDefault();
			$(this).toggleClass('submenu-open').next('.dropdown-menu').slideToggle(300).end().parent('.dropdown').siblings('.dropdown').children('.dropdown-toggle').removeClass('submenu-open').next('.dropdown-menu').slideUp(300);
		});
		
		$(".blog-area .widget select, .klb-post select, .klbfooterwidget select, table.variations select" ).wrap( "<div class='custom_select'></div>" );


		$(".widget_product_categories ul.product-categories > li.cat-parent").append('<span class="subDropdown plus"></span>');
	
		$(".subDropdown")[0] && $(".subDropdown").on("click", function() {
			$(this).toggleClass("plus"), $(this).toggleClass("minus"), $(this).parent().find("ul").slideToggle()
		});


	});

	$(window).load(function(){
		$('#preloader').fadeOut('slow',function(){$(this).remove();});
	});

})(jQuery);