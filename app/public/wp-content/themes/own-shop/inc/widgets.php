<?php
/**
 * 
 * @package own-shop
 */


/**
 * Load List Products Widget
 */
if ( own_shop_is_active_woocommerce() ) :
	require get_template_directory() . '/inc/widgets/list-products-widget.php';
endif;


/**
 * Load Blog Section Widget
 */
require get_template_directory() . '/inc/widgets/blog-section-widget.php';


/**
 * Load Footer Social Icons Widget
 */
require get_template_directory() . '/inc/widgets/footer-social-icons-widget.php';
