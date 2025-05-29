<?php
/*	$grid_class = 'grid';
	$grid_count = 0;
	global $grid_count;
	if(isset($grid_count)){
		$grid_class = $grid_class.$grid_count++;
	} else {
		$grid_class	= '';
	}*/
	global $post;
	$post_id = $post->ID;
	if(have_rows('stylesheet_blocks',$post_id)) : 
	while(have_rows('stylesheet_blocks',$post_id)) : the_row();
?>
<?php if(get_row_layout() == 'blockquote_section') : 
	$select_blockquote_type = get_sub_field('select_blockquote_type');
	$blockquote_content = get_sub_field('blockquote_content');
	$blockquote_citation = get_sub_field('blockquote_citation');
	$blockquote_image = get_sub_field('blockquote_image');
	$blockquote_class = get_sub_field('blockquote_class');
		if(empty($blockquote_image)){
            $image_class = 'text_quote';
        } else {
            $image_class = '';
        }
	if($select_blockquote_type == 'simple') {
?>
	<div class="blockquote-sec <?php echo $blockquote_class ?>">
		<div class="container">	
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<blockquote>
						<?php echo $blockquote_content; ?>
						<?php if(!empty($blockquote_citation)) : ?>
						<span>– <?php echo $blockquote_citation; ?></span>
						<?php endif; ?>
					</blockquote>
				</div>
			</div>
		</div>	
	</div>
	<?php 
	} // simple
	if($select_blockquote_type == 'top_image'){
	?>
	<div class=" <?php echo $blockquote_class ?>">
        <div class="container">
            <div class="row">              
                <div class="lightblue-bg">
                    <blockquote class="testimonial-quote <?php echo $image_class ?>">
                        <figure class="quoteImg"><img src="<?php echo $blockquote_image['url']; ?>" /></figure>
                        <?php if(!empty($blockquote_citation)) : ?>
                        <span><?php echo $blockquote_citation; ?></span>
                        <?php endif; ?>
                        <?php echo $blockquote_content; ?>  
                    </blockquote>                   
                </div>
            </div>
        </div>
	</div>
	<?php
	} // top_image
	if($select_blockquote_type == 'side_image'){
	?>
	
		<div class="container <?php echo $blockquote_class ?>">
			<div class="quote">
				<div class="row">
					<div class="col-md-7 quote-col">
						<blockquote>
							<?php echo $blockquote_content; ?>
							<?php if(!empty($blockquote_citation)) : ?>
							<span><?php echo $blockquote_citation; ?></span>
							<?php endif; ?>
						</blockquote>
					</div>
					<div class="col-md-5 hidden-sm hidden-xs quote-col">
						<div class="quote-bg" style="background-image: url(<?php echo $blockquote_image['url'] ?>);"></div>
					</div>
				</div>		
			</div>
		</div>		
	
	<?php
	} // top_image
	?>
<?php
endif;
if(get_row_layout() == 'horizantal_line') : 	
?>
<div class="container">	
	<hr>
</div>		
<?php
endif;
if(get_row_layout() == 'text_box') : 
$text_box_title = get_sub_field('text_box_title');
$text_box_content = get_sub_field('text_box_content');
$taxt_box_class = get_sub_field('taxt_box_class');
?>
<div class="text-sec <?php echo $taxt_box_class; ?>">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<?php
					/*if(!empty($text_box_title)){
						echo '<h2>'.$text_box_title.'</h2>';
					}*/
					if(!empty($text_box_content)){
						echo $text_box_content;
					}
				?>
			</div>
		</div>
	</div>	
</div>		
<?php
endif;
if(get_row_layout() == 'button_section') : 
$button_text = get_sub_field('button_text');
$button_url = get_sub_field('button_url');
$button_target = get_sub_field('button_target');
if($button_target == 1){
	$target = 'self';
} else {
	$target = '_blank';
}
?>
<div class="buttons">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
			<?php
				if(!empty($button_url)){
					echo '<a href="'.$button_url.'" title="'.$button_text.'" target='.$target.' class="btn button btn-arrow"><span>'.$button_text.'</span> <em class="arrow-right"></em></a>';
				}
			?>				
			</div>
		</div>
	</div>	
</div>		
<?php
endif;
if(get_row_layout() == 'accordion_section') : 
$accordion_title = get_sub_field('accordion_title');
	if(isset( $GLOBALS['accord_tab_count'] )) {
       $GLOBALS['accord_tab_count']++;
    }else {
       $GLOBALS['accord_tab_count'] = 0; 
    } 
    $__title = 'collapse'.$GLOBALS['accord_tab_count'];
?>
<div class="accordians block">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-md-offset-2">
				<?php
					if(!empty($accordion_title)){
						echo '<h2>'.$accordion_title.'</h2>';
					}
				?>
				<div id="accordion" class="accordion" role="tablist" aria-multiselectable="true">
					<?php
						if(have_rows('accordian_items')) :
						$count = 1; 
							while(have_rows('accordian_items')) : the_row();
							$title = get_sub_field('title');
							$content = get_sub_field('content'); 
							$state = get_sub_field('state');
							if($state == true){
								$aria_expanded = 'false';
								$in = '';
							} else {
								$aria_expanded = 'true';
								$in = 'in';
							}
					?>
						<div class="accordion-item">				    
							<h3 class="accordion-title">
								<?php if(!empty($title)) { ?>
								<a role="button" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $__title.'_'.$count; ?>" aria-expanded="<?php echo $aria_expanded; ?>" aria-controls="collapseOne">
								  <?php echo $title; ?>
								</a>
								<?php } ?>
							  </h3>	
							<?php if(!empty($content)) { ?>			   
							<div id="<?php echo $__title.'_'.$count; ?>" class="collapse <?php echo $in; ?>" role="tabpanel">
							  <div class="accordion-container">				      	
								<?php echo $content; ?>
							  </div>
							</div>
							<?php } ?>
						</div>
					<?php
							$count++;
							endwhile;
						endif;
					?>

				</div>
			</div>
		</div>
	</div>	
</div>	
<?php
endif;
if(get_row_layout() == 'tab_section') : 
$tab_title = get_sub_field('tab_title');
?>
<div class="tabs-sec block">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-md-offset-2">
				<?php
					if(!empty($tab_title)){
						echo '<h2>'.$tab_title.'</h2>';
					}
				?>
				<div class="tabsMain">
					<ul class="tabs">
						<?php
							if(have_rows('tab_item')) :
								while(have_rows('tab_item')) : the_row();
								$title = get_sub_field('title');
								$content = get_sub_field('content'); 
								
								
						?>
								<li class="tab-link">
									<?php if(!empty($title)) { ?>
									<div class="tabNav"><?php echo $title; ?></div>
									<?php } if(!empty($content)) {	?>
									<div class="tab-content">
										<?php echo $content; ?>
									</div>
									<?php } ?>
								</li>
						<?php
								endwhile;
							endif;
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>	
</div>
<?php
endif;
if(get_row_layout() == 'full_width_image') : 
$image_type = get_sub_field('image_type');
$image = get_sub_field('image');
$grid_class = get_sub_field('grid_class');
	if($image_type == 'breacks_grid') {
	?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php if(!empty($image)) { ?>
				<figure class="full-width-img">
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="responsive-img">
				</figure>
				<?php } ?>
			</div>
		</div>
	</div>
	<?php } if($image_type == 'with_in_grid') { ?>
	<div class="">
		<div class="container">		
			<div class="row image-grid-col">
				<div class="col-xs-12">
					<?php if(!empty($image)) { ?>
					<figure>
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="responsive-img">
					</figure>
					<?php } ?>
				</div>					
			</div>
		</div>	
	</div>
	<?php } if($image_type == 'grid_images') { ?>

	<div class="container <?php echo $grid_class; ?>">
		<div class="row text-col-images">
			<?php
				if(have_rows('grid_images')) :
					while(have_rows('grid_images')) : the_row();
					$grid_image = get_sub_field('grid_image');
					if(!empty($grid_image)) {
			?>
					<div class="col-sm-6">
						<img src="<?php echo $grid_image['url']; ?>" alt="<?php echo $grid_image['alt']; ?>" class="responsive-img">
					</div>
			<?php } 
					endwhile;
				endif;
			?>
		</div>
	</div>
	<?php } ?>
<?php
endif;
if(get_row_layout() == 'video_section') : 
$video_selection = get_sub_field('video_selection');
	if($video_selection == 'single'){
		$video_option = get_sub_field('video_option');
		$upload_video = get_sub_field('upload_video');
		$video_url = get_sub_field('video_url');
		if($video_option == 1){
			$url = $video_url; 
		} else {
			$url = $upload_video['url'];
		}
?>
	<div class="video-sec">
		<div class="container">	
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="video">
						<?php 
							if(!empty($url)) {
								echo '<iframe src="'.$url.'" frameborder="0" allowfullscreen></iframe>';
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } if($video_selection == 'gallery'){ ?>
	<div class="video-thumbnails-sec">	
		<div class="container">		
			<div class="row">
				<?php
				if(have_rows('video_gallery')) :
					while(have_rows('video_gallery')) : the_row();
					$grid_image = get_sub_field('grid_image');
					$gallery_video_option = get_sub_field('gallery_video_option');
					$gallery_upload_video = get_sub_field('gallery_upload_video');
					$gallery_video_url = get_sub_field('gallery_video_url');
					$gallery_video_thumbnail = get_sub_field('gallery_video_thumbnail');
					$gallery_video_time = get_sub_field('gallery_video_time');
					$gallery_video_title = get_sub_field('gallery_video_title');
					if($gallery_video_option == 1){
						$url = $gallery_video_url; 
					} else {
						$url = $gallery_upload_video['url'];
					}
				?>
				<div class="col-sm-6 col-md-4">
					<div class="thumbCol">
						<?php 
							if(!empty($url)) {
								echo '<a href="'.$url.'" class="popup-youtube video-thunb-link"></a>';
							}
						?>
						<figure>
							<div class="thumbImage">
								<?php 
									if(!empty($gallery_video_thumbnail)) {
										echo '<img src="'.$gallery_video_thumbnail["url"].'" alt="'.$gallery_video_thumbnail["alt"].'" class="responsive-img">';
										echo '<a href="#" class="playButton"><img src="'.get_template_directory_uri().'/images/play-arrow.svg" alt="playButton" /></a>';
									}
								?>
								
							</div>
							<figcaption>
								<?php 
									if(!empty($gallery_video_time)) {
										echo '<time datetime="00:00:00">'.$gallery_video_time.'</time>';
									}
									if(!empty($gallery_video_title)) {
										echo '<strong>'.$gallery_video_title.'</strong>';
									}
								?>
							</figcaption>
						</figure>
					</div>
				</div>
				<?php
					endwhile;
				endif;
				?>

			</div>
		</div>			
	</div>
	<?php } 
endif;
if(get_row_layout() == 'image_slider') :
?>
<div class="">		
	<div class="container">
		<div class="row">	
			<div class="col-md-10 col-md-offset-1">
				<div class="imageSlider" id="imgSlider">
					<?php
					if(have_rows('slider_image_repeater')) :
						while(have_rows('slider_image_repeater')) : the_row();
						$slider_image = get_sub_field('slider_image');
						$slider_content = get_sub_field('slider_content');
					?>
					<div class="slide">	
						<?php if(!empty($slider_image)) {	?>	               
						<figure>
							<img src="<?php echo $slider_image['url']; ?>" alt="<?php echo $slider_image['alt']; ?>">
							<div class="slide-count-wrap">
								<span class="current"></span> /
								<span class="total"></span>
							</div>
						</figure>
						<?php } if(!empty($slider_content)) { ?>
						<div class="slideCaption hidden-xs"><?php echo $slider_content; ?></div>
						<?php } ?>
					</div>
					<?php
						endwhile;
					endif;
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
endif;
if(get_row_layout() == 'table_section') :
	$table_shortcode = get_sub_field('table_shortcode');
?>
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="responsive-table">
			<?php 
				if(!empty($table_shortcode)) {
					echo do_shortcode($table_shortcode);
				}
			?>
			</div>
		</div>
	</div>
</div>
<?php
endif;
if(get_row_layout() == 'full_width_content_block') :	
	if(have_rows('content_block')) :
		while(have_rows('content_block')) : the_row();
			$image = get_sub_field('image');
			$sub_title = get_sub_field('sub_title');
			$title = get_sub_field('title');
			$content = get_sub_field('content');
			$link_text = get_sub_field('link_text');
			$link_url = get_sub_field('link_url');
?>
		<div class="content-block-fullwidth">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="content-block-bg clearfix" style="background-image:url(<?php echo $image['url'] ?>)">								
							<div class="content-block hidden-xs hidden-sm">
								<h2><span><?php echo $sub_title ?></span> <?php echo $title ?></h2>
								<?php echo $content ?>
								<?php 
									if(!empty($link_url)) {
										echo '<a href="'.$link_url.'" title="'.$link_text.'" class="btn button btnWhite btn-arrow"><span>'.$link_text.'</span> <em class="arrow-right"></em></a>';
									}
								?>
							</div>
						</div>
						<div class="content-block visible-xs visible-sm">
							<h2><span><?php echo $sub_title ?></span> <?php echo $title ?></h2>
							<?php echo $content ?>
							<?php 
								if(!empty($link_url)) {
									echo '<a href="'.$link_url.'" title="'.$link_text.'" class="btn button btnWhite btn-arrow"><span>'.$link_text.'</span> <em class="arrow-right"></em></a>';
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
		endwhile;
	endif;
		?>
<?php
endif;
if(get_row_layout() == 'content_block_within_grid') :	
$background_color = get_sub_field('background_color');
$main_title = get_sub_field('main_title');
$content = get_sub_field('content');
$orientation = get_sub_field('orientation');
if($orientation == 'right'){
    $counter = 1;
} else {
    $counter = 0;
}
?>
		<div class="lightblue-bg p-t-100 p-b-100" style="background-color: <?php echo $background_color; ?>">
			<div class="container">		
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<?php 
							if(!empty($main_title)) {
								echo '<h2>'.$main_title.'</h2>';
							}
							if(!empty($content)) {
								echo $content;
							}
						?>						
					</div>
				</div>
				<?php 
				if(have_rows('content_block',$post_id)) : 
				    while(have_rows('content_block',$post_id)) : the_row();
				    	$image = get_sub_field('image');
				    	$img_src = $image['url'];
				    	$title = get_sub_field('title');
				    	$content = get_sub_field('content');
				    	$link_text = get_sub_field('link_text');
				    	$link_url = get_sub_field('link_url');
					if($counter%2==0) { 
				?>
					<div class="row">			
						<div class="col-sm-8 col-sm-offset-2 col-md-12 col-md-offset-0 col-lg-10 col-lg-offset-1">
							<div class="grid-block-row">
								<div class="clearfix">
									<div class="content-grid-col">
										<div class="content-grid-image" style="background-image: url(<?php echo $img_src; ?>);"></div>
									</div>
									<div class="content-grid-col">
										<div class="grid-block-content">
											<?php 
												if(!empty($title)) {
													echo '<h3>'.$title.'</h3>';
												}
												if(!empty($content)) {
													echo $content;
												}
												if(!empty($link_url)) {
													echo '<a href="'.$link_url.'" title="'.$link_text.'" class="link">'.$link_text.'</a>';
												}
											?>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					    
					<?php } else { ?>
					 <div class="row">			
					 	<div class="col-sm-8 col-sm-offset-2 col-md-12 col-md-offset-0 col-lg-10 col-lg-offset-1">
					 		<div class="grid-block-row">
					 			<div class="clearfix">
					 				<div class="content-grid-col deskRight">
					 					<div class="content-grid-image grid-image-right" style="background-image: url(<?php echo $img_src; ?>);"></div>
					 				</div>
					 				<div class="content-grid-col">
					 					<div class="grid-block-content">
					 						<?php 
					 							if(!empty($title)) {
					 								echo '<h3>'.$title.'</h3>';
					 							}
					 							if(!empty($content)) {
					 								echo $content;
					 							}
					 							if(!empty($link_url)) {
					 								echo '<a href="'.$link_url.'" title="'.$link_text.'" class="link">'.$link_text.'</a>';
					 							}
					 						?>	
					 					</div>
					 				</div>
					 			</div>
					 		</div>
					 	</div>
					 </div>   
				<?php } $counter++;
					endwhile;
				endif;
				?>
				
			</div>
		</div>
<?php
endif;
if(get_row_layout() == 'content_image_link') :	
$title = get_sub_field('title');
?>
<div class="content-image-links">
	<div class="container">
		<?php 
			if(!empty($main_title)) {
				echo '<h2>'.$main_title.'</h2>';
			}
		?>	
		<div class="row">
			<?php
			if(have_rows('images',$post_id)) : 
			    while(have_rows('images',$post_id)) : the_row();
			    	$image = get_sub_field('image');
			    	$link_url = get_sub_field('link_url');
			    	$content = get_sub_field('content');
			    	if(!empty($image)) {
			?>
			<div class="col-sm-6 col-md-4">
				<div class="thumbCol">
					<?php 
						if(!empty($link_url)) {
							echo '<a href="'.$link_url.'" class="video-thunb-link"></a>';
						}
					?>	
					<figure>
						<div class="thumbImage">
							<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="responsive-img">							
						</div>
						<figcaption>							
							<strong><?php echo $content; ?></strong>
						</figcaption>
					</figure>
				</div>
			</div>
			<?php }
				endwhile;
			endif;
			?>
		</div>
	</div>	
</div>
<?php
endif;
if(get_row_layout() == 'content_links') :	
$title = get_sub_field('title');
?>
<div class="content-text-links">
	<div class="container">
		<?php 
			if(!empty($title)) {
				echo '<h2>'.$title.'</h2>';
			}
		?>	
		<ul class="text-links clearfix">
			<?php 
			if(have_rows('link',$post_id)) : 
			    while(have_rows('link',$post_id)) : the_row();
			    	$link_url = get_sub_field('link_url');
			    	$link_text = get_sub_field('link_text');
				if(!empty($link_url)) {
					echo '<li><a href="'.$link_url.'" title="'.$link_text.'">'.$link_text.' <em class="arrow-right"></em></a></li>';
				}
				endwhile;
			endif;
			?>	
		</ul>
	</div>
</div>
<?php
endif;
if(get_row_layout() == 'staff_cards') :	
$background_color = get_sub_field('background_color');
$title = get_sub_field('title');
?>
<div class="lightblue-bg p-t-100 p-b-55" style="background-color: <?php $background_color; ?> ">
	<div class="container">
		<div class="staff-cards">
			<?php 
				if(!empty($title)) {
					echo '<h2>'.$title.'</h2>';
				}
			?>	
			<div class="row">
				<?php
				if(have_rows('staff_card_box',$post_id)) : 
				     $count = 1;
				    while(have_rows('staff_card_box',$post_id)) : the_row();
				    	$image = get_sub_field('image');
				    	$img_src = $image['url'];
				    	$img_alt = $image['alt'];     
				    	$location = get_sub_field('location');
				    	$name = get_sub_field('name');
				    	$position = get_sub_field('position');
				    	$lightbox_link_text = get_sub_field('lightbox_link_text');
				    	$lightbox_content = get_sub_field('lightbox_content');
				?>
				<div class="col-sm-6 col-md-4">
					<div class="staff-thumb-card">
						<?php 
							if(!empty($image)) {
								echo '<img src="'.$img_src.'" alt="'.$img_alt.'" class="responsive-img">';
							}
						?>	
						<div class="card-container">
							<div class="card-caption">
								<h3 class="title"><small><?php echo $location; ?></small> <?php echo $name; ?> <span><?php echo $position; ?></span></h3>
							</div>
							<?php if(!empty($lightbox_link_text)) { ?>
							<a href="#staff-lightbox" data-index="<?php echo $count; ?>" class="btn btnWhite btn-arrow button popup-with-zoom-anim" title="<?php echo $lightbox_link_text; ?>" class="btn btnWhite btn-arrow button"><span><?php echo $lightbox_link_text; ?></span> <em class="arrow-right"></em></a>
							<?php } ?>
						</div>						
					</div>
				</div>
				<?php
					$count++;
					endwhile;
				endif;
				?>
				
			</div>
		</div>
	</div>
</div>
<?php
if(have_rows('staff_card_box',$post_id)) : 
    $total = get_post_meta($post_id,'staff_card_box',true);
    if ($total < 10) {
        $total = str_pad($total, 2, "0", STR_PAD_LEFT);
    } else {
        $total = $total;
    }
    $count = 1;
?>
 <div id="staff-lightbox" class="zoom-anim-dialog lightbox mfp-hide">
 	<?php
 	while(have_rows('staff_card_box',$post_id)) : the_row();
 	   $image = get_sub_field('image');
 	   $img_src = $image['url'];
 	   $img_alt = $image['alt'];     
 	   $location = get_sub_field('location');
 	   $name = get_sub_field('name');
 	   $position = get_sub_field('position');
 	   $lightbox_link_text = get_sub_field('lightbox_link_text');
 	   $lightbox_content = get_sub_field('lightbox_content');
 	   ?>

	<div class="slide">
		<div class="light-box-pagination">
		    <?php //echo '<span>'.str_pad($count, 2, "0", STR_PAD_LEFT).' / '. $total.'</span> '.$staff_card_name; ?>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<?php 
						if(!empty($image)) {
							echo '<img src="'.$img_src.'" alt="'.$img_alt.'" class="staff-img">';
						}
					?>	
				</div>
				<div class="col-md-7">
					<div class="person-content">
						<span class="location"><?php echo $location; ?></span>
						<h2> <?php echo $name; ?> <span><?php echo $location; ?></span></h2>
						<?php echo $lightbox_content; ?>
					</div>
				</div>
			</div>
		</div>	
	</div>
	<?php endwhile; ?>			
</div> 
<?php
endif; // staff_card_box
endif; // staff_cards layout
endwhile;
endif;