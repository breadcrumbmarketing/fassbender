/* global Fassbender_settings */
(function($) {
	FassbenderThemeModule.$document.on('FassbenderShopPageInit', function() {
		FassbenderThemeModule.sortByWidget();
	});

	FassbenderThemeModule.sortByWidget = function() {
		var $wcOrdering = $('.woocommerce-ordering');

		$wcOrdering.on('change', 'select.orderby', function() {
			var $form = $(this).closest('form');
			$form.find('[name="_pjax"]').remove();

			$.pjax({
				container: 'main',
				timeout  : Fassbender_settings.pjax_timeout,
				url      : '?' + $form.serialize(),
				scrollTo : false,
				renderCallback: function(context, html, afterRender) {
					context.html(html);
					afterRender();
				}
			});
		});

		$wcOrdering.on('submit', function(e) {
			e.preventDefault(e);
		});
	};

	$(document).ready(function() {
		FassbenderThemeModule.sortByWidget();
	});
})(jQuery);
