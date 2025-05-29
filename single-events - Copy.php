<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();
			$id = get_the_id();
			//$one_day_event = get_field('one_day_event',$id);
			//if($one_day_event == 'yes'){
				$today = date('Ymd');
				$event_day = '1';
				$event_date = get_field('event_date',$id,false,false);
				$event_date = new DateTime($event_date);
				$datetime = $event_date->format('Y-m-d');
				$month = $event_date->format('F');
				$year = $event_date->format('y');
				//$date = $month." ".$year;
				$date = $event_date->format('dS F, y');
				$day = 'Day';
				$another_time = '';
				$start_time = get_field('start_time',$id);
				$end_time = get_field('end_time',$id);
				$start_time_string = date('h:i a', strtotime($start_time));
				$end_time_string = date('h:i a', strtotime($end_time));
				if(!empty($start_time)){
					$start_time_string = $start_time_string;
				} else {
					$start_time_string = '';
				}
				if(!empty($end_time)){
					$end_time_string = " - ".$end_time_string;
				} else {
					$end_time_string = '';
				}
				$time = $start_time_string.$end_time_string;
				$location = get_field('location',$id);
				$cost = get_field('cost',$id);
				$organizer = get_field('organizer',$id);
				$phone_number = get_field('phone_number',$id);
				$email_id = get_field('email_id',$id);
				$share_with_friends = get_field('share_with_friends',$id);
				$google_map = get_field('google_map',$id);
				$full_date = $event_date->format('F d, Y');
				if(strtotime($today) <= strtotime($event_date->format('Ymd'))){
					$register_now_url = get_field('register_now_url',$id);
					$register_now_text = get_field('register_now_text',$id);
					$register_now_button_option = get_field('register_now_button_option',$id);
				} else {
					$event_passed_text = "This Event Has Passed";
				}
				$location_title = get_field('location_title',$id);
				$location_address = get_field('location_address',$id);
				$location_phone_number = get_field('location_phone_number',$id);
				$google_map = get_field('google_map',$id);
				$blank = $register_now_button_option[0];
				if(!empty($blank)){
					$target = "_blank";
				}
				$size = "event-single";
				$post_thumbnail = get_the_post_thumbnail_url(get_the_id(), $size);
				$thumb_id = get_post_thumbnail_id(get_the_id());
				$image_alt = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true);

			/*} else {
				$start_date = get_field('start_date',$id,false,false);
				$end_date = get_field('end_date',$id,false,false);
				$start_time = get_field('start_time',$id);
				$end_time = get_field('end_time',$id);
				$location = get_field('location',$id);
				$diff = abs(strtotime($end_date) - strtotime($start_date));
				$years = floor($diff / (365*60*60*24));
				$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
				$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
				if($months>0){
					$months = $months.' Month ';
				}
				$event_day = $months.$days;
				$start_date = new DateTime($start_date);
				$end_date = new DateTime($end_date);
				$start_month = $start_date->format('F');
				$end_month = $end_date->format('F');
				if($start_month == $end_month){
					$date = $start_date->format('j'). ' - '. $end_date->format('j');
					$month = $start_month;
					$another_time = '';
				} else {
					$date = $start_date->format('j');
					$month = $start_month;
					$next_date = $end_date->format('j');
					$next_month = $end_month;
					$another_time = ' - <time><span>'.$next_date.'</span> '.$next_month.'</time>';
				}
				$day = 'Days';
			}*/
			$datetime = get_the_date();
			//$date = get_the_date();
			//$month = get_the_date();
			$title = get_the_title();
			$permalink = get_the_permalink();
			$content = apply_filters('the_content',get_the_content());

			?>
			<div class="event-detail">
				<div class="hero-banner">
					<div class="container">
						<div class="row">
							<div class="col-md-8 col-lg-7">
								<h1 class="title"><span><?php echo $full_date; ?></span> <?php echo $title; ?></h1>				 
							</div>		
						</div>
					</div>
				</div>
			</div>
			<div class="container-lg event-detail-col">	
				<div class="container">
					<div class="event-detail-inner">
							
						<div class="eventCTA">
							<div class="row">
								<?php if(!empty($register_now_text)) : 
									$claas = " col-sm-6 col-md-4 col-md-offset-1 col-lg-3 col-lg-offset-2";
								?>
									<div class="col-xs-6 col-sm-6 col-md-7 col-lg-7">
										<div class="regBtn">
										<a href="<?php echo $register_now_url; ?>" title="<?php echo $register_now_text; ?>" target="<?php echo $target; ?>" class="btn button btn-arrow"><span><?php echo $register_now_text; ?></span> <em class="arrow-right"></em></a>
										</div>
										
										<?php echo $event_passed_text; ?>
									</div>
								<?php else :
								$claas = ' col-xs-12';
									endif; ?>
									<?php  if(!empty($event_passed_text)) : ?>
								<div class="col-xs-6 col-sm-6 col-md-7 col-lg-7">
									<?php echo $event_passed_text; ?>
								</div>
									<?php endif; ?>
								
								<?php
									if(!empty($event_date->format('Ymd'))){
										$google_date = $event_date->format('Ymd');
									}
									//$gogo_time = strtotime($start_time);
									//echo $gogo_time = date('h:i:s', strtotime($start_time));
									//$datetime = $event_date->format('Y-m-d');
									//echo $start_time;
									$start_time1 = get_field('start_time',$id);
									$end_time1 = get_field('end_time',$id);
									//$google_start_time = date('his', strtotime($start_time1));
									//echo $google_start_time;
									//$google_start_time = '';
									//$google_end_time = date('his', strtotime($end_time1));
									//$google_end_time = '';
									//$google_start_time = start_time new Date()).toISOString().replace(/-|:|\.\d\d\d/g,"");
									$google_string = 'TEMPLATE&text='.$title.'&dates='.$google_date.'T'.$start_time1.'/'.$google_date.'T'.$end_time1.'&details=&location='.$location;
									$today = date('Ymd');

									if(strtotime($google_date)>strtotime($today)) :
								?>
										<div class="<?php echo $claas; ?>">
											<a href="http://www.google.com/calendar/event?action=<?php echo $google_string; ?>" target="_blank" title="Add to Google Calendar" class="calendarBtn"><!--<img src="<?php //echo get_template_directory_uri(); ?>/images/calendar-icon-sm.svg" alt="">--> <em class=""></em> Add to Google Calendar</a>
										</div> 
									<?php endif; ?>
							</div>
						</div>
						<hr>
						<div class="event-middel">
							<div class="row">
								<?php if(!empty($date) || !empty($time) || !empty($location) || !empty($cost) || !empty($organizer) || !empty($phone_number) || !empty($email_id)) : ?>
								<div class="col-md-4 col-md-offset-1 col-lg-3 col-lg-offset-2 deskRight">
									<h6>details</h6>
									<ul class="event-detail-list">
									
										<?php if(!empty($date)) { ?>
										<li><span class="label-title">Date</span> <time datetime="<?php echo $datetime; ?>"><?php echo $date; ?></time></li>
										<?php } if(!empty($start_time) || !empty($end_time)) { ?>
										<li><span class="label-title">time</span> <time datetime=""><?php echo $time; ?></time></li>
										<?php } if(!empty($location)) { ?>
										<li><span class="label-title">location</span> <?php echo $location; ?></li>
										<?php } if(!empty($cost)) { ?>
										<li><span class="label-title">cost</span> <?php echo $cost; ?></li>
										<?php } if(!empty($organizer)) { ?>
										<li><span class="label-title">organizer</span> <?php echo $organizer; ?></li>
										<?php } if(!empty($phone_number)) { ?>
										<li><span class="label-title">phone</span> <a href="tel:<?php echo preg_replace('/\D+/', '', $phone_number); ?>"><?php echo $phone_number; ?></a></li>
										<?php } if(!empty($email_id)) { ?>
										<li><span class="label-title">email</span> <a href="mailto:<?php echo $email_id; ?>"><?php echo $email_id; ?></a></li>
										<?php } ?>
									</ul>				
									<h6>share with friends</h6>
									<!-- <ul class="social-icons">
										<li><a href="#" title="Facebook"><em class="fa fa-facebook"></em></a></li>
										<li><a href="#" title="Facebook"><em class="fa fa-twitter"></em></a></li>
										<li><a href="#" title="Pinterest"><em class="fa fa-pinterest"></em></a></li>
										<li><a href="#" title="Tumblr"><em class="fa fa-tumblr"></em></a></li>					
									</ul> -->
									<?php echo wpfai_social(); ?>
									
									<div class="">
										<?php if(!empty($register_now_text)) : ?>
										<a href="<?php echo $register_now_url; ?>" title="<?php echo $register_now_text; ?>" target="<?php echo $target; ?>" class="btn button btn-arrow"><span><?php echo $register_now_text; ?></span> <em class="arrow-right"></em></a>
										<?php endif; ?>
									</div>
									
								</div>
								<?php endif; ?>
								<div class="col-md-7 col-lg-7">
									<h6>description</h6>
									<?php echo $content; ?>
									<?php
									if(!empty($post_thumbnail)) { 
									?>
									<img src="<?php echo $post_thumbnail ?>" alt="<?php echo $image_alt ?>" class="responsive-img"> 
									<?php
									} else {
										$return  = '<div class="row">';
										$return .= '<div class="col-md-12">';
										$return .= '<div class="imageSlider" id="imgSlider">';
										if(have_rows('image_slider',$post_id)) : 
										    while(have_rows('image_slider',$post_id)) : the_row();
										        $slider_image = get_sub_field('slider_image');
										        $img_id = $slider_image['id'];
										        $size = "event-single";
										        $image = wp_get_attachment_image_src( $img_id, $size );
										        $img_src = $image[0];
										        $img_alt = get_post_meta($img_id,'_wp_attachment_image_alt',true);
										        $image_slider_content = get_sub_field('image_slider_content');
										        $return .= '<div class="slide">
										        				<figure>
										                        	<img src="'.$img_src.'" alt="'.$img_alt.'">
											                       <div class="slide-count-wrap">
											                            <span class="current"></span> /
											                            <span class="total"></span>
											                        </div>
											                    </figure>
										                        <div class="slideCaption hidden-xs">'.$image_slider_content.'</div>
										                    </div>';
										    endwhile;
										endif;
										$return .= '</div>';
										$return .= '</div>';
										$return .= '</div>';
										echo $return;
									}
									?>
								</div>			
							</div>
						</div>
						
					</div>

					<!-- LOCATION AND MAP -->
					<?php if(!empty($google_map) || !empty($location_title) || !empty($location_address) || !empty($location_phone_number)) : ?>
					<div class="map">
						<div class="row">
							<div class="col-md-7">
								<div id="map">
									<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3060597.7863640105!2d-87.33576428561133!3d41.48552582770862!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259ad1fd4623f%3A0x3a5100cd2a748d34!2sYoung+Judaea+Global!5e0!3m2!1sen!2sin!4v1512196597114" frameborder="0" style="border:0" allowfullscreen></iframe> -->
									<div class="acf-map">
										<div class="marker" data-lat="<?php echo $google_map['lat']; ?>" data-lng="<?php echo $google_map['lng']; ?>"></div>

									</div>
								</div>
							</div>
							<?php //var_dump($google_map); ?>
							<div class="col-md-5">
								<div class="location-col">
									<h6>venue & contact info</h6>
									<address>
										<strong><?php echo $location_title; ?></strong>						
										<span><?php echo $location_address; ?></span>
										<span><a href="tel:<?php echo preg_replace('/\D+/', '', $location_phone_number); ?>"><?php echo $location_phone_number; ?></a></span>
									</address>
								</div>
							</div>
						</div>
					</div>
					<?php endif; ?>
					<?php
					$events_page_id = get_page_by_path( 'events' );
					$events_page_id = $events_page_id->ID;
					//var_dump($events_page_id);
					echo '<div class="blog-bottom-row">';
					echo '<a href="' . get_permalink($events_page_id) . '" class="nextPrevLink prev-to-blog">Back To Events</a>';
					if( get_adjacent_post(false, '', false) ) { 
						next_post_link('%link', 'Next Event');
					} else { 
						$last = new WP_Query('posts_per_page=1&order=ASC&post_type=events'); $last->the_post();
							echo '<a href="' . get_permalink() . '" class="nextPrevLink next-to-blog">Next Event</a>';
						wp_reset_query();
					}; 
					echo '</div>';
					?>
				</div>
			</div>
			<?php
			
		endwhile;
		?>
<?php get_footer(); ?>
