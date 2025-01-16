<?php
/**
 * functions.php
 * @package WordPress
 * @subpackage medibazar
 * @since medibazar 1.9.0
 * 
 */

/*************************************************
## Admin style and scripts  
*************************************************/ 

function medibazar_admin_styles() {
     wp_enqueue_style('medibazar-klbtheme',   get_template_directory_uri() .'/assets/css/admin/klbtheme.css');
	 wp_enqueue_script('medibazar-init', 	  get_template_directory_uri() .'/assets/js/init.js', array('jquery','media-upload','thickbox'));
     wp_enqueue_script( 'medibazar-register', get_template_directory_uri() . '/assets/js/admin/register.js', array('jquery'), '1.0', true);
}
add_action('admin_enqueue_scripts', 'medibazar_admin_styles');

 /*************************************************
## medibazar Fonts
*************************************************/
function medibazar_fonts_url_roboto() {
        $fonts_url = '';
	
		$roboto = _x( 'on', 'Roboto font: on or off', 'medibazar' );		

		if ( 'off' !== $roboto ) {
		$font_families = array();

		if ( 'off' !== $roboto ) {
		$font_families[] = 'Roboto:100,300,400,500,700,900';
		}
		
		$query_args = array( 
		'family' => rawurldecode( implode( '|', $font_families ) ), 
		'subset' => rawurldecode( 'latin,latin-ext' ), 
		); 
		 
		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
		}
 
return esc_url_raw( $fonts_url );
}

function medibazar_fonts_url_poppins() {
        $fonts_url = '';
	
		$poppins = _x( 'on', 'Poppins font: on or off', 'medibazar' );	

		if ( 'off' !== $poppins ) {
		$font_families = array();

		if ( 'off' !== $poppins ) {
		$font_families[] = 'Poppins:200,300,400,500,600,700,800,900';
		}
		
		$query_args = array( 
		'family' => rawurldecode( implode( '|', $font_families ) ), 
		'subset' => rawurldecode( 'latin,latin-ext' ), 
		); 
		 
		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
		}
 
return esc_url_raw( $fonts_url );
}

/*************************************************
## Styles and Scripts
*************************************************/ 
define('medibazar_INDEX_CSS', get_template_directory_uri()  . '/assets/css/');
define('medibazar_INDEX_JS', get_template_directory_uri()  . '/assets/js/');

function medibazar_scripts() {
	
     if ( is_admin_bar_showing() ) {
       wp_enqueue_style( 'medibazar-klbtheme', medibazar_INDEX_CSS . '/admin/klbtheme.css', false, '1.0');    
     }	
	 
     if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
	 
     wp_enqueue_style( 'owl-carousel', 				medibazar_INDEX_CSS  . '/owl.carousel.min.css', false, '1.0');	
     wp_enqueue_style( 'animate',    				medibazar_INDEX_CSS  . '/animate.min.css', false, '1.0');
     wp_enqueue_style( 'magnific-popup',    		medibazar_INDEX_CSS  . '/magnific-popup.css', false, '1.0');
     wp_enqueue_style( 'fontawesome-all', 			medibazar_INDEX_CSS  . '/fontawesome-all.min.css', false, '1.0');	
     wp_enqueue_style( 'themify-icons', 			medibazar_INDEX_CSS  . '/themify-icons.css', false, '1.0');	
     wp_enqueue_style( 'meanmenu', 					medibazar_INDEX_CSS  . '/meanmenu.css', false, '1.0');
     wp_enqueue_style( 'slick', 					medibazar_INDEX_CSS  . '/slick.css', false, '1.0');
     wp_enqueue_style( 'medibazar-main', 			medibazar_INDEX_CSS  . '/main.css', false, '1.0');
     wp_enqueue_style( 'medibazar-responsive', 		medibazar_INDEX_CSS  . '/responsive.css', false, '1.0');
     wp_enqueue_style( 'medibazar-font-roboto',  	medibazar_fonts_url_roboto(), array(), null );
     wp_enqueue_style( 'medibazar-font-poppins',  	medibazar_fonts_url_poppins(), array(), null );
  	 wp_enqueue_style( 'medibazar-style',            get_stylesheet_uri() ); 
	 wp_style_add_data( 'medibazar-style', 'rtl', 'replace' );

	 $mapkey = get_theme_mod('medibazar_mapapi');

     wp_enqueue_script( 'modernizr',     	 			medibazar_INDEX_JS . '/vendor/modernizr-3.5.0.min.js', array('jquery'), '1.0', true);
     wp_enqueue_script( 'popper',     	 				medibazar_INDEX_JS . '/popper.min.js', array('jquery'), '1.0', true);
     wp_enqueue_script( 'bootstrap',    	    		medibazar_INDEX_JS . '/bootstrap.min.js', array('jquery'), '1.0', true);
     wp_enqueue_script( 'owl-carousel',    	    		medibazar_INDEX_JS . '/owl.carousel.min.js', array('jquery'), '1.0', true);
     wp_enqueue_script( 'isotope-pkgd',    	    		medibazar_INDEX_JS . '/isotope.pkgd.min.js', array('jquery'), '1.0', true);
     wp_enqueue_script( 'slick',    	    			medibazar_INDEX_JS . '/slick.min.js', array('jquery'), '1.0', true);
     wp_enqueue_script( 'jquery-meanmenu',    	    	medibazar_INDEX_JS . '/jquery.meanmenu.min.js', array('jquery'), '1.0', true);
     wp_enqueue_script( 'wow',    						medibazar_INDEX_JS . '/wow.min.js', array('jquery'), '1.0', true);
     wp_enqueue_script( 'waypoints',    				medibazar_INDEX_JS . '/waypoints.min.js', array('jquery'), '1.0', true);
     wp_enqueue_script( 'jquery-appear',    			medibazar_INDEX_JS . '/jquery.appear.js', array('jquery'), '1.0', true);
     wp_enqueue_script( 'jquery-countdown',    			medibazar_INDEX_JS . '/jquery.countdown.min.js', array('jquery'), '1.0', true);
     wp_enqueue_script( 'jquery-knob',    				medibazar_INDEX_JS . '/jquery.knob.js', array('jquery'), '1.0', true);
     wp_enqueue_script( 'jquery-counterup',    			medibazar_INDEX_JS . '/jquery.counterup.min.js', array('jquery'), '1.0', true);
     wp_enqueue_script( 'jquery-scrollup',    			medibazar_INDEX_JS . '/jquery.scrollUp.min.js', array('jquery'), '1.0', true);
     wp_enqueue_script( 'jquery-magnific-popup',    	medibazar_INDEX_JS . '/jquery.magnific-popup.min.js', array('jquery'), '1.0', true);
     wp_enqueue_script( 'medibazar-plugins',    		medibazar_INDEX_JS . '/plugins.js', array('jquery'), '1.0', true);
     wp_register_script( 'medibazar-filter-toggle',		medibazar_INDEX_JS . '/custom/filter_toggle.js', array('jquery'), '1.0', true);
	 wp_register_script( 'medibazar-counter',   		medibazar_INDEX_JS . '/custom/counter.js', array('jquery'), '1.0', true);
     wp_register_script( 'medibazar-plus-minus',    	medibazar_INDEX_JS . '/custom/plus_minus.js', array('jquery'), '1.0', true);
     wp_register_script( 'medibazar-carousel-slider',  	medibazar_INDEX_JS . '/custom/carousel_slider.js', array('jquery'), '1.0', true);
	 wp_register_script( 'medibazar-googlemap',      	'//maps.googleapis.com/maps/api/js?key='. $mapkey .'', array('jquery'), '1.0', true);
     wp_enqueue_script( 'medibazar-scripts',     		medibazar_INDEX_JS . '/main.js', array('jquery'), '1.0', true);


    }
add_action( 'wp_enqueue_scripts', 'medibazar_scripts' );

/*************************************************
## Theme Setup
*************************************************/ 

if ( ! isset( $content_width ) ) $content_width = 960;

function medibazar_theme_setup() {
	
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-background' );
	add_theme_support( 'post-formats', array('gallery', 'audio', 'video'));
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'woocommerce', array('gallery_thumbnail_image_width' => 99,'thumbnail_image_width' => 90,) );
	load_theme_textdomain( 'medibazar', get_template_directory() . '/languages' );
	remove_theme_support( 'widgets-block-editor' );
}
add_action( 'after_setup_theme', 'medibazar_theme_setup' );


/*************************************************
## Include the TGM_Plugin_Activation class.
*************************************************/ 

require_once get_template_directory() . '/includes/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'medibazar_register_required_plugins' );

function medibazar_register_required_plugins() {

	$url = 'http://klbtheme.com/medibazar/plugins/';
	$mainurl = 'http://klbtheme.com/plugins/';

	$plugins = array(
		
        array(
            'name'                  => esc_html__('Meta Box','medibazar'),
            'slug'                  => 'meta-box',
        ),

        array(
            'name'                  => esc_html__('Contact Form 7','medibazar'),
            'slug'                  => 'contact-form-7',
        ),

        array(
            'name'                  => esc_html__('WooCommerce','medibazar'),
            'slug'                  => 'woocommerce',
        ),
		
		array(
            'name'                  => esc_html__('WooCommerce Wishlist','medibazar'),
            'slug'                  => 'ti-woocommerce-wishlist',
        ),
		
        array(
            'name'                  => esc_html__('Kirki','medibazar'),
            'slug'                  => 'kirki',
        ),
		
        array(
            'name'                  => esc_html__('Elementor','medibazar'),
            'slug'                  => 'elementor',
        ),
		
		array(
            'name'                  => esc_html__('Instagram Feed','medibazar'),
            'slug'                  => 'instagram-feed',
        ),
		
        array(
            'name'                  => esc_html__('medibazar Core','medibazar'),
            'slug'                  => 'medibazar-core',
            'source'                => $url . 'medibazar-core.zip',
            'required'              => false,
            'version'               => '1.2.8',
            'force_activation'      => false,
            'force_deactivation'    => false,
            'external_url'          => '',
        ),
		
        array(
            'name'                  => esc_html__('Revolution Slider','medibazar'),
            'slug'                  => 'revslider',
            'source'                => $mainurl . 'revslider.zip',
            'required'              => false,
            'version'               => '6.7.20',
            'force_activation'      => false,
            'force_deactivation'    => false,
            'external_url'          => '',
        ),

        array(
            'name'                  => esc_html__('Envato Market','medibazar'),
            'slug'                  => 'envato-market',
            'source'                => $mainurl . 'envato-market.zip',
            'required'              => true,
            'version'               => '2.0.12',
            'force_activation'      => false,
            'force_deactivation'    => false,
            'external_url'          => '',
        ),


	);

	$config = array(
		'id'           => 'medibazar',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}

/*************************************************
## medibazar Register Menu 
*************************************************/

function medibazar_register_menus() {
	register_nav_menus( array( 'main-menu' 	   => esc_html__('Primary Navigation Menu','medibazar')) );
	$topheader = get_theme_mod('medibazar_top_header','0');
	$footermenu = get_theme_mod('medibazar_footer_menu','0');

	if($topheader == '1'){
		register_nav_menus( array( 'top-right-menu' => esc_html__('Top Right Menu','medibazar')) );
	}
	
	if($footermenu == '1'){
		register_nav_menus( array( 'footer-menu' => esc_html__('Footer Menu','medibazar')) );
	}
}
add_action('init', 'medibazar_register_menus');

/*************************************************
## medibazar Menu
*************************************************/ 
class medibazar_description_walker extends Walker_Nav_Menu {
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		// depth dependent classes
		$indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
		$display_depth = ( $depth + 1); // because it counts the first submenu as 0
		$classes = array(
			'',
			( $display_depth % 2  ? '' : '' ),
			( $display_depth >=2 ? '' : '' ),
			
			);
		$class_names = implode( ' ', $classes );
	  
		// build html
		$output .= "\n" . $indent . '<ul class="sub-menu text-left">' . "\n";
	}

    function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ){
        $id_field = $this->db_fields['id'];
        if ( is_object( $args[0] ) ) {
            $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
        }
        return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
      function start_el(&$output, $object, $depth = 0, $args = Array() , $current_object_id = 0) {
           
           global $wp_query;

           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';
		   
		   $classes = empty( $object->classes ) ? array() : (array) $object->classes;
           $icon_class = $classes[0];
		   $classes = array_slice($classes,1);
		   
		   $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $object ) );
		   
		   if ( $args->has_children ) {
		   $class_names = 'class="dropdown '.esc_attr($icon_class).' '. esc_attr( $class_names ) . '"';
		   } else {
		   $class_names = 'class="'.esc_attr($icon_class).' '. esc_attr( $class_names ) . '"';
		   }
			
			$output .= $indent . '<li ' . $value . $class_names .'>';

			$datahover = str_replace(' ','',$object->title);


			$attributes = ! empty( $object->url ) ? ' href="'   . esc_attr( $object->url ) .'"' : '';

				
			$object_output = $args->before;

			$object_output .= '<a'. $attributes .'  >';
			$object_output .= $args->link_before .  apply_filters( 'the_title', $object->title, $object->ID ) . '';
	        $object_output .= $args->link_after;
			$object_output .= '</a>';


			$object_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $object_output, $object, $depth, $args );            	              	
      }
}

add_filter('nav_menu_css_class' , 'medibazar_nav_class' , 10 , 2);
function medibazar_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active';
     }
     return $classes;
}

/*************************************************
## Excerpt More
*************************************************/ 

function medibazar_excerpt_more($more) {
  global $post;
  return '<div class="klb-readmore"><a class="c-btn" href="'. esc_url(get_permalink($post->ID)) . '">' . esc_html__('Read More', 'medibazar') . ' <i class="far fa-plus"></i></a></div>';
  }
 add_filter('excerpt_more', 'medibazar_excerpt_more');
 
/*************************************************
## Word Limiter
*************************************************/ 
function medibazar_limit_words($string, $limit) {
	$words = explode(' ', $string);
	return implode(' ', array_slice($words, 0, $limit));
}

/*************************************************
## Widgets
*************************************************/ 

function medibazar_widgets_init() {
	register_sidebar( array(
	  'name' => esc_html__( 'Blog Sidebar', 'medibazar' ),
	  'id' => 'blog-sidebar',
	  'description'   => esc_html__( 'These are widgets for the Blog page.','medibazar' ),
	  'before_widget' => '<div class="widget %2$s">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<h3 class="widget-title">',
	  'after_title'   => '</h3>'
	) );

	register_sidebar( array(
	  'name' => esc_html__( 'Shop Sidebar', 'medibazar' ),
	  'id' => 'shop-sidebar',
	  'description'   => esc_html__( 'These are widgets for the Shop.','medibazar' ),
	  'before_widget' => '<div class="category-sidebar mb-30 %2$s">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<h3 class="cat-title">',
	  'after_title'   => '</h5>'
	) );
	
	register_sidebar( array(
	  'name' => esc_html__( 'Sidebar Menu', 'medibazar' ),
	  'id' => 'sidebar-menu',
	  'description'   => esc_html__( 'These are widgets for the menu sidebar.','medibazar' ),
	  'before_widget' => '<div class="sidebar-modal-widget %2$s">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<h3 class="title">',
	  'after_title'   => '</h3>'
	) );

	register_sidebar( array(
	  'name' => esc_html__( 'Footer First Column', 'medibazar' ),
	  'id' => 'footer-1',
	  'description'   => esc_html__( 'These are widgets for the Footer.','medibazar' ),
	  'before_widget' => '<div class="klbfooterwidget footer-wrapper mb-30 %2$s">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<h3 class="footer-title">',
	  'after_title'   => '</h3>'
	) );

	register_sidebar( array(
	  'name' => esc_html__( 'Footer Second Column', 'medibazar' ),
	  'id' => 'footer-2',
	  'description'   => esc_html__( 'These are widgets for the Footer.','medibazar' ),
	  'before_widget' => '<div class="klbfooterwidget footer-wrapper ml-50 mb-30 %2$s">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<h3 class="footer-title">',
	  'after_title'   => '</h3>'
	) );

	register_sidebar( array(
	  'name' => esc_html__( 'Footer Third Column', 'medibazar' ),
	  'id' => 'footer-3',
	  'description'   => esc_html__( 'These are widgets for the Footer.','medibazar' ),
	  'before_widget' => '<div class="klbfooterwidget footer-wrapper ml-30 mb-30 %2$s">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<h3 class="footer-title">',
	  'after_title'   => '</h3>'
	) );

	register_sidebar( array(
	  'name' => esc_html__( 'Footer Fourth Column', 'medibazar' ),
	  'id' => 'footer-4',
	  'description'   => esc_html__( 'These are widgets for the Footer.','medibazar' ),
	  'before_widget' => '<div class="klbfooterwidget footer-wrapper ml-20 mb-30 %2$s">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<h3 class="footer-title">',
	  'after_title'   => '</h3>'
	) );
	
	register_sidebar( array(
	  'name' => esc_html__( 'Footer Fifth Column', 'medibazar' ),
	  'id' => 'footer-5',
	  'description'   => esc_html__( 'These are widgets for the Footer.','medibazar' ),
	  'before_widget' => '<div class="klbfooterwidget footer-wrapper ml-20 mb-30 %2$s">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<h3 class="footer-title">',
	  'after_title'   => '</h3>'
	) );

}
add_action( 'widgets_init', 'medibazar_widgets_init' );
 
/*************************************************
## medibazar Comment
*************************************************/

if ( ! function_exists( 'medibazar_comment' ) ) :
 function medibazar_comment( $comment, $args, $depth ) {
  $GLOBALS['comment'] = $comment;
  switch ( $comment->comment_type ) :
   case 'pingback' :
   case 'trackback' :
  ?>

   <article class="post pingback">
   <p><?php esc_html_e( 'Pingback:', 'medibazar' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__( '(Edit)', 'medibazar' ), ' ' ); ?></p>
  <?php
    break;
   default :
  ?>
  
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<div id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			<div class="comments-box">
				<div class="comments-avatar">
					<img src="<?php echo get_avatar_url( $comment, 80 ); ?>" alt="<?php comment_author(); ?>">
				</div>
				<div class="comments-text">
					<div class="avatar-name">
						<h5><?php comment_author(); ?></h5>
						<span><?php comment_date(); ?></span>
						<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
					</div>
					<div class="klb-post">
						<?php comment_text(); ?> 
						<?php if ( $comment->comment_approved == '0' ) : ?>
						<em><?php esc_html_e( 'Your comment is awaiting moderation.', 'medibazar' ); ?></em>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</li>


  <?php
    break;
  endswitch;
 }
endif;

/*************************************************
## medibazar Comment Placeholder
 *************************************************/

add_filter( 'comment_form_default_fields', 'medibazar_comment_placeholders' );
function medibazar_comment_placeholders( $fields ){
    $fields['author'] = str_replace(
        '<input',
        '<input placeholder="'.esc_attr__('Name * ','medibazar').'"',
        $fields['author']
    );
    $fields['email'] = str_replace(
        '<input',
        '<input placeholder="'.esc_attr__('Email *','medibazar').'"',
        $fields['email']
    );
    $fields['url'] = str_replace(
        '<input',
        '<input placeholder="'.esc_attr__('Website','medibazar').'"',
        $fields['url']
    );
    return $fields;
}

add_filter( 'comment_form_defaults', 'medibazar_textarea_placeholder' );
function medibazar_textarea_placeholder( $fields ){

    $fields['comment_field'] = str_replace(
        '<textarea',
        '<textarea placeholder="'.esc_attr__('Comment','medibazar').'"',
        $fields['comment_field']
    );
    return $fields;
}


/*************************************************
## medibazar Widget Count Filter
 *************************************************/

function medibazar_cat_count_span($links) {
  $links = str_replace('</a> (', '</a> <span class="catcount">(', $links);
  $links = str_replace(')', ')</span>', $links);
  return medibazar_sanitize_data($links);
}
add_filter('wp_list_categories', 'medibazar_cat_count_span');
 
function medibazar_archive_count_span( $links ) {
	$links = str_replace( '</a>&nbsp;(', '</a><span class="catcount">(', $links );
	$links = str_replace( ')', ')</span>', $links );
	return medibazar_sanitize_data($links);
}
add_filter( 'get_archives_link', 'medibazar_archive_count_span' );


/*************************************************
## Pingback url auto-discovery header for single posts, pages, or attachments
 *************************************************/
function medibazar_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'medibazar_pingback_header' );

/************************************************************
## DATA CONTROL FROM PAGE METABOX OR ELEMENTOR PAGE SETTINGS
*************************************************************/
function medibazar_page_settings( $opt_id){
	
	if ( class_exists( '\Elementor\Core\Settings\Manager' ) ) {
		// Get the current post id
		$post_id = get_the_ID();

		// Get the page settings manager
		$page_settings_manager = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' );

		// Get the settings model for current post
		$page_settings_model = $page_settings_manager->get_model( $post_id );

		// Retrieve the color we added before
		$output = $page_settings_model->get_settings( 'medibazar_elementor_'.$opt_id );
		
		return $output;
	}
}

/************************************************************
## Elementor Get Templates
*************************************************************/
function medibazar_get_elementor_template($template_id){
	if($template_id){

	    $frontend = new \Elementor\Frontend;
	    printf( '<div class="medibazar-elementor-template template-'.esc_attr($template_id).'">%1$s</div>', $frontend->get_builder_content_for_display( $template_id, true ) );
	
	    if ( class_exists( '\Elementor\Plugin' ) ) {
	        $elementor = \Elementor\Plugin::instance();
	        $elementor->frontend->enqueue_styles();
			$elementor->frontend->enqueue_scripts();
	    }
	
	    if ( class_exists( '\ElementorPro\Plugin' ) ) {
	        $elementor_pro = \ElementorPro\Plugin::instance();
	        $elementor_pro->enqueue_styles();
			$elementor_pro->enqueue_scripts();
	    }

	}
}
add_action( 'medibazar_before_main_shop', 'medibazar_get_elementor_template', 10);
add_action( 'medibazar_after_main_shop', 'medibazar_get_elementor_template', 10);
add_action( 'medibazar_before_main_footer', 'medibazar_get_elementor_template', 10);
add_action( 'medibazar_after_main_footer', 'medibazar_get_elementor_template', 10);
add_action( 'medibazar_before_main_header', 'medibazar_get_elementor_template', 10);
add_action( 'medibazar_after_main_header', 'medibazar_get_elementor_template', 10);

/************************************************************
## Do Action for Templates and Product Categories
*************************************************************/
function medibazar_do_action($hook){
	
	if ( !class_exists( 'woocommerce' ) ) {
		return;
	}

	$categorytemplate = get_theme_mod('medibazar_elementor_template_each_shop_category');
	if(is_product_category()){
		if($categorytemplate && array_search(get_queried_object()->term_id, array_column($categorytemplate, 'category_id')) !== false){
			foreach($categorytemplate as $c){
				if($c['category_id'] == get_queried_object()->term_id){
					do_action( $hook, $c[$hook.'_elementor_template_category']);
				}
			}
		} else {
			do_action( $hook, get_theme_mod($hook.'_elementor_template'));
		}
	} else {
		do_action( $hook, get_theme_mod($hook.'_elementor_template'));
	}
	
}

/*************************************************
## medibazar Get options
*************************************************/
function medibazar_get_option(){	
	$getopt  = isset( $_GET['opt'] ) ? $_GET['opt'] : '';

	return esc_html($getopt);
}

/*************************************************
## medibazar Theme options
*************************************************/

	require_once get_template_directory() . '/includes/metaboxes.php';
	require_once get_template_directory() . '/includes/woocommerce.php';
	require_once get_template_directory() . '/includes/woocommerce-filter.php';
	require_once get_template_directory() . '/includes/sanitize.php';
	require_once get_template_directory() . '/includes/merlin/setup-wizard.php';
	require_once get_template_directory() . '/includes/pjax/filter-functions.php';
	require_once get_template_directory() . '/includes/header/main-header.php';
	require_once get_template_directory() . '/includes/footer/main-footer.php';
