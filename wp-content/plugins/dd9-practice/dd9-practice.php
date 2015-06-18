<?php
/*
Plugin Name: DD9 Practice
Plugin URI:  http://dd9.com
Description: DD9's internal-use, practice and play plugin
Version:     0.1.0
Author:      DD9
Author URI:  http://dd9.com
License:     GPL2

*/


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
  die;
}


//programatically generate post_meta

function generate_some_post_meta($post_id){
  $post = get_post($post_id);
  
  //print_r($post);

  //generate some custom content
  $unique_meta = $post->post_title;// + $post->post_date;
  $unique_meta .= " " . date("Y M", strtotime($post->post_date));
  $unique_meta = sanitize_title($unique_meta);
  
  //write or update a custom field
  if (! add_post_meta($post_id, 'generated_meta_field', $unique_meta, true) ){
    update_post_meta($post_id, 'generated_meta_field', $unique_meta);
  }
  //echo "" . $unique_meta;
  //die();
}

//hook into save_post
add_action('save_post', 'generate_some_post_meta');


//show_meta on front end
//inject post_meta
function append_generated_meta_field($content){
  global $post;
 
  if (get_post_meta($post->ID, 'generated_meta_field') ){
    $unique_meta = get_post_meta($post->ID, 'generated_meta_field')[0];

    $content .= "<blockquote>";
    $content .= $unique_meta;
    $content .= "</blockquote>";
  }

  //return the content
  return $content;
}

//hook into filter for the content
add_filter('the_content', 'append_generated_meta_field');

