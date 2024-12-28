<?php  
// Header Social Media Icons
if ( ! function_exists( 'hotelpress_header_socialmedia' ) ) {
    function hotelpress_header_socialmedia() { ?>
     <ul class="nav social_media">
        <?php $s_h_social_media  = get_theme_mod('s_h_social_media', true );
        if ($s_h_social_media) { 
            $socialmedia_contents = get_theme_mod('socialmedia_contents', hotelgalaxy_get_socialmedia_default());
            if (!empty($socialmedia_contents)) {
                $socialmedia_contents = json_decode($socialmedia_contents);
                foreach ($socialmedia_contents as $socialmedia_item) {
                    $link = !empty($socialmedia_item->link) ? apply_filters('hotelgalaxy_translate_single_string', $socialmedia_item->link, 'Contact section') : '';
                    $icon = !empty($socialmedia_item->icon_value) ? apply_filters('hotelgalaxy_translate_single_string', $socialmedia_item->icon_value, 'Contact section') : '';
                    ?>
                    <?php if (!empty($icon)) { ?>
                        <li class="nav-item"> <a href="<?php echo esc_attr($link) ?>" target="_blank" class="social-icon nav-link " data-bs-toggle="tooltip"><i class="fa <?php echo esc_attr($icon) ?>"></i></a> </li>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </ul>
    <?php
}
}
add_action('hotelpress_header_socialmedia', 'hotelpress_header_socialmedia');

// Header Office Details
if ( ! function_exists( 'hotelpress_header_office_details' ) ) {
    function hotelpress_header_office_details() { 
        $s_h_header_office_details      = get_theme_mod('s_h_header_office_details',true );
        $header_contents                = get_theme_mod( 'header_office_contents', hotelgalaxy_get_header_office_default() );   
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
<?php } } }
add_action('hotelpress_header_office_details', 'hotelpress_header_office_details');

// Header Top Info
if ( ! function_exists( 'hotelpress_header_info_typing' ) ) {
    function hotelpress_header_info_typing() { 
        $s_h_header_top_info = get_theme_mod('s_h_header_top_info',true ); 
        $header_top_info  = get_theme_mod( 'header_top_info', 'Hotalpress Best Amenities' );
        $header_top_typing_type = get_theme_mod( 'header_top_typing_type', 'Free Parking.,Free Wifi.,Room Services.,Swimming Pool.' );
        if ($s_h_header_top_info) { 
            if(!empty($header_top_info)){ ?>
                <div class="headertop-Info"><?php echo wp_kses_post( $header_top_info ) ?>
                <?php if(!empty($header_top_typing_type)){ ?>
                <span class="typer font-family-CircularStdBold" id="some-id" data-words="<?php echo wp_kses_post( $header_top_typing_type ) ?>" data-delay="100" data-colors="#f9ff03">
                </span><span class="cursor" data-cursorDisplay="|" data-owner="some-id">
                </span>
            <?php } ?>
            </div>
        <?php } } } }
        add_action('hotelpress_header_info_typing', 'hotelpress_header_info_typing');