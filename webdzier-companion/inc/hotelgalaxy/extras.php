<?php 
// above header contact 
function hotelgalaxy_get_header_office_default() {
	return apply_filters(
		'hotelgalaxy_get_header_office_default', json_encode(
			array(
				array(					
					'icon_value'           => 'fa-home',
					'title'                => esc_html__( 'California, United States', 'hotel-galaxy' ),
					'subtitle'             => esc_html__( 'Address', 'hotel-galaxy' ),		
					'id'                   => 'customizer_repeater_office_contact_001',
					
				),
				array(					
					'icon_value'           => 'fa-phone',
					'title'                => esc_html__( '+00-1234567890', 'hotel-galaxy' ),
					'subtitle'             => esc_html__( 'Phone Number', 'hotel-galaxy' ),		
					'id'                   => 'customizer_repeater_office_contact_002',			
				),				
			)
		)
	);
}


// social media 
function hotelgalaxy_get_socialmedia_default() {
	return apply_filters(
		'hotelgalaxy_get_socialmedia_default', json_encode(
			array(
				array(					
					'icon_value'           => 'fa-facebook',
					'link'	  =>  esc_html__( '#', 'hotelgalaxy' ),	
					'id'              => 'customizer_repeater_socialmedia_icon_001',
					
				),
				array(					
					'icon_value'           => 'fa-twitter',
					'link'	  =>  esc_html__( '#', 'hotelgalaxy' ),		
					'id'              => 'customizer_repeater_socialmedia_icon_002',			
				),		
				array(					
					'icon_value'           => 'fa-instagram',
					'link'	  =>  esc_html__( '#', 'hotelgalaxy' ),		
					'id'              => 'customizer_repeater_socialmedia_icon_003',			
				),		
				array(					
					'icon_value'           => 'fa-skype',
					'link'	  =>  esc_html__( '#', 'hotelgalaxy' ),		
					'id'              => 'customizer_repeater_socialmedia_icon_004',			
				),		
				array(					
					'icon_value'           => 'fa-youtube',
					'link'	  =>  esc_html__( '#', 'hotelgalaxy' ),		
					'id'              => 'customizer_repeater_socialmedia_icon_005',			
				),				
			)
		)
	);
}

// slider contents 
function hotelgalaxy_get_slider_default() {
	return apply_filters('hotelgalaxy_get_slider_default', json_encode(
		array(
			array(					
				'number'	  =>  esc_html__( '5', 'hotel-galaxy' ),
				'title'	  =>  esc_html__( 'The Luxurious Hotel', 'hotel-galaxy' ),
				'subtitle'	  =>  esc_html__( 'Incredible Views', 'hotel-galaxy' ),				
				'text'	  =>  esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'hotel-galaxy' ),	
				'text2'	  =>  esc_html__( 'Book Now', 'hotel-galaxy' ),				
				'slide_align'	  =>  esc_html__( 'left', 'hotel-galaxy' ),				
				'link'	  =>  esc_html__( '#', 'hotel-galaxy' ),				
				'image_url'       => WEBDZIER_COMPANION_PLUGIN_URL . 'inc/hotelgalaxy/images/sliders/slide-01.png',				
				'id'              => 'customizer_repeater_slider_content_001',					
			),

			array(					
				'number'	  =>  esc_html__( '5', 'hotel-galaxy' ),
				'title'	  =>  esc_html__( 'The Luxurious Hotel', 'hotel-galaxy' ),
				'subtitle'	  =>  esc_html__( 'Incredible Views', 'hotel-galaxy' ),
				'text'	  =>  esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'hotel-galaxy' ),	
				'text2'	  =>  esc_html__( 'Book Now', 'hotel-galaxy' ),	
				'slide_align'	  =>  esc_html__( 'right', 'hotel-galaxy' ),				
				'link'	  =>  esc_html__( '#', 'hotel-galaxy' ),				
				'image_url'       => WEBDZIER_COMPANION_PLUGIN_URL . 'inc/hotelgalaxy/images/sliders/slide-02.png',				
				'id'              => 'customizer_repeater_slider_content_002',					
			),

			array(					
				'number'	  =>  esc_html__( '5', 'hotel-galaxy' ),
				'title'	  =>  esc_html__( 'The Luxurious Hotel', 'hotel-galaxy' ),
				'subtitle'	  =>  esc_html__( 'Incredible Views', 'hotel-galaxy' ),
				'text'	  =>  esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'hotel-galaxy' ),	
				'text2'	  =>  esc_html__( 'Book Now', 'hotel-galaxy' ),		
				'slide_align'	  =>  esc_html__( 'center', 'hotel-galaxy' ),			
				'link'	  =>  esc_html__( '#', 'hotel-galaxy' ),				
				'image_url'       => WEBDZIER_COMPANION_PLUGIN_URL . 'inc/hotelgalaxy/images/sliders/slide-03.png',
				'video_url'       => 'https://www.youtube.com/watch?v=a3ICNMQW7Ok',
				'id'              => 'customizer_repeater_slider_content_003',					
			),			
		)
	)
);
}

// about contents 
function hotelgalaxy_get_about_default() {
	return apply_filters('hotelgalaxy_get_about_default', json_encode(
		array(
			array(					
				'title'	  =>  esc_html__( 'Find What You Want', 'hotel-galaxy' ),
				'text'	  =>  esc_html__( 'Excepteur sint occaecat cupidatat non', 'hotel-galaxy' ),
				'image_url' => WEBDZIER_COMPANION_PLUGIN_URL . 'inc/hotelgalaxy/images/about/about-1.png',
				'id'              => 'customizer_repeater_about_content_001',					
			),
			array(					
				'title'	  =>  esc_html__( 'Easy Choose Your Place', 'hotel-galaxy' ),
				'text'	  =>  esc_html__( 'Excepteur sint occaecat cupidatat non', 'hotel-galaxy' ),
				'image_url' => WEBDZIER_COMPANION_PLUGIN_URL . 'inc/hotelgalaxy/images/about/about-2.png',
				'id'              => 'customizer_repeater_about_content_001',					
			),
			array(					
				'title'	  =>  esc_html__( 'Live Online Assistance', 'hotel-galaxy' ),
				'text'	  =>  esc_html__( 'Excepteur sint occaecat cupidatat non', 'hotel-galaxy' ),
				'image_url' => WEBDZIER_COMPANION_PLUGIN_URL . 'inc/hotelgalaxy/images/about/about-3.png',
				'id'              => 'customizer_repeater_about_content_001',					
			),
		)
	)
);
}


// service contents 
function hotelgalaxy_get_service_contents() {
	return apply_filters('hotelgalaxy_get_service_contents', json_encode(
		array(
			array(					
				'icon_value'           => 'fa-car',
				'title'	  =>  esc_html__( 'Free Parking', 'hotel-galaxy' ),
				'text'	  =>  esc_html__( 'We are a leading web design agency & we creates user-friendly web experiences.', 'hotel-galaxy' ),	
				'image_url'       => WEBDZIER_COMPANION_PLUGIN_URL . 'inc/hotelgalaxy/images/service/service-1.jpg',
				'open_new_tab'    => false,
				'link'	  =>  esc_html__( '#', 'hotel-galaxy' ),
				'id'              => 'customizer_repeater_service_content_001',					
			),
			array(					
				'icon_value'           => 'fa-wifi',
				'title'	  =>  esc_html__( 'Free Wifi', 'hotel-galaxy' ),
				'text'	  =>  esc_html__( 'We are a leading web design agency & we creates user-friendly web experiences.', 'hotel-galaxy' ),	
				'image_url'       => WEBDZIER_COMPANION_PLUGIN_URL . 'inc/hotelgalaxy/images/service/service-1.jpg',
				'open_new_tab'    => false,
				'link'	  =>  esc_html__( '#', 'hotel-galaxy' ),
				'id'              => 'customizer_repeater_service_content_002',			
			),		
			array(					
				'icon_value'           => 'fa-user-secret',
				'title'	  =>  esc_html__( 'Room Service', 'hotel-galaxy' ),
				'text'	  =>  esc_html__( 'We are a leading web design agency & we creates user-friendly web experiences.', 'hotel-galaxy' ),
				'image_url'       => WEBDZIER_COMPANION_PLUGIN_URL . 'inc/hotelgalaxy/images/service/service-1.jpg',
				'open_new_tab'    => false,
				'link'	  =>  esc_html__( '#', 'hotel-galaxy' ),
				'id'              => 'customizer_repeater_service_content_003',			
			),

			array(					
				'icon_value'           => 'fa-ship',
				'title'	  =>  esc_html__( 'Swimming Pool', 'hotel-galaxy' ),
				'text'	  =>  esc_html__( 'We are a leading web design agency & we creates user-friendly web experiences.', 'hotel-galaxy' ),	
				'image_url'       => WEBDZIER_COMPANION_PLUGIN_URL . 'inc/hotelgalaxy/images/service/service-4.jpg',
				'open_new_tab'    => false,
				'link'	  =>  esc_html__( '#', 'hotel-galaxy' ),
				'id'              => 'customizer_repeater_service_content_004',			
			),
		)
	)
);
}

// footer botttom
function hotelgalaxy_get_footerbottom_default() {
	return apply_filters('hotelgalaxy_get_footerbottom_default', json_encode(
		array(
			array(			
				'image_url'	=>  WEBDZIER_COMPANION_PLUGIN_URL.'inc/hotelgalaxy/images/footer/footer-item-1.jpg',
				'icon_value'	=>  esc_html__( 'fa-headphones', 'hotel-galaxy' ),
				'title'	  	=>  esc_html__( 'Have a Doubt We Can Help', 'hotel-galaxy' ),
				'text2'	  =>  esc_html__( 'BOOK FOR CONSULTAION', 'hotel-galaxy' ),	
				'link'	  =>  esc_html__( '#', 'hotel-galaxy' ),
				'id'        => 'customizer_repeater_footerbottom_content_001',					
			),

			array(
				'image_url'	=>  WEBDZIER_COMPANION_PLUGIN_URL.'inc/hotelgalaxy/images/footer/footer-item-1.jpg',	
				'icon_value'	=>  esc_html__( 'fa-database', 'hotel-galaxy' ),
				'title'	  	=>  esc_html__( 'Have a Doubt We Can Help', 'hotel-galaxy' ),
				'text2'	  =>  esc_html__( 'CHECK ELIGIBILITY', 'hotel-galaxy' ),	
				'link'	  =>  esc_html__( '#', 'hotel-galaxy' ),
				'id'        => 'customizer_repeater_footerbottom_content_002',					
			),

			
		)
	)
);
}

?>