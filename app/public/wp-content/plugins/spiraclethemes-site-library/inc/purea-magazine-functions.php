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

if ( ! function_exists( 'spiraclethemes_site_library_purea_magazine_set_import_files' ) ) :
function spiraclethemes_site_library_purea_magazine_set_import_files() {
    
	return array(
        array(
            'import_file_name'           => esc_html__('Demo 1', 'spiraclethemes-site-library'),
            'import_file_url'          => SPIR_SITE_LIBRARY_URL . 'ocdi/purea-magazine/demo1/demo1-content.xml',
            'import_widget_file_url'   => SPIR_SITE_LIBRARY_URL . 'ocdi/purea-magazine/demo1/demo1-widgets.wie',
            'import_customizer_file_url' => SPIR_SITE_LIBRARY_URL . 'ocdi/purea-magazine/demo1/demo1-customizer.dat',    
            'import_preview_image_url'     => SPIR_SITE_LIBRARY_URL . 'ocdi/purea-magazine/demo1/demo1.jpg',
            'import_notice'              => esc_html__( 'After you import this demo, you will have to change some menu links. Please check documentation for more information', 'spiraclethemes-site-library' ),
            'preview_url'                  => 'https://pureamagwp.spiraclethemes.com/demo1/',
        ),
        array(
            'import_file_name'           => esc_html__('Demo 2', 'spiraclethemes-site-library'),
            'import_file_url'          => SPIR_SITE_LIBRARY_URL . 'ocdi/purea-magazine/demo2/demo2-content.xml',
            'import_widget_file_url'   => SPIR_SITE_LIBRARY_URL . 'ocdi/purea-magazine/demo2/demo2-widgets.wie',
            'import_customizer_file_url' => SPIR_SITE_LIBRARY_URL . 'ocdi/purea-magazine/demo2/demo2-customizer.dat',    
            'import_preview_image_url'     => SPIR_SITE_LIBRARY_URL . 'ocdi/purea-magazine/demo2/demo2.jpg',
            'import_notice'              => esc_html__( 'After you import this demo, you will have to change some menu links. Please check documentation for more information', 'spiraclethemes-site-library' ),
            'preview_url'                  => 'https://pureamagwp.spiraclethemes.com/demo2/',
        ),
        
    );
}
endif;
add_filter( 'pt-ocdi/import_files', 'spiraclethemes_site_library_purea_magazine_set_import_files' );



if ( ! function_exists( 'spiraclethemes_site_library_purea_magazine_after_import_setup' ) ) :
function spiraclethemes_site_library_purea_magazine_after_import_setup( $selected_import ) {
	//Assign menus to their locations
	$main_menu = get_term_by( 'name', 'Primary', 'nav_menu' );
	$footer_menu = get_term_by( 'name', 'Footer', 'nav_menu' );
	$sidebar_social_menu = get_term_by( 'name', 'Social Menu', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
	      'primary' => $main_menu->term_id,
	      'footer' => $footer_menu->term_id,
	      'social' => $sidebar_social_menu->term_id,
	    )
	);

    //Assign front & blog page
    $front_page = get_page_by_title( 'Home' );  

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page -> ID );
    
}
endif;
add_action( 'pt-ocdi/after_import', 'spiraclethemes_site_library_purea_magazine_after_import_setup' );


/**
 * Add CSS.
 */
if ( ! function_exists( 'spiraclethemes_site_library_purea_magazine_dynamic_css' ) ) :
function spiraclethemes_site_library_purea_magazine_dynamic_css() {
	?>
  		<style type="text/css" id="purea-magazine-admin-style">
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
add_action( 'admin_head', 'spiraclethemes_site_library_purea_magazine_dynamic_css' );