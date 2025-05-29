<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

	</div><!-- .site-content -->



<footer>
	<div class="container">
		<div class="footer-top">
			<div class="row">
				<div class="col-sm-6 col-md-4">
					<?php
						$footer_logo = get_field('footer_logo','option');
						$footer_img_src = $footer_logo['url'];
						$footer_img_alt = $footer_logo['alt'];
						$footer_address = get_field('footer_address','option');
						$footer_phone_number = get_field('footer_phone_number','option');
						$newsletter_text = get_field( 'newsletter_text','option' );
						$news_letter_form_shortcode = get_field( 'news_letter_form_shortcode','option' );
					?>
					<a href="<?php echo site_url(); ?>" class="footer-logo"><img width="160" src="<?php echo $footer_img_src; ?>" alt="<?php echo $footer_img_alt; ?>"></a>
					<address>
						<?php 
						$footer_address = preg_replace('/<br \/>/iU', '', $footer_address);
						echo $footer_address; 
						?>
						<span class="phone-number"><a href="tel:<?php echo preg_replace('/\D+/', '', $footer_phone_number); ?>"><?php echo $footer_phone_number; ?></a></span>						
					</address>
					<?php if(have_rows('footer_social_icon','option')) : ?>
					<ul class="social-icons">
						<?php 
							while(have_rows('footer_social_icon','option')) : the_row();
								$social_icon_name = get_sub_field('social_icon_name');
								$social_icon_link = get_sub_field('social_icon_link');
								echo '<li><a href="'.$social_icon_link.'" title="'.$social_icon_name.'" target="_blank"><em class="fa fa-'.$social_icon_name.'"></em></a></li>'
						?>
						
						<?php endwhile; ?>
					</ul>
					<?php endif; ?>					
				</div>
				
				<?php if(have_rows('footer_menu','option')) : ?>
				<div class="col-sm-6 col-md-4">
					<div class="row">

						<?php 
							while(have_rows('footer_menu','option')) : the_row();
								$title = get_sub_field('title');
								$menu_name = get_sub_field('menu_name');
						?>
						<div class="col-xs-6">
							<div class="footer-links">
								<h5><?php echo $title ?></h5>
								<?php
									wp_nav_menu(array(
                                        'menu'=>$menu_name,
                                        'container'=>'',
                                        'menu_class'=>'',
                                    ));
								?>
							</div>
						</div>
						<?php endwhile; ?>
					</div>
				</div>
				<?php endif; ?>
				<div class="col-sm-6 col-md-4">
					<div class="footer-links newsletter">
						<h5><?php echo $newsletter_text ?></h5>
						<div class="form-group email-bar">
							<label>
								<?php 
									if(!empty($news_letter_form_shortcode)){
										echo do_shortcode($news_letter_form_shortcode);
									}
								?>
							</label>							
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 col-md-8 col-md-offset-4">
				<div class="footer-bottom">
					<ul>
						<li><?php echo '© '.date("Y").' All rights reserved by '.get_field('copy_right_text','option'); ?></li>
						<?php 
							if(have_rows('footer_bottom_links','option')) :
							$count = 0; 
								while(have_rows('footer_bottom_links','option')) : the_row();
									$footer_link_text = get_sub_field('footer_link_text');
									$footer_link_url = get_sub_field('footer_link_url');
									if($count == 2){
										$target = 'target="_blank"';
									} else {
										$target = "";
									}
									echo '<li><a href="'.$footer_link_url.'" title="'.$footer_link_text.'" '.$target.'>'.$footer_link_text.'</a></li>';
									$count++;
								endwhile;
							endif;
						?>
					</ul>				
					<a href="#page_top" title="BACK TO TOP" class="back-to-top-link">BACK TO TOP</a> 
				</div>
			</div>
		</div>
	</div>
</footer>


<?php wp_footer(); ?>

</body>
</html>
