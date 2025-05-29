<?php
/*
Template Name: test
*/
get_header('test');
global $post;
$id = $post->ID;
if(wp_get_post_parent_id( $id )){
	$id = wp_get_post_parent_id( $id );
}
$ajaxify = get_field('ajaxify',$id);
$args = array(
	'child_of' => $id,
);
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on" ? "https://" : "http://";
$page_uri = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
if($page_uri == get_permalink($id)){
	$class = "active";
} else {
	$class = "";
}
$pages = get_pages( $args );
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


/*$page_perma = get_permalink($id);
echo '<a href="'.$page_perma.'" id="page_id">'.get_the_title($id).'</a>';
wp_list_pages($args);*/

?>
<div class="abc">
	<?php
if(have_posts()) : 
	while(have_posts()) : the_post();
		the_title();
		the_content();
	endwhile;
endif;
?>
</div>
<?php
get_footer();