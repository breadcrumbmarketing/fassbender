(function ($) {
  "use strict";

	$(document).on('medibazarSinglePageInit', function () {
		woocommerceSingleAjax();
	});

	function woocommerceSingleAjax() {
		$("form.cart").addClass("single-ajax");
		
		// Klb Notice
		$('body').append('<div class="klb-notice-ajax"></div>');
		
		// AJax single add to cart
		$('.product:not(.product-type-external) form.cart').on('submit', function(e) {
			
			if($(document.activeElement).attr('id') == 'buynow'){
				return;
			}
			
			e.preventDefault();

			var form = $(this);
			$('form.cart button.single_add_to_cart_button').append('<svg class="loader-image preloader added" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg"><circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle></svg>')

			var formData = new FormData(form[0]);
			formData.append('add-to-cart', form.find('[name=add-to-cart]').val() );

			// Ajax action.
			$.ajax({
				url: wc_add_to_cart_params.wc_ajax_url.toString().replace( '%%endpoint%%', 'medibazar_add_to_cart' ),
				data: formData,
				type: 'POST',
				processData: false,
				contentType: false,
				complete: function( response ) {
					response = response.responseJSON;

					if ( ! response ) {
						return;
					}

					if ( response.error && response.product_url ) {
						window.location = response.product_url;
						return;
					}

					// Redirect to cart option
					if ( wc_add_to_cart_params.cart_redirect_after_add === 'yes' ) {
						window.location = wc_add_to_cart_params.cart_url;
						return;
					}

					var $thisbutton = form.find('.single_add_to_cart_button'); //
					$thisbutton = null; // uncomment this if you don't want the 'View cart' button

					// Trigger event so themes can refresh other areas.
					$( document.body ).trigger( 'added_to_cart', [ response.fragments, response.cart_hash, $thisbutton ] );
					
					$(response.fragments.notices_html).appendTo('.klb-notice-ajax').delay(3000).fadeOut(300, function(){ $(this).remove();});

					//Close icon
					$('.klb-notice-ajax .woocommerce-message, .klb-notice-ajax .woocommerce-error').append('<div class="klb-notice-close"><i class="far fa-window-close"></i></div>');
					$('.klb-notice-close').on('click', function(){
						$(this).closest('.woocommerce-message, .woocommerce-error').remove();
					});

					$('.single-product form.cart.single-ajax button svg , .pr_detail form.cart.single-ajax button svg').remove();
				}
			});
		});
	}
	
	$(document).ready(function() {
		woocommerceSingleAjax();
	});
	
}(jQuery));