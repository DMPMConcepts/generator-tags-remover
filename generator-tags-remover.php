<?php
/*
Plugin Name: Generator Tags Remover
Plugin URI: 
Description: It Removes generator tags of Wordpress, Revolution Slider, WPML, Visual Composer, WooCommerce.
Version: 1.1
Author: Gulshan Thakare
Author URI: http://www.dmpmconcepts.com/
GitHub Plugin URI: https://github.com/DMPMConcepts/generator-tags-remover
*/


function remove_generator_tags() {
		
//hide meta tag generator for rev slider 
    
	add_filter( 'revslider_meta_generator', '__return_empty_string' );
	
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
