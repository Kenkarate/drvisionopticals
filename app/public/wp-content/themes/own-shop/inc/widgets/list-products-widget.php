<?php

/**
 * List products widget.
 */


if( ! class_exists('Own_Shop_List_Products_Widget')) :

class Own_Shop_List_Products_Widget extends WP_Widget {

	var $defaults;
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'own_shop_list_products_widget', // Base ID
			esc_html__( 'Own Shop: List Featured | New | Popular products Widget', 'own-shop' ), // Name
			array( 'description' => esc_html__( 'Adds listing of products. ', 'own-shop'), ) // Args
		);		     
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		extract( wp_parse_args( $instance, $this->defaults ) ); 

		$no_of_products = ( ! empty( $instance['no_of_products'] ) ) ? absint( $instance['no_of_products'] ) : 8;
		$cb_all = isset ( $instance['cb_all'] )  ? (bool)$instance['cb_all'] : false;
		$cb_featured = isset ( $instance['cb_featured'] )  ? (bool)$instance['cb_featured'] : false;
        $cb_new = isset ( $instance['cb_new'] )  ? (bool)$instance['cb_new'] : false;
        $cb_popular = isset ( $instance['cb_popular'] ) ? (bool)$instance['cb_popular'] : false;
        $cb_enable_tabs = isset ( $instance['cb_enable_tabs'] ) ? (bool)$instance['cb_enable_tabs'] : false;

		?>

		<div class="list-products-section">
			<div class="tabbable-panel">
				<div class="tabbable-line">
					<?php
						if( true==$cb_enable_tabs ) :
							?>
								<ul class="nav nav-tabs ">
									<?php
										$tabcount=0;
										if( true==$cb_all ) :
											$tabcount++;
											if($tabcount==1) :
												?><li class="active"><?php
											else :
												?><li><?php
											endif;
											?><a href="#tab_default_<?php echo $tabcount; ?>" data-toggle="tab"><?php echo esc_html_e('All','own-shop'); ?></a></li><?php
										endif;
										if( true==$cb_featured ) :
											$tabcount++;
											if($tabcount==1) :
												?><li class="active"><?php
											else :
												?><li><?php
											endif;
											?><a href="#tab_default_<?php echo $tabcount; ?>" data-toggle="tab"><?php echo esc_html_e('Featured','own-shop'); ?></a></li><?php
										endif;
										if( true==$cb_new ) :
											$tabcount++;
											if($tabcount==1) :
												?><li class="active"><?php
											else :
												?><li><?php
											endif;
											?><a href="#tab_default_<?php echo $tabcount; ?>" data-toggle="tab"><?php echo esc_html_e('New','own-shop'); ?></a></li><?php
										endif;
										if( true==$cb_popular ) :
											$tabcount++;
											if($tabcount==1) :
												?><li class="active"><?php
											else :
												?><li><?php
											endif;
											?><a href="#tab_default_<?php echo $tabcount; ?>" data-toggle="tab"><?php echo esc_html_e('Popular','own-shop'); ?></a></li><?php
										endif;
									?>
								</ul>
							<?php
						endif;
					?>
					<div class="tab-content">
						<?php
							$tabcount=0;
							if( true==$cb_all ) :
								$tabcount++;
								if($tabcount==1) :
									?><div class="tab-pane active" id="tab_default_<?php echo $tabcount; ?>"><?php
								else :
									?><div class="tab-pane" id="tab_default_<?php echo $tabcount; ?>"><?php
								endif;
								?>
									<?php echo do_shortcode('[products limit="'.$no_of_products.'" columns="4"]'); ?>
									</div>
								<?php
							endif;
							if( true==$cb_featured ) :
								$tabcount++;
								if($tabcount==1) :
									?><div class="tab-pane active" id="tab_default_<?php echo $tabcount; ?>"><?php
								else :
									?><div class="tab-pane" id="tab_default_<?php echo $tabcount; ?>"><?php
								endif;
								?>
									<?php echo do_shortcode('[products limit="'.$no_of_products.'" columns="4" visibility="featured"]'); ?>
									</div>
								<?php
							endif;
							if( true==$cb_new ) :
								$tabcount++;
								if($tabcount==1) :
									?><div class="tab-pane active" id="tab_default_<?php echo $tabcount; ?>"><?php
								else :
									?><div class="tab-pane" id="tab_default_<?php echo $tabcount; ?>"><?php
								endif;
								?>
									<?php echo do_shortcode('[products limit="'.$no_of_products.'" columns="4" orderby="id" order="DESC" visibility="visible"]'); ?>
									</div>
								<?php
							endif;
							if( true==$cb_popular ) :
								$tabcount++;
								if($tabcount==1) :
									?><div class="tab-pane active" id="tab_default_<?php echo $tabcount; ?>"><?php
								else :
									?><div class="tab-pane" id="tab_default_<?php echo $tabcount; ?>"><?php
								endif;
								?>	
									<?php echo do_shortcode('[products limit="'.$no_of_products.'" columns="4" best_selling="true" ]'); ?>
									</div>
								<?php
							endif;
						?>
					</div>
				</div>
			</div>
		</div>

		<?php
    }
	
	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
	    $no_of_products = ( ! empty( $instance['no_of_products'] ) ) ? absint( $instance['no_of_products'] ) : 8;
	    $cb_all = isset ( $instance['cb_all'] )  ? (bool)$instance['cb_all'] : false;
		$cb_featured = isset ( $instance['cb_featured'] )  ? (bool)$instance['cb_featured'] : false;
        $cb_new = isset ( $instance['cb_new'] )  ? (bool)$instance['cb_new'] : false;
        $cb_popular = isset ( $instance['cb_popular'] ) ? (bool)$instance['cb_popular'] : false;
        $cb_enable_tabs = isset ( $instance['cb_enable_tabs'] ) ? (bool)$instance['cb_enable_tabs'] : false;

	    ?>   	  	    	
		    
		    <p>
				<label for="<?php echo esc_attr($this->get_field_id( 'no_of_products' )); ?>"><?php esc_html_e( 'Number of Products:', 'own-shop' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('no_of_products')); ?>" name="<?php echo esc_attr($this->get_field_name('no_of_products')); ?>" type="text" value="<?php echo absint( $no_of_products ); ?>">
			</p>

			<p>
				<p><strong><?php esc_html_e('Choose Product Options','own-shop') ?></strong></p>
				<input type="checkbox" id="<?php echo esc_attr($this->get_field_id('cb_all')); ?>" name="<?php echo esc_attr($this->get_field_name('cb_all')); ?>" value="<?php echo esc_attr('all','own-shop'); ?>" <?php checked( true, $cb_all ); ?>>
				<label for="<?php echo esc_attr($this->get_field_id( 'cb_all' )); ?>"><?php esc_html_e('All','own-shop') ?></label><br>

				<input type="checkbox" id="<?php echo esc_attr($this->get_field_id('cb_featured')); ?>" name="<?php echo esc_attr($this->get_field_name('cb_featured')); ?>" value="<?php echo esc_attr('featured','own-shop'); ?>" <?php checked( true, $cb_featured ); ?>>
				<label for="<?php echo esc_attr($this->get_field_id( 'cb_featured' )); ?>"><?php esc_html_e('Featured','own-shop') ?></label><br>

				<input type="checkbox" id="<?php echo esc_attr($this->get_field_id('cb_new')); ?>" name="<?php echo esc_attr($this->get_field_name('cb_new')); ?>" value="<?php echo esc_attr('new','own-shop'); ?>" <?php checked( true, $cb_new ); ?>>
				<label for="<?php echo esc_attr($this->get_field_id( 'cb_new' )); ?>"><?php esc_html_e('New','own-shop') ?></label><br>

				<input type="checkbox" id="<?php echo esc_attr($this->get_field_id('cb_popular')); ?>" name="<?php echo esc_attr($this->get_field_name('cb_popular')); ?>" value="<?php echo esc_attr('popular','own-shop'); ?>" <?php checked( true, $cb_popular ); ?>>
				<label for="<?php echo esc_attr($this->get_field_id( 'cb_popular' )); ?>"><?php esc_html_e('Popular','own-shop') ?></label><br>

			</p>

			<p>
				<p><strong><?php esc_html_e('Show / Hide Tabs','own-shop') ?></strong></p>
				<input type="checkbox" id="<?php echo esc_attr($this->get_field_id('cb_enable_tabs')); ?>" name="<?php echo esc_attr($this->get_field_name('cb_enable_tabs')); ?>" value="<?php echo esc_attr('enable_tabs','own-shop'); ?>" <?php checked( true, $cb_enable_tabs ); ?>>
				<label for="<?php echo esc_attr($this->get_field_id( 'cb_enable_tabs' )); ?>"><?php esc_html_e('Show Tabs','own-shop') ?></label><br>
			</p>
				
    	<?php
         
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;	
		$instance['no_of_products'] = absint( $new_instance['no_of_products'] );
		$instance['cb_all'] = isset ( $new_instance['cb_all'] ) ? (bool)$new_instance['cb_all'] : false;
		$instance['cb_featured'] = isset ( $new_instance['cb_featured'] ) ? (bool)$new_instance['cb_featured'] : false;
		$instance['cb_new'] = isset ( $new_instance['cb_new'] ) ? (bool)$new_instance['cb_new'] : false;
		$instance['cb_popular'] = isset ( $new_instance['cb_popular'] ) ? (bool)$new_instance['cb_popular'] : false;
		$instance['cb_enable_tabs'] = isset ( $new_instance['cb_enable_tabs'] ) ? (bool)$new_instance['cb_enable_tabs'] : false;
    	return $instance;
	}

}
endif;

if( ! function_exists('own_shop_register_list_products_widget')) :
// register widget
function own_shop_register_list_products_widget() {
    register_widget( 'Own_Shop_List_Products_Widget' );
}
endif;

add_action( 'widgets_init', 'own_shop_register_list_products_widget' );
