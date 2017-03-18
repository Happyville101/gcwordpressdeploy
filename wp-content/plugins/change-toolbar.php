<?php 
/* 
Plugin Name: Change Toolbar Plugin 
URI: http://www.sitepoint.com/change-wordpress-33-toolbar 
Description: Modifies the WordPress 3.3+ toolbar. 
Version: 1.0 
Author: Craig Buckler 
Author URI: http://optimalworks.net/ License: GPL2 
*/ 
function 
change_toolbar($wp_toolbar) {
	$wp_toolbar->remove_node('wp-logo');
}
add_action('admin_bar_menu', 'change_toolbar', 999);
