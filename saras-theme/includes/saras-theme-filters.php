<?php
// auto generate menu container classes
function set_menu_container_class ($args) {
	$args['container_class'] = str_replace(' ','-',$args['theme_location']).'-nav'; 
	return $args;
}
add_filter ('wp_nav_menu_args', 'set_menu_container_class');


// Enable shortcodes in text widgets
add_filter('widget_text','do_shortcode');