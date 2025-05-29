<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); 
global $post;
$id = $post->ID;
if(wp_get_post_parent_id( $id )){
	$id = wp_get_post_parent_id( $id );
}

?>
<div class="programs-top">
	<div class="container">
		<div class="row">
			<div class="col-sm-7 col-md-5">
				<div class="narrowCol">
					<?php
					$program_post_title = get_field('program_post_title',$id);
					$program_post_sub_title = get_field('program_post_sub_title',$id);
					$program_post_content = get_field('program_post_content',$id);
					$program_post_contatc_us_text = get_field('program_post_contatc_us_text',$id);
					$program_post_contact_us_link = get_field('program_post_contact_us_link',$id);
					$program_post_age = get_field('program_post_age',$id);
					$program_post_location = get_field('program_post_location',$id);
					$program_post_duration = get_field('program_post_duration',$id);
					$program_post_link_text = get_field('program_post_link_text',$id);
					$program_post_link_url = get_field('program_post_link_url',$id);

					$register_box_register_text = get_field('register_box_register_text',$id);
					$register_box_content = get_field('register_box_content',$id);
					$register_box_link_text = get_field('register_box_link_text',$id);
					$register_box_link_url = get_field('register_box_link_url',$id);
					$israel_programs_text = get_field('israel_programs_text',$id);
					$israel_programs_url = get_field('israel_programs_url',$id);
					$register_box_image = get_field('register_box_image',$id);
					

					$thumb_id = get_post_thumbnail_id( $id );
					$feaute_img = wp_get_attachment_image_src( $thumb_id,'full' );
					$feaute_img = $feaute_img[0];
					$alt = get_post_meta($thumb_id,'_wp_attachment_image_alt',true);
					$first_post = get_field('program_child_post_number',$id);
					?>
					<h1><span><?php echo $program_post_sub_title; ?></span> <?php echo $program_post_title; ?></h1>
					<?php echo $program_post_content; ?>
					<a href="<?php echo $program_post_contact_us_link; ?>" title="<?php echo $program_post_contatc_us_text; ?>" class="link"><span><?php echo $program_post_contatc_us_text; ?></span></a>
				</div>
			</div>
			<!-- PROGRAM DETAILS -->
			<div class="col-sm-5 col-md-4 col-md-offset-3">
				<div class="blue-box hidden-xs">
                    <?php if(!empty($program_post_age) || !empty($program_post_location) || !empty($program_post_duration)) : ?>
					<ul class="event-detail-list">
                        <?php if(!empty($program_post_age)) { ?>								
						<li><span class="label-title">ages</span> <?php echo $program_post_age; ?></li>
                        <?php } if(!empty($program_post_location)) { ?>
						<li><span class="label-title">location</span> <?php echo $program_post_location; ?></li>
                        <?php } if(!empty($program_post_duration)) { ?>
						<li><span class="label-title">duration</span> <?php echo $program_post_duration; ?></li>
                        <?php } ?>
					</ul>
                    <?php endif; ?>
					<?php if(!empty($program_post_link_text)) : ?>
					<a href="<?php echo $program_post_link_url; ?>" title="<?php echo $program_post_link_text; ?>" class="btn button btn-arrow"><span><?php echo $program_post_link_text; ?></span> <em class="arrow-right"></em></a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php if(!empty($feaute_img)) :  ?>
<div class="container-lg discovery-banner">
	<img src="<?php echo $feaute_img; ?>" alt="<?php echo $alt; ?>" class="responsive-img">
</div>
<?php endif; ?>
<div class="container-lg">
	<div class="blue-box visible-xs">
		<ul class="event-detail-list">								
			<li><span class="label-title">time</span> <?php echo $program_post_age; ?></li>
			<li><span class="label-title">location</span> <?php echo $program_post_location; ?></li>
			<li><span class="label-title">duration</span> <?php echo $program_post_duration; ?></li>
		</ul>
		<?php if(!empty($program_post_link_text)) : ?>
		<a href="<?php echo $program_post_link_url; ?>" title="<?php echo $program_post_link_text; ?>" class="btn button btn-arrow"><span><?php echo $program_post_link_text; ?></span> <em class="arrow-right"></em></a>
		<?php endif; ?>
	</div>
</div>

<!--Horizontal Tab-->
<div id="SectionContent"></div>
    <div class="horizontalTab-wrapper">
        <div id="horizontalTab" class="mobile-dropdown">
        	<?php
        		//$ajaxify = get_field('ajaxify',$id);
        		$args = array(
        			//'post_parent' => $id,
        		    'posts_per_page' => -1,
        		    'post_type' => 'programs',
        		    'orderby'=>'meta_value',
        		    'order' => 'ASC',
        		    'meta_key' => 'program_child_post_number',
                    'post_parent' => $id,
        		        /*'meta_query' => array(
        		    		array(
        		    	        'key'		=> 'program_child_post_number',
        		    	    ),
        		        ),*/
        		);
        		$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on" ? "https://" : "http://";
        		$page_uri = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        		if($page_uri == get_permalink($id)){
        			$class = "active";
        		} else {
        			$class = "";
        		}
        		$pages = get_posts( $args );
        		$nonce = wp_create_nonce('ajaxify_pages');
        		//var_dump($pages);
        		echo '<div class="container-lg">';
				echo '<div class="program-stikey-nav">';
        		echo '<ul class="resp-tabs-list page-ajax">';
        		//echo '<li><a href="'.get_permalink($id).'" rel="'.$id.'" class="page-ajax '.$class.'" data-nonce="'.$nonce.'">'.get_the_title($id).'</a></li>';
        		$tab_title = get_field('program_tab_title',$post->ID);
        			if(!empty($tab_title)){
        				$page_title = $tab_title;
        			} else {
        				$page_title = get_the_title($post->ID);
        			}
        		echo '<span class="mobile-dropdown__mobile-active">'.$page_title.'</span>';
                echo '<li style="display:inline-block;"><a href="'.get_permalink($id).'" rel="'.$id.'" class="page-ajax '.$class.'" data-nonce="'.$nonce.'">'.get_the_title($id).'</a></li>';
        		foreach($pages as $child_page){
        			$child_page_id = $child_page->ID;
        			//var_dump($pages);
        			$tab_title = get_field('program_tab_title',$child_page->ID);
        			if(!empty($tab_title)){
        				$child_page_title = $tab_title;
        			} else {
        				$child_page_title = get_the_title($child_page_id);
        			}
        			$child_page_permalink = get_permalink($child_page_id);
        			
        			echo '<li style="display:inline-block;"><a href="'.$child_page_permalink.'" rel="'.$child_page_id.'" class="page-ajax '.$class.'" data-nonce="'.$nonce.'">'.$child_page_title.'</a></li>';
        		}
        		echo '</ul>';
        		echo '</div>';
				echo '</div>';
        	?> 
        </div>
    </div>
        <div class="program-data">
        	
	            <?php 
	            	if(have_posts()) : 
	            		while(have_posts()) : the_post();
	            			//the_title();
	            			$content = apply_filters( 'the_content', get_the_content() );
							//$content = preg_replace('/<br \/>/iU', '', $content);
	            			//the_content();
                            ?>
                            <div class="typography">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-8 col-md-offset-2">
                                        <?php echo $content; ?>
                                        </div>
                                    </div>
                                </div>  
                            </div>              
                            <?php
	            		endwhile;
	            	endif
	            ?>
            
            <?php
                $style_radio_option = get_field('style_radio_option',$id);
                if($style_radio_option == 'flexible'){
                    require get_template_directory() . '/include/stylesheet_page_flexible_content.php';
                    //echo "flexible";  
                } 
                if($style_radio_option == 'shortcode') {
                    $shortcode_content = get_field('shortcode_content',$id);
                    $shortcode_content = preg_replace('/<br \/>/iU', '', $shortcode_content);
                    echo $shortcode_content;
                }
            ?>
        </div>

            <div class="container-lg register-cta-bg" style="background:url(<?php echo $register_box_image ?>) no-repeat 0 100px">
            	<div class="container">
            		<div class="register-cta">
            			<div class="row">
            				<div class="col-md-10 col-md-offset-1">
            					<div class="register-inner">
            						<div class="register-caption">
            							<h2><?php echo $register_box_register_text; ?></h2>						
            							<?php echo $register_box_content; ?>
            						</div>
            						<div class="register-caption text-right">
            							<?php if(!empty($register_box_link_text)) : ?>
            							<a href="<?php echo $register_box_link_url; ?>" title="<?php echo $register_box_link_text; ?>" class="btn button btn-arrow"><span><?php echo $register_box_link_text; ?></span> <em class="arrow-right"></em></a>
            							<?php endif; ?>
            						</div>
            					</div>
            				</div>
            			</div>
            		</div>
            	</div>
            </div>
            
            <!-- BOTTOM BUTTON -->
            <div class="container">
            	<?php if(!empty($israel_programs_text)) : ?>
            	<div class="bottom-button">
            		<a href="<?php echo $israel_programs_url; ?>" title="<?php echo $israel_programs_text; ?>" class="link"><span><?php echo $israel_programs_text; ?></span></a>
            	</div>
            	<?php endif; ?>
            </div>
<?php
/*$ajaxify = get_field('ajaxify',$id);
$args = array(
	'post_parent' => $id,
    'posts_per_page' => -1,
    'post_type' => 'programs',
);
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on" ? "https://" : "http://";
$page_uri = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
if($page_uri == get_permalink($id)){
	$class = "active";
} else {
	$class = "";
}
$pages = get_posts( $args );
$nonce = wp_create_nonce('ajaxify_pages');
//var_dump($pages);
echo '<ul class="page-ajax">';
echo '<li style="display:inline-block;"><a href="'.get_permalink($id).'" rel="'.$id.'" class="page-ajax '.$class.'" data-nonce="'.$nonce.'">'.get_the_title($id).'</a></li>';
foreach($pages as $child_page){
	$child_page_id = $child_page->ID;
	$child_page_permalink = get_permalink($child_page_id);
	$child_page_title = get_the_title($child_page_id);
	echo '<li style="display:inline-block;"><a href="'.$child_page_permalink.'" rel="'.$child_page_id.'" class="page-ajax '.$class.'" data-nonce="'.$nonce.'">'.$child_page_title.'</a></li>';
}
echo '</ul>';
*/

/*$page_perma = get_permalink($id);
echo '<a href="'.$page_perma.'" id="page_id">'.get_the_title($id).'</a>';
wp_list_pages($args);*/

?>
<!-- <div class="abc">
	<?php
/*if(have_posts()) : 
	while(have_posts()) : the_post();
		the_title();
		the_content();
	endwhile;
endif;*/
?>
</div> -->
<?php get_footer(); ?>
