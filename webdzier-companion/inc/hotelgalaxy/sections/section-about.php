 <!--===// Start: About US =================================--> 
 <?php  
 if ( ! function_exists( 'webdzier_hotelgalaxy_aboutus' ) ) :
 	function webdzier_hotelgalaxy_aboutus() { 		
 		$section_status         = get_theme_mod('s_h_about_section', true ); 
 		if(!$section_status){ return; }
 		$title                  = get_theme_mod('about_section_title','Welcome to Hotel' ); 
 		$subtitle               = get_theme_mod('about_section_subtitle', 'Excepteur sint occaecat cupidatat non' ); 
 		$button_text            = get_theme_mod('about_button_text', 'ReadMore' ); 
 		$button_url             = get_theme_mod('about_button_url', '#' ); 
 		$video_url              = get_theme_mod('about_video_url', 'https://www.youtube.com/watch?v=a3ICNMQW7Ok' ); 
 		$image_1              = get_theme_mod('about_image', WEBDZIER_COMPANION_PLUGIN_URL.'/inc/hotelgalaxy/images/about/about-01.jpg' ); 
 		$image_2              = get_theme_mod('about_image_2',WEBDZIER_COMPANION_PLUGIN_URL.'/inc/hotelgalaxy/images/about/about-text.png' );
 		$about_contents         = get_theme_mod( 'about_contents', hotelgalaxy_get_about_default() );
 		if ( empty( $about_contents ) ) { return; }
 		$about_contents         = json_decode( $about_contents ); 
 		?> 		
 		<section id="about-template-area" class="about-content-area home-about template-area pt-0">
 			<div class="container hg-about-container ">
 				<div class="row content-center">
 					<div class="col-lg-6 wow fadeInLeft order-two">

 						<div class="about_content">
 							<?php if (!empty($title)) { ?>
 								<h2 class="entry-title" itemprop="headline"><?php echo esc_html($title) ?></h2>
 							<?php } ?>

 							<?php if (!empty($subtitle)) { ?>
 								<p> <?php echo esc_html($subtitle) ?></p>
 							<?php } ?>

 							<?php foreach ( $about_contents as $item ) {?>
 								<div class="about-box-main">
 									<div class="about-box-1">
 										<div class="about-box-2">
 											<div class="about-box-3">
 												<div class="img-wrap">
 													<div class="hover-bg"></div>
 													<img width="43" height="37" src="<?php echo esc_url($item->image_url)?>" class="attachment-full size-full" loading="lazy">
 												</div>       
 											</div>
 											<div class="about-content-box">
 												<?php if( !empty( $item->title ) ){ ?>
 													<h3 class="info-title"><?php echo esc_html( $item->title ) ?></h3>
 												<?php } ?>

 												<?php if( !empty( $item->text ) ){ ?>
 													<p><?php echo esc_html( $item->text ) ?></p>
 												<?php } ?>
 											</div>
 										</div>
 									</div>      
 								</div>
 							<?php } ?>     


 							<?php if (!empty($button_text)) { ?>
 								<a id="read-more" class="btn-theme mt-4 read-more" href="<?php echo esc_html($button_url) ?>" target="_blank"><i class="icon"></i><?php echo esc_html($button_text) ?>&nbsp;&nbsp;<i class="fa fa-long-arrow-right"></i></a>
 							<?php }  ?>

 						</div>
 					</div>

 					<div class="col-lg-6 wow fadeInRight  ">
 						<div class="about-video">

 							<?php if (!empty($image_2)) { ?>
 								<div class="about-rotate-box">
 									<img width="150" height="150" src="<?php echo esc_url($image_2) ?>" alt="Animated Image" data-position="100" class="fa-spin">
 								</div>
 							<?php } ?>  

 							<div class="about-video-img">
 								<?php if (!empty($image_1)) { ?>
 									<img src="<?php echo esc_url($image_1) ?>" class="img-responsive">
 								<?php } ?>  
 							</div>
 						</div>
 					</div>
 				</div>
 			</div>
 		</section>

 		<?php 		
 	}
 endif;
 if ( function_exists( 'webdzier_hotelgalaxy_aboutus' ) ) {
 	$section_priority = apply_filters( 'hotelgalaxy_section_priority', 12, 'webdzier_hotelgalaxy_aboutus' );
 	add_action( 'hotelgalaxy_frontpage_sections', 'webdzier_hotelgalaxy_aboutus', absint( $section_priority ) );
 }
