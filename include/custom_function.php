<?php

//Admin Logo

function my_login_logo() {
    ?>
    <style type="text/css">
        .login h1 a {
            <?php $login_image = get_field('admin_page_logo', 'option'); if(!empty($login_image)) : $logo = $login_image['url']; endif; ?>
            <?php if(!empty($logo)) :  ?>
            background-image: url(<?php echo $logo; ?>) !important;
            <?php else :  ?>
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/backnd-logo.png) !important;
            <?php endif; ?>          
            padding-bottom: 20px;
            background-size: 100% auto!important;
            width: 100%;
            background-size: auto !important;
            background-position: center top;
            background-repeat: no-repeat;
            color: #444;
            height: 174px !important;
            font-size: 20px;
            line-height: 1.3em;
            margin: 0 auto 25px;
            padding: 0;
            text-decoration: none;
            width: 100% !important;
            text-indent: -9999px;
            outline: 0;
            display: block;
            background-size: 100% !important;
        }
    </style>
    <?php
}

add_action('login_enqueue_scripts', 'my_login_logo');

//Admin Logo URL

function loginpage_custom_link() {
    return home_url();
}

add_filter('login_headerurl', 'loginpage_custom_link');

//SVG image support

function add_svg_to_upload_mimes($upload_mimes) {
    $upload_mimes['svg'] = 'image/svg+xml';
    $upload_mimes['svgz'] = 'image/svg+xml';
    return $upload_mimes;
}
add_filter('upload_mimes', 'add_svg_to_upload_mimes', 10, 1);

/** 
 * ACF Theme Option.
 */

if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Theme Option',
        'menu_title' => 'Theme Option',
        'menu_slug' => 'theme-option',
        'capability' => 'edit_posts',
        'redirect' => true
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Theme Header Settings',
        'menu_title' => 'Header',
        'parent_slug' => 'theme-option',
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Theme Footer Settings',
        'menu_title' => 'Footer',
        'parent_slug' => 'theme-option',
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Feature Post',
        'menu_title' => 'Feature Post',
        'parent_slug' => 'theme-option',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Stylesheet Option',
        'menu_title' => 'Stylesheet Option',
        'parent_slug' => 'theme-option',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Video Option',
        'menu_title' => 'Video Option',
        'parent_slug' => 'theme-option',
    ));
}
add_filter('widget_text', 'do_shortcode');

$post_per_page = get_option('posts_per_page');
function blog_posts(){
    ob_start();
    $html = '';
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $post_per_page,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
    );
    $query = new wp_query($args);
    if($query->have_posts()) : 
        while($query->have_posts()) : $query->the_post();
        $image = get_the_post_thumbnail_url();
        $link = get_the_permalink();
        if(!empty($link)){ $link = esc_url($link); }
        $title = get_the_title();
        if(!empty($title)){ $title = esc_html($title); }
        $date = get_the_date('jS F Y');
        if(!empty($date)){ $date = esc_html($date); }
        //$content = get_the_excerpt();
        $html .= '<div class="col-md-4 col-sm-4 col-xs-12">';
        $html .= '<div class="post-member">';
        $html .= '<a href="'.$link.'">';
        $html .= '<div class="post-img">';
        $html .= '<img src="'.$image.'" alt="">';
        $html .= '</div>';
        $html .= '<h4>' .$title.'</h4>';
        $html .= '</a>';
        $html .= '<span>'.$date.'</span>';
        $html .= '<p>'.$content.'</p>';
        $html .= '</div>';
        $html .= '</div>';
    endwhile;
        echo $html;    
    endif;
    return ob_get_clean();
    wp_reset_query();
}
add_shortcode( 'blog_posts', 'blog_posts' );

function get_custom_related_post(){
   ob_start();
   global $post;
   $id = $post->ID;
   $html = '';
   $cat = get_the_category($id);
   foreach( $cat as $cat_id){
       $cat_value[] = $cat_id->term_id;
   }
   //$id = array($id);
   //print_r($id);
   //print_r($cat_value);
   $arg = array(
       'post_type' => 'post',
       'status' => 'publish',
       'category__in' => $cat_value,
       'post__not_in' => array($id),
   );
   $query = new wp_query($arg);
   if($query->have_posts()) {
    $html .= '<ul>';
    while($query->have_posts()){
        $query->the_post();
        $permalink = get_the_permalink();
        $title = get_the_title();
        $date = get_the_date('M d, Y');
        $html .= '<li class="post_list"><a href="'.$permalink.'">'.$title.' <span class="dateposted">Posted '.$date.'</span></a></li>';
    }
    $html .= '</ul>';
    echo $html;
   }
   return ob_get_clean();
   wp_reset_query();
}
add_shortcode( 'custom_releted_post', 'get_custom_related_post' );


function custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
function excerpt_more( $more ) {
    global $post;
    if(is_archive()){
        return ' <a href="'. get_permalink($post->ID) . '"> Read More</a>.';
    } else {
        return '';
    }
    
}
add_filter( 'excerpt_more', 'excerpt_more' );

add_action('admin_head', 'ACF_rgba_custom_css');

function ACF_rgba_custom_css() {
  echo '<style> .rgbatext{ margin:7px 0 0 -3px; } .minicolors-theme-default.minicolors{ margin-right: 5px; } </style>';
}

add_filter( 'style_loader_src',  'remove_css_n_js_version_number', 9999, 2 );
add_filter( 'script_loader_src', 'remove_css_n_js_version_number', 9999, 2 );

function remove_css_n_js_version_number( $src, $handle ) 
{
    $handles_with_version = [ 'style' ]; // <-- Adjust to your needs!

    if ( strpos( $src, 'ver=' ) && ! in_array( $handle, $handles_with_version, true ) )
        $src = remove_query_arg( 'ver', $src );

    return $src;
}

add_action( 'init', 'create_event_posttype', 0 ); 
function create_event_posttype() {
 
    $labels = array(
        'name'                => _x( 'Event', 'Post Type General Name', 'twentythirteen' ),
        'singular_name'       => _x( 'Event', 'Post Type Singular Name', 'twentythirteen' ),
        'menu_name'           => __( 'Events', 'twentythirteen' ),
        'parent_item_colon'   => __( 'Parent Event', 'twentythirteen' ),
        'all_items'           => __( 'All Events', 'twentythirteen' ),
        'view_item'           => __( 'View Event', 'twentythirteen' ),
        'add_new_item'        => __( 'Add New Event', 'twentythirteen' ),
        'add_new'             => __( 'Add New', 'twentythirteen' ),
        'edit_item'           => __( 'Edit Event', 'twentythirteen' ),
        'update_item'         => __( 'Update Event', 'twentythirteen' ),
        'search_items'        => __( 'Search Event', 'twentythirteen' ),
        'not_found'           => __( 'Not Found', 'twentythirteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
    );
     
    $args = array(
        'label'               => __( 'events', 'twentythirteen' ),
        'description'         => __( 'Event', 'twentythirteen' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        'taxonomies'          => array( 'event-cat' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'rewrite' => array( 'slug' => 'events', 'with_front'=> false ),
        'capability_type'     => 'page',
    );
    register_post_type( 'events', $args );
}
add_action( 'init', 'create_event_category_for_event_posttype', 0 );
function create_event_category_for_event_posttype() {
      $labels = array(
        'name' => _x( 'Categories', 'taxonomy general name' ),
        'singular_name' => _x( 'Category', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Categories' ),
        'all_items' => __( 'All Categories' ),
        'parent_item' => __( 'Parent category' ),
        'parent_item_colon' => __( 'Parent category:' ),
        'edit_item' => __( 'Edit category' ), 
        'update_item' => __( 'Update category' ),
        'add_new_item' => __( 'Add New category' ),
        'new_item_name' => __( 'New category Name' ),
        'menu_name' => __( 'Categories' ),
      );    
     
      register_taxonomy('event-cat',array('events'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'event-cat' ),
      ));  
}
add_action( 'init', 'create_program_posttype', 0 );
function create_program_posttype() {
 
    $labels = array(
        'name'                => _x( 'Program', 'Post Type General Name', 'twentythirteen' ),
        'singular_name'       => _x( 'Program', 'Post Type Singular Name', 'twentythirteen' ),
        'menu_name'           => __( 'Programs', 'twentythirteen' ),
        'parent_item_colon'   => __( 'Parent Program', 'twentythirteen' ),
        'all_items'           => __( 'All Programs', 'twentythirteen' ),
        'view_item'           => __( 'View Program', 'twentythirteen' ),
        'add_new_item'        => __( 'Add New Program', 'twentythirteen' ),
        'add_new'             => __( 'Add New', 'twentythirteen' ),
        'edit_item'           => __( 'Edit Program', 'twentythirteen' ),
        'update_item'         => __( 'Update Program', 'twentythirteen' ),
        'search_items'        => __( 'Search Program', 'twentythirteen' ),
        'not_found'           => __( 'Not Found', 'twentythirteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
    );
     
    $args = array(
        'label'               => __( 'programs', 'twentythirteen' ),
        'description'         => __( 'Program', 'twentythirteen' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields','page-attributes' ),
        'taxonomies'          => array( 'program-cat' ),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
        'rewrite' => array( 'slug' => 'programs', 'with_front'=> false ),
    );
    register_post_type( 'programs', $args );
}
add_action( 'init', 'create_program_category_for_program_posttype', 0 );
function create_program_category_for_program_posttype() {
      $labels = array(
        'name' => _x( 'Categories', 'taxonomy general name' ),
        'singular_name' => _x( 'Category', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Categories' ),
        'all_items' => __( 'All Categories' ),
        'parent_item' => __( 'Parent category' ),
        'parent_item_colon' => __( 'Parent category:' ),
        'edit_item' => __( 'Edit category' ), 
        'update_item' => __( 'Update category' ),
        'add_new_item' => __( 'Add New category' ),
        'new_item_name' => __( 'New category Name' ),
        'menu_name' => __( 'Categories' ),
      );    
     
      register_taxonomy('program-cat',array('programs'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'program-cat' ),
      ));  
}

add_action( 'init', 'create_stylesheet_posttype', 0 ); 
function create_stylesheet_posttype() {
 
    $labels = array(
        'name'                => _x( 'Stylesheet', 'Post Type General Name', 'twentythirteen' ),
        'singular_name'       => _x( 'Stylesheet', 'Post Type Singular Name', 'twentythirteen' ),
        'menu_name'           => __( 'Stylesheets', 'twentythirteen' ),
        'parent_item_colon'   => __( 'Parent Stylesheet', 'twentythirteen' ),
        'all_items'           => __( 'All Stylesheets', 'twentythirteen' ),
        'view_item'           => __( 'View Stylesheet', 'twentythirteen' ),
        'add_new_item'        => __( 'Add New Stylesheet', 'twentythirteen' ),
        'add_new'             => __( 'Add New', 'twentythirteen' ),
        'edit_item'           => __( 'Edit Stylesheet', 'twentythirteen' ),
        'update_item'         => __( 'Update Stylesheet', 'twentythirteen' ),
        'search_items'        => __( 'Search Stylesheet', 'twentythirteen' ),
        'not_found'           => __( 'Not Found', 'twentythirteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
    );
     
    $args = array(
        'label'               => __( 'stylesheets', 'twentythirteen' ),
        'description'         => __( 'Stylesheet', 'twentythirteen' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        'taxonomies'          => array( 'stylesheet-cat' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
        'rewrite' => array( 'slug' => 'stylesheets', 'with_front'=> false ),
    );
    register_post_type( 'stylesheets', $args );
}
add_action( 'init', 'create_stylesheet_category_for_event_posttype', 0 );
function create_stylesheet_category_for_event_posttype() {
      $labels = array(
        'name' => _x( 'Categories', 'taxonomy general name' ),
        'singular_name' => _x( 'Category', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Categories' ),
        'all_items' => __( 'All Categories' ),
        'parent_item' => __( 'Parent category' ),
        'parent_item_colon' => __( 'Parent category:' ),
        'edit_item' => __( 'Edit category' ), 
        'update_item' => __( 'Update category' ),
        'add_new_item' => __( 'Add New category' ),
        'new_item_name' => __( 'New category Name' ),
        'menu_name' => __( 'Categories' ),
      );    
     
      register_taxonomy('stylesheet-cat',array('stylesheets'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'stylesheet-cat' ),
      ));  
}

add_action( 'widgets_init', 'register_blog_sidebar' );
function register_blog_sidebar() {
    register_sidebar( array(
        'name' => __( 'Blog Sidebar', 'theme-slug' ),
        'id' => 'blog-sidebar',
        'description' => __( 'Widgets in this area will be shown on all single blog posts.', 'theme-slug' ),
        'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h3 class="widgettitle">',
    'after_title'   => '</h3>',
    ) );
}

function empty_content($str) {
    return trim(str_replace('&nbsp;','',strip_tags($str,'<img>'))) == '';
}

function filter_post_link($permalink, $post) {
    global $post;
    if ($post->post_type != 'post'){
        return $permalink;
    } else {
        return 'blog'.$permalink;   
    }
}
//add_filter('pre_post_link', 'filter_post_link', 10, 2);
/*
* Custom Blog URl 
*/
//add_action( 'generate_rewrite_rules', 'add_blog_rewrites' );
function add_blog_rewrites( $wp_rewrite ) {
    $wp_rewrite->rules = array(
        'blog/([^/]+)/?$' => 'index.php?name=$matches[1]',
        'blog/[^/]+/attachment/([^/]+)/?$' => 'index.php?attachment=$matches[1]',
        'blog/[^/]+/attachment/([^/]+)/trackback/?$' => 'index.php?attachment=$matches[1]&tb=1',
        'blog/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$' => 'index.php?attachment=$matches[1]&feed=$matches[2]',
        'blog/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$' => 'index.php?attachment=$matches[1]&feed=$matches[2]',
        'blog/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$' => 'index.php?attachment=$matches[1]&cpage=$matches[2]',
        'blog/([^/]+)/trackback/?$' => 'index.php?name=$matches[1]&tb=1',
        'blog/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$' => 'index.php?name=$matches[1]&feed=$matches[2]',
        'blog/([^/]+)/(feed|rdf|rss|rss2|atom)/?$' => 'index.php?name=$matches[1]&feed=$matches[2]',
        'blog/([^/]+)/page/?([0-9]{1,})/?$' => 'index.php?name=$matches[1]&paged=$matches[2]',
        'blog/([^/]+)/comment-page-([0-9]{1,})/?$' => 'index.php?name=$matches[1]&cpage=$matches[2]',
        'blog/([^/]+)(/[0-9]+)?/?$' => 'index.php?name=$matches[1]&page=$matches[2]',
        'blog/[^/]+/([^/]+)/?$' => 'index.php?attachment=$matches[1]',
        'blog/[^/]+/([^/]+)/trackback/?$' => 'index.php?attachment=$matches[1]&tb=1',
        'blog/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$' => 'index.php?attachment=$matches[1]&feed=$matches[2]',
        'blog/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$' => 'index.php?attachment=$matches[1]&feed=$matches[2]',
        'blog/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$' => 'index.php?attachment=$matches[1]&cpage=$matches[2]',
    ) + $wp_rewrite->rules;
}

function ajaxify_pages(){
    $page_id = $_POST['page_id'];
    $nonce = $_POST['nonce'];
    //echo get_the_content( $more_link_text = null, $strip_teaser = false );
    //echo $nonce;
    if ( !wp_verify_nonce( $nonce, "ajaxify_pages")) {
      exit("Nonce Not Verify");
    }
        /*$the_query  = new WP_Query(array('p' => $page_id, 'post_type'=>'page'));
        if ($the_query->have_posts()) {
            while ( $the_query->have_posts() ) {
                $the_query->the_post();
                $data = '
                <div class="post-container">
                    <div id="project-content">
                        <h1 class="entry-title">' . get_the_title() . '</h1>
                        <div class="entry-content">' . get_the_content() . '</div>
                    </div>
                </div>  
                ';
            }
        }
        else {
            // Since you're declared the $data variable before then assign the next value also in $data
            // And at the end just echo it.
            $data = '<div id="postdata">'.__('Didnt find anything').'</div>';
        }
        wp_reset_postdata();

        echo '<div id="postdata">'. $data .'</div>';*/
        //$my_postid = 12;//This is page id or post id
        $content_post = get_post($page_id);
        $args = array(
            'post_type' => 'programs',
            'p'=> $page_id,
        );
        $query = new wp_query($args);
            if($query->have_posts()) : 
                $html = '';
                while($query->have_posts()) : $query->the_post();
                    //the_title();
                    $html .= '<script>
                                jQuery(document).ready(function(){
                                    jQuery("p").each(function() {
                                        var $this = jQuery(this);
                                        if($this.html().replace(/\s|&nbsp;/g, "").length == 0)
                                            $this.remove();
                                    });
                                });
                            </script>';
                    $content = "";
                    $content = apply_filters( 'the_content', get_the_content() );
                    //$content = str_replace("<p></p>","",$content);
                    $content = preg_replace('/<br \/>/iU', '', $content);
                    //trim($conten);
                    //the_content();
                    $content = wpautop($content);
                    $html .= '<div class="typography">';
                    $html .= '<div class="container">';
                    $html .= '<div class="row">';
                    $html .= '<div class="col-md-8 col-md-offset-2">';
                    $html .= $content;
                    $html .= '</div>';
                    $html .= '</div>';
                    $html .= '</div>';
                    $html .= '</div>';
                    $style_radio_option = get_field('style_radio_option',$page_id);
                    if($style_radio_option == 'flexible'){
                        echo $html;
                        require get_template_directory() . '/include/stylesheet_page_flexible_content.php';
                        //echo "flexible";  
                    } 
                    if($style_radio_option == 'shortcode') {
                        $shortcode_content = get_field('shortcode_content',$page_id);
                        $shortcode_content = preg_replace('/<br \/>/iU', '', $shortcode_content);
                        $html .= $shortcode_content;
                        echo $html;
                    }
                endwhile;
            endif;
        //$content = $content_post->post_content;
        //$content = apply_filters('the_content', $content);
        //$content = str_replace("<p></p>"," ",$content);
        //$content = str_replace(']]>', ']]&gt;', $content);
        //$content = preg_replace('/<br \/>/iU', '', $content);
        //echo $content;
            //echo $html;
        wp_reset_query();
    die();
}
add_action('wp_ajax_ajaxify_pages','ajaxify_pages');
add_action('wp_ajax_nopriv_ajaxify_pages','ajaxify_pages');

function program_category_dropdown(){
    $cat_id = $_POST['cat_id'];
    if(!empty($cat_id) && $cat_id != "Age"){
        $tax_query = array(
                array(
                    'taxonomy' => 'program-cat',
                    'field'    => 'term_id',
                    'terms'    => $cat_id,
                )
            );
        $args = array(
            'post_type' => 'programs',
            'tax_query' => $tax_query,
        );
        $query = new wp_query($args);
        $html = '<select class="selectpicker program-box" title="Programs" data-width="100%">';
        $html .= '<option data-hidden="true"></option>';
        if($query->have_posts()){
            while($query->have_posts()) {
                $query->the_post();
                $title = get_the_title();
                $id = get_the_id();
                $html .= '<option value="'.$id.'">'.$title.'</option>';
            }
        }
        $html .= '</select>';                    
    } else {
        $html = '<select class="selectpicker program-box" title="Programs" disabled="true" data-width="100%">';
        $html .= '<option data-hidden="true"></option>';
        $html .= '</select>';
    }
    echo $html;
    die();
    
}
add_action('wp_ajax_program_category_dropdown','program_category_dropdown');
add_action('wp_ajax_nopriv_program_category_dropdown','program_category_dropdown');

function program_post_dropdown(){
    $program_id = $_POST['program_id'];
    if(!empty($program_id) && $program_id != "Programs"){
        $permalink = get_permalink($program_id);
        $html = '<a href="'.$permalink.'" type="button" target="_blank" title="View Program" class="btn btn-block view-btn">View Program</a>';
    } else {
        $html = '<a href="#" type="button" title="View Program" class="btn btn-block view-btn disabled">View Program</a>';
    }
    echo $html;
    die();
}
add_action('wp_ajax_program_post_dropdown','program_post_dropdown');
add_action('wp_ajax_nopriv_program_post_dropdown','program_post_dropdown');


function admin_custom_js_enqueue_script(){
    wp_enqueue_script( 'admin-script', get_template_directory_uri().'/js/admin.js', array(), $ver = false, $in_footer = false );
}
add_action('admin_enqueue_scripts','admin_custom_js_enqueue_script');

function limited_string($x, $length)
{
  if(strlen($x)<=$length)
  {
    return $x;
  }
  else
  {
    $y=substr($x,0,$length) . '...';
    return $y;
  }
}


/*----- Container section ----*/

function container_shortcode( $atts, $content = null ) {
   extract( shortcode_atts( array(
      ), $atts ) );
   return ' <div class="container">
            '.do_shortcode($content).'
            </div>';
}
add_shortcode('container', 'container_shortcode');

/*******************************************/

/*----- Typography section ----*/

function typography_shortcode( $atts, $content = null ) {
   extract( shortcode_atts( array(
      ), $atts ) );
   return ' <div class="typography">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                    '.do_shortcode($content).'
                    </div>
                </div>
            </div>';
}
add_shortcode('typography', 'typography_shortcode');

/*******************************************/

/*----- Blockquote section ----*/

function blockqoute_shortcode( $atts, $content = null ) {
   extract( shortcode_atts( array(
        'cite' => 'cite',
        'image' => '',
        'type' => '',
        'class' => '',
      ), $atts ) );
        if(empty($image)){
            $image_class = 'text_quote';
        } else {
            $image_class = '';
        }
   if(!empty($type) && $type="top_image"){
     return '<div class=" '.$class.'">
                <div class="container">
                    <div class="row">              
                        <div class="lightblue-bg">
                            <blockquote class="testimonial-quote '.$image_class.'">
                                <figure class="quoteImg"><img src="'.$image.'" /></figure>
                                <span>'.$cite.'</span>
                                <p>“'.do_shortcode($content).'”</p>  
                            </blockquote>                   
                        </div>
                    </div>
                </div>
            </div>';
   } else if(!empty($image) && $type="side_image" ){
        return '
                    <div class="container '.$class.'">
                         <div class="quote">
                             <div class="row">
                                <div class="col-md-7 quote-col">
                                     <blockquote>
                                         <p>'.do_shortcode($content).'</p>
                                         <span>'.$cite.'</span>
                                     </blockquote>
                                </div>
                                <div class="col-md-5 hidden-sm hidden-xs quote-col">
                                    <div class="quote-bg" style="background-image: url('.$image.');"></div>
                                </div>
                            </div>
                         </div>
                    </div>
                ';
   } else {
        return '<div class="blockquote-sec '.$class.'">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <blockquote>
                                    <p>'.do_shortcode($content).'</p>
                                    <span>– '.$cite.'</span>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>';
                
   }
   
}
add_shortcode('blockquote', 'blockqoute_shortcode');

/*******************************************/

/* HR Section */

function horizantal_line_shortcode( $atts, $content = null ) {
   extract( shortcode_atts( array(
      ), $atts ) );
    return '<div class="container">   
            <hr />
        </div>';
}
add_shortcode('hr', 'horizantal_line_shortcode');

/*******************************************/

/*----- Button section ----*/

function button_shortcode( $atts, $content = null ) {
   extract( shortcode_atts( array(
        //'class' => '',
        //'title' => '',
        'target' => '',
        'url' => '',
      ), $atts ) );
  /* return '<a href="'.$url.'" title="'.$title.'" class="btn button btn-arrow '.$class.'" target="'.$target.'"><span>'.$title.'</span> <em class="arrow-right"></em></a>';*/
  if(!empty($content)) {
  return '<div class="buttons">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <a href="'.$url.'" class="btn button btn-arrow " target="'.$target.'"><span>'.$content.'</span> <em class="arrow-right"></em></a>
                    </div>
                </div>
            </div>
        </div>';
    }
}
add_shortcode('button', 'button_shortcode');

/*******************************************/

/*----- Accordian section ----*/

function accordian_item_shortcode( $atts, $content = null ) {
   extract(shortcode_atts(array(
           'title' => '',
           'id'    => false,
           'state' => 'close',
       ), $atts));
       $GLOBALS['section'][] = array( 
           'title'   =>  $title ,
           'id'      =>  $id,
           'state'   =>  $state ,
           'content' =>  $content ,
       );
       $id  = "accordion-id-".$GLOBALS['collapsibles_count'];
        if(isset( $GLOBALS['accord_tab_count'] )) {
               $GLOBALS['accord_tab_count']++;
           }else {
               $GLOBALS['accord_tab_count'] = 0; 
           }   
       foreach( $GLOBALS['section'] as $tab ){         
           $class = ( !empty($tab['state']) && $tab['state']=="open" ) ? "collapse in"  : "collapse"; 
           $aria_expanded =  ( !empty($tab['state']) && $tab['state']=="open" ) ? "true"  : "false";    
           //$__title = preg_replace('/[^a-zA-Z0-9._\-]/', '', strtolower($tab['title'])  );  
           $__title = 'collapse'.$GLOBALS['accord_tab_count'];
           $title = $tab['title'];
           $tab_content = $tab['content'];
           $return = '<div class="accordion-item">                 
                          <h3 class="accordion-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#'.$id.'" href="#'.$__title.'" aria-expanded="'.$aria_expanded.'" aria-controls="collapseFour">
                              '.$title.'
                            </a>
                          </h3>                 
                        <div id="'.$__title.'" class="'.$class.'" role="tabpanel">
                          <div class="accordion-container">                     
                            <p>'.$tab_content.'</p>
                          </div>
                        </div>
                    </div>' ; 
            //$return = preg_replace('<br>', '', $return);  
       } // foreach        
       return do_shortcode($return);
}
add_shortcode('accordian_item', 'accordian_item_shortcode');

/*******************************************/

function accordion_shortcode( $atts, $content ){
     extract(shortcode_atts(array(
           'title' => '',
           'class' => '',
       ), $atts));
    if(isset( $GLOBALS['collapsibles_count'] )) {
        $GLOBALS['collapsibles_count']++;
    }else {
        $GLOBALS['collapsibles_count'] = 0; 
    }
    $id  = "accordion-id-".$GLOBALS['collapsibles_count'];
    $return = '<div class="accordians block">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-md-offset-2">';
                        if(!empty($title)){
                            $return .= '<h2>'.$title.'</h2>';
                        }
                        $return .= '<div id="'.$id.'" class="accordion '.$class.'" role="tablist" aria-multiselectable="true">
                        '.$content.'
                        </div>
                        </div>
                    </div>
                </div>
            </div>';
    //$return = preg_replace('<br>', '', $return); 
    return  do_shortcode($return);
}
add_shortcode( 'accordion', 'accordion_shortcode' );

/*******************************************/

/*----- Tab section ----*/

function tab_item_shortcode( $atts, $content = null ) {
   extract(shortcode_atts(array(
           'title' => '',
       ), $atts));
            $id = 'tab'.$GLOBALS['tab_count'];
            $return = '<li class="tab-link">
                        <div class="tabNav">'.$title.'</div>
                            <div class="tab-content">
                                '.$content.'
                            </div>
                    </li>';        
       return do_shortcode($return);
}
add_shortcode('tab', 'tab_item_shortcode');

/*******************************************/

function tabs_shortcode( $atts, $content ){
     extract(shortcode_atts(array(
           'title' => '',
       ), $atts));
    $tabs_divs = $GLOBAL[$tabs_divs];
    $return = '<div class="tabs-sec block">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-md-offset-2">';
                        if(!empty($title)){
                            $return .= '<h2>'.$title.'</h2>';
                        }
                        $return .= '<div class="tabsMain">
                                <ul class="tabs">
                                '.do_shortcode($content).'
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
            return $return;
}
add_shortcode( 'tabs', 'tabs_shortcode' );

/*******************************************/

/*$tabs_divs = '';

function tabs_group($atts, $content = null ) {
    $GLOBALS[$tabs_divs];

    $tabs_divs = '';

    $output = '<div id="tab-side-container"><ul';
    $output.='>'.do_shortcode($content).'</ul>';
    $output.= '<div class="panel-container">'.$tabs_divs.'</div>';

    return $output;  
}  


function tab($atts, $content = null) {  
    global $tabs_divs;

    extract(shortcode_atts(array(  
        'id' => '',
        'title' => '', 
    ), $atts));  

    if(empty($id))
        $id = 'side-tab'.rand(100,999);

    $output = '
        <li>
            <a href="#'.$id.'">'.$title.'</a>
        </li>
    ';

    $tabs_divs.= '<div id="'.$id.'">'.$content.'</div>';

    return $output;
}

add_shortcode('tabs', 'tabs_group');
add_shortcode('tab', 'tab');*/

function video_embedd_shortcode($atts, $content = null){
    extract(shortcode_atts(array(
           'url' => '',
       ), $atts));
    
    $return = '<div class="video-sec">
                    <div class="container">
                        <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="video">
                                <iframe src="'.esc_attr($url).'" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>';                      
            return do_shortcode($return);
}
add_shortcode( 'video', 'video_embedd_shortcode' );

function video_gallery_shortcode($atts, $content = null){
    extract(shortcode_atts(array(
           'id' => '',
           'text' => '',
           'class' => '',
       ), $atts));
    $post_id = esc_attr($id);
    $return = '';
    $return .= '<div class="video-thumbnails-sec">';
    $return .= '<div class="container">  ';
    if(!empty($class)){
        $class = 'class="'.$class.'"';
    } else {
        $class = '';
    }
    //$return .= '<div '.$class.'>';
    $return .= '<div class="row">';
    if(have_rows('stylesheet_video_gallery',$post_id)) : 
        while(have_rows('stylesheet_video_gallery',$post_id)) : the_row();
            $video_gallery_video_option = get_sub_field('video_gallery_video_option');
            $video_gallery_upload_video = get_sub_field('video_gallery_upload_video');
            $video_gallery_copy_url = get_sub_field('video_gallery_copy_url');
            $video_gallery_image_thumbnail = get_sub_field('video_gallery_image_thumbnail');
            $video_gallery_video_time = get_sub_field('video_gallery_video_time');
            $video_gallery_video_title = get_sub_field('video_gallery_video_title');
            $default_video_gallery_thumbnail = get_field('default_video_gallery_thumbnail','option');
            $default_video_gallery_video_title = get_field('default_video_gallery_video_title','option');
            $default_video_gallery_play_image = get_field('default_video_gallery_play_image','option');
            if($video_gallery_video_option == "upload_video"){
                $video_url = $video_gallery_upload_video['url'];
            } else {
                $video_url = $video_gallery_copy_url;
            }
            $img_src = $video_gallery_image_thumbnail['url'];
            //$size = "content_image_link";
            $size = "full";
            if(!empty($img_src)){
                $img_id = $video_gallery_image_thumbnail['id'];
                $image = wp_get_attachment_image_src( $img_id, $size );
                $img_src = $image[0];
                $img_alt = get_post_meta($img_id,'_wp_attachment_image_alt',true);
            } else {
                $img_id = $default_video_gallery_thumbnail['id'];
                $image = wp_get_attachment_image_src( $img_id, $size );
                $img_src = $image[0];
                $img_alt = get_post_meta($img_id,'_wp_attachment_image_alt',true);
            }
            if(empty($default_video_gallery_play_image)){
                $default_video_gallery_play_image = get_template_directory_uri().'/images/play-arrow.svg';
            }
            
            $return .= '<div class="col-sm-6 col-md-4">
                            <div class="thumbCol">
                                <a href="'.$video_url.'" class="popup-youtube video-thunb-link"></a>
                                <figure>
                                    <div class="thumbImage">
                                        <img src="'.$img_src.'" alt="'.$img_alt.'" class="responsive-img">
                                        <a href="#" class="playButton"><img src="'.$default_video_gallery_play_image.'" alt="play-arrow" /></a>
                                    </div>
                                    <figcaption>
                                        <time datetime="">'.$video_gallery_video_time.'</time>
                                        <strong>'.$video_gallery_video_title.'</strong>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>';
        endwhile;
    endif;
    $return .= '</div>';
    $return .= '</div>';
    $return .= '</div>';
    return do_shortcode($return);
}
add_shortcode( 'video_gallery', 'video_gallery_shortcode' );

function image_slider_shortcode($atts, $content = null){
    extract(shortcode_atts(array(
           'id' => '',
           'text' => '',
       ), $atts));
    $post_id = esc_attr($id);
    $return = '<div class="">';
    $return .= '<div class="container imageSliderSec">';
    $return .= '<div class="row">';
    $return .= '<div class="col-md-10 col-md-offset-1">';
    $return .= '<div class="imageSlider" id="imgSlider">';
    if(have_rows('image_slider',$post_id)) : 
        while(have_rows('image_slider',$post_id)) : the_row();
            $slider_image = get_sub_field('slider_image');
            $img_id = $slider_image['id'];
            //$size = "image-slider";
            $size = "full";
            $image = wp_get_attachment_image_src( $img_id, $size );
            $img_src = $image[0];
            $img_alt = get_post_meta($img_id,'_wp_attachment_image_alt',true);
            $video_gallery_upload_video = get_sub_field('video_gallery_upload_video');
            $image_slider_content = get_sub_field('image_slider_content');
            /*$return .= '<div>
                            <img src="'.$img_src.'" alt="'.$img_alt.'">
                                <div class="slideCaption hidden-xs">'.$image_slider_content.'</div>
                           <div class="slide-count-wrap">
                                <span class="current"></span> /
                                <span class="total"></span>
                            </div>
                        </div>';*/
            $return .= '<div class="slide">
                            <figure>
                                <img src="'.$img_src.'" alt="'.$img_alt.'">
                               <div class="slide-count-wrap">
                                    <span class="current"></span> /
                                    <span class="total"></span>
                                </div>
                            </figure>
                            <div class="slideCaption hidden-xs">'.$image_slider_content.'</div>
                        </div>';
        endwhile;
    endif;
    $return .= '</div>';
    $return .= '</div>';
    $return .= '</div>';
    $return .= '</div>';
    $return .= '</div>';
    return do_shortcode($return);
}
add_shortcode( 'image_slider', 'image_slider_shortcode' );

function tables_shortcode($atts, $content = null){
    extract(shortcode_atts(array(
           'title' => '',
           'text' => '',
       ), $atts));
    $return = '';
    $return .= '<div class="container">';
    $return .= '<div class="row">';
    $return .= '<div class="col-md-10 col-md-offset-1">';
    $return .= '<div class="responsive-table">';
    $return .= do_shortcode($content);
    $return .= '</div>';
    $return .= '</div>';
    $return .= '</div>';
    $return .= '</div>';
    return $return;
}
add_shortcode( 'tables', 'tables_shortcode' );

function text_shortcode($atts, $content = null){
    extract(shortcode_atts(array(
           'column' => '8',
           'class' => '',
           'title' => ''
       ), $atts));
    /*if(!empty($title)){
        $title = '<h2>'.$title.'</h2>';
    } else {
        $title = '';
    }*/
        $return = '<div class="text-sec '.$class.'">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-'.$column.' col-md-offset-2">
                                    '.$content.'
                                </div>
                            </div>
                        </div>
                    </div>';
    
    return do_shortcode($return);
}
add_shortcode( 'text', 'text_shortcode' );

function content_block_full_shortcode($atts, $content = null){
    extract(shortcode_atts(array(
           'id' => '',
       ), $atts));
    $post_id = esc_attr($id);
    $return = '';
    if(have_rows('content_block_full',$post_id)) : 
        while(have_rows('content_block_full',$post_id)) : the_row();
            $content_block_full_image = get_sub_field('content_block_full_image');
            $img_id = $content_block_full_image['id'];
            //$size = "content_block_full";
            $size = "full";
            $image = wp_get_attachment_image_src( $img_id, $size );
            $img_src = $image[0];
            $img_alt = get_post_meta($img_id,'_wp_attachment_image_alt',true);
            $content_block_full_sub_title = get_sub_field('content_block_full_sub_title');
            $content_block_full_title = get_sub_field('content_block_full_title');
            $content_block_full_content = get_sub_field('content_block_full_content');
            $content_block_full_link_text = get_sub_field('content_block_full_link_text');
            $content_block_full_link_url = get_sub_field('content_block_full_link_url');
            $return .= '<div class="content-block-fullwidth">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="content-block-bg clearfix" style="background-image:url('.$img_src.')">                              
                                            <div class="content-block hidden-xs hidden-sm">
                                                <h2><span>'.$content_block_full_sub_title.'</span> '.$content_block_full_title.'</h2>
                                                <p>'.$content_block_full_title.'</p>
                                                <a href="'.$content_block_full_link_url.'" title="'.$content_block_full_link_text.'" class="btn button btnWhite btn-arrow"><span>'.$content_block_full_link_text.'</span> <em class="arrow-right"></em></a>
                                            </div>
                                        </div>
                                        <div class="content-block visible-xs visible-sm">
                                            <h2><span>'.$content_block_full_sub_title.'</span> '.$content_block_full_title.'</h2>
                                            <p>'.$content_block_full_title.'</p>
                                            <a href="'.$content_block_full_link_url.'" title="'.$content_block_full_link_text.'" class="btn button btnWhite btn-arrow"><span>'.$content_block_full_link_text.'</span> <em class="arrow-right"></em></a>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>';
        endwhile;
        return $return;
    endif;
    return do_shortcode($return);
    
}
add_shortcode( 'content_block_full', 'content_block_full_shortcode' );

function content_block_grid_shortcode($atts, $content = null){
    extract(shortcode_atts(array(
           'id' => '',
       ), $atts));
    $post_id = esc_attr($id);
    $return = '';
    $content_block_background_color = get_field('content_block_background_color',$post_id);
    $content_block_main_title = get_field('content_block_main_title',$post_id);
    $content_block_content = get_field('content_block_content',$post_id);
    $content_block_orientation = get_field('content_block_orientation',$post_id);

    $return .= '<div class="lightblue-bg p-t-100 p-b-100" style="background-color:'.$content_block_background_color.'">';
    $return .= '<div class="container">';
        $return .= '<div class="row">';
        $return .= '<div class="col-md-8 col-md-offset-2">';
        $return .= '<h2>'.$content_block_main_title.'</h2>';
        $return .= $content_block_content; 
        $return .= '</div>';
        $return .= '</div>';

        if($content_block_orientation == 'right'){
            $counter = 1;
        } else {
            $counter = 0;
        }
        
    if(have_rows('content_block_withing_grid',$post_id)) : 
        while(have_rows('content_block_withing_grid',$post_id)) : the_row();
            $content_block_withing_grid_image = get_sub_field('content_block_withing_grid_image');
            $img_src = $content_block_withing_grid_image['url'];
            $img_alt = $content_block_withing_grid_image['alt'];
            $content_block_withing_grid_title = get_sub_field('content_block_withing_grid_title');
            $content_block_withing_grid_content = get_sub_field('content_block_withing_grid_content');
            $content_block_withing_grid_link_text = get_sub_field('content_block_withing_grid_link_text');
            $content_block_withing_grid_link_url = get_sub_field('content_block_withing_grid_link_url');
            if($counter%2==1){
                $class = 'deskRight';
            } else {
                $class = '';
            }
            $return .= '<div class="row">           
                            <div class="col-sm-8 col-sm-offset-2 col-md-12 col-md-offset-0 col-lg-10 col-lg-offset-1">
                                <div class="grid-block-row">
                                    <div class="clearfix">
                                        <div class="content-grid-col '.$class.'">
                                            <div class="content-grid-image" style="background-image: url('.$img_src.');"></div>
                                        </div>
                                        <div class="content-grid-col">
                                            <div class="grid-block-content">
                                                <h3>'.$content_block_withing_grid_title.'</h3>
                                                '.$content_block_withing_grid_content.'
                                                <a href="'.$content_block_withing_grid_link_url.'" title="'.$content_block_withing_grid_link_text.'" class="link">'.$content_block_withing_grid_link_text.'</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
            $counter++;
        endwhile;
    endif;
    $return .= '</div>';
    $return .= '</div>';
    return do_shortcode($return);
    
}
add_shortcode( 'content_block_grid', 'content_block_grid_shortcode' );

function content_image_link_shortcode($atts, $content = null){
    extract(shortcode_atts(array(
           'id' => '',
       ), $atts));
    $post_id = esc_attr($id);
    $return = '';
    $content_image_links_title = get_field('content_image_links_title',$post_id);

    $return .= '<div class="content-image-links">';
    $return .= '<div class="container">';
    $return .= '<h2>'.$content_image_links_title.'</h2>';
    $return .= '<div class="row">';  
    if(have_rows('content_image_links',$post_id)) : 
        while(have_rows('content_image_links',$post_id)) : the_row();
            $content_image_links_image = get_sub_field('content_image_links_image');
            $img_src = $content_image_links_image['url'];
            $img_alt = $content_image_links_image['alt'];
            $content_image_links_link_url = get_sub_field('content_image_links_link_url');     
            $content_image_links_content = get_sub_field('content_image_links_content');
            $return .= '<div class="col-sm-6 col-md-4">
                            <div class="thumbCol">
                                <a href="'.$content_image_links_link_url.'" class="video-thunb-link"></a>
                                <figure>
                                    <div class="thumbImage">
                                        <img src="'.$img_src.'" alt="'.$img_alt.'" class="responsive-img">                            
                                    </div>
                                    <figcaption>                            
                                        <strong>'.$content_image_links_content.'</strong>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>';
        endwhile;
    endif;
    $return .= '</div>';
    $return .= '</div>';
    $return .= '</div>';
    return do_shortcode($return);
    
}
add_shortcode( 'content_image_link', 'content_image_link_shortcode' );

function content_link_shortcode($atts, $content = null){
    extract(shortcode_atts(array(
           'id' => '',
       ), $atts));
    $post_id = esc_attr($id);
    $return = '';
    $content_links_title = get_field('content_links_title',$post_id);
    $return .= '<div class="content-text-links">';
    $return .= '<div class="container">';
    $return .= '<h2>'.$content_links_title.'</h2>';
    $return .= '<ul class="text-links clearfix">';  
    if(have_rows('content_links',$post_id)) : 
        while(have_rows('content_links',$post_id)) : the_row();
            $content_links_link_url = get_sub_field('content_links_link_url');     
            $content_links_link_text = get_sub_field('content_links_link_text');
            $return .= '<li><a href="'.$content_links_link_url.'" title="'.$content_links_link_text.'">'.$content_links_link_text.' <em class="arrow-right"></em></a></li>';
        endwhile;
    endif;
    $return .= '</ul>';
    $return .= '</div>';
    $return .= '</div>';
    return do_shortcode($return);
    
}
add_shortcode( 'content_link', 'content_link_shortcode' );

function staff_card_shortcode($atts, $content = null){
    extract(shortcode_atts(array(
           'id' => '',
       ), $atts));
    $post_id = esc_attr($id);
    $return = '';
    $staff_card_main_title = get_field('staff_card_main_title',$post_id);
    $staff_card_background_color = get_field('staff_card_background_color',$post_id);
    $return .= '<div class="lightblue-bg p-t-100 p-b-55" style="background-color:'.$staff_card_background_color.'">';
    $return .= '<div class="container">';
    $return .= '<div class="staff-cards">';
    $return .= '<h2>'.$staff_card_main_title.'</h2>';
    $return .= '<div class="row">';
    //$staff_id = 'lightbox'.$GLOBAL['staff_lightbox_id'];

    if(have_rows('staff_card',$post_id)) : 
         $count = 1;
        while(have_rows('staff_card',$post_id)) : the_row();
           /* if(isset( $GLOBALS['staff_lightbox_id'] )) {
                   $GLOBALS['staff_lightbox_id']++;
               }else {
                   $GLOBALS['staff_lightbox_id'] = 0; 
               }  */
            //$staff_id = 'lightbox'.$GLOBALS['staff_lightbox_id'];
            //$staff_id = $count;
            $staff_card_image = get_sub_field('staff_card_image');
            $img_src = $staff_card_image['url'];
            $img_alt = $staff_card_image['alt'];     
            $staff_card_location = get_sub_field('staff_card_location');
            $staff_card_name = get_sub_field('staff_card_name');
            $staff_card_position = get_sub_field('staff_card_position');
            $staff_card_lightbox_link_text = get_sub_field('staff_card_lightbox_link_text');
            $staff_card_lightbox_content = get_sub_field('staff_card_lightbox_content');
            $return .= '<div class="col-sm-6 col-md-4">
                            <div class="staff-thumb-card">
                                <figure><img src="'.$img_src.'" alt="'.$img_alt.'" class="responsive-img"></figure>
                                <div class="card-container">
                                    <div class="card-caption">
                                        <h3 class="title"><small>'.$staff_card_location.'</small> '.$staff_card_name.' <span>'.$staff_card_position.'</span></h3>
                                    </div>
                                    <a href="#staff-lightbox" data-index="'.$count.'" class="btn btnWhite btn-arrow button popup-with-zoom-anim" title="'.$staff_card_lightbox_link_text.'" class="btn btnWhite btn-arrow button"><span>'.$staff_card_lightbox_link_text.' <em class="arrow-right"></em></span></a>
                                </div>                      
                            </div>
                        </div>';
            /*$return .= '<div id="'.$staff_id.'" class="zoom-anim-dialog mfp-hide">
                           
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img src="'.$img_src.'" alt="'.$img_alt.'" class="responsive-img">
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="person-content">
                                                <span class="location">'.$staff_card_location.'</span>
                                                <h2> '.$staff_card_name.' <span>'.$staff_card_location.'</span></h2>
                                                '.$staff_card_lightbox_content.'
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                        </div>'; */
                /*$return .= '<div id="'.$staff_id.'" class="zoom-anim-dialog mfp-hide">
                                <div class="slide">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <img src="'.$img_src.'" alt="'.$img_alt.'" class="responsive-img">
                                            </div>
                                            <div class="col-sm-7">
                                                <div class="person-content">
                                                    <span class="location">'.$staff_card_location.'</span>
                                                    <h2> '.$staff_card_name.' <span>'.$staff_card_location.'</span></h2>
                                                    '.$staff_card_lightbox_content.'
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>'; */
                             $count++;   

        endwhile;
    endif;
    $return .= '</div>';
    $return .= '</div>';
    $return .= '</div>';
    $return .= '</div>';

    if(have_rows('staff_card',$post_id)) : 
        $staff_card = get_field_object('staff_card',$post_id);
        $total = get_post_meta($post_id,'staff_card',true);
        if ($total < 10) {
            $total = str_pad($total, 2, "0", STR_PAD_LEFT);
        } else {
            $total = $total;
        }
        $count = 1;
        //$count = str_pad($count, 2, "0", STR_PAD_LEFT);
        /*if ($count < 10) {
            
        } else {
            $count = $count;
        }*/
        $return .= '<div id="staff-lightbox" class="zoom-anim-dialog mfp-hide">';
        while(have_rows('staff_card',$post_id)) : the_row();
           /* if(isset( $GLOBALS['staff_lightbox_id'] )) {
                   $GLOBALS['staff_lightbox_id']++;
               }else {
                   $GLOBALS['staff_lightbox_id'] = 0; 
               }  */
            //$staff_id = 'lightbox'.$GLOBALS['staff_lightbox_id'];
            //$staff_id = 'lightbox'.$count;
            $staff_card_image = get_sub_field('staff_card_image');
            $img_src = $staff_card_image['url'];
            $img_alt = $staff_card_image['alt'];     
            $staff_card_location = get_sub_field('staff_card_location');
            $staff_card_name = get_sub_field('staff_card_name');
            $staff_card_position = get_sub_field('staff_card_position');
            $staff_card_lightbox_link_text = get_sub_field('staff_card_lightbox_link_text');
            $staff_card_lightbox_content = get_sub_field('staff_card_lightbox_content');
            $return .= '
                            <div class="slide">
                            <div class="light-box-pagination">
                                <span>'.str_pad($count, 2, "0", STR_PAD_LEFT).' / '. $total.'</span> '.$staff_card_name.'
                            </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="'.$img_src.'" alt="'.$img_alt.'" class="staff-img">
                                        </div>
                                        <div class="col-md-7">
                                            <div class="person-content">
                                                <span class="location">'.$staff_card_location.'</span>
                                                <h2> '.$staff_card_name.' <span>'.$staff_card_location.'</span></h2>
                                                '.$staff_card_lightbox_content.'
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                        </div>';   
                        $count++;         
        endwhile;
        $return .= '</div>';
    endif;
    return do_shortcode($return);
    
}
add_shortcode( 'staff_card', 'staff_card_shortcode' );

function empty_space_shortcode($atts, $content){
    extract(shortcode_atts(array(
           'space' => '10',
           'class' => '',
       ), $atts));
    global $space;
    if(isset($space)){
        $space++;
    } else {
        $space = 0;
    }
    $space = "space".$space;
        $return = '';
        $return .= '<div class="empty '.$class.' '.$space.'"></div>';
    return $return;
}

add_shortcode( 'empty_space', 'empty_space_shortcode' );

function fullwidth_image_shortcode($atts, $content = null){
    extract(shortcode_atts(array(
           //'id' => '',
       ), $atts));
    $id = esc_attr($id);
    $image = wp_get_attachment_image_src($id,'full');
    $image_alt = get_post_meta( $id, '_wp_attachment_image_alt', true);
    $return = '';
   
       /* $return .= '<div class="row">
                        <div class="col-md-12">
                            <figure class="full-width-img">
                                <img src="'.$image[0].'" alt="'.$image_alt.'" class="responsive-img">
                            </figure>
                        </div>
                    </div>';*/
        $return .= '<div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <figure class="full-width-img">
                                    '.$content.'
                                </figure>
                            </div>
                        </div>
                    </div>';
    
    return $return;
}

add_shortcode( 'full_width_image', 'fullwidth_image_shortcode' );

function fullwidth_image_grid_shortcode($atts, $content = null){
    extract(shortcode_atts(array(
           //'id' => '',
       ), $atts));
    $id = esc_attr($id);
    $image = wp_get_attachment_image_src($id,'full');
    $image_alt = get_post_meta( $id, '_wp_attachment_image_alt', true);
    $return = '';
    $return .= '
                    <div class="container">
                        <div class="row image-grid-col">
                            <div class="col-md-12">
                                <figure>
                                    '.$content.'
                                </figure>
                            </div>
                        </div>
                    </div>
                ';
    
    return $return;
}

add_shortcode( 'full_width_image_grid', 'fullwidth_image_grid_shortcode' );

function grid_image_shortcode($atts, $content = null){
        $return .= '<div class="container">
                        <div class="row text-col-images">
                        '.do_shortcode($content).'
                        </div>
                    </div>';
                    
    
    return $return;
}
add_shortcode( 'grid_image', 'grid_image_shortcode' );

function image_shortcode($atts, $content){
    extract(shortcode_atts(array(
           'id' => '',
           'grid' => '6'
       ), $atts));
    $id = esc_attr($id); 
    //$size = "grid_image";
    $size = "full";
    $image = wp_get_attachment_image_src($id, $size);
    $image_alt = get_post_meta( $id, '_wp_attachment_image_alt', true);
    /*$return .= '<div class="col-sm-'.$grid.'">
                    <img src="'.$image[0].'" alt="'.$image_alt.'" class="responsive-img">
                </div>';*/
    $return .= '<div class="col-sm-'.$grid.'">
                    '.$content.'
                </div>';
    
    return $return;
}

add_shortcode( 'image', 'image_shortcode' );

//add_filter('wp_nav_menu_items','add_to_top_nav_sub_menu', 10, 2);
/*function add_to_top_nav_sub_menu( $items, $args ) {
    if( $args->menu_id == '10')  {
        $items .= '<li class="menu-item menu-item-custom">dsfdsfsdf</li>';
    }
    return $items;
}*/
function add_to_top_nav_sub_menu( $items, $args ) {
    if ( $args->theme_location == 'top') {
    $items .= '<li><a href="#" title="Search" class="searchIcon">Search</a></li>';
    return $items;
}
}

function pagination_nav() {
    global $wp_query;

    if ( $wp_query->max_num_pages > 1 ) { ?>
        <nav class="pagination" role="navigation">
            <div class="nav-previous"><?php next_posts_link( '&larr; Older posts' ); ?></div>
            <div class="nav-next"><?php previous_posts_link( 'Newer posts &rarr;' ); ?></div>
        </nav>
<?php }
}

function my_acf_init() {
    
    acf_update_setting('google_api_key', 'AIzaSyDspiY2wpKhVzrv8Pw1MHZgSf_Ph57hNG0');
}

//add_action('acf/init', 'my_acf_init');
//if(is_single()){
function google_map_js(){
    if(is_singular('events')){
        require get_template_directory() . '/include/acf_google_map.php';
    }
}
add_action('wp_head','google_map_js');
//}


add_filter('next_post_link', 'post_link_attributes');
//add_filter('previous_post_link', 'post_link_attributes');

function post_link_attributes($output) {
    $code = 'class="nextPrevLink next-to-blog next-arrow"';
    return str_replace('<a href=', '<a '.$code.' href=', $output);
}

add_filter( 'gform_field_css_class', 'custom_class', 10, 3 );
function custom_class( $classes, $field, $form ) {
    if ( $field->type == 'email' ) {
        $classes .= 'email-input';
    }
    return $classes;
}

/*add_action( 'pre_get_posts', function ( $q ) {

    if( !is_admin() && $q->is_main_query() && $q->is_post_type_archive( 'events' ) ) {

        $q->set( 'posts_per_page', 2 );

    }

});*/


add_filter('the_content', 'remove_empty_p', 20, 1);
function remove_empty_p($content){
    return str_replace("<p> </p>","",$content);
}


add_action( 'pre_get_posts' ,'wpse222471_query_post_type_events', 1, 1 );
function wpse222471_query_post_type_events( $query )
{
    if ( ! is_admin() && is_post_type_archive( 'events' ) && $query->is_main_query() )
    {
        $query->set( 'posts_per_page', 5 ); //set query arg ( key, value )
    }
}

add_action( 'pre_get_posts' ,'wpse222471_query_post_type_post', 1, 1 );
function wpse222471_query_post_type_post( $query )
{
    if ( ! is_admin() && is_post_type_archive( 'post' ) && $query->is_main_query() )
    {
        $query->set( 'posts_per_page', 6 ); //set query arg ( key, value )
    }
}

add_action( 'pre_get_posts' ,'wpse222471_query_post_type_post_and_category', 1, 1 );
function wpse222471_query_post_type_post_and_category( $query )
{
    if ( ! is_admin() && is_taxonomy( 'category' ) && $query->is_main_query() )
    {
        $query->set( 'posts_per_page', 6 ); //set query arg ( key, value )
    }
}

add_action( 'pre_get_posts' ,'wpse222471_query_post_type_post_and_search', 1, 1 );
function wpse222471_query_post_type_post_and_search( $query )
{   
    if ( ! is_admin() && is_search() && $query->is_main_query() )
    {
        $page_count_in_admin = get_option('posts_per_page');
        $query->set( 'posts_per_page',$page_count_in_admin  ); //set query arg ( key, value )
    }
}

add_action( 'pre_get_posts' ,'wpse222471_query_post_type_post_and_tag', 1, 1 );
function wpse222471_query_post_type_post_and_tag( $query )
{
    if ( ! is_admin() && is_tag() && $query->is_main_query() )
    {
        $query->set( 'posts_per_page', 2 ); //set query arg ( key, value )
    }
}

add_filter( 'wp_nav_menu_items', 'your_custom_menu_item', 10, 2 );
function your_custom_menu_item ( $items, $args ) {
    if ($args->theme_location == 'top') {
        $items .= '<li class="mobSearchIcon"><a href="#" title="Search" class="search-box-link"><span class="hidden-device">Search</span></a></li>';
    }
    return $items;
}

function rc_add_cpts_to_search($query) {

    // Check to verify it's search page
    if( is_search() ) {
        // Get post types
        $post_types = get_post_types(array('public' => true, 'exclude_from_search' => false), 'objects');
        $searchable_types = array();
        // Add available post types
        if( $post_types ) {
            foreach( $post_types as $type) {
                $searchable_types[] = $type->name;
            }
        }
        $query->set( 'post_type', $searchable_types );
    }
    return $query;
}
//add_action( 'pre_get_posts', 'rc_add_cpts_to_search' );

/*function add_image_class($class){
    $class .= 'responsive-img';
    return $class;
}
add_filter('get_image_tag_class','add_image_class');*/

function image_tag_class($class) {
    $class .= ' responsive-img';
    return $class;
}
add_filter('get_image_tag_class', 'image_tag_class' );


// filter the Gravity Forms button type

add_filter( 'gform_submit_button', 'form_submit_button', 10, 2 );
function form_submit_button( $button, $form ) {
    return "<button class='btn submit-email-btn' id='gform_submit_button_{$form['id']}'><span class='right-arrow-icon'></span></button>";
}

function facebook_js(){
        if(is_single()){
    ?>
        <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1";
            fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));

        jQuery('.btnShare').click(function(){
        elem = jQuery(this);
        postToFeed( elem.data('desc'), elem.prop('href'), elem.data('image'));

        return false;
        });
        </script>


    <?php
    }
}
add_action( 'wp_head','facebook_js');

add_filter( 'tablepress_edit_link_below_table', '__return_false' );

// add media button to retrive image path only
add_action('media_buttons', 'add_my_media_button',99);
function add_my_media_button() {
    echo '<a href="#" id="insert-my-media" class="button">Add media path</a>';
}

// media js for getting path
function include_media_button_js_file() {
    wp_enqueue_script('media_button', get_template_directory_uri() . '/js/media_button.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_media', 'include_media_button_js_file');

function datePicker_js_for_event_post_type(){
    ?>
    <script type="text/javascript">
        $(".start_date .acf-date-picker input.input").datepicker({
            numberOfMonths: 1,
            onSelect: function(selected) {
              $(".end_date .acf-date-picker input.input").datepicker("option","minDate", selected)
            }
        });
        $(".end_date .acf-date-picker input.input").datepicker({ 
            numberOfMonths: 1,
            onSelect: function(selected) {
                $(".start_date .acf-date-picker input.input").datepicker("option","maxDate", selected)
            }
        });
    </script>
    <?php
}
add_action('admin_head','datePicker_js_for_event_post_type');
add_filter('acf/validate_value/key=field_5acf675b7cb13', 'my_acf_validate_value', 10, 4);

function my_acf_validate_value( $valid, $value, $field, $input ){
    
    if( !$valid ) {
        return $valid;
    }
        $value_1 = $_POST['acf']['field_5acf67417cb12'];
        $value_2 = $_POST['acf']['field_5acf675b7cb13'];
    if (!empty($value_1) && empty($value_2))  {
            $valid = 'Please Enter Last Date.';
        }
    return $valid; 
}

//add_filter('acf/validate_value/key=field_5acf67417cb12', 'my_acf_validate_value', 10, 4);

/*function my_acf_validate_value( $valid, $value, $field, $input ){
    
    if( !$valid ) {
        return $valid;
    }
        $value_1 = $_POST['acf']['field_5acf67417cb12'];
        $value_2 = $_POST['acf']['field_5acf675b7cb13'];
    if (!empty($value_1) && empty($value_2))  {
            $valid = 'Please Enter Last Date.';
        }
    return $valid; 
}*/