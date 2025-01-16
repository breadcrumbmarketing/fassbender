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
	'Fassbender_customizer', array(
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
		esc_attr__( 'Shop Settings', 'Fassbender-core' ),
		esc_attr__( 'You can customize the shop settings.', 'Fassbender-core' ),
	),
	
	'blog_settings' => array (
		esc_attr__( 'Blog Settings', 'Fassbender-core' ),
		esc_attr__( 'You can customize the blog settings.', 'Fassbender-core' ),
	),

	'header_settings' => array (
		esc_attr__( 'Header Settings', 'Fassbender-core' ),
		esc_attr__( 'You can customize the header settings.', 'Fassbender-core' ),
	),

	'main_color' => array (
		esc_attr__( 'Main Color', 'Fassbender-core' ),
		esc_attr__( 'You can customize the main color.', 'Fassbender-core' ),
	),
	
	'elementor_templates' => array (
		esc_attr__( 'Elementor Templates', 'Fassbender-core' ),
		esc_attr__( 'You can customize the elementor templates.', 'Fassbender-core' ),
	),
	
	'map_settings' => array (
		esc_attr__( 'Map Settings', 'Fassbender-core' ),
		esc_attr__( 'You can customize the map settings.', 'Fassbender-core' ),
	),

	'footer_settings' => array (
		esc_attr__( 'Footer Settings', 'Fassbender-core' ),
		esc_attr__( 'You can customize the footer settings.', 'Fassbender-core' ),
	),
	
	'Fassbender_widgets' => array (
		esc_attr__( 'Fassbender Widgets', 'Fassbender-core' ),
		esc_attr__( 'You can customize the Fassbender widgets.', 'Fassbender-core' ),
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
		Kirki::add_section( 'Fassbender_' . str_replace( '-', '_', $section_id ) . '_section', $section_args );
	}
}


/*======
*
* Fields
*
======*/
function Fassbender_customizer_add_field ( $args ) {
	Kirki::add_field(
		'Fassbender_customizer',
		$args
	);
}

	/*====== Shop ======*/
		/*====== Shop Panels ======*/
		Kirki::add_panel (
			'Fassbender_shop_panel',
			array(
				'title' => esc_html__( 'Shop Settings', 'Fassbender-core' ),
				'description' => esc_html__( 'You can customize the shop from this panel.', 'Fassbender-core' ),
			)
		);

		$sections = array (
			'shop_general' => array(
				esc_attr__( 'General', 'Fassbender-core' ),
				esc_attr__( 'You can customize shop settings.', 'Fassbender-core' )
			),
			
			'single_product' => array(
				esc_attr__( 'Single Product', 'Fassbender-core' ),
				esc_attr__( 'You can customize shop single settings.', 'Fassbender-core' )
			),
			
			'shop_breadcrumb' => array(
				esc_attr__( 'Breadcrumb', 'Fassbender-core' ),
				esc_attr__( 'You can customize shop settings.', 'Fassbender-core' )
			),
			
			'mobile_bottom_menu_style' => array(
				esc_attr__( 'Mobile Bottom Menu Style ', 'Fassbender-core' ),
				esc_attr__( 'You can customize the mobile menu.', 'Fassbender-core' )
			),
			
			'testimonial_slider_widget' => array(
				esc_attr__( 'Testimonial Slider Widget', 'Fassbender-core' ),
				esc_attr__( 'When you add the Testimonial Slider Widget in Dashboard > Appearance > Widgets, you can customize the settings from there.', 'Fassbender-core' )
			),

		);

		foreach ( $sections as $section_id => $section ) {
			$section_args = array(
				'title' => $section[0],
				'description' => $section[1],
				'panel' => 'Fassbender_shop_panel',
			);

			if ( isset( $section[2] ) ) {
				$section_args['type'] = $section[2];
			}

			Kirki::add_section( 'Fassbender_' . str_replace( '-', '_', $section_id ) . '_section', $section_args );
		}
		
		/*====== Shop Layouts ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'radio-buttonset',
				'settings' => 'Fassbender_shop_layout',
				'label' => esc_attr__( 'Layout', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can choose a layout for the shop.', 'Fassbender-core' ),
				'section' => 'Fassbender_shop_general_section',
				'default' => 'left-sidebar',
				'choices' => array(
					'left-sidebar' => esc_attr__( 'Left Sidebar', 'Fassbender-core' ),
					'full-width' => esc_attr__( 'Full Width', 'Fassbender-core' ),
					'right-sidebar' => esc_attr__( 'Right Sidebar', 'Fassbender-core' ),
				),
			)
		);
		
		/*====== Pagination Type ======*/
		Fassbender_customizer_add_field(
			array (
			'type'        => 'radio-buttonset',
			'settings'    => 'Fassbender_paginate_type',
			'label'       => esc_html__( 'Pagination Type', 'Fassbender-core' ),
			'section'     => 'Fassbender_shop_general_section',
			'default'     => 'default',
			'priority'    => 10,
			'choices'     => array(
				'default' => esc_attr__( 'Default', 'Fassbender-core' ),
				'loadmore' => esc_attr__( 'Load More', 'Fassbender-core' ),
				'infinite' => esc_attr__( 'Infinite', 'Fassbender-core' ),
			),
			) 
		);
		
		/*====== Shop Mobile Column======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'Fassbender_shop_mobile_column',
				'label' => esc_attr__( 'Shop Mobile Column', 'Fassbender-core' ),
				'description' => esc_attr__( 'Set column for the mobile column.', 'Fassbender-core' ),
				'section' => 'Fassbender_shop_general_section',
				'default' => '1column',
				'choices' => array(
					'1column' => esc_attr__( '1 column', 'Fassbender-core' ),
					'2columns' => esc_attr__( '2 columns', 'Fassbender-core' ),
					'3columns' => esc_attr__( '3 columns', 'Fassbender-core' ),
				),
			)
		);

		/*====== Ajax on Shop Page ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'Fassbender_ajax_on_shop',
				'label' => esc_attr__( 'Ajax on Shop Page', 'Fassbender-core' ),
				'description' => esc_attr__( 'Disable or Enable Ajax for the shop page.', 'Fassbender-core' ),
				'section' => 'Fassbender_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Grid-List Toggle ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'Fassbender_grid_list_view',
				'label' => esc_attr__( 'Grid List View', 'Fassbender-core' ),
				'description' => esc_attr__( 'Disable or Enable grid list view on shop page.', 'Fassbender-core' ),
				'section' => 'Fassbender_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Quick View Toggle ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'Fassbender_quick_view_button',
				'label' => esc_attr__( 'Quick View Button', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can choose status of the quick view button.', 'Fassbender-core' ),
				'section' => 'Fassbender_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Wishlist Toggle ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'Fassbender_wishlist_button',
				'label' => esc_attr__( 'Custom Wishlist Button', 'Fassbender-core' ),
				'description' => esc_attr__( 'Sie können den Status der Wunschlisten-Schaltfläche auswählen.', 'Fassbender-core' ),
				'section' => 'Fassbender_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Recently Viewed Products ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'Fassbender_recently_viewed_products',
				'label' => esc_attr__( 'Recently Viewed Products', 'Fassbender-core' ),
				'description' => esc_attr__( 'Kürzlich angesehene Produkte deaktivieren oder aktivieren.', 'Fassbender-core' ),
				'section' => 'Fassbender_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Product Stock Quantity ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'Fassbender_stock_quantity',
				'label' => esc_attr__( 'Stock Quantity', 'Fassbender-core' ),
				'description' => esc_attr__( 'Show stock quantity on the label.', 'Fassbender-core' ),
				'section' => 'Fassbender_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Product Min/Max Quantity ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'Fassbender_min_max_quantity',
				'label' => esc_attr__( 'Min/Max Quantity', 'Fassbender-core' ),
				'description' => esc_attr__( 'Enable the additional quantity setting fields in product detail page.', 'Fassbender-core' ),
				'section' => 'Fassbender_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Ajax Notice Shop ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'Fassbender_shop_notice_ajax_addtocart',
				'label' => esc_attr__( 'Ajax Notice', 'Fassbender' ),
				'description' => esc_attr__( 'You can choose status of the ajax notice feature.', 'Fassbender' ),
				'section' => 'Fassbender_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Category Description ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'Fassbender_category_description_after_content',
				'label' => esc_attr__( 'Category Desc After Content', 'Fassbender-core' ),
				'description' => esc_attr__( 'Add the category description after the products.', 'Fassbender-core' ),
				'section' => 'Fassbender_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Catalog Mode - Disable Add to Cart ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'Fassbender_catalog_mode',
				'label' => esc_attr__( 'Catalog Mode', 'Fassbender-core' ),
				'description' => esc_attr__( 'Disable Add to Cart button on the shop page.', 'Fassbender-core' ),
				'section' => 'Fassbender_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Min Order Amount ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'Fassbender_min_order_amount_toggle',
				'label' => esc_attr__( 'Min Order Amount', 'Fassbender-core' ),
				'description' => esc_attr__( 'Enable Min Order Amount.', 'Fassbender-core' ),
				'section' => 'Fassbender_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Min Order Amount Value ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'Fassbender_min_order_amount_value',
				'label' => esc_attr__( 'Min Order Value', 'Fassbender-core' ),
				'description' => esc_attr__( 'Set amount to specify a minimum order value.', 'Fassbender-core' ),
				'section' => 'Fassbender_shop_general_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'Fassbender_min_order_amount_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);

		Fassbender_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'Fassbender_mobile_bottom_menu',
				'label' => esc_attr__( 'Mobile Bottom Menu', 'Fassbender-core' ),
				'description' => esc_attr__( 'Disable or Enable the bottom menu on mobile.', 'Fassbender-core' ),
				'section' => 'Fassbender_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Mobile Bottom Menu Edit Toggle======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'Fassbender_mobile_bottom_menu_edit_toggle',
				'label' => esc_attr__( 'Mobile Bottom Menu Edit', 'Fassbender-core' ),
				'description' => esc_attr__( 'Edit the mobile bottom menu.', 'Fassbender-core' ),
				'section' => 'Fassbender_shop_general_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'Fassbender_mobile_bottom_menu',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
				
			)
			
		);
		
		/*====== Mobile Menu Repeater ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'repeater',
				'settings' => 'Fassbender_mobile_bottom_menu_edit',
				'label' => esc_attr__( 'Mobile Bottom Menu Edit', 'Fassbender-core' ),
				'description' => esc_attr__( 'Edit the mobile bottom menu.', 'Fassbender-core' ),
				'section' => 'Fassbender_shop_general_section',
				'required' => array(
					array(
					  'setting'  => 'Fassbender_mobile_bottom_menu_edit_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
				'fields' => array(
					'mobile_menu_type' => array(
						'type' => 'select',
						'label' => esc_attr__( 'Select Type', 'Fassbender-core' ),
						'description' => esc_attr__( 'You can select a type', 'Fassbender-core' ),
						'default' => 'default',
						'choices' => array(
							'default' 	=> esc_attr__( 'Default', 'Fassbender-core' ),
							'Home'		=> esc_attr__( 'Home', 'Fassbender-core' ),
							'Shop' 		=> esc_attr__( 'Shop', 'Fassbender-core' ),
							'Filter' 	=> esc_attr__( 'Filter', 'Fassbender-core' ),
							'Cart' 		=> esc_attr__( 'Cart', 'Fassbender-core' ),
							'Myaccount' => esc_attr__( 'Myaccount', 'Fassbender-core' ),
						),
					),
				
					'mobile_menu_icon' => array(
						'type' 			=> 'text',
						'label' 		=> esc_attr__( 'Icon', 'Fassbender-core' ),
						'description' 	=> esc_attr__( 'You can set an icon. for example; "home"', 'Fassbender-core' ),
					),

					'mobile_menu_url' => array(
						'type'			=> 'text',
						'label' 		=> esc_attr__( 'URL', 'Fassbender-core' ),
						'description' 	=> esc_attr__( 'You can set url for the item.', 'Fassbender-core' ),
					),
				),
				
			)
		);

		/*====== Product Image Size ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'dimensions',
				'settings' => 'Fassbender_product_image_size',
				'label' => esc_attr__( 'Product Image Size', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can set size of the product image for the shop page.', 'Fassbender-core' ),
				'section' => 'Fassbender_shop_general_section',
				'default' => array(
					'width' => '',
					'height' => '',
				),
			)
		);
		
		/*====== Shop Single Image Column ======*/
		Fassbender_customizer_add_field (
			array(
				'type'        => 'slider',
				'settings'    => 'Fassbender_shop_single_image_column',
				'label'       => esc_html__( 'Image Column', 'Fassbender-core' ),
				'section'     => 'Fassbender_single_product_section',
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
		Fassbender_customizer_add_field (
			array(
				'type' => 'sortable',
				'settings' => 'Fassbender_shop_single_reorder',
				'label' => esc_attr__( 'Re-order Product Summary', 'Fassbender' ),
				'description' => esc_attr__( 'Please save the changes and refresh the page once. Live preview is not available for the option.', 'Fassbender' ),
				'section' => 'Fassbender_single_product_section',
				'default'     => [
					'woocommerce_template_single_title',
					'woocommerce_template_single_rating',
					'woocommerce_template_single_price',
					'woocommerce_template_single_excerpt',
					'woocommerce_template_single_add_to_cart',
					'woocommerce_template_single_meta',
					'Fassbender_social_share',
				],
				'choices'     => [
					'woocommerce_template_single_title' => esc_html__( 'Title', 'Fassbender' ),
					'woocommerce_template_single_rating' => esc_html__( 'Rating', 'Fassbender' ),
					'woocommerce_template_single_price' => esc_html__( 'Price', 'Fassbender' ),
					'woocommerce_template_single_excerpt' => esc_html__( 'Excerpt', 'Fassbender' ),
					'woocommerce_template_single_add_to_cart' => esc_html__( 'Add to Cart', 'Fassbender' ),
					'woocommerce_template_single_meta' => esc_html__( 'Meta', 'Fassbender' ),
					'Fassbender_social_share' => esc_html__( 'Share', 'Fassbender' ),
					'Fassbender_product_stock_progress_bar' => esc_html__( 'Progress Bar', 'Fassbender-core' ),
					'Fassbender_product_time_countdown' => esc_html__( 'Time Countdown', 'Fassbender-core' ),
				],
			)
		);
		
		
		/*====== Shop Products Navigation  ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'Fassbender_products_navigation',
				'label' => esc_attr__( 'Products Navigation', 'Fassbender-core' ),
				'section' => 'Fassbender_single_product_section',
				'default' => '0',
			)
		);
		
		/*====== Shop Single Ajax Add To Cart ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'Fassbender_shop_single_ajax_addtocart',
				'label' => esc_attr__( 'Ajax Add to Cart', 'Fassbender-core' ),
				'description' => esc_attr__( 'Disable or Enable ajax add to cart button.', 'Fassbender-core' ),
				'section' => 'Fassbender_single_product_section',
				'default' => '0',
			)
		);
		
		/*====== Product360 View ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'Fassbender_shop_single_product360',
				'label' => esc_attr__( 'Product360 View', 'Fassbender' ),
				'section' => 'Fassbender_single_product_section',
				'default' => '0',
			)
		);
		
		/*====== Shop Single Image Zoom  ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'Fassbender_single_image_zoom',
				'label' => esc_attr__( 'Image Zoom', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can choose status of the zoom feature.', 'Fassbender-core' ),
				'section' => 'Fassbender_single_product_section',
				'default' => '0',
			)
		);
		
		/*======  Sticky Single Cart ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'Fassbender_single_sticky_cart',
				'label' => esc_attr__( 'Sticky Add to Cart', 'Fassbender-core' ),
				'description' => esc_attr__( 'Disable or Enable sticky cart button.', 'Fassbender-core' ),
				'section' => 'Fassbender_single_product_section',
				'default' => '0',
			)
		);
		
		/*====== Mobile Sticky Single Cart ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'Fassbender_mobile_single_sticky_cart',
				'label' => esc_attr__( 'Mobile Sticky Add to Cart', 'Fassbender-core' ),
				'description' => esc_attr__( 'Disable or Enable sticky cart button on mobile.', 'Fassbender-core' ),
				'section' => 'Fassbender_single_product_section',
				'default' => '0',
			)
		);
		
		/*====== Move Review Tab ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'Fassbender_shop_single_review_tab_move',
				'label' => esc_attr__( 'Move Review Tab', 'Fassbender' ),
				'description' => esc_attr__( 'Move the review tab out of tabs', 'Fassbender-core' ),
				'section' => 'Fassbender_single_product_section',
				'default' => '0',
			)
		);
		
		/*====== Buy Now Single ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'Fassbender_shop_single_buy_now',
				'label' => esc_attr__( 'Buy Now Button', 'Fassbender-core' ),
				'description' => esc_attr__( 'Disable or Enable Buy Now button.', 'Fassbender-core' ),
				'section' => 'Fassbender_single_product_section',
				'default' => '0',
			)
		);
		
		/*====== Order on WhatsApp ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'Fassbender_shop_single_orderonwhatsapp',
				'label' => esc_attr__( 'Order on WhatsApp', 'Fassbender' ),
				'section' => 'Fassbender_single_product_section',
				'default' => '0',
			)
		);
		
		/*====== Order on WhatsApp Number======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'Fassbender_shop_single_whatsapp_number',
				'label' => esc_attr__( 'WhatsApp Number', 'Fassbender' ),
				'description' => esc_attr__( 'You can add a phone number for order on WhatsApp.', 'Fassbender' ),
				'section' => 'Fassbender_single_product_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'Fassbender_shop_single_orderonwhatsapp',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Single Social Share ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'Fassbender_shop_social_share',
				'label' => esc_attr__( 'Social Share', 'Fassbender-core' ),
				'description' => esc_attr__( 'Disable or Enable social share buttons.', 'Fassbender-core' ),
				'section' => 'Fassbender_single_product_section',
				'default' => '0',
			)
		);
		
		/*====== Shop Single Social Share ======*/
		Fassbender_customizer_add_field (
			array(
				'type'        => 'multicheck',
				'settings'    => 'Fassbender_shop_single_share',
				'section'     => 'Fassbender_single_product_section',
				'default'     => array('facebook','twitter', 'pinterest', 'linkedin'  ),
				'priority'    => 10,
				'choices'     => [
					'facebook'  => esc_html__( 'Facebook', 	'Fassbender-core' ),
					'twitter' 	=> esc_html__( 'Twitter', 	'Fassbender-core' ),
					'pinterest' => esc_html__( 'Pinterest', 'Fassbender-core' ),
					'linkedin'  => esc_html__( 'Linkedin', 	'Fassbender-core' ),
				],
				'required' => array(
					array(
					  'setting'  => 'Fassbender_shop_social_share',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Shop Single Banner Toggle======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'Fassbender_shop_single_banner_toggle',
				'label' => esc_attr__( 'Banner', 'Fassbender-core' ),
				'description' => esc_attr__( 'Disable or Enable the banner.', 'Fassbender-core' ),
				'section' => 'Fassbender_single_product_section',
				'default' => '0',
			)
		);
		
		/*====== Shop Single Banner======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'Fassbender_shop_single_banner_img',
				'label' => esc_attr__( 'Banner Image', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can upload an image for the banner section.', 'Fassbender-core' ),
				'section' => 'Fassbender_single_product_section',
				'choices' => array(
					'save_as' => 'id',
				),
				'required' => array(
					array(
					  'setting'  => 'Fassbender_shop_single_banner_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Shop Single Banner URL======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'Fassbender_shop_single_banner_url',
				'label' => esc_attr__( 'Banner URL', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can set an url for the banner', 'Fassbender-core' ),
				'section' => 'Fassbender_single_product_section',
				'default' => '#',
				'required' => array(
					array(
					  'setting'  => 'Fassbender_shop_single_banner_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Breadcrumb Toggle ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'Fassbender_shop_breadcrumb',
				'label' => esc_attr__( 'Breadcrumb', 'Fassbender-core' ),
				'description' => esc_attr__( 'Disable or Enable breadcrumb on shop pages.', 'Fassbender-core' ),
				'section' => 'Fassbender_shop_breadcrumb_section',
				'default' => '0',
			)
		);
		
		Fassbender_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'Fassbender_shop_breadcrumb_bg',
				'label' => esc_attr__( 'Breadcrumb Background', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can upload a background image for the breadcrumb.', 'Fassbender-core' ),
				'section' => 'Fassbender_shop_breadcrumb_section',
				'choices' => array(
					'save_as' => 'id',
				),
				'required' => array(
					array(
					  'setting'  => 'Fassbender_shop_breadcrumb',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Breadcrumb Text ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'Fassbender_breadcrumb_title',
				'label' => esc_attr__( 'Breadcrumb Title', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can set a title for the breadcrumb..', 'Fassbender-core' ),
				'section' => 'Fassbender_shop_breadcrumb_section',
				'default' => 'Products',
				'required' => array(
					array(
					  'setting'  => 'Fassbender_shop_breadcrumb',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*======  Mobile Menu Background Color ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'Fassbender_mobile_menu_bg_color',
				'label' => esc_attr__( 'Mobile Menu Background Color', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can set a background color.', 'Fassbender-core' ),
				'section' => 'Fassbender_mobile_bottom_menu_style_section',
			)
		);
		
		/*======  Mobile Menu Border Color ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#edf1f4',
				'settings' => 'Fassbender_mobile_menu_border_color',
				'label' => esc_attr__( 'Mobile Menu Border Color', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can set a border color.', 'Fassbender-core' ),
				'section' => 'Fassbender_mobile_bottom_menu_style_section',
			)
		);
		
		/*======  Mobile Menu Icon Color ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#9b9b9b',
				'settings' => 'Fassbender_mobile_menu_icon_color',
				'label' => esc_attr__( 'Mobile Menu Icon Color', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can set a color.', 'Fassbender-core' ),
				'section' => 'Fassbender_mobile_bottom_menu_style_section',
			)
		);
		
		/*======  Mobile Menu Icon Hover Color ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#9b9b9b',
				'settings' => 'Fassbender_mobile_menu_icon_hvrcolor',
				'label' => esc_attr__( 'Mobile Menu Icon Hover Color', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can set a color.', 'Fassbender-core' ),
				'section' => 'Fassbender_mobile_bottom_menu_style_section',
			)
		);

	/*====== Blog Settings ======*/
		/*====== Layouts ======*/
		
		Fassbender_customizer_add_field (
			array(
				'type' => 'radio-buttonset',
				'settings' => 'Fassbender_blog_layout',
				'label' => esc_attr__( 'Layout', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can choose a layout.', 'Fassbender-core' ),
				'section' => 'Fassbender_blog_settings_section',
				'default' => 'right-sidebar',
				'choices' => array(
					'left-sidebar' => esc_attr__( 'Left Sidebar', 'Fassbender-core' ),
					'full-width' => esc_attr__( 'Full Width', 'Fassbender-core' ),
					'right-sidebar' => esc_attr__( 'Right Sidebar', 'Fassbender-core' ),
				),
			)
		);
		
		/*====== Blog Breadcrumb Toggle ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'Fassbender_blog_breadcrumb',
				'label' => esc_attr__( 'Breadcrumb', 'Fassbender-core' ),
				'description' => esc_attr__( 'Disable or Enable breadcrumb on blog pages.', 'Fassbender-core' ),
				'section' => 'Fassbender_blog_settings_section',
				'default' => '1',
			)
		);
		
		Fassbender_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'Fassbender_blog_breadcrumb_bg',
				'label' => esc_attr__( 'Breadcrumb Background', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can upload a background image for the breadcrumb.', 'Fassbender-core' ),
				'section' => 'Fassbender_blog_settings_section',
				'choices' => array(
					'save_as' => 'id',
				),
				'required' => array(
					array(
					  'setting'  => 'Fassbender_blog_breadcrumb',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Blog Breadcrumb Text ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'Fassbender_blog_breadcrumb_title',
				'label' => esc_attr__( 'Breadcrumb Title', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can set a title for the breadcrumb..', 'Fassbender-core' ),
				'section' => 'Fassbender_blog_settings_section',
				'default' => 'Blog Posts',
				'required' => array(
					array(
					  'setting'  => 'Fassbender_blog_breadcrumb',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Main color ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#4e97fd',
				'settings' => 'Fassbender_main_color',
				'label' => esc_attr__( 'Main Color', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can customize the main color.', 'Fassbender-core' ),
				'section' => 'Fassbender_main_color_section',
			)
		);

		/*====== Second color ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#e4573d',
				'settings' => 'Fassbender_second_color',
				'label' => esc_attr__( 'Second Color', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can customize the second color.', 'Fassbender-core' ),
				'section' => 'Fassbender_main_color_section',
			)
		);
		
		/*====== Elementor Templates =======================================================*/
		/*====== Before Shop Elementor Templates ======*/
		Fassbender_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'Fassbender_before_main_shop_elementor_template',
				'label'       => esc_html__( 'Before Shop Elementor Template', 'Fassbender' ),
				'section'     => 'Fassbender_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates ', 'Fassbender' ),
				'choices'     => Fassbender_get_elementorTemplates('section'),
			)
		);
		
		/*====== After Shop Elementor Templates ======*/
		Fassbender_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'Fassbender_after_main_shop_elementor_template',
				'label'       => esc_html__( 'After Shop Elementor Template', 'Fassbender' ),
				'section'     => 'Fassbender_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates ', 'Fassbender' ),
				'choices'     => Fassbender_get_elementorTemplates('section'),
			)
		);
		
		/*====== Before Header Elementor Templates ======*/
		Fassbender_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'Fassbender_before_main_header_elementor_template',
				'label'       => esc_html__( 'Before Header Elementor Template', 'Fassbender' ),
				'section'     => 'Fassbender_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates, If you want to show any content before products ', 'Fassbender' ),
				'choices'     => Fassbender_get_elementorTemplates('section'),
			)
		);
	
		/*====== After Header Elementor Templates ======*/
		Fassbender_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'Fassbender_after_main_header_elementor_template',
				'label'       => esc_html__( 'After Header Elementor Template', 'Fassbender' ),
				'section'     => 'Fassbender_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates ', 'Fassbender' ),
				'choices'     => Fassbender_get_elementorTemplates('section'),
			)
		);
		
		/*====== Before Footer Elementor Template ======*/
		Fassbender_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'Fassbender_before_main_footer_elementor_template',
				'label'       => esc_html__( 'Before Footer Elementor Template', 'Fassbender' ),
				'section'     => 'Fassbender_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates, If you want to show any content before products ', 'Fassbender' ),
				'choices'     => Fassbender_get_elementorTemplates('section'),
			)
		);
		
		/*====== After Footer Elementor  Template ======*/
		Fassbender_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'Fassbender_after_main_footer_elementor_template',
				'label'       => esc_html__( 'After Footer Elementor Templates', 'Fassbender' ),
				'section'     => 'Fassbender_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates, If you want to show any content before products ', 'Fassbender' ),
				'choices'     => Fassbender_get_elementorTemplates('section'),
			)
		);
		
		/*====== Templates Repeater For each category ======*/
		add_action( 'init', function() {
			Fassbender_customizer_add_field (
				array(
					'type' => 'repeater',
					'settings' => 'Fassbender_elementor_template_each_shop_category',
					'label' => esc_attr__( 'Template For Categories', 'Fassbender-core' ),
					'description' => esc_attr__( 'You can set template for each category.', 'Fassbender-core' ),
					'section' => 'Fassbender_elementor_templates_section',
					'fields' => array(
						
						'category_id' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'Select Category', 'Fassbender-core' ),
							'description' => esc_html__( 'Set a category', 'Fassbender-core' ),
							'priority'    => 10,
							'default'     => '',
							'choices'     => Kirki_Helper::get_terms( array('taxonomy' => 'product_cat') )
						),
						
						'Fassbender_before_main_shop_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'Before Shop Elementor Template', 'Fassbender-core' ),
							'choices'     => Fassbender_get_elementorTemplates('section'),
							'default'     => '',
							'placeholder' => esc_html__( 'Select a template from elementor templates, If you want to show any content before products ', 'Fassbender-core' ),
						),
						
						'Fassbender_after_main_shop_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'After Shop Elementor Template', 'Fassbender-core' ),
							'choices'     => Fassbender_get_elementorTemplates('section'),
						),
						
						'Fassbender_before_main_header_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'Before Header Elementor Template', 'Fassbender-core' ),
							'choices'     => Fassbender_get_elementorTemplates('section'),
						),
						
						'Fassbender_after_main_header_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'After Header Elementor Template', 'Fassbender-core' ),
							'choices'     => Fassbender_get_elementorTemplates('section'),
						),
						
						'Fassbender_before_main_footer_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'Before Footer Elementor Template', 'Fassbender-core' ),
							'choices'     => Fassbender_get_elementorTemplates('section'),
						),
						
						'Fassbender_after_main_footer_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'After Footer Elementor Template', 'Fassbender-core' ),
							'choices'     => Fassbender_get_elementorTemplates('section'),
						),
						

					),
				)
			);
		} );

		/*====== Map Settings ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'Fassbender_mapapi',
				'label' => esc_attr__( 'Google Map Api key', 'Fassbender-core' ),
				'description' => esc_attr__( 'Add your google map api key', 'Fassbender-core' ),
				'section' => 'Fassbender_map_settings_section',
				'default' => '',
			)
		);
		
	/*====== Header ======*/
		/*====== Header Panels ======*/
		Kirki::add_panel (
			'Fassbender_header_panel',
			array(
				'title' => esc_html__( 'Header Settings', 'Fassbender-core' ),
				'description' => esc_html__( 'You can customize the header from this panel.', 'Fassbender-core' ),
			)
		);

		$sections = array (
			'header_logo' => array(
				esc_attr__( 'Logo', 'Fassbender-core' ),
				esc_attr__( 'You can customize the logo which is on header..', 'Fassbender-core' )
			),
			
			'header_top' => array(
				esc_attr__( 'Header Top', 'Fassbender-core' ),
				esc_attr__( 'You can customize top header..', 'Fassbender-core' )
			),
		
			'header_general' => array(
				esc_attr__( 'Header General', 'Fassbender-core' ),
				esc_attr__( 'You can customize the header.', 'Fassbender-core' )
			),
			
			'header_sidebar_menu' => array(
				esc_attr__( 'Sidebar Menu', 'Fassbender-core' ),
				esc_attr__( 'You can customize the sidebar menu.', 'Fassbender-core' )
			),

			'header_color' => array(
				esc_attr__( 'Header Color', 'Fassbender-core' ),
				esc_attr__( 'You can customize the header color.', 'Fassbender-core' )
			),

			'header_preloader' => array(
				esc_attr__( 'Preloader', 'Fassbender-core' ),
				esc_attr__( 'You can customize the loader.', 'Fassbender-core' )
			),
			

		);

		foreach ( $sections as $section_id => $section ) {
			$section_args = array(
				'title' => $section[0],
				'description' => $section[1],
				'panel' => 'Fassbender_header_panel',
			);

			if ( isset( $section[2] ) ) {
				$section_args['type'] = $section[2];
			}

			Kirki::add_section( 'Fassbender_' . str_replace( '-', '_', $section_id ) . '_section', $section_args );
		}
		
		/*====== Logo ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'Fassbender_logo',
				'label' => esc_attr__( 'Logo', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can upload a logo.', 'Fassbender-core' ),
				'section' => 'Fassbender_header_logo_section',
				'choices' => array(
					'save_as' => 'id',
				),
			)
		);
		
		/*====== Logo Text ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'Fassbender_logo_text',
				'label' => esc_attr__( 'Set Logo Text', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can set logo as text.', 'Fassbender-core' ),
				'section' => 'Fassbender_header_logo_section',
				'default' => 'Fassbender',
			)
		);
		
		/*====== Logo Size ======*/
		Fassbender_customizer_add_field (
			array(
				'type'        => 'slider',
				'settings'    => 'Fassbender_logo_size',
				'label'       => esc_html__( 'Logo Size', 'Fassbender' ),
				'description' => esc_attr__( 'You can set size of the logo.', 'Fassbender' ),
				'section'     => 'Fassbender_header_logo_section',
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
		Fassbender_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'Fassbender_top_header_text',
				'label' => esc_attr__( 'Text', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can set top header text', 'Fassbender-core' ),
				'section' => 'Fassbender_header_top_section',
				'default' => '',
			)
		);

		/*====== Top Header Box text ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'Fassbender_top_header_box_text',
				'label' => esc_attr__( 'Icon', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can set contact icon e.g: linearicons-phone-wave .', 'Fassbender-core' ),
				'section' => 'Fassbender_header_top_section',
				'default' => '+123 (456) 7879',
			)
		);
		
		/*====== Header Contact URL ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'Fassbender_header_contact_url',
				'label' => esc_attr__( 'URL', 'Fassbender-core' ),
				'description' => esc_attr__( 'Add an url.', 'Fassbender-core' ),
				'section' => 'Fassbender_header_contact_detail_section',
				'default' => 'tel:1234567689',
			)
		);
		
		/*====== Header Cart Toggle ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'Fassbender_header_cart',
				'label' => esc_attr__( 'Header Cart', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can choose status of the mini cart on the header.', 'Fassbender-core' ),
				'section' => 'Fassbender_header_general_section',
				'default' => '0',
			)
		);
		
		/*====== Header Search Button Toggle ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'Fassbender_header_search_button',
				'label' => esc_attr__( 'Header Search Button', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can choose status of the search button on the header.', 'Fassbender-core' ),
				'section' => 'Fassbender_header_general_section',
				'default' => '0',
			)
		);

		/*====== Mobile Search on Header ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'Fassbender_header_mobile_search',
				'label' => esc_attr__( 'Mobile Search', 'Fassbender-core' ),
				'description' => esc_attr__( 'Disable or Enable mobile search on header.', 'Fassbender-core' ),
				'section' => 'Fassbender_header_general_section',
				'default' => '0',
			)
		);

		/*====== Top Header Toggle ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'Fassbender_top_header',
				'label' => esc_attr__( 'Top Header', 'Fassbender-core' ),
				'description' => esc_attr__( 'Disable or Enable the top header', 'Fassbender-core' ),
				'section' => 'Fassbender_header_general_section',
				'default' => '0',
			)
		);
		
		/*====== Sidebar Menu Widget ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'Fassbender_header_sidebar_menu',
				'label' => esc_attr__( 'Sidebar Widget', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can add widgets from Dashboard > Appearance > Widgets > Menu Sidebar', 'Fassbender-core' ),
				'section' => 'Fassbender_header_sidebar_menu_section',
				'default' => '0',
			)
		);
		
		/*====== Sidebar Menu Logo ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'Fassbender_sidebar_menu_logo',
				'label' => esc_attr__( 'Logo', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can upload a logo.', 'Fassbender-core' ),
				'section' => 'Fassbender_header_sidebar_menu_section',
				'choices' => array(
					'save_as' => 'id',
				),
				'required' => array(
					array(
					  'setting'  => 'Fassbender_header_sidebar_menu',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Sidebar Menu logo Size ======*/
		Fassbender_customizer_add_field (
			array(
				'type'        => 'slider',
				'settings'    => 'Fassbender_sidebar_logo_size',
				'label'       => esc_html__( 'Sidebar Menu Logo Size', 'Fassbender' ),
				'description' => esc_attr__( 'You can set size of the logo.', 'Fassbender' ),
				'section'     => 'Fassbender_header_sidebar_menu_section',
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
					  'setting'  => 'Fassbender_header_sidebar_menu',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);

		/*====== Top Header BG color ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'Fassbender_top_header_bg',
				'label' => esc_attr__( 'Top Header Bg', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can set a color for top header background.', 'Fassbender-core' ),
				'section' => 'Fassbender_header_color_section',
			)
		);
		
		/*====== Top Header Style ======*/
		Fassbender_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'Fassbender_top_header_font_typography',
				'label'       => esc_attr__( 'Top Header Featured Typography', 'Fassbender' ),
				'section'     => 'Fassbender_header_color_section',
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
		Fassbender_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#9b9b9b',
				'settings' => 'Fassbender_top_header_font_color',
				'label' => esc_attr__( 'Top Header Font Color', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can set a color for top header font.', 'Fassbender-core' ),
				'section' => 'Fassbender_header_color_section',
			)
		);
		
		/*====== Top Header Font Hover color ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#9b9b9b',
				'settings' => 'Fassbender_top_header_font_hvrcolor',
				'label' => esc_attr__( 'Top Header Font Hover Color', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can set a color for top header font.', 'Fassbender-core' ),
				'section' => 'Fassbender_header_color_section',
			)
		);

		/*====== Main Header BG color ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'Fassbender_main_header_bg',
				'label' => esc_attr__( 'Main Header Bg', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can set a color for bottom header background.', 'Fassbender-core' ),
				'section' => 'Fassbender_header_color_section',
			)
		);
		
		/*====== Main Header Style ======*/
		Fassbender_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'Fassbender_main_header_font_typography',
				'label'       => esc_attr__( 'Main Header Featured Typography', 'Fassbender' ),
				'section'     => 'Fassbender_header_color_section',
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
		Fassbender_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#9b9b9b',
				'settings' => 'Fassbender_main_header_font_color',
				'label' => esc_attr__( 'Main Header Font Color', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can set a color for bottom header font.', 'Fassbender-core' ),
				'section' => 'Fassbender_header_color_section',
			)
		);
		
		/*====== Main Header Font Hover color ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#4e97fd',
				'settings' => 'Fassbender_main_header_font_hvrcolor',
				'label' => esc_attr__( 'Main Header Font Hover Color', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can set a color for bottom header font.', 'Fassbender-core' ),
				'section' => 'Fassbender_header_color_section',
			)
		);

		/*====== PreLoader Toggle ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'Fassbender_preloader',
				'label' => esc_attr__( 'Disable Loader', 'Fassbender-core' ),
				'description' => esc_attr__( 'Disable or Enable the loader.', 'Fassbender-core' ),
				'section' => 'Fassbender_header_preloader_section',
				'default' => '0',
			)
		);

		/*====== Loader Image ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'Fassbender_preloader_image',
				'label' => esc_attr__( 'Image', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can upload an image.', 'Fassbender-core' ),
				'section' => 'Fassbender_header_preloader_section',
				'choices' => array(
					'save_as' => 'id',
				),
				'required' => array(
					array(
					  'setting'  => 'Fassbender_preloader',
					  'operator' => '==',
					  'value'    => '0',
					),
				),
			)
		);
		
	/*====== Fassbender Widgets ======*/
		/*====== Widgets Panels ======*/
		Kirki::add_panel (
			'Fassbender_widgets_panel',
			array(
				'title' => esc_html__( 'Fassbender Widgets', 'Fassbender-core' ),
				'description' => esc_html__( 'You can customize the Fassbender widgets.', 'Fassbender-core' ),
			)
		);

		$sections = array (
			
			'footer_about' => array(
				esc_attr__( 'Footer About', 'Fassbender-core' ),
				esc_attr__( 'You can customize the footer about widget.', 'Fassbender-core' )
			),

			'footer_contact' => array(
				esc_attr__( 'Footer Contact', 'Fassbender-core' ),
				esc_attr__( 'You can customize the footer contact widget.', 'Fassbender-core' )
			),
		
			'contact_box' => array(
				esc_attr__( 'Contact Box', 'Fassbender-core' ),
				esc_attr__( 'You can customize the contact box widget.', 'Fassbender-core' )
			),
			
			'social_list' => array(
				esc_attr__( 'Social List', 'Fassbender-core' ),
				esc_attr__( 'You can customize the social list widget.', 'Fassbender-core' )
			),
		);

		foreach ( $sections as $section_id => $section ) {
			$section_args = array(
				'title' => $section[0],
				'description' => $section[1],
				'panel' => 'Fassbender_widgets_panel',
			);

			if ( isset( $section[2] ) ) {
				$section_args['type'] = $section[2];
			}

			Kirki::add_section( 'Fassbender_' . str_replace( '-', '_', $section_id ) . '_section', $section_args );
		}
		
		
		/*====== Footer About Widget Textarea ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'Fassbender_footer_about_text',
				'label' => esc_attr__( 'Content', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can set text for the about widget.', 'Fassbender-core' ),
				'section' => 'Fassbender_footer_about_section',
				'default' => '',
			)
		);
		
		/*====== Footer About Widget Social======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'repeater',
				'settings' => 'Fassbender_footer_about_social',
				'label' => esc_attr__( 'Footer About Social', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can set the widget settings.', 'Fassbender-core' ),
				'section' => 'Fassbender_footer_about_section',
				'fields' => array(
					'social_icon' => array(
						'type' => 'text',
						'label' => esc_attr__( 'Icon', 'Fassbender-core' ),
						'description' => esc_attr__( 'You can set an icon from fontawesome.com for example; "facebook-f"', 'Fassbender-core' ),
					),

					'social_url' => array(
						'type' => 'text',
						'label' => esc_attr__( 'URL', 'Fassbender-core' ),
						'description' => esc_attr__( 'You can set url for the item.', 'Fassbender-core' ),
					),

				),
			)
		);

		/*====== Footer Contact Widget Repeater ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'repeater',
				'settings' => 'Fassbender_footer_contact_widget',
				'label' => esc_attr__( 'Contact', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can set contact details for Fassbender Contact Widget.', 'Fassbender-core' ),
				'section' => 'Fassbender_footer_contact_section',
				'fields' => array(
				
					'contact_icon' => array(
						'type' => 'text',
						'label' => esc_attr__( 'Contact Icon', 'Fassbender-core' ),
						'description' => esc_attr__( 'set an icon.', 'Fassbender-core' ),
					),

					'contact_info' => array(
						'type' => 'textarea',
						'label' => esc_attr__( 'Contact Info', 'Fassbender-core' ),
						'description' => esc_attr__( 'Add contact details.', 'Fassbender-core' ),
					),
					
					
				),
			)
		);
		
		
		
		/*====== Contact Box Widget ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'repeater',
				'settings' => 'Fassbender_contact_box_widget',
				'label' => esc_attr__( 'Contact Box Widget', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can set contact detail.', 'Fassbender-core' ),
				'section' => 'Fassbender_contact_box_section',
				'fields' => array(
					'contact_title' => array(
						'type' => 'textarea',
						'label' => esc_attr__( 'Title', 'Fassbender-core' ),
						'description' => esc_attr__( 'You can enter a text.', 'Fassbender-core' ),
					),

					'contact_subtitle' => array(
						'type' => 'textarea',
						'label' => esc_attr__( 'Subtitle', 'Fassbender-core' ),
						'description' => esc_attr__( 'You can enter a text.', 'Fassbender-core' ),
					),
				),
			)
		);
		
		/*====== Social List Widget ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'repeater',
				'settings' => 'Fassbender_social_list_widget',
				'label' => esc_attr__( 'Social List Widget', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can set social icons.', 'Fassbender-core' ),
				'section' => 'Fassbender_social_list_section',
				'fields' => array(
					'social_icon' => array(
						'type' => 'text',
						'label' => esc_attr__( 'Icon', 'Fassbender-core' ),
						'description' => esc_attr__( 'You can set an icon from fontawesome.com for example; "facebook"', 'Fassbender-core' ),
					),

					'social_url' => array(
						'type' => 'text',
						'label' => esc_attr__( 'URL', 'Fassbender-core' ),
						'description' => esc_attr__( 'You can set url for the item.', 'Fassbender-core' ),
					),

				),
			)
		);
		
	/*====== Footer ======*/
		/*====== Footer Panels ======*/
		Kirki::add_panel (
			'Fassbender_footer_panel',
			array(
				'title' => esc_html__( 'Footer Settings', 'Fassbender-core' ),
				'description' => esc_html__( 'You can customize the footer from this panel.', 'Fassbender-core' ),
			)
		);

		$sections = array (

			'top_footer' => array(
				esc_attr__( 'Top Footer', 'Fassbender-core' ),
				esc_attr__( 'You can customize the top footer settings.', 'Fassbender-core' )
			),
			
			'footer_general' => array(
				esc_attr__( 'Footer General', 'Fassbender-core' ),
				esc_attr__( 'You can customize the footer settings.', 'Fassbender-core' )
			),

			'footer_color' => array(
				esc_attr__( 'Footer Color', 'Fassbender-core' ),
				esc_attr__( 'You can customize the footer colors.', 'Fassbender-core' )
			),
		);

		foreach ( $sections as $section_id => $section ) {
			$section_args = array(
				'title' => $section[0],
				'description' => $section[1],
				'panel' => 'Fassbender_footer_panel',
			);

			if ( isset( $section[2] ) ) {
				$section_args['type'] = $section[2];
			}

			Kirki::add_section( 'Fassbender_' . str_replace( '-', '_', $section_id ) . '_section', $section_args );
		}

		
		/*====== Top Header Text ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'Fassbender_top_footer_text',
				'label' => esc_attr__( 'Text', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can add the instagram shortcode. for example: [instagram-feed]', 'Fassbender-core' ),
				'section' => 'Fassbender_top_footer_section',
				'default' => 'instagram-feed',
			)
		);
		
		/*====== Copyright ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'Fassbender_copyright',
				'label' => esc_attr__( 'Copyright', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can set a copyright text for the footer.', 'Fassbender-core' ),
				'section' => 'Fassbender_footer_general_section',
				'default' => '',
			)
		);

		/*====== Footer Menu Toggle ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'Fassbender_footer_menu',
				'label' => esc_attr__( 'Footer Menu', 'Fassbender-core' ),
				'description' => esc_attr__( 'Disable or Enable the footer menu.', 'Fassbender-core' ),
				'section' => 'Fassbender_footer_general_section',
				'default' => '0',
			)
		);

		/*====== Footer Column ======*/
		Fassbender_customizer_add_field (
			array(
				'type'        => 'radio-buttonset',
				'settings'    => 'Fassbender_footer_column',
				'description' => esc_attr__( 'You can set footer column.', 'Fassbender-core' ),
				'section'     => 'Fassbender_footer_general_section',
				'default'     => '4columns',
				'priority'    => 10,
				'choices'     => [
					'3columns'  => esc_html__( '3 columns', 'Fassbender' ),
					'4columns' 	=> esc_html__( '4 columns', 'Fassbender' ),
					'5columns'  => esc_html__( '5 columns', 'Fassbender' ),
				],
			)
		);

		/*====== Footer Column Padding Top  ======*/
		Fassbender_customizer_add_field (
			array(
				'type'        => 'slider',
				'settings'    => 'Fassbender_footer_column_padding_top',
				'label'       => esc_html__( 'Footer Column Padding', 'Fassbender' ),
				'description' => esc_attr__( 'Padding-Top.', 'Fassbender' ),
				'section'     => 'Fassbender_footer_general_section',
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
		Fassbender_customizer_add_field (
			array(
				'type'        => 'slider',
				'settings'    => 'Fassbender_footer_column_padding_bottom',
				'section'     => 'Fassbender_footer_general_section',
				'description' => esc_attr__( 'Padding-Bottom.', 'Fassbender' ),
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
		Fassbender_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'Fassbender_footer_top_bg',
				'label' => esc_attr__( 'Footer Top Background', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can set a color for top footer background.', 'Fassbender-core' ),
				'section' => 'Fassbender_footer_color_section',
			)
		);
		
		/*====== Footer Top Widget Title Style ======*/
		Fassbender_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'Fassbender_footer_top_widget_title_typo',
				'label'       => esc_attr__( 'Footer Top Widget Title Featured Typography', 'Fassbender' ),
				'section'     => 'Fassbender_footer_color_section',
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
		Fassbender_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#333333',
				'settings' => 'Fassbender_footer_top_widget_title_color',
				'label' => esc_attr__( 'Footer Top Widget Title Color', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can set a color for top footer widget title.', 'Fassbender-core' ),
				'section' => 'Fassbender_footer_color_section',
			)
		);
		
		/*====== Footer Top Widget Title Hover color ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#333333',
				'settings' => 'Fassbender_footer_top_widget_title_hvrcolor',
				'label' => esc_attr__( 'Footer Top Widget Title Hover Color', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can set a color for top footer widget title.', 'Fassbender-core' ),
				'section' => 'Fassbender_footer_color_section',
			)
		);
		
		/*====== Footer Top Widget Text Style ======*/
		Fassbender_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'Fassbender_footer_top_widget_text_typo',
				'label'       => esc_attr__( 'Footer Top Widget Text Featured Typography', 'Fassbender' ),
				'section'     => 'Fassbender_footer_color_section',
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
		Fassbender_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#9b9b9b',
				'settings' => 'Fassbender_footer_top_widget_text_color',
				'label' => esc_attr__( 'Footer Top Widget Text Color', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can set a color for top footer widget text.', 'Fassbender-core' ),
				'section' => 'Fassbender_footer_color_section',
			)
		);
		
		/*====== Footer Top Widget Text Hover color ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#9b9b9b',
				'settings' => 'Fassbender_footer_top_widget_text_hvrcolor',
				'label' => esc_attr__( 'Footer Top Widget Text Hover Color', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can set a color for top footer widget text.', 'Fassbender-core' ),
				'section' => 'Fassbender_footer_color_section',
			)
		);
		
		/*====== Footer Bottom BG ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'Fassbender_footer_bottom_bg',
				'label' => esc_attr__( 'Footer Bottom Background', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can set a color for bottom footer background.', 'Fassbender-core' ),
				'section' => 'Fassbender_footer_color_section',
			)
		);
		
		/*====== Footer Bottom Font Style ======*/
		Fassbender_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'Fassbender_footer_bottom_font_typo',
				'label'       => esc_attr__( 'Footer Bottom Font Featured Typography', 'Fassbender' ),
				'section'     => 'Fassbender_footer_color_section',
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
		Fassbender_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#9b9b9b',
				'settings' => 'Fassbender_footer_bottom_font_color',
				'label' => esc_attr__( 'Footer Bottom Font Color', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can set a color for bottom footer font.', 'Fassbender-core' ),
				'section' => 'Fassbender_footer_color_section',
			)
		);
		
		/*====== Footer Bottom Font Hover Color ======*/
		Fassbender_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#9b9b9b',
				'settings' => 'Fassbender_footer_bottom_font_hvrcolor',
				'label' => esc_attr__( 'Footer Bottom Font Hover Color', 'Fassbender-core' ),
				'description' => esc_attr__( 'You can set a color for bottom footer font.', 'Fassbender-core' ),
				'section' => 'Fassbender_footer_color_section',
			)
		);
		

