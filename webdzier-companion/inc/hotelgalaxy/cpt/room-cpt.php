<?php
if(!function_exists('webdzier_companion_hotelgalaxy_room_cpt')){
	add_action( 'init', 'webdzier_companion_hotelgalaxy_room_cpt' );
	function webdzier_companion_hotelgalaxy_room_cpt(){	
		register_post_type( 'hg_room',
			array(
				'labels' => array(
					'name' => __('Rooms','webdzier-companion'),
					'add_new' => __('Add New Room', 'webdzier-companion'),
					'add_new_item' => __('Add New Room','webdzier-companion'),
					'edit_item' => __('Add New Room','webdzier-companion'),
					'new_item' => __('New Link','webdzier-companion'),
					'all_items' => __('All Rooms','webdzier-companion'),
					'view_item' => __('View Link','webdzier-companion'),
					'search_items' => __('Search Links','webdzier-companion'),
					'not_found' =>  __('No Links found','webdzier-companion'),
					'not_found_in_trash' => __('No Links found in Trash','webdzier-companion'),
					'featured_image'        => __( 'Room Cover Image', 'webdzier-companion' ),
					'set_featured_image'    => __( 'Set room cover image', 'webdzier-companion' ), 
					'remove_featured_image'    => __( 'Remove cover image', 'webdzier-companion' ), 
					'use_featured_image'    => __( 'Use as cover image', 'webdzier-companion' ), 
				),
				'show_in_rest' => true,
				'supports' => array('title','thumbnail','editor'),
				'show_in' => true,
				'show_in_nav_menus' => false,
				'rewrite' => array('slug' =>'room'),
				'public' => true,
				'menu_position' =>20,
				'public' => true,
				'menu_icon' => 'dashicons-admin-multisite',
			)
		);
	}
}

// taxonomy
if(!function_exists('webdzier_companion_hotelgalaxy_room_taxonomy')){
	add_action( 'init', 'webdzier_companion_hotelgalaxy_room_taxonomy', 0);
	function webdzier_companion_hotelgalaxy_room_taxonomy() {
		$args = array(  
			'label' => __('Categories','webdzier-companion'),
			'hierarchical' => true,
			'show_in_nav_menus' => false,			
			'query_var' => true
		);
		register_taxonomy('room_taxonomy','hg_room', $args);
		wp_insert_term(
			'All',  
			'room_taxonomy', 
			array(
				'description' => 'Show all rooms',
				'slug'        => 'all-rooms',
			)
		);		
	}
}

// taxonomy metabox
add_action( 'admin_head', 'webdzier_companion_hotelgalaxy_room_meta_title' );
function webdzier_companion_hotelgalaxy_room_meta_title() {			
	add_meta_box( 'room_taxonomydiv', __('Categories', 'webdzier-companion'), 'post_categories_meta_box', 'hg_room', 'side', 'high', array( 'taxonomy' => 'room_taxonomy' ));
}

// setting metabox
if(! function_exists('webdzier_companion_hotelgalaxy_meta_room')){
	add_action('admin_init','webdzier_companion_hotelgalaxy_meta_room');
	function webdzier_companion_hotelgalaxy_meta_room(){
		add_meta_box('hg_room', __('Settings','webdzier-companion'), 'webdzier_companion_hotelgalaxy_room_settings', 'hg_room', 'normal', 'high');
	}
}

// default settings
if(!function_exists('webdzier_companion_hotelgalaxy_room_default_setting')){
	function webdzier_companion_hotelgalaxy_room_default_setting(){
		$defaults = array(
			'bed' => 1,
			'currency' => '$',			
			'rent' => '',			
			'rating' => 5,
			'size' => 0,
			'adults' => 2,
			'children' => 0,
			'day' => esc_html__('Per Day','webdzier-companion'),	
			'ribbon' => esc_html__('New','webdzier-companion'),
			'is_rating' => true,			
		);		
		return $defaults;
	}
}

if(!function_exists('webdzier_companion_hotelgalaxy_room_settings')){
	function webdzier_companion_hotelgalaxy_room_settings( $post ){
		$meta_key =  'hg_room_settings_'.$post->ID;
		$meta_settings =  get_post_meta( $post->ID, $meta_key, true );
		$data = wp_parse_args($meta_settings, webdzier_companion_hotelgalaxy_room_default_setting());		
		?>
		<div class="hg-metabox">
			<form method="POST">
				<?php wp_nonce_field( 'hg_premium_room_nonce', 'hg_premium_room_nonce' ); ?>
				<input type="hidden" name="id" value="<?php echo esc_attr($post->ID); ?>" />
				<input type="hidden" name="save_post" value="hg_room_settings_" />
				<div class="control">
					<label>
						<?php esc_html_e('Ribbon &#8282;','webdzier-companion') ?> 
					</label>
					<input type="text" name="ribbon" value="<?php echo esc_html($data['ribbon']); ?>"/>
				</div>
				<div class="control">
					<label>
						<?php esc_html_e('Bed &#8282;','webdzier-companion') ?> 
					</label>
					<input type="number" step="0" name="bed" value="<?php echo esc_html($data['bed']); ?>"/>
				</div>
				<div class="control">
					<label>
						<?php esc_html_e('Adults &#8282;','webdzier-companion') ?> 
					</label>
					<input type="number" step="0" name="adults" value="<?php echo esc_html($data['adults']); ?>"/>
				</div>
				<div class="control">
					<label>
						<?php esc_html_e('Children &#8282;','webdzier-companion') ?> 
					</label>
					<input type="number" step="0" name="children" value="<?php echo esc_html($data['children']); ?>"/>
				</div>
				<div class="control">
					<label>
						<?php esc_html_e('Size &#8282; (In meter square)','webdzier-companion') ?> 
					</label>
					<input type="number" step="0" name="size" value="<?php echo esc_html($data['size']); ?>"/>
				</div>
				<div class="control">
					<label>
						<?php esc_html_e('Day &#8282;','webdzier-companion') ?> 
					</label>
					<input type="text" name="day" value="<?php echo esc_html($data['day']); ?>"/>					
				</div>
				<div class="control">
					<label>
						<?php esc_html_e('Currency &#8282;','webdzier-companion') ?> 
					</label>
					<input type="text" name="currency" value="<?php echo esc_html($data['currency']); ?>" />
				</div>
				<div class="control">
					<label>
						<?php esc_html_e('Rent &#8282;','webdzier-companion') ?> 
					</label>
					<input type="text" name="rent" value="<?php echo esc_html($data['rent']); ?>" />
				</div>					
			</form>
		</div>
		<?php
	}
}

if(!function_exists('webdzier_companion_hotelgalaxy_room_save')){
	add_action('save_post','webdzier_companion_hotelgalaxy_room_save');
	function webdzier_companion_hotelgalaxy_room_save( $id ){
		global $post;

		if( !isset( $_POST['hg_premium_room_nonce'] ) || !wp_verify_nonce( $_POST['hg_premium_room_nonce'], 'hg_premium_room_nonce' ) ) {
			return;
		}

		if ($post->post_type != 'hg_room'){
			return;
		}

		$data =array();

		$inputNames = array('post_type','save_post','id','currency','rent','size','adults','children','day','bed','ribbon');

		foreach ( $inputNames as $name ){

			if( $name =='image' ) {
				
				$data[$name] = array_map( 'esc_url', $_POST[ $name ] );

			}else{

				$value = ('post_type' == $name ) ? $post->post_type : $_POST[ $name ];
				$data[$name] = sanitize_text_field( stripcslashes( $value ) );
			}			
		}

		$key = 'hg_room_settings_'.$id;

		update_post_meta( $id, $key, $data );

	}
}