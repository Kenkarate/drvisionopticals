<?php
/**
 *
 * @package spiraclethemes-site-library
 */


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) :
    die;
endif;


/**
 *  Set Import files
 */

if ( ! function_exists( 'spiraclethemes_site_library_own_store_set_import_files' ) ) :
function spiraclethemes_site_library_own_store_set_import_files() {

		return array(
        array(
            'import_file_name'           => esc_html__('Own Store Demo', 'spiraclethemes-site-library'),
            'import_file_url'          => SPIR_SITE_LIBRARY_URL . 'ocdi/own-store/demo1/ownstore-content.xml',
            'import_widget_file_url'   => SPIR_SITE_LIBRARY_URL . 'ocdi/own-store/demo1/ownstore-widgets.wie',
            'import_customizer_file_url' => SPIR_SITE_LIBRARY_URL . 'ocdi/own-store/demo1/ownstore-customizer.dat',    
            'import_preview_image_url'     => SPIR_SITE_LIBRARY_URL . 'ocdi/own-store/demo1/ownstore.jpg',
            'import_notice'              => esc_html__( 'After you import this demo, you will have to change some menu links. Please check documentation for more information', 'spiraclethemes-site-library' ),
            'preview_url'                  => 'https://ownshopwp.spiraclethemes.com/ownstore/',
        ),
    );
}
endif;
add_filter( 'pt-ocdi/import_files', 'spiraclethemes_site_library_own_store_set_import_files' );


/**
 *  After Import
 */

if ( ! function_exists( 'spiraclethemes_site_library_own_store_after_import_setup' ) ) :
function spiraclethemes_site_library_own_store_after_import_setup( $selected_import ) {
	//Assign menus to their locations
	$main_menu = get_term_by( 'name', 'Primary', 'nav_menu' );
	$category_menu = get_term_by( 'name', 'Category Menu', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
	      'primary' => $main_menu->term_id,
	      'categorymenu' => $category_menu->term_id,
	    )
	);

    //Assign front & blog page
    $front_page = get_page_by_title( 'Home' );  
    $blog_page = get_page_by_title( 'Blog' );  

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page -> ID );    
    update_option( 'page_for_posts', $blog_page -> ID ); 
    
}
endif;
add_action( 'pt-ocdi/after_import', 'spiraclethemes_site_library_own_store_after_import_setup' );


function spiraclethemes_site_library_own_store_check_pro_plugin() {
    if ( ! function_exists( 'ocdi_register_plugins' ) ) :
        function ocdi_register_plugins( $plugins ) {
         
            // List of plugins used by all theme demos.
            $theme_plugins = [
                [ 
                  'name'     => 'Elementor Website Builder',
                  'slug'     => 'elementor',
                  'required' => true,
                ],
                [ 
                  'name'     => 'Contact Form 7',
                  'slug'     => 'contact-form-7',
                  'required' => true,
                ],
            ];
         
            return array_merge( $plugins, $theme_plugins );
        }
    endif;
    add_filter( 'ocdi/register_plugins', 'ocdi_register_plugins' );
}
add_action( 'admin_init', 'spiraclethemes_site_library_own_store_check_pro_plugin' );



/**
 * Add CSS.
 */
if ( ! function_exists( 'spiraclethemes_site_library_own_store_dynamic_css' ) ) :
function spiraclethemes_site_library_own_store_dynamic_css() {
	?>
  		<style type="text/css" id="own-shop-admin-style">
    		.ocdi-install-plugins-content-content label:nth-child(-n+3) {
				display: none !important;
			}

			.ocdi-install-plugins-content-content .ocdi-content-notice--warning {
				display: none;
			}
  		</style>
	<?php 
}
endif;
add_action( 'admin_head', 'spiraclethemes_site_library_own_store_dynamic_css' );