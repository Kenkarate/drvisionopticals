<?php
/**
 * @package own-shop
 */

get_header();
own_shop_get_breadcrumbs_content();

?>
<div class="page-title">
    <?php own_shop_before_title_content(); ?>
    <?php own_shop_after_title_content(); ?>
</div>
<div class="<?php echo esc_attr(OWN_SHOP_CONTAINER_CLASS) ?>">
	<div id="primary" class="content-area">
	    <main id="main" class="site-main" role="main">
	    	<div class="content-inner">
	    		<div class="page-content-area">
			        <?php
			            get_template_part( 'template-parts/shop/content', 'woocommerce' );           
			        ?>
		    	</div>
		    </div>
	    </main><!-- #main -->
	</div><!-- #primary -->
</div>

<?php
	get_footer();
?>