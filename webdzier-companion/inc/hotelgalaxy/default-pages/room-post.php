<?php
$MediaId = get_option('hotelgalaxy_media_id');
$room_title_1 = "Deluxe Room";
$room_title_2 = "Family Room";
$room_title_3 = "HoneyMoon Room";
$room_content ='<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>';

wp_insert_term(	'All','room_taxonomy', array(
	'description' => 'Hotel rooms',
	'slug'    => 'all'
));

wp_insert_term(	'Deluxe','room_taxonomy', array(
	'description' => 'Hotel rooms',
	'slug'    => 'deluxe'
));

wp_insert_term(	'Luxury','room_taxonomy', array(
	'description' => 'Hotel rooms',
	'slug'    => 'luxury'
));

wp_insert_term(	'Couple','room_taxonomy', array(
	'description' => 'Hotel rooms',
	'slug'    => 'couple'
));

$postData = array(
	array(
		'post_title' => $room_title_1,
		'post_status' => 'publish',
		'post_content' => $room_content,
		'post_author' => 1,
		'post_type'     =>   'hg_room',
		'post_category' => array(2),		
	),

	array(
		'post_title' => $room_title_2,
		'post_status' => 'publish',
		'post_content' => $room_content,
		'post_author' => 1,
		'post_type'     =>   'hg_room',
		'post_category' => array(3),		
	),

	array(
		'post_title' => $room_title_3,
		'post_status' => 'publish',
		'post_content' => $room_content,
		'post_author' => 1,
		'post_type'     =>   'hg_room',
		'post_category' => array(4),		
	),
);

$room_metabox_value = array( 'bed'=>1,'adults'=>2,'children'=>0, 'day'=>'Per Day', 'size'=> 200,'rent'=>100,'currency'=> '$','ribbon'=>'New');


kses_remove_filters();

foreach ( $postData as $i => $post ) :
	$id = wp_insert_post($post);
	set_post_thumbnail( $id, $MediaId[$i + 2] );
	update_post_meta( $id, 'hg_room_settings_'.$id, $room_metabox_value );
endforeach;