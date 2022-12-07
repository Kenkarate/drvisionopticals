<?php
/**
 * Theme Customizer Controls
 *
 * @package own-shop
 */


if ( ! function_exists( 'own_shop_customizer_misc_register' ) ) :
function own_shop_customizer_misc_register( $wp_customize ) {
 
 	$wp_customize->add_section(
        'own_shop_misc_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Misc Settings', 'own-shop' )
        )
    );

    // Title label
	$wp_customize->add_setting( 
		'own_shop_label_wbe_settings_title', 
		array(
		    'sanitize_callback' => 'own_shop_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Own_shop_Title_Info_Control( $wp_customize, 'own_shop_label_wbe_settings_title', 
		array(
		    'label'       => esc_html__( 'Widgets Block Editor Settings', 'own-shop' ),
		    'section'     => 'own_shop_misc_settings',
		    'type'        => 'own-shop-title',
		    'settings'    => 'own_shop_label_wbe_settings_title',
		) 
	));

	// Add an option to disable the widgets block editor
	$wp_customize->add_setting( 
		'own_shop_disable_widgets_block_editor', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'own_shop_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Own_shop_Toggle_Control( $wp_customize, 'own_shop_disable_widgets_block_editor', 
		array(
		    'label'       => esc_html__( 'Disable Widgets Block Editor', 'own-shop' ),
		    'section'     => 'own_shop_misc_settings',
		    'type'        => 'own-shop-toggle',
		    'settings'    => 'own_shop_disable_widgets_block_editor',
		) 
	));

}
endif;

add_action( 'customize_register', 'own_shop_customizer_misc_register' );