<?php 
if(! function_exists('webdzier_companion_hotelgalaxy_general_customizer')){

	add_action( 'customize_register', 'webdzier_companion_hotelgalaxy_general_customizer', 999);

	function webdzier_companion_hotelgalaxy_general_customizer( $wp_customize ) {

		if ( ! $wp_customize->get_panel( 'general_section' ) ) {
			$wp_customize->add_panel( 'general_section', array(
				'priority' => 20,
				'title' => __( 'General', 'hotel-galaxy'),
			) );
		}



		// height // 
		if ( class_exists( 'Webdzier_Customizer_Range_Control' ) ) {

			//header  
			$wp_customize->add_setting(
				'breadcrumb_size_head'
				,array(
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'hotelgalaxy_sanitize_text',
				)
			);

			$wp_customize->add_control(
				'breadcrumb_size_head',
				array(
					'type' => 'hidden',
					'label' => __('Height','hotel-galaxy'),
					'section' => 'breadcrumb_section',
					'priority'  => 2,
				)
			); 

			$wp_customize->add_setting('breadcrumb_height',
				array(
					'default'			=> 400,
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'hotelgalaxy_sanitize_range_value',
					'transport'         => 'postMessage',
				)
			);
			$wp_customize->add_control( 
				new Webdzier_Customizer_Range_Control( $wp_customize, 'breadcrumb_height', 
					array(
						'label'      => __( 'Height', 'hotel-galaxy' ),
						'section'  => 'breadcrumb_section',
						'priority'    => 2,							
						'input_attrs'    => array(							
							'min'           => 0,
							'max'           => 1000,
							'step'          => 1,							
						),						
					) ) 
			);
		}
	}
}