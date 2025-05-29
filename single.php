<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); 
$post_id = get_the_id();
?>
	<!-- POST HEADER -->
	<div class="lightblue-bg post-header-row">
		<div class="container">
			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();
	
				/*
				 * Include the post format-specific template for the content. If you want to
				 * use this in a child theme, then include a file called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */
				$post_thumbnail = get_the_post_thumbnail_url(get_the_id(),'full');
				$thumb_id = get_post_thumbnail_id(get_the_id());
				$image_alt = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true);
				$post_title = get_the_title();
				$post_content = apply_filters('the_content',get_the_content());
				$excerpt = get_the_excerpt();
				$post_content = preg_replace('/<br \/>/iU', '', $post_content);
				//$post_content = limited_string($post_content,200);
				$post_author = get_the_author();
				$date = get_the_date('M d, Y');
				$datetime = get_the_date('Y-m-d');
				$permalink = get_the_permalink();
				$categories = get_the_category( get_the_id() );
				$category_name = $categories[0]->name;
				
	
			?>
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="post-header">
							<h1 class="title"><span><?php echo $category_name; ?></span> <?php echo $post_title; ?></h1>
							<div class="post-data">
								By <?php echo $post_author; ?> <time><?php echo $date; ?></time>
							</div>
						</div>
					</div>			
				</div>
			</div>
	</div>
	<!-- END: / POST HEADER -->	
	
	<div class="container">
			<!-- FEATURED IMAGE -->			
			<img src="<?php echo $post_thumbnail; ?>" alt="<?php echo $image_alt; ?>" class="featuredImg">

		<?php

			echo $post_content;
			//get_template_part( 'content', get_post_format() );
			

			// If comments are open or we have at least one comment, load up the comment template.
			/*if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;*/

			// Previous/next post navigation.
			/*the_post_navigation( array(
				'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentyfifteen' ) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Next post:', 'twentyfifteen' ) . '</span> ' .
					'<span class="post-title">%title</span>',
				'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentyfifteen' ) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Previous post:', 'twentyfifteen' ) . '</span> ' .
					'<span class="post-title">%title</span>',
			) );*/

			
			/**
			 *  Infinite next and previous post looping in WordPress
			 */
			/*if( get_adjacent_post(false, '', true) ) { 
				previous_post_link('%link', '&larr; Previous Post');
			} else { 
				$first = new WP_Query('posts_per_page=1&order=DESC'); $first->the_post();
					echo '<a href="' . get_permalink() . '">&larr; Back To Blog</a>';
				wp_reset_query();
			}; */
			$blog_id = get_option( 'page_for_posts' );
			
			

			?>
	</div>
	<?php
		$style_radio_option = get_field('style_radio_option',$post_id);
		if($style_radio_option == 'flexible'){
			require get_template_directory() . '/include/stylesheet_page_flexible_content.php';
			//echo "flexible";	
		} 
		if($style_radio_option == 'shortcode') {
			$shortcode_content = get_field('shortcode_content',$post_id);
			$shortcode_content = preg_replace('/<br \/>/iU', '', $shortcode_content);
			echo $shortcode_content;
		}
	?>
		<div class="container">
			<div class="blog-bottom-row">
			<div class="social-center"> 
			<?php echo wpfai_social(); ?>
			
			<!-- <div class="fb-share-button" 
			    data-href="<?php //get_the_permalink($post_id); ?>" 
			    data-layout="button_count">
			    <a href="<?php //echo get_the_permalink($post_id); ?>" data-image="<?php //echo $post_thumbnail; ?>" data-title="" data-desc="<?php //echo $excerpt; ?>" class="btnShare">Share</a>
			   <a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php //echo $title;?>&amp;p[summary]=<?php //echo $excerpt;?>&amp;p[url]=<?php //echo $url; ?>&amp;&p[images][0]=<?php //echo $post_thumbnail;?>', 'sharer', 'toolbar=0,status=0,width=548,height=325');" href="javascript: void(0)"> 
Insert text or an image here. 
</a>
<a name="fb_share" type="button" href="https://www.facebook.com/sharer.php?u=123.abc.com&t=TEst">share on Facebook</a>
			  </div> -->
			</div>
				<ul class="tags-list">
					<?php
						$posttags = get_the_tags($post_id);
						if ($posttags) {
							//var_dump($posttags);
						  foreach($posttags as $tag) {
						  	$tag_link = get_tag_link($tag->term_id);
						  	//$tag_link = site_url().'/blog/?tag='.$tag->slug;
							echo '<li><a href="'.$tag_link.'" title="'.$tag->name.'">'.$tag->name.'</a></li>';
						  }
						}
						wp_reset_query();
					?>
				</ul>

			<?php
			echo '<a href="' . get_permalink($blog_id) . '" class="nextPrevLink prev-to-blog">Back To Blog</a>';
			if( get_adjacent_post(false, '', false) ) { 
				next_post_link('%link', 'Next Post');
			} else { 
				$last = new WP_Query('posts_per_page=1&order=ASC&post_type'); $last->the_post();
					echo '<a href="' . get_permalink() . '" class="nextPrevLink next-to-blog">Next Post</a>';
				wp_reset_query();
			}; 
			echo '</div>';

		// End the loop.

		endwhile;
		wp_reset_query();
		?>
	
	</div>
	<!-- .site-main -->	
	
	<!-- SIMILAR POSTS -->
	<div class="lightblue-bg similar-posts">
		<div class="container">
			<div class="text-center">
				<h5>recommened posts</h5>
			</div>
			<div class="row equal">
				<?php
					$cat_value = array();
					$cat = get_the_category($post_id);
					foreach( $cat as $cat_id){
					    $cat_value[] = $cat_id->term_id;
					}
					$args = array(
						    'post_type' => 'post',
						    'posts_per_page' => 3,
						    'post_status' => 'publish',
						    'orderby' => 'date',
						    //'category__in' => $cat_value,
						    'post__not_in' => array($post_id),
						);
					//var_dump($args);
						$query1 = new wp_query($args);
						if($query1->have_posts()) : 
							while($query1->have_posts()) : $query1->the_post();
								$post_thumbnail = get_the_post_thumbnail_url(get_the_id());
								$thumb_id = get_post_thumbnail_id(get_the_id());
								$image_alt = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true);
								$post_title = get_the_title();
								$post_content = get_the_excerpt();
								$post_content = limited_string($post_content,80);
								$post_author = get_the_author();
								$date = get_the_date('M d, Y');
								$datetime = get_the_date('Y-m-d');
								$permalink = get_the_permalink();
								$categories = get_the_category( get_the_id() );
		    					$category_name = $categories[0]->name;
				?>		
					<div class="col-sm-6 col-md-4">
						<div class="thumb-col">
							<a href="<?php echo $permalink; ?>" class="thumb-link"></a>
							<div class="thumb-img" style="background-image: url(<?php echo $post_thumbnail; ?>)"></div>							
							<div class="thumb-container">
								<h3><span><?php echo $category_name; ?></span> <?php echo $post_title; ?></h3>
								<p><?php echo $post_content; ?></p>
								<div class="thumb-footer">
									<span>By <?php echo $post_author; ?></span>
									<time datetime="<?php echo $datetime; ?>"><?php echo $date; ?></time>
								</div>
							</div>
						</div>
					</div>
				<?php 
				endwhile;
				endif;
				wp_reset_query();
				?>
				</div>
		</div>	
	</div>
<?php get_footer(); ?>
