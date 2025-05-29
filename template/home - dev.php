<?php
/**
 *  Template Name: developer
 */
get_header();
?>

<!-- // Start Middel Section here -->

<!-- // FIND YOUR PROGRAM -->
<div class="find-your-program">
   <div class="container">
        <div class="row">
            <div class="col-sm-3 col-md-3">
                <h3 class="title"><span>New to young Judaea?</span> Find the Right Program for You</h4>
            </div>
            <div class="col-sm-3 col-md-3">
            	<div class="selectMenu">
	                <select class="selectpicker categoryBox" title="Choose" data-width="100%">
					  	<option>Age</option>
					  	<?php
					  	$taxonomy = 'program-cat';
					  	$terms = get_terms($taxonomy);
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
            </div>
            <div class="col-sm-3 col-md-3">
            	<div class="selectMenu program-box-wrapper">
	                <select class="selectpicker program-box" title="Programs" disabled="true" data-width="100%">
	                	<option>Programs</option>
					</select>	
				</div>
            </div>
            <div class="col-sm-3 col-md-3 view-program-wrapper">
                <a type="button" title="View Program" class="btn disabled">View Program</a>
            </div>
            <script type="text/javascript">
            	
            </script>                    
        </div>
   </div>
</div>

<div class="container-lg">
	<!-- // WHO WE ARE -->
	<div class="row rowCol">			
		<div class="col-md-6 equalHeight deskRight">
			<div class="col-img" style="background: url(<?php echo get_template_directory_uri(); ?>/images/who-we-are-img.jpg);"></div>			
		</div>
		<div class="col-md-6 equalHeight about-watermark">			
			<div class="dis-tb">
				<div class="tb-cell">
					<div class="content-caption">
						<h2 class="title"><span><em>Who We Are</em></span>Young Judaea is the oldest Zionist youth movement in the US</h2>					
						<p>For over 100 years, Young Judaea has brought together thousands of Jewish youth from across the country and around the world – of every religious, cultural, and political persuasion, through a shared commitment to Jewish values, Jewish pride, and love of Israel.</p>					
						<a href="#" title="Learn About Us" class="link">Learn About Us</a>				
					</div>
				</div>
			</div>
		</div>				
	</div>
	
	<!-- // WHAT WE OFFER -->
	<div class="row rowCol">			
		<div class="col-md-6 equalHeight">
			<div class="imgSlider">
	            <div>
	            	<img src="<?php echo get_template_directory_uri(); ?>/images/what-we-offer-img.jpg" alt="">
	            </div>
	            <div>
	            	<img src="<?php echo get_template_directory_uri(); ?>/images/what-we-offer-img.jpg" alt="">
	            </div>
	            <div>
	            	<img src="<?php echo get_template_directory_uri(); ?>/images/what-we-offer-img.jpg" alt="">
	            </div>
	        </div>
		</div>
		<div class="col-md-6 equalHeight programs-watermark">			
			<div class="content-caption">
				<h2 class="title"><span><em>What we offer</em></span>Young Judaea Way Youth Programs</h2>				
				<p>When choosing an Israel experience, you want to have it all – a well planned trip that combines discovery of the land, exploration of Jewish culture, and the opportunity to give back.</p>				
				<ul class="linksData">
					<li><a href="#" title="Israel Programs">Israel Programs <em class="arrow-right"></em></a></li>
					<li><a href="#" title="Summer Camps">Summer Camps <em class="arrow-right"></em></a></li>
					<li><a href="#" title="Year-Round">Year-Round <em class="arrow-right"></em></a></li>
				</ul>					
			</div>				
		</div>
	</div>
</div>

<!-- CTA CONTENT BOXES -->
<div class="content-boxes" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/content-boxes-bg.jpg);">	
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="content-box-bg" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/content-box-img-1.jpg);">					
					<div class="content-box">
						<h3 class="title">Alumni Judaean Network</h3>
						<p>Gather your friends and start a new campaign ornare to help ensure the future of Young Judaea iaculis metus id sapien ornare.</p>
						<a href="#" title="Join Our Network" class="btn btnWhite btn-arrow button"><span>Join Our Network</span> <em class="arrow-right"></em></a>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="content-box-bg" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/content-box-img-2.jpg);">					
					<div class="content-box">
						<h3 class="title">Young Judaea Leadership</h3>
						<p>Our National Mazkirut is comprised of the top teen leaders in Young Judaea. Morbi eu vulputate nibh. Maecenas malesuada.</p>
						<a href="#" title="Join Our Network" class="btn btnWhite btn-arrow button"><span>Meet The Team</span> <em class="arrow-right"></em></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<img src="<?php echo get_template_directory_uri(); ?>/images/community-watermark.png" alt="" class="community-watermark">
</div>

<!-- EVENTS & BLOG -->
<div class="events-blog">
	<div class="container">
		<div class="titleBar clearfix">
			<h2><span>the latest</span> Events & Blog</h2>
			<a href="#" title="View More Blog Posts" class="link">View More Blog Posts</a>
		</div>
		<div class="row">
			<div class="col-md-4">
				<ul class="event-blog-list">
					<li>
						<a href="#">
							<time datetime="2017-05-12"><span>12</span> MAY</time>
							<div>
								<h4>Young Judaea Long Island Chocolate Seder <i>1 Day Event</i></h4>
							</div>
						</a>
					</li>
					<li>
						<a href="#">
							<time datetime="2017-04-26"><span>26</span> APR</time>
							<div>
								<h4>Young Judea South Florida Overnight Party <i>1 Day Event</i></h4>
							</div>
						</a>
					</li>
					<li>
						<a href="#">
							<time datetime="2017-04-18"><span>18</span> APR</time>
							<div>
								<h4>Young Judaea Midwest Spring Convention 2017 <i>1 Day Event</i></h4>
							</div>
						</a>
					</li>
					<li>
						<a href="#">
							<time datetime="2017-02-27"><span>27</span> FEB</time>
							<div>
								<h4>YJPAC at JStreet Conference <i>1 Day Event</i></h4>
							</div>
						</a>
					</li>
				</ul>
				<a href="#" title="View More Events" class="btn btn-block btn-lg"> View More Events</a>
			</div>
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-6">
						<div class="">
							<img src="<?php echo get_template_directory_uri(); ?>/images/blog-card-1.jpg" alt="">
							<h3><span>zionist history</span> This day in Zionist/Young Judaea history</h3>
							<p>Traveling allows you to experience and become a part of a different culture...</p>
							<div class="">
								
							</div>
						</div>
					</div>
					<div class="col-md-6">
						asdfas
					</div>
				</div>
				<div class="row">
					<div class="col-mdp-12">
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<?php
get_footer();
?>
