<?php
/*************************************************
## Scripts
*************************************************/
function medibazar_sticky_single_cart_scripts() {
	wp_enqueue_script( 'klb-sticky-single-cart',   plugins_url( 'js/sticky-single-cart.js', __FILE__ ), false, '1.0');
	wp_enqueue_style( 'klb-sticky-single-cart',   plugins_url( 'css/sticky-single-cart.css', __FILE__ ), false, '1.0');
}
add_action( 'wp_enqueue_scripts', 'medibazar_sticky_single_cart_scripts' );


/*************************************************
## Sticky add to cart Function
*************************************************/

if ( ! function_exists( 'medibazar_sticky_single_cart' ) ) {
    function medibazar_sticky_single_cart()
    {
        global $product;
		
		if ( !is_product() || $product->is_type( 'grouped' ) || '0' == medibazar_ft( 'medibazar_sticky_single_cart', '1' ) ) {
            return;
        }

        ?>
        <div id="product-bottom-<?php the_ID(); ?>" <?php wc_product_class( 'medibazar-product-bottom-popup-cart', $product ); ?>>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 d-none d-md-flex">
                        <div class="medibazar-product-bottom-details">
                            <?php echo get_the_post_thumbnail( $product->get_id(), array(60,60,true) ); ?>
                            <div class="medibazar-product-bottom-title">
                                <?php echo get_the_title( $product->get_id() ); ?>
                                <?php woocommerce_template_loop_price(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
						<?php
                        if ( $product->is_type( 'simple' ) ) {
                            woocommerce_template_single_add_to_cart();
                        } else {
                            echo '<div class="medibazar-popup-cart-to-top"><a href="#product-'.$product->get_id().'" class="single_add_to_cart_button button alt">'.esc_html__( 'Add to cart', 'medibazar' ).'</a></div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
add_action( 'medibazar_before_main_footer', 'medibazar_sticky_single_cart', 10 );