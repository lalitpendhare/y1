<?php
/**
 *  Template Name: Event Detail Page
 */
get_header();
?>

<div class="hero-banner">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-lg-7">
				<h1 class="title"><span>september 10, 2017</span> Young Judaea Northeast Leadership Seminar</h1>				 
			</div>		
		</div>
	</div>
</div>
<div class="container-lg event-detail-col">	
	<div class="container">
		
		
		<div class="event-detail-inner">
				
			<div class="eventCTA">
				<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-7 col-lg-7">
					<a href="#" title="Register Now" class="btn button btn-arrow"><span>Register Now</span> <em class="arrow-right"></em></a>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-4 col-md-offset-1 col-lg-3 col-lg-offset-2">
					<a href="#" title="Add to Google Calendar" class="calendarBtn"><!--<img src="<?php echo get_template_directory_uri(); ?>/images/calendar-icon-sm.svg" alt="">--> <em class="fa fa-calendar-o"></em> Add to Google Calendar</a>
				</div>
				</div>
			</div>
			<hr>
			<div class="event-middel">
				<div class="row">
					<div class="col-md-4 col-md-offset-1 col-lg-3 col-lg-offset-2 deskRight">
						<h6>details</h6>
						<ul class="event-detail-list">								
							<li><span class="label-title">Date</span> <time datetime="2017-09-01">September 17</time></li>
							<li><span class="label-title">time</span> <time datetime="">1:00pm – 4:00pm</time></li>
							<li><span class="label-title">location</span> Young Judaea Global Office</li>
							<li><span class="label-title">cost</span> $12</li>
							<li><span class="label-title">organizer</span> Northeast Young Judaea</li>
							<li><span class="label-title">phone</span> <a href="tel:9175952100209">917-595-2100 x209</a></li>
							<li><span class="label-title">email</span> <a href="mailto:yjevents@youngjudaea.org">yjevents@youngjudaea.org</a></li>
						</ul>				
						<h6>share with friends</h6>
						<ul class="social-icons">
							<li><a href="#" title="Facebook"><em class="fa fa-facebook"></em></a></li>
							<li><a href="#" title="Facebook"><em class="fa fa-twitter"></em></a></li>
							<li><a href="#" title="Pinterest"><em class="fa fa-pinterest"></em></a></li>
							<li><a href="#" title="Tumblr"><em class="fa fa-tumblr"></em></a></li>					
						</ul>
						<div class="hidden-xs hidden-sm"><a href="#" title="Register Now" class="btn button btn-arrow"><span>Register Now</span> <em class="arrow-right"></em></a></div>
					</div>
					<div class="col-md-7 col-lg-7">
						<h6>description</h6>
						<p>Whether you have position on one of YJ’s Mazkiriot (Leadership Boards), want to get more involved or want to hone your leadership skills, this is a day for you!</p>
						<p>Learn new skills, sharpen old skills, explore and discuss issues important to Jewish teens today and get caught up on what’s happening in Israel.</p>
						<img src="<?php echo get_template_directory_uri(); ?>/images/event-profile.jpg" alt="" class="responsive-img">
					</div>			
				</div>
			</div>
			
		</div>			
			
		<!-- LOCATION AND MAP -->
		<div class="map">
			<div class="row">
				<div class="col-md-7">
					<div id="googlemap"></div>
				</div>
				<div class="col-md-5">
					<div class="location-col">
						<h6>venue &amp; contact info</h6>
						<address>
							<strong>Young Judaea Global Office</strong>						
							<span>575 Eighth Ave., Fl 11 New York, NY 10018</span>
							<span><a href="tel:9175952100">917-595-2100</a></span>
						</address>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</div>


<!-- Google Map Script --> 
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
<script type="text/javascript">
	var map;
	var infowindow;
	
	function initialize() {
	  map = new google.maps.Map(document.getElementById('googlemap'), {
		zoom: 10,
		backgroundColor: '#000000',
		center: new google.maps.LatLng(40.754972, -73.991837),
		mapTypeId: 'roadmap',
		streetViewControl: false,
	  });
	  infowindow = new google.maps.InfoWindow();
	  var iconBase = 'images/numbers/';
	  var icons = {
		001: {
		  icon: "<?php echo get_template_directory_uri(); ?>/images/map-pin.png"
		}
	 };
	
	  function addMarker(feature) {
		var marker = new google.maps.Marker({
		  position: feature.position,
		  icon: icons[feature.type].icon,
		  map: map,
	
		});
		// must be a string (or a DOM node).
		var content = "" + feature.title
		google.maps.event.addListener(marker, 'click', (function(marker, content, infowindow) {
		  return function(evt) {
			infowindow.setContent(content);
			infowindow.open(map, marker);
		  };
		})(marker, content, infowindow));	
	  }
	
	  var features = [{
		position: new google.maps.LatLng(40.754972, -73.991837),
		type: 001,
		title:'Young Judaea Global Office'		
	  }];
	
	  for (var i = 0, feature; feature = features[i]; i++) {
		addMarker(feature);
	  };
	}
	google.maps.event.addDomListener(window, "load", initialize);
</script>

<?php
get_footer();
?>
