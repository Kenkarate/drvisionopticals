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

if ( ! function_exists( 'spiraclethemes_site_library_colon_plus_set_import_files' ) ) :
function spiraclethemes_site_library_colon_plus_set_import_files() {

		return array(
        array(
            'import_file_name'           => esc_html__('Colon Plus Demo', 'spiraclethemes-site-library'),
            'import_file_url'          => SPIR_SITE_LIBRARY_URL . 'ocdi/colon-plus/demo1/colonplus-content.xml',
            'import_widget_file_url'   => SPIR_SITE_LIBRARY_URL . 'ocdi/colon-plus/demo1/colonplus-widgets.wie',
            'import_customizer_file_url' => SPIR_SITE_LIBRARY_URL . 'ocdi/colon-plus/demo1/colonplus-customizer.dat',    
            'import_preview_image_url'     => SPIR_SITE_LIBRARY_URL . 'ocdi/colon-plus/demo1/colonplus.jpg',
            'import_notice'              => esc_html__( 'After you import this demo, you will have to change some menu links. Please check documentation for more information', 'spiraclethemes-site-library' ),
            'preview_url'                  => 'https://colonwp.spiraclethemes.com/colonplus/',
        ),
    );
}
endif;
add_filter( 'pt-ocdi/import_files', 'spiraclethemes_site_library_colon_plus_set_import_files' );


/**
 *  After Import
 */

if ( ! function_exists( 'spiraclethemes_site_library_colon_plus_after_import_setup' ) ) :
function spiraclethemes_site_library_colon_plus_after_import_setup( $selected_import ) {
	//Assign menus to their locations
	$main_menu = get_term_by( 'name', 'Primary', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
	      'primary' => $main_menu->term_id,
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
add_action( 'pt-ocdi/after_import', 'spiraclethemes_site_library_colon_plus_after_import_setup' );


function spiraclethemes_site_library_colon_plus_check_pro_plugin() {
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
add_action( 'admin_init', 'spiraclethemes_site_library_colon_plus_check_pro_plugin' );



/**
 * Add CSS.
 */
if ( ! function_exists( 'spiraclethemes_site_library_colon_plus_dynamic_css' ) ) :
function spiraclethemes_site_library_colon_plus_dynamic_css() {
	?>
  		<style type="text/css" id="colon-plus-admin-style">
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
add_action( 'admin_head', 'spiraclethemes_site_library_colon_plus_dynamic_css' );