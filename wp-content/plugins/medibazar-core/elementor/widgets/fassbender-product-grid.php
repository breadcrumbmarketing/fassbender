<?php

namespace Elementor;

class medibazar_Product_Grid_Widget extends Widget_Base {
    use medibazar_Helper;

    public function get_name() {
        return 'medibazar-product-grid';
    }
    public function get_title() {
        return 'Product Grid (K)';
    }
    public function get_icon() {
        return 'eicon-slider-push';
    }
    public function get_categories() {
        return [ 'medibazar-core' ];
    }

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'medibazar-core' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		
        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'medibazar-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Featured Products',				
            ]
        );
		
        $this->add_control( 'subtitle',
            [
                'label' => esc_html__( 'Subitle', 'medibazar-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Sed ut perspiciatis unde omnis iste natus error',
                'pleaceholder' => esc_html__( 'Sed ut perspiciatis unde omnis iste natus error', 'medibazar-core' ),
            ]
        );
		
        $this->add_control( 'btn_title',
            [
                'label' => esc_html__( 'Button Title', 'shopwise' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'View All Products',
                'pleaceholder' => esc_html__( 'Enter button title here', 'shopwise' )
            ]
        );
		
        $this->add_control( 'btn_link',
            [
                'label' => esc_html__( 'Button Link', 'shopwise' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'shopwise' )
            ]
        );

		$this->add_control(
			'disable_pagination',
			[
				'label' => esc_html__('Disable Pagination', 'medibazar-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'medibazar-core' ),
				'label_off' => esc_html__( 'No', 'medibazar-core' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);
		
		$this->add_control( 'column',
			[
				'label' => esc_html__( 'Column', 'medibazar-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'col-lg-3',
				'options' => [
					'select-column' => esc_html__( 'Select Column', 'medibazar-core' ),
					'col-lg-6'	  => esc_html__( '2 Columns', 'medibazar-core' ),
					'col-lg-4' 	  => esc_html__( '3 Columns', 'medibazar-core' ),
					'col-lg-3'	  => esc_html__( '4 Columns', 'medibazar-core' ),
				],
			]
		);
		
        // Posts Per Page
        $this->add_control( 'post_count',
            [
                'label' => esc_html__( 'Posts Per Page', 'medibazar-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => count( get_posts( array('post_type' => 'product', 'post_status' => 'publish', 'fields' => 'ids', 'posts_per_page' => '-1') ) ),
                'default' => 8
            ]
        );
		
        $this->add_control( 'cat_filter',
            [
                'label' => esc_html__( 'Filter Category', 'medibazar-core' ),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->medibazar_cpt_taxonomies('product_cat'),
                'description' => 'Select Category(s)',
                'default' => '',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'post_include_filter',
            [
                'label' => esc_html__( 'Include Post', 'medibazar-core' ),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->medibazar_cpt_get_post_title('product'),
                'description' => 'Select Post(s) to Include',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'order',
            [
                'label' => esc_html__( 'Select Order', 'medibazar-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'ASC' => esc_html__( 'Ascending', 'medibazar-core' ),
                    'DESC' => esc_html__( 'Descending', 'medibazar-core' )
                ],
                'default' => 'DESC'
            ]
        );
		
        $this->add_control( 'orderby',
            [
                'label' => esc_html__( 'Order By', 'medibazar-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'id' => esc_html__( 'Post ID', 'medibazar-core' ),
                    'menu_order' => esc_html__( 'Menu Order', 'medibazar-core' ),
                    'rand' => esc_html__( 'Random', 'medibazar-core' ),
                    'date' => esc_html__( 'Date', 'medibazar-core' ),
                    'title' => esc_html__( 'Title', 'medibazar-core' ),
                ],
                'default' => 'date',
            ]
        );
		
		$this->add_control( 'hide_out_of_stock_items',
			[
				'label' => esc_html__( 'Hide Out of Stock?', 'medibazar-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'medibazar-core' ),
				'label_off' => esc_html__( 'False', 'medibazar-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		
		$this->end_controls_section();
		
		/*****   END CONTROLS SECTION   ******/
		
        /*****   START CONTROLS SECTION   ******/
		
		$this->start_controls_section('medibazar_styling',
            [
                'label' => esc_html__( 'Style', 'medibazar' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
		
		$this->add_responsive_control( 'product_grid_alignment',
            [
                'label' => esc_html__( 'Alignment', 'medibazar' ),
                'type' => Controls_Manager::CHOOSE,
                'selectors' => ['{{WRAPPER}} .section-title ' => 'text-align: {{VALUE}} !important;'],
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'medibazar' ),
                        'icon' => 'fa fa-align-left'
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'medibazar' ),
                        'icon' => 'fa fa-align-center'
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'medibazar' ),
                        'icon' => 'fa fa-align-right'
                    ]
                ],
                'toggle' => true,
                
            ]
        );
		
		$this->add_control( 'title_heading',
            [
                'label' => esc_html__( 'TITLE', 'medibazar' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'title_color',
           [
               'label' => esc_html__( 'Title Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'title_hvrcolor',
           [
               'label' => esc_html__( 'Title Hover Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .section-title h2:hover' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'title_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'medibazar-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .section-title h2 ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .section-title h2',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__( 'Typography', 'medibazar' ),

                'selector' => ' {{WRAPPER}} .section-title h2',
				
            ]
        );
		
		$this->add_control( 'subtitle_heading',
            [
                'label' => esc_html__( 'SUBTITLE', 'medibazar' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before',
            ]
        );
		
		$this->add_control( 'subtitle_color',
           [
               'label' => esc_html__( 'Subtitle Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .section-title p' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'subtitle_hvrcolor',
           [
               'label' => esc_html__( 'Subtitle Hover Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .section-title p:hover' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'subtitle_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'medibazar-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .section-title p' => 'opacity: {{VALUE}};'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .section-title p',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typo',
                'label' => esc_html__( 'Typography', 'medibazar' ),

                'selector' => '{{WRAPPER}} .section-title p',
            ]
        );
		
		$this->add_control( 'btn_heading',
            [
                'label' => esc_html__( 'BUTTON', 'medibazar' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before',
            ]
        );
		
  	    
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typo',
                'label' => esc_html__( 'Typography', 'medibazar' ),

                'selector' => '{{WRAPPER}} .b-button a'
            ]
        );
		
		$this->add_control( 'btn_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'medibazar-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .b-button a' => 'opacity: {{VALUE}} ;'],
            ]
        );

		$this->start_controls_tabs('btn_tabs');
        $this->start_controls_tab( 'btn_normal_tab',
            [ 'label' => esc_html__( 'Normal', 'medibazar' ) ]
        );
		
		$this->add_control( 'btn_color',
            [
                'label' => esc_html__( 'Color', 'medibazar' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .b-button a  ' => 'color: {{VALUE}};']
            ]
        );
		
		$this->add_control( 'btn_border_color',
            [
                'label' => esc_html__( 'Border Color', 'medibazar' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .b-button > a::before ' => 'background-color: {{VALUE}};']
            ]
        );
       
		$this->end_controls_tab(); //btn_normal_tab
        $this->start_controls_tab('btn_hover_tab',
            [ 'label' => esc_html__( 'Hover', 'medibazar' ) ]
        );
       
	    $this->add_control( 'btn_hvrcolor',
            [
                'label' => esc_html__( 'Color', 'medibazar' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .b-button a:hover ' => 'color: {{VALUE}};']
            ]
        );
		
		$this->add_control( 'btn_border_hvr_color',
            [
                'label' => esc_html__( 'Border Hover Color', 'medibazar' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .b-button > a::after' => 'background-color: {{VALUE}};']
            ]
        );
		
		$this->end_controls_tab(); //btn_hover_tab
        $this->end_controls_tabs(); //btn_tabs
        $this->end_controls_section();
     	/*****   END CONTROLS SECTION   ******/
		
        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section('product_styling',
            [
                'label' => esc_html__( ' Product Style', 'medibazar' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
		
		$this->add_control( 'image_heading',
            [
                'label' => esc_html__( 'IMAGE', 'medibazar' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'css_filters',
				'selector' => '{{WRAPPER}} .product-02-img a img',
			]
		);
		
		$this->add_control( 'product_icon_heading',
            [
                'label' => esc_html__( 'ICON', 'medibazar' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before',
            ]
        );
		
		$this->add_control( 'icon_size',
            [
                'label' => esc_html__( 'Icon Size', 'medibazar' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .product-action .action-btn , {{WRAPPER}} .klb-product a.tinvwl_add_to_wishlist_button' => 'font-size: {{SIZE}}px;' ],
            ]
        );
		
		$this->add_control( 'product_icon_background_color',
           [
               'label' => esc_html__( ' Background Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .product-action .action-btn , {{WRAPPER}} .klb-product a.tinvwl_add_to_wishlist_button' => 'background-color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'product_icon_background_hvrcolor',
           [
               'label' => esc_html__( ' Background Hover Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .product-action .action-btn:hover , {{WRAPPER}} .klb-product a.tinvwl_add_to_wishlist_button:hover' => 'background-color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'product_icon_color',
           [
               'label' => esc_html__( ' Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .product-action .action-btn , {{WRAPPER}} .klb-product a.tinvwl_add_to_wishlist_button' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'product_icon_hvrcolor',
           [
               'label' => esc_html__( ' Hover Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .product-action .action-btn:hover , {{WRAPPER}} .klb-product a.tinvwl_add_to_wishlist_button:hover' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'product_title_heading',
            [
                'label' => esc_html__( 'TITLE', 'medibazar' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'product_title_color',
           [
               'label' => esc_html__( 'Title Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .product-text h4 a' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'product_title_hvrcolor',
           [
               'label' => esc_html__( 'Title Hover Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .product-text h4 a:hover' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'product_title_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'medibazar-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .product-text h4 a ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'product_title_text_shadow',
				'selector' => '{{WRAPPER}} .product-text h4 a',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'product_title_typo',
                'label' => esc_html__( 'Typography', 'medibazar' ),

                'selector' => ' {{WRAPPER}} .product-text h4 a',
				
            ]
        );

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$target = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
		$output = '';
		
		if ( get_query_var( 'paged' ) ) {
			$paged = get_query_var( 'paged' );
		} elseif ( get_query_var( 'page' ) ) {
			$paged = get_query_var( 'page' );
		} else {
			$paged = 1;
		}
	
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => $settings['post_count'],
			'order'          => 'DESC',
			'post_status'    => 'publish',
			'paged' 			=> $paged,
            'post__in'       => $settings['post_include_filter'],
            'order'          => $settings['order'],
			'orderby'        => $settings['orderby']
		);
		
		if($settings['hide_out_of_stock_items']== 'true'){
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'product_visibility',
					'field'    => 'name',
					'terms'    => 'outofstock',
					'operator' => 'NOT IN',
				),
			); // WPCS: slow query ok.
		}
	
		if($settings['cat_filter']){
			$args['tax_query'][] = array(
				'taxonomy' 	=> 'product_cat',
				'field' 	=> 'term_id',
				'terms' 	=> $settings['cat_filter']
			);
		}
	
		?>
		
		<?php
		
		$output .= '<div class="product-area klb-product pb-70">';
		$output .= '<div class="container">';
		
		$output .= '<div class="row mb-30">';
		$output .= '<div class="col-xl-7 col-lg-7 col-md-7">';
		$output .= '<div class="section-title mb-30">';
		$output .= '<h2>'.esc_html($settings['title']).'</h2>';
		$output .= '<p>'.esc_html($settings['subtitle']).'</p>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '<div class="col-xl-5 col-lg-5 col-md-5">';
		$output .= '<div class="b-button shop-btn s-btn text-md-right mb-30">';
		$output .= '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).'>'.esc_html($settings['btn_title']).' <i class="fal fa-long-arrow-right"></i></a>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
			   
		$output .= '<div class="row">';
		
		$loop = new \WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
				global $product;
				global $post;
				global $woocommerce;
			
				$id = get_the_ID();
				$allproduct = wc_get_product( get_the_ID() );
				
				$att=get_post_thumbnail_id();
				$image_src = wp_get_attachment_image_src( $att, 'full' );
				$image_src = $image_src[0];
				$imageresize = medibazar_resize( $image_src, 304, 173, true, true, true );

				$cart_url = wc_get_cart_url();
				$price = $allproduct->get_price_html();
				$weight = $product->get_weight();
				$stock_status = $product->get_stock_status();
				$stock_text = $product->get_availability();
				$rating = wc_get_rating_html($product->get_average_rating());
				$ratingcount = $product->get_review_count();
				$wishlist = get_theme_mod( 'medibazar_wishlist_button', '0' );
				$quickview = get_theme_mod( 'medibazar_quick_view_button', '0' );
		
				$output .= '<div class="'.esc_attr($settings['column']).' col-md-6">';
				$output .= '<div class="product-03-wrapper grey-2-bg pos-rel text-center mb-30">';
				if( $product->get_sale_price() && $product->get_regular_price() ) {
				$output .= '<div class="badge-tag">';
				$output .= '<span class="product-tag pro-tag hot-1">-'.ceil(100 - ($product->get_sale_price() / $product->get_regular_price()) * 100).'%</span>';
				$output .= '</div>';
				}
				$output .= '<div class="product-02-img pos-rel">';
				$output .= '<a href="'.get_permalink().'">';
				$output .= '<img src="'.medibazar_product_image().'" alt="product_img1">';
				$output .= '</a>';
				$output .= '<div class="product-action">';
				
				$output .= medibazar_wishlist_shortcode();
				
				$output .= medibazar_add_to_cart_button();
				if($quickview == '1'){
				$output .= '<a href="'.$product->get_id().'" class="action-btn button detail-bnt"><i class="far fa-search"></i></a>';
				}
				$output .= '</div>';
				$output .= '</div>';
				$output .= '<div class="product-text">';
				$output .= '<h4><a href="'.get_permalink().'">'.get_the_title().'</a></h4>';
				$output .= $price;
				$output .= '</div>';
				$output .= '</div>';

				$output .= '</div>';

			endwhile;
			$output .= '</div>';
			if($settings['disable_pagination'] != 'yes'){
				$output .= '<div class="row">';
				$output .= '<div class="col-12">';
				
				ob_start();
				get_template_part( 'post-format/pagination' );
				$output .= '<div class="col-md-12">'. ob_get_clean().'</div>';

				$output .= '</div>';
				$output .= '</div>';
			}
		}
		wp_reset_postdata();


		$output .= '</div>';
		$output .= '</div>';


		echo $output;
	}

}
