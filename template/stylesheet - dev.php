<?php
/**
 *  Template Name: Stylesheet dev
 */
get_header();
?>
<?php
	if(have_posts()) : 
		while(have_posts()) : the_post();
			$id = get_the_id();
			$post_thumbnail = get_the_post_thumbnail_url($id);
			?>
				<!-- FEATURED IMAGE -->
				<div class="featured-images" style="background-image: url(<?php echo $post_thumbnail; ?>);"></div>
				<!-- PAGE HEADING -->
				<div class="container-lg">
					<div class="row">
						<div class="col-md-9">
							<h1 class="title-bg"><?php echo get_the_title(); ?></h1>			
						</div>
					</div>
				</div>
				<?php 
				$content = apply_filters( 'the_content', get_the_content() );
				$content = preg_replace('/<br \/>/iU', '', $content);
				echo $content;
		endwhile;
	endif;
	wp_reset_query();
?>
<?php
get_footer();
?>
