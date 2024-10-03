 <!--===// Start: Slider =================================--> 
 <?php  
 if ( ! function_exists( 'webdzier_hotelgalaxy_slider' ) ) :
   function webdzier_hotelgalaxy_slider() {     
      $s_h_slider                     = get_theme_mod( 's_h_slider_section', true );        
      $s_h_room_search                = get_theme_mod( 's_h_room_booking_search_area', true );
      $s_h_call_booking               = get_theme_mod( 's_h_call_booking_section', true );
      $phone                    = get_theme_mod( 'phone', '+1 0123456789');
      $phone_icon               = get_theme_mod( 'phone_icon', 'fa-phone' );
      $phone_text               = get_theme_mod( 'phone_text', 'Reservation');
      $slider                   = get_theme_mod( 'slider_contents', hotelgalaxy_get_slider_default() );
      if(! $s_h_slider){ return; }
      if ( empty( $slider) ) { return; }
      $slider             = json_decode( $slider );
      ?>
      <section class="slider-section">
         <div id="owlCarousel" class="hg-home-slider owl-carousel owl-theme animate__animated wow fadeInUp">
            <?php foreach ( $slider as $item ) { ?>
               <div class="item">
                  <?php if(!empty($item->image_url)){ ?>
                     <img src="<?php echo esc_url($item->image_url) ?>">
                  <?php } ?>
                  <div class="main-slider">
                     <div class="main-table">
                        <div class="main-table-cell">
                           <div class="container">
                             <?php if(!empty($item->slide_align)){ ?>
                              <div class="main-content text-<?php echo esc_attr($item->slide_align); ?>">                                
                                 <?php if ( ! empty( $item->number ) ) { $rating = (int)$item->number; ?>
                                    <h5 class="slider-title"> 
                                       <span>
                                          <?php for($i=1; $i<=$rating; $i++){ ?>
                                             <i class="fa fa-star"></i>                         
                                          <?php } ?>
                                       </span>
                                    </h5>
                                 <?php } ?>
                                 <?php if( !empty($item->title) || !empty($item->subtitle) ){ ?>
                                    <h2 class="slider-subtitle  plop-it" data-splitting><?php echo esc_html($item->title); ?> <span class="primary-text"><?php echo esc_html($item->subtitle); ?></span></h2>                
                                 <?php } ?>

                                 <?php if(!empty($item->text)){ ?>
                                    <p><?php echo esc_html($item->text) ?></p>
                                 <?php } ?>


                                 <?php if(!empty($item->text2)){ ?>
                                    <a id="read-more" class="btn-theme" href="<?php echo esc_url($item->link); ?>" target="_self"><?php echo esc_html($item->text2) ?>&nbsp;&nbsp; <i class="fa fa-long-arrow-right"></i> </a>
                                 <?php } ?>
                              </div>
                           <?php } ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         <?php } ?>     
      </div>

      <!-- mobile -->
      <?php if($s_h_call_booking){ ?>
        <?php if(!empty($phone)){ ?>
           <div class="phone-call">
              <a href="tel:<?php echo esc_html($phone); ?>">
                 <div class="hg-icon d-flex justify-content-center align-items-center">
                    <?php if(!empty($phone_icon)){ ?>
                       <i class="fa <?php echo esc_html($phone_icon); ?>"></i>
                    <?php } ?>
                 </div>
                 <div class="number"><span><?php echo esc_html($phone); ?></span> <br><?php echo esc_html($phone_text); ?></div>
              </a>
           </div>
        <?php } ?>
     <?php } ?>


  </section>

  <?php
  if($s_h_room_search){ 
     require WEBDZIER_COMPANION_PLUGIN_DIR . 'inc/hotelgalaxy/sections/section-roomsearch.php';
  }else{ ?> <div style="margin-bottom:5rem;"></div><?php }  
}
endif;
if ( function_exists( 'webdzier_hotelgalaxy_slider' ) ) {
 $section_priority = apply_filters( 'hotelgalaxy_section_priority', 11, 'webdzier_hotelgalaxy_slider' );
 add_action( 'hotelgalaxy_frontpage_sections', 'webdzier_hotelgalaxy_slider', absint( $section_priority ) );
}
