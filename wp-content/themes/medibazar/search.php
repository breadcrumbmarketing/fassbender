<?php
/**
 * search.php
 * @package WordPress
 * @subpackage Medibazar
 * @since Medibazar 1.0
 * 
 */
 ?>
 
<?php get_header(); ?>
 
<div class="klb-blog-breadcrumb breadcrumb-area pt-125 pb-125">
	<div class="container">
		<div class="klb-breadcrumb-wrapper">
			<div class="row">
				<div class="col-xl-12">
					<div class="breadcrumb-text">
						<h2><?php printf( esc_html__( 'Search Results for: %s', 'medibazar' ), get_search_query() ); ?></h2>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="blog-area pt-105 pb-70">
	<div class="container">
		<div class="row">
			<?php if( get_theme_mod( 'medibazar_blog_layout' ) == 'right-sidebar') { ?>
				<div class="col-xl-8 col-lg-8 mb-30">
					<div class="blog-standard">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<?php  get_template_part( 'post-format/content', get_post_format() ); ?>

						<?php endwhile; ?>
							
							<?php get_template_part( 'post-format/pagination' ); ?>
							
						<?php else : ?>

							<div class="no-post">
								<h2><?php esc_html_e('No Posts Found', 'medibazar') ?></h2>
								
								<?php get_search_form(); ?>
							</div>

						<?php endif; ?>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 mb-30">
					<?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
						<?php dynamic_sidebar( 'blog-sidebar' ); ?>
					<?php } ?>
				</div>
			<?php } elseif( get_theme_mod( 'medibazar_blog_layout' ) == 'full-width') { ?>
				<div class="col-lg-10 mb-30 offset-lg-1">
					<div class="blog-standard">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<?php  get_template_part( 'post-format/content', get_post_format() ); ?>

						<?php endwhile; ?>
							
							<?php get_template_part( 'post-format/pagination' ); ?>
							
						<?php else : ?>

							<div class="no-post">
								<h2><?php esc_html_e('No Posts Found', 'medibazar') ?></h2>
								
								<?php get_search_form(); ?>
							</div>

						<?php endif; ?>
					</div>
				</div>
			<?php } else { ?>
				<?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
					<div class="col-xl-4 col-lg-4 mb-30 order-xs-2">
						<?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
							<?php dynamic_sidebar( 'blog-sidebar' ); ?>
						<?php } ?>
					</div>
					<div class="col-xl-8 col-lg-8 mb-30 order-xs-1">
						<div class="blog-standard">
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

								<?php  get_template_part( 'post-format/content', get_post_format() ); ?>

							<?php endwhile; ?>
								
								<?php get_template_part( 'post-format/pagination' ); ?>
								
							<?php else : ?>

								<div class="no-post">
									<h2><?php esc_html_e('No Posts Found', 'medibazar') ?></h2>
									
									<?php get_search_form(); ?>
								</div>
								
							<?php endif; ?>
						</div>
					</div>
				<?php } else { ?>
					<div class="col-lg-10 mb-30 offset-lg-1">
						<div class="blog-standard">
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

								<?php  get_template_part( 'post-format/content', get_post_format() ); ?>

							<?php endwhile; ?>
								
								<?php get_template_part( 'post-format/pagination' ); ?>
								
							<?php else : ?>

								<div class="no-post">
									<h2><?php esc_html_e('No Posts Found', 'medibazar') ?></h2>
									
									<?php get_search_form(); ?>
								</div>

							<?php endif; ?>
						</div>
					</div>
				<?php } ?>
			<?php } ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>