<?php 
if(! function_exists('hotelgalaxy_room_customizer')){

	add_action( 'customize_register', 'hotelgalaxy_room_customizer', 999);

	function hotelgalaxy_room_customizer( $wp_customize ) {

		$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';		

		if( !$wp_customize->get_section( 'room_section' ) ){

			$wp_customize->add_section('room_section',array(
				'title' => __( 'Room Section','hotelgalaxy' ),
				'panel'=>'frontpage_layout',
				'capability'=>'edit_theme_options',
				'priority' => 3,			
			));
		}

		//room head
		$wp_customize->add_setting(
			'room_head'
			,array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'hotelgalaxy_sanitize_text',
				'priority'  => 1,
			)
		);

		$wp_customize->add_control(
			'room_head',
			array(
				'type' => 'hidden',
				'label' => __('Header','hotel-galaxy'),
				'section' => 'room_section',
			)
		); 

		//section show or hide
		$wp_customize->add_setting(	's_h_room_section',array(			
			'default'=> true,	
			'capability'        => 'edit_theme_options',
			'sanitize_callback'=>'hotelgalaxy_sanitize_checkbox',
			'transport'         => $selective_refresh,	
			'priority'  => 1,
		));

		$wp_customize->add_control( 's_h_room_section', array(
			'label'        => __( 'Show/Hide Section', 'hotel-galaxy'),
			'type'=>'checkbox',
			'section'    => 'room_section',			
			
		) );		


	//title
		$wp_customize->add_setting('room_section_title',array(			
			'default'=> 'Our Favorite <span>Room</span>',
			'sanitize_callback'=>'hotelgalaxy_sanitize_html',	
			'capability'        => 'edit_theme_options',
			'transport'         => $selective_refresh,
			'priority'  => 1,
		));
		$wp_customize->add_control( 'room_section_title', array(
			'label'        => __( 'Title', 'hotel-galaxy'),
			'type'=>'text',
			'section'    => 'room_section',							
		));

		// add_partial
		$wp_customize->selective_refresh->add_partial(
			'room_section_title', array(
				'selector' => '.room-section .section-header .site-title-header',
				'container_inclusive' => true,
				'render_callback' => 'service_section',
				'fallback_refresh' => true,
			)
		);

	//sub title		
		$wp_customize->add_setting('room_section_subtitle',array(			
			'default'=> __('Excepteur sint occaecat cupidatat', 'hotel-galaxy'),
			'sanitize_callback'=>'hotelgalaxy_sanitize_html',	
			'capability'        => 'edit_theme_options',
			'transport'         => $selective_refresh,
			'priority'  => 1,
		));
		$wp_customize->add_control( 'room_section_subtitle', array(
			'label'        => __( 'Subtitle', 'hotel-galaxy'),
			'type'=>'text',
			'section'    => 'room_section',				
		));

		// add_partial
		$wp_customize->selective_refresh->add_partial(
			'room_section_subtitle', array(
				'selector' => '.room-section .section-header p',
				'container_inclusive' => true,
				'render_callback' => 'service_section',
				'fallback_refresh' => true,
			)
		);

		//room setttings
		$wp_customize->add_setting(
			'room_settings_head'
			,array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'hotelgalaxy_sanitize_text',
				'priority'  => 1,
			)
		);

		$wp_customize->add_control(
			'room_settings_head',
			array(
				'type' => 'hidden',
				'label' => __('Settings','hotel-galaxy'),
				'section' => 'room_section',
			)
		); 

		//button text		
		$wp_customize->add_setting('room_button_text',array(			
			'default'=> __('View All', 'hotel-galaxy'),
			'sanitize_callback'=>'hotelgalaxy_sanitize_html',	
			'capability'        => 'edit_theme_options',
			'transport'         => $selective_refresh,
			'priority'  => 1,
		));
		$wp_customize->add_control( 'room_button_text', array(
			'label'        => __( 'Button Text', 'hotel-galaxy'),
			'type'=>'text',
			'section'    => 'room_section',				
		));

		// add_partial
		$wp_customize->selective_refresh->add_partial(
			'room_button_text', array(
				'selector' => '.room-section .view-all-btn a',
				'container_inclusive' => true,
				'render_callback' => 'service_section',
				'fallback_refresh' => true,
			)
		);

		//button url		
		$wp_customize->add_setting('room_button_url',array(			
			'default'=> __('#', 'hotel-galaxy'),
			'sanitize_callback'=>'hotelgalaxy_sanitize_html',	
			'capability'        => 'edit_theme_options',
			'transport'         => $selective_refresh,
			'priority'  => 1,
		));
		$wp_customize->add_control( 'room_button_url', array(
			'label'        => __( 'Button URL', 'hotel-galaxy'),
			'type'=>'text',
			'section'    => 'room_section',				
		));


	// show rooms
		$wp_customize->add_setting('room_post_per_page',array(			
			'default'=> 6,
			'sanitize_callback'=>'hotelgalaxy_sanitize_integer',	
			'capability'        => 'edit_theme_options',
			'transport'         => $selective_refresh,
			'priority'  => 1,
		));
		$wp_customize->add_control( 'room_post_per_page', array(
			'label'        => __( 'Posts Per Page', 'hg-premium' ),
			'type'=>'select',
			'section'    => 'room_section',			
			'choices' => array(
				'-1' => esc_html__( 'All', 'hotel-galaxy'),
				'2' => esc_html__( '2', 'hotel-galaxy'),
				'3' => esc_html__( '3', 'hotel-galaxy'),
				'4' => esc_html__( '4', 'hotel-galaxy'),
				'6' => esc_html__( '6', 'hotel-galaxy'),
				'8' => esc_html__( '8', 'hotel-galaxy'),
				'9' => esc_html__( '9', 'hotel-galaxy'),
				'10' => esc_html__( '10', 'hotel-galaxy'),
				'12' => esc_html__( '12', 'hotel-galaxy'),				
			),				
		));			
	}
}




