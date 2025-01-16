<?php

/**
* The template for displaying all single posts
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
*
* @package WordPress
* @subpackage Fassbender
* @since 1.0.0
*/

	remove_action( 'Fassbender_main_header', 'Fassbender_main_header_function', 10 );
	remove_action( 'Fassbender_main_footer', 'Fassbender_main_footer_function', 10 );


    get_header();

    while ( have_posts() ) : the_post();
        the_content();
    endwhile;

    get_footer();
?>
