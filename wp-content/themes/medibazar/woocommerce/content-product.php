<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Check if the product is a valid WooCommerce product and ensure its visibility before proceeding.
if ( ! is_a( $product, WC_Product::class ) || ! $product->is_visible() ) {
	return;
}
?>

<?php if(wc_get_loop_prop( 'columns' ) == '2'){ ?>
   <?php $column = '6'; ?>
<?php }elseif(wc_get_loop_prop( 'columns' ) == '4'){ ?>
   <?php $column = '3'; ?>
<?php } elseif(wc_get_loop_prop( 'columns' ) == '6'){ ?>
   <?php $column = '2'; ?>
<?php } else { ?>
   <?php $column = '4'; ?>
<?php } ?>

<?php if(get_theme_mod( 'medibazar_shop_mobile_column' ) == '3columns'){ ?>
   <?php $mobilecolumn = '4'; ?>
<?php } elseif(get_theme_mod( 'medibazar_shop_mobile_column' ) == '2columns'){ ?>
   <?php $mobilecolumn = '6'; ?>
<?php } else { ?>
   <?php $mobilecolumn = '12'; ?>
<?php } ?>

<?php $postview  = isset( $_POST['shop_view'] ) ? $_POST['shop_view'] : ''; ?>

<?php if(medibazar_shop_view() == 'list_view' || get_theme_mod('medibazar_view_type') == 'list-view' || $postview == 'list_view' && medibazar_shop_view() != 'grid_view') { ?>
	<div <?php wc_product_class( 'klb-product col-12 col-md-12', $product ); ?>>
<?php } else { ?>
	<div <?php wc_product_class( 'klb-product col-xl-'.esc_attr($column).' cl-lg-'.esc_attr($column).' col-'.$mobilecolumn.' col-md-6', $product ); ?>>
<?php } ?>

	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	do_action( 'woocommerce_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_after_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_after_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item' );
	?>
</div>
