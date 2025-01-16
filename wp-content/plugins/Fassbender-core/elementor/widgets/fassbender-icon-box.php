<?php

namespace Elementor;

class Fassbender_Icon_Box_Widget extends Widget_Base {

    public function get_name() {
        return 'Fassbender-icon-box';
    }
    public function get_title() {
        return 'Icon Box (K)';
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
				'label' => esc_html__( 'Content', 'plugin-name' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control(
			'switcher_icon',
			[
				'label' => esc_html__( 'Use Custom Icon', 'Fassbender-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'Fassbender-core' ),
				'label_off' => esc_html__( 'No', 'Fassbender-core' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);
		
		$this->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'Fassbender-core' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-facebook-f',
					'library' => 'fa-brands',
				],
                'label_block' => true,
				'condition' => ['switcher_icon' => '']
			]
		);
		
        $this->add_control( 'custom_icon',
            [
                'label' => esc_html__( 'Custom Icon', 'Fassbender-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'fal fa-ship',
                'description'=> 'You can add icon code. for example: fal fa-ship',
				'condition' => ['switcher_icon' => 'yes']
            ]
        );

       $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'Fassbender-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'pleaceholder' => esc_html__( 'Enter title here', 'Fassbender-core' ),
                'default' => 'Free Shipping',
            ]
        );
       $this->add_control( 'desc',
            [
                'label' => esc_html__( 'Description', 'Fassbender-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'pleaceholder' => esc_html__( 'Enter desc here', 'Fassbender-core' ),
                'default' => 'Sed perspicia unde omnis iste nat error voluptate accus',
            ]
        );
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
		
        /*****   START CONTROLS SECTION   ******/
		
		
		$this->start_controls_section('Fassbender_styling',
            [
                'label' => esc_html__( ' Style', 'Fassbender' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
		
		$this->add_responsive_control( 'icon_box_alignment',
            [
                'label' => esc_html__( 'Alignment', 'Fassbender' ),
                'type' => Controls_Manager::CHOOSE,
                'selectors' => ['{{WRAPPER}} .features-text ' => 'text-align: {{VALUE}};'],
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
		
		$this->add_control( 'icon_heading',
            [
                'label' => esc_html__( 'ICON', 'Fassbender' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before',
            ]
        );
		
		$this->add_responsive_control( 'icon_size',
            [
                'label' => esc_html__( 'Icon Size', 'Fassbender' ),
                'type' => Controls_Manager::SLIDER,
                'min' => 0,
                'max' => 100,
                'selectors' => [ '{{WRAPPER}} .features-icon i' => 'font-size: {{SIZE}}px;' ],
            ]
        );
		
		$this->add_control( 'icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'sosso' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#4e97fd',
			]
		);
		
		$this->add_control( 'icon_hvrcolor',
           [
               'label' => esc_html__( 'Icon Hover Color', 'Fassbender' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .features-icon i:hover' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'icon_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'Fassbender-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .features-icon i' => 'opacity: {{VALUE}};'],
				
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow',
				'selector' => '{{WRAPPER}} .features-icon i',
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
               'selectors' => ['{{WRAPPER}} .features-text h3 ' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'title_hvrcolor',
           [
               'label' => esc_html__( 'Title Hover Color', 'Fassbender' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .features-text h3:hover' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .features-text h3 ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .features-text h3 ',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__( 'Typography', 'Fassbender' ),

                'selector' => ' {{WRAPPER}} .features-text h3',
				
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
               'selectors' => ['{{WRAPPER}} .features-text p' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'subtitle_hvrcolor',
           [
               'label' => esc_html__( 'Subtitle Hover Color', 'Fassbender' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .features-text p:hover' => 'color: {{VALUE}};'],
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
                'selectors' => ['{{WRAPPER}} .features-text p' => 'opacity: {{VALUE}};'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .features-text p',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typo',
                'label' => esc_html__( 'Typography', 'Fassbender' ),

                'selector' => '{{WRAPPER}} .features-text p',
            ]
        );
		
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		$output = '';
		
			echo '<div class="features-wrapper">';
			echo '<div class="features-icon fe-1 f-left" style="color:'.esc_attr($settings['icon_color']).'">';
			if($settings['switcher_icon'] == 'yes'){
				echo '<i class="'.esc_attr($settings['custom_icon']).'"></i>';
			} else {
				Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'false' ] );						
			}
			echo '</div>';
			echo '<div class="features-text">';
			echo '<h3>'.esc_html($settings['title']).'</h3>';
			echo '<p>'.esc_html($settings['desc']).'</p>';
			echo '</div>';
			echo '</div>';
		
	}

}
