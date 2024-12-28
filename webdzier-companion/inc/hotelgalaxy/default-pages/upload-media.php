<?php
$header_logo ='';
$footer_logo ='';
$current_theme = wp_get_theme();
if ($current_theme->get('Name') === 'HotelPress') {
	$header_logo = WEBDZIER_COMPANION_PLUGIN_URL . 'inc/hotelpress/images/header-logo.png';
	$footer_logo = WEBDZIER_COMPANION_PLUGIN_URL . 'inc/hotelpress/images/footer-logo.png';
}else{
	$header_logo   = WEBDZIER_COMPANION_PLUGIN_URL .'inc/hotelgalaxy/images/header-logo.png';
	$footer_logo   = WEBDZIER_COMPANION_PLUGIN_URL .'inc/hotelgalaxy/images/footer-logo.png';
}
$ImagePath  = WEBDZIER_COMPANION_PLUGIN_URL .'inc/hotelgalaxy/images';

$images = array(
	$header_logo,
	$footer_logo,
	$ImagePath. '/room/room-1.jpg',
	$ImagePath. '/room/room-2.jpg',
	$ImagePath. '/room/room-3.jpg',
);
$parent_post_id = null;
foreach($images as $name) {
	$filename = basename($name);
	$upload_file = wp_upload_bits($filename, null, file_get_contents($name));
	if (!$upload_file['error']) {
		$wp_filetype = wp_check_filetype($filename, null );
		$attachment = array(
			'post_mime_type' => $wp_filetype['type'],
			'post_parent' => $parent_post_id,
			'post_title' => preg_replace('/\.[^.]+$/', '', $filename),
			'post_excerpt' => 'hotelgalaxy caption',
			'post_status' => 'inherit'
		);
		$ImageId[] = $attachment_id = wp_insert_attachment( $attachment, $upload_file['file'], $parent_post_id );

		if (!is_wp_error($attachment_id)) {
			require_once(ABSPATH . "wp-admin" . '/includes/image.php');
			$attachment_data = wp_generate_attachment_metadata( $attachment_id, $upload_file['file'] );
			wp_update_attachment_metadata( $attachment_id,  $attachment_data );
		}
	}

}

update_option( 'hotelgalaxy_media_id', $ImageId );
