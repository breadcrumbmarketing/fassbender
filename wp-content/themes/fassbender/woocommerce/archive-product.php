<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

defined( 'ABSPATH' ) || exit;

if ( ! Fassbender_is_pjax() ) {
    get_header( 'shop' );
}
?>

<?php $breadcrumb = get_theme_mod('Fassbender_shop_breadcrumb','0'); ?>
<?php if($breadcrumb == '1'){ ?>
	<div class="klb-shop-breadcrumb breadcrumb-area pt-125 pb-125">
		<div class="container">
			<div class="klb-breadcrumb-wrapper">
				<?php if(is_product_category()){ ?>
					<div class="row">
						<div class="col-xl-12">
							<div class="breadcrumb-text">
								<h2><?php the_archive_title(); ?></h2>
							</div>
						</div>
					</div>
				<?php } elseif(is_search()){ ?>
					<div class="row">
						<div class="col-xl-12">
							<div class="breadcrumb-text">
								<h2><?php printf( esc_html__( 'Search Results for: %s', 'Fassbender' ), get_search_query() ); ?></h2>
							</div>
						</div>
					</div>
				<?php } else { ?>
					<div class="row">
						<div class="col-xl-12">
							<?php $breadcrumb_title = get_theme_mod('Fassbender_breadcrumb_title'); ?>
							<div class="breadcrumb-text">
								<?php if($breadcrumb_title){ ?>
									<h2><?php echo esc_html($breadcrumb_title); ?></h2>
								<?php } else { ?>
									<h2><?php echo esc_html_e('Products','Fassbender'); ?></h2>
								<?php } ?>
							</div>
						</div>
					</div>
					<?php woocommerce_breadcrumb(); ?>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } else { ?>
	<div class="empty-klb"></div>
<?php } ?>



<div class="sh0p-area pt-100 pb-100">
	<div class="container">
		<div class="row">
			
			<?php Fassbender_do_action( 'Fassbender_before_main_shop'); ?>

			<?php if( get_theme_mod( 'Fassbender_shop_layout' ) == 'full-width' || Fassbender_get_option() == 'full-width') { ?>
				<div class="col-xl-12 col-lg-12">
					<div class="pro-ful-tab">
						<?php do_action( 'woocommerce_before_main_content' ); ?>

						<header class="woocommerce-products-header">
							<?php do_action( 'woocommerce_archive_description' ); ?>
						</header>

						<?php
						if ( woocommerce_product_loop() ) {

							do_action( 'woocommerce_before_shop_loop' );

							woocommerce_product_loop_start();

							if ( wc_get_loop_prop( 'total' ) ) {
								while ( have_posts() ) {
									the_post();
									
									do_action( 'woocommerce_shop_loop' );

									wc_get_template_part( 'content', 'product' );
								}
							}

							woocommerce_product_loop_end();

							do_action( 'woocommerce_after_shop_loop' );
						} else {
							do_action( 'woocommerce_no_products_found' );
						}

						do_action( 'woocommerce_after_main_content' );

						?>
					</div>
				</div>
			<?php } elseif( get_theme_mod( 'Fassbender_shop_layout' ) == 'right-sidebar' || Fassbender_get_option() == 'right-sidebar') { ?>
				<div class="col-xl-9 col-lg-9">
					<div class="pro-ful-tab">
						<?php do_action( 'woocommerce_before_main_content' ); ?>

						<header class="woocommerce-products-header">
							<?php do_action( 'woocommerce_archive_description' ); ?>
						</header>

						<?php
						if ( woocommerce_product_loop() ) {

							do_action( 'woocommerce_before_shop_loop' );

							woocommerce_product_loop_start();

							if ( wc_get_loop_prop( 'total' ) ) {
								while ( have_posts() ) {
									the_post();
									
									do_action( 'woocommerce_shop_loop' );

									wc_get_template_part( 'content', 'product' );
								}
							}

							woocommerce_product_loop_end();

							do_action( 'woocommerce_after_shop_loop' );
						} else {
							do_action( 'woocommerce_no_products_found' );
						}

						do_action( 'woocommerce_after_main_content' );

						?>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 shop1-sidebar">
					<?php if ( is_active_sidebar( 'shop-sidebar' ) ) { ?>
						<?php dynamic_sidebar( 'shop-sidebar' ); ?>
					<?php } ?>
				</div>
			<?php } else { ?>
				<?php if ( is_active_sidebar( 'shop-sidebar' ) ) { ?>
					<div class="col-xl-3 col-lg-3 shop1-sidebar order-xs-2">
						<?php if ( is_active_sidebar( 'shop-sidebar' ) ) { ?>
							<?php dynamic_sidebar( 'shop-sidebar' ); ?>
						<?php } ?>
					</div>
					<div class="col-xl-9 col-lg-9 order-xs-1">
						<div class="pro-ful-tab">
							<?php do_action( 'woocommerce_before_main_content' ); ?>

							<header class="woocommerce-products-header">
								<?php do_action( 'woocommerce_archive_description' ); ?>
							</header>

							<?php
							if ( woocommerce_product_loop() ) {

								do_action( 'woocommerce_before_shop_loop' );

								woocommerce_product_loop_start();

								if ( wc_get_loop_prop( 'total' ) ) {
									while ( have_posts() ) {
										the_post();
										
										do_action( 'woocommerce_shop_loop' );

										wc_get_template_part( 'content', 'product' );
									}
								}

								woocommerce_product_loop_end();

								do_action( 'woocommerce_after_shop_loop' );
							} else {
								do_action( 'woocommerce_no_products_found' );
							}

							do_action( 'woocommerce_after_main_content' );

							?>
						</div>
					</div>
				<?php } else { ?>
					<div class="col-xl-12 col-lg-12">
						<div class="pro-ful-tab">
							<?php do_action( 'woocommerce_before_main_content' ); ?>

							<header class="woocommerce-products-header">
								<?php do_action( 'woocommerce_archive_description' ); ?>
							</header>

							<?php
							if ( woocommerce_product_loop() ) {

								do_action( 'woocommerce_before_shop_loop' );

								woocommerce_product_loop_start();

								if ( wc_get_loop_prop( 'total' ) ) {
									while ( have_posts() ) {
										the_post();
										
										do_action( 'woocommerce_shop_loop' );

										wc_get_template_part( 'content', 'product' );
									}
								}

								woocommerce_product_loop_end();

								do_action( 'woocommerce_after_shop_loop' );
							} else {
								do_action( 'woocommerce_no_products_found' );
							}

							do_action( 'woocommerce_after_main_content' );

							?>
						</div>
					</div>
				<?php } ?>
			<?php } ?>
			

			<?php Fassbender_do_action( 'Fassbender_after_main_shop'); ?>
			
		</div>
	</div>
</div>

<?php
if ( ! Fassbender_is_pjax() ) {
	get_footer( 'shop' );
}