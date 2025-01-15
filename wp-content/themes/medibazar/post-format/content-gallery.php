<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blog-wrapper mb-40">
		<div class="blog-img pos-rel">
			<?php $images = rwmb_meta( 'klb_blogitemslides', 'type=image_advanced&size=medium' ); ?>
			<?php if($images) { ?>
				<?php wp_enqueue_script( 'medibazar-carousel-slider'); ?>
				<div class="carousel_slider owl-carousel owl-theme" data-nav="true" data-dots="false" data-autoheight="true" data-autoplay="true" data-loop="true" data-autoplay-timeout="3000" data-items="1">
					<?php  foreach ( $images as $image ) { ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<img src="<?php echo esc_url($image['full_url']); ?>" alt="<?php the_title_attribute(); ?>">
						</a>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
		<div class="blog-text">
			<div class="blog-meta">
				<span><i class="far fa-calendar-alt"></i> <a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a></span>
				
				<?php if(has_category()){ ?>
					<span><i class="far fa-folder"></i> <?php the_category(', '); ?></span>
				<?php } ?>
				
				<?php the_tags( '<span><i class="far fa-bookmark"></i> ', ', ', ' </span>'); ?>
				
				<?php if ( is_sticky()) {
					printf( '<span class="sticky"><i class="far fa-star"></i> %s</span>', esc_html__('Featured', 'medibazar' ) );
				} ?>
			</div>
			<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
			<div class="klb-post">
				<?php the_excerpt(); ?>
				<?php wp_link_pages(array('before' => '<div class="klb-pagination">' . esc_html__( 'Pages:', 'medibazar' ),'after'  => '</div>', 'next_or_number' => 'number')); ?>
			</div>
		</div>
	</div>
</article>