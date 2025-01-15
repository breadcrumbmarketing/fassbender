<?php
if ( ! function_exists( 'medibazar_main_footer_function' ) ) {
	function medibazar_main_footer_function(){
		
	?>
			<?php if(get_theme_mod('medibazar_top_footer_text')){ ?>
				<div class="instagram-area pl-130 pr-130">
					<div class="container-fluid">
						<?php echo do_shortcode('['.get_theme_mod('medibazar_top_footer_text').']'); ?>
					</div>
				</div>
			<?php } ?>
			</main>
			<footer>
				<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) || is_active_sidebar( 'footer-4' )) { ?>
				<div class="footer-area pt-80 pb-45">
					<div class="container">
						<div class="row">
							<?php if(get_theme_mod('medibazar_footer_column') == '3columns'){ ?>
								<div class="col-xl-4 col-lg-4 col-md-4">
									<?php dynamic_sidebar( 'footer-1' ); ?>
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4">
									<?php dynamic_sidebar( 'footer-2' ); ?>
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4">
									<?php dynamic_sidebar( 'footer-3' ); ?>
								</div>
							<?php } elseif(get_theme_mod('medibazar_footer_column') == '4columns'){ ?>	
								<div class="col-xl-3 col-lg-3 col-md-6">
									<?php dynamic_sidebar( 'footer-1' ); ?>
								</div>
								<div class="col-xl-3 col-lg-3 col-md-6">
									<?php dynamic_sidebar( 'footer-2' ); ?>
								</div>
								<div class="col-xl-3 col-lg-3 col-md-6">
									<?php dynamic_sidebar( 'footer-3' ); ?>
								</div>
								<div class="col-xl-3 col-lg-3 col-md-6">
									<?php dynamic_sidebar( 'footer-4' ); ?>
								</div>
							<?php } else { ?>
								<div class="col-xl-3 col-lg-3 col-md-6">
									<?php dynamic_sidebar( 'footer-1' ); ?>
								</div>
								<div class="col-xl-3 col-lg-3 col-md-6">
									<?php dynamic_sidebar( 'footer-2' ); ?>
								</div>
								<div class="col-xl-2 col-lg-3 col-md-6">
									<?php dynamic_sidebar( 'footer-3' ); ?>
								</div>
								<div class="col-xl-2 col-lg-3 col-md-6">
									<?php dynamic_sidebar( 'footer-4' ); ?>
								</div>
								<div class="col-xl-2 col-lg-3 col-md-6">
									<?php dynamic_sidebar( 'footer-5' ); ?>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
				<?php } ?>
				
				<div class="footer-bottom-area mr-70 ml-70 pt-25 pb-25">
					<div class="container">
						<div class="row">
							<div class="col-xl-6 col-lg-6 col-md-6">
								<div class="copyright">
									<?php if(get_theme_mod( 'medibazar_copyright' )){ ?>
										<p><?php echo medibazar_sanitize_data(get_theme_mod( 'medibazar_copyright' )); ?></p>
									<?php } else { ?>
										<p><?php esc_html_e('Copyright 2021.KlbTheme . All rights reserved','medibazar'); ?></p>
									<?php } ?>
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6">
								<div class="footer-bottom-link f-right">
									<?php $sidebarmenu = get_theme_mod('medibazar_footer_menu','0'); ?>
									<?php if($sidebarmenu == '1'){ ?>
										<?php 
										   wp_nav_menu(array(
										   'theme_location' => 'footer-menu',
										   'container' => '',
										   'fallback_cb' => 'show_top_menu',
										   'menu_id' => '',
										   'menu_class' => 'footer_right',
										   'echo' => true,
										   'depth' => 0 
											)); 
										 ?>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</footer>

			<?php $mobilebottommenu = get_theme_mod('medibazar_mobile_bottom_menu','0'); ?>
			<?php if($mobilebottommenu == '1'){ ?>
				<?php $edittoggle = get_theme_mod('medibazar_mobile_bottom_menu_edit_toggle','0'); ?>
				<?php if($edittoggle == '1'){ ?>
				<div class="footer-fix-nav shadow">
					<div class="row mx-0">
						<?php $editrepeater = get_theme_mod('medibazar_mobile_bottom_menu_edit'); ?>
						
						<?php foreach($editrepeater as $e){ ?>		
							<?php if($e['mobile_menu_type'] == 'Home'){ ?>
								<div class="col">
									<a href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>"><i class="fal fa-home"></i></a>
								</div>
							<?php } elseif($e['mobile_menu_type'] == 'Filter'){ ?>
								<div class="col">
									<a class="button-filter" data-toggle="offcanvas" href="#" href="<?php echo wc_get_page_permalink( 'shop' ); ?>"><i class="fal fa-filter"></i></a>
								</div>
							<?php } elseif($e['mobile_menu_type'] == 'Shop'){ ?>
								<div class="col">
									<a href="<?php echo wc_get_page_permalink( 'shop' ); ?>"><i class="fal fa-th-large"></i></a>
								</div>
							<?php } elseif($e['mobile_menu_type'] == 'Cart'){ ?>
								<div class="col">
									<?php global $woocommerce; ?>
									<a href="<?php echo esc_url(wc_get_cart_url()); ?>"><i class="fal fa-shopping-cart"></i><span class="cart-count count"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'medibazar'), $woocommerce->cart->cart_contents_count);?></a>
								</div>
							<?php } elseif($e['mobile_menu_type'] == 'Myaccount'){ ?>	
								<div class="col">
									<a href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>"><i class="fal fa-user-circle"></i></a>
								</div>
							<?php } else { ?>	
								<div class="col">
									<a href="<?php echo esc_url($e['mobile_menu_url']); ?>">
										<i class="fal fa-<?php echo esc_attr($e['mobile_menu_icon']); ?>"></i>
									</a>
								</div>
							<?php } ?>	
						<?php } ?>	
					</div>
				</div>
			<?php } else { ?>	
			
				<div class="footer-fix-nav shadow">
					<div class="row mx-0">
						<div class="col">
							<a href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>"><i class="fal fa-home"></i></a>
						</div>
						<?php if(is_shop()){ ?>
						<div class="col">
							<a class="button-filter" data-toggle="offcanvas" href="#" href="<?php echo wc_get_page_permalink( 'shop' ); ?>"><i class="fal fa-filter"></i></a>
						</div>
						<?php } else { ?>
						<div class="col">
							<a href="<?php echo wc_get_page_permalink( 'shop' ); ?>"><i class="fal fa-th-large"></i></a>
						</div>
						<?php } ?>
						<div class="col">
							<?php global $woocommerce; ?>
							<a href="<?php echo esc_url(wc_get_cart_url()); ?>"><i class="fal fa-shopping-cart"></i><span class="cart-count count"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'medibazar'), $woocommerce->cart->cart_contents_count);?></a>
						</div>
						<div class="col">
							<a href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>"><i class="fal fa-user-circle"></i></a>
						</div>
					</div>
				</div>
				
			<?php } ?>
		<?php } ?>
	<?php }
}

add_action('medibazar_main_footer','medibazar_main_footer_function', 10);