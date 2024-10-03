 <!--===// Start: Footer Bottom =================================--> 
 <?php  
 if ( ! function_exists( 'webdzier_hotelgalaxy_footerbottom' ) ) :
 	function webdzier_hotelgalaxy_footerbottom() { 
        $s_h_footer_bottom          = get_theme_mod( 's_h_footer_bottom', true );
        $footerbottom_contents      = get_theme_mod( 'footerbottom_contents', hotelgalaxy_get_footerbottom_default() );
        if(! $s_h_footer_bottom){ return; } ?> 
        <div class="footer-top-area footer-bootom">
            <div class="container">
                <div class="row align-items-center">
                    <?php 
                    if ( ! empty( $footerbottom_contents ) ) { 
                        $footerbottom_contents = json_decode( $footerbottom_contents );
                        foreach ( $footerbottom_contents as $item ) { ?>
                            <div class="col-lg-6 col-md-6 col-12 wow zoomIn">
                                <div class="widget widget-contact">
                                    <div class="hg-bg-image" style="background-image: url(<?php echo esc_url($item->image_url); ?>);">
                                    </div>
                                    <div class="contact-icon">
                                     <i aria-hidden="true" class="fa <?php echo esc_html($item->icon_value); ?>"></i>
                                 </div>
                                 <div class="contact-info">
                                    <h4 class="title"> <?php echo esc_html($item->title); ?></h4>
                                    <a class="hg-footer-btn" href="<?php echo esc_url($item->link); ?>"> 
                                        <span><?php echo esc_html($item->text2); ?> 
                                        <i class="fa fa-arrow-right"></i>
                                    </span> 
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } } ?>  
            </div>
        </div>
    </div>    
    <?php 		
}
endif;
if ( function_exists( 'webdzier_hotelgalaxy_footerbottom' ) ) {
  $section_priority = apply_filters( 'hotelgalaxy_section_priority', 11, 'webdzier_hotelgalaxy_footerbottom' );
  add_action( 'hotelgalaxy_footer_sections', 'webdzier_hotelgalaxy_footerbottom', absint( $section_priority ) );
}