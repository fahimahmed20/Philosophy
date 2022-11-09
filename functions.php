<?php

/*
* After setup the theme enable options
*/

function philosophy_theme_setup(){
    add_theme_support("title-tag");
    add_theme_support("post-thumbnail");
    add_theme_support( 'html5', array( 'search-form', 'comment-list' ) );
    add_theme_support("post-formets", array("audio","video","image","gallery","quote","link"));
}
add_action("after_setup_theme","philosophy_theme_setup");

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