<?php
/**
 *
 * @package own-shop
 */

//Return if the first widget area has no widgets
if ( !is_active_sidebar( 'footer-1' ) ) {
	return;
} ?>

<?php //user selected widget columns

	$own_shop_widget_num = esc_html(get_theme_mod('own_shop_footer_widgets', '3-wide'));

	if ($own_shop_widget_num == '3-wide') :
		$own_shop_col1 = 'col-md-3';
		$own_shop_col2 = 'col-md-3';
		$own_shop_col3 = 'col-md-6 align-right';
	elseif ($own_shop_widget_num == '4') :
		$own_shop_col1 = 'col-md-3';
		$own_shop_col2 = 'col-md-3';
		$own_shop_col3 = 'col-md-3';
		$own_shop_col4 = 'col-md-3';
	elseif ($own_shop_widget_num == '3') :
		$own_shop_col1 = 'col-md-4';
		$own_shop_col2 = 'col-md-4';
		$own_shop_col3 = 'col-md-4';
	elseif ($own_shop_widget_num == '2') :
		$own_shop_col1 = 'col-md-6';
		$own_shop_col2 = 'col-md-6';
	else :
		$own_shop_col1 = 'col-md-12';
	endif;
?>
		
<?php 
	if ( is_active_sidebar( 'footer-1' ) ) :
		?>
			<div class="widget-column <?php echo esc_attr($own_shop_col1); ?>">
				<?php dynamic_sidebar( 'footer-1'); ?>
			</div>
		<?php
	endif;
	if ( is_active_sidebar( 'footer-2' ) ) :
		?>
			<div class="widget-column <?php echo esc_attr($own_shop_col2); ?>">
				<?php dynamic_sidebar( 'footer-2'); ?>
			</div>
		<?php
	endif;
	if ( is_active_sidebar( 'footer-3' ) ) :
		?>
			<div class="widget-column <?php echo esc_attr($own_shop_col3); ?>">
				<?php dynamic_sidebar( 'footer-3'); ?>
			</div>
		<?php
	endif;
	if ( is_active_sidebar( 'footer-4' ) ) :
		?>
			<div class="widget-column <?php echo esc_attr($own_shop_col4); ?>">
				<?php dynamic_sidebar( 'footer-4'); ?>
			</div>
		<?php
	endif;
?>