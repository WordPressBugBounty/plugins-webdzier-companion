<?php 
if(! function_exists('webdzier_companion_hotelpress_above_header_customizer')){

	add_action( 'customize_register', 'webdzier_companion_hotelpress_above_header_customizer', 999);

	function webdzier_companion_hotelpress_above_header_customizer( $wp_customize ) {
		$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
		//header  
		$wp_customize->add_setting(
			'top_header_info_head'
			,array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'hotelgalaxy_sanitize_text',
				
			)
		);
		$wp_customize->add_control(
			'top_header_info_head',
			array(
				'type' => 'hidden',
				'label' => __('Header Top Info','hotel-galaxy'),
				'section' => 'above_header',
				'priority' => 1,
			)
		); 

		// headertop-Info show or hide
		$wp_customize->add_setting(	's_h_header_top_info',array(			
			'default'=> true,
			'sanitize_callback'=>'hotelgalaxy_sanitize_checkbox',	
			'capability'       => 'edit_theme_options',
		));

		$wp_customize->add_control( 's_h_header_top_info', array(
			'label'        => __( 'Show/Hide Section', 'hotel-galaxy'),
			'type'=>'checkbox',
			'priority'=> 2,
			'section'    => 'above_header',			
		) );

	    // HeaderTop Info // 
		$wp_customize->add_setting(
			'header_top_info',
			array(
				'default'			=> __('Hotalpress Best Amenities','hotel-galaxy'),
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'hotelgalaxy_sanitize_html',
				'priority' => 3
			)
		);	

		$wp_customize->add_control( 
			'header_top_info',
			array(
				'label'   => __('Header Top Info','hotel-galaxy'),
				'section' => 'above_header',
				'type'    => 'textarea',
			)  
		);

		// Header Top Typing // 
		$wp_customize->add_setting(
			'header_top_typing_type',
			array(
				'default'			=> __('Free Parking.,Free Wifi.,Room Services.,Swimming Pool.','hotel-galaxy'),
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'hotelgalaxy_sanitize_html',
				'priority' => 4
			)
		);	

		$wp_customize->add_control( 
			'header_top_typing_type',
			array(
				'label'   => __('Header Top Info Typing','hotel-galaxy'),
				'section' => 'above_header',
				'type'    => 'textarea',
			)  
		);
		// Header Top Info
		$wp_customize->selective_refresh->add_partial(
			'header_top_info', array(
				'selector' => '.header-top-area-left .headertop-Info',
				'container_inclusive' => true,
				'render_callback' => 'above_header',
				'fallback_refresh' => true,
			)
		);
	}
}