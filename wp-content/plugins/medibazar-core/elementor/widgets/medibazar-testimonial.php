<?php

namespace Elementor;

class Medibazar_Testimonial_Widget extends Widget_Base {

    public function get_name() {
        return 'medibazar-testimonial';
    }
    public function get_title() {
        return 'Testimonial (K)';
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
		
		$custombg = plugins_url( 'images/testimonial.jpg', __DIR__ );
		
        $this->add_control( 'bgimage',
            [
                'label' => esc_html__( 'Image', 'medibazar-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $custombg],
            ]
        );
		
        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'medibazar-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'What Our Client’s Say',
                'placeholder' => esc_html__( 'Enter title here', 'medibazar-core' )
            ]
        );
		
        $this->add_control( 'subtitle',
            [
                'label' => esc_html__( 'Subtitle', 'medibazar-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Sed ut perspiciatis unde omnis iste natus error',
                'placeholder' => esc_html__( 'Enter subtitle here', 'medibazar-core' )
            ]
        );
		
		$customimg = plugins_url( 'images/client1.png', __DIR__ );
		$repeater = new Repeater();
		
        $repeater->add_control( 'customer_image',
            [
                'label' => esc_html__( 'Image', 'medibazar-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $customimg],
            ]
        );
		
        $repeater->add_control( 'customer_name',
            [
                'label' => esc_html__( 'Name', 'medibazar-core' ),
                'type' => Controls_Manager::TEXT,
				'label_block' => true,
                'pleaceholder' => esc_html__( 'Enter the name here', 'medibazar-core' ),
                'default' => 'Add some text here',
            ]
        );
		
        $repeater->add_control( 'customer_position',
            [
                'label' => esc_html__( 'Position', 'medibazar-core' ),
                'type' => Controls_Manager::TEXT,
				'label_block' => true,
                'pleaceholder' => esc_html__( 'Enter the customer job.', 'medibazar-core' ),
                'default' => 'Add some text here',
            ]
        );
		
        $repeater->add_control( 'customer_comment',
            [
                'label' => esc_html__( 'Comment', 'medibazar-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'pleaceholder' => esc_html__( 'Enter desc here', 'medibazar-core' ),
                'default' => 'Add some text here',
            ]
        );

		$repeater->add_control( 'customer_stars',
			[
				'label' => esc_html__( 'Customer Stars', 'medibazar-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '5',
				'options' => [
					'select-type' => esc_html__( 'Select Type', 'medibazar-core' ),
					'1'	  => esc_html__( '1 Star', 'blowwe' ),
					'2'	  => esc_html__( '2 Stars', 'blowwe' ),
					'3'	  => esc_html__( '3 Stars', 'blowwe' ),
					'4'	  => esc_html__( '4 Stars', 'blowwe' ),
					'5'	  => esc_html__( '5 Stars', 'blowwe' ),
				],
			]
		);	

        $this->add_control( 'testimonial_items',
            [
                'label' => esc_html__( 'Testimonial Items', 'medibazar-core' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'customer_name' => 'Sebastian Barry',
                        'customer_position' => 'Business Manager',
                        'customer_comment' => 'Sed perspiciatis unde omnis iste natus erolup tatem accusantium doloremque laudantium totam reperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.',
                        'customer_image' => ['url' => $customimg],
                    ],
                    [
                        'customer_name' => 'Oliver Greenwood',
                        'customer_position' => 'Designer',
                        'customer_comment' => 'Sed perspiciatis unde omnis iste natus erolup tatem accusantium doloremque laudantium totam reperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.',
                        'customer_image' => ['url' => $customimg],
                    ],
                    [
                        'customer_name' => 'Daisy Lana',
                        'customer_position' => 'Designer',
                        'customer_comment' => 'Sed perspiciatis unde omnis iste natus erolup tatem accusantium doloremque laudantium totam reperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.',
                        'customer_image' => ['url' => $customimg],
                    ],
                    [
                        'customer_name' => 'Alden Smith',
                        'customer_position' => 'Designer',
                        'customer_comment' => 'Sed perspiciatis unde omnis iste natus erolup tatem accusantium doloremque laudantium totam reperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.',
                        'customer_image' => ['url' => $customimg],
                    ],
					
                ]
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
		
		$this->add_responsive_control( 'testimonial_alignment',
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
                'label' => esc_html__( ' Testimonial Items Style', 'medibazar' ),
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
				'selector' => '{{WRAPPER}} .slick-slide img',
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
                        'max' => 200
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}  .slick-slide img' => 'height: {{SIZE}}{{UNIT}}',
                ]
            ]
        );
		
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'image_border',
				'selector' => '{{WRAPPER}} .slick-slide img',
				
			]
		);
		
		$this->add_responsive_control( 'image_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'medibazar' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .slick-slide img ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'],
            ]
        );
		
		$this->add_control( 'name_heading',
            [
                'label' => esc_html__( 'NAME', 'medibazar' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'name_color',
           [
               'label' => esc_html__( 'Name Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .test-text h4' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'name_hvrcolor',
           [
               'label' => esc_html__( 'Name Hover Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .test-text h4:hover' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'name_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'medibazar-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .test-text h4' => 'opacity: {{VALUE}} ;'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'name_text_shadow',
				'selector' => '{{WRAPPER}} .test-text h4',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'name_typo',
                'label' => esc_html__( 'Typography', 'medibazar' ),

                'selector' => '{{WRAPPER}} .test-text h4'
            ]
        );
		
		$this->add_control( 'position_heading',
            [
                'label' => esc_html__( 'POSITION', 'medibazar' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'position_color',
           [
               'label' => esc_html__( 'Position Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .test-text span' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'position_hvrcolor',
           [
               'label' => esc_html__( 'Position Hover Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .test-text span:hover' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'position_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'medibazar-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .test-text span' => 'opacity: {{VALUE}} ;'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'position_text_shadow',
				'selector' => '{{WRAPPER}} .test-text span',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'position_typo',
                'label' => esc_html__( 'Typography', 'medibazar' ),

                'selector' => '{{WRAPPER}} .test-text span'
            ]
        );
		
		$this->add_control( 'comment_heading',
            [
                'label' => esc_html__( 'COMMENT', 'medibazar' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'comment_background_color',
           [
               'label' => esc_html__( 'Background Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .testimonial-wrapper' => 'background-color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'comment_color',
           [
               'label' => esc_html__( 'Comment Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .test-text p' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'comment_hvrcolor',
           [
               'label' => esc_html__( 'Comment Hover Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .test-text p:hover' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'comment_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'medibazar-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .test-text p' => 'opacity: {{VALUE}} ;'],
            ]
        );
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'comment_typo',
                'label' => esc_html__( 'Typography', 'medibazar' ),

                'selector' => '{{WRAPPER}} .test-text p'
            ]
        );

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		

		echo '<div class="testimonial-area pt-100 pb-175" data-background="'.esc_url($settings['bgimage']['url']).'">';
		echo '<div class="container">';
		echo '<div class="row">';
		echo '<div class="col-xl-6 col-lg-6 offset-lg-3 offset-xl-3">';
		echo '<div class="section-title text-center mb-65">';
		echo '<h2>'.esc_html($settings['title']).'</h2>';
		echo '<p>'.esc_html($settings['subtitle']).'</p>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '<div class="row test-active">';
		
		if ( $settings['testimonial_items'] ) {
			foreach ( $settings['testimonial_items'] as $item ) {
		
				echo '<div class="col-xl-6">';
				echo '<div class="testimonial-wrapper">';
				echo '<div class="inner-test d-flex justify-content-between align-items-center">';
				echo '<div class="test-img">';
				echo '<img src="'.esc_url($item['customer_image']['url']).'" alt="">';
				echo '</div>';
				echo '<div class="test-rating">';
				for($i = 1; $i <= $item['customer_stars']; $i++){
					echo '<i class="fas fa-star"></i>';
				}
				
				$emptystar = 5 - $item['customer_stars'];
				
				if($emptystar != 0){
					for($c = 1; $c <= $emptystar; $c++){
						echo '<i class="fal fa-star"></i>';
					}
				}
				echo '</div>';
				echo '</div>';
				echo '<div class="test-text">';
				echo '<p>'.esc_html($item['customer_comment']).'</p>';
				echo '<h4>'.esc_html($item['customer_name']).'</h4>';
				echo '<span>'.esc_html($item['customer_position']).'</span>';
				echo '</div>';
				echo '</div>';
				echo '</div>';

			}
		}
		echo '</div>';
		echo '</div>';
		echo '</div>';
		
	}

}
