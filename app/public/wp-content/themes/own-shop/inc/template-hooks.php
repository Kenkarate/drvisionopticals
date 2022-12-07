<?php
/**
 * Custom template hooks for this theme.
 *
 *
 * @package own-shop
 */


/**
 * Get breadcrumbs meta hook
 */
if ( ! function_exists( 'own_shop_get_breadcrumbs_content' ) ) :
function own_shop_get_breadcrumbs_content() {
    do_action('own_shop_get_breadcrumbs_content');
}
endif;

/**
 * Before title meta hook
 */
if ( ! function_exists( 'own_shop_before_title' ) ) :
function own_shop_before_title() {
	do_action('own_shop_before_title');
}
endif;

/**
 * After title meta hook
 */
if ( ! function_exists( 'own_shop_after_title' ) ) :
function own_shop_after_title() {
	do_action('own_shop_after_title');
}
endif;

/**
 * Before title content meta hook
 */
if ( ! function_exists( 'own_shop_before_title_content' ) ) :
function own_shop_before_title_content() {
	do_action('own_shop_before_title_content');
}
endif;

/**
 * After title content meta hook
 */
if ( ! function_exists( 'own_shop_after_title_content' ) ) :
function own_shop_after_title_content() {
	do_action('own_shop_after_title_content');
}
endif;

/**
 * Before menu cart meta hook
 */
if ( ! function_exists( 'own_shop_before_header_menu_cart' ) ) :
function own_shop_before_header_menu_cart() {
	do_action('own_shop_before_header_menu_cart');
}
endif;


/**
 * Single post content after meta hook
 */
if ( ! function_exists( 'own_shop_single_post_after_content' ) ) :
function own_shop_single_post_after_content($postID) {
	do_action('own_shop_single_post_after_content',$postID);
}
endif;