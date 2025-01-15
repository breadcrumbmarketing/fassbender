<?php

/**
 * page.php
 * @package WordPress
 * @subpackage Medibazar
 * @since Medibazar 1.0
 */
?>

<?php get_header(); ?>

	<?php $elementor_page = get_post_meta( get_the_ID(), '_elementor_edit_mode', true ); ?> 

	<?php if ( class_exists( 'woocommerce' ) ) { ?>

		<?php if (is_cart()) { ?>
			<?php $breadcrumb = get_theme_mod('medibazar_shop_breadcrumb','0'); ?>
			<?php if($breadcrumb == '1'){ ?>
				<div class="klb-shop-breadcrumb breadcrumb-area pt-125 pb-125">
					<div class="container">
						<div class="klb-breadcrumb-wrapper">
							<div class="row">
								<div class="col-xl-12">
									<?php $breadcrumb_title = get_theme_mod('medibazar_breadcrumb_title'); ?>
									<div class="breadcrumb-text">
										<h2><?php the_title(); ?></h2>
									</div>
								</div>
							</div>
							<?php woocommerce_breadcrumb(); ?>
						</div>
					</div>
				</div>
			<?php } else { ?>
				<div class="empty-klb"></div>
			<?php } ?>
			
			<section class="cart-area pt-100 pb-100">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<?php while(have_posts()) : the_post(); ?>
								<?php the_content (); ?>
								<?php wp_link_pages(array('before' => '<div class="klb-pagination">' . esc_html__( 'Pages:', 'medibazar' ),'after'  => '</div>', 'next_or_number' => 'number')); ?>
							<?php endwhile; ?>
						</div>
					</div>
				</div>
			</section>

		<?php } elseif (is_checkout()) { ?>
			<?php $breadcrumb = get_theme_mod('medibazar_shop_breadcrumb','0'); ?>
			<?php if($breadcrumb == '1'){ ?>
				<div class="klb-shop-breadcrumb breadcrumb-area pt-125 pb-125">
					<div class="container">
						<div class="klb-breadcrumb-wrapper">
							<div class="row">
								<div class="col-xl-12">
									<?php $breadcrumb_title = get_theme_mod('medibazar_breadcrumb_title'); ?>
									<div class="breadcrumb-text">
										<h2><?php the_title(); ?></h2>
									</div>
								</div>
							</div>
							<?php woocommerce_breadcrumb(); ?>
						</div>
					</div>
				</div>
			<?php } else { ?>
				<div class="empty-klb"></div>
			<?php } ?>
		
			<section class="checkout-area pt-100 pb-70">
				<div class="container">
					<?php while(have_posts()) : the_post(); ?>
						<?php the_content (); ?>
						<?php wp_link_pages(array('before' => '<div class="klb-pagination">' . esc_html__( 'Pages:', 'medibazar' ),'after'  => '</div>', 'next_or_number' => 'number')); ?>
					<?php endwhile; ?>
				</div>
			</section>
	   <?php } elseif (is_account_page()) { ?>
			<?php $breadcrumb = get_theme_mod('medibazar_shop_breadcrumb','0'); ?>
			<?php if($breadcrumb == '1'){ ?>
				<div class="klb-shop-breadcrumb breadcrumb-area pt-125 pb-125">
					<div class="container">
						<div class="klb-breadcrumb-wrapper">
							<div class="row">
								<div class="col-xl-12">
									<?php $breadcrumb_title = get_theme_mod('medibazar_breadcrumb_title'); ?>
									<div class="breadcrumb-text">
										<h2><?php the_title(); ?></h2>
									</div>
								</div>
							</div>
							<?php woocommerce_breadcrumb(); ?>
						</div>
					</div>
				</div>
			<?php } else { ?>
				<div class="empty-klb"></div>
			<?php } ?>
	   
			<section class="my-account-page pt-100 pb-100">
				<div class="container">
					<div class="row ">
						<div class="col-md-12">
							<?php while(have_posts()) : the_post(); ?>
								<?php the_content (); ?>
								<?php wp_link_pages(array('before' => '<div class="klb-pagination">' . esc_html__( 'Pages:', 'medibazar' ),'after'  => '</div>', 'next_or_number' => 'number')); ?>
							<?php endwhile; ?>
						</div>
					</div>
				</div>
			</section>
	   <?php } elseif ($elementor_page ) { ?>
		  
			<?php while(have_posts()) : the_post(); ?>
				<?php the_content (); ?>
				<?php wp_link_pages(array('before' => '<div class="klb-pagination">' . esc_html__( 'Pages:', 'medibazar' ),'after'  => '</div>', 'next_or_number' => 'number')); ?>
			<?php endwhile; ?>
			
		<?php } else { ?>
			<div class="empty-klb"></div>
			<div class="klb-page section pt-100 pb-100">
				<div class="container">
					<div class="row ">
						<div class="col-md-10 offset-md-1">
							<?php while(have_posts()) : the_post(); ?>
								<h1 class="klb-page-title"><?php the_title(); ?></h1>
								<div class="klb-post">
									<?php the_content (); ?>
									<?php wp_link_pages(array('before' => '<div class="klb-pagination">' . esc_html__( 'Pages:', 'medibazar' ),'after'  => '</div>', 'next_or_number' => 'number')); ?>
								</div>
							<?php endwhile; ?>
							<?php comments_template(); ?>
						</div>
					</div>         
				</div>
			</div>
		<?php } ?>
	<?php } else { ?>

	   <?php if ($elementor_page ) { ?>
		  
			<?php while(have_posts()) : the_post(); ?>
				<?php the_content (); ?>
				<?php wp_link_pages(array('before' => '<div class="klb-pagination">' . esc_html__( 'Pages:', 'medibazar' ),'after'  => '</div>', 'next_or_number' => 'number')); ?>
			<?php endwhile; ?>
			
		<?php } else { ?>
			<div class="empty-klb"></div>
			<div class="klb-page section pt-100 pb-100">
				<div class="container">
					<div class="row ">
						<div class="col-md-10 offset-md-1">
							<?php while(have_posts()) : the_post(); ?>
								<h1 class="klb-page-title"><?php the_title(); ?></h1>
								<div class="klb-post">
									<?php the_content (); ?>
									<?php wp_link_pages(array('before' => '<div class="klb-pagination">' . esc_html__( 'Pages:', 'medibazar' ),'after'  => '</div>', 'next_or_number' => 'number')); ?>
								</div>
							<?php endwhile; ?>
							<?php comments_template(); ?>
						</div>
					</div>         
				</div>
			</div>
		<?php } ?>
	<?php } ?>
<?php get_footer(); ?>