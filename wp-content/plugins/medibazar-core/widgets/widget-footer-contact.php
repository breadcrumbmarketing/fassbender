<?php

class widget_footer_contact extends WP_Widget { 
	
	// Widget Settings
	function __construct() {
		$widget_ops = array('description' => esc_html__('Only Detail Page: Footer Contact.','medibazar-core') );
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'footer_contact' );
		 parent::__construct( 'footer_contact', esc_html__('Medibazar Footer Contact','medibazar-core'), $widget_ops, $control_ops );
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

			<?php $contact_detail = get_theme_mod( 'medibazar_footer_contact_widget' ); ?>
			<?php if(!empty($contact_detail)){ ?>
				<div class="contacts-info">
					<?php foreach($contact_detail as $c){ ?>
			        	<div class="phone-footer"><i class="far fa-<?php echo esc_attr($c['contact_icon']); ?>"></i><p><?php echo medibazar_sanitize_data($c['contact_info']); ?></p></div>
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
		
		$defaults = array('title' => 'Contact Us');
		$instance = wp_parse_args((array) $instance, $defaults); ?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title:','medibazar-core'); ?></label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<p>
		  <?php esc_html_e('You can customize the contact details from Dashboard > Appearance > Customize > Medibazar Widgets > Footer Contact','medibazar-core'); ?>

		</p>
	<?php
	}
}

// Add Widget
function widget_footer_contact_init() {
	register_widget('widget_footer_contact');
}
add_action('widgets_init', 'widget_footer_contact_init');

?>