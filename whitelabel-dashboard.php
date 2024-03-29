<?php
/*
Plugin Name: White-label Dashboard
Description: This plugin removes a welcome banner from the WordPress Admin dashboard.
Version: 1.0.2
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

// remove the "Welcome to Pressable" widget box from dashboard if functions.php isn't already removing it
function remove_pressable_widget_with_plugin() {

// get some info about active theme and its functions.php
    $active_theme_slug = get_stylesheet(); // get active theme's slug as a string
    $theme_functions = file_get_contents(WP_CONTENT_DIR . '/themes/' . $active_theme_slug . '/functions.php'); // get conte$
 
// what are we looking for in the theme's functions.php?
    $function_name = 'remove_pressable_widget';
 
    if (!strpos((string) $theme_functions, (string) $function_name)) { 
        remove_meta_box( 'pressable_dashboard_widget', 'dashboard', 'normal' );
    }
}

add_action('wp_dashboard_setup', 'remove_pressable_widget_with_plugin');
