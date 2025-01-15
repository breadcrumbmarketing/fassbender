<?php

namespace Elementor;

class Medibazar_Hero_Slider_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'medibazar-hero-slider';
    }
    public function get_title() {
        return 'Hero Slider (K)';
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

		$defaultbg = plugins_url( 'images/slider-hero-bg.jpg', __DIR__ );
		$defaultimg = plugins_url( 'images/slider-hero-img.png', __DIR__ );

        $this->add_control( 'sliderbg',
            [
                'label' => esc_html__( 'Background Image', 'medibazar-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $defaultbg],
            ]
        );
		
        $this->add_control( 'image',
            [
                'label' => esc_html__( 'Image', 'medibazar-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $defaultimg],
            ]
        );
		
        $this->add_control( 'second_title',
            [
                'label' => esc_html__( 'Second Title', 'medibazar-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'covid -19 products',
                'pleaceholder' => esc_html__( 'Set a title.', 'medibazar-core' ),
                'label_block' => true,
            ]
        );
		
        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'medibazar-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Face Mask Thermometer',
                'pleaceholder' => esc_html__( 'Set a title.', 'medibazar-core' ),
                'label_block' => true,
            ]
        );
		
        $this->add_control( 'subtitle',
            [
                'label' => esc_html__( 'Subtitle', 'medibazar-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Quis autem vel eum iure reprehenin voluptate velit esse quam nihil molestiae conse',
                'pleaceholder' => esc_html__( 'Set a subtitle.', 'medibazar-core' ),
                'label_block' => true,
            ]
        );
		
        $this->add_control( 'slider_btn_title',
            [
                'label' => esc_html__( 'Button Title', 'medibazar-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'shop now',
                'pleaceholder' => esc_html__( 'Enter button title here', 'medibazar-core' )
            ]
        );
		
        $this->add_control( 'slider_btn_link',
            [
                'label' => esc_html__( 'Button Link', 'medibazar-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'medibazar-core' )
            ]
        );
		
        $this->add_control( 'slider_second_btn_title',
            [
                'label' => esc_html__( 'Second Button Title', 'medibazar-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'hot collection',
                'pleaceholder' => esc_html__( 'Enter button title here', 'medibazar-core' )
            ]
        );
		
        $this->add_control( 'slider_second_btn_link',
            [
                'label' => esc_html__( 'Second Button Link', 'medibazar-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'medibazar-core' )
            ]
        );
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
		
		
        /*****   START CONTROLS SECTION   ******/
		
		$this->start_controls_section('medibazar_styling',
            [
                'label' => esc_html__( ' Image', 'medibazar' ),
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
				'selector' => '{{WRAPPER}} .slider-img img',
			]
		);
		
		$this->add_responsive_control( 'image_text_height',
            [
                'label' => esc_html__( 'Height', 'medibazar' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}  .slider-img img' => 'height: {{SIZE}}{{UNIT}}',
                ]
            ]
        );
		
		$this->add_responsive_control( 'image_text_width',
            [
                'label' => esc_html__( 'Width', 'medibazar' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}  .slider-img img' => 'width: {{SIZE}}{{UNIT}}',
                ]
            ]
        );
		
		$this->add_responsive_control( 'image_text_top',
            [
                'label' => esc_html__( 'Top', 'medibazar' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}  .slider-img img' => 'margin-top: {{SIZE}}{{UNIT}}',
                ]
            ]
        );
		
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'image_border',
				'selector' => '{{WRAPPER}} .slider-img img',
				
			]
		);
		
		$this->add_responsive_control( 'image_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'medibazar' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .slider-img img ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'],
            ]
        );
		
		
        $this->end_controls_section();
     	/*****   END CONTROLS SECTION   ******/
		
		
        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section('text_styling',
            [
                'label' => esc_html__( ' Text', 'medibazar' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
		
		$this->add_responsive_control( 'hero_slider_alignment',
            [
                'label' => esc_html__( 'Alignment', 'medibazar' ),
                'type' => Controls_Manager::CHOOSE,
                'selectors' => ['{{WRAPPER}} .hero-slider-caption ' => 'text-align: {{VALUE}};'],
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
               'selectors' => ['{{WRAPPER}} .hero-slider-caption h2' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'title_hvrcolor',
           [
               'label' => esc_html__( 'Title Hover Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .hero-slider-caption h2:hover' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .hero-slider-caption h2 ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .hero-slider-caption h2',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__( 'Typography', 'medibazar' ),

                'selector' => ' {{WRAPPER}} .hero-slider-caption h2',
				
            ]
        );
		
		$this->add_control( 'second_title_heading',
            [
                'label' => esc_html__( 'SECOND TITLE', 'medibazar' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'second_title_bg_color',
           [
               'label' => esc_html__( 'Second Title Background Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .hero-slider-caption > span' => 'background-color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'second_title_bg_hvrcolor',
           [
               'label' => esc_html__( 'Second Title Hover Background Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .hero-slider-caption > span:hover' => 'background-color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'second_title_color',
           [
               'label' => esc_html__( 'Second Title Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .hero-slider-caption > span' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'second_title_hvrcolor',
           [
               'label' => esc_html__( 'Second Title Hover Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .hero-slider-caption > span:hover' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .hero-slider-caption > span ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'second_title_text_shadow',
				'selector' => '{{WRAPPER}} .hero-slider-caption > span',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'second_title_typo',
                'label' => esc_html__( 'Typography', 'medibazar' ),

                'selector' => ' {{WRAPPER}} .hero-slider-caption > span',
				
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
               'selectors' => ['{{WRAPPER}} .hero-slider-caption p::before' => 'background-color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'subtitle_color',
           [
               'label' => esc_html__( 'Subtitle Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .hero-slider-caption p' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'subtitle_hvrcolor',
           [
               'label' => esc_html__( 'Subtitle Hover Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .hero-slider-caption p:hover' => 'color: {{VALUE}};'],
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
                'selectors' => ['{{WRAPPER}} .hero-slider-caption p' => 'opacity: {{VALUE}};'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .hero-slider-caption p',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typo',
                'label' => esc_html__( 'Typography', 'medibazar' ),

                'selector' => '{{WRAPPER}} .hero-slider-caption p',
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
                'selectors' => ['{{WRAPPER}} .hero-slider-btn .c-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],              
            ]
        );
  	    
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typo',
                'label' => esc_html__( 'Typography', 'medibazar' ),

                'selector' => '{{WRAPPER}} .hero-slider-btn .c-btn'
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
                'selectors' => ['{{WRAPPER}} .hero-slider-btn .c-btn' => 'opacity: {{VALUE}} ;'],
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
                'selectors' => ['{{WRAPPER}} .hero-slider-btn .c-btn' => 'color: {{VALUE}};']
            ]
        );
       
	    $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'btn_border',
                'label' => esc_html__( 'Border', 'medibazar' ),
                'selector' => '{{WRAPPER}} .hero-slider-btn .c-btn ',
            ]
        );
        
		$this->add_responsive_control( 'btn_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'medibazar' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .hero-slider-btn .c-btn ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'],
            ]
        );
       
		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'btn_background',
                'label' => esc_html__( 'Background', 'medibazar' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .hero-slider-btn .c-btn ',
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
                'selectors' => ['{{WRAPPER}} .hero-slider-btn .c-btn:hover ' => 'color: {{VALUE}};']
            ]
        );
		
		$this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'btn_hvr_border',
                'label' => esc_html__( 'Border', 'medibazar' ),
                'selector' => '{{WRAPPER}} .hero-slider-btn .c-btn:hover ',
            ]
        );
        
		$this->add_responsive_control( 'btn_hvr_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'medibazar' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .hero-slider-btn .c-btn:hover ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'],
            ]
        );
		
		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'btn_hvr_background',
                'label' => esc_html__( 'Background', 'medibazar' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .hero-slider-btn .c-btn:hover',
            ]
        );
		
		$this->end_controls_tab(); //btn_hover_tab
        $this->end_controls_tabs(); //btn_tabs
        $this->end_controls_section();
     	/*****   END CONTROLS SECTION   ******/
		
        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section('btn2_styling',
            [
                'label' => esc_html__( 'Second Button Style', 'medibazar' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
  	    
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn2_typo',
                'label' => esc_html__( 'Typography', 'medibazar' ),

                'selector' => '{{WRAPPER}} .b-button a'
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
                'selectors' => ['{{WRAPPER}} .b-button a' => 'opacity: {{VALUE}} ;'],
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
                'selectors' => ['{{WRAPPER}} .b-button a  ' => 'color: {{VALUE}};']
            ]
        );
		
		$this->add_control( 'btn2_border_color',
            [
                'label' => esc_html__( 'Border Color', 'medibazar' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .b-button > a::before ' => 'background-color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .b-button a:hover ' => 'color: {{VALUE}};']
            ]
        );
		
		$this->add_control( 'btn2_border_hvr_color',
            [
                'label' => esc_html__( 'Border Hover Color', 'medibazar' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .b-button > a::after' => 'background-color: {{VALUE}};']
            ]
        );
		
		
		$this->end_controls_tab(); //btn2_hover_tab
        $this->end_controls_tabs(); //btn2_tabs
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
			$target = $settings['slider_btn_link']['is_external'] ? ' target="_blank"' : '';
			$nofollow = $settings['slider_btn_link']['nofollow'] ? ' rel="nofollow"' : '';
			$secondtarget = $settings['slider_second_btn_link']['is_external'] ? ' target="_blank"' : '';
			$secondnofollow = $settings['slider_second_btn_link']['nofollow'] ? ' rel="nofollow"' : '';
				
            echo '<section class="hero-area">';
            echo '<div class="hero-slider">';
            echo '<div class="slider-active">';
            echo '<div class="single-slider slider-height d-flex align-items-center" data-background="'.esc_url($settings['sliderbg']['url']).'">';
            echo '<div class="container">';
            echo '<div class="row">';
            echo '<div class="col-xl-5 col-lg-6">';
            echo '<div class="hero-text mt-90">';
            echo '<div class="hero-slider-caption ">';
            echo '<span data-animation="fadeInUp" data-delay=".2s">'.esc_html($settings['second_title']).'</span>';
            echo '<h2 data-animation="fadeInUp" data-delay=".4s">'.esc_html($settings['title']).'</h2>';
            echo '<p data-animation="fadeInUp" data-delay=".6s">'.esc_html($settings['subtitle']).'</p>';
            echo '</div>';
            echo '<div class="hero-slider-btn">';
			if($settings['slider_btn_title']){
				echo '<a data-animation="fadeInUp" data-delay=".8s" href="'.esc_url($settings['slider_btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="c-btn">'.esc_html($settings['slider_btn_title']).' <i class="far fa-plus"></i></a> ';
            }
			if($settings['slider_second_btn_title']){
				echo '<div class="b-button" data-animation="fadeInUp" data-delay="1s" style="animation-delay: 1s;">';
				echo '<a href="'.esc_url($settings['slider_second_btn_link']['url']).'" '.esc_attr($secondtarget.$secondnofollow).'>'.esc_html($settings['slider_second_btn_title']).' <i class="far fa-plus"></i></a>';
				echo '</div>';
			}
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '<div class="col-xl-7 col-lg-6">';
            echo '<div class="slider-img d-none d-lg-block" data-animation="fadeInRight" data-delay=".8s">';
            echo '<img src="'.esc_url($settings['image']['url']).'" alt="">';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</section>';
		
	}

}
