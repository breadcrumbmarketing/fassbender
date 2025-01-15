<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blog-wrapper mb-40">
		<figure class="entry-media embed-responsive embed-responsive-16by9">
		   <?php  
			if (get_post_meta( get_the_ID(), 'klb_blog_video_type', true ) == 'vimeo') {  
			  echo '<iframe src="//player.vimeo.com/video/'.get_post_meta( get_the_ID(), 'klb_blog_video_embed', true ).'?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" height="515" allowFullScreen></iframe>';  
			}  
			else if (get_post_meta( get_the_ID(), 'klb_blog_video_type', true ) == 'youtube') {  
			  echo '<iframe height="450" src="//www.youtube.com/embed/'.get_post_meta( get_the_ID(), 'klb_blog_video_embed', true ).'?rel=0&showinfo=0&modestbranding=1&hd=1&autohide=1&color=white" allowfullscreen></iframe>';  
			}  
			else {  
				echo ' '.get_post_meta( get_the_ID(), 'klb_blog_video_embed', true ).' '; 
			}  
			?>
		</figure>
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
				<?php the_content(); ?>
				<?php wp_link_pages(array('before' => '<div class="klb-pagination">' . esc_html__( 'Pages:', 'medibazar' ),'after'  => '</div>', 'next_or_number' => 'number')); ?>
			</div>
		</div>
	</div>
</article>