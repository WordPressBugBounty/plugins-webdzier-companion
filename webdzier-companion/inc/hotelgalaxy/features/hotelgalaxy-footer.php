<?php 
if(! function_exists('webdzier_companion_hotelgalaxy_footer_customizer')){
	add_action( 'customize_register', 'webdzier_companion_hotelgalaxy_footer_customizer', 999);
	function webdzier_companion_hotelgalaxy_footer_customizer( $wp_customize ) {

		$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';	

		//========================= Footer bg section ======================== //
		if(!$wp_customize->get_section('footer_bg_section')){
			$wp_customize->add_section('footer_bg_section',array(
				'title' => __( 'Footer Background','hotel-galaxy'),
				'description' => '',
				'panel'=>'footer_section',
				'capability'=>'edit_theme_options',
				'priority' => 1,			
			));
		}		

		// Image Opacity // 
		if ( class_exists( 'Webdzier_Customizer_Range_Control' ) ) {

			//head 
			$wp_customize->add_setting(
				'footer_opa_head'
				,array(
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'hotelgalaxy_sanitize_text',
					'priority'  => 1,
				)
			);

			$wp_customize->add_control(
				'footer_opa_head',
				array(
					'type' => 'hidden',
					'label' => __('Opacity','hotel-galaxy'),
					'section' => 'footer_bg_section',
				)
			); 

			// opacity
			$wp_customize->add_setting(
				'footer_bg_img_opacity',
				array(
					'default'			=> '0.85',
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'hotelgalaxy_sanitize_text',
					'priority'  => 1,
				)
			);
			$wp_customize->add_control( 
				new Webdzier_Customizer_Range_Control( $wp_customize, 'footer_bg_img_opacity', 
					array(
						'label'      => __( 'Opacity', 'hotel-galaxy'),
						'section'  => 'footer_bg_section',						
						'input_attrs'    => array(							
							'min'           => 0,
							'max'           => 1,
							'step'          => 0.1,
						),						
					) 
				) 
			);
		}


		//========================= Footer bottom section ======================== //

		if(!$wp_customize->get_section('footer_bottom_section')){

			$wp_customize->add_section('footer_bottom_section',array(
				'title' => __( 'Footer Bottom','hotel-galaxy'),
				'description' => '',
				'panel'=>'footer_section',
				'capability'=>'edit_theme_options',
				'priority' => 1,			
			));
		}	

		//bottom footer  
		$wp_customize->add_setting(
			'footer_bottom_head'
			,array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'hotelgalaxy_sanitize_text',
				'priority'  => 1,
			)
		);

		$wp_customize->add_control(
			'footer_bottom_head',
			array(
				'type' => 'hidden',
				'label' => __('Header','hotel-galaxy'),
				'section' => 'footer_bottom_section',
			)
		); 

			//section status
		$wp_customize->add_setting(	's_h_footer_bottom',array(			
			'default'=> true,			
			'sanitize_callback'=>'hotelgalaxy_sanitize_checkbox',	
			'transport'         => $selective_refresh,	
			'priority'    => 1,	
		));

		$wp_customize->add_control( 's_h_footer_bottom', array(
			'label'        => __( 'Show/Hide Section', 'hotel-galaxy' ),
			'type'=>'checkbox',
			'section'    => 'footer_bottom_section',	

		));

		//bottom footer content 
		$wp_customize->add_setting(
			'footer_bottom_content'
			,array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'hotelgalaxy_sanitize_text',
				'priority'  => 1,
			)
		);

		$wp_customize->add_control(
			'footer_bottom_content',
			array(
				'type' => 'hidden',
				'label' => __('Content','hotel-galaxy'),
				'section' => 'footer_bottom_section',
			)
		); 			

		// footer bottom
		$wp_customize->add_setting( 'footerbottom_contents', array(
			'sanitize_callback' => 'hotelgalaxy_repeater_sanitize',					
			'default' => hotelgalaxy_get_footerbottom_default(),
			'transport'         => isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh',
			'priority' =>1,
			'transport'         => $selective_refresh,
		));

		$wp_customize->add_control(	new Hotelgalaxy_Repeater( $wp_customize, 
			'footerbottom_contents', array(					
				'label'   => esc_html__('Footer Bootom','hotel-galaxy'),
				'section' => 'footer_bottom_section',					
				'item_name' => esc_html__( 'Footer Item', 'hotel-galaxy' ),				
				'customizer_repeater_image_control' => true,
				'customizer_repeater_title_control' => true,
				'customizer_repeater_subtitle_control' => false,
				'customizer_repeater_text_control' => false,
				'customizer_repeater_link_control' => true,
				'customizer_repeater_text2_control'=> true,		
				'customizer_repeater_link2_control' => false,
				'customizer_repeater_button2_control' => false,
				'customizer_repeater_slide_align' => false,
				'customizer_repeater_icon_control' => true,		
				'customizer_repeater_checkbox_control' => false,	
				'customizer_repeater_repeater_control' => false,								
			) 
		));

		$wp_customize->selective_refresh->add_partial( 'footerbottom_contents', array(
			'selector' => '.footer-bootom .row',
			'render_callback' => 'footer_bottom_section',
		) );

	}
}