<?php

namespace Elementor;

class Medibazar_Latest_Blog_Widget extends Widget_Base {
    use Medibazar_Helper;

    public function get_name() {
        return 'medibazar-latest-blog';
    }
    public function get_title() {
        return 'Lateste Posts (K)';
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
		
        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'medibazar-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Latest News & Blog',				
            ]
        );
		
        $this->add_control( 'subtitle',
            [
                'label' => esc_html__( 'Subtitle', 'medibazar-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Sed ut perspiciatis unde omnis iste natus error',

            ]
        );
				
        $this->add_control( 'post_count',
            [
                'label' => esc_html__( 'Posts Per Page', 'medibazar-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => count( get_posts( array('post_type' => 'post', 'post_status' => 'publish', 'fields' => 'ids', 'posts_per_page' => '-1') ) ),
                'default' => 3
            ]
        );
		
       $this->add_control( 'excerpt_size',
            [
                'label' => esc_html__( 'Excerpt Size', 'medibazar-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'default' => 15
            ]
        );
		
        $this->add_control( 'category_filter',
            [
                'label' => esc_html__( 'Category', 'naturally' ),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->medibazar_get_categories(),
                'description' => 'Select Category(s)',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'post_filter',
            [
                'label' => esc_html__( 'Specific Post(s)', 'naturally' ),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->medibazar_get_posts(),
                'description' => 'Select Specific Post(s)',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'order',
            [
                'label' => esc_html__( 'Select Order', 'medibazar-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'ASC' => esc_html__( 'Ascending', 'medibazar-core' ),
                    'DESC' => esc_html__( 'Descending', 'medibazar-core' )
                ],
                'default' => 'DESC'
            ]
        );
		
        $this->add_control( 'orderby',
            [
                'label' => esc_html__( 'Order By', 'medibazar-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'id' => esc_html__( 'Post ID', 'medibazar-core' ),
                    'menu_order' => esc_html__( 'Menu Order', 'medibazar-core' ),
                    'rand' => esc_html__( 'Random', 'medibazar-core' ),
                    'date' => esc_html__( 'Date', 'medibazar-core' ),
                    'title' => esc_html__( 'Title', 'medibazar-core' ),
                ],
                'default' => 'date',
            ]
        );
		
		$this->add_control(
			'disable_pagination',
			[
				'label' => esc_html__('Disable Pagination', 'medibazar-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'medibazar-core' ),
				'label_off' => esc_html__( 'No', 'medibazar-core' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();		
		$output = '';
		
		if ( get_query_var( 'paged' ) ) {
			$paged = get_query_var( 'paged' );
		} elseif ( get_query_var( 'page' ) ) {
			$paged = get_query_var( 'page' );
		} else {
			$paged = 1;
		}
	
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => $settings['post_count'],
			'order'          => 'DESC',
			'post_status'    => 'publish',
			'paged' 			=> $paged,
            'post__in'       => $settings['post_filter'],
            'order'          => $settings['order'],
			'orderby'        => $settings['orderby'],
            'category__in'     => $settings['category_filter'],
		);
	
		
		$output .= '<div class="blog-area pt-105 pb-75">';
		$output .= '<div class="container">';
		$output .= '<div class="row">';
		$output .= '<div class="col-xl-6 col-lg-6 offset-lg-3 offset-xl-3">';
		$output .= '<div class="section-title text-center mb-65">';
		$output .= '<h2>'.esc_html($settings['title']).'</h2>';
		$output .= '<p>'.esc_html($settings['subtitle']).'</p>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '<div class="row">';

		
		$count = 1;
		$loop = new \WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
				global $product;
				global $post;
				global $woocommerce;
			
				$id = get_the_ID();
				$allproduct = wc_get_product( get_the_ID() );
				
				$att=get_post_thumbnail_id();
				$image_src = wp_get_attachment_image_src( $att, 'full' );
				$image_src = $image_src[0];
				$imageresize = medibazar_resize( $image_src, 260, 170, true, true, true );
				$taxonomy = strip_tags( get_the_term_list($post->ID, 'category', '', ', ', '') );


				$output .= '<div class="col-xl-4 col-lg-4 col-md-6">';
				$output .= '<div class="blog-wrapper mb-30">';
				$output .= '<div class="blog-img pos-rel">';
				$output .= '<a href="'.get_permalink().'"><img src="'.esc_url($image_src).'" alt="blog_small_img1"></a>';
				$output .= '<span class="blog-tag color-1">'.esc_html($taxonomy).'</span>';
				$output .= '</div>';
				$output .= '<div class="blog-text">';
				$output .= '<div class="blog-meta">';
				$output .= '<span><i class="far fa-calendar-alt"></i> <a href="'.get_permalink().'">'.get_the_date('j M Y').'</a></span>';
				$output .= '</div>';
				$output .= '<h4><a href="'.get_permalink().'">'.get_the_title().'</a></h4>';
				$output .= '<p>'.medibazar_limit_words(get_the_excerpt(), $settings['excerpt_size']).' </p>';
				$output .= '<div class="b-button gray-b-button">';
				$output .= '<a href="'.get_permalink().'">'.esc_html__('read more','medibazar-core').' <i class="far fa-plus"></i></a>';
				$output .= '</div>';
				$output .= '</div>';
				$output .= '</div>';
				$output .= '</div>';

			endwhile;
			
			if($settings['disable_pagination'] != 'yes'){
				ob_start();
				get_template_part( 'post-format/pagination' );
				$output .= '<div class="col-12">'. ob_get_clean().'</div>';
			}
		
		}
		wp_reset_postdata();
		

		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';

		
		echo $output;
	}

}
