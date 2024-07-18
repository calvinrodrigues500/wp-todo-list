<?php

/**
 * Plugin Name: WP Todo List
 * Description: A todo list for WP admin and authorized users
 * Version: 1.0.0
 * Author: Calvin Rodrigues
 * Author URI: https://calvinrodrigues.in
 * Text Domain: wp-todo-list
 */

defined('ABSPATH') || exit;

// Autoload classes
require_once __DIR__ . '/vendor/autoload.php';


/**
 * Add a widget to the dashboard.
 *
 * This function is hooked into the 'wp_dashboard_setup' action below.
 */
function wp_td_add_dashboard_widgets() {
	wp_add_dashboard_widget(
		'wp_td_dashboard_widget',
		esc_html__('WP TODO - Create Track and Do', 'wp-todo-list'),
		'wp_td_dashboard_widget_render'
	);
}

add_action('wp_dashboard_setup', 'wp_td_add_dashboard_widgets');

/**
 * Output the content of the Widget.
 */
function wporg_dashboard_widget_render() {

	_e("<div id='wp-todo-list'></div>", "wp-todo-list");
}


// Plugin Scripts.
add_action('admin_enqueue_scripts', 'wp_td_intialize_plugin_scripts');

/**
 * Initialize scripts required for the plugin
 */
function wp_td_intialize_plugin_scripts() {

	wp_enqueue_style(
		'wp-todo-list-style',
		plugin_dir_url(__FILE__) . 'build/index.css',
		array('wp-components'),
		"1.0.0"
	);

	wp_enqueue_script(
		'wp-tod-list-script',
		plugin_dir_url(__FILE__) . 'build/index.js',
		array('wp-element', 'wp-components'),
		"1.0.0",
		true
	);
}
