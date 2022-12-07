<?php
/**
 *
 * @package own-shop
 */


if ( ! is_active_sidebar( 'page-sidebar' ) ) :
	return;
endif;

?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'page-sidebar' ); ?>
</aside><!-- #secondary -->

