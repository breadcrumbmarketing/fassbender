<?php

namespace Elementor;

class Fassbender_Breadcrumb_Widget extends Widget_Base {

    public function get_name() {
        return 'Fassbender-breadcrumb';
    }
    public function get_title() {
        return 'Breadcrumb (K)';
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

		$defaultimage = plugins_url( 'images/breadcrumb.jpg', __DIR__ );
		
        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'Fassbender-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'About Us',
                'pleaceholder' => esc_html__( 'Set a title.', 'Fassbender-core' )
            ]
        );
		
        $this->add_control( 'bg_image',
            [
                'label' => esc_html__( 'Background Image', 'Fassbender-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $defaultimage],
            ]
        );
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
		
		
        /*****   START CONTROLS SECTION   ******/
		
		$this->start_controls_section( 'bread_style',
            [
                'label' => esc_html__( 'Breadcrumb', 'Fassbender' ),
                'tab' => Controls_Manager::TAB_STYLE,
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
               'selectors' => ['{{WRAPPER}} .breadcrumb-text h2 ' => 'color: {{VALUE}} ;']
           ]
        );
		
		$this->add_control( 'title_hvrcolor',
           [
               'label' => esc_html__( 'Title Hover Color', 'Fassbender' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .breadcrumb-text h2:hover' => 'color: {{VALUE}} ;']
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
                'selectors' => ['{{WRAPPER}} .breadcrumb-text h2  ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .breadcrumb-text h2 ',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__( 'Typography', 'Fassbender' ),

                'selector' => ' {{WRAPPER}} .breadcrumb-text h2  ',
				
            ]
        );
        
        $this->add_control( 'bread_color',
            [
                'label' => esc_html__( 'Page/Post Color', 'Fassbender' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .breadcrumb-menu li a ' => 'color:{{VALUE}}  !important;' ]
            ]
        );
		
		$this->add_control( 'bread_hvr_color',
            [
                'label' => esc_html__( 'Page/Post Hover Color', 'Fassbender' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .breadcrumb-menu li a:hover ' => 'color:{{VALUE}}   !important ;' ]
            ]
        );
		
        $this->add_control( 'bread_sepcolor',
            [
                'label' => esc_html__( 'Separator Color', 'Fassbender' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .breadcrumb-menu li::before' => 'color:{{VALUE}} ;' ]
            ]
        );
		
		$this->add_control( 'bread_actvcolor',
            [
                'label' => esc_html__( 'Current Page/Post Color', 'Fassbender' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [ '{{WRAPPER}}  .breadcrumb-menu li span' => 'color:{{VALUE}}  ;' ],
            ]
        );
		
        $this->add_control( 'bread_hvrcolor',
            [
                'label' => esc_html__( ' Current/Post Hover Color', 'Fassbender' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .breadcrumb-menu li span:hover ' => 'color:{{VALUE}} ;' ],
            ]
        );
		
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$output = '';
				
		echo '<div class="breadcrumb-area pt-125 pb-125" style="background-image:url('.esc_url($settings['bg_image']['url']).')">';
		echo '<div class="container">';
		echo '<div class="klb-breadcrumb-wrapper">';
		echo '<div class="row">';
		echo '<div class="col-xl-12">';
		echo '<div class="breadcrumb-text">';
		echo '<h1>'.esc_html($settings['title']).'</h1>';
		echo '</div>';
		echo '</div>';
		echo Fassbender_breadcrubms();
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';

		
	}

}
