<?php

namespace Elementor;

class medibazar_Deal_Banner_Widget extends Widget_Base {
    use medibazar_Helper;

    public function get_name() {
        return 'medibazar-deal-banner';
    }
    public function get_title() {
        return 'Deal Banner (K)';
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
		
		$custombg = plugins_url( 'images/deal-bg.jpg', __DIR__ );
		$customitem = plugins_url( 'images/deal-item.png', __DIR__ );

        $this->add_control( 'background',
            [
                'label' => esc_html__( 'Background', 'medibazar-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $custombg],
            ]
        );
		
        $this->add_control( 'image',
            [
                'label' => esc_html__( 'Image', 'medibazar-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $customitem],
            ]
        );
		
        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'medibazar-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Deal Of This Week',				
            ]
        );
		
        $this->add_control( 'desc',
            [
                'label' => esc_html__( 'Description', 'medibazar-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Sed ut perspiciatis unde omnis iste natus error',				
            ]
        );
		
        $this->add_control( 'subtitle',
            [
                'label' => esc_html__( 'Subitle', 'medibazar-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Covid -19 <span>Vaccine</span>',
                'pleaceholder' => esc_html__( 'Enter subtitle here', 'medibazar-core' ),
            ]
        );
		
        $this->add_control( 'price',
            [
                'label' => esc_html__( 'Price', 'medibazar-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => '$205.99',
                'pleaceholder' => esc_html__( 'Enter price here', 'medibazar-core' ),
            ]
        );

        $this->add_control( 'expired_date',
            [
                'label' => esc_html__( 'Expired Date', 'medibazar-core' ),
                'type' => Controls_Manager::TEXT ,
                'default' => '2020/12/01',
                'label_block' => true,
            ]
        );
		
        $this->add_control( 'btn_title',
            [
                'label' => esc_html__( 'Button Title', 'shopwise' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Buy Now',
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
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/


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
		
		$this->add_responsive_control( 'deal_banner_alignment',
            [
                'label' => esc_html__( 'Alignment', 'medibazar' ),
                'type' => Controls_Manager::CHOOSE,
                'selectors' => ['{{WRAPPER}} .deal-02-wrapper ' => 'text-align: {{VALUE}} !important;'],
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
				'selector' => '{{WRAPPER}} .deal-img img',
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
               'selectors' => ['{{WRAPPER}} .section-title p' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'desc_hvrcolor',
           [
               'label' => esc_html__( 'Description Hover Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .section-title p:hover' => 'color: {{VALUE}};'],
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
                'selectors' => ['{{WRAPPER}} .section-title p' => 'opacity: {{VALUE}};'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'desc_text_shadow',
				'selector' => '{{WRAPPER}} .section-title p',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typo',
                'label' => esc_html__( 'Typography', 'medibazar' ),

                'selector' => '{{WRAPPER}} .section-title p',
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
               'selectors' => ['{{WRAPPER}} .deal-content h2' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'subtitle_hvrcolor',
           [
               'label' => esc_html__( 'Subtitle Hover Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .deal-content h2:hover' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'second_subtitle_color',
           [
               'label' => esc_html__( 'Second Subtitle Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .deal-content h2 > span' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'second_subtitle_hvrcolor',
           [
               'label' => esc_html__( 'Second Subtitle Hover Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .deal-content h2 > span:hover' => 'color: {{VALUE}};'],
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
                'selectors' => ['{{WRAPPER}} .deal-content h2' => 'opacity: {{VALUE}};'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .deal-content h2',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typo',
                'label' => esc_html__( 'Typography', 'medibazar' ),

                'selector' => '{{WRAPPER}} .deal-content h2',
            ]
        );
		
		$this->add_control( 'price_heading',
            [
                'label' => esc_html__( 'Price', 'medibazar' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'price_color',
           [
               'label' => esc_html__( 'Price Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .deal-content > span' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'price_hvrcolor',
           [
               'label' => esc_html__( 'Price Hover Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .deal-content > span:hover' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .deal-button a.c-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],              
            ]
        );
  	    
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typo',
                'label' => esc_html__( 'Typography', 'medibazar' ),

                'selector' => '{{WRAPPER}} .deal-button a.c-btn'
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
                'selectors' => ['{{WRAPPER}} .deal-button a.c-btn' => 'opacity: {{VALUE}} ;'],
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
                'selectors' => ['{{WRAPPER}} .deal-button a.c-btn' => 'color: {{VALUE}};']
            ]
        );
       
	    $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'btn_border',
                'label' => esc_html__( 'Border', 'medibazar' ),
                'selector' => '{{WRAPPER}} .deal-button a.c-btn ',
            ]
        );
        
		$this->add_responsive_control( 'btn_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'medibazar' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .deal-button a.c-btn ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'],
            ]
        );
       
		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'btn_background',
                'label' => esc_html__( 'Background', 'medibazar' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .deal-button a.c-btn ',
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
                'selectors' => ['{{WRAPPER}} .deal-button a.c-btn:hover ' => 'color: {{VALUE}};']
            ]
        );
		
		$this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'btn_hvr_border',
                'label' => esc_html__( 'Border', 'medibazar' ),
                'selector' => '{{WRAPPER}} .deal-button a.c-btn:hover ',
            ]
        );
        
		$this->add_responsive_control( 'btn_hvr_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'medibazar' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .deal-button a.c-btn:hover ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'],
            ]
        );
		
		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'btn_hvr_background',
                'label' => esc_html__( 'Background', 'medibazar' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .deal-button a.c-btn:hover',
            ]
        );
	
		$this->end_controls_tab(); //btn_hover_tab
        $this->end_controls_tabs(); //btn_tabs
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$target = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';		
		
		echo '<div class="deal-bg" data-background="'.esc_url($settings['background']['url']).'">';
		echo '<div class="row">';
		echo '<div class="col-xl-6 col-lg-6">';
		echo '<div class="deal-02-wrapper mb-30">';
		echo '<div class="section-title mb-35">';
		echo '<h2>'.esc_html($settings['title']).'</h2>';
		echo '<p>'.esc_html($settings['desc']).'</p>';
		echo '</div>';
		echo '<div class="deal-content mb-45">';
		echo '<h2>'.medibazar_sanitize_data($settings['subtitle']).'</h2>';
		echo '<span>'.esc_html($settings['price']).'</span>';
		echo '<div class="deal-button">';
		echo '<a class="c-btn" href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).'>'.esc_html($settings['btn_title']).' <i class="far fa-plus"></i></a>';
		echo '</div>';
		echo '</div>';
		echo '<div class="deal-count">';
		echo '<div class="deal-time" data-countdown="'.esc_attr($settings['expired_date']).'" data-days="'.esc_attr($settings['days_text']).'" data-hour="'.esc_attr($settings['hour_text']).'" data-minute="'.esc_attr($settings['minute_text']).'" data-second="'.esc_attr($settings['second_text']).'"></div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '<div class="col-lg-6 col-lg-6">';
		echo '<div class="deal-img mb-30">';
		echo '<img src="'.esc_url($settings['image']['url']).'" alt="item">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}

}
