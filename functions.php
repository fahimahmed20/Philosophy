<?php
/*
* Require template parts
*/

require_once(get_theme_file_path('inc/tgm.php'));
require_once(get_theme_file_path('inc/acf.php'));
require_once(get_theme_file_path('inc/attachment.php'));

/*
* After setup the theme enable options
*/

function philosophy_theme_setup(){
    add_theme_support("title-tag");
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
    //add_theme_support("post-formets", array("audio","video","image","gallery","quote","link"));
    add_theme_support( 'post-formats', array('aside','audio','chat','gallery','image','link','quote','status','video') );
	add_theme_support( 'menus' );
	add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'custom-logo' );
    add_image_size('philosophy-image',400,400,true);
	remove_theme_support( 'widgets-block-editor' );
}
add_action("after_setup_theme","philosophy_theme_setup");


/*
* Enable svg support
*/
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');
/*
* Enable menu options
*/

if ( ! function_exists( 'mytheme_register_nav_menu' ) ) {

	function mytheme_register_nav_menu(){
		register_nav_menus( array(
			'primary_menu' => __( 'Primary Menu', 'philosophy' )
			//'footer_menu'  => __( 'Footer Menu', 'philosophy' ),
		) );
	}
	add_action( 'after_setup_theme', 'mytheme_register_nav_menu', 0 );
}

/*
** Theme extra file enqueue
*/

function add_scripts(){
    wp_enqueue_style("font-awesome", get_theme_file_uri("/assets/css/font-awesome/css/font-awesome.min.css"),null, 1.0);
    wp_enqueue_style("fonts", get_theme_file_uri("/assets/css/fonts.css"),null,1.0);
    wp_enqueue_style("base-css", get_theme_file_uri("/assets/css/base.css"),null,1.0);
    wp_enqueue_style("vendor-css", get_theme_file_uri("/assets/css/vendor.css"),null,1.0);
    wp_enqueue_style("main-css", get_theme_file_uri("/assets/css/main.css"),null,1.0);
    wp_enqueue_style("theme-style",get_stylesheet_uri());

    wp_enqueue_script("modernizr-js",get_theme_file_uri("assets/js/modernizr.js"),array(),1.0,false);
    wp_enqueue_script("pace-js",get_theme_file_uri("assets/js/pace.min.js"),array(),1.0,false);
    wp_enqueue_script("plugins-js",get_theme_file_uri("assets/js/plugins.js"),array("jquery"),1.0,true);
    wp_enqueue_script("main-js",get_theme_file_uri("assets/js/main.js"),array("jquery"),1.0,true);
}
add_action("wp_enqueue_scripts","add_scripts");

/*
** Classic editor enable
*/

if ( version_compare($GLOBALS['wp_version'], '5.0-beta', '>') ) {
    // WP > 5 beta
    add_filter( 'use_block_editor_for_post_type', '__return_false', 100 );
} else {
    // WP < 5 beta
    add_filter( 'gutenberg_can_edit_post_type', '__return_false' );
}


/*
** Pagination function
*/
function philosophy_pagi(){
	global $wp_query;
	$links = paginate_links(array(
		'current' => max(1,get_query_var('paged')),
		'total' => $wp_query->max_num_pages,
		'type' =>'list'
	));
	$links = str_replace("page-numbers","pgn__num", $links);
	$links = str_replace("<ul class='pgn__num'>","<ul>", $links);
	$links = str_replace('next pgn__num','pgn__next', $links);
	$links = str_replace('prev pgn__num','pgn__prev', $links);
	echo $links;
}

/*
** category description extra pragraph remove
*/

remove_action('term_description','wpautop');
/*
** gutenburg editor active
*/
if ( version_compare($GLOBALS['wp_version'], '5.0-beta', '>') ) {
    // WP > 5 beta
    add_filter( 'use_block_editor_for_post_type', '__return_false', 100 );
} else {
    // WP < 5 beta
    add_filter( 'gutenberg_can_edit_post_type', '__return_false' );
}


/*
** register side bar for about page
*/
function about_page_widget() {
	register_sidebar( array(
		'name'          => __( 'About page sidebar', 'philosophy' ),
		'id'            => 'about_page',
		'description'   => __( 'Widgets in this area will be shown on about pages.', 'philosophy' ),
		'before_widget' => '<div id="%1$s" class="col-block %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="quarter-top-margin">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer to right side widget', 'philosophy' ),
		'id'            => 'footer_top_right',
		'description'   => __( 'Widgets in this area will be shown on footer to right side.', 'philosophy' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Column one', 'philosophy' ),
		'id'            => 'footer_widget_one',
		'description'   => __( 'Widgets in this area will be shown on footer column one.', 'philosophy' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Column Two', 'philosophy' ),
		'id'            => 'footer_widget_two',
		'description'   => __( 'Widgets in this area will be shown on footer column two.', 'philosophy' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Column Three', 'philosophy' ),
		'id'            => 'footer_widget_three',
		'description'   => __( 'Widgets in this area will be shown on footer column 3.', 'philosophy' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Column four', 'philosophy' ),
		'id'            => 'footer_widget_four',
		'description'   => __( 'Widgets in this area will be shown on footer column 3.', 'philosophy' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Soket', 'philosophy' ),
		'id'            => 'footer_widget_soket',
		'description'   => __( 'Widgets in this area will be shown on footer column 3.', 'philosophy' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'about_page_widget' );
/*
* add extra jquery
*/
function add_script(){
	?>
	<script>
		jQuery(function($){
			$('#menu-quick-links').addClass('s-footer__linklist');
			$('#menu-quick-links-1').addClass('s-footer__linklist');
			$('#menu-social-menu').addClass('s-footer__linklist');
		})
	</script>
<?php
}
add_action('wp_footer','add_script');
/*
* search form
*/
function philosophy_search_form($form){
	$philosophy_home = home_url('/');
	$philosophy_search_label = __('Search for:','philosophy');
	$philosophy_search_btn = __('Search','philosophy');
	$newform = <<<FORM
	<form role="search" method="get" class="header__search-form" action="{$philosophy_home}">
		<label>
			<span class="hide-content">{$philosophy_search_label}</span>
			<input type="search" style="color:#fff" class="search-field" placeholder="Type Keywords" value="" name="s" title="{$philosophy_search_label}" autocomplete="off">
		</label>
			<input type="submit" class="search-submit" value="{$philosophy_search_btn}">
	</form>
	FORM;
	return $newform;
}
add_filter('get_search_form','philosophy_search_form');



