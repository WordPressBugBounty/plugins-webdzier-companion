<?php 
if(! function_exists('hotelgalaxy_slider_customizer')){

	add_action( 'customize_register', 'hotelgalaxy_slider_customizer', 999);

	function hotelgalaxy_slider_customizer( $wp_customize ) {					

		if ( ! $wp_customize->get_section( 'slider_section' ) ) {
			$wp_customize->add_section('slider_section',array(
				'title' => __( 'Slider Section','hotel-galaxy'),
				'panel'=>'frontpage_layout',
				'capability'=>'edit_theme_options',
				'priority' => 1,

			));
		}		


		//slider  
		$wp_customize->add_setting(
			'slider_head'
			,array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'hotelgalaxy_sanitize_text',
				'priority'  => 1,
			)
		);

		$wp_customize->add_control(
			'slider_head',
			array(
				'type' => 'hidden',
				'label' => __('Settings','hotel-galaxy'),
				'section' => 'slider_section',
			)
		); 
		

		//section show or hide
		$wp_customize->add_setting(	's_h_slider_section',array(			
			'default'=> true,
			'sanitize_callback'=>'hotelgalaxy_sanitize_checkbox',	
			'capability'        => 'edit_theme_options',
			'priority'=> 1,
		));

		$wp_customize->add_control( 's_h_slider_section', array(
			'label'        => __( 'Show/Hide Section', 'hotel-galaxy'),
			'type'=>'checkbox',			
			'section'    => 'slider_section',			
		) );

		

		//reservation area  
		$wp_customize->add_setting(
			'slider_call_booking_head'
			,array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'hotelgalaxy_sanitize_text',
				'priority'  => 1,
			)
		);

		$wp_customize->add_control(
			'slider_call_booking_head',
			array(
				'type' => 'hidden',
				'label' => __('Call For Booking','hotel-galaxy'),
				'section' => 'slider_section',
			)
		); 

		$wp_customize->add_setting(	's_h_call_booking_section',array(			
			'default'=> true,
			'sanitize_callback'=>'hotelgalaxy_sanitize_checkbox',	
			'capability'        => 'edit_theme_options',
			'priority'=> 1,
		));

		$wp_customize->add_control( 's_h_call_booking_section', array(
			'label'        => __( 'Show/Hide Section', 'hotel-galaxy'),
			'type'=>'checkbox',			
			'section'    => 'slider_section',			
		) );

		//phone number
		$wp_customize->add_setting('phone',array(			
			'default'=> __('+1 0123456789','hotel-galaxy'),	
			'sanitize_callback'=>'hotelgalaxy_sanitize_html',
			'capability'        => 'edit_theme_options',
			'priority' => 1,
		));
		$wp_customize->add_control( 'phone', array(
			'label'        => __( 'Phone Number', 'hotel-galaxy'),
			'type'=>'text',
			'section'    => 'slider_section',		
		));

		//phone text
		$wp_customize->add_setting('phone_text',array(			
			'default'=> __('Reservation','hotel-galaxy'),	
			'sanitize_callback'=>'hotelgalaxy_sanitize_html',
			'capability'        => 'edit_theme_options',
			'priority' => 1,
		));
		$wp_customize->add_control( 'phone_text', array(
			'label'        => __( 'Phone Text', 'hotel-galaxy'),
			'type'=>'text',
			'section'    => 'slider_section',		
		));


		//phone icon
		
		$wp_customize->add_setting('phone_icon',array(
			'default' => __('fa-phone', 'hotel-galaxy'),
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
			'priority'  => 1,
		));	

		$wp_customize->add_control(new Hotelgalaxy_Icon_Picker_Control($wp_customize,'phone_icon',
			array(
				'label'   		=> __('Phone Icon','hotel-galaxy'),
				'section' 		=> 'slider_section',
				'iconset' => 'fa',
			)
		));	

		$wp_customize->selective_refresh->add_partial(
			'phone_icon', array(
				'selector' => '.phone-call a i',
				'container_inclusive' => true,
				'render_callback' => 'slider_section',
				'fallback_refresh' => true,
			)
		);


		//slider room search form  
		$wp_customize->add_setting(
			'slider_room_search_head'
			,array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'hotelgalaxy_sanitize_text',
				'priority'  => 1,
			)
		);

		$wp_customize->add_control(
			'slider_room_search_head',
			array(
				'type' => 'hidden',
				'label' => __('Room Search Form','hotel-galaxy'),
				'section' => 'slider_section',
			)
		); 


		//search form show or hide
		$wp_customize->add_setting(	's_h_room_booking_search_area',array(			
			'default'=>true,
			'sanitize_callback'=>'hotelgalaxy_sanitize_checkbox',	
			'capability'        => 'edit_theme_options',
			'priority'=> 1,
		));

		$wp_customize->add_control( 's_h_room_booking_search_area', array(
			'label'        => __( 'Show/Hide Section', 'hotel-galaxy'),
			'type'=>'checkbox',			
			'section'    => 'slider_section',			
		) );			


		//slider  
		$wp_customize->add_setting(
			'slider_heading'
			,array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'hotelgalaxy_sanitize_text',
				'priority'  => 1,
			)
		);

		$wp_customize->add_control(
			'slider_heading',
			array(
				'type' => 'hidden',
				'label' => __('Content','hotel-galaxy'),
				'section' => 'slider_section',
			)
		); 

		// slider repeter
		$wp_customize->add_setting( 'slider_contents', array(
			'sanitize_callback' => 'hotelgalaxy_repeater_sanitize',					
			'default' => hotelgalaxy_get_slider_default(),
			'transport'         => isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh',
			'priority'=> 1,
		));

		$wp_customize->add_control(	new Hotelgalaxy_Repeater( $wp_customize, 
			'slider_contents', array(					
				'label'   => esc_html__('Slider Contents','hotel-galaxy'),
				'section' => 'slider_section',				
				'item_name' => esc_html__( 'Item', 'hotel-galaxy' ),				
				'customizer_repeater_image_control' => true,
				'customizer_repeater_video_control' => false,
				'customizer_repeater_number_control' => true,
				'customizer_repeater_title_control' => true,
				'customizer_repeater_subtitle_control' => true,
				'customizer_repeater_subtitle2_control' => false,
				'customizer_repeater_text_control' => true,
				'customizer_repeater_link_control' => true,
				'customizer_repeater_text2_control'=> true,		
				'customizer_repeater_link2_control' => false,
				'customizer_repeater_button2_control' => false,
				'customizer_repeater_slide_align' => true,
				'customizer_repeater_icon_control' => false,		
				'customizer_repeater_checkbox_control' => false,	
				'customizer_repeater_repeater_control' => false,								
			) 
		));	

		// add_partial
		$wp_customize->selective_refresh->add_partial(
			'slider_contents', array(
				'selector' => '.hg-home-slider .slider-title',
				'container_inclusive' => true,
				'render_callback' => 'slider_section',
				'fallback_refresh' => true,
			)
		);	

		
	}

}