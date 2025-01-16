<?php

namespace Elementor;

class medibazar_Deal_Products_Widget extends Widget_Base {
    use medibazar_Helper;

    public function get_name() {
        return 'medibazar-deal-products';
    }
    public function get_title() {
        return 'Deal Products (K)';
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
                'default' => 'Deal Of This Week',				
            ]
        );
		
        $this->add_control( 'subtitle',
            [
                'label' => esc_html__( 'Subitle', 'medibazar-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Sed ut perspiciatis unde omnis iste natus error',
                'pleaceholder' => esc_html__( 'Enter subtitle here', 'medibazar-core' ),
            ]
        );

        $this->add_control( 'expired_date',
            [
                'label' => esc_html__( 'Due Date', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::DATE_TIME,
            ]
        );
		
		$customimg = plugins_url( 'images/b-01.png', __DIR__ );
		$repeater = new Repeater();

        $repeater->add_control( 'image',
            [
                'label' => esc_html__( 'Image', 'medibazar-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $customimg],
            ]
        );
		
        $repeater->add_control( 'item_title',
            [
                'label' => esc_html__( 'Title', 'medibazar-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Blood Pressure Meter',				
            ]
        );
		
        $repeater->add_control( 'item_subtitle',
            [
                'label' => esc_html__( 'Subtitle', 'medibazar-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Digital Meter',				
            ]
        );
		
        $repeater->add_control( 'regular_price',
            [
                'label' => esc_html__( 'Regular Price', 'medibazar-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => '$250.99',				
            ]
        );
		
        $repeater->add_control( 'sale_price',
            [
                'label' => esc_html__( 'Sale Price', 'medibazar-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => '$239.99',				
            ]
        );
		
        $repeater->add_control( 'btn_title',
            [
                'label' => esc_html__( 'Button Title', 'shopwise' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Buy Now',
                'pleaceholder' => esc_html__( 'Enter button title here', 'shopwise' )
            ]
        );
		
        $repeater->add_control( 'btn_link',
            [
                'label' => esc_html__( 'Button Link', 'shopwise' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'shopwise' )
            ]
        );
		
		$repeater->add_control( 'bg_color',
			[
				'label' => esc_html__( 'BG Color', 'sosso' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#edf7fb',
			]
		);
		
        $this->add_control( 'deal_items',
            [
                'label' => esc_html__( 'Deal Items', 'medibazar-core' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
						'item_title' => 'Blood Pressure Meter',
						'item_subtitle' => 'Digital Meter',
						'regular_price' => '$250.99',
						'sale_price' => '$239.99',
                        'image' => ['url' => $customimg],
                        'bg_color' => '#edf7fb',
                    ],
					
                    [
						'item_title' => 'Blood Pressure Meter',
						'item_subtitle' => 'Digital Meter',
						'regular_price' => '$250.99',
						'sale_price' => '$239.99',
                        'image' => ['url' => $customimg],
                        'bg_color' => '#f8f8f8',
                    ],
					
                    [
						'item_title' => 'Blood Pressure Meter',
						'item_subtitle' => 'Digital Meter',
						'regular_price' => '$250.99',
						'sale_price' => '$239.99',
                        'image' => ['url' => $customimg],
                        'bg_color' => '#f3f8ff',
                    ],

					
                ]
            ]
        );
		
		/*****   END CONTROLS SECTION   ******/

		
		$this->end_controls_section();


		/* Translate Start*/
		$this->start_controls_section(
			'translate_section',
			[
				'label' => esc_html__( 'Translate', 'medibazar' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		
        $this->add_control( 'days_text',
            [
                'label' => esc_html__( 'Days', 'medibazar-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Days',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'hour_text',
            [
                'label' => esc_html__( 'Hour', 'medibazar-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Hour',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'minute_text',
            [
                'label' => esc_html__( 'Minute', 'medibazar-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Minute',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'second_text',
            [
                'label' => esc_html__( 'Second', 'medibazar-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Second',
				'label_block' => true,
            ]
        );

		$this->end_controls_section();
		/* Translate End*/


        /*****   START CONTROLS SECTION   ******/
		$this->start_controls_section('medibazar_styling',
            [
                'label' => esc_html__( 'Style', 'medibazar' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
		
		$this->add_responsive_control( 'deal_product_alignment',
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
		

        $this->end_controls_section();
     	/*****   END CONTROLS SECTION   ******/
		
		
        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section('item_styling',
            [
                'label' => esc_html__( 'Deal Items', 'medibazar' ),
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
				'selector' => '{{WRAPPER}} .banner-02-img img',
			]
		);
		
		$this->add_control( 'badge_heading',
            [
                'label' => esc_html__( 'BADGE', 'medibazar' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'badge_bg_color',
           [
               'label' => esc_html__( 'Badge Background Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .banner-tag' => 'background-color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'badge_color',
           [
               'label' => esc_html__( 'Badge Title Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .banner-tag' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'badge_hvrcolor',
           [
               'label' => esc_html__( 'Badge Title Hover Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .banner-tag:hover' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'badge_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'medibazar-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .banner-tag ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'badge_text_shadow',
				'selector' => '{{WRAPPER}} .banner-tag',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'badge_typo',
                'label' => esc_html__( 'Typography', 'medibazar' ),

                'selector' => ' {{WRAPPER}} .banner-tag',
				
            ]
        );
		
		$this->add_control( 'second_title_heading',
            [
                'label' => esc_html__( 'TITLE', 'medibazar' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'second_title_color',
           [
               'label' => esc_html__( 'Title Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .banner-02-text h2' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'second_title_hvrcolor',
           [
               'label' => esc_html__( 'Title Hover Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .banner-02-text h2:hover' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'second_title_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'medibazar-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .banner-02-text h2 ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'second_title_text_shadow',
				'selector' => '{{WRAPPER}} .banner-02-text h2',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'second_title_typo',
                'label' => esc_html__( 'Typography', 'medibazar' ),

                'selector' => ' {{WRAPPER}} .banner-02-text h2',
				
            ]
        );
		
		$this->add_control( 'second_subtitle_heading',
            [
                'label' => esc_html__( 'SUBTITLE', 'medibazar' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before',
            ]
        );
		
		$this->add_control( 'second_subtitle_color',
           [
               'label' => esc_html__( 'Subtitle Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .banner-02-text span' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'second_subtitle_hvrcolor',
           [
               'label' => esc_html__( 'Subtitle Hover Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .banner-02-text span:hover' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'second_subtitle_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'medibazar-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .banner-02-text span' => 'opacity: {{VALUE}};'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'second_subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .banner-02-text span',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'second_subtitle_typo',
                'label' => esc_html__( 'Typography', 'medibazar' ),

                'selector' => '{{WRAPPER}} .banner-02-text span',
            ]
        );
		
		$this->add_control( 'regular_price_heading',
            [
                'label' => esc_html__( 'Regular Price', 'medibazar' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'regular_price_color',
           [
               'label' => esc_html__( 'Regular Price Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .old-price' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'regular_price_hvrcolor',
           [
               'label' => esc_html__( 'Regular Price Hover Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .old-price:hover' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'regular_price_border_color',
           [
               'label' => esc_html__( 'Regular Price Border Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .old-price' => 'text-decoration-color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'sale_price_heading',
            [
                'label' => esc_html__( 'Sale Price', 'medibazar' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'sale_price_color',
           [
               'label' => esc_html__( 'Sale Price Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .new-price' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'sale_price_hvrcolor',
           [
               'label' => esc_html__( 'Sale Price Hover Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .new-price:hover' => 'color: {{VALUE}};']
           ]
        );
		
        $this->end_controls_section();
     	/*****   END CONTROLS SECTION   ******/
		
		
        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section('btn_styling',
            [
                'label' => esc_html__( ' Button Style', 'medibazar' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
		
		$this->add_responsive_control( 'btn_padding',
            [
                'label' => esc_html__( 'Padding', 'medibazar' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .banner-button a.c-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],              
            ]
        );
  	    
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typo',
                'label' => esc_html__( 'Typography', 'medibazar' ),

                'selector' => '{{WRAPPER}} .banner-button a.c-btn'
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
                'selectors' => ['{{WRAPPER}} .banner-button a.c-btn' => 'opacity: {{VALUE}} ;'],
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
                'selectors' => ['{{WRAPPER}} .banner-button a.c-btn' => 'color: {{VALUE}};']
            ]
        );
       
	    $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'btn_border',
                'label' => esc_html__( 'Border', 'medibazar' ),
                'selector' => '{{WRAPPER}} .banner-button a.c-btn ',
            ]
        );
        
		$this->add_responsive_control( 'btn_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'medibazar' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .banner-button a.c-btn ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'],
            ]
        );
       
		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'btn_background',
                'label' => esc_html__( 'Background', 'medibazar' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .banner-button a.c-btn ',
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
                'selectors' => ['{{WRAPPER}} .banner-button a.c-btn:hover ' => 'color: {{VALUE}};']
            ]
        );
		
		$this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'btn_hvr_border',
                'label' => esc_html__( 'Border', 'medibazar' ),
                'selector' => '{{WRAPPER}} .banner-button a.c-btn:hover ',
            ]
        );
        
		$this->add_responsive_control( 'btn_hvr_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'medibazar' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .banner-button a.c-btn:hover ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'],
            ]
        );
		
		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'btn_hvr_background',
                'label' => esc_html__( 'Background', 'medibazar' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .banner-button a.c-btn:hover',
            ]
        );
		
		$this->end_controls_tab(); //btn_tabs
        $this->end_controls_tabs(); //btn_hover_tab
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		$output = '';
		

		?>
		
		<?php
		
		$output .= '<div class="deal-area pb-50 pt-95">';
		$output .= '<div class="container">';
		$output .= '<div class="row">';
		$output .= '<div class="col-xl-6 col-lg-6 offset-lg-3 offset-xl-3">';
		$output .= '<div class="section-title text-center mb-50">';
		$output .= '<h2>'.esc_html($settings['title']).'</h2>';
		$output .= '<p>'.esc_html($settings['subtitle']).'</p>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '<div class="row">';
		$output .= '<div class="col-xl-6 col-lg-8 offset-lg-2 offset-xl-3">';
		$output .= '<div class="deal-wrapper text-center">';
		$output .= '<div class="deal-count">';
		$output .= '<div class="deal-time" data-countdown="'.esc_attr($settings['expired_date']).'" data-days="'.esc_attr($settings['days_text']).'" data-hour="'.esc_attr($settings['hour_text']).'" data-minute="'.esc_attr($settings['minute_text']).'" data-second="'.esc_attr($settings['second_text']).'"></div>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		
		
		$output .= '<div class="banner-02-area pb-70 pl-165 pr-165">';
		$output .= '<div class="container-fluid">';
		$output .= '<div class="row">';

		foreach ( $settings['deal_items'] as $item ) {
			$target = $item['btn_link']['is_external'] ? ' target="_blank"' : '';
			$nofollow = $item['btn_link']['nofollow'] ? ' rel="nofollow"' : '';

			$output .= '<div class="col-xl-4 col-lg-4 col-md-6">';
			$output .= '<div class="banner-02-wrapper text-center mb-30" data-bg-color="'.esc_attr($item['bg_color']).'">';
			$output .= '<div class="banner-02-text">';
			$output .= '<span>'.esc_html($item['item_subtitle']).'</span>';
			$output .= '<h2>'.esc_html($item['item_title']).'</h2>';
			$output .= '</div>';
			$output .= '<div class="banner-02-img pos-rel">';
			$output .= '<a href="'.esc_url($item['btn_link']['url']).'" '.esc_attr($target.$nofollow).'><img src="'.esc_url($item['image']['url']).'" alt="'.esc_attr($item['item_title']).'"></a>';
			$output .= '<span class="banner-tag">'.esc_html__('hot','medibazar-core').'</span>';
			$output .= '</div>';
			$output .= '<div class="banner-price">';
			$output .= '<span class="old-price">'.esc_html($item['regular_price']).'</span>';
			$output .= '<span class="new-price">'.esc_html($item['sale_price']).'</span>';
			$output .= '</div>';
			$output .= '<div class="banner-button">';
			$output .= '<a class="c-btn" href="'.esc_url($item['btn_link']['url']).'" '.esc_attr($target.$nofollow).'>'.esc_html($item['btn_title']).' <i class="far fa-plus"></i></a>';
			$output .= '</div>';
			$output .= '</div>';
			$output .= '</div>';
			
		}

		
		
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';



		
		echo $output;
	}

}
