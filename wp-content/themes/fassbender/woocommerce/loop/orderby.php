<?php
/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="row mb-20">
	<div class="col-xl-6 col-lg-6 col-md-6 col-3">
		<?php if(get_theme_mod('medibazar_grid_list_view','0') == '1'){ ?>

			<div class="product-02-tab mb-20">
				<ul class="nav justify-content-start product-nav klbgridlist">
					<?php if(medibazar_shop_view() == 'list_view') { ?>
						<li class="nav-item">
							<a href="<?php echo esc_url(add_query_arg('shop_view','grid_view')); ?>" class="button-grid nav-link">
								<input type="hidden" value="grid_view">
								<i class="fas fa-th-large"></i>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo esc_url(add_query_arg('shop_view','list_view')); ?>" class="button-list nav-link active">
								<input type="hidden" value="list_view">
								<i class="fas fa-bars"></i>
							</a>
						</li>
					<?php } else { ?>
						<li class="nav-item">
							<a href="<?php echo esc_url(add_query_arg('shop_view','grid_view')); ?>" class="button-grid nav-link active">
								<input type="hidden" value="grid_view">
								<i class="fas fa-th-large"></i>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo esc_url(add_query_arg('shop_view','list_view')); ?>" class="button-list nav-link">
								<input type="hidden" value="list_view">
								<i class="fas fa-bars"></i>
							</a>
						</li>
					<?php } ?>
					<?php if(is_shop()){ ?>
						<?php wp_enqueue_script( 'medibazar-filter-toggle'); ?>
						<li class="klb-mobile-filter nav-item">
							<a class="nav-link button-filter active" data-toggle="offcanvas" href="#">
								<input type="hidden" value="grid_view">
								<i class="fas fa-filter"></i>
							</a>
						</li>
					<?php } ?>
				</ul>
			</div>
		<?php } ?>
	</div>

	<div class="col-xl-6 col-lg-6 col-md-6 col-9">
		<div class="pro-filter mb-20 f-right">
			<form class="woocommerce-ordering" method="get">
				<select name="orderby" class="orderby" aria-label="<?php esc_attr_e( 'Shop order', 'medibazar' ); ?>">
					<?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
						<option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>><?php echo esc_html( $name ); ?></option>
					<?php endforeach; ?>
				</select>
				<input type="hidden" name="paged" value="1" />
				<?php wc_query_string_form_fields( null, array( 'orderby', 'submit', 'paged', 'product-page' ) ); ?>
			</form>
		</div>
	</div>
	<div class="col-md-12">
		<?php echo medibazar_remove_klb_filter(); ?>
	</div>
</div>
