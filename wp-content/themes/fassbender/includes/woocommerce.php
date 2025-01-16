<?php

/*************************************************
## Woocommerce 
*************************************************/

if ( class_exists( 'woocommerce' ) ) {
add_theme_support( 'woocommerce' );
add_image_size('Fassbender-woo-product', 450, 450, true);

// Remove woocommerce defauly styles
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

// hide default shop title anasayfadaki title gizlemek i�in
add_filter('woocommerce_show_page_title', 'Fassbender_override_page_title');
function Fassbender_override_page_title() {
return false;
}

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 ); /*remove result count above products*/
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 ); //remove rating
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 ); //remove rating
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title',10);

add_action( 'woocommerce_before_shop_loop_item', 'Fassbender_shop_thumbnail', 10);
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 ); /*remove breadcrumb*/

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products',20);
remove_action( 'woocommerce_after_single_product', 'woocommerce_output_related_products',10);
add_action( 'woocommerce_after_single_product_summary', 'Fassbender_related_products', 20);

function Fassbender_related_products(){
    woocommerce_related_products( array('posts_per_page' => 3));
}

/*************************************************
## Product Badge
*************************************************/
add_action('woocommerce_product_thumbnails','Fassbender_sale_percentage',20);	
function Fassbender_sale_percentage(){
	global $product;

	$output = '';

	$badge = get_post_meta( get_the_ID(), 'klb_product_badge', true );

	if ( $product->is_on_sale() && $product->is_type( 'variable' ) ) {
		$percentage = '-'.ceil(100 - ($product->get_variation_sale_price() / $product->get_variation_regular_price( 'min' )) * 100);
		$output .= '<div class="product-badges"><span class="badge onsale">'.$percentage.'%</span></div>';
	} elseif( $product->is_on_sale() && $product->get_regular_price()  && !$product->is_type( 'grouped' )) {
		$percentage = '-'.ceil(100 - ($product->get_sale_price() / $product->get_regular_price()) * 100);
		$output .= '<div class="product-badges">';
		$output .= '<span class="badge onsale">'.$percentage.'%</span>';
		$output .= '</div>';
	}
	
	echo $output;

}

/*************************************************
## Wishlist Shortcode
*************************************************/
function Fassbender_wishlist_shortcode(){
	$output = '';
	
	$wishlist = get_theme_mod( 'Fassbender_wishlist_button', '0' );
	
	if($wishlist == '1' && function_exists('run_tinv_wishlist')){
	$output .= do_shortcode('[ti_wishlists_addtowishlist]');
	}

	return $output;
}

/*----------------------------
  Single Featured List
 ----------------------------*/

add_action( 'woocommerce_single_product_summary', 'Fassbender_featured_list', 25);
function Fassbender_featured_list(){
	$featured = get_theme_mod( 'Fassbender_featured_listem' );
	$output = '';
	
	if( !empty( $featured ) ) {
        $output .= '<div class="product_sort_info">';
        $output .= '<ul>';
		foreach($featured as $f){			
			$output .= '<li><i class="'.esc_attr($f["featured_icon"]).'"></i>'.esc_html($f["featured_text"]).'</li>';
		}
	
		$output .= '</ul></div>';
	}
	
	echo Fassbender_sanitize_data($output);
}


function Fassbender_product_image(){
	if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) {
		$att=get_post_thumbnail_id();
		$image_src = wp_get_attachment_image_src( $att, 'full' );
		$image_src = $image_src[0];

		$size = get_theme_mod( 'Fassbender_product_image_size', array( 'width' => '', 'height' => '') );

		if($size['width'] && $size['height']){
			$image = Fassbender_resize( $image_src, $size['width'], $size['height'], true, true, true );  
		} else {
			$image = $image_src;
		}
		
		return esc_url($image);
	} else {
		return wc_placeholder_img_src('');
	}
}

/*************************************************
## Re-order WooCommerce Single Product Summary
*************************************************/
$reorder_single = get_theme_mod( 'Fassbender_shop_single_reorder', 
	array( 
		'woocommerce_template_single_title', 
		'woocommerce_template_single_rating', 
		'woocommerce_template_single_price', 
		'woocommerce_template_single_excerpt', 
		'woocommerce_template_single_add_to_cart', 
		'woocommerce_template_single_meta', 
		'Fassbender_social_share', 
		
	) 
);

if($reorder_single){
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
	remove_action( 'woocommerce_single_product_summary', 'Fassbender_social_share', 70);
	
	$count = 7;
	
	foreach ( $reorder_single as $single_part ) {
		
		add_action( 'woocommerce_single_product_summary', $single_part, $count );
		
		$count+=7;
	}
}


/*----------------------------
  Product Type 1
 ----------------------------*/
function Fassbender_product_type1(){
	global $product;
	global $post;
	global $woocommerce;
	
	$output = '';
	
	$id = get_the_ID();
	$allproduct = wc_get_product( get_the_ID() );
	
	$att=get_post_thumbnail_id();
	$image_src = wp_get_attachment_image_src( $att, 'full' );
	if($image_src){
	$image_src = $image_src[0];
	}

	$size = get_theme_mod( 'Fassbender_product_image_size', array( 'width' => '', 'height' => '') );

	if($size['width'] && $size['height']){
		$imageresize = Fassbender_resize( $image_src, $size['width'], $size['height'], true, true, true );  
	} else {
		$imageresize = $image_src;
	}

	$cart_url = wc_get_cart_url();
	$price = $allproduct->get_price_html();
	$weight = $product->get_weight();
	$stock_status = $product->get_stock_status();
	$stock_text = $product->get_availability();
	$rating = wc_get_rating_html($product->get_average_rating());
	$ratingcount = $product->get_review_count();
	$wishlist = get_theme_mod( 'Fassbender_wishlist_button', '0' );
	$compare = get_theme_mod( 'Fassbender_compare_button', '0' );
	$quickview = get_theme_mod( 'Fassbender_quick_view_button', '0' );

	$postview  = isset( $_POST['shop_view'] ) ? $_POST['shop_view'] : '';
	
	if(Fassbender_shop_view() == 'list_view' || get_theme_mod('Fassbender_view_type') == 'list-view' || $postview == 'list_view' && Fassbender_shop_view() != 'grid_view') { 
		$output .= '<div class="row klb-product">';
		$output .= '<div class="col-xl-4 col-lg-4 ">';
		$output .= '<div class="product mb-30">';
		$output .= '<div class="product-img">';
		$output .= '<a href="'.get_permalink().'" title="'.the_title_attribute( 'echo=0' ).'"><img src="'.esc_url($image_src).'" alt="'.the_title_attribute( 'echo=0' ).'"></a>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '<div class="col-xl-8 col-lg-8">';
		$output .= '<div class="product-list-content mb-30">';
		$output .= '<div class="product-text pro-tab-info">';
		$output .= '<h4><a href="'.get_permalink().'" title="'.the_title_attribute( 'echo=0' ).'">'.get_the_title().'</a></h4>';
		$output .= '<span>'.$price.'</span>';
		$output .= '</div>';
		$output .= '<p>'.Fassbender_limit_words(get_the_excerpt(), '30').'</p>';
		$output .= '<div class="product-action product-02-action">';
		
		$output .= Fassbender_wishlist_shortcode();
		
		$output .= Fassbender_add_to_cart_button();	

		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
	} else {
		$output .= '<div class="product-03-wrapper grey-2-bg pos-rel text-center mb-30">';
		if ( $product->is_on_sale() && $product->is_type( 'variable' ) ) {
		$percentage = '-'.ceil(100 - ($product->get_variation_sale_price() / $product->get_variation_regular_price( 'min' )) * 100);
		$output .= '<div class="badge-tag">';
		$output .= '<span class="product-tag pro-tag hot-1">'.$percentage.'%</span>';
		$output .= '</div>';
		} elseif( $product->is_on_sale() && $product->get_regular_price()  && !$product->is_type( 'grouped' )) {
		$output .= '<div class="badge-tag">';
		$output .= '<span class="product-tag pro-tag hot-1">-'.ceil(100 - ($product->get_sale_price() / $product->get_regular_price()) * 100).'%</span>';
		$output .= '</div>';
		}
		$output .= '<div class="product-02-img pos-rel">';
		$output .= '<a href="'.get_permalink().'">';
		$output .= '<img src="'.Fassbender_product_image().'" alt="product_img1">';
		$output .= '</a>';
		$output .= '<div class="product-action">';
		
		$output .= Fassbender_wishlist_shortcode();
		
		$output .= Fassbender_add_to_cart_button();
		if($quickview == '1'){
		$output .= '<a href="'.$product->get_id().'" class="action-btn button detail-bnt"><i class="far fa-search"></i></a>';
		}
		$output .= '</div>';
		$output .= '</div>';
		$output .= '<div class="product-text">';
		$output .= '<h4><a href="'.get_permalink().'">'.get_the_title().'</a></h4>';
		$output .= $price;
		$output .= '</div>';
		$output .= '</div>';
	}

	
	return $output;
}

/*----------------------------
  Product Type 2
 ----------------------------*/
function Fassbender_product_type2(){
	global $product;
	global $post;
	global $woocommerce;

	$output = '';

	$id = get_the_ID();
	$allproduct = wc_get_product( get_the_ID() );
	
	$att=get_post_thumbnail_id();
	$image_src = wp_get_attachment_image_src( $att, 'full' );
	$image_src = $image_src[0];
	$imageresize = Fassbender_resize( $image_src, 304, 173, true, true, true );

	$cart_url = wc_get_cart_url();
	$price = $allproduct->get_price_html();
	$weight = $product->get_weight();
	$stock_status = $product->get_stock_status();
	$stock_text = $product->get_availability();
	$rating = wc_get_rating_html($product->get_average_rating());
	$ratingcount = $product->get_review_count();
	$wishlist = get_theme_mod( 'Fassbender_wishlist_button', '0' );
	$compare = get_theme_mod( 'Fassbender_compare_button', '0' );
	$quickview = get_theme_mod( 'Fassbender_quick_view_button', '0' );
			
	$output .= '<div class="klb-product2 product_box text-center">';
	$output .= '<div class="product_img">';
	$output .= '<a href="'.get_permalink().'">';
	$output .= '<img src="'.esc_url($image_src).'" alt="product_img1">';
	$output .= '</a>';
	$output .= '<div class="product_action_box">';
	$output .= '<ul class="list_none pr_action_btn">';
	if($compare == '1'){
	$output .= '<li>'.do_shortcode('[yith_compare_button]').'</li>';
	}
	if($quickview == '1'){
	$output .= '<li><a href="'.$product->get_id().'" class="button detail-bnt"><i class="icon-magnifier-add"></i></a></li>';
	}
	
	$output .= Fassbender_wishlist_shortcode();
	
	$output .= '</ul>';
	$output .= '</div>';
	$output .= '</div>';
	$output .= '<div class="product_info">';
	$output .= '<h6 class="product_title"><a href="'.get_permalink().'">'.get_the_title().'</a></h6>';
	$output .= '<div class="product_price">';
	$output .= $price;
	$output .= '</div>';
	$output .= '<div class="rating_wrap">';
	$output .= $rating;
	if($ratingcount){
	$output .= '<span class="rating_num">('.esc_html($ratingcount).')</span>';
	}
	$output .= '</div>';
	$output .= '<div class="pr_desc">';
	$output .= '<p>'.get_the_excerpt().'</p>';
	$output .= '</div>';
	$output .= '<div class="list_product_action_box">';
	$output .= '<ul class="list_none pr_action_btn">';
	$output .= '<li class="add-to-cart">'.Fassbender_add_to_cart_button().'</li>';
	if($compare == '1'){
	$output .= '<li>'.do_shortcode('[yith_compare_button]').'</li>';
	}
	if($quickview == '1'){
	$output .= '<li><a href="'.$product->get_id().'" class="button detail-bnt"><i class="icon-magnifier-add"></i></a></li>';
	}
	
	$output .= Fassbender_wishlist_shortcode();
	
	$output .= '</ul>';
	$output .= '</div>';
	
	$output .= '<div class="add-to-cart">';
	$output .= Fassbender_add_to_cart_button();
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</div>';
	
	return $output;
}


/*----------------------------
  Add my owns
 ----------------------------*/
function Fassbender_shop_thumbnail () {
	

	if(get_theme_mod('Fassbender_product_type') == 'type3'){
		
		echo Fassbender_product_type3();

	}elseif(get_theme_mod('Fassbender_product_type') == 'type2'){
		
		echo Fassbender_product_type2();
		
	} else {
		
		echo Fassbender_product_type1();
		
	}

}

/*************************************************
## Woocommerce Cart Text
*************************************************/

//add to cart button
function Fassbender_add_to_cart_button(){
	global $product;
	$output = '';

	ob_start();
	woocommerce_template_loop_add_to_cart();
	$output .= ob_get_clean();

	if(!empty($output)){
		$pos = strpos($output, ">");
		
		if ($pos !== false) {
		    $output = substr_replace($output,">", $pos , strlen(1));
		}
	}
	
	if($product->get_type() == 'variable' && empty($output)){
		$output = "<a class='btn btn-primary add-to-cart cart-hover' href='".get_permalink($product->id)."'>".esc_html__('Select options','Fassbender')."</a>";
	}

	if($product->get_type() == 'simple'){
		$output .= "";
	} else {
		$btclass  = "single_bt";
	}
	
	if($output) return "$output";
}



/*************************************************
## Woo Cart Ajax
*************************************************/ 

add_filter('woocommerce_add_to_cart_fragments', 'Fassbender_header_add_to_cart_fragment');
function Fassbender_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	?>
	
	<span class="cart-count"> <?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'Fassbender'), $woocommerce->cart->cart_contents_count);?> </span>
	

	<?php
	$fragments['span.cart-count'] = ob_get_clean();

	return $fragments;
}

add_filter( 'woocommerce_add_to_cart_fragments', function($fragments) {

    ob_start();
    ?>

    <div class="fl-mini-cart-content">
        <?php woocommerce_mini_cart(); ?>
    </div>

    <?php $fragments['div.fl-mini-cart-content'] = ob_get_clean();

    return $fragments;

} );

/*************************************************
## Fassbender Woo Search Form
*************************************************/ 

add_filter( 'get_product_search_form' , 'Fassbender_custom_product_searchform' );

function Fassbender_custom_product_searchform( $form ) {

	$form = '<form class="header-search-form" action="' . esc_url( home_url( '/'  ) ) . '" role="search" method="get" id="searchform">
				<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'.esc_attr__('Search','Fassbender').'">
				<button type="submit"><i class="far fa-search"></i></button>
                <input type="hidden" name="post_type" value="product" />
			</form>';

	return $form;
}

function Fassbender_header_product_search() {

	$form = '<form class="header-search-form" action="' . esc_url( home_url( '/'  ) ) . '" role="search" method="get" id="searchform">
				<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'.esc_attr__('Suche','Fassbender').'">
				<button type="submit"><i class="far fa-search"></i></button>
                <input type="hidden" name="post_type" value="product" />
			</form>';

	return $form;
}





/*************************************************
## Fassbender Gallery Thumbnail Size
*************************************************/ 
add_filter( 'woocommerce_get_image_size_gallery_thumbnail', function( $size ) {
    return array(
        'width' => 90,
        'height' => 54,
        'crop' => 0,
    );
} );


/*************************************************
## Quick View Scripts
*************************************************/ 

function Fassbender_quick_view_scripts() {
  	wp_enqueue_script( 'Fassbender-quick-ajax', get_template_directory_uri() . '/assets/js/custom/quick_ajax.js', array('jquery'), '1.0.0', true );
	wp_localize_script( 'Fassbender-quick-ajax', 'MyAjax', array(
		'ajaxurl' => esc_url(admin_url( 'admin-ajax.php' )),
	));
  
}
add_action( 'wp_enqueue_scripts', 'Fassbender_quick_view_scripts' );

/*************************************************
## Quick View CallBack
*************************************************/ 

add_action( 'wp_ajax_nopriv_quick_view', 'Fassbender_quick_view_callback' );
add_action( 'wp_ajax_quick_view', 'Fassbender_quick_view_callback' );
function Fassbender_quick_view_callback() {

	global $wpdb,$post; // this is how you get access to the database
	$id = intval( $_POST['id'] );
	$loop = new WP_Query( array(
		'post_type' => 'product',
		'p' => $id,
	  )
	);
	
	while ( $loop->have_posts() ) : $loop->the_post(); 
	$product = new WC_Product(get_the_ID());
	
	$rating = wc_get_rating_html($product->get_average_rating());
	$price = $product->get_price_html();
	$rating_count = $product->get_rating_count();
	$review_count = $product->get_review_count();
	$average      = $product->get_average_rating();
	$product_image_ids = $product->get_gallery_attachment_ids();

	$output = '';
 
			
		$output .= '<div class="ajax_quick_view product">';
		$output .= '<div class="row">';
		if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) {
			$count = 0;
			$number = 0;
			
			$att=get_post_thumbnail_id();
			$image_src = wp_get_attachment_image_src( $att, 'full' );
			$image_src = $image_src[0];
			$output .= '<div class="col-lg-6 col-md-6 mb-4 mb-md-0">';
			
			$output .= '<div class="shop-thumb-tab">';
			$output .= '<ul class="nav" id="myTab2" role="tablist">';
			
			$output .= '<li class="nav-item">';
			$output .= '<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-selected="true">';
			$output .= '<img src="'.esc_url($image_src).'" alt="'.the_title_attribute( 'echo=0' ).'">';
			$output .= '</a>';
			$output .= '</li>';
			
			foreach( $product_image_ids as $product_image_id ){
				$image_url = wp_get_attachment_url( $product_image_id );
				if($count < 2){
				$output .= '<li class="nav-item">';
				$output .= '<a class="nav-link " id="home'.esc_attr($count).'-tab" data-toggle="tab" href="#home'.esc_attr($count).'" role="tab" aria-selected="false">';
				$output .= '<img src="'.esc_url($image_url).'" alt="'.the_title_attribute( 'echo=0' ).'">';
				$output .= '</a>';
				$output .= '</li>';
				}
				$count++;
			}

			$output .= '</ul>';
			$output .= '</div>';
			
			$output .= '<div class="product-details-img">';
			$output .= '<div class="tab-content" id="myTabContent2">';
			
				$output .= '<div class="tab-pane fade show active" id="home" role="tabpanel">';
				$output .= '<div class="product-large-img">';
				$output .= '<img src="'.esc_url($image_src).'" alt="'.the_title_attribute( 'echo=0' ).'">';
				$output .= '</div>';
				$output .= '</div>';
			
			foreach( $product_image_ids as $product_image_id ){
				$image_url = wp_get_attachment_url( $product_image_id );
				if($number < 2 ){
				$output .= '<div class="tab-pane fade show " id="home'.esc_attr($number).'" role="tabpanel">';
				$output .= '<div class="product-large-img">';
				$output .= '<img src="'.esc_url($image_url).'" alt="'.the_title_attribute( 'echo=0' ).'">';
				$output .= '</div>';
				$output .= '</div>';
				}
				$number++;
			}

			$output .= '</div>';
			$output .= '</div>';
			
			

			$output .= '</div>';
		}
		
		$output .= '<div class="col-lg-6 col-md-6">';
		$output .= '<div class="pr_detail">';
		$output .= '<div class="product_description">';
		$output .= '<h4 class="product_title"><a href="'.get_permalink().'" title="'.the_title_attribute( 'echo=0' ).'">'.get_the_title().'</a></h4>';
		$output .= '<div class="product_price">';
		$output .= $price;
		$output .= '</div>';
		$output .= '<div class="rating_wrap">';
		$output .= $rating;
		if($ratingcount){
		$output .= '<span class="rating_num">('.$review_count.')</span>';
		}
		$output .= '</div>';
		$output .= '<div class="pr_desc">';
		$output .= '<p>'.get_the_excerpt().'</p>';
		$output .= '</div>';

		$output .= '</div>';
		$output .= '<hr />';
		$output .= '<div class="cart_extra">';
		$output .= '<div class="cart_btn">';
		ob_start();
		woocommerce_template_single_add_to_cart();
		$output .= ob_get_clean();
		$output .= '</div>';
		$output .= '</div>';
		$output .= '<hr />';
		ob_start();
		woocommerce_template_single_meta();
		$output .= ob_get_clean();
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';



		endwhile; 
		wp_reset_postdata();

	 	$output_escaped = $output;
	 	echo $output_escaped;
		
		wp_die();

}

/*************************************************
## Fassbender Filter by Attribute
*************************************************/ 
function Fassbender_woocommerce_layered_nav_term_html( $term_html, $term, $link, $count ) { 

	$attribute_label_name = wc_attribute_label($term->taxonomy);;
	$attribute_id = wc_attribute_taxonomy_id_by_name($attribute_label_name);
	$attr  = wc_get_attribute($attribute_id);
	$array = json_decode(json_encode($attr), true);

	if(in_array('color',$array)){
		$color = get_term_meta( $term->term_id, 'product_attribute_color', true );
		$term_html = '<div class="type-color"><span class="color-box" style="background-color:'.esc_attr($color).';"></span>'.$term_html.'</div>';
	}
	
	if(in_array('button',$array)){
		$term_html = '<div class="type-button"><span class="button-box"></span>'.$term_html.'</div>';
	}

    return $term_html; 
}; 
         
add_filter( 'woocommerce_layered_nav_term_html', 'Fassbender_woocommerce_layered_nav_term_html', 10, 4 ); 


/*************************************************
## Stock Availability Translation
*************************************************/ 

if(get_theme_mod('Fassbender_stock_quantity',0) != 1){
add_filter( 'woocommerce_get_availability', 'Fassbender_custom_get_availability', 1, 2);
	function Fassbender_custom_get_availability( $availability, $_product ) {
		
		// Change In Stock Text
		if ( $_product->is_in_stock() ) {
			$availability['availability'] = esc_html__('In Stock', 'Fassbender');
		}
		// Change Out of Stock Text
		if ( ! $_product->is_in_stock() ) {
			$availability['availability'] = esc_html__('Out of stock', 'Fassbender');
		}
		return $availability;
	}
}

/*************************************************
## Archive Description After Content
*************************************************/
if(get_theme_mod('Fassbender_category_description_after_content',0) == 1){
	remove_action('woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10);
	remove_action('woocommerce_archive_description', 'woocommerce_product_archive_description', 10);
	add_action('Fassbender_after_main_shop', 'woocommerce_taxonomy_archive_description', 5);
	add_action('Fassbender_after_main_shop', 'woocommerce_product_archive_description', 5);
}

/*************************************************
## Catalog Mode - Disable Add to cart Button
*************************************************/
if(get_theme_mod('Fassbender_catalog_mode', 0) == 1 || Fassbender_get_option() == 'catalogmode'){ 
	add_filter( 'woocommerce_loop_add_to_cart_link', 'Fassbender_remove_add_to_cart_buttons', 1 );
	function Fassbender_remove_add_to_cart_buttons() {
		return false;
	}
}

} // is woocommerce activated


?>