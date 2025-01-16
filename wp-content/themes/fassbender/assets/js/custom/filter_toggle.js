(function ($) {
  "use strict";

	$(document).on('FassbenderShopPageInit', function () {
		if ($("body").hasClass("toggled")) {
			$('body').removeClass('toggled');
		}
		
		$('[data-toggle="offcanvas"]').on('click', function () {
			$('body').toggleClass('toggled');
		});  
 
	});

	$(document).ready(function () {

		$('[data-toggle="offcanvas"]').on('click', function () {
			$('body').toggleClass('toggled');
		});  
	
	});

})(jQuery);
