<?php
/**
 * Plugin Name: Remove Classic Theme Styles
 * Description: WordPress 6.1 enqueued a classic-themes.css stylesheet, which has basic styles for the Button and File block links. If the active theme includes sufficient styling for these blocks, this plugin could remove the Core styles.
 * Version:     0.1
 * Author:      Stephen Bernhardt
 * Author URI:  https://github.com/sabernhardt
 * License:     GPLv2 or later
 * License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Requires at least: 6.1
 * Requires PHP: 5.6
 */

if ( ! defined( 'ABSPATH' ) ) { die( 'Invalid request.' ); }

// Creates the function to dequeue.
function sab_remove_classic_theme_styles() {
	wp_dequeue_style( 'classic-theme-styles' );
}

// Dequeues from front end.
add_action( 'wp_enqueue_scripts', 'sab_remove_classic_theme_styles' );

// Dequeues from the editor, if proposed edit for WordPress 6.3 is merged.
add_action( 'enqueue_block_editor_assets', 'sab_remove_classic_theme_styles' );

// Removes the filter used in WordPress 6.1 and 6.2.
remove_filter( 'block_editor_settings_all', 'wp_add_editor_classic_theme_styles' );
