<?php
/**
* Plugin Name: medibazar Core
* Description: Premium & Advanced Essential Elements for Elementor
* Plugin URI:  http://themeforest.net/user/KlbTheme
* Version:     1.2.8
* Author:      KlbTheme
* Author URI:  http://themeforest.net/user/KlbTheme
*/


/*
* Exit if accessed directly.
*/

if ( ! defined( 'ABSPATH' ) ) exit;

final class medibazar_Elementor_Addons
{
    /**
    * Plugin Version
    *
    * @since 1.0
    *
    * @var string The plugin version.
    */
    const VERSION = '1.0.4';

    /**
    * Minimum Elementor Version
    *
    * @since 1.0
    *
    * @var string Minimum Elementor version required to run the plugin.
    */
    const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

    /**
    * Minimum PHP Version
    *
    * @since 1.0
    *
    * @var string Minimum PHP version required to run the plugin.
    */
    const MINIMUM_PHP_VERSION = '7.0';

    /**
    * Instance
    *
    * @since 1.0
    *
    * @access private
    * @static
    *
    * @var medibazar_Elementor_Addons The single instance of the class.
    */
    private static $_instance = null;

    /**
    * Instance
    *
    * Ensures only one instance of the class is loaded or can be loaded.
    *
    * @since 1.0
    *
    * @access public
    * @static
    *
    * @return medibazar_Elementor_Addons An instance of the class.
    */
    public static function instance()
    {

        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
    * Constructor
    *
    * @since 1.0
    *
    * @access public
    */
    public function __construct()
    {
        add_action( 'init', [ $this, 'i18n' ] );
        add_action( 'plugins_loaded', [ $this, 'init' ] );
    }

    /**
    * Load Textdomain
    *
    * Load plugin localization files.
    *
    * Fired by `init` action hook.
    *
    * @since 1.0
    *
    * @access public
    */
    public function i18n()
    {
        load_plugin_textdomain( 'medibazar-core' );
    }
	
   /**
    * Initialize the plugin
    *
    * Load the plugin only after Elementor (and other plugins) are loaded.
    * Checks for basic plugin requirements, if one check fail don't continue,
    * if all check have passed load the files required to run the plugin.
    *
    * Fired by `plugins_loaded` action hook.
    *
    * @since 1.0
    *
    * @access public
    */
    public function init()
    {
        // Check if Elementor is installed and activated
        if ( ! did_action( 'elementor/loaded' ) ) {
            add_action( 'admin_notices', [ $this, 'medibazar_admin_notice_missing_main_plugin' ] );
            return;
        }
        // Check for required Elementor version
        if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
            add_action( 'admin_notices', [ $this, 'medibazar_admin_notice_minimum_elementor_version' ] );
            return;
        }
        // Check for required PHP version
        if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
            add_action( 'admin_notices', [ $this, 'medibazar_admin_notice_minimum_php_version' ] );
            return;
        }
		
		// Categories registered
        add_action( 'elementor/elements/categories_registered', [ $this, 'medibazar_add_widget_category' ] );

		/* Init Include */
        require_once( __DIR__ . '/init.php' );

        /* Customizer Kirki */
        require_once( __DIR__ . '/inc/customizer.php' );

        /* Style php */
        require_once( __DIR__ . '/inc/style.php' );
		
		/* Aq Resizer Image Resize */
        require_once( __DIR__ . '/inc/aq_resizer.php' );
		
		/* Breadcrumb */
        require_once( __DIR__ . '/inc/breadcrumb.php' );

		/* Post view for popular posts widget */
        require_once( __DIR__ . '/inc/post_view.php' );
		
        /* Popular Posts Widget */
        require_once( __DIR__ . '/widgets/widget-popular-posts.php' );
        
		/* Single Banner Widget */
        require_once( __DIR__ . '/widgets/widget-single-banner.php' );
		
		/* Contact Box Widget */
        require_once( __DIR__ . '/widgets/widget-contact-box.php' );
		
		/* Social List Widget */
        require_once( __DIR__ . '/widgets/widget-social-list.php' );		
		
		/* Footer About Widget */
        require_once( __DIR__ . '/widgets/widget-footer-about.php' );

		/* Product Status Widget */
		require_once('widgets/widget-product-status.php');

		/* Product Categories Widget */
		require_once('widgets/widget-product-categories.php');

		/* Wooo Filter */
		require_once('woocommerce-filter/woocommerce-filter.php');

		/* Footer Contact Widget */
        require_once( __DIR__ . '/widgets/widget-footer-contact.php' );

        /* Custom plugin helper functions */
        require_once( __DIR__ . '/elementor/classes/class-helpers-functions.php' );
		
        /* Custom plugin helper functions */
        require_once( __DIR__ . '/elementor/classes/class-customizing-page-settings.php' );
		
		// Register Widget Editor Style
		add_action( 'elementor/editor/after_enqueue_styles', [ $this, 'widget_editor_style' ] );
		
        // Register Widget Styles
        add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'widget_styles' ] );
		
        // Register Widget Scripts
        add_action( 'elementor/frontend/after_enqueue_scripts', [ $this, 'widget_scripts' ] );
		
        // Widgets registered
        add_action( 'elementor/widgets/register', [ $this, 'init_widgets' ] );
    }
	
    /**
    * Register Widgets Category
    *
    */
    public function medibazar_add_widget_category( $elements_manager )
    {
        $elements_manager->add_category( 'medibazar-core', ['title' => esc_html__( 'medibazar Core', 'medibazar-core' )]);
    }	
	
    /**
    * Init Widgets
    *
    * Include widgets files and register them
    *
    * @since 1.0
    *
    * @access public
    */
    public function init_widgets()
    {

			// Hero Slider
            require_once( __DIR__ . '/elementor/widgets/medibazar-hero-slider.php' );
            \Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\medibazar_Hero_Slider_Widget() );
			
			// Home Slider
            require_once( __DIR__ . '/elementor/widgets/medibazar-home-slider.php' );
            \Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\medibazar_Home_Slider_Widget() );
			
			// Home Slider 2
            require_once( __DIR__ . '/elementor/widgets/medibazar-home-slider-2.php' );
            \Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\medibazar_Home_Slider_2_Widget() );
			
			// Single Banner
            require_once( __DIR__ . '/elementor/widgets/medibazar-single-banner.php' );
            \Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\medibazar_Single_Banner_Widget() );
			
			
			// Product Tab
            require_once( __DIR__ . '/elementor/widgets/medibazar-product-tab.php' );
            \Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\medibazar_Product_Tab_Widget() );
				
				
			// Deal Products
            require_once( __DIR__ . '/elementor/widgets/medibazar-deal-products.php' );
            \Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\medibazar_Deal_Products_Widget() );
			
			// Products Grid
            require_once( __DIR__ . '/elementor/widgets/medibazar-product-grid.php' );
            \Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\medibazar_Product_Grid_Widget() );
			
			// Testimonial
            require_once( __DIR__ . '/elementor/widgets/medibazar-testimonial.php' );
            \Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\medibazar_Testimonial_Widget() );
			
			
			// Latest Blog
            require_once( __DIR__ . '/elementor/widgets/medibazar-latest-blog.php' );
            \Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\medibazar_Latest_Blog_Widget() );
			
			
			// Icon Box
            require_once( __DIR__ . '/elementor/widgets/medibazar-icon-box.php' );
            \Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\medibazar_Icon_Box_Widget() );

			// Breadcrumb
            require_once( __DIR__ . '/elementor/widgets/medibazar-breadcrumb.php' );
            \Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\medibazar_Breadcrumb_Widget() );
			
			// Single Image
            require_once( __DIR__ . '/elementor/widgets/medibazar-single-image.php' );
            \Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\medibazar_Single_Image_Widget() );
			
			// Block List
            require_once( __DIR__ . '/elementor/widgets/medibazar-block-list.php' );
            \Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\medibazar_Block_List_Widget() );
			
			// Counter Box
            require_once( __DIR__ . '/elementor/widgets/medibazar-counter-box.php' );
            \Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\medibazar_Counter_Box_Widget() );
			
			// Image Box
            require_once( __DIR__ . '/elementor/widgets/medibazar-image-box.php' );
            \Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\medibazar_Image_Box_Widget() );
			
			// Custom Title
            require_once( __DIR__ . '/elementor/widgets/medibazar-custom-title.php' );
            \Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\medibazar_Custom_Title_Widget() );
			
			// Team Box
            require_once( __DIR__ . '/elementor/widgets/medibazar-team-box.php' );
            \Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\medibazar_Team_Box_Widget() );
			
			// Contact List
            require_once( __DIR__ . '/elementor/widgets/medibazar-contact-list.php' );
            \Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\medibazar_Contact_List_Widget() );
			
			// Contact Form 7
            require_once( __DIR__ . '/elementor/widgets/medibazar-contact-form-7.php' );
            \Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\medibazar_Contact_Form_7_Widget() );
			
			// Product Categories
            require_once( __DIR__ . '/elementor/widgets/medibazar-product-categories.php' );
            \Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\medibazar_Product_Categories_Widget() );
			
			// Deal Banner
            require_once( __DIR__ . '/elementor/widgets/medibazar-deal-banner.php' );
            \Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\medibazar_Deal_Banner_Widget() );
			
			// Image List
            require_once( __DIR__ . '/elementor/widgets/medibazar-image-list.php' );
            \Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\medibazar_Image_List_Widget() );
			
			// Button
			require_once( __DIR__ . '/elementor/widgets/medibazar-button.php' );
			\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\medibazar_Button() );

	}
	
	
    /**
    * Admin notice
    *
    * Warning when the site doesn't have Elementor installed or activated.
    *
    * @since 1.0
    *
    * @access public
    */
    public function medibazar_admin_notice_missing_main_plugin()
    {
        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }
        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor */
            esc_html__( '%1$s requires %2$s to be installed and activated.', 'medibazar-core' ),
            '<strong>' . esc_html__( 'medibazar Core', 'medibazar-core' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'medibazar-core' ) . '</strong>'
        );
        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }

    /**
    * Admin notice
    *
    * Warning when the site doesn't have a minimum required Elementor version.
    *
    * @since 1.0
    *
    * @access public
    */
    public function medibazar_admin_notice_minimum_elementor_version()
    {
        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }
        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
            esc_html__( '%1$s requires %2$s version %3$s or greater.', 'medibazar-core' ),
            '<strong>' . esc_html__( 'medibazar Core', 'medibazar-core' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'medibazar-core' ) . '</strong>',
             self::MINIMUM_ELEMENTOR_VERSION
        );
        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }

    /**
    * Admin notice
    *
    * Warning when the site doesn't have a minimum required PHP version.
    *
    * @since 1.0
    *
    * @access public
    */
    public function medibazar_admin_notice_minimum_php_version()
    {
        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }
        $message = sprintf(
            /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
            esc_html__( '%1$s requires %2$s version %3$s or greater.', 'medibazar-core' ),
            '<strong>' . esc_html__( 'medibazar Core', 'medibazar-core' ) . '</strong>',
            '<strong>' . esc_html__( 'PHP', 'medibazar-core' ) . '</strong>',
             self::MINIMUM_PHP_VERSION
        );
        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }
	
    public function widget_styles()
    {
    }

    public function widget_scripts()
    {


		if (is_admin ()){
			wp_enqueue_media ();
			wp_enqueue_script( 'widget-image', plugins_url( 'js/widget-image.js', __FILE__ ));
		}

        // custom-scripts
        wp_enqueue_script( 'medibazar-core-custom-scripts', plugins_url( 'elementor/custom-scripts.js', __FILE__ ), true );
    }
	
	public function widget_editor_style(){
		
		wp_enqueue_style( 'klb-editor-style', plugins_url( 'elementor/editor-style.css', __FILE__ ), true );

    }


} 
medibazar_Elementor_Addons::instance();