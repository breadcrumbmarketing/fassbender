<?php

namespace Elementor;

class medibazar_Single_Image_Widget extends Widget_Base {

    public function get_name() {
        return 'medibazar-single-image';
    }
    public function get_title() {
        return 'Single Image (K)';
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
				'label' => esc_html__( 'Content', 'plugin-name' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control( 'image_type',
			[
				'label' => esc_html__( 'Image Type', 'medibazar-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'type1',
				'options' => [
					'select-column' => esc_html__( 'Select Type', 'medibazar-core' ),
					'type1'	  => esc_html__( 'Type 1', 'medibazar-core' ),
					'type2'	  => esc_html__( 'Type 2', 'medibazar-core' ),
				],
			]
		);

		$defaultimage = plugins_url( 'images/single-image.png', __DIR__ );
		
        $this->add_control( 'image',
            [
                'label' => esc_html__( 'Image', 'medibazar-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $defaultimage],
            ]
        );
		
		$shapeimage = plugins_url( 'images/shape.png', __DIR__ );
        $this->add_control( 'shape_img',
            [
                'label' => esc_html__( 'Shape Image', 'medibazar-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $shapeimage],
				'condition' => ['image_type' => 'type2']
            ]
        );
		
        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'medibazar-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => '25',
                'description'=> 'Add a title.',
				'label_block' => true,
				'condition' => ['image_type' => 'type1']
            ]
        );
		
        $this->add_control( 'subtitle',
            [
                'label' => esc_html__( 'Subtitle', 'medibazar-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Years of <br> experience',
                'description'=> 'Add a subtitle.',
				'label_block' => true,
				'condition' => ['image_type' => 'type1']
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
		
		$this->add_control( 'title_heading',
            [
                'label' => esc_html__( 'TITLE', 'medibazar' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'title_bg_color',
           [
               'label' => esc_html__( ' Background Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .about-tag' => 'background-color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'title_bg_hvrcolor',
           [
               'label' => esc_html__( 'Background Hover Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .about-tag:hover' => 'background-color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'title_color',
           [
               'label' => esc_html__( 'Title Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .about-tag h2 , {{WRAPPER}} .about-tag span ' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'title_hvrcolor',
           [
               'label' => esc_html__( 'Title Hover Color', 'medibazar' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .about-tag h2:hover , {{WRAPPER}} .about-tag span:hover' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .about-tag h2 , {{WRAPPER}} .about-tag span ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .about-tag h2 , {{WRAPPER}} .about-tag span',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__( 'Typography', 'medibazar' ),

                'selector' => ' {{WRAPPER}} .about-tag h2 , {{WRAPPER}} .about-tag span',
				
            ]
        );
		
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$output = '';
		
		if($settings['image_type'] == 'type2'){
			echo '<div class="contact-img">';
			echo '<img src="'.esc_url($settings['image']['url']).'" alt="img">';
			echo '<div class="shape-item con-01"><img src="'.esc_url($settings['shape_img']['url']).'" alt="shape"></div>';
			echo '</div>';
		} else {
			echo '<div class="about-img pos-rel">';
			echo '<img src="'.esc_url($settings['image']['url']).'" alt="mission">';
			echo '<div class="about-tag">';
			echo '<h2>'.esc_html($settings['title']).'</h2>';
			echo '<span>'.$settings['subtitle'].'</span>';
			echo '</div>';
			echo '</div>';
		}

	}

}
