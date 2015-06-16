<?php

// Add Translation Option
load_theme_textdomain( 'wpbootstrap', TEMPLATEPATH . '/languages' );
$locale = get_locale();
$locale_file = TEMPLATEPATH . '/languages/$locale.php';
if ( is_readable( $locale_file ) ) require_once( $locale_file );

// Clean up the WordPress Head
if( !function_exists( 'wp_bootstrap_head_cleanup' ) ) {  
  function wp_bootstrap_head_cleanup() {
    // remove header links
    remove_action( 'wp_head', 'feed_links_extra', 3 );                    // Category feeds
    remove_action( 'wp_head', 'feed_links', 2 );                          // Post and Comment feeds
    remove_action( 'wp_head', 'rsd_link' );                               // EditURI link
    remove_action( 'wp_head', 'wlwmanifest_link' );                       // Windows Live Writer
    remove_action( 'wp_head', 'index_rel_link' );                         // index link
    remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );            // previous link
    remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );             // start link
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 ); // Adjacent Posts links
    remove_action( 'wp_head', 'wp_generator' );                           // WP version
  }
}
// Launch operation cleanup
add_action( 'init', 'wp_bootstrap_head_cleanup' );

// remove WP version from RSS
if( !function_exists( 'wp_bootstrap_rss_version' ) ) {  
  function wp_bootstrap_rss_version() { return ''; }
}
add_filter( 'the_generator', 'wp_bootstrap_rss_version' );

// Remove the […] in a Read More link
if( !function_exists( 'wp_bootstrap_excerpt_more' ) ) {  
  function wp_bootstrap_excerpt_more( $more ) {
    global $post;
    return '...  <a href="'. get_permalink($post->ID) . '" class="more-link" title="Read ' 
    	. get_the_title($post->ID).'">Read more &raquo;</a>';
  }
}
add_filter( 'excerpt_more', 'wp_bootstrap_excerpt_more' );

// Add WP 3+ Functions & Theme Support
if( !function_exists( 'wp_bootstrap_theme_support' ) ) {  
  function wp_bootstrap_theme_support() {
    add_theme_support( 'post-thumbnails' );      // wp thumbnails (sizes handled in functions.php)
    set_post_thumbnail_size( 125, 125, true );   // default thumb size
    //add_theme_support( 'custom-background' );    // wp custom background
    add_theme_support( 'automatic-feed-links' ); // rss

    /*/ Add post format support - if these are not needed, comment them out
    add_theme_support( 'post-formats',      // post formats
      array( 
        'aside',   // title less blurb
        'gallery', // gallery of images
        'link',    // quick link to other site
        'image',   // an image
        'quote',   // a quick quote
        'status',  // a Facebook like status update
        'video',   // video 
        'audio',   // audio
        'chat'     // chat transcript 
      )
    );  */

    add_theme_support( 'menus' );            // wp menus
    
    register_nav_menus(                      // wp3+ menus
      array( 
        'main_nav' => 'Main Menu',       // main nav in header
        'footer_links' => 'Footer Links' // secondary nav in footer
      )
    );  
  }
}
// launching this stuff after theme setup
add_action( 'after_setup_theme','wp_bootstrap_theme_support' );

function wp_bootstrap_main_nav() {
  // Display the WordPress menu if available
  wp_nav_menu( 
    array( 
      'menu' => 'main_nav', /* menu name */
      'menu_class' => 'nav navbar-nav',
      'theme_location' => 'main_nav', /* where in the theme it's assigned */
      'container' => 'false', /* container class */
      'fallback_cb' => 'wp_bootstrap_main_nav_fallback', /* menu fallback */
      'walker' => new Bootstrap_walker()
    )
  );
}

function wp_bootstrap_footer_links() { 
  // Display the WordPress menu if available
  wp_nav_menu(
    array(
      'menu' => 'footer_links', /* menu name */
      'theme_location' => 'footer_links', /* where in the theme it's assigned */
      'container_class' => 'clearfix', /* container class */
      'fallback_cb' => 'wp_bootstrap_footer_links_fallback' /* menu fallback */
    )
  );
}

// this is the fallback for header menu
function wp_bootstrap_main_nav_fallback() { 
  /* you can put a default here if you like */ 
}

// this is the fallback for footer menu
function wp_bootstrap_footer_links_fallback() { 
  /* you can put a default here if you like */ 
}

// Shortcodes
require_once( 'library/shortcodes.php' );

// Admin Functions (commented out by default)
// require_once('library/admin.php');         // custom admin functions

// Set content width
if ( ! isset( $content_width ) ) $content_width = 580;

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'wpbs-wide', 1140 );
add_image_size( 'wpbs-medium', 945 );

/* 
To add more sizes, simply copy a line from above 
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 1140 sized image, 
we would use the function:
<?php the_post_thumbnail( 'wpbs-wide' ); ?>
for the 945 image:
<?php the_post_thumbnail( 'wpbs-medium' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

/************* ACTIVE SIDEBARS ********************/

// Add default sidebars & widgetized areas.
function wp_bootstrap_register_sidebars() {

register_sidebar( array(
  	'id' => 'sidebar1',
  	'name' => 'Main Sidebar',
  	'description' => 'Appears on pages using the default template.',
  	'before_widget' => '<div id="%1$s" class="widget %2$s">',
  	'after_widget' => '</div>',
  	'before_title' => '<h4 class="widgettitle">',
  	'after_title' => '</h4>'
  ) );
  
  register_sidebar( array(
  	'id' => 'four-column-footer',
  	'name' => 'Four Column Footer',
  	'description' => 'Requires four widgets, one for each column.',
  	'before_widget' => '<div id="%1$s" class="widget %2$s col-sm-3">',
  	'after_widget' => '</div>',
  	'before_title' => '<h4 class="widgettitle">',
  	'after_title' => '</h4>'
  ) );
  
  register_sidebar( array(
  	'id' => 'footer-attribution',
  	'name' => 'Footer Attribution',
  	'description' => 'Appears in the lower left footer area.',
  	'before_widget' => '<div id="%1$s" class="widget %2$s">',
  	'after_widget' => '</div>'
  ) );
    
  /* 
  to add more sidebars or widgetized areas, just copy
  and edit the above sidebar code. In order to call 
  your new sidebar just use the following code:
  
  Just change the name to whatever your new
  sidebar's id is, for example:
  
  To call the sidebar in your template, you can just copy
  the sidebar.php file and rename it to your sidebar's name.
  So using the above example, it would be:
  sidebar-sidebar2.php
  */
}
add_action( 'widgets_init', 'wp_bootstrap_register_sidebars' );

/************* COMMENT FORM MODS *********************/
		
// Customize comment layout.
function wp_bootstrap_comments( $comment, $args, $depth ) {
  $GLOBALS['comment'] = $comment; ?>
  
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<div class="comment-author vcard clearfix">
			
				<div class="avatar col-sm-2">
					<?php echo get_avatar( $comment, $size='75' ); ?>
				</div>
				
				<div class="col-sm-10 comment-text clearfix">
				
					<?php printf( '<h4>%s</h4>', get_comment_author_link() );
						edit_comment_link( __( 'Edit', 'wpbootstrap' ) ); ?>
					
					<?php if ($comment->comment_approved == '0') : ?>
					<div class="alert-message success">
    				<p><?php _e('Your comment is awaiting moderation.','wpbootstrap') ?></p>
  				</div>
					<?php endif; ?>
                    
          <?php comment_text(); ?>
					<time datetime="<?php echo comment_time('Y-m-j'); ?>">
						<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
							<?php comment_time('F jS, Y'); ?> </a>
					</time>
                    
					<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 
						'max_depth' => $args['max_depth']))) ?>
				</div>
				
			</div>
		</article>
	<!-- </li> is added by wordpress automatically -->
	
<?php
}

// General comment form customizations.
function wp_bootstrap_comment_form_defaults( $form_fields ) {
    $form_fields['comment_field'] = '<p class="comment-form-comment">'
    	. '<label for="comment">' . _x( 'Comment', 'noun' ) . '</label>'
    	. '<textarea id="comment" name="comment" cols="45" rows="6" aria-required="true">'
    	. '</textarea></p>';
    $form_fields['comment_notes_after'] = ''; // don't show allowed HTML tags
    $form_fields['class_submit'] = 'btn btn-primary';
    $form_fields['label_submit'] = __( 'Comment' );
    return $form_fields;
}
add_filter( 'comment_form_defaults', 'wp_bootstrap_comment_form_defaults' );		

// Display trackbacks/pings callback function.
function list_pings( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	echo '<li id="comment-' . comment_ID() . '"><i class="icon icon-share-alt"></i>&nbsp;';
	comment_author_link();
}

// Modify password protected post form.
function wp_bootstrap_custom_password_form() {
	global $post;
	$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
	$o = '<div class="clearfix"><form class="protected-post-form" action="' . get_option('siteurl') 
		. '/wp-login.php?action=postpass" method="post">' 
		. '<p>' . __( "This post is password protected. To view it please enter your password below:",
			'wpbootstrap') . '</p>' 
		. '<label for="' . $label . '">' . __( "Password:" ,'wpbootstrap') . ' </label>'
		. '<div class="input-append"><input name="post_password" id="' . $label . '" type="password" '
		. 'size="20" /><input type="submit" name="Submit" class="btn btn-primary" value="' 
		. esc_attr__( "Submit",'wpbootstrap' ) . '" /></div>
	</form></div>';
	return $o;
}
add_filter( 'the_password_form', 'wp_bootstrap_custom_password_form' );

/*********** Update standard wp tag cloud widget so that it looks better. ************/

// General tag cloud settings.
function wp_bootstrap_my_widget_tag_cloud_args( $args ) {
	$args['number'] = 20; // show less tags
	$args['largest'] = 9.75; // make largest and smallest the same
	$args['smallest'] = 9.75;
	$args['unit'] = 'px';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'wp_bootstrap_my_widget_tag_cloud_args' );

// Filter tag clould output so that it can be styled by CSS.
function wp_bootstrap_add_tag_class( $taglinks ) {
	$tags = explode('</a>', $taglinks);
	$regex = "#(.*tag-link[-])(.*)(' title.*)#e";

	foreach( $tags as $tag ) {
		$tagn[] = preg_replace($regex, "('$1$2 label tag-'.get_tag($2)->slug.'$3')", $tag );
	}

	$taglinks = implode( '</a>', $tagn );

	return $taglinks;
}
add_action( 'wp_tag_cloud', 'wp_bootstrap_add_tag_class' );

// Add div with id around tag cloud.
function wp_bootstrap_wp_tag_cloud_filter( $return, $args ) {
  return '<div id="tag-cloud">' . $return . '</div>';
}
add_filter( 'wp_tag_cloud','wp_bootstrap_wp_tag_cloud_filter', 10, 2 );

// Enable shortcodes in widgets.
add_filter( 'widget_text', 'do_shortcode' );

// Disable jump in 'read more' link.
function wp_bootstrap_remove_more_jump_link( $link ) {
	$offset = strpos($link, '#more-');
	if ( $offset ) {
		$end = strpos( $link, '"',$offset );
	}
	if ( $end ) {
		$link = substr_replace( $link, '', $offset, $end-$offset );
	}
	return $link;
}
add_filter( 'the_content_more_link', 'wp_bootstrap_remove_more_jump_link' );

// Remove height/width attributes on images so they can be responsive.
function wp_bootstrap_remove_thumbnail_dimensions( $html ) {
  $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
  return $html;
}
add_filter( 'post_thumbnail_html', 'wp_bootstrap_remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'wp_bootstrap_remove_thumbnail_dimensions', 10 );

// Add thumbnail class to thumbnail links.
function wp_bootstrap_add_class_attachment_link( $html ) {
  $postid = get_the_ID();
  $html = str_replace( '<a', '<a class="thumbnail"', $html );
  return $html;
}
add_filter( 'wp_get_attachment_link', 'wp_bootstrap_add_class_attachment_link', 10, 1 );

// Add lead class to first paragraph.
function wp_bootstrap_first_paragraph( $content ){
  global $post;

  // if we're on the homepage, don't add the lead class to the first paragraph of text.
  if( is_page_template( 'page-homepage.php' ) )
  	return $content;
  else
    return preg_replace( '/<p([^>]+)?>/', '<p$1 class="lead">', $content, 1 );
}
add_filter( 'the_content', 'wp_bootstrap_first_paragraph' );

// Menu output mods.
class Bootstrap_walker extends Walker_Nav_Menu {

	function start_el( &$output, $object, $depth = 0, $args = Array(), $current_object_id = 0 ) {

		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		// If the item has children, add the dropdown class for bootstrap
		if ( $args->has_children ) {
			$class_names = "dropdown ";
		}
	
		$classes = empty( $object->classes ) ? array() : (array) $object->classes;
		
		$class_names .= join( ' ', apply_filters( 'nav_menu_css_class', 
			array_filter( $classes ), $object ) );
		$class_names = ' class="'. esc_attr( $class_names ) . '"';
       
   	$output .= $indent . '<li id="menu-item-'. $object->ID . '"' . $value . $class_names .'>';

   	$attributes  = ! empty( $object->attr_title ) ? ' title="'  
   		. esc_attr( $object->attr_title ) .'"' : '';
   	$attributes .= ! empty( $object->target ) ? ' target="'
   		. esc_attr( $object->target ) . '"' : '';
   	$attributes .= ! empty( $object->xfn ) ? ' rel="'    . esc_attr( $object->xfn ) .'"' : '';
   	$attributes .= ! empty( $object->url ) ? ' href="'   . esc_attr( $object->url ) .'"' : '';

   	// if the item has children add these two attributes to the anchor tag
   	if ( $args->has_children ) {
		  $attributes .= ' class="dropdown-toggle" data-toggle="dropdown"';
    }

    $item_output = $args->before;
    $item_output .= '<a'. $attributes . '>';
    $item_output .= $args->link_before . apply_filters( 'the_title', $object->title, $object->ID );
    $item_output .= $args->link_after;

    // if the item has children add the caret just before closing the anchor tag
    if ( $args->has_children ) {
    	$item_output .= '<b class="caret"></b></a>';
    }
    else {
    	$item_output .= '</a>';
    }

    $item_output .= $args->after;
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $object, $depth, $args );
  } // end start_el function
        
  function start_lvl( &$output, $depth = 0, $args = Array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
  }
      
	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ){
    $id_field = $this->db_fields['id'];
    if ( is_object( $args[0] ) ) {
			$args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
    }
    return parent::display_element( 
    	$element, $children_elements, $max_depth, $depth, $args, $output );
  }        
}

// Add CSS to the WYSIWYG editor.
if( ! function_exists("wp_bootstrap__add_editor_styles") ) { 
	function wp_bootstrap_add_editor_styles() {
		add_editor_style( get_template_directory_uri() . '/library/dist/css/styles.min.css' );
	}
}
add_action( 'admin_init', 'wp_bootstrap_add_editor_styles' );


// Add .active class to active mentu items.
if( !function_exists( 'wp_bootstrap_add_active_class' ) ) {  
	function wp_bootstrap_add_active_class( $classes, $item ) {
		if( $item->menu_item_parent == 0 && in_array( 'current-menu-item', $classes ) ) {
		  $classes[] = "active";
		}
		return $classes;
	}
}
add_filter( 'nav_menu_css_class', 'wp_bootstrap_add_active_class', 10, 2 );

// Enqueue styles.
if( !function_exists( 'wp_bootstrap_theme_styles' ) ) {  
  function wp_bootstrap_theme_styles() {

    // This is the compiled css file from LESS - this means you compile the LESS file locally 
    // and put it in the appropriate directory if you want to make any changes to the master 
    // bootstrap.css.
		wp_register_style( 'wpbs', 
    	get_template_directory_uri() . '/library/dist/css/styles.283fe4ca.min.css', 
    	array(), 
    	'1.0', 
    	'all' 
    );
    wp_enqueue_style( 'wpbs' );				

    // Include child theme stylesheet.
    wp_register_style( 'wpbs-style', 
    	get_stylesheet_directory_uri() . '/style.css',
    	array(), 
    	'1.0', 
    	'all' 
    );
    wp_enqueue_style( 'wpbs-style' );
  }
}
add_action( 'wp_enqueue_scripts', 'wp_bootstrap_theme_styles' );

// Enqueue javascript.
if( !function_exists( 'wp_bootstrap_theme_js' ) ) {  
  function wp_bootstrap_theme_js(){

    if ( !is_admin() ){
      if ( is_singular() AND comments_open() AND ( get_option( 'thread_comments' ) == 1) ) 
        wp_enqueue_script( 'comment-reply' );
    }

    // By default, this inculdes a minimal subset of the possible Bootstrap js distribution files.
    // To include more components, add files to Grunt.js and recompile.
    wp_register_script( 'wpbs-js', 
      get_template_directory_uri() . '/library/dist/js/scripts.d7c79406.min.js',
      array('jquery', 'bootstrap'), 
      '1.2' );
  
    wp_register_script( 'modernizr', 
      get_template_directory_uri() . '/bower_components/modernizer/modernizr.js', 
      array('jquery'), 
      '1.2' );
  
    wp_enqueue_script( 'bootstrap' );
    wp_enqueue_script( 'wpbs-js' );
    wp_enqueue_script( 'modernizr' );
  }
}
add_action( 'wp_enqueue_scripts', 'wp_bootstrap_theme_js' );

// Get <head> <title> to behave like other themes.
function wp_bootstrap_wp_title( $title, $sep ) {
  global $paged, $page;

  if( is_feed() ) {
    return $title;
  }

  // Add the site name.
  $title .= get_bloginfo( 'name' );

  // Add the site description for the home/front page.
  $site_description = get_bloginfo( 'description', 'display' );
  if( $site_description && ( is_home() || is_front_page() ) ) {
    $title = "$title $sep $site_description";
  }

  // Add a page number if necessary.
  if ( $paged >= 2 || $page >= 2 ) {
    $title = "$title $sep " . sprintf( __( 'Page %s', 'wpbootstrap' ), max( $paged, $page ) );
  }

  return $title;
}
add_filter( 'wp_title', 'wp_bootstrap_wp_title', 10, 2 );

// Related Posts Function (call using wp_bootstrap_related_posts(); ).
function wp_bootstrap_related_posts() {

  echo '<ul id="bones-related-posts">';
  global $post;
  $tags = wp_get_post_tags( $post->ID );

  if( $tags ) {
  
    foreach( $tags as $tag ) {
    	$tag_arr .= $tag->slug . ',';
    }
    
		$args = array(
			'tag' => $tag_arr,
			'numberposts' => 5, /* you can change this to show more */
			'post__not_in' => array( $post->ID )
		);
		
    $related_posts = get_posts( $args );
    if( $related_posts ) {
      foreach( $related_posts as $post ) {
      	setup_postdata($post);
        echo '<li class="related_post"><a href="' . the_permalink() . '" ' 
        	. 'title="' . the_title_attribute() . '">' . the_title() . '</a></li>';
      }
    } else {
 			echo '<li class="no_related_post">No Related Posts Yet!</li>';
    }
  }
  wp_reset_query();
  echo '</ul>';
}

// Numeric Page Navi (built into the theme by default).
function wp_bootstrap_page_navi( $before = '', $after = '' ) {

  global $wpdb, $wp_query;
  $request = $wp_query->request;
  $posts_per_page = intval( get_query_var( 'posts_per_page' ) );
  $paged = intval( get_query_var( 'paged' ) );
  $numposts = $wp_query->found_posts;
  $max_page = $wp_query->max_num_pages;
  
  if ( $numposts <= $posts_per_page ) { return; }
  if(empty($paged) || $paged == 0) {
    $paged = 1;
  }
  
  $pages_to_show = 7;
  $pages_to_show_minus_1 = $pages_to_show - 1;
  $half_page_start = floor( $pages_to_show_minus_1 / 2 );
  $half_page_end = ceil( $pages_to_show_minus_1 / 2 );
  $start_page = $paged - $half_page_start;
  
  if($start_page <= 0) {
    $start_page = 1;
  }
  
  $end_page = $paged + $half_page_end;
  if(($end_page - $start_page) != $pages_to_show_minus_1) {
    $end_page = $start_page + $pages_to_show_minus_1;
  }
  if($end_page > $max_page) {
    $start_page = $max_page - $pages_to_show_minus_1;
    $end_page = $max_page;
  }
  if($start_page <= 0) {
    $start_page = 1;
  }
    
  echo $before . '<ul class="pagination">'."";
  
  if( $paged > 1 ) {
    $first_page_text = '&laquo';
    echo '<li class="prev"><a href="' . get_pagenum_link() . '" title="' 
    	. __( 'First', 'wpbootstrap' ) . '">' . $first_page_text . '</a></li>';
  }
    
  $prevposts = get_previous_posts_link( __( '&larr; Previous', 'wpbootstrap' ) );
  if( $prevposts ) { 
  	echo '<li>' . $prevposts  . '</li>'; 
  }
  else { 
  	echo '<li class="disabled"><a href="#">' . __( '&larr; Previous', 'wpbootstrap' ) . '</a></li>';
  }
  
  for( $i = $start_page; $i  <= $end_page; $i++ ) {
    if( $i == $paged ) {
      echo '<li class="active"><a href="#">' . $i . '</a></li>';
    } else {
      echo '<li><a href="' . get_pagenum_link( $i ) . '">' . $i . '</a></li>';
    }
  }
  
  echo '<li class="">';
  next_posts_link( __( 'Next &rarr;', 'wpbootstrap' ) );
  echo '</li>';
  
  if( $end_page < $max_page ) {
    $last_page_text = "&raquo;";
    echo '<li class="next"><a href="' . get_pagenum_link( $max_page ) . '" title="' 
    	. __( 'Last', 'wpbootstrap' ) . '">' . $last_page_text . '</a></li>';
  }
  
  echo '</ul>' . $after . "";
}

// Remove <p> tags from around images.
function wp_bootstrap_filter_ptags_on_images( $content ){
  return preg_replace( '/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', 
  	$content );
}
add_filter( 'the_content', 'wp_bootstrap_filter_ptags_on_images' );

// Add a logo uploader to the theme customizer. 
function wp_bootstrap_theme_customizer( $wp_customize ) {
	$wp_customize->add_section( 'wp_bootstrap_logo_section' , array(
	  'title'       => __( 'Logo', 'wp-bootstrap' ),
	  'priority'    => 30,
	  'description' => 'Upload a logo to replace the default site name in the header.',
	) );
	$wp_customize->add_setting( 'wp_bootstrap_logo' );
	$wp_customize->add_control( new WP_Customize_Image_Control( 
		$wp_customize, 
		'wp_bootstrap_logo', 
		array(
		  'label'    => __( 'Logo', 'wp-bootstrap' ),
		  'section'  => 'wp_bootstrap_logo_section',
		  'settings' => 'wp_bootstrap_logo',
		)
	) );
}
add_action('customize_register', 'wp_bootstrap_theme_customizer');

