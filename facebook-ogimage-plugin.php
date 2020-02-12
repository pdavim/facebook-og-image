<?php
/*
Plugin Name: Facebook Image Og PlugIn
Description: solve OG Image problem
Plugin URI: https://github.com/pdavim/facebook-og-image
Description: Pugin to solve OG Image problem
Version: 1.0.1
Author: pdavim
Author URI: https://pdavim.com
License: GPLv2 or later
Text Domain: facebookOGimage
*/
/* Start Adding Functions Below this Line */
  //Adding the Open Graph in the Language Attributes
function add_opengraph_doctype( $output ) {
    return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
}
add_filter('language_attributes', 'add_opengraph_doctype');

//Lets add Open Graph Meta Info

function insert_fb_in_head() {
global $post;
if ( !is_singular()) //if it is not a post or a page
    return;
    echo '<meta property="fb:admins" content="1580237029"/>';
    echo '<meta property="og:title" content="' . get_the_title() . '"/>';
    echo '<meta property="og:type" content="article"/>';
    echo '<meta property="og:url" content="' . get_permalink() . '"/>';
    echo '<meta property="og:site_name" content="PDAVIM Creative Media Agency"/>';
if(!has_post_thumbnail( $post->ID )) { //the post does not have featured image, use a default image
    $default_image="https://pdavim.com/wp-content/uploads/2017/02/logo_pdavim2_Stiky_movel.png"; //replace this with a default image on your server or an image in your media library
    echo '<meta property="og:image" content="' . $default_image . '"/>';
}
else{
    $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
    echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
}
echo "
";
}
add_action( 'wp_head', 'insert_fb_in_head', 5 );
  
/* Stop Adding Functions Below this Line */
?>