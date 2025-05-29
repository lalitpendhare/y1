<?php
/**
 *  Template Name: event
 */
get_header();
?>

<div class="hero-banner">
	<div class="container">
		<div class="row">
			<div class="col-xs-9 col-sm-9 col-md-7">
				<h1><span>the latest</span> Young Judaea Events</h1>
				<!-- FILTERS -->
				<div class="filters-data hidden-xs">
					<div class="selectMenu">
			            <select class="selectpicker" title="Choose" data-width="100%">
						  <option>teen (13-17)</option>
						  <option>Pre-College (17-19)</option>
						  <option>Young Adult (21-32)</option>
						</select>
					</div>            
			    	<div class="selectMenu">
			            <select class="selectpicker" title="age" data-width="100%">
						  <option>teen (13-17)</option>
						  <option>Pre-College (17-19)</option>
						  <option>Young Adult (21-32)</option>
						</select>	
					</div>
				</div>
				
				<div class="visible-xs">
					<div class="selectMenu filterMenu">
			            <select class="selectpicker" title="Filter" data-width="100%">
						  <option>Filter</option>
						  <option>Filter</option>
						  <option>Filter</option>
						</select>	
					</div>
				</div>
				  
			</div>		
		</div>
	</div>
</div>
<div class="container">
	<ul class="event-list">
		<li>			
			<div class="event-left-col">
				<time datetime="2017-09-12"><span>12</span> <small>september</small></time>
				<i>1 Day Event</i>
			</div>		
			<div class="event-wide-col">
				<div class="row">
					<div class="col-md-9">
						<h3>Coney Island Adventure – Long Island NYC Young Judaea</h3>
						<p>Come with us for a scavenger hunt, games and fun. We’ll also learn a bit about the amazing Jewish history of Coney Island.</p>
						<div class="hidden-md"><a href="#" title="More Info" class="more-link"><img src="<?php echo get_template_directory_uri(); ?>/images/external-link-icon.svg" alt=""> More Info</a></div>
					</div>
					<div class="col-md-3">
						<ul class="event-detail-list">								
							<li><span class="label-title">time</span> <time datetime="13-00:14-00">1:00pm – 4:00pm</time></li>
							<li><span class="label-title">location</span> Coney Island New York</li>
						</ul>
					</div>
				</div>
				<div class="visible-md"><a href="#" title="More Info" class="more-link"><img src="<?php echo get_template_directory_uri(); ?>/images/external-link-icon.svg" alt=""> More Info</a></div>
			</div>			
		</li>
		<li>			
			<div class="event-left-col">
				<time datetime="2017-09-12"><span>14</span>  <small>september</small></time>
				<i>1 Day Event</i>
			</div>		
			<div class="event-wide-col">
				<div class="row">
					<div class="col-md-9">
						<h3>Off the Wall – South Florida Opening Event</h3>
						<p>Bounce, play games, meet old friends, new friends and Young Judaea’s brand new shaliach (Israeli emissary) Itamar!</p>
						<div class="hidden-md"><a href="#" title="More Info" class="more-link"><img src="<?php echo get_template_directory_uri(); ?>/images/external-link-icon.svg" alt=""> More Info</a></div>
					</div>
					<div class="col-md-3">
						<ul class="event-detail-list">								
							<li><span class="label-title">time</span> <time datetime="13-30:14-00">12:30pm - 4:00pm</time></li>
							<li><span class="label-title">location</span> Off the Wall</li>
						</ul>
					</div>
				</div>
				<div class="visible-md"><a href="#" title="More Info" class="more-link"><img src="<?php echo get_template_directory_uri(); ?>/images/external-link-icon.svg" alt=""> More Info</a></div>
			</div>			
		</li>
	</ul>	
</div>

<?php
get_footer();
?>
