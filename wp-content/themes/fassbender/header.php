<?php
/**
 * header.php
 * @package WordPress
 * @subpackage Fassbender
 * @since Fassbender 1.0
 * 
 */
 ?>
 
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( "charset" ); ?>">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php if (!get_theme_mod( 'Fassbender_preloader' )) { ?>
<div id="preloader"></div>
<?php } ?>

	<?php Fassbender_do_action( 'Fassbender_before_main_header'); ?>
	
	<?php if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) { ?>
		<?php
        /**
        * Hook: Fassbender_main_header
        *
        * @hooked Fassbender_main_header_function - 10
        */
        do_action( 'Fassbender_main_header' );
	
		?>
	<?php } ?>
	
	<?php Fassbender_do_action( 'Fassbender_after_main_header'); ?>

	<main>
