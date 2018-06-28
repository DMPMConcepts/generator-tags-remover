<?php
/*
Plugin Name: Generator Tags & Version Info Remover
Plugin URI: 
Description: It Removes generator tags of Wordpress, Revolution Slider, Layer Slider, WPML, Visual Composer, WooCommerce. It also removes the version info from the stylesheet.
Version: 2.0
Author: Gulshan Thakare
Author URI: http://www.dmpmconcepts.com/
GitHub Plugin URI: https://github.com/DMPMConcepts/generator-tags-remover
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

function remove_generator_tags() {
		
//hide meta tag generator for rev slider 
    
	add_filter( 'revslider_meta_generator', '__return_empty_string' );
	
//hide meta tag generator for Layer Slider
    
	add_filter( 'ls_meta_generator', '__return_empty_string' );	
	
// hide the meta tag generator from head and rss

    add_filter('the_generator','__return_empty_string');
    remove_action('wp_head', 'wp_generator');		
		
//hide meta tag generator WPML Plugin 		
	
	if ( !empty ( $GLOBALS['sitepress'] ) ) {
		remove_action(
		    'wp_head',
		    array ( $GLOBALS['sitepress'], 'meta_generator_tag' )
		);
		
	}
//hide meta tag generator for vc
	
		if ( class_exists( 'Vc_Manager' ) ) {
	
remove_action('wp_head', array(visual_composer(), 'addMetaData'));
}

//Remove WooCommerce Generator Tag

    remove_action('wp_head','wc_generator_tag');
	
	
} 

add_action('init', 'remove_generator_tags');

// remove version info from Stylesheet

function pkm_remove_appended_version_script_style( $target_url ) {
    $filename_arr = explode('?', basename($target_url));
    $filename = $filename_arr[0];
        /* check if "ver=" argument exists in the url or not */
        if(strpos( $target_url, 'ver=' )) {
            $target_url = remove_query_arg( 'ver', $target_url );
        }
    return $target_url;
}
pkm_remove_appended_version_script_style( $url );

add_filter('style_loader_src', 'pkm_remove_appended_version_script_style', 20000);
