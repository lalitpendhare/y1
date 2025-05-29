<?php
	global $post;
	$post_id = $post->ID;
	if(have_rows('flexible_content',$post_id)) : 
	while(have_rows('flexible_content',$post_id)) : the_row();
?>
<?php if(get_row_layout() == 'find_the_right_program_section') : 
	$right_program_section_small_title = get_sub_field('right_program_section_small_title');
	$right_program_section_big_title = get_sub_field('right_program_section_big_title');
?>
<!-- // FIND YOUR PROGRAM -->
<div class="container-lg">	
<div class="find-your-program">
   <div class="container-area">
        <div class="row">
            <div class="col-sm-12 col-md-3">
            	<?php 
            	if(!empty($right_program_section_big_title) || !empty($right_program_section_small_title)) :
            		echo '<h3 class="title"><span>'.$right_program_section_small_title.'</span> '.$right_program_section_big_title.'</h3>';
            	endif;
            	?>
                
            </div>
            <div class="col-sm-12 col-md-9">
				<div class="select_intabs">
            	<div class="selectMenu">
				    <select class="custom-select selectpicker categoryBox" title="Age" data-width="100%">
					  	<option data-hidden="true"></option>
					  	<?php
					  	$taxonomy = 'program-cat';
					  	$terms = get_terms($taxonomy,'orderby=id');
					  	if($terms && !is_wp_error( $terms )){
					  		foreach ( $terms as $term ){
						  		$option = '<option value="'.$term->term_id.'" id="'.$term->term_id.'">';
						  		$option .= $term->name;
						  		$option .= '</option>';
						  		echo $option;
					  		}
					  	}
					  	?>
					</select>
				</div>
				<div class="selectMenu program-box-wrapper">
	                <select class="custom-select selectpicker program-box" title="Programs" disabled="true" data-width="100%">
	                	<option data-hidden="true"></option>
					</select>	
				</div>
				</div>
				<div class="view-program-wrapper">
				    <a title="View Program" class="btn btn-block view-btn disabled">View Program</a>
				</div>  
            </div>                 
        </div>
   </div>
</div>
</div>
<?php 
endif;
if(get_row_layout() == 'who_we_are_section') : 
	$background_image_text = get_sub_field('who_we_are_section_background_image_text');
	$bg_img_url = $background_image_text['url'];
	$bg_img_alt = $background_image_text['alt'];
	$title = get_sub_field('who_we_are_section_title');
	$sub_title = get_sub_field('who_we_are_section_sub_title');
	$who_image = get_sub_field('who_we_are_section_image');
	$img_id = $who_image['id'];
	//$size = "who-we-are-section";
	$size = "full";
	$image = wp_get_attachment_image_src( $img_id, $size );
	$img_url = $image[0];
	$img_alt = get_post_meta($img_id,'_wp_attachment_image_alt',true);
	$content = get_sub_field('who_we_are_section_content');
	$link_text = get_sub_field('who_we_are_section_link_text');
	$link_url = get_sub_field('who_we_are_section_link_url');
?>
<!-- // WHO WE ARE -->
<div class="container-lg">	
	<div class="row rowCol m-b-50 p-t-0">			
		<div class="col-md-6 equalHeight deskRight">
			<?php if(!empty($bg_img_url)) : ?>
			<div class="col-img"><img src="<?php echo $img_url; ?>" alt="<?php echo $img_alt; ?>" class="responsive-img"></div>
			<?php endif; ?>			
		</div>
		<div class="col-md-6 equalHeight about-watermark" style="background: url(<?php echo $bg_img_url; ?>) no-repeat 0 bottom">
		<?php if(!empty($title) || !empty($sub_title) || !empty($content) || !empty($link_text)) : ?>			
			<div class="dis-tb">
				<div class="tb-cell">
					<div class="content-caption">
						<h2 class="title"><span><em><?php echo $sub_title; ?></em></span><?php echo $title; ?></h2>					
						<?php echo $content; ?>				
						<a href="<?php echo $link_url; ?>" title="<?php echo $link_text; ?>" class="link"><span><?php echo $link_text; ?></span></a>				
					</div>
				</div>
			</div>
		<?php endif; ?>
		</div>				
	</div>
</div>
<?php 
endif;
if(get_row_layout() == 'what_we_offer_section') : 
	$what_we_offer_title = get_sub_field('what_we_offer_title');
	$what_we_offer_sub_title = get_sub_field('what_we_offer_sub_title');
	$what_we_offer_content = get_sub_field('what_we_offer_content');
	$program_image = get_sub_field('program_image');
?>
<!-- // WHAT WE OFFER -->
<div class="container-lg">
	<div class="row rowCol m-b-70 p-t-70">
	<?php if(have_rows('what_we_offer_image_slider')) : ?>			
		<div class="col-md-6 equalHeight">
			<div id="imgSlider">				
				<?php
					while(have_rows('what_we_offer_image_slider')) : the_row();
						/*$image = get_sub_field('what_we_offer_image_slider_image');
						$img_src = $image['url'];
						$img_alt = $image['alt'];*/

						$what_we_image = get_sub_field('what_we_offer_image_slider_image');
						$img_id = $what_we_image['id'];
						//$size = "what-we-offer";
						$size = "full";
						$image = wp_get_attachment_image_src( $img_id, $size );
						$img_src = $image[0];
						$img_alt = get_post_meta($img_id,'_wp_attachment_image_alt',true);
						$what_we_offer_image_slider_title = get_sub_field('what_we_offer_image_slider_title');
				?>
					<div class="slide">			      
						<img src="<?php echo $img_src; ?>" alt="<?php echo $img_alt; ?>">					
						<div class="slide-count-wrap">
							<span class="current"></span> /
							<span class="total"></span>
							<h5><?php echo $what_we_offer_image_slider_title; ?></h5>
						</div>
				    </div>					
				<?php endwhile; ?>				
	        </div>
			<div class="slider-progress">
				<div class="progress"></div>
			</div>
		</div>
	<?php endif; ?>
		<div class="col-md-6 equalHeight programs-watermark" style="background-image: url(<?php echo $program_image ?>)">			
			<div class="content-caption">
				<h2 class="title"><span><em><?php echo $what_we_offer_sub_title; ?></em></span><?php echo $what_we_offer_title; ?></h2>				
				<?php echo $what_we_offer_content; ?>
				<?php if(have_rows('what_we_offer_links')) : ?>				
				<ul class="text-links">
					<?php
						while(have_rows('what_we_offer_links')) : the_row();
							$what_we_offer_links_link_text = get_sub_field('what_we_offer_links_link_text');
							$what_we_offer_links_link_url = get_sub_field('what_we_offer_links_link_url');
					?>
					<li><a href="<?php echo $what_we_offer_links_link_url; ?>" title="<?php echo $what_we_offer_links_link_text; ?>"><?php echo $what_we_offer_links_link_text; ?> <em class="arrow-right"></em></a></li>
					<?php endwhile; ?>
				</ul>
				<?php endif; ?>					
			</div>				
		</div>
	</div>
</div>
<?php 
endif;
if(get_row_layout() == 'content_boxes_section') : 
	$background_image = get_sub_field('background_image');
	$bg_img = $background_image['url'];
	$background_image_text = get_sub_field('background_image_text');
	$bg_img_txt_url = $background_image_text['url'];
	$bg_img_txt_alt = $background_image_text['alt'];
?>
<!-- CTA CONTENT BOXES -->
<div class="container-lg content-boxes-sec">
	<div class="content-boxes" style="background-image: url(<?php echo $bg_img ?>);">
		<?php if(have_rows('content_box_repeater')) : ?>	
		<div class="container">
			<div class="content-box-row">
				<div class="row">
					<?php
						while(have_rows('content_box_repeater')) : the_row();
							$content_image = get_sub_field('content_box_repeater_image');
							$img_id = $content_image['id'];
							//$size = "content-box-section";
							$size = "full";
							$image = wp_get_attachment_image_src( $img_id, $size );
							$img_url = $image[0];
							$img_alt = get_post_meta($img_id,'_wp_attachment_image_alt',true);
							$title = get_sub_field('content_box_repeater_title');
							$content = get_sub_field('content_box_repeater_content');
							$link_text = get_sub_field('content_box_repeater_link_text');
							$link_url = get_sub_field('content_box_repeater_link_url');
					?>
					<div class="col-md-6">
						<div class="content-box-bg" style="background-image: url(<?php echo $img_url ?>);">							
							<div class="content-box">
								<h3 class="title"><?php echo $title ?></h3>
								<?php echo $content ?>
								<a href="<?php echo $link_url ?>" title="<?php echo $link_text ?>" class="btn btn-arrow button"><span><?php echo $link_text ?></span> <em class="arrow-right"></em></a>
							</div>
						</div>
					</div>
					<?php endwhile; ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<img src="<?php echo $bg_img_txt_url ?>" alt="<?php echo $bg_img_txt_alt ?>" class="community-watermark">
	</div>
</div>
<?php 
endif;
if(get_row_layout() == 'events_and_blog_section') : 
	$events_and_blog_section_sub_title = get_sub_field('events_and_blog_section_sub_title');
	$events_and_blog_section_title = get_sub_field('events_and_blog_section_title');
	$blog_page_id = get_option( 'page_for_posts' );
	$blog_page = esc_url(get_permalink($blog_page_id));
?>
<!-- EVENTS & BLOG -->
<div class="events-blog">
	<div class="container">
		<?php 
			if(!empty($events_and_blog_section_sub_title) || !empty($events_and_blog_section_title)){
				echo '<div class="titleBar clearfix">
						<h2 class="title"><span>'.$events_and_blog_section_sub_title.'</span> '.$events_and_blog_section_title.'</h2>
						<div class="hidden-xs hidden-sm">
							<a href="'.$blog_page.'" title="View More Blog Posts" class="link"><span>View More Blog Posts</span></a>
						</div>
					</div>';
			}
		?>
		<div class="row">
			<?php			
				$today = date('Ymd');
				$args = array (
				    'post_type' => 'events',
				    'posts_per_page' => 4,
				    'meta_query' => array(
				    	'relation' => 'OR',
						array(
					        'key'		=> 'event_date',
					        'compare'	=> '>=',
					        'value'		=> $today,
					    ),
					    /*array(
							'key' => 'start_date',
							'compare' => '>=',
							'value' => $today,
						),*/
				    ),
				    'orderby' => 'meta_value',
        			'order' => 'ASC',
				);
				
				$query = new wp_query($args);
				if($query->have_posts()) : 
			?>
			<div class="col-md-4">
				<div class="event-blog-list">
					<ul class="clearfix">
						<?php 
						while($query->have_posts()) : $query->the_post();
						
							$id = get_the_id();
							$one_day_event = get_field('one_day_event',$id);
							if($one_day_event == 'yes'){
								$event_day = '1';
								$event_date = get_field('event_date',$id,false,false);
								$event_date = new DateTime($event_date);
								$date = $event_date->format('j');
								$month = $event_date->format('M');
								$day = 'Day';
								$another_time = '';

							} else {
								$event_date = get_field('event_date',$id,false,false);
								$end_date = get_field('end_date',$id,false,false);
								$diff = abs(strtotime($end_date) - strtotime($event_date));
								$years = floor($diff / (365*60*60*24));
								$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
								$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
								if($months>0){
									$months = $months.' Month ';
								}
								//$event_day = $months.$days;
								$event_day = $days+1;
								$event_date = new DateTime($event_date);
								$end_date = new DateTime($end_date);
								$start_month = $event_date->format('M');
								$end_month = $end_date->format('M');
								if($start_month == $end_month){
									//$date = $event_date->format('j'). ' - '. $end_date->format('j');
									$date = $event_date->format('j');
									$month = $start_month;
									$another_time = '';
								} else {
									$date = $event_date->format('j');
									$month = $start_month;
									$next_date = $end_date->format('j');
									$next_month = $end_month;
									$another_time = ' - <time><span>'.$next_date.'</span> '.$next_month.'</time>';
								}
								$day = 'Days';
							}
							//$day = 'Day';
							$datetime = get_the_date();
							//$date = get_the_date();
							//$month = get_the_date();
							$title = get_the_title();
							$permalink = get_the_permalink();
							//$event_day;
							echo '<li>
									<a href="'.$permalink.'">
									<time datetime ="'.$event_date->format('Y-m-d').'"><span>'.$date.'</span> '.$month.'</time>'.$another_time.'
									<div>
										<h4>'.$title.' <i>'.$event_day.' '.$day.' Event</i></h4>
									</div>
									</a>
								</li>';
							endwhile;
						?>
					</ul>
					<?php $page_id = esc_url(get_permalink(get_page_by_title( 'Events' ))) ?>
					<div class="hidden-xs hidden-sm"><a href="<?php echo $page_id; ?>" title="View More Events" class="btn button btn-block btn-lg"><img src="<?php echo get_template_directory_uri(); ?>/images/calendar-icon.svg" alt=""> <span>View More Events</span></a></div>
					<div class="visible-xs visible-sm"><a href="<?php echo $page_id; ?>" title="View More Events" class="link">View More Events</a></div>
				</div>
			</div>
			<?php
			endif; // events
			wp_reset_query();
				$args = array(
					'post_type' => 'post',
					'order' => 'ASC',
					'posts_per_page' => 3,
					'category_name' => 'zionist-history,alumni,year-course',
				);
				$query = new wp_query($args);
				if($query->have_posts()) : 
					$count = 1
			?>
			<div class="col-md-8">
				<?php 
					//echo '<div class="row">';
					while($query->have_posts()) : $query->the_post();
						$blog_post_id = get_the_id();
						$thumb_id = get_post_thumbnail_id($blog_post_id);
						$post_thumbnail = get_the_post_thumbnail_url($blog_post_id);
						$post_thumbnail_alt = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true);
						$posttags = get_the_tags();
						$tag_name = array();
						if ($posttags) {
						  foreach($posttags as $tag) {
						    $tag_name[] = $tag->name; 
						  }
						}
						$tag = implode(', ', $tag_name);
						$title = get_the_title();
						$author = get_the_author();
						$date = get_the_date('M j, Y');
						$datetime = get_the_date('Y-m-d');
						$content = limited_string(get_the_excerpt(),80);
						$permalink = get_the_permalink();
						$event_day;
						if($count%3!=0){
							if($count%3==1){
								$row_open = '<div class="row equal">';
								$row_close = '';
							} 
							if($count%3==2){
								$row_open = '';
								$row_close = '</div>';
							}
							echo $row_open;
							echo '<div class="col-sm-6">
									<div class="thumb-col">
										<a href="'.$permalink.'" class="thumb-link"></a>
										<div class="thumb-img" style="background-image: url('.$post_thumbnail.')"></div>										
										<div class="thumb-container">
											<h3><span>'.$tag.'</span> '.$title.'</h3>
											<p>'.$content.'</p>
											<div class="thumb-footer">
												<span title="By '.$author.'">By '.$author.'</span>
												<time datetime="'.$datetime.'">'.$date.'</time>
											</div>
										</div>
									</div>
								</div>';
							echo $row_close;
						} else {
							
							echo '<div class="row">
									<div class="col-sm-12">
										<div class="thumb-col thumb-col-row">							
											<a href="'.$permalink.'" class="thumb-link"></a>
											<div class="row">
												<div class="col-sm-6">
													<div class="thumb-img thumb-left-img" style="background-image: url('.$post_thumbnail.')"></div>												
												</div>
												<div class="col-sm-6">
													<div class="thumb-container">
														<h3><span>'.$tag.'</span> '.$title.'</h3>
														<p>'.$content.'</p>
														<div class="thumb-footer">
															<span title="By '.$author.'">By '.$author.'</span>
															<time datetime="'.$datetime.'">'.$date.'</time>
														</div>
													</div>
												</div>
											</div>							
										</div>
									</div>
								</div>';
						}
								$count++;
					endwhile;
					//echo '</div>';
					echo '<div class="visible-xs visible-sm col-md-12">
							<a href="'.$blog_page.'" title="View More Blog Posts" class="link"><span>View More Blog Posts</span></a>
						 </div>';
				?>
			</div>
		<?php endif; // blog 
			wp_reset_query();
		?>
		</div>
	</div>
</div>
<?php
endif;
endwhile;
endif;