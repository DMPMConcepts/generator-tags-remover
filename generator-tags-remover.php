<?php
/*
Plugin Name: Generator Tags Remover
Plugin URI: http://www.2020compute.com/
Description: It Removes generator tags of Wordpress, Revolution Slider, WPML, Visual Composer, WooCommerce.
Version: 1.0
Author: Gulshan Thakare
Author URI: http://www.2020compute.com/
GitHub Plugin URI: https://github.com/2020Compute/
*/
/**
 * Remove <meta name="generator"> tag created by the WPML PLugin. 
 */
if ( !empty ( $GLOBALS['sitepress'] ) ) {

	function remove_wpml_generator() {
	
		remove_action(
		    current_filter(),
		    array ( $GLOBALS['sitepress'], 'meta_generator_tag' )
		);
	
	}
	add_action( 'wp_head', 'remove_wpml_generator', 0 );
	
} 

// hide the meta tag generator from head and rss
function disable_version() {
   return '';
}
add_filter('the_generator','disable_version');
remove_action('wp_head', 'wp_generator');

//hide meta tag generator for rev slider 
function remove_revslider_meta_tag() {
    return '';
 }
 add_filter( 'revslider_meta_generator', 'remove_revslider_meta_tag' );

//hide meta tag generator for vc

function myoverride() {
if ( class_exists( 'Vc_Manager' ) ) {
	
remove_action('wp_head', array(visual_composer(), 'addMetaData'));
}
}
add_action('init', 'myoverride', 100);


//Remove WooCommerce Generator Tag
function remove_woo_commerce_generator_tag()
{
    remove_action('wp_head','wc_generator_tag');
}
add_action('get_header','remove_woo_commerce_generator_tag');