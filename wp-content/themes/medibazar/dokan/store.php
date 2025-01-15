<?php
/**
 * The Template for displaying all single posts.
 *
 * @package dokan
 * @package dokan - 2014 1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$store_user   = dokan()->vendor->get( get_query_var( 'author' ) );
$store_info   = $store_user->get_shop_info();
$map_location = $store_user->get_location();

get_header( 'shop' );

if ( function_exists( 'yoast_breadcrumb' ) ) {
    yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
}
?>
    <?php do_action( 'woocommerce_before_main_content' ); ?>

<div class="empty-klb"></div>
<div class="sh0p-area pt-100 pb-100">
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-lg-3 shop1-sidebar">
				<?php dokan_get_template_part( 'store', 'sidebar', array( 'store_user' => $store_user, 'store_info' => $store_info, 'map_location' => $map_location ) ); ?>
			</div>
			<div class="col-xl-9 col-lg-9">
				<div class="pro-ful-tab">
			
					<div id="dokan-primary" class="dokan-single-store dokan-w8">
						<div id="dokan-content" class="store-page-wrap woocommerce" role="main">

							<?php dokan_get_template_part( 'store-header' ); ?>

							<?php do_action( 'dokan_store_profile_frame_after', $store_user->data, $store_info ); ?>

							<?php if ( have_posts() ) { ?>

								<div class="seller-items">

									<?php woocommerce_product_loop_start(); ?>

										<?php while ( have_posts() ) : the_post(); ?>

											<?php wc_get_template_part( 'content', 'product' ); ?>

										<?php endwhile; // end of the loop. ?>

									<?php woocommerce_product_loop_end(); ?>

								</div>

								<?php dokan_content_nav( 'nav-below' ); ?>

							<?php } else { ?>

								<p class="dokan-info"><?php esc_html_e( 'No products were found of this vendor!', 'medibazar' ); ?></p>

							<?php } ?>
						</div>

					</div><!-- .dokan-single-store -->
				</div>
			</div>
		</div>
	</div>
</div>
<div class="dokan-clearfix"></div>

    <?php do_action( 'woocommerce_after_main_content' ); ?>

<?php get_footer( 'shop' ); ?>
