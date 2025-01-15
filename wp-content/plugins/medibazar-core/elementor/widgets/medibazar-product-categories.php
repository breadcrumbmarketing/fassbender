<?php

namespace Elementor;

class Medibazar_Product_Categories_Widget extends Widget_Base {
    use Medibazar_Helper;

    public function get_name() {
        return 'medibazar-product-categories';
    }
    public function get_title() {
        return 'Product Categories (K)';
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
		

		$this->start_controls_tabs('exclude_include_tabs');
        $this->start_controls_tab( 'exclude_tab',
            [ 'label' => esc_html__( 'Exclude Category', 'medibazar-core' ) ]
        );
		
        $this->add_control( 'exclude',
            [
                'label' => esc_html__( 'Exclude Category', 'medibazar-core' ),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->medibazar_cpt_taxonomies('product_cat'),
                'description' => 'Select Category(s)',
                'default' => 'all',
				'label_block' => true,
            ]
        );
		
		$this->end_controls_tab(); // cat_exclude_tab
		
		$this->start_controls_tab('include_tab',
            [ 'label' => esc_html__( 'Include Category', 'medibazar-core' ) ]
        );
		
		$this->add_control( 'include',
            [
                'label' => esc_html__( 'Include Category', 'medibazar-core' ),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->medibazar_cpt_taxonomies('product_cat'),
                'description' => 'Select Category(s)',
                'default' => 'all',
				'label_block' => true,
            ]
        );
		
		$this->end_controls_tab(); // cat_include_tab 

		$this->end_controls_tabs(); // cat_exclude_include_tabs
		
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$output = '';
		
		
	if($settings['exclude'] == 'all'){
		$terms = get_terms( array(
			'taxonomy' => 'product_cat',
			'hide_empty' => false,
			'parent'    => 0,
		) );
	} else {
		$str = $settings['exclude'] || $settings['include'];

		$terms = get_terms( array(
			'taxonomy' => 'product_cat',
			'hide_empty' => true,
			'parent'    => 0,
			'exclude'   => $settings['exclude'],
			'include'   => $settings['include'],
		) );
	}
		
	echo '<div class="row product-categories">';
	
	foreach ( $terms as $term ) {
	    $thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
	    $image = wp_get_attachment_url( $thumbnail_id );
		
		$imageresize = medibazar_resize( $image, 90, 147, true, true, true );  

		echo '<div class="col-sm-6 col-md-6 col-lg-6">';
		echo '<div class="item">';
		echo '<div class="row">';
		if($image){
		echo '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 logo-img">';
		echo '<a href="'.esc_url(get_term_link( $term )).'"><img class="img-responsive" src="'.esc_url($image).'" alt="cat"></a>';
		echo '</div>';
		}
		echo '<div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">';
		echo '<h3><a href="'.esc_url(get_term_link( $term )).'">'.$term->name.'</a></h3>';
		echo '<p>'.$term->description.'</p>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		

		
	}
	
	echo '</div>';
		

	}

}
