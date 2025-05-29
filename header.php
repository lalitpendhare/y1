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
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="stylesheet" href="https://use.typekit.net/evl5tiq.css">
    <link rel="shortcut icon" href="<?php echo get_field('site_favicon','option'); ?>" type="image/x-icon" />
    <?php
    global $post;
    $id = $post->ID;
       /* if(is_page_template('template/test.php')){
            
            if(wp_get_post_parent_id( $id )){
                $id = wp_get_post_parent_id( $id );
            }
            echo '<title>'.get_the_title($id).' | '.get_bloginfo('name').'</title>';
        }*/
    ?>
	<?php wp_head(); ?>
</head>
<?php
    if(is_page_template('template/event-detail.php')){
        $event_class = 'event-detail';
    }
    if(is_page_template('template/blog.php') || is_home() || is_category() || is_tag()){
        $event_class = 'blog-page';
    }
?>
<body <?php body_class(array('class'=>$event_class)); ?>>
<div id="page_top"></div>	
	<header class="site-header" id="masthead">	
		<form role="search" method="get" class="search-bar" action="<?php echo home_url(); ?>">
			<div class="container-lg">
				<div class="search-block clearfix">					
					<input type="search" class="search-field form-control" placeholder="Search" name="s" />
					<input type="submit" class="search-submit screen-reader-text" value="" />
					<a href="#" class="close-search"></a>				
				</div>				
			</div>
		</form>	
        <div class="container-lg">
            <div class="row">
                <div class="col-md-12">
					<div class="mainheader">	
                    <?php
                        
                        $logo_image = get_field('site_logo','option');
                        if(!empty($logo_image)){
                            $logo = $logo_image['url']; 
                            $alt = $logo_image['alt'];
                        }
                        $logo_sticky_image = get_field('logo_sticky_image','option');
                        if(!empty($logo_sticky_image)){
                            $logo_sticky = $logo_sticky_image['url']; 
                            $sticky_alt = $logo_sticky_image['alt'];
                        }
                        $url = get_site_url();
                        $title = get_bloginfo();
                        $phone_icon = get_field('phone_icon','option');
                        $phone_img_src = $phone_icon['url'];
                        $phone_img_alt = $phone_icon['alt'];
                        $phone_icon_sticky = get_field('phone_icon_sticky','option');
                        $phone_img_sticky_src = $phone_icon_sticky['url'];
                        $phone_img_sticky_alt = $phone_icon_sticky['alt'];
                        $request_info_text = get_field('request_info_text','option');
                        $request_info_link = get_field('request_info_link','option');
                    ?>				
						<a class="logo" href="<?php echo $url; ?>">
							<img width="160" src="<?php echo $logo; ?>" alt="<?php echo $alt; ?>" class="logo-img">
							<img width="160" src="<?php echo $logo_sticky; ?>" alt="<?php echo $sticky_alt; ?>" class="white-logo-img">
						</a>
						<?php /* ?>
						<div class="visible-xs visible-sm">							
							<div class="dropdown phoneMenu">
								<button class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">	
									<img src="<?php echo $phone_img_src; ?>" alt="<?php echo $phone_img_alt; ?>">
								</button>
                                <?php if(have_rows('phone_number_repeater','option')) : ?>
								<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <?php
                                        while(have_rows('phone_number_repeater','option')) : the_row();
                                            $phone_number = get_field('phone_number');
                                            $country = get_field('country');
                                            echo '<li><a href="tel:'.$phone_number.'">'.$phone_number.'<span>'.$country.'</span></a></li>';
                                        endwhile;
                                    ?>
								</ul>
                                <?php endif; ?>
							</div>
						</div>
                        <?php */ ?>				
						
						<div class="menu-icon"><div class="menu-box"></div></div>
						<nav id="primary-navigation" class="site-navigation primary-navigation clearfix" role="navigation">
							<div class="enumenu_ul clearfix">								
                                <?php
                                    wp_nav_menu(array(
                                        'menu'=>'Main Menu',
                                        'theme_location'=>'primary',
                                        'container'=>'',
                                    ));
                                ?>
                                <?php //wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
								<div class="header-right">
                                    <?php
                                        wp_nav_menu(array(
                                            'menu'=>'Top Sub Nav Menu',
                                            'container'=>'',
                                            'theme_location'=>'top',
                                            'menu_class'=>'sublinks',
                                        ));
                                    ?>
                                    <!-- <ul class="sublinks">
                                        <li><a href="#" title="Calendar">Calendar</a></li>
                                        <li><a href="#" title="Blog">Blog</a></li>
                                        <li><a href="#" title="Contact">Contact</a></li>
                                        <li class="mobSearchIcon"><a href="#" title="Search" class="search-box-link"><span class="hidden-device">Search</span></a></li>
                                    </ul>   --> 
									<!--<a href="#" class="phoneIcon"><img src="<?php //echo get_template_directory_uri(); ?>/images/phone-icon-white.svg" alt=""></a>-->									
																				
										
									<a href="<?php echo $request_info_link; ?>" title="<?php echo $request_info_text; ?>" class="btn button cta-btn btn-arrow"><span><?php echo $request_info_text; ?></span> <em class="arrow-right"></em></a>
									<!-- Phone Menu -->
									<div class="hidden-device">
										<div class="dropdown phoneMenu">
										<button class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">	
											<img src="<?php echo $phone_img_src; ?>" alt="<?php echo $phone_img_alt; ?>" class="phone-icon-white">
											<img src="<?php echo $phone_img_sticky_src; ?>" alt="<?php echo $phone_img_sticky_alt; ?>" class="phone-icon">
										</button>
										<?php if(have_rows('phone_number_repeater','option')) : ?>
											<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
												<?php
													while(have_rows('phone_number_repeater','option')) : the_row();
														$phone_number = get_sub_field('phone_number');
														$country = get_sub_field('country');
		
														echo '<li><a href="tel:'.preg_replace('/\D+/', '', $phone_number).'">'.$phone_number.'<span>'.$country.'</span></a></li>';
													endwhile;
												?>
											</ul>
										<?php endif; ?>
									</div>
									</div>
									
								</div>	
							</div>
							<!-- Phone Menu -->
							<div class="visible-device">
								<div class="dropdown phoneMenu">
										<button class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">	
											<img src="<?php echo $phone_img_src; ?>" alt="<?php echo $phone_img_alt; ?>" class="phone-icon-white">
											<img src="<?php echo $phone_img_sticky_src; ?>" alt="<?php echo $phone_img_sticky_alt; ?>" class="phone-icon">
										</button>
										<?php if(have_rows('phone_number_repeater','option')) : ?>
											<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
												<?php
													while(have_rows('phone_number_repeater','option')) : the_row();
														$phone_number = get_sub_field('phone_number');
														$country = get_sub_field('country');
		
														echo '<li><a href="tel:'.preg_replace('/\D+/', '', $phone_number).'">'.$phone_number.'<span>'.$country.'</span></a></li>';
													endwhile;
												?>
											</ul>
										<?php endif; ?>
									</div>
							</div>								                        
						</nav>
					</div>            
                </div>                        
            </div>
        </div>
	</header><!-- / END : Header -->
    <div class="blankDiv"></div>
    
    <!-- Banner Slider -->
    <?php if(is_front_page() || is_page_template('template/home.php') || is_page_template('template/test.php')) :  ?>
   <div class="banner" id="slide1">
    <?php if(have_rows('home_image_slider',$id)) : ?>
        <div class="banner-slider slider-for">
            <?php
                while(have_rows('home_image_slider',$id)) : the_row();
                    $home_image_slider_image = get_sub_field('home_image_slider_image');
                    $img_src = $home_image_slider_image['url'];
                    $home_image_slider_sub_title = get_sub_field('home_image_slider_sub_title');
                    $home_image_slider_title = get_sub_field( 'home_image_slider_title' );
                    $home_image_slider_link_text = get_sub_field('home_image_slider_link_text');
                    $home_image_slider_link_url = get_sub_field('home_image_slider_link_url');
                    
            ?>
            <div style="background-image: url('<?php echo $img_src; ?>')">
                <div class="owl-caption">
                    <div class="container-lg">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-4">
                                <div class="caption-inner">
                                    <h2><small><?php echo $home_image_slider_sub_title; ?></small> <?php echo $home_image_slider_title; ?></h2>
                                    <a href="<?php echo $home_image_slider_link_url; ?>" title="<?php echo $home_image_slider_link_text; ?>" class="btn button btnWhite btn-arrow"><span><?php echo $home_image_slider_link_text; ?></span> <em class="arrow-right"></em></a>
                                </div>        
                            </div>   
                        </div>          
                    </div>
                </div>
            </div>
            <?php endwhile; ?>                
        </div>
        <div class="banner-slider slider-nav">
            <?php 
                $count = 0;
                while(have_rows('home_image_slider',$id)) : the_row();
                    $count++;
                    $home_image_slider_slide_number_title = get_sub_field( 'home_image_slider_slide_number_title' );
                    if($count<10){
                        $count = str_pad($count,2,"0",STR_PAD_LEFT);
                    } else {
                        $count = $count;
                    }

            ?>
            <div><div class="rightTringle"><i><?php echo $count; ?></i></div> <span><?php echo $home_image_slider_slide_number_title; ?></span></div>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>



		<div class="container">
        <div class="animate-scroll-link">
            <a href="#content" class="smooth-scroll"><em class="hidden-xs">Scroll Down</em> <span></span> <em class="hidden-xs">To Explore</em></a>
        </div>
		</div>
   </div><!-- / END : Banner -->
   <?php endif; ?>
	<div id="content" class="site-content">
        