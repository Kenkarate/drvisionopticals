<?php
/**
 * Theme Customizer Controls
 *
 * @package own-shop
 */


if ( ! function_exists( 'own_shop_customizer_page_register' ) ) :
function own_shop_customizer_page_register( $wp_customize ) {
 
 	$wp_customize->add_section(
        'own_shop_page_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Pages Settings', 'own-shop' )
        )
    );

    // Title label
	$wp_customize->add_setting( 
		'own_shop_label_page_settings_title', 
		array(
		    'sanitize_callback' => 'own_shop_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Own_shop_Title_Info_Control( $wp_customize, 'own_shop_label_page_settings_title', 
		array(
		    'label'       => esc_html__( 'Page Settings', 'own-shop' ),
		    'section'     => 'own_shop_page_settings',
		    'type'        => 'own-shop-title',
		    'settings'    => 'own_shop_label_page_settings_title',
		) 
	));

	// Add an option to enable the page title
	$wp_customize->add_setting( 
		'own_shop_enable_page_title', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'own_shop_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Own_shop_Toggle_Control( $wp_customize, 'own_shop_enable_page_title', 
		array(
		    'label'       => esc_html__( 'Show Page Title', 'own-shop' ),
		    'section'     => 'own_shop_page_settings',
		    'type'        => 'own-shop-toggle',
		    'settings'    => 'own_shop_enable_page_title',
		) 
	));

	// Add an option to enable the page title background
	$wp_customize->add_setting( 
		'own_shop_enable_page_title_bg', 
		array(
		    'default'           => false,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'own_shop_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Own_shop_Toggle_Control( $wp_customize, 'own_shop_enable_page_title_bg', 
		array(
		    'label'       => esc_html__( 'Show Page Title background', 'own-shop' ),
		    'section'     => 'own_shop_page_settings',
		    'type'        => 'own-shop-toggle',
		    'settings'    => 'own_shop_enable_page_title_bg',
		    'active_callback' => 'own_shop_page_title_enable',
		) 
	));

	// Title label
	$wp_customize->add_setting( 
		'own_shop_label_page_sidebar_settings', 
		array(
		    'sanitize_callback' => 'own_shop_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Own_shop_Title_Info_Control( $wp_customize, 'own_shop_label_page_sidebar_settings', 
		array(
		    'label'       => esc_html__( 'Sidebar Settings', 'own-shop' ),
		    'section'     => 'own_shop_page_settings',
		    'type'        => 'own-shop-title',
		    'settings'    => 'own_shop_label_page_sidebar_settings',
		) 
	));

	// Add an option to enable the page sidebar
	$wp_customize->add_setting( 
		'own_shop_enable_page_sidebar', 
		array(
		    'default'           => false,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'own_shop_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Own_shop_Toggle_Control( $wp_customize, 'own_shop_enable_page_sidebar', 
		array(
		    'label'       => esc_html__( 'Show Sidebar', 'own-shop' ),
		    'section'     => 'own_shop_page_settings',
		    'type'        => 'own-shop-toggle',
		    'settings'    => 'own_shop_enable_page_sidebar',
		) 
	));

	// Sidebar layout
    $wp_customize->add_setting(
        'own_shop_page_sidebar_layout',
        array(
            'default'			=> 'no',
            'type'				=> 'theme_mod',
            'capability'		=> 'edit_theme_options',
            'sanitize_callback'	=> 'own_shop_sanitize_select',
        )
    );
    $wp_customize->add_control(
        new Own_shop_Radio_Image_Control( $wp_customize,'own_shop_page_sidebar_layout',
            array(
                'settings'		=> 'own_shop_page_sidebar_layout',
                'section'		=> 'own_shop_page_settings',
                'label'			=> esc_html__( 'Sidebar Layout', 'own-shop' ),
                'choices'		=> array(
                    'right'	        => OWN_SHOP_DIR_URI . '/inc/customizer/assets/images/cr.png',
                    'left' 	        => OWN_SHOP_DIR_URI . '/inc/customizer/assets/images/cl.png',
                    'no' 	        => OWN_SHOP_DIR_URI . '/inc/customizer/assets/images/cn.png',
                ),
                'active_callback' => 'own_shop_page_sidebar_enable',
            )
        )
    );

}
endif;

add_action( 'customize_register', 'own_shop_customizer_page_register' );