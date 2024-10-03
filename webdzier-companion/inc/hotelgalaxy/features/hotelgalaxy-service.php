<?php 
if(! function_exists('hotelgalaxy_service_customizer')){

	add_action( 'customize_register', 'hotelgalaxy_service_customizer', 999);

	function hotelgalaxy_service_customizer( $wp_customize ) {

		$wp_customize->add_section('service_section',array(
			'title' => __( 'Service Section','hotelgalaxy' ),
			'panel'=>'frontpage_layout',
			'capability'=>'edit_theme_options',
			'priority' => 3,			
		));

		//head  
		$wp_customize->add_setting(
			'service_head'
			,array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'hotelgalaxy_sanitize_text',				
			)
		);

		$wp_customize->add_control(
			'service_head',
			array(
				'type' => 'hidden',
				'label' => __('Header','hotel-galaxy'),
				'section' => 'service_section',
				'priority'  => 1,
			)
		); 

		//section show or hide
		$wp_customize->add_setting(	's_h_service_section',array(			
			'default'=> true,
			'sanitize_callback'=>'hotelgalaxy_sanitize_checkbox',	
			'capability'        => 'edit_theme_options',
		));

		$wp_customize->add_control( 's_h_service_section', array(
			'label'        => __( 'Show/Hide Section', 'hotel-galaxy'),
			'type'=>'checkbox',
			'section'    => 'service_section',	
			'priority' => 1,		
			'settings'   => 's_h_service_section',
		) );

		//services title
		$wp_customize->add_setting('service_section_title',array(			
			'default'=> 'Our Best <span>Amenities</span>',	
			'sanitize_callback'=>'hotelgalaxy_sanitize_html',
			'capability'        => 'edit_theme_options',
		));
		$wp_customize->add_control( 'service_section_title', array(
			'label'        => __( 'Title', 'hotel-galaxy'),
			'type'=>'text',
			'section'    => 'service_section',
			'priority' => 2,
			'settings'   => 'service_section_title',
		));

		// add_partial
		$wp_customize->selective_refresh->add_partial(
			'service_section_title', array(
				'selector' => '.service-area .section-header .site-title-header',
				'container_inclusive' => true,
				'render_callback' => 'service_section',
				'fallback_refresh' => true,
			)
		);

		//services subtitle
		$wp_customize->add_setting('service_section_subtitle',array(		
			'default'=> __('Excepteur sint occaecat cupidatat', 'hotel-galaxy'),	
			'sanitize_callback'=>'hotelgalaxy_sanitize_html',
			'capability'        => 'edit_theme_options',
		));
		$wp_customize->add_control( 'service_section_subtitle', array(
			'label'        => __( 'Subtitle', 'hotel-galaxy'),
			'type'=>'text',
			'section'    => 'service_section',
			'priority' => 3,
			'settings'   => 'service_section_subtitle',
		));

		// add_partial
		$wp_customize->selective_refresh->add_partial(
			'service_section_subtitle', array(
				'selector' => '.service-area .section-header p',
				'container_inclusive' => true,
				'render_callback' => 'service_section',
				'fallback_refresh' => true,
			)
		);

		//settings  
		$wp_customize->add_setting(
			'service_setting_head'
			,array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'hotelgalaxy_sanitize_text',				
			)
		);

		$wp_customize->add_control(
			'service_setting_head',
			array(
				'type' => 'hidden',
				'label' => __('Settings','hotel-galaxy'),
				'section' => 'service_section',
				'priority'  => 3,
			)
		); 
		

		// post pr page
		$wp_customize->add_setting('service_post_per_page',
			array(
				'default' => 4,				
				'sanitize_callback' => 'hotelgalaxy_sanitize_select'
			)
		);

		$wp_customize->add_control('service_post_per_page',
			array('type' => 'select',
				'label' => esc_html__( 'Post Show', 'hotel-galaxy'),
				'section' => 'service_section',
				'priority' => 3,
				'settings' => 'service_post_per_page',
				'choices' => array(
					'50' => esc_html__( 'All', 'hotel-galaxy'),
					'2' => esc_html__( '2', 'hotel-galaxy'),
					'3' => esc_html__( '3', 'hotel-galaxy'),
					'4' => esc_html__( '4', 'hotel-galaxy'),
					'5' => esc_html__( '5', 'hotel-galaxy'),
					'6' => esc_html__( '6', 'hotel-galaxy'),
					'7' => esc_html__( '7', 'hotel-galaxy'),
					'8' => esc_html__( '8', 'hotel-galaxy'),
					'9' => esc_html__( '9', 'hotel-galaxy'),
					'10' => esc_html__( '10', 'hotel-galaxy'),
				),
				
			)
		);

		//settings  
		$wp_customize->add_setting(
			' '
			,array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'hotelgalaxy_sanitize_text',				
			)
		);

		$wp_customize->add_control(
			'service_content',
			array(
				'type' => 'hidden',
				'label' => __('Content','hotel-galaxy'),
				'section' => 'service_section',
				'priority'  => 4,
			)
		); 

		// service item repeter
		$wp_customize->add_setting( 'service_content', array(
			'sanitize_callback' => 'hotelgalaxy_repeater_sanitize',					
			'default' => hotelgalaxy_get_service_contents(),
			'transport'         => isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh',
		));

		$wp_customize->add_control(	new Hotelgalaxy_Repeater( $wp_customize, 
			'service_content', array(					
				'label'   => esc_html__('Service Contents','hotel-galaxy'),
				'section' => 'service_section',
				'priority' => 4,				
				'item_name'     => esc_html__( 'Item', 'hotel-galaxy' ),
				'customizer_repeater_image_control' => false,
				'customizer_repeater_title_control' => true,
				'customizer_repeater_subtitle_control' => false,
				'customizer_repeater_text_control' => true,
				'customizer_repeater_link_control' => true,
				'customizer_repeater_text2_control'=> false,		
				'customizer_repeater_link2_control' => false,
				'customizer_repeater_button2_control' => false,
				'customizer_repeater_slide_align' => false,
				'customizer_repeater_icon_control' => true,		
				'customizer_repeater_checkbox_control' => true,									
			) 
		));

		// add_partial
		$wp_customize->selective_refresh->add_partial(
			'service_content', array(
				'selector' => '.service-area .service-content-area',
				'container_inclusive' => true,
				'render_callback' => 'service_section',
				'fallback_refresh' => true,
			)
		);

	}

}