<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); 
?>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.mobSearchIcon').fadeOut();
	});
</script>

	
			<div class="lightblue-bg hero-banner">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<?php
								$s = $_GET['s'];
								$allsearch = new WP_Query("s=$s&showposts=-1");
								$key = wp_specialchars($s, 1);
								$count = $allsearch->post_count;
								//$count = 19;
								$page_count_in_admin = get_option('posts_per_page');
								//$page = (int)($count/$page_count_in_admin);
								if($count<=$page_count_in_admin){
									$count1 = $count;
								} else {
									$count1 = $page_count_in_admin;
								}
								global $wp_query;
								$number_of_pages = $wp_query->max_num_pages;
								$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
								$page_number = ' - Page '.$paged.' of '.$number_of_pages;
								
								 
							?>
							<h1><span><?php echo $count; ?> results</span> Search Results</h1>					
							<form role="search" method="get" class="search-form" action="http://172.16.0.189/project/young-judaea/">
								<input type="search" class="search-field form-control" placeholder="<?php echo $s; ?>" name="s" aria-describedby="basic-addon2" />
								<input type="submit" class="search-submit-btn screen-reader-text" value="" />
							</form>
								
						</div>
					</div>
				</div>
			</div>
			
			<div class="container">	
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="results">
							<?php if($count > 0){ ?>
							<h6>Showing <?php echo $count1; ?> out of <?php echo $count; ?> Results for ”<?php echo $s; ?>” <?php echo $page_number; ?> </h6>
							<?php } ?>
							
							<?php
								/*$args = array(
									'post_type' =>
								);*/
							?>
							
						<?php if ( have_posts() ) : ?>
				
							<!-- <header class="page-header">
								<h1 class="page-title"><?php //printf( __( 'Search Results for: %s', 'twentyfifteen' ), get_search_query() ); ?></h1>
							</header><!-- .page-header -->
				
							<?php
							// Start the loop.
							echo '<ul>';
							while ( have_posts() ) : the_post(); ?>
				
								<?php
								/*
								 * Run the loop for the search to output the results.
								 * If you want to overload this in a child theme then include a file
								 * called content-search.php and that will be used instead.
								 */
								get_template_part( 'content', 'search' );
				
							// End the loop.
							endwhile;
							echo '</ul>';
				
							// Previous/next page navigation.
							the_posts_pagination( array(
								'prev_text'          => __( '', 'twentyfifteen' ),
								'next_text'          => __( '', 'twentyfifteen' ),
								'mid_size' => 3,
								'screen_reader_text' => __( '', 'twentyfifteen' ),
								'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( '', 'twentyfifteen' ) . ' </span>',
							) );
				
						// If no content, include the "No posts found" template.
						else :
							//get_template_part( 'content', 'none' );
							?>
								<header class="page-header">
									<h1 class="page-title"><?php _e( 'Nothing Found', 'twentyfifteen' ); ?></h1>
								</header><!-- .page-header -->
							<?php
				
						endif;
						?>
						
						</div>
					</div>
				</div>
			</div>
		

<?php get_footer(); ?>
