<?php
$theme = wp_get_theme(); // gets the current theme
if( 'Hotel Galaxy' == $theme->name){
	$footer_logo = WEBDZIER_COMPANION_PLUGIN_URL .'inc/hotelgalaxy/images/footer-logo.png';
}
$activate = array(
	'hotelgalaxy-sidebar-primary' => array(
		'search-1',
		'recent-posts-1',
		'archives-1',
	),
	'hotelgalaxy-footer-widget-area' => array(
		'text-1',
		'categories-1',
		'archives-1',
		'search-1',
	)
);
/* the default titles will appear */
update_option('widget_text', array(
	1 => array('text'=>'<img class="aligncenter wp-image-732" src="'.$footer_logo.'" alt="footer-img" width="197px" />
		<p>Lorem ipsum dolor sit amet, consectetur dipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
		<ul class="nav social_media">
		<li class="nav-item"><i class="fa fa-facebook" aria-hidden="true"></i></li>
		<li class="nav-item"><i class="fa fa-skype" aria-hidden="true"></i></li>
		<li class="nav-item"><i class="fa fa-twitter" aria-hidden="true"></i></li>
		<li class="nav-item"><i class="fa fa-youtube" aria-hidden="true"></i></li>
		<li class="nav-item"><i class="fa fa-instagram" aria-hidden="true"></i></li>
		</ul>'),        
	2 => array('title' => 'Recent Posts'),
	3 => array('title' => 'Categories'), 
));
update_option('widget_categories', array(
	1 => array('title' => 'Categories'), 
	2 => array('title' => 'Categories')));

update_option('widget_archives', array(
	1 => array('title' => 'Archives'), 
	2 => array('title' => 'Archives')));

update_option('widget_search', array(
	1 => array('title' => 'Search'), 
	2 => array('title' => 'Search')));	

update_option('sidebars_widgets',  $activate);
$MediaId = get_option('hotelgalaxy_media_id');
set_theme_mod( 'custom_logo', $MediaId[0] );