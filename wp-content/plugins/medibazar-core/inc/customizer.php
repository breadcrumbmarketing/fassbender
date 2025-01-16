<?php
/*======
*
* Kirki Settings
*
======*/
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Kirki' ) ) {
	return;
}

Kirki::add_config(
	'medibazar_customizer', array(
		'capability'  => 'edit_theme_options',
		'option_type' => 'theme_mod',
	)
);

/*======
*
* Sections
*
======*/
$sections = array(
	'shop_settings' => array (
		esc_attr__( 'Shop Settings', 'medibazar-core' ),
		esc_attr__( 'You can customize the shop settings.', 'medibazar-core' ),
	),
	
	'blog_settings' => array (
		esc_attr__( 'Blog Settings', 'medibazar-core' ),
		esc_attr__( 'You can customize the blog settings.', 'medibazar-core' ),
	),

	'header_settings' => array (
		esc_attr__( 'Header Settings', 'medibazar-core' ),
		esc_attr__( 'You can customize the header settings.', 'medibazar-core' ),
	),

	'main_color' => array (
		esc_attr__( 'Main Color', 'medibazar-core' ),
		esc_attr__( 'You can customize the main color.', 'medibazar-core' ),
	),
	
	'elementor_templates' => array (
		esc_attr__( 'Elementor Templates', 'medibazar-core' ),
		esc_attr__( 'You can customize the elementor templates.', 'medibazar-core' ),
	),
	
	'map_settings' => array (
		esc_attr__( 'Map Settings', 'medibazar-core' ),
		esc_attr__( 'You can customize the map settings.', 'medibazar-core' ),
	),

	'footer_settings' => array (
		esc_attr__( 'Footer Settings', 'medibazar-core' ),
		esc_attr__( 'You can customize the footer settings.', 'medibazar-core' ),
	),
	
	'medibazar_widgets' => array (
		esc_attr__( 'medibazar Widgets', 'medibazar-core' ),
		esc_attr__( 'You can customize the medibazar widgets.', 'medibazar-core' ),
	),

);

foreach ( $sections as $section_id => $section ) {
	$section_args = array(
		'title' => $section[0],
		'description' => $section[1],
	);

	if ( isset( $section[2] ) ) {
		$section_args['type'] = $section[2];
	}

	if( $section_id == "colors" ) {
		Kirki::add_section( str_replace( '-', '_', $section_id ), $section_args );
	} else {
		Kirki::add_section( 'medibazar_' . str_replace( '-', '_', $section_id ) . '_section', $section_args );
	}
}


/*======
*
* Fields
*
======*/
function medibazar_customizer_add_field ( $args ) {
	Kirki::add_field(
		'medibazar_customizer',
		$args
	);
}

	/*====== Shop ======*/
		/*====== Shop Panels ======*/
		Kirki::add_panel (
			'medibazar_shop_panel',
			array(
				'title' => esc_html__( 'Shop Settings', 'medibazar-core' ),
				'description' => esc_html__( 'You can customize the shop from this panel.', 'medibazar-core' ),
			)
		);

		$sections = array (
			'shop_general' => array(
				esc_attr__( 'General', 'medibazar-core' ),
				esc_attr__( 'You can customize shop settings.', 'medibazar-core' )
			),
			
			'single_product' => array(
				esc_attr__( 'Single Product', 'medibazar-core' ),
				esc_attr__( 'You can customize shop single settings.', 'medibazar-core' )
			),
			
			'shop_breadcrumb' => array(
				esc_attr__( 'Breadcrumb', 'medibazar-core' ),
				esc_attr__( 'You can customize shop settings.', 'medibazar-core' )
			),
			
			'mobile_bottom_menu_style' => array(
				esc_attr__( 'Mobile Bottom Menu Style ', 'medibazar-core' ),
				esc_attr__( 'You can customize the mobile menu.', 'medibazar-core' )
			),
			
			'testimonial_slider_widget' => array(
				esc_attr__( 'Testimonial Slider Widget', 'medibazar-core' ),
				esc_attr__( 'When you add the Testimonial Slider Widget in Dashboard > Appearance > Widgets, you can customize the settings from there.', 'medibazar-core' )
			),

		);

		foreach ( $sections as $section_id => $section ) {
			$section_args = array(
				'title' => $section[0],
				'description' => $section[1],
				'panel' => 'medibazar_shop_panel',
			);

			if ( isset( $section[2] ) ) {
				$section_args['type'] = $section[2];
			}

			Kirki::add_section( 'medibazar_' . str_replace( '-', '_', $section_id ) . '_section', $section_args );
		}
		
		/*====== Shop Layouts ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'radio-buttonset',
				'settings' => 'medibazar_shop_layout',
				'label' => esc_attr__( 'Layout', 'medibazar-core' ),
				'description' => esc_attr__( 'You can choose a layout for the shop.', 'medibazar-core' ),
				'section' => 'medibazar_shop_general_section',
				'default' => 'left-sidebar',
				'choices' => array(
					'left-sidebar' => esc_attr__( 'Left Sidebar', 'medibazar-core' ),
					'full-width' => esc_attr__( 'Full Width', 'medibazar-core' ),
					'right-sidebar' => esc_attr__( 'Right Sidebar', 'medibazar-core' ),
				),
			)
		);
		
		/*====== Pagination Type ======*/
		medibazar_customizer_add_field(
			array (
			'type'        => 'radio-buttonset',
			'settings'    => 'medibazar_paginate_type',
			'label'       => esc_html__( 'Pagination Type', 'medibazar-core' ),
			'section'     => 'medibazar_shop_general_section',
			'default'     => 'default',
			'priority'    => 10,
			'choices'     => array(
				'default' => esc_attr__( 'Default', 'medibazar-core' ),
				'loadmore' => esc_attr__( 'Load More', 'medibazar-core' ),
				'infinite' => esc_attr__( 'Infinite', 'medibazar-core' ),
			),
			) 
		);
		
		/*====== Shop Mobile Column======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'medibazar_shop_mobile_column',
				'label' => esc_attr__( 'Shop Mobile Column', 'medibazar-core' ),
				'description' => esc_attr__( 'Set column for the mobile column.', 'medibazar-core' ),
				'section' => 'medibazar_shop_general_section',
				'default' => '1column',
				'choices' => array(
					'1column' => esc_attr__( '1 column', 'medibazar-core' ),
					'2columns' => esc_attr__( '2 columns', 'medibazar-core' ),
					'3columns' => esc_attr__( '3 columns', 'medibazar-core' ),
				),
			)
		);

		/*====== Ajax on Shop Page ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'medibazar_ajax_on_shop',
				'label' => esc_attr__( 'Ajax on Shop Page', 'medibazar-core' ),
				'description' => esc_attr__( 'Disable or Enable Ajax for the shop page.', 'medibazar-core' ),
				'section' => 'medibazar_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Grid-List Toggle ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'medibazar_grid_list_view',
				'label' => esc_attr__( 'Grid List View', 'medibazar-core' ),
				'description' => esc_attr__( 'Disable or Enable grid list view on shop page.', 'medibazar-core' ),
				'section' => 'medibazar_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Quick View Toggle ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'medibazar_quick_view_button',
				'label' => esc_attr__( 'Quick View Button', 'medibazar-core' ),
				'description' => esc_attr__( 'You can choose status of the quick view button.', 'medibazar-core' ),
				'section' => 'medibazar_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Wishlist Toggle ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'medibazar_wishlist_button',
				'label' => esc_attr__( 'Custom Wishlist Button', 'medibazar-core' ),
				'description' => esc_attr__( 'Sie können den Status der Wunschlisten-Schaltfläche auswählen.', 'medibazar-core' ),
				'section' => 'medibazar_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Recently Viewed Products ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'medibazar_recently_viewed_products',
				'label' => esc_attr__( 'Recently Viewed Products', 'medibazar-core' ),
				'description' => esc_attr__( 'Kürzlich angesehene Produkte deaktivieren oder aktivieren.', 'medibazar-core' ),
				'section' => 'medibazar_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Product Stock Quantity ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'medibazar_stock_quantity',
				'label' => esc_attr__( 'Stock Quantity', 'medibazar-core' ),
				'description' => esc_attr__( 'Show stock quantity on the label.', 'medibazar-core' ),
				'section' => 'medibazar_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Product Min/Max Quantity ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'medibazar_min_max_quantity',
				'label' => esc_attr__( 'Min/Max Quantity', 'medibazar-core' ),
				'description' => esc_attr__( 'Enable the additional quantity setting fields in product detail page.', 'medibazar-core' ),
				'section' => 'medibazar_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Ajax Notice Shop ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'medibazar_shop_notice_ajax_addtocart',
				'label' => esc_attr__( 'Ajax Notice', 'medibazar' ),
				'description' => esc_attr__( 'You can choose status of the ajax notice feature.', 'medibazar' ),
				'section' => 'medibazar_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Category Description ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'medibazar_category_description_after_content',
				'label' => esc_attr__( 'Category Desc After Content', 'medibazar-core' ),
				'description' => esc_attr__( 'Add the category description after the products.', 'medibazar-core' ),
				'section' => 'medibazar_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Catalog Mode - Disable Add to Cart ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'medibazar_catalog_mode',
				'label' => esc_attr__( 'Catalog Mode', 'medibazar-core' ),
				'description' => esc_attr__( 'Disable Add to Cart button on the shop page.', 'medibazar-core' ),
				'section' => 'medibazar_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Min Order Amount ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'medibazar_min_order_amount_toggle',
				'label' => esc_attr__( 'Min Order Amount', 'medibazar-core' ),
				'description' => esc_attr__( 'Enable Min Order Amount.', 'medibazar-core' ),
				'section' => 'medibazar_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Min Order Amount Value ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'medibazar_min_order_amount_value',
				'label' => esc_attr__( 'Min Order Value', 'medibazar-core' ),
				'description' => esc_attr__( 'Set amount to specify a minimum order value.', 'medibazar-core' ),
				'section' => 'medibazar_shop_general_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'medibazar_min_order_amount_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);

		medibazar_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'medibazar_mobile_bottom_menu',
				'label' => esc_attr__( 'Mobile Bottom Menu', 'medibazar-core' ),
				'description' => esc_attr__( 'Disable or Enable the bottom menu on mobile.', 'medibazar-core' ),
				'section' => 'medibazar_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Mobile Bottom Menu Edit Toggle======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'medibazar_mobile_bottom_menu_edit_toggle',
				'label' => esc_attr__( 'Mobile Bottom Menu Edit', 'medibazar-core' ),
				'description' => esc_attr__( 'Edit the mobile bottom menu.', 'medibazar-core' ),
				'section' => 'medibazar_shop_general_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'medibazar_mobile_bottom_menu',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
				
			)
			
		);
		
		/*====== Mobile Menu Repeater ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'repeater',
				'settings' => 'medibazar_mobile_bottom_menu_edit',
				'label' => esc_attr__( 'Mobile Bottom Menu Edit', 'medibazar-core' ),
				'description' => esc_attr__( 'Edit the mobile bottom menu.', 'medibazar-core' ),
				'section' => 'medibazar_shop_general_section',
				'required' => array(
					array(
					  'setting'  => 'medibazar_mobile_bottom_menu_edit_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
				'fields' => array(
					'mobile_menu_type' => array(
						'type' => 'select',
						'label' => esc_attr__( 'Select Type', 'medibazar-core' ),
						'description' => esc_attr__( 'You can select a type', 'medibazar-core' ),
						'default' => 'default',
						'choices' => array(
							'default' 	=> esc_attr__( 'Default', 'medibazar-core' ),
							'Home'		=> esc_attr__( 'Home', 'medibazar-core' ),
							'Shop' 		=> esc_attr__( 'Shop', 'medibazar-core' ),
							'Filter' 	=> esc_attr__( 'Filter', 'medibazar-core' ),
							'Cart' 		=> esc_attr__( 'Cart', 'medibazar-core' ),
							'Myaccount' => esc_attr__( 'Myaccount', 'medibazar-core' ),
						),
					),
				
					'mobile_menu_icon' => array(
						'type' 			=> 'text',
						'label' 		=> esc_attr__( 'Icon', 'medibazar-core' ),
						'description' 	=> esc_attr__( 'You can set an icon. for example; "home"', 'medibazar-core' ),
					),

					'mobile_menu_url' => array(
						'type'			=> 'text',
						'label' 		=> esc_attr__( 'URL', 'medibazar-core' ),
						'description' 	=> esc_attr__( 'You can set url for the item.', 'medibazar-core' ),
					),
				),
				
			)
		);

		/*====== Product Image Size ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'dimensions',
				'settings' => 'medibazar_product_image_size',
				'label' => esc_attr__( 'Product Image Size', 'medibazar-core' ),
				'description' => esc_attr__( 'You can set size of the product image for the shop page.', 'medibazar-core' ),
				'section' => 'medibazar_shop_general_section',
				'default' => array(
					'width' => '',
					'height' => '',
				),
			)
		);
		
		/*====== Shop Single Image Column ======*/
		medibazar_customizer_add_field (
			array(
				'type'        => 'slider',
				'settings'    => 'medibazar_shop_single_image_column',
				'label'       => esc_html__( 'Image Column', 'medibazar-core' ),
				'section'     => 'medibazar_single_product_section',
				'default'     => 6,
				'transport'   => 'auto',
				'choices'     => [
					'min'  => 3,
					'max'  => 12,
					'step' => 1,
				],
			)
		);
		
		/*====== Re-Order Product Detail ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'sortable',
				'settings' => 'medibazar_shop_single_reorder',
				'label' => esc_attr__( 'Re-order Product Summary', 'medibazar' ),
				'description' => esc_attr__( 'Please save the changes and refresh the page once. Live preview is not available for the option.', 'medibazar' ),
				'section' => 'medibazar_single_product_section',
				'default'     => [
					'woocommerce_template_single_title',
					'woocommerce_template_single_rating',
					'woocommerce_template_single_price',
					'woocommerce_template_single_excerpt',
					'woocommerce_template_single_add_to_cart',
					'woocommerce_template_single_meta',
					'medibazar_social_share',
				],
				'choices'     => [
					'woocommerce_template_single_title' => esc_html__( 'Title', 'medibazar' ),
					'woocommerce_template_single_rating' => esc_html__( 'Rating', 'medibazar' ),
					'woocommerce_template_single_price' => esc_html__( 'Price', 'medibazar' ),
					'woocommerce_template_single_excerpt' => esc_html__( 'Excerpt', 'medibazar' ),
					'woocommerce_template_single_add_to_cart' => esc_html__( 'Add to Cart', 'medibazar' ),
					'woocommerce_template_single_meta' => esc_html__( 'Meta', 'medibazar' ),
					'medibazar_social_share' => esc_html__( 'Share', 'medibazar' ),
					'medibazar_product_stock_progress_bar' => esc_html__( 'Progress Bar', 'medibazar-core' ),
					'medibazar_product_time_countdown' => esc_html__( 'Time Countdown', 'medibazar-core' ),
				],
			)
		);
		
		
		/*====== Shop Products Navigation  ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'medibazar_products_navigation',
				'label' => esc_attr__( 'Products Navigation', 'medibazar-core' ),
				'section' => 'medibazar_single_product_section',
				'default' => '0',
			)
		);
		
		/*====== Shop Single Ajax Add To Cart ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'medibazar_shop_single_ajax_addtocart',
				'label' => esc_attr__( 'Ajax Add to Cart', 'medibazar-core' ),
				'description' => esc_attr__( 'Disable or Enable ajax add to cart button.', 'medibazar-core' ),
				'section' => 'medibazar_single_product_section',
				'default' => '0',
			)
		);
		
		/*====== Product360 View ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'medibazar_shop_single_product360',
				'label' => esc_attr__( 'Product360 View', 'medibazar' ),
				'section' => 'medibazar_single_product_section',
				'default' => '0',
			)
		);
		
		/*====== Shop Single Image Zoom  ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'medibazar_single_image_zoom',
				'label' => esc_attr__( 'Image Zoom', 'medibazar-core' ),
				'description' => esc_attr__( 'You can choose status of the zoom feature.', 'medibazar-core' ),
				'section' => 'medibazar_single_product_section',
				'default' => '0',
			)
		);
		
		/*======  Sticky Single Cart ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'medibazar_single_sticky_cart',
				'label' => esc_attr__( 'Sticky Add to Cart', 'medibazar-core' ),
				'description' => esc_attr__( 'Disable or Enable sticky cart button.', 'medibazar-core' ),
				'section' => 'medibazar_single_product_section',
				'default' => '0',
			)
		);
		
		/*====== Mobile Sticky Single Cart ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'medibazar_mobile_single_sticky_cart',
				'label' => esc_attr__( 'Mobile Sticky Add to Cart', 'medibazar-core' ),
				'description' => esc_attr__( 'Disable or Enable sticky cart button on mobile.', 'medibazar-core' ),
				'section' => 'medibazar_single_product_section',
				'default' => '0',
			)
		);
		
		/*====== Move Review Tab ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'medibazar_shop_single_review_tab_move',
				'label' => esc_attr__( 'Move Review Tab', 'medibazar' ),
				'description' => esc_attr__( 'Move the review tab out of tabs', 'medibazar-core' ),
				'section' => 'medibazar_single_product_section',
				'default' => '0',
			)
		);
		
		/*====== Buy Now Single ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'medibazar_shop_single_buy_now',
				'label' => esc_attr__( 'Buy Now Button', 'medibazar-core' ),
				'description' => esc_attr__( 'Disable or Enable Buy Now button.', 'medibazar-core' ),
				'section' => 'medibazar_single_product_section',
				'default' => '0',
			)
		);
		
		/*====== Order on WhatsApp ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'medibazar_shop_single_orderonwhatsapp',
				'label' => esc_attr__( 'Order on WhatsApp', 'medibazar' ),
				'section' => 'medibazar_single_product_section',
				'default' => '0',
			)
		);
		
		/*====== Order on WhatsApp Number======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'medibazar_shop_single_whatsapp_number',
				'label' => esc_attr__( 'WhatsApp Number', 'medibazar' ),
				'description' => esc_attr__( 'You can add a phone number for order on WhatsApp.', 'medibazar' ),
				'section' => 'medibazar_single_product_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'medibazar_shop_single_orderonwhatsapp',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Single Social Share ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'medibazar_shop_social_share',
				'label' => esc_attr__( 'Social Share', 'medibazar-core' ),
				'description' => esc_attr__( 'Disable or Enable social share buttons.', 'medibazar-core' ),
				'section' => 'medibazar_single_product_section',
				'default' => '0',
			)
		);
		
		/*====== Shop Single Social Share ======*/
		medibazar_customizer_add_field (
			array(
				'type'        => 'multicheck',
				'settings'    => 'medibazar_shop_single_share',
				'section'     => 'medibazar_single_product_section',
				'default'     => array('facebook','twitter', 'pinterest', 'linkedin'  ),
				'priority'    => 10,
				'choices'     => [
					'facebook'  => esc_html__( 'Facebook', 	'medibazar-core' ),
					'twitter' 	=> esc_html__( 'Twitter', 	'medibazar-core' ),
					'pinterest' => esc_html__( 'Pinterest', 'medibazar-core' ),
					'linkedin'  => esc_html__( 'Linkedin', 	'medibazar-core' ),
				],
				'required' => array(
					array(
					  'setting'  => 'medibazar_shop_social_share',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Shop Single Banner Toggle======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'medibazar_shop_single_banner_toggle',
				'label' => esc_attr__( 'Banner', 'medibazar-core' ),
				'description' => esc_attr__( 'Disable or Enable the banner.', 'medibazar-core' ),
				'section' => 'medibazar_single_product_section',
				'default' => '0',
			)
		);
		
		/*====== Shop Single Banner======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'medibazar_shop_single_banner_img',
				'label' => esc_attr__( 'Banner Image', 'medibazar-core' ),
				'description' => esc_attr__( 'You can upload an image for the banner section.', 'medibazar-core' ),
				'section' => 'medibazar_single_product_section',
				'choices' => array(
					'save_as' => 'id',
				),
				'required' => array(
					array(
					  'setting'  => 'medibazar_shop_single_banner_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Shop Single Banner URL======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'medibazar_shop_single_banner_url',
				'label' => esc_attr__( 'Banner URL', 'medibazar-core' ),
				'description' => esc_attr__( 'You can set an url for the banner', 'medibazar-core' ),
				'section' => 'medibazar_single_product_section',
				'default' => '#',
				'required' => array(
					array(
					  'setting'  => 'medibazar_shop_single_banner_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Breadcrumb Toggle ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'medibazar_shop_breadcrumb',
				'label' => esc_attr__( 'Breadcrumb', 'medibazar-core' ),
				'description' => esc_attr__( 'Disable or Enable breadcrumb on shop pages.', 'medibazar-core' ),
				'section' => 'medibazar_shop_breadcrumb_section',
				'default' => '0',
			)
		);
		
		medibazar_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'medibazar_shop_breadcrumb_bg',
				'label' => esc_attr__( 'Breadcrumb Background', 'medibazar-core' ),
				'description' => esc_attr__( 'You can upload a background image for the breadcrumb.', 'medibazar-core' ),
				'section' => 'medibazar_shop_breadcrumb_section',
				'choices' => array(
					'save_as' => 'id',
				),
				'required' => array(
					array(
					  'setting'  => 'medibazar_shop_breadcrumb',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Breadcrumb Text ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'medibazar_breadcrumb_title',
				'label' => esc_attr__( 'Breadcrumb Title', 'medibazar-core' ),
				'description' => esc_attr__( 'You can set a title for the breadcrumb..', 'medibazar-core' ),
				'section' => 'medibazar_shop_breadcrumb_section',
				'default' => 'Products',
				'required' => array(
					array(
					  'setting'  => 'medibazar_shop_breadcrumb',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*======  Mobile Menu Background Color ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'medibazar_mobile_menu_bg_color',
				'label' => esc_attr__( 'Mobile Menu Background Color', 'medibazar-core' ),
				'description' => esc_attr__( 'You can set a background color.', 'medibazar-core' ),
				'section' => 'medibazar_mobile_bottom_menu_style_section',
			)
		);
		
		/*======  Mobile Menu Border Color ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#edf1f4',
				'settings' => 'medibazar_mobile_menu_border_color',
				'label' => esc_attr__( 'Mobile Menu Border Color', 'medibazar-core' ),
				'description' => esc_attr__( 'You can set a border color.', 'medibazar-core' ),
				'section' => 'medibazar_mobile_bottom_menu_style_section',
			)
		);
		
		/*======  Mobile Menu Icon Color ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#9b9b9b',
				'settings' => 'medibazar_mobile_menu_icon_color',
				'label' => esc_attr__( 'Mobile Menu Icon Color', 'medibazar-core' ),
				'description' => esc_attr__( 'You can set a color.', 'medibazar-core' ),
				'section' => 'medibazar_mobile_bottom_menu_style_section',
			)
		);
		
		/*======  Mobile Menu Icon Hover Color ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#9b9b9b',
				'settings' => 'medibazar_mobile_menu_icon_hvrcolor',
				'label' => esc_attr__( 'Mobile Menu Icon Hover Color', 'medibazar-core' ),
				'description' => esc_attr__( 'You can set a color.', 'medibazar-core' ),
				'section' => 'medibazar_mobile_bottom_menu_style_section',
			)
		);

	/*====== Blog Settings ======*/
		/*====== Layouts ======*/
		
		medibazar_customizer_add_field (
			array(
				'type' => 'radio-buttonset',
				'settings' => 'medibazar_blog_layout',
				'label' => esc_attr__( 'Layout', 'medibazar-core' ),
				'description' => esc_attr__( 'You can choose a layout.', 'medibazar-core' ),
				'section' => 'medibazar_blog_settings_section',
				'default' => 'right-sidebar',
				'choices' => array(
					'left-sidebar' => esc_attr__( 'Left Sidebar', 'medibazar-core' ),
					'full-width' => esc_attr__( 'Full Width', 'medibazar-core' ),
					'right-sidebar' => esc_attr__( 'Right Sidebar', 'medibazar-core' ),
				),
			)
		);
		
		/*====== Blog Breadcrumb Toggle ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'medibazar_blog_breadcrumb',
				'label' => esc_attr__( 'Breadcrumb', 'medibazar-core' ),
				'description' => esc_attr__( 'Disable or Enable breadcrumb on blog pages.', 'medibazar-core' ),
				'section' => 'medibazar_blog_settings_section',
				'default' => '1',
			)
		);
		
		medibazar_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'medibazar_blog_breadcrumb_bg',
				'label' => esc_attr__( 'Breadcrumb Background', 'medibazar-core' ),
				'description' => esc_attr__( 'You can upload a background image for the breadcrumb.', 'medibazar-core' ),
				'section' => 'medibazar_blog_settings_section',
				'choices' => array(
					'save_as' => 'id',
				),
				'required' => array(
					array(
					  'setting'  => 'medibazar_blog_breadcrumb',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Blog Breadcrumb Text ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'medibazar_blog_breadcrumb_title',
				'label' => esc_attr__( 'Breadcrumb Title', 'medibazar-core' ),
				'description' => esc_attr__( 'You can set a title for the breadcrumb..', 'medibazar-core' ),
				'section' => 'medibazar_blog_settings_section',
				'default' => 'Blog Posts',
				'required' => array(
					array(
					  'setting'  => 'medibazar_blog_breadcrumb',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Main color ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#4e97fd',
				'settings' => 'medibazar_main_color',
				'label' => esc_attr__( 'Main Color', 'medibazar-core' ),
				'description' => esc_attr__( 'You can customize the main color.', 'medibazar-core' ),
				'section' => 'medibazar_main_color_section',
			)
		);

		/*====== Second color ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#e4573d',
				'settings' => 'medibazar_second_color',
				'label' => esc_attr__( 'Second Color', 'medibazar-core' ),
				'description' => esc_attr__( 'You can customize the second color.', 'medibazar-core' ),
				'section' => 'medibazar_main_color_section',
			)
		);
		
		/*====== Elementor Templates =======================================================*/
		/*====== Before Shop Elementor Templates ======*/
		medibazar_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'medibazar_before_main_shop_elementor_template',
				'label'       => esc_html__( 'Before Shop Elementor Template', 'medibazar' ),
				'section'     => 'medibazar_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates ', 'medibazar' ),
				'choices'     => medibazar_get_elementorTemplates('section'),
			)
		);
		
		/*====== After Shop Elementor Templates ======*/
		medibazar_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'medibazar_after_main_shop_elementor_template',
				'label'       => esc_html__( 'After Shop Elementor Template', 'medibazar' ),
				'section'     => 'medibazar_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates ', 'medibazar' ),
				'choices'     => medibazar_get_elementorTemplates('section'),
			)
		);
		
		/*====== Before Header Elementor Templates ======*/
		medibazar_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'medibazar_before_main_header_elementor_template',
				'label'       => esc_html__( 'Before Header Elementor Template', 'medibazar' ),
				'section'     => 'medibazar_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates, If you want to show any content before products ', 'medibazar' ),
				'choices'     => medibazar_get_elementorTemplates('section'),
			)
		);
	
		/*====== After Header Elementor Templates ======*/
		medibazar_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'medibazar_after_main_header_elementor_template',
				'label'       => esc_html__( 'After Header Elementor Template', 'medibazar' ),
				'section'     => 'medibazar_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates ', 'medibazar' ),
				'choices'     => medibazar_get_elementorTemplates('section'),
			)
		);
		
		/*====== Before Footer Elementor Template ======*/
		medibazar_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'medibazar_before_main_footer_elementor_template',
				'label'       => esc_html__( 'Before Footer Elementor Template', 'medibazar' ),
				'section'     => 'medibazar_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates, If you want to show any content before products ', 'medibazar' ),
				'choices'     => medibazar_get_elementorTemplates('section'),
			)
		);
		
		/*====== After Footer Elementor  Template ======*/
		medibazar_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'medibazar_after_main_footer_elementor_template',
				'label'       => esc_html__( 'After Footer Elementor Templates', 'medibazar' ),
				'section'     => 'medibazar_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates, If you want to show any content before products ', 'medibazar' ),
				'choices'     => medibazar_get_elementorTemplates('section'),
			)
		);
		
		/*====== Templates Repeater For each category ======*/
		add_action( 'init', function() {
			medibazar_customizer_add_field (
				array(
					'type' => 'repeater',
					'settings' => 'medibazar_elementor_template_each_shop_category',
					'label' => esc_attr__( 'Template For Categories', 'medibazar-core' ),
					'description' => esc_attr__( 'You can set template for each category.', 'medibazar-core' ),
					'section' => 'medibazar_elementor_templates_section',
					'fields' => array(
						
						'category_id' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'Select Category', 'medibazar-core' ),
							'description' => esc_html__( 'Set a category', 'medibazar-core' ),
							'priority'    => 10,
							'default'     => '',
							'choices'     => Kirki_Helper::get_terms( array('taxonomy' => 'product_cat') )
						),
						
						'medibazar_before_main_shop_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'Before Shop Elementor Template', 'medibazar-core' ),
							'choices'     => medibazar_get_elementorTemplates('section'),
							'default'     => '',
							'placeholder' => esc_html__( 'Select a template from elementor templates, If you want to show any content before products ', 'medibazar-core' ),
						),
						
						'medibazar_after_main_shop_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'After Shop Elementor Template', 'medibazar-core' ),
							'choices'     => medibazar_get_elementorTemplates('section'),
						),
						
						'medibazar_before_main_header_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'Before Header Elementor Template', 'medibazar-core' ),
							'choices'     => medibazar_get_elementorTemplates('section'),
						),
						
						'medibazar_after_main_header_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'After Header Elementor Template', 'medibazar-core' ),
							'choices'     => medibazar_get_elementorTemplates('section'),
						),
						
						'medibazar_before_main_footer_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'Before Footer Elementor Template', 'medibazar-core' ),
							'choices'     => medibazar_get_elementorTemplates('section'),
						),
						
						'medibazar_after_main_footer_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'After Footer Elementor Template', 'medibazar-core' ),
							'choices'     => medibazar_get_elementorTemplates('section'),
						),
						

					),
				)
			);
		} );

		/*====== Map Settings ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'medibazar_mapapi',
				'label' => esc_attr__( 'Google Map Api key', 'medibazar-core' ),
				'description' => esc_attr__( 'Add your google map api key', 'medibazar-core' ),
				'section' => 'medibazar_map_settings_section',
				'default' => '',
			)
		);
		
	/*====== Header ======*/
		/*====== Header Panels ======*/
		Kirki::add_panel (
			'medibazar_header_panel',
			array(
				'title' => esc_html__( 'Header Settings', 'medibazar-core' ),
				'description' => esc_html__( 'You can customize the header from this panel.', 'medibazar-core' ),
			)
		);

		$sections = array (
			'header_logo' => array(
				esc_attr__( 'Logo', 'medibazar-core' ),
				esc_attr__( 'You can customize the logo which is on header..', 'medibazar-core' )
			),
			
			'header_top' => array(
				esc_attr__( 'Header Top', 'medibazar-core' ),
				esc_attr__( 'You can customize top header..', 'medibazar-core' )
			),
		
			'header_general' => array(
				esc_attr__( 'Header General', 'medibazar-core' ),
				esc_attr__( 'You can customize the header.', 'medibazar-core' )
			),
			
			'header_sidebar_menu' => array(
				esc_attr__( 'Sidebar Menu', 'medibazar-core' ),
				esc_attr__( 'You can customize the sidebar menu.', 'medibazar-core' )
			),

			'header_color' => array(
				esc_attr__( 'Header Color', 'medibazar-core' ),
				esc_attr__( 'You can customize the header color.', 'medibazar-core' )
			),

			'header_preloader' => array(
				esc_attr__( 'Preloader', 'medibazar-core' ),
				esc_attr__( 'You can customize the loader.', 'medibazar-core' )
			),
			

		);

		foreach ( $sections as $section_id => $section ) {
			$section_args = array(
				'title' => $section[0],
				'description' => $section[1],
				'panel' => 'medibazar_header_panel',
			);

			if ( isset( $section[2] ) ) {
				$section_args['type'] = $section[2];
			}

			Kirki::add_section( 'medibazar_' . str_replace( '-', '_', $section_id ) . '_section', $section_args );
		}
		
		/*====== Logo ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'medibazar_logo',
				'label' => esc_attr__( 'Logo', 'medibazar-core' ),
				'description' => esc_attr__( 'You can upload a logo.', 'medibazar-core' ),
				'section' => 'medibazar_header_logo_section',
				'choices' => array(
					'save_as' => 'id',
				),
			)
		);
		
		/*====== Logo Text ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'medibazar_logo_text',
				'label' => esc_attr__( 'Set Logo Text', 'medibazar-core' ),
				'description' => esc_attr__( 'You can set logo as text.', 'medibazar-core' ),
				'section' => 'medibazar_header_logo_section',
				'default' => 'medibazar',
			)
		);
		
		/*====== Logo Size ======*/
		medibazar_customizer_add_field (
			array(
				'type'        => 'slider',
				'settings'    => 'medibazar_logo_size',
				'label'       => esc_html__( 'Logo Size', 'medibazar' ),
				'description' => esc_attr__( 'You can set size of the logo.', 'medibazar' ),
				'section'     => 'medibazar_header_logo_section',
				'default'     => 195,
				'priority'    => 30,
				'transport'   => 'auto',
				'choices'     => [
					'min'  => 20,
					'max'  => 300,
					'step' => 1,
				],
				'output' => [
				[
					'element' => '.logo img',
					'property'    => 'width',
					'units' => 'px',
				], ],
			)
		);
		
		
		/*====== Top Header Text ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'medibazar_top_header_text',
				'label' => esc_attr__( 'Text', 'medibazar-core' ),
				'description' => esc_attr__( 'You can set top header text', 'medibazar-core' ),
				'section' => 'medibazar_header_top_section',
				'default' => '',
			)
		);

		/*====== Top Header Box text ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'medibazar_top_header_box_text',
				'label' => esc_attr__( 'Icon', 'medibazar-core' ),
				'description' => esc_attr__( 'You can set contact icon e.g: linearicons-phone-wave .', 'medibazar-core' ),
				'section' => 'medibazar_header_top_section',
				'default' => '+123 (456) 7879',
			)
		);
		
		/*====== Header Contact URL ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'medibazar_header_contact_url',
				'label' => esc_attr__( 'URL', 'medibazar-core' ),
				'description' => esc_attr__( 'Add an url.', 'medibazar-core' ),
				'section' => 'medibazar_header_contact_detail_section',
				'default' => 'tel:1234567689',
			)
		);
		
		/*====== Header Cart Toggle ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'medibazar_header_cart',
				'label' => esc_attr__( 'Header Cart', 'medibazar-core' ),
				'description' => esc_attr__( 'You can choose status of the mini cart on the header.', 'medibazar-core' ),
				'section' => 'medibazar_header_general_section',
				'default' => '0',
			)
		);
		
		/*====== Header Search Button Toggle ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'medibazar_header_search_button',
				'label' => esc_attr__( 'Header Search Button', 'medibazar-core' ),
				'description' => esc_attr__( 'You can choose status of the search button on the header.', 'medibazar-core' ),
				'section' => 'medibazar_header_general_section',
				'default' => '0',
			)
		);

		/*====== Mobile Search on Header ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'medibazar_header_mobile_search',
				'label' => esc_attr__( 'Mobile Search', 'medibazar-core' ),
				'description' => esc_attr__( 'Disable or Enable mobile search on header.', 'medibazar-core' ),
				'section' => 'medibazar_header_general_section',
				'default' => '0',
			)
		);

		/*====== Top Header Toggle ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'medibazar_top_header',
				'label' => esc_attr__( 'Top Header', 'medibazar-core' ),
				'description' => esc_attr__( 'Disable or Enable the top header', 'medibazar-core' ),
				'section' => 'medibazar_header_general_section',
				'default' => '0',
			)
		);
		
		/*====== Sidebar Menu Widget ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'medibazar_header_sidebar_menu',
				'label' => esc_attr__( 'Sidebar Widget', 'medibazar-core' ),
				'description' => esc_attr__( 'You can add widgets from Dashboard > Appearance > Widgets > Menu Sidebar', 'medibazar-core' ),
				'section' => 'medibazar_header_sidebar_menu_section',
				'default' => '0',
			)
		);
		
		/*====== Sidebar Menu Logo ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'medibazar_sidebar_menu_logo',
				'label' => esc_attr__( 'Logo', 'medibazar-core' ),
				'description' => esc_attr__( 'You can upload a logo.', 'medibazar-core' ),
				'section' => 'medibazar_header_sidebar_menu_section',
				'choices' => array(
					'save_as' => 'id',
				),
				'required' => array(
					array(
					  'setting'  => 'medibazar_header_sidebar_menu',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Sidebar Menu logo Size ======*/
		medibazar_customizer_add_field (
			array(
				'type'        => 'slider',
				'settings'    => 'medibazar_sidebar_logo_size',
				'label'       => esc_html__( 'Sidebar Menu Logo Size', 'medibazar' ),
				'description' => esc_attr__( 'You can set size of the logo.', 'medibazar' ),
				'section'     => 'medibazar_header_sidebar_menu_section',
				'default'     => 195,
				'priority'    => 30,
				'transport'   => 'auto',
				'choices'     => [
					'min'  => 20,
					'max'  => 300,
					'step' => 1,
				],
				'output' => [
				[
					'element' => '.extra-info .logo-side img',
					'property'    => 'width',
					'units' => 'px',
				], ],
				'required' => array(
					array(
					  'setting'  => 'medibazar_header_sidebar_menu',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);

		/*====== Top Header BG color ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'medibazar_top_header_bg',
				'label' => esc_attr__( 'Top Header Bg', 'medibazar-core' ),
				'description' => esc_attr__( 'You can set a color for top header background.', 'medibazar-core' ),
				'section' => 'medibazar_header_color_section',
			)
		);
		
		/*====== Top Header Style ======*/
		medibazar_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'medibazar_top_header_font_typography',
				'label'       => esc_attr__( 'Top Header Featured Typography', 'medibazar' ),
				'section'     => 'medibazar_header_color_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '15px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => '.shop-menu ul li a',
					],
				],		
			)
		);
		
		/*====== Top Header Font color ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#9b9b9b',
				'settings' => 'medibazar_top_header_font_color',
				'label' => esc_attr__( 'Top Header Font Color', 'medibazar-core' ),
				'description' => esc_attr__( 'You can set a color for top header font.', 'medibazar-core' ),
				'section' => 'medibazar_header_color_section',
			)
		);
		
		/*====== Top Header Font Hover color ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#9b9b9b',
				'settings' => 'medibazar_top_header_font_hvrcolor',
				'label' => esc_attr__( 'Top Header Font Hover Color', 'medibazar-core' ),
				'description' => esc_attr__( 'You can set a color for top header font.', 'medibazar-core' ),
				'section' => 'medibazar_header_color_section',
			)
		);

		/*====== Main Header BG color ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'medibazar_main_header_bg',
				'label' => esc_attr__( 'Main Header Bg', 'medibazar-core' ),
				'description' => esc_attr__( 'You can set a color for bottom header background.', 'medibazar-core' ),
				'section' => 'medibazar_header_color_section',
			)
		);
		
		/*====== Main Header Style ======*/
		medibazar_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'medibazar_main_header_font_typography',
				'label'       => esc_attr__( 'Main Header Featured Typography', 'medibazar' ),
				'section'     => 'medibazar_header_color_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '16px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => '.main-menu ul li a ',
					],
				],		
			)
		);
		
		/*====== Main Header Font color ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#9b9b9b',
				'settings' => 'medibazar_main_header_font_color',
				'label' => esc_attr__( 'Main Header Font Color', 'medibazar-core' ),
				'description' => esc_attr__( 'You can set a color for bottom header font.', 'medibazar-core' ),
				'section' => 'medibazar_header_color_section',
			)
		);
		
		/*====== Main Header Font Hover color ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#4e97fd',
				'settings' => 'medibazar_main_header_font_hvrcolor',
				'label' => esc_attr__( 'Main Header Font Hover Color', 'medibazar-core' ),
				'description' => esc_attr__( 'You can set a color for bottom header font.', 'medibazar-core' ),
				'section' => 'medibazar_header_color_section',
			)
		);

		/*====== PreLoader Toggle ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'medibazar_preloader',
				'label' => esc_attr__( 'Disable Loader', 'medibazar-core' ),
				'description' => esc_attr__( 'Disable or Enable the loader.', 'medibazar-core' ),
				'section' => 'medibazar_header_preloader_section',
				'default' => '0',
			)
		);

		/*====== Loader Image ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'medibazar_preloader_image',
				'label' => esc_attr__( 'Image', 'medibazar-core' ),
				'description' => esc_attr__( 'You can upload an image.', 'medibazar-core' ),
				'section' => 'medibazar_header_preloader_section',
				'choices' => array(
					'save_as' => 'id',
				),
				'required' => array(
					array(
					  'setting'  => 'medibazar_preloader',
					  'operator' => '==',
					  'value'    => '0',
					),
				),
			)
		);
		
	/*====== medibazar Widgets ======*/
		/*====== Widgets Panels ======*/
		Kirki::add_panel (
			'medibazar_widgets_panel',
			array(
				'title' => esc_html__( 'medibazar Widgets', 'medibazar-core' ),
				'description' => esc_html__( 'You can customize the medibazar widgets.', 'medibazar-core' ),
			)
		);

		$sections = array (
			
			'footer_about' => array(
				esc_attr__( 'Footer About', 'medibazar-core' ),
				esc_attr__( 'You can customize the footer about widget.', 'medibazar-core' )
			),

			'footer_contact' => array(
				esc_attr__( 'Footer Contact', 'medibazar-core' ),
				esc_attr__( 'You can customize the footer contact widget.', 'medibazar-core' )
			),
		
			'contact_box' => array(
				esc_attr__( 'Contact Box', 'medibazar-core' ),
				esc_attr__( 'You can customize the contact box widget.', 'medibazar-core' )
			),
			
			'social_list' => array(
				esc_attr__( 'Social List', 'medibazar-core' ),
				esc_attr__( 'You can customize the social list widget.', 'medibazar-core' )
			),
		);

		foreach ( $sections as $section_id => $section ) {
			$section_args = array(
				'title' => $section[0],
				'description' => $section[1],
				'panel' => 'medibazar_widgets_panel',
			);

			if ( isset( $section[2] ) ) {
				$section_args['type'] = $section[2];
			}

			Kirki::add_section( 'medibazar_' . str_replace( '-', '_', $section_id ) . '_section', $section_args );
		}
		
		
		/*====== Footer About Widget Textarea ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'medibazar_footer_about_text',
				'label' => esc_attr__( 'Content', 'medibazar-core' ),
				'description' => esc_attr__( 'You can set text for the about widget.', 'medibazar-core' ),
				'section' => 'medibazar_footer_about_section',
				'default' => '',
			)
		);
		
		/*====== Footer About Widget Social======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'repeater',
				'settings' => 'medibazar_footer_about_social',
				'label' => esc_attr__( 'Footer About Social', 'medibazar-core' ),
				'description' => esc_attr__( 'You can set the widget settings.', 'medibazar-core' ),
				'section' => 'medibazar_footer_about_section',
				'fields' => array(
					'social_icon' => array(
						'type' => 'text',
						'label' => esc_attr__( 'Icon', 'medibazar-core' ),
						'description' => esc_attr__( 'You can set an icon from fontawesome.com for example; "facebook-f"', 'medibazar-core' ),
					),

					'social_url' => array(
						'type' => 'text',
						'label' => esc_attr__( 'URL', 'medibazar-core' ),
						'description' => esc_attr__( 'You can set url for the item.', 'medibazar-core' ),
					),

				),
			)
		);

		/*====== Footer Contact Widget Repeater ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'repeater',
				'settings' => 'medibazar_footer_contact_widget',
				'label' => esc_attr__( 'Contact', 'medibazar-core' ),
				'description' => esc_attr__( 'You can set contact details for medibazar Contact Widget.', 'medibazar-core' ),
				'section' => 'medibazar_footer_contact_section',
				'fields' => array(
				
					'contact_icon' => array(
						'type' => 'text',
						'label' => esc_attr__( 'Contact Icon', 'medibazar-core' ),
						'description' => esc_attr__( 'set an icon.', 'medibazar-core' ),
					),

					'contact_info' => array(
						'type' => 'textarea',
						'label' => esc_attr__( 'Contact Info', 'medibazar-core' ),
						'description' => esc_attr__( 'Add contact details.', 'medibazar-core' ),
					),
					
					
				),
			)
		);
		
		
		
		/*====== Contact Box Widget ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'repeater',
				'settings' => 'medibazar_contact_box_widget',
				'label' => esc_attr__( 'Contact Box Widget', 'medibazar-core' ),
				'description' => esc_attr__( 'You can set contact detail.', 'medibazar-core' ),
				'section' => 'medibazar_contact_box_section',
				'fields' => array(
					'contact_title' => array(
						'type' => 'textarea',
						'label' => esc_attr__( 'Title', 'medibazar-core' ),
						'description' => esc_attr__( 'You can enter a text.', 'medibazar-core' ),
					),

					'contact_subtitle' => array(
						'type' => 'textarea',
						'label' => esc_attr__( 'Subtitle', 'medibazar-core' ),
						'description' => esc_attr__( 'You can enter a text.', 'medibazar-core' ),
					),
				),
			)
		);
		
		/*====== Social List Widget ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'repeater',
				'settings' => 'medibazar_social_list_widget',
				'label' => esc_attr__( 'Social List Widget', 'medibazar-core' ),
				'description' => esc_attr__( 'You can set social icons.', 'medibazar-core' ),
				'section' => 'medibazar_social_list_section',
				'fields' => array(
					'social_icon' => array(
						'type' => 'text',
						'label' => esc_attr__( 'Icon', 'medibazar-core' ),
						'description' => esc_attr__( 'You can set an icon from fontawesome.com for example; "facebook"', 'medibazar-core' ),
					),

					'social_url' => array(
						'type' => 'text',
						'label' => esc_attr__( 'URL', 'medibazar-core' ),
						'description' => esc_attr__( 'You can set url for the item.', 'medibazar-core' ),
					),

				),
			)
		);
		
	/*====== Footer ======*/
		/*====== Footer Panels ======*/
		Kirki::add_panel (
			'medibazar_footer_panel',
			array(
				'title' => esc_html__( 'Footer Settings', 'medibazar-core' ),
				'description' => esc_html__( 'You can customize the footer from this panel.', 'medibazar-core' ),
			)
		);

		$sections = array (

			'top_footer' => array(
				esc_attr__( 'Top Footer', 'medibazar-core' ),
				esc_attr__( 'You can customize the top footer settings.', 'medibazar-core' )
			),
			
			'footer_general' => array(
				esc_attr__( 'Footer General', 'medibazar-core' ),
				esc_attr__( 'You can customize the footer settings.', 'medibazar-core' )
			),

			'footer_color' => array(
				esc_attr__( 'Footer Color', 'medibazar-core' ),
				esc_attr__( 'You can customize the footer colors.', 'medibazar-core' )
			),
		);

		foreach ( $sections as $section_id => $section ) {
			$section_args = array(
				'title' => $section[0],
				'description' => $section[1],
				'panel' => 'medibazar_footer_panel',
			);

			if ( isset( $section[2] ) ) {
				$section_args['type'] = $section[2];
			}

			Kirki::add_section( 'medibazar_' . str_replace( '-', '_', $section_id ) . '_section', $section_args );
		}

		
		/*====== Top Header Text ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'medibazar_top_footer_text',
				'label' => esc_attr__( 'Text', 'medibazar-core' ),
				'description' => esc_attr__( 'You can add the instagram shortcode. for example: [instagram-feed]', 'medibazar-core' ),
				'section' => 'medibazar_top_footer_section',
				'default' => 'instagram-feed',
			)
		);
		
		/*====== Copyright ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'medibazar_copyright',
				'label' => esc_attr__( 'Copyright', 'medibazar-core' ),
				'description' => esc_attr__( 'You can set a copyright text for the footer.', 'medibazar-core' ),
				'section' => 'medibazar_footer_general_section',
				'default' => '',
			)
		);

		/*====== Footer Menu Toggle ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'medibazar_footer_menu',
				'label' => esc_attr__( 'Footer Menu', 'medibazar-core' ),
				'description' => esc_attr__( 'Disable or Enable the footer menu.', 'medibazar-core' ),
				'section' => 'medibazar_footer_general_section',
				'default' => '0',
			)
		);

		/*====== Footer Column ======*/
		medibazar_customizer_add_field (
			array(
				'type'        => 'radio-buttonset',
				'settings'    => 'medibazar_footer_column',
				'description' => esc_attr__( 'You can set footer column.', 'medibazar-core' ),
				'section'     => 'medibazar_footer_general_section',
				'default'     => '4columns',
				'priority'    => 10,
				'choices'     => [
					'3columns'  => esc_html__( '3 columns', 'medibazar' ),
					'4columns' 	=> esc_html__( '4 columns', 'medibazar' ),
					'5columns'  => esc_html__( '5 columns', 'medibazar' ),
				],
			)
		);

		/*====== Footer Column Padding Top  ======*/
		medibazar_customizer_add_field (
			array(
				'type'        => 'slider',
				'settings'    => 'medibazar_footer_column_padding_top',
				'label'       => esc_html__( 'Footer Column Padding', 'medibazar' ),
				'description' => esc_attr__( 'Padding-Top.', 'medibazar' ),
				'section'     => 'medibazar_footer_general_section',
				'default'     => 0,
				'choices'     => [
					'min'  => 0,
					'max'  => 300,
					'step' => 1,
				],
				'output' => [
				[
					'element' => '.footer-wrapper',
					'property'    => 'padding-top',
					'units' => 'px',
				], ],
				
			)
		);
		
		/*====== Footer Column Padding Bottom  ======*/
		medibazar_customizer_add_field (
			array(
				'type'        => 'slider',
				'settings'    => 'medibazar_footer_column_padding_bottom',
				'section'     => 'medibazar_footer_general_section',
				'description' => esc_attr__( 'Padding-Bottom.', 'medibazar' ),
				'default'     => 0,
				'choices'     => [
					'min'  => 0,
					'max'  => 300,
					'step' => 1,
				],
				'output' => [
				[
					'element' => '.footer-wrapper',
					'property'    => 'padding-bottom',
					'units' => 'px',
				], ],
			)
		);

		/*====== Footer Top BG color ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'medibazar_footer_top_bg',
				'label' => esc_attr__( 'Footer Top Background', 'medibazar-core' ),
				'description' => esc_attr__( 'You can set a color for top footer background.', 'medibazar-core' ),
				'section' => 'medibazar_footer_color_section',
			)
		);
		
		/*====== Footer Top Widget Title Style ======*/
		medibazar_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'medibazar_footer_top_widget_title_typo',
				'label'       => esc_attr__( 'Footer Top Widget Title Featured Typography', 'medibazar' ),
				'section'     => 'medibazar_footer_color_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '20px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => 'h3.footer-title',
					],
				],		
			)
		);

		/*====== Footer Top Widget Title color ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#333333',
				'settings' => 'medibazar_footer_top_widget_title_color',
				'label' => esc_attr__( 'Footer Top Widget Title Color', 'medibazar-core' ),
				'description' => esc_attr__( 'You can set a color for top footer widget title.', 'medibazar-core' ),
				'section' => 'medibazar_footer_color_section',
			)
		);
		
		/*====== Footer Top Widget Title Hover color ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#333333',
				'settings' => 'medibazar_footer_top_widget_title_hvrcolor',
				'label' => esc_attr__( 'Footer Top Widget Title Hover Color', 'medibazar-core' ),
				'description' => esc_attr__( 'You can set a color for top footer widget title.', 'medibazar-core' ),
				'section' => 'medibazar_footer_color_section',
			)
		);
		
		/*====== Footer Top Widget Text Style ======*/
		medibazar_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'medibazar_footer_top_widget_text_typo',
				'label'       => esc_attr__( 'Footer Top Widget Text Featured Typography', 'medibazar' ),
				'section'     => 'medibazar_footer_color_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '15px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => '.footer-area p, .klbfooterwidget ul li a, .footer-icon a',
					],
				],		
			)
		);

		/*====== Footer Top Widget Text color ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#9b9b9b',
				'settings' => 'medibazar_footer_top_widget_text_color',
				'label' => esc_attr__( 'Footer Top Widget Text Color', 'medibazar-core' ),
				'description' => esc_attr__( 'You can set a color for top footer widget text.', 'medibazar-core' ),
				'section' => 'medibazar_footer_color_section',
			)
		);
		
		/*====== Footer Top Widget Text Hover color ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#9b9b9b',
				'settings' => 'medibazar_footer_top_widget_text_hvrcolor',
				'label' => esc_attr__( 'Footer Top Widget Text Hover Color', 'medibazar-core' ),
				'description' => esc_attr__( 'You can set a color for top footer widget text.', 'medibazar-core' ),
				'section' => 'medibazar_footer_color_section',
			)
		);
		
		/*====== Footer Bottom BG ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'medibazar_footer_bottom_bg',
				'label' => esc_attr__( 'Footer Bottom Background', 'medibazar-core' ),
				'description' => esc_attr__( 'You can set a color for bottom footer background.', 'medibazar-core' ),
				'section' => 'medibazar_footer_color_section',
			)
		);
		
		/*====== Footer Bottom Font Style ======*/
		medibazar_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'medibazar_footer_bottom_font_typo',
				'label'       => esc_attr__( 'Footer Bottom Font Featured Typography', 'medibazar' ),
				'section'     => 'medibazar_footer_color_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '15px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => '.footer-bottom-link ul li a, .copyright p',
					],
				],		
			)
		);

		/*====== Footer Bottom Font Color ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#9b9b9b',
				'settings' => 'medibazar_footer_bottom_font_color',
				'label' => esc_attr__( 'Footer Bottom Font Color', 'medibazar-core' ),
				'description' => esc_attr__( 'You can set a color for bottom footer font.', 'medibazar-core' ),
				'section' => 'medibazar_footer_color_section',
			)
		);
		
		/*====== Footer Bottom Font Hover Color ======*/
		medibazar_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#9b9b9b',
				'settings' => 'medibazar_footer_bottom_font_hvrcolor',
				'label' => esc_attr__( 'Footer Bottom Font Hover Color', 'medibazar-core' ),
				'description' => esc_attr__( 'You can set a color for bottom footer font.', 'medibazar-core' ),
				'section' => 'medibazar_footer_color_section',
			)
		);
		

