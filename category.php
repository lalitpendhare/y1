<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
<div class="hero-banner dark-blue-bg">
	<div class="container">
		<div class="row">
			<div class="col-sm-5 col-md-3">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-12">
						<?php 
						$blog_id = get_option( 'page_for_posts' );
						//echo $id;
						?>
						<h1><span><?php echo get_field('blog_sub_title',$blog_id); ?></span> <?php echo get_field('blog_title',$blog_id); ?></h1>
					</div>
				</div>
				<div class="form-group email-bar blog-signup">
					<label>
						<?php 
							$form_shortcode = get_field('form_shortcode',$blog_id);
							if(!empty($form_shortcode)){
								echo do_shortcode($form_shortcode);
							}
						?>
					</label>							
				</div>
				
				<div class="visible-xs">
					<div class="dropdown categories">
						<button class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
						categories
						<img src="<?php echo get_template_directory_uri(); ?>/images/drop-down-plus.svg" alt="" class="drop-down-plus">
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenu1">
							<div class="row">
								<div class="col-md-10 col-md-offset-1">							
									<div class="visible-xs">
										<h6>categories</h6> 
										<div class="closeIcon">
											<span></span>
											<span></span>
											<span></span>
										</div>
									</div>

									<ul class="category-post">
										<li class="active"><a href="<?php echo get_permalink($blog_id); ?>" title="Latest Posts">Latest Posts</a></li>
										<?php $blog_categories =  get_terms( 'category' ); 
											foreach($blog_categories as $term) { 
												$category_link = get_category_link($term->term_id ); 
												echo '<li><a href="'.$category_link.'" title="'.$term->name.'">'.$term->name.'</a></li>';
											}
										?>
									</ul>							
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
			<?php 
			$feature_post_id = get_field('feature_post',$blog_id);

			if(!empty($feature_post_id[0])){
				$args = array(
				    'post_type' => 'post',
				    'p' => $feature_post_id[0],
				    'posts_per_page' => 1,
				    'post_status' => 'publish',
				); 
			} else {
				$args = array(
				    'post_type' => 'post',
				    'posts_per_page' => 1,
				    'post_status' => 'publish',
				    'orderby' => 'date',
				    'order' => 'DESC',
				);
			}
				$query = new wp_query($args);
				if($query->have_posts()) :
					while($query->have_posts()) : $query->the_post();
						$post_thumbnail = get_the_post_thumbnail_url(get_the_id());
						$thumb_id = get_post_thumbnail_id(get_the_id());
						$image_alt = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true);
						$post_title = get_the_title();
						//$post_content = apply_filters('the_content',get_the_content());
						$post_content = get_the_excerpt();
						$post_content = limited_string($post_content,200);
						$post_author = get_the_author();
						$date = get_the_date('M d, Y');
						$datetime = get_the_date('Y-m-d');
						$permalink = get_the_permalink();
						$categories = get_the_category( get_the_id() );
    					$category_name = $categories[0]->name;
				?>
					<div class="col-sm-12 col-md-7 col-md-offset-2 hidden-xs">
						<div class="thumb-col lrg-thumb">
							<a href="<?php echo $permalink; ?>" class="thumb-link"></a>
							<figure class="thumb-img">
								<img src="<?php echo $post_thumbnail; ?>" alt="<?php echo $image_alt; ?>">
								<span class="featuredText">featured</span>
							</figure>
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

<div class="lightblue-bg middel">
	<div class="container">
		<div class="hidden-xs">
			<div class="dropdown categories">
				<button class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				categories
				<img src="<?php echo get_template_directory_uri(); ?>/images/drop-down-plus.svg" alt="" class="drop-down-plus">
				</button>
				
				<div class="dropdown-menu" aria-labelledby="dropdownMenu1">
					<div class="row">
						<div class="col-md-10 col-md-offset-1">							
							<ul class="category-post">
								<li class="active"><a href="<?php echo get_permalink($blog_id); ?>" title="Latest Posts">Latest Posts</a></li>
								<?php $blog_categories =  get_terms( 'category'); 
									foreach($blog_categories as $term) { 
										$category_link = get_category_link($term->term_id ); 
										echo '<li><a href="'.$category_link.'" title="'.$term->name.'">'.$term->name.'</a></li>';
									}
								?>
							</ul>							
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
		
		<div class="row equal">
			<div class="col-md-4 visible-xs">
				<div class="thumb-col lrg-thumb">
					<a href="<?php echo $permalink; ?>" class="thumb-link"></a>
					<figure class="thumb-img">
						<img src="<?php echo $post_thumbnail; ?>" alt="<?php echo $image_alt; ?>">
						<span class="featuredText">featured</span>
					</figure>
					<div class="thumb-container">
						<h3><span><?php echo $category_name; ?></span><?php echo $post_title; ?></h3>
						<?php echo $post_content; ?>
						<div class="thumb-footer">
							<span>By <?php echo $post_author; ?></span>
							<time datetime="<?php echo $datetime; ?>"><?php echo $date; ?></time>
						</div>
					</div>
				</div>
			</div>
			<?php
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			$c_id = get_queried_object_id();
			//echo $c_id
				$args = array(
				    'post_type' => 'post',
				    'posts_per_page' => 6,
				    'post_status' => 'publish',
				    'cat' => array($c_id),
				    'orderby' => 'date',
				    'order' => 'DESC',
				    'paged' => $paged
				);
				$query = new wp_query($args);
				if($query->have_posts()) : 
					while($query->have_posts()) : $query->the_post();
				/*if(have_posts()) : 
					while(have_posts()) : the_post();*/
						$post_thumbnail = get_the_post_thumbnail_url(get_the_id());
						$thumb_id = get_post_thumbnail_id(get_the_id());
						$image_alt = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true);
						$post_title = get_the_title();
						//$post_content = apply_filters('the_content',get_the_content());
						$post_content = get_the_excerpt();
						$post_content = limited_string($post_content,80);

						$post_author = get_the_author();
						$date = get_the_date('M d, Y');
						$datetime = get_the_date('Y-m-d');
						$permalink = get_the_permalink();
						$categories = get_the_category( get_the_id() );
    					$category_name = $categories[0]->name;
			?>
			<div class="col-md-4">
				<div class="thumb-col">
					<a href="<?php echo $permalink; ?>" class="thumb-link"></a>
					<figure class="thumb-img">
						<img src="<?php echo $post_thumbnail; ?>" alt="<?php echo $image_alt; ?>">						
					</figure>
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
				the_posts_pagination( array(
					'mid_size' => 200,
				'prev_text'          => __( '', 'twentyfifteen' ),
				'next_text'          => __( '', 'twentyfifteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( '', 'twentyfifteen' ) . ' </span>',
			) );
			endif;
			wp_reset_query();
			?>
		</div>
		
		
	</div>
</div>
<?php get_footer(); ?>
