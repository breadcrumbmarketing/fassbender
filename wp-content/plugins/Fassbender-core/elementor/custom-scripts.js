/* KLB Addons for Elementor v1.0 */

jQuery.noConflict();
!(function ($) {
	"use strict";
	
	/* DATA BACKGROUND */
	function klbbackground_bg($scope, $) {
		$("[data-background]").each(function () {
			$(this).css("background-image", "url(" + $(this).attr("data-background") + ")")
		});
	}

	
	/* OWL CAROUSEL */
	function klbowlcarousel($scope, $) {
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
	}
	
	/* HOME SLIDER */
	function klbhomeslider($scope, $) {
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
	}
	
	/* HOME SLIDER 2*/
	function klbhomeslider2($scope, $) {
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
	}

	/* Data BG Color */
	function klbdatabgcolor($scope, $) {
		$("[data-bg-color]").each(function () {
			$(this).css("background", $(this).attr("data-bg-color"))
		})
	}
	
	// COUNTDOWN
	function klbdatacountdown($scope, $) {
		$('[data-countdown]').each(function () {
			var $this = $(this), finalDate = $(this).data('countdown');
			$this.countdown(finalDate, function (event) {
				$this.html(event.strftime('<div class="time-count">%D <span>' + $(this).data('days') + '</span></div><div class="time-count">%H <span>' + $(this).data('hour') + '</span></div><div class="time-count">%M <span>' + $(this).data('minute') + '</span></div><div class="time-count">%S <span>' + $(this).data('second') + '</span></div>'));
			});
		});
	}
	
	// TESTIMONIAL
	function klbtestimonial($scope, $) {
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
	}
	
	// TESTIMONIAL
	function klbcounter($scope, $) {
		//===== counter up
		if ( $scope.find( '.counter' ) ){
			$scope.find( '.counter' ).counterUp({
				delay: 10,
				time: 1000
			});
		}
	}

	

    jQuery(window).on('elementor/frontend/init', function () {


		
        elementorFrontend.hooks.addAction('frontend/element_ready/Fassbender-hero-slider.default', klbbackground_bg);
        elementorFrontend.hooks.addAction('frontend/element_ready/Fassbender-deal-products.default', klbdatabgcolor);
        elementorFrontend.hooks.addAction('frontend/element_ready/Fassbender-deal-products.default', klbdatacountdown);

        elementorFrontend.hooks.addAction('frontend/element_ready/Fassbender-testimonial.default', klbtestimonial);
        elementorFrontend.hooks.addAction('frontend/element_ready/Fassbender-counter-box.default', klbcounter);
        elementorFrontend.hooks.addAction('frontend/element_ready/Fassbender-single-banner.default', klbbackground_bg);
        elementorFrontend.hooks.addAction('frontend/element_ready/Fassbender-home-slider.default', klbhomeslider);
        elementorFrontend.hooks.addAction('frontend/element_ready/Fassbender-home-slider-2.default', klbhomeslider2);
        elementorFrontend.hooks.addAction('frontend/element_ready/Fassbender-home-slider-2.default', klbbackground_bg);
        elementorFrontend.hooks.addAction('frontend/element_ready/Fassbender-deal-banner.default', klbbackground_bg);
        elementorFrontend.hooks.addAction('frontend/element_ready/Fassbender-deal-banner.default', klbdatacountdown);

    });

})(jQuery);
