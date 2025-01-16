<?php

class widget_single_banner extends WP_Widget { 
	
	// Widget Settings
	function __construct() {
		$widget_ops = array('description' => esc_html__('For Mega Menu: Single Banner.','Fassbender-core') );
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'single_banner' );
		 parent::__construct( 'single_banner', esc_html__('Fassbender Single Banner','Fassbender-core'), $widget_ops, $control_ops );
	}


	
	// Widget Output
	function widget($args, $instance) {

		extract($args);
		$title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance );
		
		$bannertitle = $instance['bannertitle'];	
		$subtitle = $instance['subtitle'];	
		$sale = $instance['sale'];	
		$buttontext = $instance['buttontext'];	
		$buttonurl = $instance['buttonurl'];	


		echo $before_widget;

		if($title) {
			echo $before_title . $title . $after_title;
		}
		?>
		
		
		<div class="product-11-wrapper text-center">
			<div class="product-02-img pos-rel">
				<?php if(isset($instance['imageid'])){ ?>
				<img src="<?php echo esc_url(wp_get_attachment_url($instance['imageid'])); ?>" alt="menu_banner1">
				<?php } ?>
				<div class="b-02-tag b-03-tag">
					<h3><?php echo esc_html($sale); ?> <br> <span><?php esc_html_e('off','Fassbender-core'); ?></span> </h3>
				</div>
			</div>
			<div class="product-text">
				<h4><a href="<?php echo esc_url($buttonurl); ?>"><?php echo esc_html($bannertitle); ?></a></h4>
				<span><?php echo esc_html($subtitle); ?></span>
				<div class="c-side-button mt-20">
					<a class="c-btn" href="<?php echo esc_url($buttonurl); ?>"><?php echo esc_html($buttontext); ?> <i class="far fa-plus"></i></a>
				</div>
			</div>
		</div>
	


		<?php echo $after_widget;

	}
	
	// Update
	function update( $new_instance, $old_instance ) {  
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['bannertitle'] = $new_instance['bannertitle'];
		$instance['subtitle'] = $new_instance['subtitle'];
		$instance['sale'] = $new_instance['sale'];
		$instance['buttontext'] = $new_instance['buttontext'];
		$instance['buttonurl'] = $new_instance['buttonurl'];
		$instance['imageid'] = $new_instance['imageid'];
		
		return $instance;
	}
	
	// Backend Form
	function form($instance) {
		
		$defaults = array('title' => '', 'bannertitle'=> 'Lab N95 Facemask', 'subtitle' => '£250.99', 'sale' => '-20%', 'buttontext' => 'buy now', 'buttonurl' => '#', 'imageid' => '#');
		$instance = wp_parse_args((array) $instance, $defaults); ?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">
				<?php esc_html_e('Title:','Fassbender-core'); ?>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
			</label>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('bannertitle'); ?>"><?php esc_html_e('Banner Title:','Fassbender-core'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('bannertitle'); ?>" name="<?php echo $this->get_field_name('bannertitle'); ?>" value="<?php echo $instance['bannertitle']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('subtitle'); ?>"><?php esc_html_e('Subtitle:','Fassbender-core'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('subtitle'); ?>" name="<?php echo $this->get_field_name('subtitle'); ?>" value="<?php echo $instance['subtitle']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('sale'); ?>"><?php esc_html_e('Sale:','Fassbender-core'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('sale'); ?>" name="<?php echo $this->get_field_name('sale'); ?>" value="<?php echo $instance['sale']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('buttontext'); ?>"><?php esc_html_e('Button Text:','Fassbender-core'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('buttontext'); ?>" name="<?php echo $this->get_field_name('buttontext'); ?>" value="<?php echo $instance['buttontext']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('buttonurl'); ?>"><?php esc_html_e('Button URL:','Fassbender-core'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('buttonurl'); ?>" name="<?php echo $this->get_field_name('buttonurl'); ?>" value="<?php echo $instance['buttonurl']; ?>" />
		</p>
		
		<p>
		  <label for="<?php echo $this->get_field_id('imageid'); ?>"><?php esc_html_e('Image:','Fassbender-core'); ?></label>
		  <input type="text" class="img" name="<?php echo $this->get_field_name('imageid'); ?>" id="<?php echo $this->get_field_id('imageid'); ?>" value="<?php echo $instance['imageid']; ?>" />
		  <input type="button" class="set_custom_images button button-primary" value="<?php esc_attr_e('Select Image','Fassbender-core'); ?>" />
		</p>
	<?php
	}
}

// Add Widget
function widget_single_banner_init() {
	register_widget('widget_single_banner');
}
add_action('widgets_init', 'widget_single_banner_init');


function klbimageupload_enqueue() {
	if (is_admin ()){
		wp_enqueue_media ();
	}
	
	wp_enqueue_script( 'widget-image', plugins_url( 'js/widget-image.js', __DIR__ ));
}
add_action('admin_enqueue_scripts', 'klbimageupload_enqueue');

?>