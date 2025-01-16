<?php

class widget_contact_box extends WP_Widget { 
	
	// Widget Settings
	function __construct() {
		$widget_ops = array('description' => esc_html__('Only Detail Page: Contact Box.','Fassbender-core') );
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'contact_box' );
		 parent::__construct( 'contact_box', esc_html__('Fassbender Contact Box','Fassbender-core'), $widget_ops, $control_ops );
	}


	
	// Widget Output
	function widget($args, $instance) {

		extract($args);
		$title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance );
		
		echo $before_widget;

		if($title) {
			echo $before_title . $title . $after_title;
		}
		?>
		
		<?php $contact_detail = get_theme_mod( 'Fassbender_contact_box_widget' ); ?>
		<?php if(!empty($contact_detail)){ ?>
			<div class="side-info mb-30">
				<?php foreach($contact_detail as $c){ ?>
                    <div class="contact-list mb-30">
                        <h4><?php echo Fassbender_sanitize_data($c['contact_title']); ?></h4>
                        <p><?php echo Fassbender_sanitize_data($c['contact_subtitle']); ?></p>
                    </div>
				<?php } ?>
			</div>
		<?php } ?>
	


		<?php echo $after_widget;

	}
	
	// Update
	function update( $new_instance, $old_instance ) {  
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);

		
		return $instance;
	}
	
	// Backend Form
	function form($instance) {
		
		$defaults = array('title' => '');
		$instance = wp_parse_args((array) $instance, $defaults); ?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title:','Fassbender-core'); ?></label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<p>
		  <?php esc_html_e('You can customize the contact details from Dashboard > Appearance > Customize > Fassbender Widgets > Contact Box','Fassbender-core'); ?>

		</p>
	<?php
	}
}

// Add Widget
function widget_contact_box_init() {
	register_widget('widget_contact_box');
}
add_action('widgets_init', 'widget_contact_box_init');

?>