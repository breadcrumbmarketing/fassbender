(function ($) {
  "use strict";

	$(document).ready(function() {
	
		var singleCartPos = $('.product-details-wrapper .single_add_to_cart_button').offset();
		var singleCartTop = $('.product-details-wrapper .single_add_to_cart_button').length && $(".Fassbender-product-bottom-popup-cart").length ? singleCartPos.top : 0;

		$(window).on("scroll", function () {

			if ( $(".Fassbender-product-bottom-popup-cart").length && $(".product-details-wrapper .single_add_to_cart_button").length ) {

				if ( $(window).scrollTop() > singleCartTop ) {
					$(".Fassbender-product-bottom-popup-cart").addClass('active');
				} else {
					$(".Fassbender-product-bottom-popup-cart").removeClass('active');
				}

			}

		});
		
	});
	
}(jQuery));