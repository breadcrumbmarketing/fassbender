<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blog-wrapper mb-40">
		<figure class="entry-media embed-responsive embed-responsive-16by9">
		   <?php echo get_post_meta($post->ID, 'klb_blogaudiourl', true); ?>
		</figure>
		<div class="blog-text">
			<div class="blog-meta">
				<span><i class="far fa-calendar-alt"></i> <a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a></span>
				
				<?php if(has_category()){ ?>
					<span><i class="far fa-folder"></i> <?php the_category(', '); ?></span>
				<?php } ?>
				
				<?php the_tags( '<span><i class="far fa-bookmark"></i>', ', ', ' </span>'); ?>
				
				<?php if ( is_sticky()) {
					printf( '<span class="sticky"><i class="far fa-star"></i>%s</span>', esc_html__('Featured', 'medibazar' ) );
				} ?>
			</div>
			<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
			<div class="klb-post">
				<?php the_content(); ?>
				<?php wp_link_pages(array('before' => '<div class="klb-pagination">' . esc_html__( 'Pages:', 'medibazar' ),'after'  => '</div>', 'next_or_number' => 'number')); ?>
			</div>
		</div>
	</div>
</article>