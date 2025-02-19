<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>
<div class="product-area pb-100">
	<div class="container">
				
		<section class="related products">

			<?php
			$heading = apply_filters( 'woocommerce_product_related_products_heading', esc_html__( 'Related products', 'medibazar' ) );
			if ( $heading ) : ?>
				<div class="row">
                    <div class="col-xl-12">
						<h2 class="related-title"><?php echo esc_html( $heading ); ?></h2>
					</div>
				</div>
			<?php endif; ?>
			
			<?php woocommerce_product_loop_start(); ?>
				<div class="row">
				<?php foreach ( $related_products as $related_product ) : ?>

						<?php
						$post_object = get_post( $related_product->get_id() );

						setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

						wc_get_template_part( 'content', 'related-product' );
						?>

				<?php endforeach; ?>
				</div>
			<?php woocommerce_product_loop_end(); ?>

		</section>
	</div>
</div>
	<?php
endif;

wp_reset_postdata();
