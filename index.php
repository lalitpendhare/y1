<?php
get_header();
?>
<div class="hero-banner dark-blue-bg">
	<div class="container">
		<div class="row">
			<div class="col-sm-5 col-md-3">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-12">
						<?php 
						$blog_id = get_option( 'page_for_posts' );
						?>
						<h1><span><?php echo get_field('blog_sub_title',$blog_id); ?></span> <?php echo get_field('blog_title',$blog_id); ?></h1>
					</div>
				</div>
				<div class="form-group email-bar blog-signup">
					<label>
						<?php //echo do_shortcode('[gravityform id=2 title=false description=false ajax=true]') ?>
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
									<ul>
										<li class="active"><a href="<?php get_permalink($blog_id); ?>" title="Latest Posts">Latest Posts</a></li>
										<?php $blog_categories =  get_terms( 'category', array( 'hide_empty' => false) ); 
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
			$feature_post = array();
			$feature_post[] = $feature_post_id[0];
			//print_r($feature_post);
			//echo $feature_post_id[0];
			//exit();


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
						$recent_post_id = get_the_id();
						$feature_post[] = $recent_post_id;
						$post_thumbnail = get_the_post_thumbnail_url(get_the_id());
						$thumb_id = get_post_thumbnail_id(get_the_id());
						$image_alt = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true);
						$post_title = get_the_title();
						$post_content = apply_filters('the_content',get_the_content());
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
							<div class="thumb-img" style="background-image: url(<?php echo $post_thumbnail; ?>)"><span class="featuredText">featured</span></div>							
							<div class="thumb-container">
								<h3><span><?php echo $category_name; ?></span> <?php echo $post_title; ?></h3>
								<?php echo $post_content; ?>
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
				//$feature_post = array($feature_post_id[0], $recent_post_id);
				//var_dump($feature_post);
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
							<ul>
								<li class="active"><a href="<?php get_permalink($blog_id); ?>" title="Latest Posts">Latest Posts</a></li>
								<?php $blog_categories =  get_terms( 'category', array( 'hide_empty' => false) ); 
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
					<?php /*?><figure class="thumb-img">
						<img src="<?php echo $post_thumbnail; ?>" alt="<?php echo $image_alt; ?>">
						<span class="featuredText">featured</span>
					</figure><?php */?>					
					<div class="thumb-img" style="background-image: url(<?php echo $post_thumbnail; ?>)"><span class="featuredText">featured</span></div>					
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
			//print_r($feature_post);
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			global $wp_query;
			$tag = $_GET['tag'];
			if(!empty($tag))
			{
				$tag = $tag;
			} else{
				$tag = "";
			}
				$args = array(
				    'post_type' => 'post',
				    'posts_per_page' => 6,
				    'post_status' => 'publish',
				    'paged' => $paged,
				    'orderby' => 'date',
				    'tag' => $tag,
				    'post__not_in' => $feature_post,
				    

				);
				$temp_query = $wp_query;
				$wp_query = null;
				$wp_query = new wp_query($args);
				//$query = new wp_query($args);
				if($wp_query->have_posts()) : 
					while($wp_query->have_posts()) : $wp_query->the_post();
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
			<div class="col-sm-6 col-md-4">
				<div class="thumb-col">
					<a href="<?php echo $permalink; ?>" class="thumb-link"></a>
					<?php /*?><figure class="thumb-img">
						<img src="<?php echo $post_thumbnail; ?>" alt="<?php echo $image_alt; ?>">						
					</figure><?php */?>
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
			?>
		</div>
		<?php
				the_posts_pagination( array(
					'mid_size' => 200,
				'prev_text'          => __( '', 'twentyfifteen' ),
				'next_text'          => __( '', 'twentyfifteen' ),
				'screen_reader_text' => __( '', 'twentyfifteen' ),
				'before_page_number' => '<span class="meta-nav">' . __( '', 'twentyfifteen' ) . ' </span>',
			) );
			endif;
			wp_reset_query();
		?>
		
	</div>
</div>



<?php
get_footer();
?>
