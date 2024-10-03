 <!--===// Start: Service =================================--> 
 <?php  
 if ( ! function_exists( 'webdzier_hotelgalaxy_services' ) ) :
    function webdzier_hotelgalaxy_services() {      
        $s_h_service_section         = get_theme_mod( 's_h_service_section', true );
        if(! $s_h_service_section){ return; }

        $service_title                  = get_theme_mod( 'service_section_title', 'Our Best <span>Amenities</span>' );
        $service_subtitle               = get_theme_mod( 'service_section_subtitle','Excepteur sint occaecat cupidatat' );
        $service_post_per_page          = get_theme_mod( 'service_post_per_page','4' );

        $service_contents               = get_theme_mod( 'service_content', hotelgalaxy_get_service_contents() );
        if ( empty( $service_contents ) ) { return; }
        $service_contents = json_decode( $service_contents );       
        ?>      

        <section id="main-home-service " class="service-area position-relative home-section wow fadeInUp bg-gray" >
            <div class="overlay">
                <div class="container">
                    <div class="entry-header section-header">
                        <?php if(!empty($service_title)){ ?>
                            <h2 class="header site-title-header wow" data-wow-duration=".1s" data-wow-delay=".4s"><?php echo wp_kses_post($service_title) ?></h2>
                        <?php } ?>
                        <?php if(!empty($service_subtitle)){ ?>
                            <p><?php  echo wp_kses_post( $service_subtitle ) ?></p>
                        <?php } ?>
                    </div>          
                    <div class="service-content-area row clearfix">
                        <?php $index = 0; foreach ( $service_contents as $item ) { $index++;?>
                            <?php if($service_post_per_page >= $index){ 
                                $target = ( isset($item->open_new_tab) && ($item->open_new_tab == true) ) ? "_blank" : "_self"; 
                                $link = ( !empty($item->link) ) ? esc_url($item->link) : "#";
                                ?>
                                <div class="col-lg-3 col-md-6 col-12">
                                    <aside class="service-widget-item">
                                        <div class="service-icon_box_in service-hover_layer1" style="">
                                            <div class="bg-overlay"></div>
                                            <div class="service-content">
                                                <?php if( !empty($item->icon_value) ){ ?>
                                                    <div class="service-icon">
                                                        <i class="fa <?php echo esc_attr($item->icon_value);?> s-icon"></i>
                                                    </div>
                                                <?php } ?> 
                                                <?php if( !empty( $item->title ) ){ ?>
                                                    <h2 class=" service-title"><a target="<?php echo esc_attr($target); ?>" href="<?php echo esc_url($item->link);?>"><?php echo esc_html( $item->title ) ?></a></h2>
                                                <?php } ?>
                                                <?php if( !empty( $item->text ) ){ ?>
                                                    <p class="service-subtitle"><?php echo esc_html($item->text); ?></p> 
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </aside>
                                </div>

                            <?php } ?>
                        <?php } ?>
                    </div>

                </div>
            </div>
        </section>
        <?php       
    }
endif;
if ( function_exists( 'webdzier_hotelgalaxy_services' ) ) {
  $section_priority = apply_filters( 'hotelgalaxy_section_priority', 13, 'webdzier_hotelgalaxy_services' );
  add_action( 'hotelgalaxy_frontpage_sections', 'webdzier_hotelgalaxy_services', absint( $section_priority ) );
}
