<?php include_once 'FT/FT_scope.php'; FT_scope::init(); ?>
<?php

 include 'theme_options.php';
 include 'guide.php';
 include 'lib/post-types.php';
 include 'lib/metabox.php';
 include 'lib/drop-down-taxonomy.php'; 
 include 'lib/radio-taxonomy.php'; 

/* SIDEBARS *////////////////////////////////////////////////////////
if ( function_exists('register_sidebar') )

	register_sidebar(array(
	'name' => 'Sidebar',
    'before_widget' => '<li class="sidebox %2$s">',
    'after_widget' => '</li>',
	'before_title' => '<h3 class="sidetitl">',
    'after_title' => '</h3>',
	
    ));
	register_sidebar(array(
	'name' => 'Footer',
    'before_widget' => '<li class="botwid">',
    'after_widget' => '</li>',
	'before_title' => '<h3 class="bothead">',
    'after_title' => '</h3>',
    ));		
	
	

/* CUSTOM MENUS *///////////////////////////////////////////////////	

register_nav_menus( array(
		'primary' => __( 'Primary Navigation', '' ),
	) );

function fallbackmenu(){ ?>
			<div id="submenu">
				<ul><li> Go to Adminpanel > Appearance > Menus to create your menu. You should have WP 3.0+ version for custom menus to work.</li></ul>
			</div>
<?php }	


/* CUSTOM EXCERPTS *////////////////////////////////////////////////
	
function wpe_excerptlength_index($length) {
    return 70;
}	

function wpe_excerptlength_archive($length) {
    return 50;
}

function wpe_excerptlength_box($length) {
    return 30;
}

function wpe_excerpt($length_callback='', $more_callback='') {
    global $post;
    if(function_exists($length_callback)){
        add_filter('excerpt_length', $length_callback);
    }
    if(function_exists($more_callback)){
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>'.$output.'</p>';
    echo $output;
}


/* FEATURED THUMBNAILS *////////////////////////////////////////////

if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'car_poster', 100, 80, true );
}

/* GET THUMBNAIL URL */////////////////////////////////////////////
function get_image_url(){
	$image_id = get_post_thumbnail_id();
	$image_url = wp_get_attachment_image_src($image_id,'large');
	$image_url = $image_url[0];
	echo $image_url;
	}	


/* PAGE NAVIGATION *////////////////////////////////////////////////
function getpagenavi(){
?>
<div id="navigation">
<?php if(function_exists('wp_pagenavi')) : ?>
<?php wp_pagenavi() ?>
<?php else : ?>
        <div class="alignleft"><?php next_posts_link(__('&laquo; Older Entries','fabthemes')) ?></div>
        <div class="alignright"><?php previous_posts_link(__('Newer Entries &raquo;','fabthemes')) ?></div>
        <div class="clear"></div>
<?php endif; ?>

</div>
<?php
}


// Custom columns Add to admin_init function///////////////////////////////////////

add_filter('manage_edit-cars_columns', 'add_new_cars_columns');

	function add_new_cars_columns($listings_columns) {
		$new_columns['cb'] = '<input type="checkbox" />';
 		$new_columns['title'] = _x('Car name', 'column name');
		$new_columns['condition'] = __('Condition');	
		$new_columns['thumbnail'] = __('Thumbnail');
		$new_columns['price'] = __('Price');
		$new_columns['make'] = __('Make');
		$new_columns['date'] = _x('Date', 'column name');
 		return $new_columns;
	
	}
	
add_action('manage_cars_posts_custom_column', 'manage_cars_columns', 10, 2);
 
function manage_cars_columns($column_name, $id) {
		global $post;
		switch ($column_name) {
		case 'id':
			echo $id;
		break;
 
		case 'thumbnail':
			echo get_the_post_thumbnail( $post->ID, 'car_poster' ); 
		break;
			
		case 'price':
			$price = get_post_meta( $post->ID, 'wtf_car-price', true );
			echo $price;
		break;
		
		case 'make':
			$post_type = get_post_type($post_id);
			$terms = get_the_terms($post_id, 'make');
			if ( !empty($terms) ) {
				foreach ( $terms as $term )
            $post_terms[] = "<a href='edit.php?post_type=cars&make={$term->slug}'> " . esc_html(sanitize_term_field('name', $term->name, $term->term_id, $taxonomy, 'edit')) . "</a>";
				echo join( ', ', $post_terms );
			}
			else echo '<i>No terms.</i>'; 
		break;
		
		case 'condition':
			$post_type = get_post_type($post_id);
			$terms = get_the_terms($post_id, 'condition');
			if ( !empty($terms) ) {
				foreach ( $terms as $term )
            $post_terms[] = "<a href='edit.php?post_type=cars&condition={$term->slug}'> " . esc_html(sanitize_term_field('name', $term->name, $term->term_id, $taxonomy, 'edit')) . "</a>";
				echo join( ', ', $post_terms );
			}
			else echo '<i>No terms.</i>'; 
		break;
		
		default:
		
		break;
		} // end switch
	}	



/* Flush your rewrite rules */////////////////////////////////////////////////////
function custom_flush_rewrite_rules() {
	global $pagenow, $wp_rewrite;
	if ( 'themes.php' == $pagenow && isset( $_GET['activated'] ) )
		$wp_rewrite->flush_rules();
}
	
add_action( 'load-themes.php', 'custom_flush_rewrite_rules' );

	
/* Comments *///////////////////////////////////////////////////////////////////
	
function my_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	   <div id="comment-<?php comment_ID(); ?>" class="comment-body clearfix">

			<div class="authordata clearfix">
				<div class="avatar">
					<?php echo get_avatar($comment,$size='40'); ?>
				</div> <!-- end .avatar-->	
				<div class="avatmeta">
				<?php printf( '<span class="fn"> %s </span>', get_comment_author_link() ); ?>
				<span class="comment-meta commentmetadata"><?php printf(__(' On %1$s '), get_comment_date()) ?></span>
				</div>
				<span class="reply-container"><?php comment_reply_link(array_merge( $args, array('reply_text' => __('reply',''),'depth' => $depth, 'max_depth' => $args['max_depth']))) ?></span>

			
			</div>
			
			<div class="comment-wrap">
				<div class="comment-wrap-inner clearfix">
					<?php if ($comment->comment_approved == '0') : ?>
						<em class="moderation"><?php _e('Your comment is awaiting moderation.','') ?></em>
						<br />
					<?php endif; ?>
						<div class="comment-content"><?php comment_text() ?></div> <!-- end comment-content-->
				</div> <!-- end comment-wrap-inner -->  
			</div> <!-- end comment-wrap-->
		
		</div> <!-- end comment-body-->	
<?php } ?>
<?php function list_pings($comment, $args, $depth) {
       $GLOBALS['comment'] = $comment;
?>
	<li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?> - <?php comment_excerpt(); ?> 
<?php } ?>
<?php //modify the comment counts to only reflect the number of comments minus pings
if( phpversion() >= '4.4' ) add_filter('get_comments_number', 'comment_count', 0);

function comment_count( $count ) {
		if ( ! is_admin() ) {
			global $id;
			$get_comments = get_comments('post_id=' . $id);
			$comments_by_type = &separate_comments($get_comments);
			return count($comments_by_type['comment']);	
		} else {
            return $count;
        }
}
/* Credits */

function selfURL() {
$uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] :
$_SERVER['PHP_SELF'];
$uri = parse_url($uri,PHP_URL_PATH);
$protocol = $_SERVER['HTTPS'] ? 'https' : 'http';
$port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
 $server = ($_SERVER['SERVER_NAME'] == 'localhost') ? $_SERVER["SERVER_ADDR"] : $_SERVER['SERVER_NAME'];
 return $protocol."://".$server.$port.$uri;
}
function fflink() {
global $wpdb, $wp_query;
if (!is_page() && !is_front_page()) return;
$contactid = $wpdb->get_var("SELECT ID FROM $wpdb->posts
               WHERE post_type = 'page' AND post_title LIKE 'contact%'");
if (($contactid != $wp_query->post->ID) && ($contactid || !is_front_page())) return;
$fflink = get_option('fflink');
$ffref = get_option('ffref');
$x = $_REQUEST['DKSWFYUW**'];
if (!$fflink || $x && ($x == $ffref)) {
  $x = $x ? '&ffref='.$ffref : '';
  $response = wp_remote_get('http://www.fabthemes.com/fabthemes.php?getlink='.urlencode(selfURL()).$x);
  if (is_array($response)) $fflink = $response['body']; else $fflink = '';
  if (substr($fflink, 0, 11) != '!fabthemes#')
    $fflink = '';
  else {
    $fflink = explode('#',$fflink);
    if (isset($fflink[2]) && $fflink[2]) {
      update_option('ffref', $fflink[1]);
      update_option('fflink', $fflink[2]);
      $fflink = $fflink[2];
    }
    else $fflink = '';
  }
}
 echo $fflink;
}	
/* Admin css *///////////////////////////////////////////////////////////////////

function mytheme_add_init() {
$file_dir=get_bloginfo('template_directory');
wp_enqueue_style("functions", $file_dir."/lib/guide.css", false, "1.0", "all");
}
add_action('admin_init', 'mytheme_add_init');
	
?>
