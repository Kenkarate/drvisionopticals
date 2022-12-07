<?php
/**
 * Theme Customizer Controls
 *
 * @package own-shop
 */


if ( ! function_exists( 'own_shop_customizer_layout_register' ) ) :
function own_shop_customizer_layout_register( $wp_customize ) {
 
 	$wp_customize->add_section(
        'own_shop_layout_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Layout Settings', 'own-shop' )
        )
    );

    // Title label
	$wp_customize->add_setting( 
		'own_shop_label_layout_settings_title', 
		array(
		    'sanitize_callback' => 'own_shop_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Own_shop_Title_Info_Control( $wp_customize, 'own_shop_label_layout_settings_title', 
		array(
		    'label'       => esc_html__( 'Content Width Settings', 'own-shop' ),
		    'section'     => 'own_shop_layout_settings',
		    'type'        => 'own-shop-title',
		    'settings'    => 'own_shop_label_layout_settings_title',
		) 
	));

	//Layout options
    $wp_customize->add_setting(
        'own_shop_layout_content_width_ratio',
        array(
            'type' => 'theme_mod',
            'default'           => 'os-container',
            'sanitize_callback' => 'own_shop_layout_content_width_options_selection'
        )
    );

    $wp_customize->add_control(
        'own_shop_layout_content_width_ratio',
        array(
            'settings'      => 'own_shop_layout_content_width_ratio',
            'section'       => 'own_shop_layout_settings',
            'type'          => 'radio',
            'label'         => esc_html__( 'Choose Content Width Option:', 'own-shop' ),
            'choices' => array(
            	'os-container' => esc_html__('1350px (default)', 'own-shop'),
            	'container' => esc_html__('1170px', 'own-shop'),
            ),
        )
    );

    // Info label
    $wp_customize->add_setting( 
        'own_shop_layout_width_ratio_label', 
        array(
            'sanitize_callback' => 'own_shop_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Own_Shop_Info_Control( $wp_customize, 'own_shop_layout_width_ratio_label', 
        array(
            'label'       => esc_html__( 'You might need to refresh the page to see the changes', 'own-shop' ),
            'section'     => 'own_shop_layout_settings',
            'type'        => 'own-shop-info',
            'settings'    => 'own_shop_layout_width_ratio_label',
            'active_callback' => '',
        ) 
    ));

    // Info label
    $wp_customize->add_setting( 
        'own_shop_layout_width_ratio_doc_check', 
        array(
            'sanitize_callback' => 'own_shop_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Own_Shop_Info_Control( $wp_customize, 'own_shop_layout_width_ratio_doc_check', 
        array(
            'label'       => esc_html__( 'NOTE: Please refer to the online documentation ("How to Set Page Width in Elementor ?") also after you change this setting', 'own-shop' ),
            'section'     => 'own_shop_layout_settings',
            'type'        => 'own-shop-info',
            'settings'    => 'own_shop_layout_width_ratio_doc_check',
            'active_callback' => '',
        ) 
    ));

}
endif;

add_action( 'customize_register', 'own_shop_customizer_layout_register' );