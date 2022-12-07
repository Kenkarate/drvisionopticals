<?php
/**
 * Theme Customizer Controls
 *
 * @package own-shop
 */


if ( ! function_exists( 'own_shop_customizer_footer_register' ) ) :
function own_shop_customizer_footer_register( $wp_customize ) {
 	
 	$wp_customize->add_section(
        'own_shop_footer_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Footer Settings', 'own-shop' )
        )
    );

    // Title label
	$wp_customize->add_setting( 
		'own_shop_label_footer_settings_title', 
		array(
		    'sanitize_callback' => 'own_shop_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Own_shop_Title_Info_Control( $wp_customize, 'own_shop_label_footer_settings_title', 
		array(
		    'label'       => esc_html__( 'Footer Settings', 'own-shop' ),
		    'section'     => 'own_shop_footer_settings',
		    'type'        => 'own-shop-title',
		    'settings'    => 'own_shop_label_footer_settings_title',
		) 
	));

	// Copyright text
    $wp_customize->add_setting(
        'own_shop_footer_copyright_text',
        array(
            'type' => 'theme_mod',
            'sanitize_callback' => 'own_shop_sanitize_textarea_field'
        )
    );

    $wp_customize->add_control(
        'own_shop_footer_copyright_text',
        array(
            'settings'      => 'own_shop_footer_copyright_text',
            'section'       => 'own_shop_footer_settings',
            'type'          => 'textarea',
            'label'         => esc_html__( 'Footer Copyright Text', 'own-shop' ),
            'description'   => esc_html__( 'Copyright text to be displayed in the footer. No HTML allowed.', 'own-shop' )
        )
    ); 

}
endif;

add_action( 'customize_register', 'own_shop_customizer_footer_register' );