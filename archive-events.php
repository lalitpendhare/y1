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
<div class="hero-banner">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-9 col-md-7">
				<h1><span>the latest</span> Young Judaea Events</h1>
				<!-- FILTERS -->
				<div class="filters-data">
					<div class="selectMenu">
						
						<form method="get" id="form1">
							<?php //echo $_POST["event-category"]; ?>
							<?php if(!empty($_GET['events_type'])) : ?>
							<input type="hidden" name="events_type" value="<?php echo $_GET['events_type']; ?>">
							<?php endif; ?>
			            <select class="selectpicker" title="Choose" id="event-category" name="event-category" data-width="100%">
						 <?php
						  	$taxonomy = 'event-cat';
						  	$option =  '<option value="event_type">EVENT TYPE</option>';
						  	$terms = get_terms($taxonomy);

						  	if($terms && !is_wp_error( $terms )){
						  		foreach ( $terms as $term ){
						  			if($_GET["event-category"] == $term->name){
						  				echo $selected = "selected";
						  			} else {
						  				echo $selected = "";
						  			}
						  			
							  		$option .= '<option value="'.$term->name.'" id="'.$term->term_id.'" '.$selected.'>';
							  		$option .= $term->name;
							  		$option .= '</option>';
							  		
						  		}
						  		echo $option;
						  	}
					  	?>
						</select>
						</form>
						<?php
							 //$_POST['event-category']."hello";

						?>

					</div>            
			    	<div class="selectMenu">
			    		<form method="get" id="form2">
			    			<?php if(!empty($_GET['event-category'])) : ?>
			    			<input type="hidden" name="event-category" value="<?php echo $_GET['event-category']; ?>">
			    			<?php endif; ?>
			            <select class="selectpicker" name="events_type" id="events" title="age" data-width="100%">
			            	<?php
			            		if($_GET["events_type"] == "upcoming_events"){
			            			echo $selected = "selected";
			            		} else {
			            			echo $selected = "";
			            		}
			            		if($_GET["events_type"] == "past_events"){
			            			echo $selected = "selected";
			            		} else {
			            			echo $selected = "";
			            		}
			            	?>
			            	
						   	<option value="upcoming_events" <?php echo $selected; ?> >Upcoming Events</option>
						  	<option value ="past_events" <?php echo $selected; ?> >Past Events</option>
						</select>
						</form>
						
					</div>

				</div>
				
				<!-- <div class="visible-xs">
					<div class="selectMenu filterMenu">
			            <select class="selectpicker" title="Filter" data-width="100%">
						  <option>Filter</option>
						  <option>Filter</option>
						  <option>Filter</option>
						</select>	
					</div>
				</div> -->
				  
			</div>		
		</div>
	</div>
</div>
<input type="hidden" name="event-cat" value="<?php echo $_GET['event-category']; ?>">
<input type="hidden" name="event-cat" value="<?php echo $_GET['events_type']; ?>">
<?php 
//echo $_GET['event-category'];
	global $wp_query;
	$today = date('Ymd');
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

	$cat_id = $_GET['event-category'];
	//echo $cat_id;
	if(!empty($cat_id) && $cat_id != "event_type"){
		$tax_query = array(
        array(
            'taxonomy' => 'event-cat',
            'field'    => 'name',
            'terms'    => $cat_id,
        ));
	} else {
		$tax_query = "";
	}
//echo $_GET['events1'];
	if($_GET['events_type'] == 'past_events'){
		$meta_query = array(
			array(
		        'key'		=> 'event_date',
		        'compare'	=> '<',
		        'value'		=> $today,
		    ),
	    );
	} else {
		$meta_query = array(
			array(
		        'key'		=> 'event_date',
		        'compare'	=> '>=',
		        'value'		=> $today,
		    ),
	    );
	}
	$args = array (
	    'post_type' => 'events',
	    'posts_per_page' => 5,
	    'paged' => $paged,
	    'tax_query' => $tax_query,
	    'meta_query' => $meta_query,
	    'orderby' => 'meta_value',
        'order' => 'ASC',
	);
	$temp_query = $wp_query;
	$wp_query = null;
	$wp_query = new wp_query($args);
	//query_posts($args);
if ( have_posts() ) : ?>
<div class="container">
	<ul class="event-list past-event">
		<?php 
		while ( have_posts() ) : the_post(); 
			$id = get_the_id();
			$one_day_event = get_field('one_day_event',$id);
			if($one_day_event == 'yes'){
				$event_day = '1';
				$event_date = get_field('event_date',$id,false,false);
				$event_date = new DateTime($event_date);
				$date = $event_date->format('j');
				$month = $event_date->format('F');
				$mobile_month = $event_date->format('M');
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
				$event_day = $days+1;
				$event_date = new DateTime($event_date);
				$end_date = new DateTime($end_date);
				$start_month = $event_date->format('F');
				$end_month = $end_date->format('F');
				$mobile_month = $event_date->format('M');
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

			$start_time = get_field('start_time',$id);
			$end_time = get_field('end_time',$id);
			$start_time_string = date('h:i a', strtotime($start_time));
			$end_time_string = date('h:i a', strtotime($end_time));
			$time = $start_time_string." - ".$end_time_string;
			$location = get_field('location',$id);
			$datetime = get_the_date();
			//$date = get_the_date();
			//$month = get_the_date();
			$title = get_the_title();
			$permalink = get_the_permalink();
			$content = get_the_excerpt();
		?>
		<li>
			<?php if(strtotime($today) <= strtotime($event_date->format('Ymd'))) { ?>			
			<div class="event-left-col">
				<time datetime="<?php echo $event_date->format('Y-m-d'); ?>"><span><?php echo $date; ?></span> <small class="mobile"><?php echo $mobile_month; ?></small><small class="desctop"><?php echo $month; ?></small></time>
				<i><?php echo $event_day. " ".$day. " Event" ; ?></i>
			</div>
			<?php } else { ?>
			<div class="event-left-col past-event">
				<time datetime="<?php echo $event_date->format('Y-m-d'); ?>"><span><?php echo $date; ?></span> <small class="mobile"><?php echo $mobile_month; ?></small><small class="desctop"><?php echo $month; ?></small></small></time>					
			</div>
			<?php } ?>		
			<div class="event-wide-col">
				<div class="row">
					<div class="col-md-9">
						<h3><?php echo $title; ?></h3>
						<p><?php echo $content; ?></p>
						<div class="hidden-md"><a href="<?php echo $permalink; ?>" title="More Info" class="more-link"> More Info</a></div>
					</div>
					<?php if(!empty($time) || !empty($location)) : ?>
					<div class="col-md-3">
						<ul class="event-detail-list">
						<?php if(!empty($start_time) || !empty($end_time)) { ?>								
							<li><span class="label-title">time</span> <time datetime="<?php echo date('h:i', strtotime($start_time)).":".date('h:i', strtotime($end_time)) ?>"><?php echo $time; ?></time></li>
						<?php } if(!empty($location)) { ?>
							<li><span class="label-title">location</span> <?php echo $location; ?></li>
						<?php } ?>
						</ul>
					</div>
					<?php endif; ?>
				</div>
				<div class="visible-md"><a href="<?php echo $permalink; ?>" title="More Info" class="more-link">More Info</a></div>
			</div>			
		</li>
		<?php 
		endwhile; 
		/*$big = 999999999; // need an unlikely integer
    	     echo paginate_links( array(
    	        'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
    	        'format' => '?paged=%#%',
    	        'current' => max( 1, get_query_var('paged') ),
    	        'total' => $the_query->max_num_pages
    	    ) );*/
		
		//wp_pagenavi();
		//next_posts_link( 'Older Entries »', $query->max_num_pages );
		//next_posts_link( 'Older Entries', $query->max_num_pages );
    	//previous_posts_link( 'Newer Entries' );
    	/*$total_pages = $query->max_num_pages;

    	    if ($total_pages > 1){

    	        $current_page = max(1, get_query_var('paged'));

    	        echo paginate_links(array(
    	            'base' => get_pagenum_link(1) . '%_%',
    	            'format' => '/page/%#%',
    	            'current' => $current_page,
    	            'total' => $total_pages,
    	            'prev_text'    => __('« prev'),
    	            'next_text'    => __('next »'),
    	        ));
    	    }*/

    	   
		
		?>
	</ul>

	<?php
		the_posts_pagination( array(
			'prev_text'          => __( '', 'twentyfifteen' ),
			'next_text'          => __( '', 'twentyfifteen' ),
			'mid_size' => 200,
			'screen_reader_text' => __( '', 'twentyfifteen' ),
			'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( '', 'twentyfifteen' ) . ' </span>',
		) );

		wp_reset_postdata();

	?>	
	<?php 
		else :
			//get_template_part( 'content', 'none' );
			?>
			<div class="block">
				<div class="row">
            		<div class="col-md-8 col-md-offset-2">
            			<header class="page-header">
									<h2 class="page-title"><?php _e( 'No Events Found', 'twentyfifteen' ); ?></h2>
						</header><!-- .page-header -->
					</div>
				</div>
			</div>

</div>
<?php endif; ?>
<?php get_footer(); ?>
