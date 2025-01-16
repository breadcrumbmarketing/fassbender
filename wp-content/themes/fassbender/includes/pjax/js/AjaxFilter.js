(function($) {

	medibazarThemeModule.ajaxLinks = '.widget_klb_product_categories a, .widget_product_status a, .remove-filter a, .widget_layered_nav a, .klbgridlist a, .woocommerce-pagination a';

	medibazarThemeModule.ajaxFilters = function() {

		medibazarThemeModule.$document.pjax(medibazarThemeModule.ajaxLinks, 'main', {
			timeout       : 5000,
			scrollTo      : false,
			renderCallback: function(context, html, afterRender) {
				context.html(html);
				afterRender();
			}
		});

		medibazarThemeModule.$document.on('submit', '.widget_price_filter form', function(event) {
			$.pjax.submit(event, 'main');
			medibazarThemeModule.$document.trigger('medibazarShopPageInit');
		});



		medibazarThemeModule.$document.on('pjax:error', function(xhr, textStatus, error) {
			console.log('pjax error ' + error);
		});

		medibazarThemeModule.$document.on('pjax:start', function() {

			scrollToTop(false);

			var $siteContent = $('main');

			$siteContent.removeClass('ajax-loaded');
			$siteContent.addClass('ajax-loading');
			$(".product-tab-content, nav.woocommerce-pagination").hide();
			$('.product-tab-content').before('<svg class="loader-image preloader" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg"><circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle></svg></div>');
		});

		medibazarThemeModule.$document.on('pjax:complete', function() {

			$('main').removeClass('ajax-loading');

			$('.loader-image.preloader').remove();
			
			medibazarThemeModule.$document.trigger('medibazarShopPageInit');
			
			$('.site-overlay').removeClass('active');
			$(".site-overlay").css({"opacity": "0", "visibility": "hidden"});

		});


		medibazarThemeModule.$document.on('pjax:end', function() {

			scrollToTop(false);

			var $siteContent = $('main');

			$siteContent.removeClass('ajax-loading');
			$siteContent.addClass('ajax-loaded');
			
		});

		var scrollToTop = function(type) {
			if (medibazar_settings.ajax_scroll === 'no' && type === false) {
				return false;
			}

			var $scrollTo = $(medibazar_settings.ajax_scroll_class),
			    scrollTo  = $scrollTo.offset().top - medibazar_settings.ajax_scroll_offset;

			$('html, body').stop().animate({
				scrollTop: scrollTo
			}, 400);
		};
	};

	$(document).ready(function() {
		medibazarThemeModule.ajaxFilters();
	});
})(jQuery);
