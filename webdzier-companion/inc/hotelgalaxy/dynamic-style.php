<?php
if ( ! function_exists( 'webdzier_com_hotelgalaxy_dynamic_style' ) ) {
  function webdzier_com_hotelgalaxy_dynamic_style(){   

   $output_css = '';         

     /**
      * Logo Width 
     */

     $logo_width                 = get_theme_mod( 'logo_width', '160' );

     if( $logo_width !== '' ) {
      $output_css      .= ".logo img{  width: ".esc_attr($logo_width)."px;  }\n"; 
    }  

         /**
         *  Breadcrumb Style
         */

         $breadcrumb_height          = get_theme_mod( 'breadcrumb_height', '400' );      
         if($breadcrumb_height !== '') {
          $output_css .= ".breadcrumb-section{ height: ".esc_attr($breadcrumb_height)."px;}\n";  
          $output_css .= ".breadcrumb-section .overlay{ min-height:".esc_attr($breadcrumb_height)."px;}\n";
        }       

        wp_add_inline_style( 'hotelgalaxy-style', $output_css );
      }

      add_action('wp_enqueue_scripts', 'webdzier_com_hotelgalaxy_dynamic_style' );
    }
