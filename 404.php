<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main lightblue-bg" role="main">
			<div class="container">
				<div class="error-404 not-found ">					
					<div class="not-found-inner">
						<h1 class="page-title"><?php _e( '<div class="brLine">404:</div> Page not found', 'twentyfifteen' ); ?></h1>
						<div class="page-content">
							<p><?php _e( 'Sorry, we’re not able to find what you were looking for.', 'twentyfifteen' ); ?></p>
							<a href="<?php echo site_url(); ?>" title="Take Me Home" class="btn button btn-arrow"><span>Take Me Home</span> <em class="arrow-right"></em></a>
							<?php // get_search_form(); ?>
						</div><!-- .page-content -->
					</div>
				</div><!-- .error-404 -->
			</div>
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
