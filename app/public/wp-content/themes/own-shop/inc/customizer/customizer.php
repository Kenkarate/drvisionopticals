<?php
/**
 * Own Shop Theme Customizer
 *
 * @package own-shop
 */


/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

if ( ! function_exists( 'own_shop_customize_register' ) ) :
function own_shop_customize_register( $wp_customize ) {

    // Add custom controls.
    require get_parent_theme_file_path( 'inc/customizer/custom-controls/info/class-info-control.php' );
    require get_parent_theme_file_path( 'inc/customizer/custom-controls/info/class-title-info-control.php' );
    require get_parent_theme_file_path( 'inc/customizer/custom-controls/toggle-button/class-login-designer-toggle-control.php' );
    require get_parent_theme_file_path( 'inc/customizer/custom-controls/radio-images/class-radio-image-control.php' );

    // Register the custom control type.
    $wp_customize->register_control_type( 'Own_Shop_Toggle_Control' );


    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    if ( isset( $wp_customize->selective_refresh ) ) :
        $wp_customize->selective_refresh->add_partial( 'blogname', array(
            'selector'        => '.site-title a',
            'render_callback' => 'own_shop_site_title_callback',
            'fallback_refresh'    => false,
        ) );
        $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
            'selector'        => '.site-description',
            'render_callback' => 'own_shop_site_description_callback',
            'fallback_refresh'    => false, 
        ) );
    endif;

    // Display Site Title and Tagline
    $wp_customize->add_setting( 
        'own_shop_display_site_title_tagline', 
        array(
            'default'           => true,
            'type'              => 'theme_mod',
            'sanitize_callback' => 'own_shop_sanitize_checkbox',
        ) 
    );

    $wp_customize->add_control( 
        new Own_Shop_Toggle_Control( $wp_customize, 'own_shop_display_site_title_tagline', 
        array(
            'label'       => esc_html__( 'Display Site Title and Tagline', 'own-shop' ),
            'section'     => 'title_tagline',
            'type'        => 'own-shop-toggle',
            'settings'    => 'own_shop_display_site_title_tagline',
        ) 
    ));
}
endif;
add_action( 'customize_register', 'own_shop_customize_register' );

//header settings
get_template_part( 'inc/customizer/options/section-header' );

//layout settings
get_template_part( 'inc/customizer/options/section-layout' );

//color settings
get_template_part( 'inc/customizer/options/section-color' );

//blog settings
get_template_part( 'inc/customizer/options/section-blog' );

//shop settings
get_template_part( 'inc/customizer/options/section-shop' );

//page settings
get_template_part( 'inc/customizer/options/section-page' );

//footer settings
get_template_part( 'inc/customizer/options/section-footer' );

//preloader settings
get_template_part( 'inc/customizer/options/section-preloader' );

//misc settings
get_template_part( 'inc/customizer/options/section-misc' );

//customizer helper
get_template_part( 'inc/customizer/customizer-helpers' );

//data sanitization
get_template_part( 'inc/customizer/data-sanitization' );


/**
 * Enqueue the customizer stylesheet.
 */
if ( ! function_exists( 'own_shop_enqueue_customizer_stylesheets' ) ) :
function own_shop_enqueue_customizer_stylesheets() {
    wp_register_style( 'own-shop-customizer-css', get_template_directory_uri() . '/inc/customizer/assets/css/customizer.min.css', NULL, NULL, 'all' );
    wp_enqueue_style( 'own-shop-customizer-css' );
    wp_enqueue_script( 'own-shop-customizer-js', trailingslashit(get_stylesheet_directory_uri()) . 'inc/customizer/assets/js/customizer.js', false, true);
}
endif;
add_action( 'customize_controls_print_styles', 'own_shop_enqueue_customizer_stylesheets' );