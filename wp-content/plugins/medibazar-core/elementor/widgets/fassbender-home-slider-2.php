<?php

namespace Elementor;

class medibazar_Home_Slider_2_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'medibazar-home-slider-2';
    }
    public function get_title() {
        return 'Home Slider 2 (K)';
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


		$defaultbg = plugins_url( 'images/slider02.jpg', __DIR__ );
		$defaultsecond = plugins_url( 'images/slider2.png', __DIR__ );
		
		$repeater = new Repeater();
        $repeater->add_control( 'slider_image',
            [
                'label' => esc_html__( 'Image', 'medibazar-core' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );
		
        $repeater->add_control( 'slider_second_image',
            [
                'label' => esc_html__( 'Image', 'medibazar-core' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );
		
        $repeater->add_control( 'slider_title',
            [
                'label' => esc_html__( 'Title', 'medibazar-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'hair oil',
                'pleaceholder' => esc_html__( 'Enter title here', 'medibazar-core' )
            ]
        );

        $repeater->add_control( 'slider_subtitle',
            [
                'label' => esc_html__( 'Subitle', 'medibazar-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Aloe Vera',
                'pleaceholder' => esc_html__( 'Enter subtitle here', 'medibazar-core' )
            ]
        );

        $repeater->add_control( 'slider_desc',
            [
                'label' => esc_html__( 'Slider Desc', 'medibazar-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Sed ut perspiciatis unde omnis iste natus <br> error sit voluptatem accusantium',
                'pleaceholder' => esc_html__( 'Enter description here', 'medibazar-core' )
            ]
        );
		
        $repeater->add_control( 'sale_tag',
            [
                'label' => esc_html__( 'Sale Tag', 'medibazar-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => '29<span class="b-ta">%</span> <br> <span>off</span>',
                'pleaceholder' => esc_html__( 'Enter sale tag', 'medibazar-core' ),
            ]
        );

        $repeater->add_control( 'slider_btn_title',
            [
                'label' => esc_html__( 'Button Title', 'medibazar-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Shop Now',
                'pleaceholder' => esc_html__( 'Enter button title here', 'medibazar-core' )
            ]
        );
        $repeater->add_control( 'slider_btn_link',
            [
                'label' => esc_html__( 'Button Link', 'medibazar-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'medibazar-core' )
            ]
        );
		
        $repeater->add_control( 'slider_second_btn_title',
            [
                'label' => esc_html__( 'Second Button Title', 'medibazar-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Shop Now',
                'pleaceholder' => esc_html__( 'Enter button title here', 'medibazar-core' )
            ]
        );
        $repeater->add_control( 'slider_second_btn_link',
            [
                'label' => esc_html__( 'Second Button Link', 'medibazar-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'medibazar-core' )
            ]
        );

        $this->add_control( 'slider_items',
            [
                'label' => esc_html__( 'Slide Items', 'medibazar-core' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{slider_title}}',
                'default' => [
                    [
                        'slider_image' => ['url' => $defaultbg],
                        'slider_second_image' => ['url' => $defaultsecond],
                        'slider_title' => 'Lab Hand Sanitizer',
                        'slider_subtitle' => 'New Formula',
                        'slider_desc' => 'Sed ut perspiciatis unde omnis iste natus error oluptatem accusantium doloremque laudantium totam rem',
                        'sale_tag' => '$89<span>.99</span>',
                        'slider_btn_title' => 'buy now',
                        'slider_btn_link' => '#0',
                        'slider_second_btn_title' => 'shop now',
                        'slider_second_btn_link' => '#0',
                    ],

                    [
                        'slider_image' => ['url' => $defaultbg],
                        'slider_second_image' => ['url' => $defaultsecond],
                        'slider_title' => 'Lab Hand Sanitizer',
                        'slider_subtitle' => 'New Formula',
                        'slider_desc' => 'Sed ut perspiciatis unde omnis iste natus error oluptatem accusantium doloremque laudantium totam rem',
                        'sale_tag' => '$89<span>.99</span>',
                        'slider_btn_title' => 'buy now',
                        'slider_btn_link' => '#0',
                        'slider_second_btn_title' => 'shop now',
                        'slider_second_btn_link' => '#0',
                    ],

                ]
            ]
        );
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
		
		
        /*****   START CONTROLS SECTION   ******/
		
		$this->start_controls_section('slider_styling',
            [
                'label' => esc_html__( 'Style', 'medibazar' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
		
		$this->add_responsive_control( 'home_slider_alignment',
            [
                'label' => esc_html__( 'Alignment', 'medibazar' ),
                'type' => Controls_Manager::CHOOSE,
                'selectors' => ['{{WRAPPER}} .hero-content ' => 'text-align: {{VALUE}};'],
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
               'selectors' => ['{{WRAPPER}} .slider-caption h2' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'title_hvrcolor',
           [
               'label' => esc_html__( 'Title Hover Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .slider-caption h2:hover' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .slider-caption h2 ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .slider-caption h2',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__( 'Typography', 'medibazar' ),

                'selector' => ' {{WRAPPER}} .slider-caption h2',
				
            ]
        );
		
		$this->add_control( 'subtitle_heading',
            [
                'label' => esc_html__( 'SUBTITLE', 'medibazar' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before',
            ]
        );
		
		$this->add_control( 'subtitle_border_color',
           [
               'label' => esc_html__( 'Subtitle Border Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .slider-caption span::before' => 'background-color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'subtitle_color',
           [
               'label' => esc_html__( 'Subtitle Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .slider-caption span ' => 'color: {{VALUE}};'],
           ]
        );
		
		
		$this->add_control( 'subtitle_hvrcolor',
           [
               'label' => esc_html__( 'Subtitle Hover Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .slider-caption span:hover' => 'color: {{VALUE}};'],
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
                'selectors' => ['{{WRAPPER}} .slider-caption span' => 'opacity: {{VALUE}};'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .slider-caption span',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typo',
                'label' => esc_html__( 'Typography', 'medibazar' ),

                'selector' => '{{WRAPPER}} .slider-caption span',
            ]
        );
		
		$this->add_control( 'desc_heading',
            [
                'label' => esc_html__( 'DESCRIPTION', 'medibazar' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before',
            ]
        );
		
		$this->add_control( 'desc_color',
           [
               'label' => esc_html__( 'Description Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .slider-caption p' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'desc_hvrcolor',
           [
               'label' => esc_html__( 'Description Hover Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .slider-caption p:hover' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'desc_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'medibazar-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .slider-caption p' => 'opacity: {{VALUE}};'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'desc_text_shadow',
				'selector' => '{{WRAPPER}} .slider-caption p',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typo',
                'label' => esc_html__( 'Typography', 'medibazar' ),

                'selector' => '{{WRAPPER}} .slider-caption p',
            ]
        );
		
		$this->add_control( 'tag_heading',
            [
                'label' => esc_html__( 'SALE TAG', 'medibazar' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'tag_bg_color',
           [
               'label' => esc_html__( 'Background Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .slide-price' => 'background-color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'tag_border_color',
           [
               'label' => esc_html__( 'Border Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .slide-price' => 'border-color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'tag_color',
           [
               'label' => esc_html__( 'Title Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .slide-price h3' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'tag_hvrcolor',
           [
               'label' => esc_html__( 'Title Hover Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .slide-price h3:hover' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'tag_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'medibazar-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .slide-price h3 ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'tag_text_shadow',
				'selector' => '{{WRAPPER}} .slide-price h3',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'tag_typo',
                'label' => esc_html__( 'Typography', 'medibazar' ),

                'selector' => ' {{WRAPPER}} .slide-price h3',
				
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
                'selectors' => ['{{WRAPPER}} .hero-02-slider-btn a.klb-homeslider2-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],              
            ]
        );
  	    
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typo',
                'label' => esc_html__( 'Typography', 'medibazar' ),

                'selector' => '{{WRAPPER}} .hero-02-slider-btn a.klb-homeslider2-btn'
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
                'selectors' => ['{{WRAPPER}} .hero-02-slider-btn a.klb-homeslider2-btn' => 'opacity: {{VALUE}} ;'],
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
                'selectors' => ['{{WRAPPER}} .hero-02-slider-btn a.klb-homeslider2-btn' => 'color: {{VALUE}};']
            ]
        );
       
	    $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'btn_border',
                'label' => esc_html__( 'Border', 'medibazar' ),
                'selector' => '{{WRAPPER}} .hero-02-slider-btn a.klb-homeslider2-btn ',
            ]
        );
        
		$this->add_responsive_control( 'btn_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'medibazar' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .hero-02-slider-btn a.klb-homeslider2-btn ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'],
            ]
        );
       
		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'btn_background',
                'label' => esc_html__( 'Background', 'medibazar' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .hero-02-slider-btn a.klb-homeslider2-btn ',
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
                'selectors' => ['{{WRAPPER}} .hero-02-slider-btn a.klb-homeslider2-btn:hover ' => 'color: {{VALUE}};']
            ]
        );
		
		$this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'btn_hvr_border',
                'label' => esc_html__( 'Border', 'medibazar' ),
                'selector' => '{{WRAPPER}} .hero-02-slider-btn a.klb-homeslider2-btn:hover ',
            ]
        );
        
		$this->add_responsive_control( 'btn_hvr_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'medibazar' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .hero-02-slider-btn a.klb-homeslider2-btn:hover ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'],
            ]
        );
		
		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'btn_hvr_background',
                'label' => esc_html__( 'Background', 'medibazar' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .hero-02-slider-btn a.klb-homeslider2-btn:hover',
            ]
        );
		
		$this->end_controls_tab(); //btn_hover_tab	
        $this->end_controls_tabs();	//btn_tabs
        $this->end_controls_section();
     	/*****   END CONTROLS SECTION   ******/
		
		
        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section('btn2_styling',
            [
                'label' => esc_html__( ' Second Button Style', 'medibazar' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
		
		$this->add_responsive_control( 'btn2_padding',
            [
                'label' => esc_html__( 'Padding', 'medibazar' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .hero-02-slider-btn a.red-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],              
            ]
        );
  	    
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn2_typo',
                'label' => esc_html__( 'Typography', 'medibazar' ),

                'selector' => '{{WRAPPER}} .hero-02-slider-btn a.red-btn'
            ]
        );
		
		$this->add_control( 'btn2_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'medibazar-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .hero-02-slider-btn a.red-btn' => 'opacity: {{VALUE}} ;'],
            ]
        );

		$this->start_controls_tabs('btn2_tabs');
        $this->start_controls_tab( 'btn2_normal_tab',
            [ 'label' => esc_html__( 'Normal', 'medibazar' ) ]
        );
		
		$this->add_control( 'btn2_color',
            [
                'label' => esc_html__( 'Color', 'medibazar' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .hero-02-slider-btn a.red-btn' => 'color: {{VALUE}};']
            ]
        );
       
	    $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'btn2_border',
                'label' => esc_html__( 'Border', 'medibazar' ),
                'selector' => '{{WRAPPER}} .hero-02-slider-btn a.red-btn ',
            ]
        );
        
		$this->add_responsive_control( 'btn2_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'medibazar' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .hero-02-slider-btn a.red-btn ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'],
            ]
        );
       
		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'btn2_background',
                'label' => esc_html__( 'Background', 'medibazar' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .hero-02-slider-btn a.red-btn ',
            ]
        );
       
		$this->end_controls_tab(); //btn2_normal_tab
        $this->start_controls_tab('btn2_hover_tab',
            [ 'label' => esc_html__( 'Hover', 'medibazar' ) ]
        );
       
	    $this->add_control( 'btn2_hvrcolor',
            [
                'label' => esc_html__( 'Color', 'medibazar' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .hero-02-slider-btn a.red-btn:hover ' => 'color: {{VALUE}};']
            ]
        );
		
		$this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'btn2_hvr_border',
                'label' => esc_html__( 'Border', 'medibazar' ),
                'selector' => '{{WRAPPER}} .hero-02-slider-btn a.red-btn:hover ',
            ]
        );
        
		$this->add_responsive_control( 'btn2_hvr_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'medibazar' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .hero-02-slider-btn a.red-btn:hover ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'],
            ]
        );
		
		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'btn2_hvr_background',
                'label' => esc_html__( 'Background', 'medibazar' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .hero-02-slider-btn a.red-btn:hover',
            ]
        );
		
		$this->end_controls_tab(); // btn2_hover_tab
        $this->end_controls_tabs(); //btn2_tabs
        $this->end_controls_section();
     	/*****   END CONTROLS SECTION   ******/
		
		
        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section('medibazar_nav_styling',
            [
                'label' => esc_html__( ' Nav Style', 'medibazar' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
       
	    $this->start_controls_tabs( 'slider_nav_tabs');
        $this->start_controls_tab( 'slider_nav_normal_tab',
            [ 'label'  => esc_html__( 'Normal', 'medibazar' ) ]
        );
        
		$this->add_control( 'nav_clr',
           [
               'label' => esc_html__( 'Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .slider-active button.slick-arrow' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'nav_background',
                'label' => esc_html__( 'Background', 'medibazar' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .slider-active button.slick-arrow',
            ]
        );
		
		$this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'nav_border',
                'label' => esc_html__( 'Border', 'medibazar' ),
                'selector' => '{{WRAPPER}} .slider-active button.slick-arrow ',
            ]
        );
        
		$this->add_responsive_control( 'nav_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'medibazar' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .slider-active button.slick-arrow ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'],
            ]
        );
       
	    $this->end_controls_tab(); //slider_nav_normal_tab
        $this->start_controls_tab( 'slider_nav_hover_tab',
            [ 'label' => esc_html__( 'Hover', 'medibazar' ) ]
        );
       
	    $this->add_control( 'nav_hvrclr',
            [
               'label' => esc_html__( 'Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => [
                   '{{WRAPPER}} .slider-active button:hover' => 'color: {{VALUE}};'
               ]
            ]
        );
		
		$this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'nav_hvr_border',
                'label' => esc_html__( 'Border', 'medibazar' ),
                'selector' => '{{WRAPPER}} .slider-active button:hover ',
            ]
        );
        
		$this->add_responsive_control( 'nav_hvr_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'medibazar' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .slider-active button:hover ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'],
            ]
        );
       
	    $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'nav_hvr_background',
                'label' => esc_html__( 'Background', 'medibazar' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .slider-active button:hover ',
            ]
        );
		
		$this->end_controls_tab(); //slider_nav_hover_tab
        $this->end_controls_tabs(); //slider_nav_tabs
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		if ( $settings['slider_items'] ) {
			
			echo '<section class="hero-area">';
			echo '<div class="hero-slider">';
			echo '<div class="slider-active">';
			
			foreach ( $settings['slider_items'] as $item ) {
				$target = $item['slider_btn_link']['is_external'] ? ' target="_blank"' : '';
				$nofollow = $item['slider_btn_link']['nofollow'] ? ' rel="nofollow"' : '';
				$secondtarget = $item['slider_second_btn_link']['is_external'] ? ' target="_blank"' : '';
				$secondnofollow = $item['slider_second_btn_link']['nofollow'] ? ' rel="nofollow"' : '';
				
				echo '<div class="single-slider slider-2-height d-flex align-items-center" data-background="'.esc_url($item['slider_image']['url']).'">';
				echo '<div class="container">';
				echo '<div class="row">';
				echo '<div class="col-xl-6 col-lg-7 col-md-9">';
				echo '<div class="hero-content">';
				echo '<div class="slider-caption ">';
				echo '<span data-animation="fadeInUp" data-delay=".2s">'.esc_html($item['slider_subtitle']).'</span>';
				echo '<h2 data-animation="fadeInUp" data-delay=".4s">'.esc_html($item['slider_title']).'</h2>';
				echo '<p data-animation="fadeInUp" data-delay=".6s">'.esc_html($item['slider_desc']).'</p>';
				echo '</div>';
				echo '<div class="hero-02-slider-btn">';
				echo '<a data-animation="fadeInUp" data-delay=".8s" href="'.esc_url($item['slider_btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="c-btn klb-homeslider2-btn">'.esc_html($item['slider_btn_title']).' <i class="far fa-plus"></i></a>';
				echo '<a data-animation="fadeInUp" data-delay=".8s" href="'.esc_url($item['slider_second_btn_link']['url']).'" '.esc_attr($secondtarget.$secondnofollow).' class="c-btn red-btn">'.esc_html($item['slider_second_btn_title']).' <i class="far fa-plus"></i></a>';
				echo '</div>';
				echo '</div>';
				echo '</div>';
				echo '<div class="col-xl-6 col-lg-5">';
				echo '<div class="slider-02-img" data-animation="fadeInRight" data-delay=".8s">';
				echo '<img src="'.esc_url($item['slider_second_image']['url']).'" alt="banner">';
				echo '<div class="slide-price">';
				echo '<h3>'.medibazar_sanitize_data($item['sale_tag']).'</h3>';
				echo '</div>';
				echo '</div>';
				echo '</div>';
				echo '</div>';
				echo '</div>';
				echo '</div>';
			}
			echo '</div>';
			echo '</div>';
			echo '</section>';

		}
	}

}
