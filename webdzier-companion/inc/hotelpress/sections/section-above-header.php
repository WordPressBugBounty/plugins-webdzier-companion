 <!--===// Start: Above Header =================================--> 
 <?php  
 if ( ! function_exists( 'webdzier_hotelgalaxy_abover_header' ) ) :
 	function webdzier_hotelgalaxy_abover_header() {  		
 		$s_h_header_office_details 		= get_theme_mod('s_h_header_office_details',true );
 		$header_contents               	= get_theme_mod( 'header_office_contents', hotelgalaxy_get_header_office_default() ); 	
 		?>
        <?php if ( !empty( $header_contents ) ) { ?>	 		
         <div class="site-info-two">
            <?php if( $s_h_header_office_details ) { 
               if( ! empty($header_contents ) ){ ?>
                <ul class="info-list-two">
                    <?php $header_contents = json_decode( $header_contents ); ?>
                    <?php foreach ( $header_contents as $item ) { ?>
                        <li>
                            <?php if(! empty($item->icon_value)){ ?>
                                <div class="icon-two">
                                    <i class="fa <?php echo esc_attr($item->icon_value); ?>"></i>
                                </div>
                            <?php } ?>
                            <div class="info-two">
                                   <?php if(! empty( $item->subtitle ) ){ ?>
                                    <span><?php echo esc_attr($item->subtitle); ?></span>
                                <?php } ?>
                                <?php if(! empty( $item->title ) ) { ?>
                                    <h5>
                                        <?php echo esc_attr( $item->title ); ?>
                                    </h5>
                                <?php } ?>
                            </div>
                        </li>
                    <?php } ?>
                </ul> 
            <?php } } ?>
        </div> 
    <?php } }
endif;

if ( function_exists( 'webdzier_hotelgalaxy_abover_header' ) ) {
  $section_priority = apply_filters( 'hotelgalaxy_section_priority', 12, 'webdzier_hotelgalaxy_abover_header' );
  add_action( 'hotelgalaxy_Above_Header', 'webdzier_hotelgalaxy_abover_header', absint( $section_priority ) );
}