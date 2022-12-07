<?php
/**
 * Template part for displaying woocommerce content in page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package own-shop
 */

?>


<div class="row">
	<?php 
		if("right" === esc_html(get_theme_mod( 'own_shop_shop_page_sidebar_layout','right' ))) :
			if ( is_active_sidebar('woosidebar')) :
				?>
					<div id="woo-products-wrapper" class="col-md-9">
						<div class="entry-content">
							<div class="woocommerce">
								<?php
									woocommerce_content();
								?>
							</div>					
						</div><!-- .entry-content -->
					</div>
					<div id="woo-sidebar-wrapper" class="col-md-3">
						<div class="woo-sidebar">
							<div class="entry-content">
								<div class="woocommerce">
									<?php get_sidebar('woosidebar'); ?>
								</div>
							</div>
						</div>
					</div>
				<?php
			else:
				?>
					<div id="woo-products-wrapper" class="col-md-12">
						<div class="entry-content">
							<div class="woocommerce">
								<?php
									woocommerce_content();						
								?>
							</div>					
						</div><!-- .entry-content -->
					</div>
				<?php
			endif;
		elseif("left" === esc_html(get_theme_mod( 'own_shop_shop_page_sidebar_layout','right' ))) :
			if ( is_active_sidebar('woosidebar')) :
				?>
					<div id="woo-sidebar-wrapper" class="col-md-3">
						<div class="woo-sidebar">
							<div class="entry-content">
								<div class="woocommerce">
									<?php get_sidebar('woosidebar'); ?>
								</div>
							</div>
						</div>
					</div>
					<div id="woo-products-wrapper" class="col-md-9">
						<div class="entry-content">
							<div class="woocommerce">
								<?php
									woocommerce_content();						
								?>
							</div>					
						</div><!-- .entry-content -->
					</div>
				<?php
			else:
				?>
					<div id="woo-products-wrapper" class="col-md-12">
						<div class="entry-content">
							<div class="woocommerce">
								<?php
									woocommerce_content();						
								?>
							</div>					
						</div><!-- .entry-content -->
					</div>
				<?php
			endif;
		else :
			?>
				<div id="woo-products-wrapper" class="col-md-12">
					<div class="entry-content">
						<div class="woocommerce">
							<?php
								woocommerce_content();						
							?>
						</div>					
					</div><!-- .entry-content -->
				</div>
			<?php		
		endif;
	?>
	
</div>



