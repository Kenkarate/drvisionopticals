<?php
/**
 * Own Shop Theme Customizer Helper Functions
 *
 * @package own-shop
 */


/**
* Render callback for site title
* 
* @return void
*/
function own_shop_site_title_callback() {
    bloginfo( 'name' );
}

/**
* Render callback for site description
* 
* @return void
*/
function own_shop_site_description_callback() {
    bloginfo( 'description' );
}


/**
 * Check if the top bar is enabled or not
 */
function own_shop_header_topbar_enable( $control ) {
	if ( $control->manager->get_setting( 'own_shop_enable_header_topbar' )->value() == true ) :
		return true;
	else :
		return false;
	endif;
}


/**
 * Check if the header product category menu is enabled or not
 */
function own_shop_header_product_category_menu_enable( $control ) {
	if ( $control->manager->get_setting( 'own_shop_enable_header_category_menu' )->value() == true ) :
		return true;
	else :
		return false;
	endif;
}


/**
 * Check if the header product custom menu is enabled or not
 */
function own_shop_header_product_custom_menu_enable( $control ) {
	if ( $control->manager->get_setting( 'own_shop_enable_header_category_menu' )->value() == true) :
		return true;
	else :
		return false;
	endif;
}

/**
 * Check if the header menu cart is enabled or not
 */
function own_shop_header_menucart_enable( $control ) {
	if ( $control->manager->get_setting( 'own_shop_enable_header_menucart' )->value() == true ) :
		return true;
	else :
		return false;
	endif;
}

/**
 * Check if the page sidebar enable or not
 */
function own_shop_page_sidebar_enable( $control ) {
	if ( $control->manager->get_setting( 'own_shop_enable_page_sidebar' )->value() == true ) :
		return true;
	else :
		return false;
	endif;
}

/**
 * Check if the page title enable or not
 */
function own_shop_page_title_enable( $control ) {
	if ( $control->manager->get_setting( 'own_shop_enable_page_title' )->value() == true ) :
		return true;
	else :
		return false;
	endif;
}


/**
 * Check if the header product search enable or not
 */
function own_shop_header_product_search_enable( $control ) {
	if ( $control->manager->get_setting( 'own_shop_enable_header_product_search' )->value() == true ) :
		return true;
	else :
		return false;
	endif;
}


/**
 * Check if the header login links enable or not
 */
function own_shop_header_login_links_enable( $control ) {
	if ( $control->manager->get_setting( 'own_shop_enable_header_login_register_links' )->value() == true ) :
		return true;
	else :
		return false;
	endif;
}
