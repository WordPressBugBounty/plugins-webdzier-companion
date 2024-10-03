 <!--===// Start: Above Header =================================--> 
 <?php  
 if ( ! function_exists( 'webdzier_hotelgalaxy_abover_header' ) ) :
 	function webdzier_hotelgalaxy_abover_header() {  		
 		$s_h_social_media 				= get_theme_mod('s_h_social_media', true );
 		$s_h_header_office_details 		= get_theme_mod('s_h_header_office_details',true );
 		$header_contents               	= get_theme_mod( 'header_office_contents', hotelgalaxy_get_header_office_default() ); 		
 		?> 	 		
 		<div class="info-bar wow fadeInUp collapse" id="header_infobar">
 			<div class="container d-flex content-center">
 				<?php if($s_h_header_office_details) {?>
 					<?php if ( !empty( $header_contents ) ) { ?>
 						<ul class="nav header_contact">	
 							<?php $header_contents = json_decode( $header_contents ); ?>
 							<?php foreach ( $header_contents as $item ) { ?>
 								<li class="nav-item">
 									<?php if(!empty($item->icon_value)){ ?>
 										<i class="fa <?php echo esc_attr($item->icon_value) ?>"></i>
 									<?php } ?> 
 									<?php if(!empty($item->title)){ ?>
 										<span> <?php echo esc_attr($item->title) ?> </span>
 									<?php } ?> 
 								</li>
 							<?php } ?>
 						</ul>
 					<?php } ?>					
 				<?php } ?>
 				<ul class="nav social_media">
 					<?php if ($s_h_social_media) { ?>
 						<?php
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
 			</div>
 		</div>
 		<?php 		
 	}
 endif;
 if ( function_exists( 'webdzier_hotelgalaxy_abover_header' ) ) {
 	$section_priority = apply_filters( 'hotelgalaxy_section_priority', 12, 'webdzier_hotelgalaxy_abover_header' );
 	add_action( 'hotelgalaxy_Above_Header', 'webdzier_hotelgalaxy_abover_header', absint( $section_priority ) );
 }
