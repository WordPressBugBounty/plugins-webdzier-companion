<?php
class Webdzier_Companion_Activator {

	public static function activate() {

		$item_details_page = get_option( 'hg_details_page' ); 
		$theme = wp_get_theme(); 		

		if ( 'Hotel Galaxy' == $theme->name || 'Hotel Sydney' == $theme->name || 'Hotel Booking' == $theme->name || 'Hostel' == $theme->name || 'Hotel & Restaurant' == $theme->name || 'Hotel New York' == $theme->name ){
			if( '4.4.11' <= $theme->Version ){	
				require webdzierc_plugin_dir . 'inc/hotelgalaxy/default-pages/upload-media.php';
				require webdzierc_plugin_dir . 'inc/hotelgalaxy/default-pages/home-page.php';				
				require webdzierc_plugin_dir . 'inc/hotelgalaxy/default-pages/room-post.php';				
				require webdzierc_plugin_dir . 'inc/hotelgalaxy/default-widgets/default-widget.php';
			}else{
				require webdzierc_plugin_dir . 'inc/hotel-galaxy/default-pages/upload-media.php';
				require webdzierc_plugin_dir . 'inc/hotel-galaxy/default-pages/home-page.php';				
				require webdzierc_plugin_dir . 'inc/hotel-galaxy/default-widgets/default-widget.php';
			}
		}

		update_option( 'hg_details_page', 'Done' );
	}
}