<?php
/**
 * footer.php
 * @package WordPress
 * @subpackage Fassbender
 * @since Fassbender 1.0
 * 
 */
 ?>
	<?php Fassbender_do_action( 'Fassbender_before_main_footer'); ?>
	
	<?php if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'footer' ) ) { ?>
		<?php
        /**
        * Hook: Fassbender_main_footer
        *
        * @hooked Fassbender_main_footer_function - 10
        */
        do_action( 'Fassbender_main_footer' );
	
		?>
	<?php } ?>
	
	<?php Fassbender_do_action( 'Fassbender_after_main_footer'); ?>

	<?php wp_footer(); ?>
    </body>
</html>