<?php if( in_array( 'motopress-hotel-booking-lite/motopress-hotel-booking.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { ?>
	  <div id="main-home-booking" class="home-section wow bounceInUp">
        <div class="overlay-1 hg-form">
			<div class="container">
				<div class="booking-content-area clearfix ">
					<?php echo do_shortcode( '[mphb_availability_search]' ); ?>
				</div>
			</div>				
		</div>
	</div>
<?php } ?>
