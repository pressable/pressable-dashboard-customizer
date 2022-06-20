<?php
/*
Plugin Name: White-label Dashboard
Plugin URI: https://pressable.com
Description: This plugin removes the web host's banner from the WordPress admin dashboard
Version: 1.0.1
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

// remove the "Welcome to Pressable" widget box from dashboard
function remove_pressable_widget_with_plugin() {  // must be different name than identical function used in functions.php so function_exists() isn't accidentally triggered
        remove_meta_box( 'pressable_dashboard_widget', 'dashboard', 'normal' );
}

// if pressable widget is active, remove it
function remove_widget_if_active() {
        if (!function_exists('remove_pressable_widget')) {
            add_action('wp_dashboard_setup', 'remove_pressable_widget_with_plugin' );
    }
}

add_action('wp_dashboard_setup', 'remove_pressable_widget_with_plugin');
?>