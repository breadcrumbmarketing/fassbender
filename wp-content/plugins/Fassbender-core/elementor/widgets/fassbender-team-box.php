<?php

namespace Elementor;

class Fassbender_Team_Box_Widget extends Widget_Base {

    public function get_name() {
        return 'Fassbender-team-box';
    }
    public function get_title() {
        return 'Team Box (K)';
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

		$defaultimage = plugins_url( 'images/team.jpg', __DIR__ );
		
        $this->add_control( 'image',
            [
                'label' => esc_html__( 'Image', 'Fassbender-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $defaultimage],
            ]
        );
		
        $this->add_control( 'name',
            [
                'label' => esc_html__( 'Name', 'Fassbender-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'DR. Michael Coleman',
                'placeholder' => esc_html__( 'Enter the text', 'Fassbender-core' )
            ]
        );

        $this->add_control( 'position',
            [
                'label' => esc_html__( 'Position', 'Fassbender-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'covid -19 doctor',
                'placeholder' => esc_html__( 'Enter the text here', 'Fassbender-core' )
            ]
        );

        $this->add_control( 'button_url',
            [
                'label' => esc_html__( 'Button URL', 'Fassbender-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'Fassbender-core' )
            ]
        );

		$repeater = new Repeater();
		
		$repeater->add_control(
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
		
        $repeater->add_control( 'custom_icon',
            [
                'label' => esc_html__( 'Custom Icon', 'Fassbender-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'fab fa-facebook-f',
                'description'=> 'You can add icon code. for example: ion-social-facebook',
				'condition' => ['switcher_icon' => 'yes']
            ]
        );
		
		$repeater->add_control(
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
		
        $repeater->add_control( 'social_url',
            [
                'label' => esc_html__( 'Social URL', 'Fassbender-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'Fassbender-core' )
            ]
        );

        $this->add_control( 'social_items',
            [
                'label' => esc_html__( 'Social Items', 'Fassbender-core' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'social_icon' => 'fab fa-facebook-f',
                        'social_url' => '#',
                    ],
                    [
                        'social_icon' => 'fab fa-twitter',
                        'social_url' => '#',
                    ],
                    [
                        'social_icon' => 'fab fa-instagram',
                        'social_url' => '#',
                    ]
                ]
            ]
        );
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
		
        /*****   START CONTROLS SECTION   ******/
		
		$this->start_controls_section('Fassbender_styling',
            [
                'label' => esc_html__( 'Style', 'Fassbender' ),
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
				'selector' => '{{WRAPPER}} .team-img img ',
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
                'selectors' => [ '{{WRAPPER}} .team-icon a' => 'font-size: {{SIZE}}px;' ],
            ]
        );
		
		$this->add_control( 'icon_bg_color',
           [
               'label' => esc_html__( 'Icon Background Color', 'Fassbender' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .team-icon a' => 'background-color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'icon_bg_hvrcolor',
           [
               'label' => esc_html__( 'Icon Background Hover Color', 'Fassbender' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .team-icon a:hover' => 'background-color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'icon_color',
           [
               'label' => esc_html__( 'Icon Color', 'Fassbender' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .team-icon a' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'icon_hvrcolor',
           [
               'label' => esc_html__( 'Icon Hover Color', 'Fassbender' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .team-icon a:hover' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'icon_border',
				'selector' => '{{WRAPPER}} .team-icon a',
				
			]
		);
		
		$this->add_responsive_control( 'icon_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'Fassbender' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .team-icon a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'],
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
                'selectors' => ['{{WRAPPER}} .team-icon a' => 'opacity: {{VALUE}};'],
				
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow',
				'selector' => '{{WRAPPER}} .team-icon a',
			]
		);
		
		$this->add_control( 'name_heading',
            [
                'label' => esc_html__( 'NAME', 'Fassbender' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'name_color',
           [
               'label' => esc_html__( 'Name Color', 'Fassbender' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .team-text h4' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'name_hvrcolor',
           [
               'label' => esc_html__( 'Name Hover Color', 'Fassbender' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .team-text h4:hover' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'name_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'Fassbender-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .team-text h4' => 'opacity: {{VALUE}} ;'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'name_text_shadow',
				'selector' => '{{WRAPPER}} .team-text h4',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'name_typo',
                'label' => esc_html__( 'Typography', 'Fassbender' ),

                'selector' => '{{WRAPPER}} .team-text h4'
            ]
        );
		
		$this->add_control( 'position_heading',
            [
                'label' => esc_html__( 'POSITION', 'Fassbender' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'position_color',
           [
               'label' => esc_html__( 'Position Color', 'Fassbender' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .team-text span' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'position_hvrcolor',
           [
               'label' => esc_html__( 'Position Hover Color', 'Fassbender' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .team-text span:hover' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'position_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'Fassbender-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .team-text span' => 'opacity: {{VALUE}} ;'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'position_text_shadow',
				'selector' => '{{WRAPPER}} .team-text span',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'position_typo',
                'label' => esc_html__( 'Typography', 'Fassbender' ),

                'selector' => '{{WRAPPER}} .team-text span'
            ]
        );
		
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$target = $settings['button_url']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['button_url']['nofollow'] ? ' rel="nofollow"' : '';

		$output = '';
				
		echo '<div class="team-wrapper">';
		echo '<div class="team-img">';
		echo '<a href="'.esc_url($settings['button_url']['url']).'" '.esc_attr($target.$nofollow).'>';
		echo '<img src="'.esc_url($settings['image']['url']).'" alt="team_img1">';
		echo '</a>';
		echo '</div>';
		echo '<div class="inner-team text-center">';
		echo '<div class="team-icon">';
		foreach($settings['social_items'] as $item){
			$target = $item['social_url']['is_external'] ? ' target="_blank"' : '';
			$nofollow = $item['social_url']['nofollow'] ? ' rel="nofollow"' : '';
			echo '<a href="'.esc_url($item['social_url']['url']).'" '.esc_attr($target.$nofollow).'>';
		
			if($item['switcher_icon'] == 'yes'){
				echo '<i class="'.esc_attr($item['custom_icon']).'"></i>';
			} else {
				Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'false' ] );						
			}
			echo '</a>';
		}
		echo '</div>';
		echo '<div class="team-text">';
		echo '<a href="'.esc_url($settings['button_url']['url']).'" '.esc_attr($target.$nofollow).'>';
		echo '<h4>'.esc_html($settings['name']).'</h4>';
		echo '</a>';
		echo '<span>'.esc_html($settings['position']).'</span>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}

}
