<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $product_tabs ) ) : ?>
<section class="product-desc-area pb-60">
	<div class="container">
		<div class="row">
		
			<?php if(get_theme_mod('medibazar_shop_single_banner_toggle')){ ?>
			
				<div class="col-xl-8 col-lg-8 mb-30">
					<div class="woocommerce-tabs wc-tabs-wrapper">
						<div class="bakix-details-tab">
							<ul class="nav tabs wc-tabs" role="tablist">
								<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
									<li class="nav-item <?php echo esc_attr( $key ); ?>_tab" id="tab-title-<?php echo esc_attr( $key ); ?>" role="tab" aria-controls="tab-<?php echo esc_attr( $key ); ?>">
										<a class="nav-link" href="#tab-<?php echo esc_attr( $key ); ?>">
											<?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
						<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
							<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--<?php echo esc_attr( $key ); ?> panel entry-content wc-tab" id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>">
								<?php
								if ( isset( $product_tab['callback'] ) ) {
									call_user_func( $product_tab['callback'], $key, $product_tab );
								}
								?>
							</div>
						<?php endforeach; ?>

						<?php do_action( 'woocommerce_product_after_tabs' ); ?>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4">
					<div class="product-desc-imgmb-30">
						<?php $bannerimage = get_theme_mod( 'medibazar_shop_single_banner_img'); ?>
						<?php if($bannerimage){ ?>
							<a href="<?php echo esc_url(get_theme_mod('medibazar_shop_single_banner_url')); ?>">
								<img src="<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'medibazar_shop_single_banner_img' )) ); ?>" alt="<?php esc_attr_e('banner','medibazar'); ?>">
							</a>
						<?php } ?>
					</div>
				</div>
				
			<?php } else { ?>
			
				<div class="col-lg-12 mb-30">
					<div class="woocommerce-tabs wc-tabs-wrapper">
						<div class="bakix-details-tab">
							<ul class="nav tabs wc-tabs" role="tablist">
								<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
									<li class="nav-item <?php echo esc_attr( $key ); ?>_tab" id="tab-title-<?php echo esc_attr( $key ); ?>" role="tab" aria-controls="tab-<?php echo esc_attr( $key ); ?>">
										<a class="nav-link" href="#tab-<?php echo esc_attr( $key ); ?>">
											<?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
						<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
							<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--<?php echo esc_attr( $key ); ?> panel entry-content wc-tab" id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>">
								<?php
								if ( isset( $product_tab['callback'] ) ) {
									call_user_func( $product_tab['callback'], $key, $product_tab );
								}
								?>
							</div>
						<?php endforeach; ?>

						<?php do_action( 'woocommerce_product_after_tabs' ); ?>
					</div>
				</div>
				
			<?php } ?>
			
		</div>
	</div>
</section>
<?php endif; ?>
