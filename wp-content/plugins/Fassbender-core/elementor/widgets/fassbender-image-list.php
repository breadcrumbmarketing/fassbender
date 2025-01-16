<?php

namespace Elementor;

class Fassbender_Image_List_Widget extends Widget_Base {

    public function get_name() {
        return 'Fassbender-image-list';
    }
    public function get_title() {
        return 'Image List (K)';
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
		
		$repeater = new Repeater();
		
		$defaultimg = plugins_url( 'images/imagelist.png', __DIR__ );
        $repeater->add_control( 'item_image',
            [
                'label' => esc_html__( 'Image', 'Fassbender-core' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );
		
		$repeater->add_control( 'item_title',
            [
                'label' => esc_html__( 'Title', 'Fassbender-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'pleaceholder' => esc_html__( 'Enter title here', 'Fassbender-core' ),
                'default' => 'Our MIssion & Vision',
            ]
        );
		
		$repeater->add_control( 'item_desc',
            [
                'label' => esc_html__( 'Description', 'Fassbender-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'pleaceholder' => esc_html__( 'Enter desc here', 'Fassbender-core' ),
                'default' => 'Quis autem vel eum iure reprehenderit quin voluptate velit esse quam nihil molestiae consequatur vel illum qui dolorem eum',
            ]
        );
		
        $this->add_control( 'block_items',
            [
                'label' => esc_html__( 'Image Items', 'Fassbender-core' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'item_image' => ['url' => $defaultimg],
                        'item_title' => 'Apply Alcohol Spray',
						'item_desc' => 'Sed perspiciatis unde omnis iste natuerror sit voluptatem accusantiu oloremque laudan tium totam rem aperiam wayse',
                    ],
                     [
                        'item_image' => ['url' => $defaultimg],
                        'item_title' => 'Rub Hands Together',
						'item_desc' => 'Sed perspiciatis unde omnis iste natuerror sit voluptatem accusantiu oloremque laudan tium totam rem aperiam wayse',
                    ],
                     [
                        'item_image' => ['url' => $defaultimg],
                        'item_title' => 'Surface Unity Dry',
						'item_desc' => 'Sed perspiciatis unde omnis iste natuerror sit voluptatem accusantiu oloremque laudan tium totam rem aperiam wayse',
                    ],
                   

                ]
            ]
        );
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
		
        /*****   START CONTROLS SECTION   ******/
		
		
		$this->start_controls_section('image_styling',
            [
                'label' => esc_html__( ' Image Style', 'Fassbender' ),
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
				'selector' => '{{WRAPPER}} .used-list-icon img ',
			]
		);
		
		$this->add_responsive_control( 'image_text_height',
            [
                'label' => esc_html__( 'Height', 'Fassbender' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}  .used-list-icon img' => 'height: {{SIZE}}{{UNIT}}',
                ]
            ]
        );
		
		$this->add_responsive_control( 'image_text_width',
            [
                'label' => esc_html__( 'Width', 'Fassbender' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}  .used-list-icon img' => 'width: {{SIZE}}{{UNIT}}',
                ]
            ]
        );
		
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'image_border',
				'selector' => '{{WRAPPER}} .used-list-icon img',
				
			]
		);
		
		$this->add_responsive_control( 'image_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'Fassbender' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .used-list-icon img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'],
            ]
        );
		
		
        $this->end_controls_section(); 	
		/*****   END CONTROLS SECTION   ******/
		
        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section('Fassbender_styling',
            [
                'label' => esc_html__( 'Text Style', 'Fassbender' ),
                'tab' => Controls_Manager::TAB_STYLE
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
               'selectors' => ['{{WRAPPER}} .used-list-text h4' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'title_hvrcolor',
           [
               'label' => esc_html__( 'Title Hover Color', 'Fassbender' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .used-list-text h4:hover' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .used-list-text h4 ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .used-list-text h4',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__( 'Typography', 'Fassbender' ),

                'selector' => ' {{WRAPPER}} .used-list-text h4',
				
            ]
        );
		
		$this->add_control( 'desc_heading',
            [
                'label' => esc_html__( 'DESCRIPTION', 'Fassbender' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before',
            ]
        );
		
		$this->add_control( 'desc_color',
           [
               'label' => esc_html__( 'Description Color', 'Fassbender' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .used-list-text p' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'desc_hvrcolor',
           [
               'label' => esc_html__( 'Description Hover Color', 'Fassbender' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .used-list-text p:hover' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'desc_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'Fassbender-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .used-list-text p' => 'opacity: {{VALUE}};'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'desc_text_shadow',
				'selector' => '{{WRAPPER}} .used-list-text p',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typo',
                'label' => esc_html__( 'Typography', 'Fassbender' ),

                'selector' => '{{WRAPPER}} .used-list-text p',
            ]
        );
		
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$output = '';
		
		if ( $settings['block_items'] ) {
			echo '<div class="used-list-item">';
			echo '<ul>';
			foreach ( $settings['block_items'] as $item ) {
				echo '<li>';
				echo '<div class="used-list-icon f-left">';
				echo '<img src="'.esc_url($item['item_image']['url']).'" alt="image">';
				echo '</div>';
				echo '<div class="used-list-text">';
				echo '<h4>'.esc_html($item['item_title']).'</h4>';
				echo '<p>'.Fassbender_sanitize_data($item['item_desc']).'</p>';
				echo '</div>';
				echo '</li>';
			}
			echo '</ul>';
			echo '</div>';
		}
		
	}

}
