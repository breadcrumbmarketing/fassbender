<?php $headercart = get_theme_mod('medibazar_header_cart','0'); ?>
<?php if($headercart == '1'){ ?>

	<div class="header-lang f-right pos-rel d-none d-md-none d-lg-block">
		<?php global $woocommerce; ?>
		<?php $carturl = wc_get_cart_url(); ?>
		
		<div class="top-cart-row">
			<div class="dropdown dropdown-cart"> 
				<a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
				<div class="items-cart-inner">
				  <div class="basket"> <i class="fal fa-shopping-cart"></i> </div>
				  <div class="basket-item-count"><span class="cart-count"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'medibazar'), $woocommerce->cart->cart_contents_count);?></span></div>
				  <div class="total-price-basket"> <span class="lbl"><?php esc_html_e('My Cart','medibazar'); ?></span>  </div>
				</div>
				</a>
				<div class="dropdown-menu">
					<div class="fl-mini-cart-content">
						<?php woocommerce_mini_cart(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
