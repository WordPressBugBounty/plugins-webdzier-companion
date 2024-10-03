<?php 
if(! function_exists('webdzier_companion_hotelgalaxy_above_header_customizer')){

	add_action( 'customize_register', 'webdzier_companion_hotelgalaxy_above_header_customizer', 999);

	function webdzier_companion_hotelgalaxy_above_header_customizer( $wp_customize ) {

		$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';


		// Logo Width // 
		if ( class_exists( 'Webdzier_Customizer_Range_Control' ) ) {
			$wp_customize->add_setting(
				'logo_width',
				array(
					'default'			=> '160',
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'hotelgalaxy_sanitize_range_value',
					'transport'         => 'postMessage',
				)
			);
			$wp_customize->add_control( 
				new Webdzier_Customizer_Range_Control( $wp_customize, 'logo_width', 
					array(
						'label'      	=> __( 'Logo Width', 'hotel-galaxy' ),
						'section'  		=> 'title_tagline',						
						'input_attrs'    => array(						
							'min'           => 1,
							'max'           => 500,
							'step'          => 1,								
						),					
					) ) 
			);
		}

		
		/*=======================================================================================*/ 
		if ( ! $wp_customize->get_section( 'above_header' ) ) {

			$wp_customize->add_section('above_header',array(
				'title' => __( 'Above Header','hotel-galaxy'),
				'panel'=>'header_section',
				'capability'=>'edit_theme_options',
				'priority' => 3,			
			));
		}			

		/*=============== abover header conatct details===================*/ 
		


		//header  
		$wp_customize->add_setting(
			'above_header_head'
			,array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'hotelgalaxy_sanitize_text',
				
			)
		);

		$wp_customize->add_control(
			'above_header_head',
			array(
				'type' => 'hidden',
				'label' => __('Head','hotel-galaxy'),
				'section' => 'above_header',
				'priority'  => 1,
			)
		); 

		//section show or hide
		$wp_customize->add_setting(	's_h_header_office_details',array(			
			'default'=> true,
			'sanitize_callback'=>'hotelgalaxy_sanitize_checkbox',	
			'capability'        => 'edit_theme_options',
		));

		$wp_customize->add_control( 's_h_header_office_details', array(
			'label'        => __( 'Show/Hide Section', 'hotel-galaxy'),
			'type'=>'checkbox',
			'priority'=> 1,
			'section'    => 'above_header',			
		) );

		// header office details
		$wp_customize->add_setting( 'header_office_contents',array(
			'sanitize_callback' => 'hotelgalaxy_repeater_sanitize',					
			'default' => hotelgalaxy_get_header_office_default(),
			'transport'         => isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh',

		));

		$wp_customize->add_control( new Hotelgalaxy_Repeater( $wp_customize,'header_office_contents', 
			array(
				'priority' => 1,
				'label'   => esc_html__('Header Office Detail','hotelgalaxy'),
				'section' => 'above_header',					
				'item_name'     => esc_html__( 'Item', 'hotelgalaxy' ),
				'customizer_repeater_icon_control' => true,						
				'customizer_repeater_title_control' => true,
				'customizer_repeater_subtitle_control' => true,									
			) 
		));

		// top header details
		$wp_customize->selective_refresh->add_partial(
			'header_office_contents', array(
				'selector' => 'ul.header_contact',
				'container_inclusive' => true,
				'render_callback' => 'above_header',
				'fallback_refresh' => true,
			)
		);



		/*=============== Social media ===================*/ 

		//header  
		$wp_customize->add_setting(
			'social_head'
			,array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'hotelgalaxy_sanitize_text',
				
			)
		);

		$wp_customize->add_control(
			'social_head',
			array(
				'type' => 'hidden',
				'label' => __('Social Media Icons','hotel-galaxy'),
				'section' => 'above_header',
				'priority'  => 1,
			)
		); 

		// show/hide social
		$wp_customize->add_setting('s_h_social_media',array(
			'default' => true,
			'sanitize_callback' => 'hotelgalaxy_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'transport'         => ( isset( $wp_customize->selective_refresh ) ) ? array() : 'blogname',				
		));

		$wp_customize->add_control('s_h_social_media', array(
			'priority' => 1,
			'label'	      => esc_html__( 'Show/Hide Section', 'hotel-galaxy' ),
			'section'     => 'above_header',
			'type'        => 'checkbox'
		));


		// social contents
		$wp_customize->add_setting( 'socialmedia_contents',array(
			'sanitize_callback' => 'hotelgalaxy_repeater_sanitize',					
			'default' => hotelgalaxy_get_socialmedia_default(),
			'transport'         => isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh',
		));

		$wp_customize->add_control(new Hotelgalaxy_Repeater( $wp_customize, 'socialmedia_contents', 
			array(
				'priority' => 1,
				'label'   => esc_html__('Social Media Icons','hotelgalaxy'),
				'section' => 'above_header',
				'add_field_label' => esc_html__( 'Add New', 'hotelgalaxy' ),
				'item_name'     => esc_html__( 'Icon', 'hotelgalaxy' ),
				'customizer_repeater_icon_control' => true,						
				'customizer_repeater_link_control' => true,						
			) 
		));

		// social media
		$wp_customize->selective_refresh->add_partial(
			'socialmedia_contents', array(
				'selector' => 'ul.social_media',
				'container_inclusive' => true,
				'render_callback' => 'above_header',
				'fallback_refresh' => true,
			)
		);

	}
}