<?php $sidebarmenu = get_theme_mod('medibazar_header_sidebar_menu','0'); ?>
<?php if($sidebarmenu == '1'){ ?>
	<div class="extra-info">
		<div class="close-icon">
			<button>
				<i class="far fa-window-close"></i>
			</button>
		</div>
		<?php if (get_theme_mod( 'medibazar_sidebar_menu_logo' )) { ?>
			<div class="logo-side mb-30">
				<a href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
					<img src="<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'medibazar_sidebar_menu_logo' )) ); ?>"  alt="<?php bloginfo("name"); ?>" />
				</a>
			</div>
		<?php } ?>
		
		<?php if ( is_active_sidebar( 'sidebar-menu' ) ) { ?>
			<?php dynamic_sidebar( 'sidebar-menu' ); ?>
		<?php } ?>
	</div>
	<div class="sidebar-overlay"></div>
<?php } ?>