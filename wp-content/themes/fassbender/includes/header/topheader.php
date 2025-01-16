		<?php $topheader = get_theme_mod('medibazar_top_header','0'); ?>
		<?php if($topheader == '1'){ ?>
			<div class="header-top-area pl-165 pr-165">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xl-8 col-lg-6 col-md-6">
							<div class="header-top-wrapper">
								<div class="header-top-info d-none d-xl-block f-left">
									<span><?php echo medibazar_sanitize_data(get_theme_mod('medibazar_top_header_text')); ?></span>
								</div>
								<div class="header-link f-left">
									<span><?php echo medibazar_sanitize_data(get_theme_mod('medibazar_top_header_box_text')); ?></span>
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-lg-6 col-md-6">
							<div class="header-top-right text-md-right">
							   <div class="shop-menu">
									<?php 
									   wp_nav_menu(array(
									   'theme_location' => 'top-right-menu',
									   'container' => '',
									   'fallback_cb' => 'show_top_menu',
									   'menu_id' => '',
									   'menu_class' => 'header_right',
									   'echo' => true,
									   'depth' => 0 
										)); 
									 ?>
							   </div>
							</div>
						</div>
						<?php $mobilesearch = get_theme_mod('medibazar_header_mobile_search','0'); ?>
						<?php if($mobilesearch == '1'){ ?>
							<div class="col-md-12">
								<div class="mobile-search"> 
									<?php echo medibazar_header_product_search(); ?>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		<?php } ?>