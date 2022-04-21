<?php
/**
 * Plugin Name: US(WP)DS
 * Plugin URI: US-WP-DS
 * Description: Plugin to make US Web Design System components available in WordPress
 * Version: v0.0.1
 * Author: U.S. Department of State, Bureau of Global Public Affairs Digital Lab <gpa-lab@fan.gov>
 * Text Domain: gpalab-uswpds
 * License: GNU General Public License v2.0
 * License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html
 *
 * @package USWPDS
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
 	die;
}

// Define constants.
define( 'USWPDS_DIR', plugin_dir_path( dirname( __FILE__ ) ) . 'uswpds/' );
define( 'USWPDS_URL', plugin_dir_url( dirname( __FILE__ ) ) . 'uswpds/' );

// Imports USWPDS class.
require plugin_dir_path( __FILE__ ) . 'includes/class-uswpds.php';

/**
 * Begin execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 */
function run_uswpds() {
  $plugin = new USWPDS();

  $plugin->run();
}

run_uswpds();
