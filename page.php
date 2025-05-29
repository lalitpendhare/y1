<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<?php
	if(have_posts()) : 
		while(have_posts()) : the_post();
			$id = get_the_id();
			$post_thumbnail = get_the_post_thumbnail_url($id,'full');
			$feature_image_position = get_field('feature_image_position',$id);
			if(!empty($feature_image_position)){
				$class = "bg".$feature_image_position;
			} else {
				$class = "";
			}
			if(empty($post_thumbnail)){
				$post_thumbnail = get_field('page_default_image','option');
				$post_thumbnail = $post_thumbnail['url'];
			}
			?>
				<!-- FEATURED IMAGE -->
				<div class="featured-images <?php echo $class; ?>" style="background-image: url(<?php echo $post_thumbnail; ?>);"></div>
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
				//$content = preg_replace('/<br \/>/iU', '', $content);
				if(!empty($content)) {
				?>
				<div class="typography">
					<div class="container">
						<div class="row">
							<div class="col-md-8 col-md-offset-2">
								<?php echo $content; ?>
							</div>
						</div>
					</div>	
				</div>	
				<?php
				}
		endwhile;
	endif;
	wp_reset_query();
	//echo $id;
	$style_radio_option = get_field('style_radio_option');
	if($style_radio_option == 'flexible'){
		require get_template_directory() . '/include/stylesheet_page_flexible_content.php';
		//echo "flexible";	
	} 
	if($style_radio_option == 'shortcode') {
		$shortcode_content = get_field('shortcode_content',$id);
		$shortcode_content = preg_replace('/<br \/>/iU', '', $shortcode_content);
		echo $shortcode_content;
	}
?>
<?php
get_footer();
?>