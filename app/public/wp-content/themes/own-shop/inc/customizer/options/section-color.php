<?php
/**
 * Theme Customizer Controls
 *
 * @package own-shop
 */


if ( ! function_exists( 'own_shop_customizer_color_register' ) ) :
function own_shop_customizer_color_register( $wp_customize ) {
 
 	$wp_customize->add_section(
        'own_shop_color_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Color Settings', 'own-shop' )
        )
    );

    // Title label
	$wp_customize->add_setting( 
		'own_shop_label_color_settings_title', 
		array(
		    'sanitize_callback' => 'own_shop_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Own_shop_Title_Info_Control( $wp_customize, 'own_shop_label_color_settings_title', 
		array(
		    'label'       => esc_html__( 'Color Settings', 'own-shop' ),
		    'section'     => 'own_shop_color_settings',
		    'type'        => 'own-shop-title',
		    'settings'    => 'own_shop_label_color_settings_title',
		) 
	));

	// Primary color
    $wp_customize->add_setting(
        'own_shop_site_primary_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#ed516c',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        	$wp_customize,
        	'own_shop_site_primary_color',
	        array(
	        	'label'      => esc_html__( 'Primary Color', 'own-shop' ),
	        	'section'    => 'own_shop_color_settings',
	        	'settings'   => 'own_shop_site_primary_color',
	        )
	    )
    );

    // Secondary color
    $wp_customize->add_setting(
        'own_shop_site_secondary_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#ca2e49',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        	$wp_customize,
        	'own_shop_site_secondary_color',
	        array(
	        	'label'      => esc_html__( 'Secondary Color', 'own-shop' ),
	        	'section'    => 'own_shop_color_settings',
	        	'settings'   => 'own_shop_site_secondary_color',
	        )
	    )
    );

}
endif;

add_action( 'customize_register', 'own_shop_customizer_color_register' );