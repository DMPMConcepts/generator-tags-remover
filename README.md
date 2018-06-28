# Generator Tags and Version Info Remover
WordPress is the most popular blogging and CMS system, which makes it a favourite target for hackers. Generator tag easily provides the version info to the hackers from which they find out the known vulnerability. The "Generator Tags and Version Info Remover" plays a vital role to block such activity.
  
 In the world, '90,978' WordPress site is hacked per minute. As a developer, we always need to take extra efforts to avoid this kind of cyber attack. The major cause to target WordPress site is it's known vulnerabilities. By using the version information of various plugins or WordPress, hackers can easily target the data.
 
 To avoid this type of threat, we highly recommend to use "Generator Tags and Version Info Remover" plugin. It is important to mention that this plugin doesn't guarantee a 100% protection against hacking attempts, mostly because a 100% secure website doesn't exist, but it will protect you against easy attacks.
 
 ## List of supported plugins
 
 * ### Revolution Slider
 * ### Layer Slider
 * ### Visual Composer
 * ### WPML
 * ### WooCommerce
 
 
 ## Please raise the issue for more plugins !
 
 
 
function redirect_unattached_images() {
if ( is_attachment() ) {
global $post;
if  ( $post->post_parent == 0 ) {

        wp_redirect( 'https://www.tricorglobal.com' );
}
else{
        wp_redirect(get_permalink($post->post_parent)) ;
  }
 }
}
add_action('template_redirect', 'redirect_unattached_images');


