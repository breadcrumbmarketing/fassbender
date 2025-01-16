<?php

/*************************************************
## Styles and Scripts
*************************************************/ 
define('KLB_INDEX_JS', plugin_dir_url( __FILE__ )  . '/js');
define('KLB_INDEX_CSS', plugin_dir_url( __FILE__ )  . '/css');

function klb_scripts() {

     wp_register_script( 'jquery-socialshare',    KLB_INDEX_JS . '/jquery-socialshare.js', array('jquery'), '1.0', true);
     wp_register_script( 'klb-social-share', 	  KLB_INDEX_JS . '/custom/social_share.js', array('jquery'), '1.0', true);
     wp_register_script( 'klb-widget-product-categories', 	  plugins_url( 'widgets/js/widget-product-categories.js', __FILE__ ), true );


    }
add_action( 'wp_enqueue_scripts', 'klb_scripts' );

/*----------------------------
  Elementor Get Templates
 ----------------------------*/
if ( ! function_exists( 'Fassbender_get_elementorTemplates' ) ) {
    function Fassbender_get_elementorTemplates( $type = null )
    {
        if ( class_exists( '\Elementor\Plugin' ) ) {

            $args = [
                'post_type' => 'elementor_library',
                'posts_per_page' => -1,
            ];

            $templates = get_posts( $args );
            $options = array();

            if ( !empty( $templates ) && !is_wp_error( $templates ) ) {

				$options['0'] = esc_html__('Set a Template','Fassbender-core');

                foreach ( $templates as $post ) {
                    $options[ $post->ID ] = $post->post_title;
                }
            } else {
                $options = array(
                    '' => esc_html__( 'No template exist.', 'Fassbender-core' )
                );
            }

            return $options;
        }
    }
}


/*----------------------------
  Single Share
 ----------------------------*/
add_action( 'woocommerce_single_product_summary', 'Fassbender_social_share', 70);
function Fassbender_social_share(){
	$socialshare = get_theme_mod( 'Fassbender_shop_social_share', '0' );

	if($socialshare == '1'){
	wp_enqueue_script('jquery-socialshare');
	wp_enqueue_script('klb-social-share');
	
	$single_share_multicheck = get_theme_mod('Fassbender_shop_single_share',array( 'facebook', 'twitter', 'pinterest', 'linkedin'));
	
	  echo '<div class="social shop-social social-container product_share">';
		  echo '<div class="pro-02-list-info f-left">';
			echo '<span class="pro11">'.esc_html__('Share Now:','Fassbender-core').'</span>';
		  echo '</div>';
		  
		  echo '<div class="pro-02-list-icon">';
		  
			if(in_array('facebook', $single_share_multicheck)){
			  echo '<a href="#" class="facebook" aria-label="'.esc_attr__('Share this page with Facebook','Fassbender-core').'" role="button"><i class="fab fa-facebook-f"></i></a>';
			}
			if(in_array('twitter', $single_share_multicheck)){    
			  echo '<a href="#" class="twitter" aria-label="'.esc_attr__('Share this page with Twitter','Fassbender-core').'"><i class="fab fa-twitter"></i></a>';
			}
			if(in_array('pinterest', $single_share_multicheck)){  
			  echo '<a href="#" class="pinterest" aria-label="'.esc_attr__('Share this page with Pinterest','Fassbender-core').'"><i class="fab fa-pinterest"></i></a>';
			}
			if(in_array('linkedin', $single_share_multicheck)){  
			  echo '<a href="#" class="linkedin" aria-label="'.esc_attr__('Share this page with Linkedin','Fassbender-core').'"><i class="fab fa-linkedin"></i></a>';
			}
			
		  echo '</div>';

	  echo '</div>';
	  
	}
}

/*----------------------------
  Load Languages
 ----------------------------*/
function klb_shortcode_load_plugin_textdomain() {
	load_plugin_textdomain( 'Fassbender-core', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'klb_shortcode_load_plugin_textdomain' );