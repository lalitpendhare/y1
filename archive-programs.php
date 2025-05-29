<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
//get_header(); 
	$args = array(
		'post_type' => 'programs',
		'post_status' => 'publish',
		'posts_per_page' => 1,
		'order' => 'asc'
	);
	$posts = get_posts($args);
	$site_url = site_url();	
	$redirect_url = get_permalink(wp_get_post_parent_id(($posts[0]->ID)));
	if(!empty($redirect_url)){
		wp_redirect( $redirect_url, $status );
		exit;
	} else {
		wp_redirect( $site_url, $status );
		exit;
	}
 ///get_footer(); 