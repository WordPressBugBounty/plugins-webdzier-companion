<?php
/*
Plugin Name: Webdzier Companion
Description: Enhances webdzier themes with additional functionality.
Version: 3.2
Author: webdzier
Author URI: https://webdzier.com
Text Domain: webdzier-companion
*/

define( 'webdzierc_plugin_url', plugin_dir_url( __FILE__ ) );
define( 'webdzierc_plugin_dir', plugin_dir_path( __FILE__ ) );
define( 'WEBDZIER_COMPANION_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'WEBDZIER_COMPANION_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

if( !function_exists('webdzier_companion') ){
	function webdzier_companion(){

		if ( class_exists( 'WP_Customize_Control' ) ) {
			require_once('inc/custom-controls/range-validator/range-control.php');						
		}
		require_once('inc/custom-controls/customizer-repeater/functions.php');	

		$current_theme = wp_get_theme(); // getting current theme data		
		
		if(file_exists( webdzierc_plugin_dir . "include/$current_theme/init.php")){
			require("inc/$current_theme/init.php");
		}
		if( $current_theme == 'Hotel Galaxy' ){

			if (version_compare( $current_theme->Version, "4.4.11", ">=")) {					
				require_once("inc/hotelgalaxy/hotelgalaxy.php");
			}else{					
				require_once("inc/hotel-galaxy/hotel-galaxy.php");
			}					
		}
		if( 'HotelPress' == $current_theme){
			require_once('inc/hotelpress/hotelpress.php');
		} 			
	}
}
add_action( 'init', 'webdzier_companion' );

// cpt
add_action( 'plugins_loaded', 'webdzier_companion_loaded' );
function webdzier_companion_loaded() {	
	$theme = wp_get_theme();
	if($theme == 'Hotel Galaxy'){
		if( '4.4.11' <= $theme->Version ){
			require_once WEBDZIER_COMPANION_PLUGIN_DIR . 'inc/hotelgalaxy/cpt/room-cpt.php';
		}
	}elseif($theme == 'HotelPress'){
		require_once WEBDZIER_COMPANION_PLUGIN_DIR . 'inc/hotelgalaxy/cpt/room-cpt.php';
	}	
}

// plugin activation time
function webdzier_companion_activated() {
	require_once plugin_dir_path( __FILE__ ) . 'inc/webdzier-comapnion-activator.php';
	Webdzier_Companion_Activator::activate();	
}
register_activation_hook( __FILE__, 'webdzier_companion_activated' );