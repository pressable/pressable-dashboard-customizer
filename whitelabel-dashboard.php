<?php
/*
Plugin Name: White-label Dashboard
Plugin URI: https://pressable.com
Description: This plugin removes the web host's banner from the WordPress admin dashboard
Version: 1.0.0
Author: Pressable
Author URI: https://pressable.com
License: GPLv2 
*/

// disable direct file access
if (!defined('ABSPATH')) {
    exit;
}

// plugin can only work for site hosted on Pressable.
if (!defined('IS_PRESSABLE')) {
    return;
}

// remove the "Welcome to Pressable" widget box from dashboard when it is loaded
function remove_pressable_widget() {
		remove_meta_box( 'pressable_dashboard_widget', 'dashboard', 'normal' );
    }

add_action('wp_dashboard_setup', 'remove_pressable_widget' );
?>