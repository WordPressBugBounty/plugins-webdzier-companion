 <!--===// Start: Room =================================--> 
 <?php  
 if ( ! function_exists( 'webdzier_hotelgalaxy_room' ) ) :
 	function webdzier_hotelgalaxy_room() { 		
        $s_h_room_section               = get_theme_mod( 's_h_room_section', true );
        if(! $s_h_room_section){ return; }

        $room_title                     = get_theme_mod( 'room_section_title', 'Our Favorite <span>Room</span>' );
        $room_subtitle                  = get_theme_mod( 'room_section_subtitle', 'Excepteur sint occaecat cupidatat' );
        $room_post_per_page             = get_theme_mod( 'room_post_per_page', 6 );  
        $button_text                    = get_theme_mod( 'room_button_text', 'View All' );      
        $button_url                     = get_theme_mod( 'room_button_url', '#' ); 
        ?> 	
        <section id="main-home-room" class="room-section home-section  ">
            <div class="overlay">
                <div class="container">
                    <div class="entry-header section-header text-start">
                        <?php if(!empty($room_title)){ ?>
                            <h2 class="header site-title-header wow" data-wow-duration=".1s" data-wow-delay=".4s"><?php echo wp_kses_post($room_title) ?></h2>
                        <?php } ?>

                        <?php if(!empty($room_subtitle)){ ?>
                            <p><?php  echo wp_kses_post( $room_subtitle ) ?></p>
                        <?php } ?>
                        <div class="view-all-btn">
                            <?php if(!empty($button_text)){ ?>
                                <a href="<?php echo esc_url($button_url ); ?>" class="btn-view"><?php echo esc_html($button_text); ?>&nbsp;&nbsp; <i class="fa fa-long-arrow-right"></i> </a>
                            <?php } ?>
                        </div>
                    </div>
                    <div id="room-owl" class="owl-carousel owl-theme room-carousel ">
                        <?php 
                        $arg = array('post_type' => 'hg_room', 'posts_per_page' => $room_post_per_page );
                        $room = new WP_Query($arg);
                        if ( $room->have_posts() ) {
                            $index = 0;
                            while ($room->have_posts()) : $room->the_post();
                                $meta_key = 'hg_room_settings_' . get_the_ID();
                                $data = get_post_meta(get_the_ID(), $meta_key, true);
                                $term_items = wp_get_post_terms( get_the_ID(), 'room_taxonomy' );
                                $tex_slug = [];
                                $tex_name = [];
                                foreach($term_items as $term ){
                                    if($term->slug != 'all-images' ){
                                        $tex_slug[] = $term->slug;
                                        $tex_name[] = $term->name;
                                    }
                                }
                                $selector = join(' ', $tex_slug);
                                $categories = join(',', $tex_name);  
                                $adult = (!empty($data['adults'])) ? esc_html( $data['adults'] ) : 0;        
                                $children = (!empty($data['children'])) ? esc_html( $data['children'] ) : 0;        
                                $size = (!empty($data['size'])) ? esc_html( $data['size'] ) : 0;        
                                $currency = (!empty($data['currency'])) ? esc_html( $data['currency'] ) : '';        
                                $bed = (!empty($data['bed'])) ? esc_html( $data['bed'] ) : '';                   
                                ?>
                                <div class="wow fadeInUp item grid-item all-rooms family">
                                    <div class="hg-room-style-1 hg-main-hoverlay">
                                        <div class="hg-caption clearfix">
                                            <?php if (has_post_thumbnail()){ ?>
                                                <div class="hg-room-images">
                                                    <?php the_post_thumbnail(get_the_ID(),'full',array('itemprop' => 'image', 'class' => 'img-responsive')); ?>
                                                    <?php if(!empty($data['ribbon'])){ ?>
                                                        <span class="property-condo"><?php echo esc_html($data['ribbon']); ?></span>
                                                    <?php } ?>
                                                    <div class="project-hoverlay"></div>
                                                    <a href="" class="room-book-now" target="blank">Book Now</a>
                                                </div>
                                            <?php } ?>
                                            <div class="hg-room-grid-top">
                                                <div class="entry-meta">
                                                    <?php if(!empty($categories)){ ?>
                                                        <span class="room-state">                               
                                                            <?php echo esc_html($categories); ?>
                                                        </span>
                                                    <?php } ?>
                                                    <p>
                                                        <?php if(!empty($data['rent'])){ ?>
                                                            <strong class="room-rent"><?php echo esc_html( $currency ); ?><?php echo esc_html($data['rent']); ?>&nbsp;</strong>
                                                        <?php } ?>
                                                        <?php if(!empty($data['day'])){ ?>
                                                            <span class="hg-period">&nbsp;<?php echo esc_html($data['day']); ?></span>
                                                        <?php } ?>
                                                    </p>
                                                </div>  
                                                <?php the_title(sprintf('<h4 class="entry-title" itemprop="headline"><a href="%1$s" target="%2$s" rel="bookmark">',
                                                    esc_url(get_permalink()), (!empty($data['target']) ? '_blank' : '_self')),'</a></h4>');
                                                    ?>
                                                    <ul class="hg-room-type-attributes nav">
                                                        <li class="nav-item hg-room-type-room-capacity" title="Bed"><span class="hg-attribute-value"><?php echo esc_html($bed); ?></span></li>
                                                        <li class="nav-item hg-room-type-adults-capacity" title="Adult"><span class="hg-attribute-value"><?php echo esc_html($adult); ?></span></li>
                                                        <li class="nav-item hg-room-type-children-capacity" title="Children"><span class="hg-attribute-value"><?php echo esc_html($children); ?></span></li>
                                                        <li class=" nav-item hg-room-type-size" title="Size"><span class="hg-attribute-value"><?php echo esc_html($size); ?></span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php   
                                endwhile;
                            }
                            ?>  
                        </div>
                    </div> 
                </div>
            </div>
        </section>        
        <?php 		
    }
endif;
if ( function_exists( 'webdzier_hotelgalaxy_room' ) ) {
  $section_priority = apply_filters( 'hotelgalaxy_section_priority', 14, 'webdzier_hotelgalaxy_room' );
  add_action( 'hotelgalaxy_frontpage_sections', 'webdzier_hotelgalaxy_room', absint( $section_priority ) );
}
