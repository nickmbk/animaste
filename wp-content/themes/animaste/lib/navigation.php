<?php

function register_menus() {
	register_nav_menus( array(
		'main-menu' => esc_html__('Main Menu', 'animaste'),
        'mobile-menu' => esc_html__('Mobile Menu','animaste'),
		'footer-menu' => esc_html__('Footer Menu', 'animaste')
	));
}
add_action('init', 'register_menus');

function dropdown_icon($title, $item, $args, $depth) {
    if($args->theme_location == 'main-menu') {
        if (in_array('menu-item-has-children', $item->classes)) {
            if($depth == 0) {
                $title .= ' <i class="fa fa-angle-down" aria-hidden="true"></i>';
            } else {
                $title .= ' <i class="fa fa-angle-right" aria-hidden="true"></i>';
            };
        }
    }
    return $title;
}
add_filter('nav_menu_item_title', 'dropdown_icon', 10, 4);