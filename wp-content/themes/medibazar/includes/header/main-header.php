<?php

/*************************************************
## Main Header Function
*************************************************/

add_action('medibazar_main_header','medibazar_main_header_function',10);

if ( ! function_exists( 'medibazar_main_header_function' ) ) {
	function medibazar_main_header_function(){
		
?>

	<header>
		<?php get_template_part( 'includes/header/topheader' ); ?>
			
		<div id="sticky-header" class="main-menu-area menu-01 pl-165 pr-165">
			<div class="container-fluid">
				<div class="row align-items-center">
					<div class="col-xl-3 col-lg-3">
						<div class="logo">
							<?php if (get_theme_mod( 'medibazar_logo' )) { ?>
								<a href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
									<img class="logo_dark" src="<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'medibazar_logo' )) ); ?>"  alt="<?php bloginfo("name"); ?>">
								</a>
							<?php } elseif (get_theme_mod( 'medibazar_logo_text' )) { ?>
								<a class="navbar-brand text" href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
									<span><?php echo esc_html(get_theme_mod( 'medibazar_logo_text' )); ?></span>
								</a>
							<?php } else { ?>
								<a href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
									<img class="logo_dark custom" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo/logo.png" width="195" height="35" alt="<?php bloginfo("name"); ?>">
								</a>
							<?php } ?>
						</div>
					</div>
					<div class="col-xl-9 col-lg-9 d-none d-lg-block">
						<div class="header-right f-right">
						
							<?php get_template_part( 'includes/header/cart' ); ?>
							
							<?php $sidebarmenu = get_theme_mod('medibazar_header_sidebar_menu','0'); ?>
							<?php if($sidebarmenu == '1'){ ?>
							<div class="menu-bar info-bar f-right d-none d-md-none d-lg-block">
								<a href="#"><i class="fal fa-bars"></i></a>
							</div>
							<?php } ?>
							
							<?php get_template_part( 'includes/header/search' ); ?>

						</div>
						<div class="main-menu">
							<nav id="mobile-menu">
								<?php 
								   wp_nav_menu(array(
								   'theme_location' => 'main-menu',
								   'container' => '',
								   'fallback_cb' => 'show_top_menu',
								   'menu_id' => '',
								   'menu_class' => '',
								   'echo' => true,
									"walker" => new medibazar_description_walker(),
								   'depth' => 0 
									)); 
								 ?>
							</nav>
						</div>
					</div>
					<div class="col-12">
						<div class="mobile-menu"></div>
					</div>
				</div>
			</div>
		</div>
		
		<?php get_template_part( 'includes/header/sidebar-modal' ); ?>
	</header>
		
	<?php } 
} 




