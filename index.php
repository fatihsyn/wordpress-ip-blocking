<?php
/*
Plugin Name: IP Blocking
Plugin URI: https://www.fatihsayin.com.tr
Description: By installing the relevant plugin, you can block users that you do not want to log in to wordpress and ensure the security of your site.
Version: 1.0
Author: Fatih SAYIN
Author URI: https://www.fatihsayin.com.tr
License: GNU
*/

function iPAdress()
{
	$supports = array(
		'title',
		'operation',
		'post-formats',

	);
	$labels = array(
		'name' => _x('IP Blocking', 'plural'),
		'singular_name' => _x('IP Blocking', 'singular'),
		'menu_name' => _x('IP Blocking', 'admin menu'),
		'name_admin_bar' => _x('IP Blocking', 'admin bar'),
		'add_new' => _x('New iP Add', 'add new'),
		'add_new_item' => __('New iP Add'),
		'new_item' => __('New iP Add'),
		'edit_item' => __('iP Edit'),
		'view_item' => __('iP View'),
		'all_items' => __('All IP Addresses'),
		'search_items' => __('iP Search'),
		'not_found' => __('iP Not Found.'),
	);
	$args = array(
		'supports' => $supports,
		'labels' => $labels,
		'public' => true,
		'query_var' => true,
		'has_archive' => false,
		'hierarchical' => true,
		'show_in_admin_bar'   => true,

	);
	register_post_type('iPAdress', $args);
	register_taxonomy_for_object_type('category', 'page');
}

add_action('init', 'iPAdress');

 $args = array(
 'post_type' => 'iPAdress'
 );
 $my_posts = get_posts( $args );
 if( ! empty( $my_posts ) ){
   $banned_ip = array();
   foreach ( $my_posts as $p ){
     $banned_ip[] =  $p->post_title;
   }
 }
  foreach($banned_ip as $banned) {
      $ip = $_SERVER['REMOTE_ADDR'];
      if($ip == $banned){
          echo "Your IP address has been blocked!!";
          exit();
      }
  }
  ?>
