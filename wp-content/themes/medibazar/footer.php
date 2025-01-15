<?php
/**
 * footer.php
 * @package WordPress
 * @subpackage Medibazar
 * @since Medibazar 1.0
 * 
 */
 ?>
	<?php medibazar_do_action( 'medibazar_before_main_footer'); ?>
	
	<?php if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'footer' ) ) { ?>
		<?php
        /**
        * Hook: medibazar_main_footer
        *
        * @hooked medibazar_main_footer_function - 10
        */
        do_action( 'medibazar_main_footer' );
	
		?>
	<?php } ?>
	
	<?php medibazar_do_action( 'medibazar_after_main_footer'); ?>

	<?php wp_footer(); ?>
    </body>
</html>