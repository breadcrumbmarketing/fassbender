<?php

namespace Elementor;

class Fassbender_Product_Tab_Widget extends \Elementor\Widget_Base {
    use Fassbender_Helper;
    public function get_name() {
        return 'Fassbender-product-tab';
    }
    public function get_title() {
        return 'Product Tab (K)';
    }
    public function get_icon() {
        return 'eicon-slider-push';
    }
    public function get_categories() {
        return [ 'Fassbender-core' ];
    }

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Products', 'Fassbender-core' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);	
		
        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'Fassbender-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Featured Products',				
            ]
        );
		
        $this->add_control( 'subtitle',
            [
                'label' => esc_html__( 'Subtitle', 'Fassbender-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Sed ut perspiciatis unde omnis iste natus error',				
            ]
        );
		
        // Posts Per Page
        $this->add_control( 'post_count',
            [
                'label' => esc_html__( 'Posts Per Page', 'Fassbender-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => count( get_posts( array('post_type' => 'product', 'post_status' => 'publish', 'fields' => 'ids', 'posts_per_page' => '-1') ) ),
                'default' => 4
            ]
        );
		
        $this->add_control( 'cat_filter',
            [
                'label' => esc_html__( 'Filter Category', 'Fassbender-core' ),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->Fassbender_cpt_taxonomies('product_cat'),
                'description' => 'Select Category(s)',
				'label_block' => true,
            ]
        );
		
		
        $this->end_controls_section();
     	/*****   END CONTROLS SECTION   ******/
		
        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section('text_styling',
            [
                'label' => esc_html__( ' Text', 'Fassbender' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
		
		$this->add_responsive_control( 'product_tab_alignment',
            [
                'label' => esc_html__( 'Alignment', 'Fassbender' ),
                'type' => Controls_Manager::CHOOSE,
                'selectors' => ['{{WRAPPER}} .section-title ' => 'text-align: {{VALUE}};'],
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'Fassbender' ),
                        'icon' => 'fa fa-align-left'
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'Fassbender' ),
                        'icon' => 'fa fa-align-center'
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'Fassbender' ),
                        'icon' => 'fa fa-align-right'
                    ]
                ],
                'toggle' => true,
                
            ]
        );
		
		$this->add_control( 'title_heading',
            [
                'label' => esc_html__( 'TITLE', 'Fassbender' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'title_color',
           [
               'label' => esc_html__( 'Title Color', 'Fassbender' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'title_hvrcolor',
           [
               'label' => esc_html__( 'Title Hover Color', 'Fassbender' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .section-title h2:hover' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'title_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'Fassbender-core' ),
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
                'label' => esc_html__( 'Typography', 'Fassbender' ),

                'selector' => ' {{WRAPPER}} .section-title h2',
				
            ]
        );
		
		$this->add_control( 'subtitle_heading',
            [
                'label' => esc_html__( 'SUBTITLE', 'Fassbender' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before',
            ]
        );
		
		$this->add_control( 'subtitle_color',
           [
               'label' => esc_html__( 'Subtitle Color', 'Fassbender' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .section-title p' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'subtitle_hvrcolor',
           [
               'label' => esc_html__( 'Subtitle Hover Color', 'Fassbender' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .section-title p:hover' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'subtitle_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'Fassbender-core' ),
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
                'label' => esc_html__( 'Typography', 'Fassbender' ),

                'selector' => '{{WRAPPER}} .section-title p',
            ]
        );
		
		$this->add_control( 'category_heading',
            [
                'label' => esc_html__( 'CATEGORY', 'Fassbender' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'category_color',
           [
               'label' => esc_html__( 'Category Color', 'Fassbender' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .product-tab ul li a ' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'category_border_color',
           [
               'label' => esc_html__( 'Category Border Color', 'Fassbender' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .product-tab ul li a::before' => 'background-color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'category_hvrcolor',
           [
               'label' => esc_html__( 'Category Active Color', 'Fassbender' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .product-tab ul li a.active ' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'category_border_hvrcolor',
           [
               'label' => esc_html__( 'Category Border Active Color', 'Fassbender' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .product-tab ul li a.active::before' => 'background-color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'category_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'Fassbender-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .product-tab ul li a , {{WRAPPER}} .product-tab ul li a::before ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'category_typo',
                'label' => esc_html__( 'Typography', 'Fassbender' ),

                'selector' => ' {{WRAPPER}} .product-tab ul li a ',
				
            ]
        );
		

        $this->end_controls_section();	
		/*****   END CONTROLS SECTION   ******/
		
        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section('product_styling',
            [
                'label' => esc_html__( ' Product Style', 'Fassbender' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
		
		$this->add_control( 'image_heading',
            [
                'label' => esc_html__( 'IMAGE', 'Fassbender' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'css_filters',
				'selector' => '{{WRAPPER}} .product-img a img',
			]
		);
		
		$this->add_control( 'product_icon_heading',
            [
                'label' => esc_html__( 'ICON', 'Fassbender' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before',
            ]
        );
		
		$this->add_control( 'icon_size',
            [
                'label' => esc_html__( 'Icon Size', 'Fassbender' ),
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
               'label' => esc_html__( ' Background Color', 'Fassbender' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .product-action .action-btn , {{WRAPPER}} .klb-product a.tinvwl_add_to_wishlist_button' => 'background-color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'product_icon_background_hvrcolor',
           [
               'label' => esc_html__( ' Background Hover Color', 'Fassbender' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .product-action .action-btn:hover , {{WRAPPER}} .klb-product a.tinvwl_add_to_wishlist_button:hover' => 'background-color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'product_icon_color',
           [
               'label' => esc_html__( ' Color', 'Fassbender' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .product-action .action-btn , {{WRAPPER}} .klb-product a.tinvwl_add_to_wishlist_button' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'product_icon_hvrcolor',
           [
               'label' => esc_html__( ' Hover Color', 'Fassbender' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .product-action .action-btn:hover , {{WRAPPER}} .klb-product a.tinvwl_add_to_wishlist_button:hover' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'product_title_heading',
            [
                'label' => esc_html__( 'TITLE', 'Fassbender' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'product_title_color',
           [
               'label' => esc_html__( 'Title Color', 'Fassbender' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .product-text h4 a' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'product_title_hvrcolor',
           [
               'label' => esc_html__( 'Title Hover Color', 'Fassbender' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .product-text h4 a:hover' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'product_title_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'Fassbender-core' ),
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
                'label' => esc_html__( 'Typography', 'Fassbender' ),

                'selector' => ' {{WRAPPER}} .product-text h4 a',
				
            ]
        );
		
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$output = '';
		$cat_filter = '';
		$section_title = '';
		
		$section_title .= '<div class="col-xl-7 col-lg-6">';
		$section_title .= '<div class="section-title mb-25">';
		$section_title .= '<h2>'.esc_html($settings['title']).'</h2>';
		$section_title .= '<p>'.esc_html($settings['subtitle']).'</p>';
		$section_title .= '</div>';
		$section_title .= '</div>';
		
		$include = array();
		$exclude = array();
		
		$portfolio_filters = get_terms(array(
			'taxonomy' => 'product_cat',
			'include' => $settings['cat_filter'],
		));
		
		if($portfolio_filters){
			$cat_filter .= '<div class="col-xl-5 col-lg-6">';
			$cat_filter .= '<div class="product-tab mb-25">';
			$cat_filter .= '<ul class="nav justify-content-start justify-content-lg-end product-nav" id="myTab" role="tablist">';
			
			$number = 0;
			foreach($portfolio_filters as $portfolio_filter){
				if($number == 0){
					$filteractive = 'active';
				} else {
					$filteractive = '';
				}
				$cat_filter .= '<li class="nav-item">';
				$cat_filter .= '<a class="nav-link '.esc_attr($filteractive).'" id="'.esc_attr($portfolio_filter->slug).'-tab" data-toggle="tab" href="#'.esc_attr($portfolio_filter->slug).'" role="tab" aria-controls="'.esc_attr($portfolio_filter->slug).'" aria-selected="true">';
				$cat_filter .= '<i class="far fa-shield-check"></i> ';
				$cat_filter .= esc_html($portfolio_filter->name);
				$cat_filter .= '</a>';
				$cat_filter .= '</li>';
				$number++;
			}
			
			$cat_filter .= '</ul>';
			$cat_filter .= '</div>';
			$cat_filter .= '</div>';

		}
		
		$count = 0;
		foreach($portfolio_filters as $portfolio_filter){
			if($count == 0){
				$active = 'show active';
			} else {
				$active = '';
			}
			
			
			
				$output .= '<div class="tab-pane fade '.esc_attr($active).'" id="'.esc_attr($portfolio_filter->slug).'" role="tabpanel" aria-labelledby="'.esc_attr($portfolio_filter->slug).'-tab">';
				$output .= '<div class="row">';
				$posts = get_posts(
					array(
						'post_type' => 'product',
						'numberposts' => $settings['post_count'],
						'tax_query' => array(
							array(
								'taxonomy' => 'product_cat',
								'field' => 'slug',
								'terms' => $portfolio_filter->slug,
								'operator' => 'IN',
							)
						 )
					)
				);
				
				foreach ( $posts as $post_object ) {
					setup_postdata( $GLOBALS['post'] =& $post_object );

					$id = get_the_ID();
					global $product;
					global $post;
					global $woocommerce;
					
					$rating = wc_get_rating_html($product->get_average_rating()); //get rating
					$ratingcount = $product->get_review_count(); //get rating
					

					$cart_url = wc_get_cart_url();
					$price = $product->get_price_html();
					$sale_price_dates_to    = ( $date = get_post_meta( $id, '_sale_price_dates_to', true ) ) ? date_i18n( 'Y/m/d', $date ) : '';
					$stock_status = $product->get_stock_status();
					$stock_text = $product->get_availability();
					$weight = $product->get_weight();
					$wishlist = get_theme_mod( 'Fassbender_wishlist_button', '0' );
					$quickview = get_theme_mod( 'Fassbender_quick_view_button', '0' );
	
					$att=get_post_thumbnail_id();
					$image_src = wp_get_attachment_image_src( $att, 'full' );
					$image_src = $image_src[0];
					$imageresize = Fassbender_resize( $image_src, 150, 80, true );  
					$product_image_ids = $product->get_gallery_image_ids();


					$output .= '<div class="col-xl-4 cl-lg-4 col-md-6">';
					$output .= '<div class="product-wrapper text-center mb-45">';
					$output .= '<div class="product-img pos-rel">';
					$output .= '<a href="'.get_permalink().'">';
					$output .= '<img src="'.Fassbender_product_image().'" alt="product_img1">';
					
					if($product_image_ids){
						$gallery_count = 1;
						foreach( $product_image_ids as $product_image_id ){
							if($gallery_count == 1){
								$image_url = wp_get_attachment_url( $product_image_id );
								$output .= '<img class="secondary-img" src="'.esc_url($image_url).'" alt="el_hover_img1">';
							}
							$gallery_count++;
						}
					}
					
					$output .= '</a>';
					$output .= '<div class="product-action">';
					
					$output .= Fassbender_wishlist_shortcode();
					
					$output .= Fassbender_add_to_cart_button();
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
					
				}
			
				wp_reset_postdata();
				
				$output .= '</div>';
				$output .= '</div>';
				$count++;

		}
		wp_reset_query();
		
	  echo  '<div class="product-area pb-50">
                <div class="container">
					<div class="tab-border mb-60">
						<div class="row">
						'.$section_title.'
						'.$cat_filter.'
						</div>
					</div>
                    <div class="product-tab-content klb-product">
                        <div class="tab-content" id="myTabContent">
						'.$output.'
						</div>
					</div>
				</div>
			</div>';
	}

}
