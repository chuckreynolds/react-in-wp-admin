<?php

/*
 * Plugin Name: React plugin
 * Description: Boilerplate template for setting up React dev environment for a wp-admin plugin.
 * Version:     0.1.0
 * Author:      Derek Smart
 * Author URI:  http://dsmart.me
 * Text Domain: react-plugin
 */

class React_Plugin {
	public static $menu_slug = 'react-plugin';

	public static function add_hooks() {
		add_action( 'init',                  array( __CLASS__, 'init' ) );
		add_action( 'admin_menu',            array( __CLASS__, 'admin_menu' ) );
		add_action( 'admin_enqueue_scripts', array( __CLASS__, 'admin_enqueue_scripts' ) );
	}

	public static function init() {
		wp_register_script( 'react-plugin', plugins_url( 'build/admin.js', __FILE__ ), array(), time(), true );
		wp_register_style( 'react-plugin-css', plugins_url( 'css/components.css', __FILE__ ), array(), time() );
	}

	public static function admin_menu() {
		add_menu_page( __( 'React Plugin', 'react-in-wp-admin' ), __( 'React Plugin', 'react-in-wp-admin' ), 'manage_options', self::$menu_slug, array( __CLASS__, 'admin_page' ) );
	}

	public static function admin_enqueue_scripts( $hook_suffix ) {
		if ( 'toplevel_page_' . self::$menu_slug != $hook_suffix ) {
			return;
		}

		wp_enqueue_script( 'react-plugin' );
		wp_enqueue_style( 'react-plugin-css' );
	}

	public static function admin_page() {
		?>
		<div id="react-plugin-container"></div>
		<?php
	}

}

React_Plugin::add_hooks();
