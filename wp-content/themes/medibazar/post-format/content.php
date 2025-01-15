<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blog-wrapper mb-40">
		<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
			<?php  
				$att=get_post_thumbnail_id();
				$image_src = wp_get_attachment_image_src( $att, 'full' );
				$image_src = $image_src[0]; 
			?>
			<div class="blog-img pos-rel">
				<a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($image_src); ?>" alt="<?php the_title_attribute(); ?>"></a>
			</div>
		<?php } ?>
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