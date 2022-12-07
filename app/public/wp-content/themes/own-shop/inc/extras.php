<?php
/**
 * 
 * @package own-shop
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
if ( ! function_exists( 'own_shop_body_classes' ) ) :
function own_shop_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) :
		$classes[] = 'group-blog';
	endif;

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) :
		$classes[] = 'hfeed';
	endif;

	return $classes;
}
endif;
add_filter( 'body_class', 'own_shop_body_classes' );