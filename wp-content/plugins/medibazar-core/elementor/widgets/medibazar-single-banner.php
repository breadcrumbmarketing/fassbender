<?php

namespace Elementor;

class Medibazar_Single_Banner_Widget extends Widget_Base {

    public function get_name() {
        return 'medibazar-single-banner';
    }
    public function get_title() {
        return 'Single Banner (K)';
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

		$this->add_control( 'banner_type',
			[
				'label' => esc_html__( 'Banner Type', 'medibazar-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'type1',
				'options' => [
					'select-column' => esc_html__( 'Select Type', 'medibazar-core' ),
					'type1'	  => esc_html__( 'Type 1', 'medibazar-core' ),
					'type2'	  => esc_html__( 'Type 2', 'medibazar-core' ),
					'type3'	  => esc_html__( 'Type 3', 'medibazar-core' ),
				],
			]
		);

		$defaultimage = plugins_url( 'images/banner-01.jpg', __DIR__ );
		
        $this->add_control( 'image',
            [
                'label' => esc_html__( 'Image', 'medibazar-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $defaultimage],
            ]
        );
		
        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'medibazar-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Super Sale',
                'pleaceholder' => esc_html__( 'Enter title here', 'medibazar-core' ),
            ]
        );

        $this->add_control( 'subtitle',
            [
                'label' => esc_html__( 'Subitle', 'medibazar-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'New Collection',
                'pleaceholder' => esc_html__( 'Enter subtitle here', 'medibazar-core' ),
            ]
        );
		
        $this->add_control( 'sale_tag',
            [
                'label' => esc_html__( 'Sale Tag', 'medibazar-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => '20% <br> <span>off</span> ',
                'pleaceholder' => esc_html__( 'Enter sale tag', 'medibazar-core' ),
				'condition' => ['banner_type' => 'type3']
            ]
        );

		
        $this->add_control( 'btn_title',
            [
                'label' => esc_html__( 'Button Title', 'medibazar-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Shop Now',
                'pleaceholder' => esc_html__( 'Enter button title here', 'medibazar-core' ),
            ]
        );
        $this->add_control( 'btn_link',
            [
                'label' => esc_html__( 'Button Link', 'medibazar-core' ),
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
                'label' => esc_html__( 'Style', 'medibazar' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
		
		$this->add_control( 'image_heading',
            [
                'label' => esc_html__( 'IMAGE', 'medibazar' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => ['banner_type' => ['type1' , 'type3' , 'select-column']]
            ]
        );
		
		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'css_filters',
				'selector' => '{{WRAPPER}} .banner-img img',
				'condition' => ['banner_type' => ['type1' , 'type3' , 'select-column']]
			]
		);
		
		$this->add_control( 'title_heading',
            [
                'label' => esc_html__( 'TITLE', 'medibazar' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_responsive_control( 'single_banner_alignment',
            [
                'label' => esc_html__( 'Alignment', 'medibazar' ),
                'type' => Controls_Manager::CHOOSE,
                'selectors' => ['{{WRAPPER}} .banner-text , {{WRAPPER}} .cta-text' => 'text-align: {{VALUE}};'],
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
		
		$this->add_control( 'title_color',
           [
               'label' => esc_html__( 'Title Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .banner-text span , {{WRAPPER}} .cta-text h2' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'title_hvrcolor',
           [
               'label' => esc_html__( 'Title Hover Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .banner-text span:hover , {{WRAPPER}} .cta-text h2:hover' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .banner-text span , {{WRAPPER}} .cta-text h2' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .banner-text span , {{WRAPPER}} .cta-text h2',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__( 'Typography', 'medibazar' ),

                'selector' => ' {{WRAPPER}} .banner-text span , {{WRAPPER}} .cta-text h2',
				
            ]
        );
		
		$this->add_control( 'subtitle_heading',
            [
                'label' => esc_html__( 'SUBTITLE', 'medibazar' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before',
            ]
        );
		
		$this->add_control( 'subtitle_bg_color',
           [
               'label' => esc_html__( 'Subtitle Background Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .cta-text span' => 'background-color: {{VALUE}};'],
			   'condition' => ['banner_type' => ['type2']]
           ]
        );
		
		$this->add_control( 'subtitle_bg_hvrcolor',
           [
               'label' => esc_html__( ' Subtitle Hover Background Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .cta-text span:hover' => 'background-color: {{VALUE}};'],
			   'condition' => ['banner_type' => ['type2']]
           ]
        );
		
		$this->add_control( 'subtitle_color',
           [
               'label' => esc_html__( 'Subtitle Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .banner-text h2 , {{WRAPPER}} .cta-text span' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'subtitle_hvrcolor',
           [
               'label' => esc_html__( 'Subtitle Hover Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .banner-text h2:hover , {{WRAPPER}} .cta-text span:hover' => 'color: {{VALUE}};'],
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
                'selectors' => ['{{WRAPPER}} .banner-text h2 , {{WRAPPER}} .cta-text span' => 'opacity: {{VALUE}};'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .banner-text h2 , {{WRAPPER}} .cta-text span',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typo',
                'label' => esc_html__( 'Typography', 'medibazar' ),

                'selector' => '{{WRAPPER}} .banner-text h2 , {{WRAPPER}} .cta-text span',
            ]
        );
		
		$this->add_control( 'sale_tag_heading',
            [
                'label' => esc_html__( 'SALE TAG', 'medibazar' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => ['banner_type' => ['type3']]
            ]
        );
		
		$this->add_control( 'sale_tag_bg_color',
           [
               'label' => esc_html__( 'Sale Tag Background Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .b-02-tag' => 'background-color: {{VALUE}};'],
			   'condition' => ['banner_type' => ['type3']]
           ]
        );
		
		$this->add_control( 'sale_tag_bg_hvrcolor',
           [
               'label' => esc_html__( 'Sale Tag Hover Background Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .b-02-tag:hover' => 'background-color: {{VALUE}};'],
			   'condition' => ['banner_type' => ['type3']]
           ]
        );
		
		$this->add_control( 'sale_tag_color',
           [
               'label' => esc_html__( 'Sale Tag Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .b-02-tag h3 , {{WRAPPER}}  .b-02-tag span' => 'color: {{VALUE}};'],
			   'condition' => ['banner_type' => ['type3']]
           ]
        );
		
		$this->add_control( 'sale_tag_hvrcolor',
           [
               'label' => esc_html__( 'Sale Tag Hover Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .b-02-tag h3:hover , {{WRAPPER}}  .b-02-tag span:hover ' => 'color: {{VALUE}};'],
			   'condition' => ['banner_type' => ['type3']]
           ]
        );
		
		$this->add_control( 'sale_tag_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'medibazar-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .b-02-tag ' => 'opacity: {{VALUE}} ;'],
				'condition' => ['banner_type' => ['type3']]
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'sale_tag_text_shadow',
				'selector' => '{{WRAPPER}} .b-02-tag',
				'condition' => ['banner_type' => ['type3']]
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sale_tag_typo',
                'label' => esc_html__( 'Typography', 'medibazar' ),

                'selector' => ' {{WRAPPER}} .b-02-tag h3 , {{WRAPPER}}  .b-02-tag span',
				'condition' => ['banner_type' => ['type3']]
				
            ]
        );
		

        $this->end_controls_section();	
		/*****   END CONTROLS SECTION   ******/
		
        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section('btn_styling',
            [
                'label' => esc_html__( 'Button Style', 'medibazar' ),
                'tab' => Controls_Manager::TAB_STYLE,
				'condition' => ['banner_type' => ['type1' , 'type3' , 'select-column']]
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
		
		$this->end_controls_tab();  //btn_hover_tab
        $this->end_controls_tabs(); //btn_tabs
        $this->end_controls_section();
     	/*****   END CONTROLS SECTION   ******/
		
		
        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section('btn2_styling',
            [
                'label' => esc_html__( ' Button Style', 'medibazar' ),
                'tab' => Controls_Manager::TAB_STYLE,
				'condition' => ['banner_type' => ['type2']]
            ]
        );
		
		$this->add_responsive_control( 'btn2_padding',
            [
                'label' => esc_html__( 'Padding', 'medibazar' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .cta-text .c-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],              
            ]
        );
  	    
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn2_typo',
                'label' => esc_html__( 'Typography', 'medibazar' ),

                'selector' => '{{WRAPPER}} .cta-text .c-btn'
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
                'selectors' => ['{{WRAPPER}} .cta-text .c-btn' => 'opacity: {{VALUE}} ;'],
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
                'selectors' => ['{{WRAPPER}} .cta-text .c-btn' => 'color: {{VALUE}};']
            ]
        );
       
	    $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'btn2_border',
                'label' => esc_html__( 'Border', 'medibazar' ),
                'selector' => '{{WRAPPER}} .cta-text .c-btn ',
            ]
        );
        
		$this->add_responsive_control( 'btn2_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'medibazar' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .cta-text .c-btn ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'],
            ]
        );
       
		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'btn2_background',
                'label' => esc_html__( 'Background', 'medibazar' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .cta-text .c-btn ',
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
                'selectors' => ['{{WRAPPER}} .cta-text .c-btn:hover ' => 'color: {{VALUE}};']
            ]
        );
		
		$this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'btn2_hvr_border',
                'label' => esc_html__( 'Border', 'medibazar' ),
                'selector' => '{{WRAPPER}} .cta-text .c-btn:hover ',
            ]
        );
        
		$this->add_responsive_control( 'btn2_hvr_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'medibazar' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .cta-text .c-btn:hover ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'],
            ]
        );
		
		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'btn2_hvr_background',
                'label' => esc_html__( 'Background', 'medibazar' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .cta-text .c-btn:hover',
            ]
        );
		
		$this->end_controls_tab(); //btn2_hover_tab	
        $this->end_controls_tabs(); //btn2_tabs
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$target   = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';

		$output = '';
		
		if($settings['banner_type'] == 'type2'){
			echo '<div class="cta-area">';
			echo '<div class="container">';
			echo '<div class="cta-bg pt-80 pb-80" data-background="'.esc_url($settings['image']['url']).'">';
			echo '<div class="row">';
			echo '<div class="col-xl-6 col-lg-6 col-md-6">';
			echo '<div class="cta-wrapper">';
			echo '<div class="cta-text">';
			echo '<span>'.esc_html($settings['subtitle']).'</span>';
			echo '<h2>'.esc_html($settings['title']).'</h2>';
			if($settings['btn_title']){
				echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="c-btn">'.esc_html($settings['btn_title']).' <i class="far fa-plus"></i></a>';
			}
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
		} elseif($settings['banner_type'] == 'type3'){
			echo '<div class="banner-wrapper text-center">';
			echo '<div class="banner-img pos-rel">';
			echo '<a href="'.esc_url($settings['btn_link']['url']).'"><img src="'.esc_url($settings['image']['url']).'" alt="banner"></a>';
			if($settings['sale_tag']){
			echo '<div class="b-02-tag">';
			echo '<h3>'.medibazar_sanitize_data($settings['sale_tag']).'</h3>';
			echo '</div>';
			}
			echo '<div class="banner-text banner-1-text">';
			echo '<span>'.esc_html($settings['title']).'</span>';
			echo '<h2>'.esc_html($settings['subtitle']).'</h2>';
			echo '<div class="b-button red-b-button">';
			if($settings['btn_title']){
				echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).'>'.esc_html($settings['btn_title']).' <i class="far fa-plus"></i></a>';
			}
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
		} else {
			echo '<div class="banner-wrapper">';
			echo '<div class="banner-img pos-rel">';
			echo '<a href="'.esc_url($settings['btn_link']['url']).'"><img src="'.esc_url($settings['image']['url']).'" alt="banner1"></a>';
			echo '<div class="banner-text">';
			echo '<span>'.esc_html($settings['title']).'</span>';
			echo '<h2>'.esc_html($settings['subtitle']).'</h2>';
			echo '<div class="b-button red-b-button">';
			if($settings['btn_title']){
				echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).'>'.esc_html($settings['btn_title']).' <i class="far fa-plus"></i></a>';
			}
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
		}


	}

}
