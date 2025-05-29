<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="stylesheet" href="https://use.typekit.net/evl5tiq.css">
    <?php
        if(is_page_template('template/test.php')){
            global $post;
            $id = $post->ID;
            if(wp_get_post_parent_id( $id )){
                $id = wp_get_post_parent_id( $id );
            }
            echo '<title>'.get_the_title($id).' | '.get_bloginfo('name').'</title>';
        }
    ?>
	<?php wp_head(); ?>
</head>
<?php
    if(is_page_template('template/event-detail.php')){
        $event_class = 'event-detail';
    }
    if(is_page_template('template/blog.php')){
        $event_class = 'blog-page';
    }
?>
<body <?php body_class(array('class'=>$event_class)); ?>>
	
	<header class="site-header" id="masthead">
        <div class="container-lg">
            <div class="row">
                <div class="col-md-12">
					<div class="mainheader">						
						<a class="logo" href="#"><img width="160" src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="logo"></a>
						
						<div class="visible-sm">
							<a href="#" class="phoneIcon"><img src="<?php echo get_template_directory_uri(); ?>/images/phone-icon.svg" alt=""></a>
						</div>
						<div class="menu-icon"><div class="menu-box"></div>
						</div>
						
						<nav id="primary-navigation" class="site-navigation primary-navigation clearfix" role="navigation">
							<div class="enumenu_ul clearfix">
								<ul class=" menu">
									<li class="active"><a href="index.html" title="Israel Programs">Israel Programs</a>
									</li>
									<li><a href="#" title="Summer Camps">Summer Camps</a>
									</li>
									<li><a href="#" title="Year-Round">Year-Round</a>                    
									</li>
									<li><a href="#" title="Alumni">Alumni</a>
									</li>
									<li><a href="#" title="Give">Give</a>
									</li>
									<li><a href="#" title="About">About</a>
									</li>
								</ul>
								<div class="header-right">
									<ul class="sublinks">
										<li><a href="#" title="Calendar">Calendar</a></li>
										<li><a href="#" title="Blog">Blog</a></li>
										<li><a href="#" title="Contact">Contact</a></li>
										<li class="hidden-sm"><a href="#" title="Search">Search</a></li>
									</ul>	
									<a href="#" class="phoneIcon"><img src="<?php echo get_template_directory_uri(); ?>/images/phone-icon-white.svg" alt=""></a>
									<a href="#" title="Request Info" class="btn button cta-btn btn-arrow"><span>Request Info</span> <em class="arrow-right"></em></a>
								</div>
								
							</div>	                        
						</nav>
					</div>            
                </div>                        
            </div>
        </div>
	</header><!-- / END : Header -->   
    
    <!-- Banner Slider -->
    <?php if(is_front_page() || is_page_template('home.php') || is_page_template('template/test.php')) : ?>
   <div class="banner" id="slide1">
        <div class="banner-slider slider-for">
            <div style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/slide-1.jpg')">
                <div class="owl-caption">
                    <div class="container-lg">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-4">
                                <div class="caption-inner">
                                    <h2><small>experiences for teens</small> Ignite your future with life-changing experiences</h2>
                                    <a href="#" title="Browse Programs" class="btn button btnWhite btn-arrow"><span>Browse Programs</span> <em class="arrow-right"></em></a>
                                </div>        
                            </div>   
                        </div>          
                    </div>
                </div>
            </div>
            <div style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/slide-11.jpg')">
                <div class="owl-caption">
                    <div class="container-lg">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-4">
                                <div class="caption-inner">
                                    <h2><small>experiences for teens</small> Ignite your future with life-changing experiences</h2>
                                    <a href="#" title="Browse Programs" class="btn button btnWhite btn-arrow"><span>Browse Programs</span> <em class="arrow-right"></em></a>
                                </div>        
                            </div>   
                        </div>          
                    </div>
                </div>
            </div> 
            <div style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/slide-1.jpg')">
                <div class="owl-caption">
                    <div class="container-lg">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-4">
                                <div class="caption-inner">
                                    <h2><small>experiences for teens</small> Ignite your future with life-changing experiences</h2>
                                    <a href="#" title="Browse Programs" class="btn button btnWhite btn-arrow"><span>Browse Programs</span> <em class="arrow-right"></em></a>
                                </div>        
                            </div>   
                        </div>          
                    </div>
                </div>
            </div>                
        </div>

        <div class="banner-slider slider-nav">
            <div><div class="rightTringle"><i>01</i></div> <span>Israel Programs</span></div>
            <div><div class="rightTringle"><i>02</i></div> <span>Israel Programs</span></div>
            <div><div class="rightTringle"><i>03</i></div> <span>Israel Programs</span></div> 
        </div>



		<div class="container">
        <div class="animate-scroll-link">
            <a href="#content" class="smooth-scroll">Scroll Down <span></span> To Explore</a>
        </div>
		</div>
   </div><!-- / END : Banner -->
   <?php endif; ?>
	<div id="content" class="site-content">

       
        
        