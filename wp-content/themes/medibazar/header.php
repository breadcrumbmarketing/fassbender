<?php
/**
 * header.php
 * @package WordPress
 * @subpackage Medibazar
 * @since Medibazar 1.0
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

<?php if (!get_theme_mod( 'medibazar_preloader' )) { ?>
<div id="preloader"></div>
<?php } ?>

	<?php medibazar_do_action( 'medibazar_before_main_header'); ?>
	
	<?php if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) { ?>
		<?php
        /**
        * Hook: medibazar_main_header
        *
        * @hooked medibazar_main_header_function - 10
        */
        do_action( 'medibazar_main_header' );
	
		?>
	<?php } ?>
	
	<?php medibazar_do_action( 'medibazar_after_main_header'); ?>

	<main>
