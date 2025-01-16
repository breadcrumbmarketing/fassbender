<?php

/*************************************************
## Fassbender Get options
*************************************************/
function Fassbender_ft(){	
	$getft  = isset( $_GET['ft'] ) ? $_GET['ft'] : '';

	return esc_html($getft);
}

/* Load More */
require_once( __DIR__ . '/load-more/load-more.php' );

/* Product Data Tabs*/
require_once( __DIR__ . '/product-data/product-data-video.php' );

/* Image Zoom */
require_once( __DIR__ . '/image-zoom/image-zoom.php' );

/* Min/Max Quantity */
if(get_theme_mod('Fassbender_min_max_quantity',0) == 1){
	require_once( __DIR__ . '/minmax-quantity/minmax-quantity.php' );
}

/* Single Ajax */
require_once( __DIR__ . '/single-ajax/single-ajax.php' );

/* Recently Viewed */
if(get_theme_mod('Fassbender_recently_viewed_products',0) == 1){
	require_once( __DIR__ . '/recently-viewed/recently-viewed.php' );
}

/* Product360 View */
if(get_theme_mod('Fassbender_shop_single_product360',0) == 1){
	require_once( __DIR__ . '/product360/product360.php' );
}

/* Single Products Navigation */
if(get_theme_mod('Fassbender_products_navigation',0) == 1){
	require_once( __DIR__ . '/single-products-navigation/single-products-navigation.php' );
}

/* Min Amount */
if(get_theme_mod('Fassbender_min_order_amount_toggle',0) == 1){
	require_once( __DIR__ . '/min-amount/min-amount.php' );
}

/* Buy Now Single */
if(get_theme_mod('Fassbender_shop_single_buy_now',0) == 1 || Fassbender_ft() == 'buynow'){
	require_once( __DIR__ . '/buy-now/buy-now.php' );
}

/* Sticky Single Cart */
if(get_theme_mod('Fassbender_single_sticky_cart',0) == 1){
	require_once( __DIR__ . '/sticky-single-cart/sticky-single-cart.php' );
}

/* Notice Ajax */
if(get_theme_mod('Fassbender_shop_notice_ajax_addtocart',0) == 1 || Fassbender_ft() == 'notice_ajax'){
	require_once( __DIR__ . '/notice-ajax/notice-ajax.php' );
}

/*************************************************
## Move Review Tab outsite of tab
*************************************************/
if(get_theme_mod('Fassbender_shop_single_review_tab_move', 0) == 1 || Fassbender_ft() == 'movereviewtab'){
	add_action( 'woocommerce_after_single_product_summary', 'Fassbender_move_review_tab', 5 );
	function Fassbender_move_review_tab(){
	  comments_template();
	}

	add_filter( 'woocommerce_product_tabs', 'Fassbender_remove_product_tabs', 98 );
	function Fassbender_remove_product_tabs( $tabs ){
		unset( $tabs['reviews'] );

		return $tabs;
	}
}

/*************************************************
## Fassbender Order on WhatsApp
*************************************************/
if(get_theme_mod('Fassbender_shop_single_orderonwhatsapp', 0) == 1 || Fassbender_ft() == 'orderonwhatsapp'){
	add_action('woocommerce_single_product_summary', 'Fassbender_order_on_whatsapp', 30);
	function Fassbender_order_on_whatsapp(){
		$number = get_theme_mod('Fassbender_shop_single_whatsapp_number');
		
		echo '<div class="orderon-whatsapp">';
		echo '<a href="https://wa.me/'.esc_attr($number).'?text='.get_the_title().'" class="button c-btn">'.esc_html__('Order on WhatsApp','Fassbender-core').'</a>';
		echo '</div>';
	}
}

/*************************************************
## Product Stock Progress Bar
*************************************************/
function Fassbender_product_stock_progress_bar(){
	global $product;
	$managestock = $product->managing_stock();
	$total_sales = $product->get_total_sales();
	$stock_quantity = $product->get_stock_quantity();
		
	$output = '';

	if($managestock) {
		$progress_percentage = floor($total_sales / (($total_sales + $stock_quantity) / 100));
	}

	if($managestock) {
		$output .= '<div class="klb-stock-progress-bar">';
		$output .= '<div class="product-pcs">';
		$output .= '<div class="sold">'.esc_html__('Sold:','Fassbender-core').' <strong>'.esc_html($total_sales).'</strong></div>';
		$output .= '<div class="available">'.esc_html__('Available:','Fassbender-core').' <strong>'.esc_html($stock_quantity).'</strong></div>';
		$output .= '</div>';
		$output .= '<div class="product-progress">';
		$output .= '<span class="progress" style="width: '.$progress_percentage.'%;"></span>';
		$output .= '</div><!-- product-progress -->';
		$output .= '</div><!-- product-count -->';
	}
	
	echo $output;
		
}

/*************************************************
## Product Time Countdown
*************************************************/
function Fassbender_product_time_countdown(){		
	$id = get_the_ID();
	$sale_price_dates_from = ( $date = get_post_meta( $id, '_sale_price_dates_from', true ) ) ? date_i18n( 'Y/m/d', $date ) : '';
	$sale_price_dates_to = ( $date = get_post_meta( $id, '_sale_price_dates_to', true ) ) ? date_i18n( 'Y/m/d', $date ) : '';
		
	$output = '';

	if($sale_price_dates_to && $sale_price_dates_from <= date("Y/m/d")){
		wp_enqueue_script( 'Fassbender-counter');
		$output .= '<div class="klb-product-time-countdown product-expired">';
		$output .= '<div class="countdown" data-date="'.esc_attr($sale_price_dates_to).'">';
		$output .= '<div class="count-item days"></div>';
		$output .= '<span>:</span>';
		$output .= '<div class="count-item hours"></div>';
		$output .= '<span>:</span>';
		$output .= '<div class="count-item minutes"></div>';
		$output .= '<span>:</span>';
		$output .= '<div class="count-item second"></div>';
		$output .= '</div><!-- countdown -->';
		$output .= '<div class="expired-text">'.esc_html__('Remains until the end of the offer','Fassbender-core').'</div>';
		$output .= '</div><!-- product-expired -->';
	}
	
	echo $output;
}