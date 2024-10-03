<?php 
//Admin Enqueue for Admin
function hotelgalaxy_webdzier_comp_admin_enqueue_scripts(){
    wp_enqueue_style('hg_premium_metabox', WEBDZIER_COMPANION_PLUGIN_URL.'/inc/hotelgalaxy/cpt/assets/css/hotelgalaxy-metabox-style.css');    
}
add_action( 'admin_enqueue_scripts', 'hotelgalaxy_webdzier_comp_admin_enqueue_scripts' );


require WEBDZIER_COMPANION_PLUGIN_DIR . 'inc/hotelgalaxy/extras.php';
require WEBDZIER_COMPANION_PLUGIN_DIR . 'inc/hotelgalaxy/dynamic-style.php';
require WEBDZIER_COMPANION_PLUGIN_DIR . 'inc/hotelgalaxy/features/hotelgalaxy-above-header.php';
require WEBDZIER_COMPANION_PLUGIN_DIR . 'inc/hotelgalaxy/features/hotelgalaxy-general.php';
require WEBDZIER_COMPANION_PLUGIN_DIR . 'inc/hotelgalaxy/features/hotelgalaxy-slider.php';
require WEBDZIER_COMPANION_PLUGIN_DIR . 'inc/hotelgalaxy/features/hotelgalaxy-aboutus.php';
require WEBDZIER_COMPANION_PLUGIN_DIR . 'inc/hotelgalaxy/features/hotelgalaxy-service.php';
require WEBDZIER_COMPANION_PLUGIN_DIR . 'inc/hotelgalaxy/features/hotelgalaxy-room.php';
require WEBDZIER_COMPANION_PLUGIN_DIR . 'inc/hotelgalaxy/features/hotelgalaxy-footer.php';
require WEBDZIER_COMPANION_PLUGIN_DIR . 'inc/hotelgalaxy/features/hotelgalaxy-typography.php';


if ( ! function_exists( 'webdzier_companion_hotelgalaxy_above_header_sections' ) ) :
    function webdzier_companion_hotelgalaxy_above_header_sections() {  
     require WEBDZIER_COMPANION_PLUGIN_DIR . 'inc/hotelgalaxy/sections/section-above-header.php';     
 }
 add_action( 'hotelgalaxy_Above_Header', 'webdzier_companion_hotelgalaxy_above_header_sections' );
endif;

if ( ! function_exists( 'webdzier_companion_hotelgalaxy_frontpage_sections' ) ) :
    function webdzier_companion_hotelgalaxy_frontpage_sections() {  
     require WEBDZIER_COMPANION_PLUGIN_DIR . 'inc/hotelgalaxy/sections/section-slider.php';
     require WEBDZIER_COMPANION_PLUGIN_DIR . 'inc/hotelgalaxy/sections/section-about.php';
     require WEBDZIER_COMPANION_PLUGIN_DIR . 'inc/hotelgalaxy/sections/section-service.php';
     require WEBDZIER_COMPANION_PLUGIN_DIR . 'inc/hotelgalaxy/sections/section-room.php';   
 }
 add_action( 'hotelgalaxy_frontpage_sections', 'webdzier_companion_hotelgalaxy_frontpage_sections' );
endif;

if ( ! function_exists( 'webdzier_companion_hotelgalaxy_footer_sections' ) ) :
    function webdzier_companion_hotelgalaxy_footer_sections() {  
    require WEBDZIER_COMPANION_PLUGIN_DIR . 'inc/hotelgalaxy/sections/section-footerbootom.php';
 }
 add_action( 'hotelgalaxy_footer_sections', 'webdzier_companion_hotelgalaxy_footer_sections' );
endif;

?>