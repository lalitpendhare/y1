<?php
/**
 *  Template Name: Stylesheet
 */
get_header();
?>

<!-- FEATURED IMAGE -->
<div class="featured-images" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/featured-image.jpg);"></div>

<!-- PAGE HEADING -->
<div class="container-lg">
	<div class="row">
		<div class="col-md-9">
			<h1 class="title-bg">H1 Headline One Line</h1>			
		</div>
	</div>
</div>

<div class="container">
	<!-- TYPOGRAPHY -->
	<div class="typography">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">			
					<h2>Heading Style</h2>
					<p>Young Judaea is America’s oldest Zionist youth movement, turning spirited Jewish youth of diverse backgrounds and orientations into engaged leaders and inspired activists with a life-long commitment to Israel, Jewish life and tikkun olam.</p>
					<h3>Subheading Style</h3>
					<p>Through immersive informal and experiential education, Young Judaea fosters a sense of value and love for Jewish tradition and ritual and pride in the Jewish people, Israel and being Jewish. <a href="#" title="This is a link style">This is a link style.</a> <a href="#" title="This is a link hover" class="link-hover">This is a link hover.</a></p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis. This is an <mark>example of highlighted text within</mark> body copy.</p>

					<ul class="listing">
						<li>Bulleted list item goes here.</li>
						<li>Bulleted list with wrapped text. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</li>
						<li>Bulleted list item goes here.
							<ul>
								<li>Indented bulleted list item.</li>
								<li>Indented bulleted list item.</li>
							</ul>
						</li>
					</ul>

					<ol class="listing">
						<li>Numbered list item.</li>
						<li>Numbered list with wrapped text. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</li>
						<li>Numbered list item.</li>
					</ol>
				
			</div>
		</div>		
	</div>
	
	<div class="row m-b-60">
		<div class="col-md-10 col-md-offset-1">
			<blockquote>
				<p>Young Judaea’s WUJS Intern is a 5-month internship program that gives your resume the unique and international competitive edge to stand out among any crowd.</p>
				<span>– Camille Gallego, WUJS Intern Program In Israel</span>
			</blockquote>
		</div>
	</div>

	<hr>
	
	<!-- BUTTONS -->
	<div class="buttons block">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h2>Button Style</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				<a href="#" title="See Programs" class="btn button btn-arrow"><span>See Programs</span> <em class="arrow-right"></em></a>				
			</div>
		</div>
	</div>
	
	<!-- ACCORDIONS -->
	<div class="accordians block">
		<div class="row">
			<div class="col-md-9 col-md-offset-2">
				<h2>Getting to Israel</h2>
				<div id="accordion" class="accordion" role="tablist" aria-multiselectable="true">

				  <div class="accordion-item">				    
				      <h3 class="accordion-title">
				        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
				          How does travel to Israel work?
				        </a>
				      </h3>				   
				    <div id="collapseOne" class="collapse" role="tabpanel">
				      <div class="accordion-container">				      	
				      	<p>Yes. After we send you the confirmed international flight information and you begin arranging your domestic transportation, feel free to contact us to find out what participants will also be coming from your area. Additionally, we will mail you a complete participant list before the summer begins.</p>
				      </div>
				    </div>
				  </div>
				<div class="accordion-item">				    
				      <h3 class="accordion-title">
				        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
				          Will I be able to fly to New York with other program participants from my city?
				        </a>
				      </h3>				    
				    <div id="collapseTwo" class="collapse in" role="tabpanel">
				      <div class="accordion-container">				      	
				      	<p>Yes. After we send you the confirmed international flight information and you begin arranging your domestic transportation, feel free to contact us to find out what participants will also be coming from your area. Additionally, we will mail you a complete participant list before the summer begins.</p>
				      </div>
				    </div>
				  </div>
				  <div class="accordion-item">				    
				      <h3 class="accordion-title">
				        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
				          When is a good time to apply for or renew a passport?
				        </a>
				      </h3>				    
				    <div id="collapseThree" class="collapse" role="tabpanel">
				      <div class="accordion-container">				      	
				      	<p>Yes. After we send you the confirmed international flight information and you begin arranging your domestic transportation, feel free to contact us to find out what participants will also be coming from your area. Additionally, we will mail you a complete participant list before the summer begins.</p>
				      </div>
				    </div>
				  </div>

				  <div class="accordion-item">				    
				      <h3 class="accordion-title">
				        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
				          Can I drive to the airport with my family and best friends from my neighborhood?
				        </a>
				      </h3>				    
				    <div id="collapseFour" class="collapse" role="tabpanel">
				      <div class="accordion-container">				      	
				      	<p>Yes. After we send you the confirmed international flight information and you begin arranging your domestic transportation, feel free to contact us to find out what participants will also be coming from your area. Additionally, we will mail you a complete participant list before the summer begins.</p>
				      </div>
				    </div>
				  </div>
				</div>
			</div>
		</div>
	</div>

	<!-- TABS -->
	<div class=" block">
		<div class="row">
			<div class="col-md-9 col-md-offset-2">
				<h2>Tab Styles</h2>
				<div class="tabsMain">
					<ul class="tabs">
						<li class="tab-link">
							<div class="tabNav">Active Tab</div>
							<div class="tab-content">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
								<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
							</div>
						</li>
						<li class="tab-link">
							<div class="tabNav">Default Tab</div>
							<div class="tab-content">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
							</div>
						</li>
						<li class="tab-link">
							<div class="tabNav">Default Tab</div>
							<div class="tab-content">
								<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
							</div>
						</li>						
					</ul>
				</div>
			</div>
		</div>
	</div>

	<!-- Text & Images -->
	<div class="block m-b-0">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h2>Text &amp; Images</h2>				
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<figure class="full-width-img">
					<img src="<?php echo get_template_directory_uri(); ?>/images/full-width-img.jpg" alt="" class="responsive-img">
				</figure>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
			</div>
		</div>
		<div class="row text-col-images">
			<div class="col-sm-6">
				<img src="<?php echo get_template_directory_uri(); ?>/images/left-img.jpg" alt="" class="responsive-img">
			</div>
			<div class="col-sm-6">
				<img src="<?php echo get_template_directory_uri(); ?>/images/right-img.jpg" alt="" class="responsive-img">
			</div>
		</div>
	</div>

	<!-- VIDEO EMBED -->
	<div class="block m-b-0">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
				<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="video">
					<iframe src="https://www.youtube.com/embed/0O2aH4XLbto" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
		</div>				
	</div>

	<!-- VIDEO THUMBNAILS -->
	<div class="block m-b-0">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<p>Young Judaea is America’s oldest Zionist youth movement, turning spirited Jewish youth of diverse backgrounds and orientations into engaged leaders and inspired activists with a life-long commitment to Israel, Jewish life. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam in consectetur dui, id faucibus mauris. Aliquam non posuere lectus. Duis lorem diam, dictum at dui sit amet, mattis sodales lacus. Nam rutrum felis sit amet mauris tempus, non venenatis erat fermentum.</p>
			</div>
		</div>		
		<div class="row">
			<div class="col-sm-6 col-md-4">
				<div class="thumbCol">
					<a href="http://www.youtube.com/watch?v=0O2aH4XLbto" class="popup-youtube video-thunb-link"></a>
					<figure>
						<div class="thumbImage">
							<img src="<?php echo get_template_directory_uri(); ?>/images/thumbnail-img-1.jpg" alt="" class="responsive-img">
							<a href="#" class="playButton"><img src="<?php echo get_template_directory_uri(); ?>/images/play-arrow.svg" alt="" /></a>
						</div>
						<figcaption>
							<time datetime="">1:53 Min</time>
							<strong>Leaders of Tomorrow</strong>
						</figcaption>
					</figure>
				</div>
			</div>
			<div class="col-sm-6 col-md-4">
				<div class="thumbCol">
					<a href="http://www.youtube.com/watch?v=0O2aH4XLbto" class="popup-youtube video-thunb-link"></a>
					<figure>
						<div class="thumbImage">
							<img src="<?php echo get_template_directory_uri(); ?>/images/thumbnail-img-2.jpg" alt="" class="responsive-img">
							<a href="#" class="playButton"><img src="<?php echo get_template_directory_uri(); ?>/images/play-arrow.svg" alt="" /></a>
						</div>
						<figcaption>
							<time datetime="">3:10 Min</time>
							<strong>Israel, Stay With Me - An Original Song by Machon '16 Participants</strong>
						</figcaption>
					</figure>
				</div>
			</div>
			<div class="col-sm-6 col-md-4">
				<div class="thumbCol">
					<a href="http://www.youtube.com/watch?v=0O2aH4XLbto" class="popup-youtube video-thunb-link"></a>
					<figure>
						<div class="thumbImage">
							<img src="<?php echo get_template_directory_uri(); ?>/images/thumbnail-img-3.jpg" alt="" class="responsive-img">
							<a href="#" class="playButton"><img src="<?php echo get_template_directory_uri(); ?>/images/play-arrow.svg" alt="" /></a>
						</div>
						<figcaption>
							<time datetime="">2:22 Min</time>
							<strong>Young Judaea Israel Summer Programs</strong>
						</figcaption>
					</figure>
				</div>
			</div>
		</div>			
	</div>

	<!-- IMAGE SLIDER -->
	<div class="block">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
				<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>			
		</div>
		<div class="row">	
			<div class="col-md-10 col-md-offset-1">
				<div class="imageSlider" id="imgSlider">
		            <div class="slide">		               
						<img src="<?php echo get_template_directory_uri(); ?>/images/slider-img.jpg" alt="">
						<div class="slideCaption hidden-xs">Israel Discovery! - A Young Judaea Summer Teen Program</div>
						<div class="slide-count-wrap">
							<span class="current"></span> /
							<span class="total"></span>
						</div>
		            </div>
		            <div class="slide">		                
						<img src="<?php echo get_template_directory_uri(); ?>/images/slider-img.jpg" alt="">
						<div class="slideCaption hidden-xs">Israel Discovery! - A Young Judaea Summer Teen Program</div>
						<div class="slide-count-wrap">
							<span class="current"></span> / <span class="total"></span>
						</div>
		            </div>
					<div class="slide">		               
						<img src="<?php echo get_template_directory_uri(); ?>/images/slider-img.jpg" alt="">
						<div class="slideCaption hidden-xs">Israel Discovery! - A Young Judaea Summer Teen Program</div>
						<div class="slide-count-wrap">
							<span class="current"></span> /
							<span class="total"></span>
						</div>
		            </div>
		            <div class="slide">		                
						<img src="<?php echo get_template_directory_uri(); ?>/images/slider-img.jpg" alt="">
						<div class="slideCaption hidden-xs">Israel Discovery! - A Young Judaea Summer Teen Program</div>
						<div class="slide-count-wrap">
							<span class="current"></span> / <span class="total"></span>
						</div>
		            </div>
					<div class="slide">		               
						<img src="<?php echo get_template_directory_uri(); ?>/images/slider-img.jpg" alt="">
						<div class="slideCaption hidden-xs">Israel Discovery! - A Young Judaea Summer Teen Program</div>
						<div class="slide-count-wrap">
							<span class="current"></span> /
							<span class="total"></span>
						</div>
		            </div>		            	                
		        </div>
	    	</div>
		</div>
	</div>
	
	<!-- IMAGE GRID -->	
	<div class="m-b-50">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
				<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
			</div>	
		</div>
		<div class="row image-grid-col">
			<div class="col-xs-12">
				<figure>
					<img src="<?php echo get_template_directory_uri(); ?>/images/lrg-img.jpg" alt="" class="responsive-img">
				</figure>
			</div>		
			<div class="col-sm-6">
				<figure>
					<img src="<?php echo get_template_directory_uri(); ?>/images/left-img.jpg" alt="" class="responsive-img">
				</figure>
			</div>
			<div class="col-sm-6">
				<figure>
					<img src="<?php echo get_template_directory_uri(); ?>/images/right-img.jpg" alt="" class="responsive-img">
				</figure>
			</div>
		</div>
	</div>

	<!-- TABLES -->
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h2>Table Style</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		</div>
	</div>
	<div class="row m-b-50">
		<div class="col-md-10 col-md-offset-1">
			<div class="responsive-table">
				<table class="table table-striped">
				<thead>
					<tr>
						<th>column 1</th>
						<th>column 2</th>
						<th>column 3</th>
						<th>column 4</th>
						<th>column 5</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Row 1 Text Here</td>
						<td>Row 1 Text Here</td>
						<td>Row 1 Text Here</td>
						<td>Row 1 Text Here</td>
						<td>Row 1 Text Here</td>
					</tr>
					<tr>
						<td>Row 1 Text Here</td>
						<td>Row 2 Text Here</td>
						<td>Row 2 Text Here</td>
						<td>Row 2 Text Here</td>
						<td>Row 2 T2xt Here</td>
					</tr>
					<tr>
						<td>Row 3 Text Here</td>
						<td>Row 3 Text Here</td>
						<td>Row 3 Text Here</td>
						<td>Row 3 Text Here</td>
						<td>Row 3 Text Here</td>
					</tr>
					<tr>
						<td>Row 4 Text Here</td>
						<td>Row 4 Text Here</td>
						<td>Row 4 Text Here</td>
						<td>Row 4 Text Here</td>
						<td>Row 4 Text Here</td>
					</tr>
				</tbody>
			</table>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
			<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
		</div>
	</div>

	<!-- QUOTE -->
	<div class="m-b-50">
		<div class="quote m-b-50">
			<div class="row">
				<div class="col-md-7 quote-col">
					<blockquote>
						<p>Year Course has provided me with everything I could have hoped for and even more. One of the biggest benefits of coming on a gap year is the growth.</p>
						<span>miguel kruger  –  year course</span>
					</blockquote>
				</div>
				<div class="col-md-5 hidden-sm hidden-xs quote-col">
					<div class="quote-bg" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/quote-img.jpg);"></div>
				</div>
			</div>		
		</div>		
	</div>
	
	<!-- CONTENT BLOCKS FULL WIDTH -->
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<p>Young Judaea is America’s oldest Zionist youth movement, turning spirited Jewish youth of diverse backgrounds and orientations into engaged leaders and inspired activists with a life-long commitment to Israel, Jewish life.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam in consectetur dui, id faucibus mauris. Aliquam non posuere lectus. Duis lorem diam, dictum at dui sit amet, mattis sodales lacus. Nam rutrum felis sit amet mauris tempus, non venenatis erat fermentum consectetur.</p>
		</div>
	</div>
	<div class="content-block-fullwidth">
		<div class="row">
			<div class="col-md-5 col-lg-6">
				<img src="<?php echo get_template_directory_uri(); ?>/images/content-block-img.jpg" alt="">
			</div>
			<div class="col-md-7 col-lg-6">
				<div class="content-block">
					<h2><span>college &amp; beyond</span> Amirim - Israel Summer Internship</h2>
					<p>Thinking about going to Israel this summer? Choose your own adventure and spend Summer in Israel.</p>
					<a href="#" title="See Programs" class="btn button btnWhite btn-arrow"><span>See Programs</span> <em class="arrow-right"></em></a>
				</div>
			</div>
		</div>
	</div>
	<div class="content-block-fullwidth">
		<div class="row">
			<div class="col-md-5 col-lg-6">
				<img src="<?php echo get_template_directory_uri(); ?>/images/content-block-img-2.jpg" alt="">
			</div>
			<div class="col-md-7 col-lg-6">
				<div class="content-block">
					<h2><span>college &amp; beyond</span> Onward Israel</h2>
					<p>Expand your mind, your horizons, and your life experience as you discover another culture, volunteer, study, and develop your Jewish identity.</p>
					<a href="#" title="See Programs" class="btn button btnWhite btn-arrow"><span>See Programs</span> <em class="arrow-right"></em></a>
				</div>
			</div>
		</div>
	</div>
</div><!-- / END: .container -->
<!-- CONTENT BLOCKS WITHIN GRID -->
<div class="lightblue-bg p-t-100 p-b-100">
	<div class="container">		
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h2>Teen Summer Programs</h2>
				<p>Discover the breathtaking sites and unique culture of Israel while you make new friends from around the world on our teen summer programs.</p>
			</div>
		</div>
		<div class="row">			
			<div class="col-sm-8 col-sm-offset-2 col-md-12 col-md-offset-0 col-lg-10 col-lg-offset-1">
				<div class="grid-block-row">
					<div class="clearfix">
						<div class="content-grid-col">
							<div class="content-grid-image" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/wujs-img.jpg);"></div>
						</div>
						<div class="content-grid-col">
							<div class="grid-block-content">
								<h3>WUJS</h3>
								<p>Young Judaea has been gathering on President’s Weekend to celebrate Shabbat and take part in an educational programs.</p>
								<a href="#" title="Learn More" class="link">Learn More</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">			
			<div class="col-sm-8 col-sm-offset-2 col-md-12 col-md-offset-0 col-lg-10 col-lg-offset-1">
				<div class="grid-block-row">
					<div class="clearfix">
						<div class="content-grid-col deskRight">
							<div class="content-grid-image grid-image-right" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/amirim-img.jpg);"></div>
						</div>
						<div class="content-grid-col">
							<div class="grid-block-content">
								<h3>Amirim - Israel Summer Internship</h3>
								<p>Young Judaea has been gathering on President’s Weekend to celebrate Shabbat and take part in an educational programs.</p>
								<a href="#" title="Learn More" class="link">Learn More</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<!-- CONTENT IMAGE LINKS -->
	<div class="p-t-80 content-image-links">
		<h2>Content Image Links</h2>
		<div class="row">
			<div class="col-sm-6 col-md-4">
				<div class="thumbCol">
					<a href="#" class="video-thunb-link"></a>
					<figure>
						<div class="thumbImage">
							<img src="<?php echo get_template_directory_uri(); ?>/images/thumbnail-img-1.jpg" alt="" class="responsive-img">							
						</div>
						<figcaption>							
							<strong>Second Annual Forward Together Benefit for Young Judaea</strong>
						</figcaption>
					</figure>
				</div>
			</div>
			<div class="col-sm-6 col-md-4">
				<div class="thumbCol">
					<a href="#" class="video-thunb-link"></a>
					<figure>
						<div class="thumbImage">
							<img src="<?php echo get_template_directory_uri(); ?>/images/thumbnail-img-2.jpg" alt="" class="responsive-img">							
						</div>
						<figcaption>							
							<strong>Young Judaea Celebrates 60 Years of Year Course</strong>
						</figcaption>
					</figure>
				</div>
			</div>
			<div class="col-sm-6 col-md-4">
				<div class="thumbCol">
					<a href="#" class="video-thunb-link"></a>
					<figure>
						<div class="thumbImage">
							<img src="<?php echo get_template_directory_uri(); ?>/images/thumbnail-img-3.jpg" alt="" class="responsive-img">
						</div>
						<figcaption>							
							<strong>Forward Together: A Benefit for Young Judaea</strong>
						</figcaption>
					</figure>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<!-- CONTENT TEXT LINKS -->
	<div class="content-text-links p-t-80 p-b-80">
		<h2>Content Text Links</h2>
		<ul class="text-links clearfix">
			<li><a href="#" title="Text Link">Text Link <em class="arrow-right"></em></a></li>
			<li><a href="#" title="Text Link">Text Link <em class="arrow-right"></em></a></li>
			<li><a href="#" title="Text Link">Text Link <em class="arrow-right"></em></a></li>			
			<li><a href="#" title="Text Link">Text Link <em class="arrow-right"></em></a></li>
			<li><a href="#" title="Text Link Long Example That Falls On Two Lines">Text Link Long Example That Falls On Two Lines <em class="arrow-right"></em></a></li>
			<li><a href="#" title="Text Link">Text Link <em class="arrow-right"></em></a></li>
		</ul>
	</div>
</div>
<!-- STAFF CARDS -->
<div class="lightblue-bg p-t-100 p-b-55">
	<div class="container">
		<div class="staff-cards">
			<h2>Staff Cards</h2>
			<div class="row">
				<div class="col-sm-6 col-md-4">
					<div class="staff-thumb-card">
						<img src="<?php echo get_template_directory_uri(); ?>/images/susan-alpert.jpg" alt="" class="responsive-img">
						<div class="card-container">
							<div class="card-caption">
								<h3 class="title"><small>Minneapolis, MN</small> Susan Alpert, Ph.D., M.D. <span>Principle of SFA Consulting LLC</span></h3>
							</div>
							<a href="#staff-lightbox" class="btn btnWhite btn-arrow button popup-with-zoom-anim" title="Read Bio" class="btn btnWhite btn-arrow button"><span>Read Bio</span> <em class="arrow-right"></em></a>
						</div>						
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="staff-thumb-card">
						<img src="<?php echo get_template_directory_uri(); ?>/images/steve-berman.jpg" alt="" class="responsive-img">
						<div class="card-container">
							<div class="card-caption">							
								<h3 class="title"><small>telaviv, israel</small> Steve Berman <span>President of Atlanta-based OA Development</span></h3>
							</div>
							<a href="#staff-lightbox" title="Read Bio" class="btn btnWhite btn-arrow button popup-with-zoom-anim"><span>Read Bio</span> <em class="arrow-right"></em></a>
						</div>						
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="staff-thumb-card">
						<img src="<?php echo get_template_directory_uri(); ?>/images/marvin-krislov.jpg" alt="" class="responsive-img">
						<div class="card-container">							
							<div class="card-caption">
								<h3 class="title"><small>oberlin, oh</small> Marvin Krislov <span>President of Oberlin College</span></h3>
							</div>
							<a href="#staff-lightbox" title="Read Bio" class="btn btnWhite btn-arrow button popup-with-zoom-anim"><span>Read Bio</span> <em class="arrow-right"></em></a>
						</div>						
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="staff-thumb-card">
						<img src="<?php echo get_template_directory_uri(); ?>/images/steve-berman.jpg" alt="" class="responsive-img">
						<div class="card-container">		
							<div class="card-caption">					
								<h3 class="title"><small>telaviv, israel</small> Steve Berman <span>President of Atlanta-based OA Development</span></h3>
							</div>
							<a href="#staff-lightbox" title="Read Bio" class="btn btnWhite btn-arrow button popup-with-zoom-anim"><span>Read Bio</span> <em class="arrow-right"></em></a>
						</div>						
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="staff-thumb-card">
						<img src="<?php echo get_template_directory_uri(); ?>/images/marvin-krislov.jpg" alt="" class="responsive-img">
						<div class="card-container">							
							<div class="card-caption">
								<h3 class="title"><small>oberlin, oh</small> Marvin Krislov <span>President of Oberlin College</span></h3>
							</div>
							<a href="#staff-lightbox" title="Read Bio" class="btn btnWhite btn-arrow button popup-with-zoom-anim"><span>Read Bio</span> <em class="arrow-right"></em></a>
						</div>						
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="staff-thumb-card">
						<img src="<?php echo get_template_directory_uri(); ?>/images/susan-alpert.jpg" alt="" class="responsive-img">
						<div class="card-container">							
							<div class="card-caption">
								<h3 class="title"><small>Minneapolis, MN</small> Susan Alpert, Ph.D., M.D. <span>Principle of SFA Consulting LLC</span></h3>
							</div>
							<a href="#staff-lightbox" title="Read Bio" class="btn btnWhite btn-arrow button popup-with-zoom-anim"><span>Read Bio</span> <em class="arrow-right"></em></a>
						</div>						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- STAFF LIGHTBOX -->
 <div id="staff-lightbox" class="zoom-anim-dialog lightbox mfp-hide">
	<div class="slide">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<img src="<?php echo get_template_directory_uri(); ?>/images/marvin-krislov.jpg" alt="" class="staff-img">
				</div>
				<div class="col-md-7">
					<div class="person-content">
						<span class="location">Oberlin, OH</span>
						<h2> Marvin Krislov <span>Oberlin, OH</span></h2>
						<p>Marvin Krislov has served as President of Oberlin College since 2007. Previously, he was vice president and general counsel of the University of Michigan, where his legal defense of its admission policies resulted in a 2003 Supreme Court decision recognizing the importance of student body diversity. He also served as Acting Solicitor at the U.S. Department of Labor and Associate Counsel to the President during the Clinton Administration. Marvin earned a Bachelor of Arts summa cum laude in Economics and Political Science from Yale University. He was named a Rhodes Scholar, and received master’s degrees from Oxford University and Yale, as well as a Juris Doctor from Yale Law School. Marvin has taught advanced courses in law and public policy, and has published op-ed pieces in The Washington Post, USA Today, and the Chronicle of Higher Education on his commitment to teaching, student voting rights, colleges’ role in driving sustainable economic development, and student mental health. Nominated by</p>
					</div>
				</div>
			</div>
		</div>	
	</div>
	<div class="slide">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<img src="<?php echo get_template_directory_uri(); ?>/images/marvin-krislov.jpg" alt="" class="staff-img">
				</div>
				<div class="col-sm-7">
					<div class="person-content">
						<span class="location">Oberlin, OH</span>
						<h2> Marvin Krislov <span>Oberlin, OH</span></h2>
						<p>dddd</p>
					</div>
				</div>
			</div>
		</div>	
	</div>			
</div> 














<?php
get_footer();
?>
