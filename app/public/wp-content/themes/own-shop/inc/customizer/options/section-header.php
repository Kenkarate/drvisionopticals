<?php
/**
 * Theme Customizer Controls
 *
 * @package own-shop
 */


if ( ! function_exists( 'own_shop_customizer_header_register' ) ) :
function own_shop_customizer_header_register( $wp_customize ) {

	$wp_customize->add_panel(
        'own_shop_header_settings_panel',
        array (
            'priority'      => 30,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Header Settings', 'own-shop' ),
        )
    );

	// Section Top bar ===================================================
    $wp_customize->add_section(
        'own_shop_header_topbar_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Top Bar', 'own-shop' ),
            'panel'          => 'own_shop_header_settings_panel',
        )
    ); 

    // Title label
	$wp_customize->add_setting( 
		'own_shop_label_header_topbar_show', 
		array(
		    'sanitize_callback' => 'own_shop_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Own_shop_Title_Info_Control( $wp_customize, 'own_shop_label_header_topbar_show', 
		array(
		    'label'       => esc_html__( 'Top Bar Settings', 'own-shop' ),
		    'section'     => 'own_shop_header_topbar_settings',
		    'type'        => 'own-shop-title',
		    'settings'    => 'own_shop_label_header_topbar_show',
		) 
	));

	// Add an option to enable the top bar
	$wp_customize->add_setting( 
		'own_shop_enable_header_topbar', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'own_shop_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Own_shop_Toggle_Control( $wp_customize, 'own_shop_enable_header_topbar', 
		array(
		    'label'       => esc_html__( 'Show Topbar', 'own-shop' ),
		    'section'     => 'own_shop_header_topbar_settings',
		    'type'        => 'own-shop-toggle',
		    'settings'    => 'own_shop_enable_header_topbar',
		) 
	));

	// Info label
    $wp_customize->add_setting( 
        'own_shop_label_top_bar_info', 
        array(
            'sanitize_callback' => 'own_shop_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Own_Shop_Info_Control( $wp_customize, 'own_shop_label_top_bar_info', 
        array(
            'label'       => esc_html__( 'To show top bar links, Go to Appearance -> Menus and create a new menu and add links to it and select Top Bar as display location to make it a top bar menu', 'own-shop' ),
            'section'     => 'own_shop_header_topbar_settings',
            'type'        => 'own-shop-info',
            'settings'    => 'own_shop_label_top_bar_info',
            'active_callback' => 'own_shop_header_topbar_enable',
        ) 
    ));


    if ( own_shop_is_active_woocommerce() ) :

		// Section Category Menu ===================================================
	    $wp_customize->add_section(
	        'own_shop_header_category_menu_settings',
	        array (
	            'priority'      => 25,
	            'capability'    => 'edit_theme_options',
	            'title'         => esc_html__( 'Category Menu', 'own-shop' ),
	            'panel'          => 'own_shop_header_settings_panel',
	        )
	    ); 

	    // Title label
		$wp_customize->add_setting( 
			'own_shop_label_header_category_menu_show', 
			array(
			    'sanitize_callback' => 'own_shop_sanitize_title',
			) 
		);

		$wp_customize->add_control( 
			new Own_shop_Title_Info_Control( $wp_customize, 'own_shop_label_header_category_menu_show', 
			array(
			    'label'       => esc_html__( 'Category Menu Settings', 'own-shop' ),
			    'section'     => 'own_shop_header_category_menu_settings',
			    'type'        => 'own-shop-title',
			    'settings'    => 'own_shop_label_header_category_menu_show',
			) 
		));

		// Add an option to enable the category menu
		$wp_customize->add_setting( 
			'own_shop_enable_header_category_menu', 
			array(
			    'default'           => true,
			    'type'              => 'theme_mod',
			    'sanitize_callback' => 'own_shop_sanitize_checkbox',
			) 
		);

		$wp_customize->add_control( 
			new Own_shop_Toggle_Control( $wp_customize, 'own_shop_enable_header_category_menu', 
			array(
			    'label'       => esc_html__( 'Show Category Menu', 'own-shop' ),
			    'section'     => 'own_shop_header_category_menu_settings',
			    'type'        => 'own-shop-toggle',
			    'settings'    => 'own_shop_enable_header_category_menu',
			) 
		));

		// Title label
		$wp_customize->add_setting( 
			'own_shop_label_header_category_menu_heading', 
			array(
			    'sanitize_callback' => 'own_shop_sanitize_title',
			) 
		);

		$wp_customize->add_control( 
			new Own_shop_Title_Info_Control( $wp_customize, 'own_shop_label_header_category_menu_heading', 
			array(
			    'label'       => esc_html__( 'Category Menu Heading', 'own-shop' ),
			    'section'     => 'own_shop_header_category_menu_settings',
			    'type'        => 'own-shop-title',
			    'settings'    => 'own_shop_label_header_category_menu_heading',
			    'active_callback' => 'own_shop_header_product_category_menu_enable',
			) 
		));

		// Add category heading text
	    $wp_customize->add_setting(
	        'own_shop_header_category_heading_text',
	        array(
	            'type' => 'theme_mod',
	            'default'           => esc_html__( 'All Departments', 'own-shop' ),
	            'sanitize_callback' => 'own_shop_sanitize_text_field',
	        )
	    );

	    $wp_customize->add_control(
	        'own_shop_header_category_heading_text',
	        array(
	            'settings'      => 'own_shop_header_category_heading_text',
	            'section'       => 'own_shop_header_category_menu_settings',
	            'type'          => 'textbox',
	            'label'         => esc_html__( 'Category Menu Heading', 'own-shop' ),
	            'active_callback' => 'own_shop_header_product_category_menu_enable',
	        )
	    );

		// Info label
	    $wp_customize->add_setting( 
	        'own_shop_label_header_product_custom_menu_info', 
	        array(
	            'sanitize_callback' => 'own_shop_sanitize_title',
	        ) 
	    );

	    $wp_customize->add_control( 
	        new Own_Shop_Info_Control( $wp_customize, 'own_shop_label_header_product_custom_menu_info', 
	        array(
	            'label'       => esc_html__( 'To show the menu, Please first create a new menu ( Appearance -> Menus ) and then set its display location to "Category Menu". You can create a menu up to 3 nested levels.', 'own-shop' ),
	            'section'     => 'own_shop_header_category_menu_settings',
	            'type'        => 'own-shop-info',
	            'settings'    => 'own_shop_label_header_product_custom_menu_info',
	            'active_callback'  => 'own_shop_header_product_custom_menu_enable',
	        ) 
	    ));


		// Section Product Search ===================================================
	    $wp_customize->add_section(
	        'own_shop_header_product_search_settings',
	        array (
	            'priority'      => 25,
	            'capability'    => 'edit_theme_options',
	            'title'         => esc_html__( 'Product Search', 'own-shop' ),
	            'panel'          => 'own_shop_header_settings_panel',
	        )
	    ); 

	    // Title label
		$wp_customize->add_setting( 
			'own_shop_label_header_product_search_show', 
			array(
			    'sanitize_callback' => 'own_shop_sanitize_title',
			) 
		);

		$wp_customize->add_control( 
			new Own_shop_Title_Info_Control( $wp_customize, 'own_shop_label_header_product_search_show', 
			array(
			    'label'       => esc_html__( 'Product Search Settings', 'own-shop' ),
			    'section'     => 'own_shop_header_product_search_settings',
			    'type'        => 'own-shop-title',
			    'settings'    => 'own_shop_label_header_product_search_show',
			) 
		));

		// Add an option to enable the product search
		$wp_customize->add_setting( 
			'own_shop_enable_header_product_search', 
			array(
			    'default'           => true,
			    'type'              => 'theme_mod',
			    'sanitize_callback' => 'own_shop_sanitize_checkbox',
			) 
		);

		$wp_customize->add_control( 
			new Own_shop_Toggle_Control( $wp_customize, 'own_shop_enable_header_product_search', 
			array(
			    'label'       => esc_html__( 'Show Product Search', 'own-shop' ),
			    'section'     => 'own_shop_header_product_search_settings',
			    'type'        => 'own-shop-toggle',
			    'settings'    => 'own_shop_enable_header_product_search',
			) 
		));

		// Title label
		$wp_customize->add_setting( 
			'own_shop_label_header_product_search_placeholder', 
			array(
			    'sanitize_callback' => 'own_shop_sanitize_title',
			) 
		);

		$wp_customize->add_control( 
			new Own_shop_Title_Info_Control( $wp_customize, 'own_shop_label_header_product_search_placeholder', 
			array(
			    'label'       => esc_html__( 'Search placeholder Settings', 'own-shop' ),
			    'section'     => 'own_shop_header_product_search_settings',
			    'type'        => 'own-shop-title',
			    'settings'    => 'own_shop_label_header_product_search_placeholder',
			    'active_callback' => 'own_shop_header_product_search_enable',
			) 
		));

		// Add placeholder for search
	    $wp_customize->add_setting(
	        'own_shop_header_product_search_placeholder',
	        array(
	            'type' => 'theme_mod',
	            'default'           => esc_html__( 'Search for products', 'own-shop' ),
	            'sanitize_callback' => 'own_shop_sanitize_text_field',
	        )
	    );

	    $wp_customize->add_control(
	        'own_shop_header_product_search_placeholder',
	        array(
	            'settings'      => 'own_shop_header_product_search_placeholder',
	            'section'       => 'own_shop_header_product_search_settings',
	            'type'          => 'textbox',
	            'label'         => esc_html__( 'Placeholder Text', 'own-shop' ),
	            'active_callback' => 'own_shop_header_product_search_enable',
	        )
	    );

	    // Title label
		$wp_customize->add_setting( 
			'own_shop_label_header_product_cat_placeholder', 
			array(
			    'sanitize_callback' => 'own_shop_sanitize_title',
			) 
		);

		$wp_customize->add_control( 
			new Own_shop_Title_Info_Control( $wp_customize, 'own_shop_label_header_product_cat_placeholder', 
			array(
			    'label'       => esc_html__( 'Category placeholder Settings', 'own-shop' ),
			    'section'     => 'own_shop_header_product_search_settings',
			    'type'        => 'own-shop-title',
			    'settings'    => 'own_shop_label_header_product_cat_placeholder',
			    'active_callback' => 'own_shop_header_product_search_enable',
			) 
		));

		// Add placeholder for category
	    $wp_customize->add_setting(
	        'own_shop_header_product_category_placeholder',
	        array(
	            'type' => 'theme_mod',
	            'default'           => esc_html__( '--All Categories--', 'own-shop' ),
	            'sanitize_callback' => 'own_shop_sanitize_text_field',
	        )
	    );

	    $wp_customize->add_control(
	        'own_shop_header_product_category_placeholder',
	        array(
	            'settings'      => 'own_shop_header_product_category_placeholder',
	            'section'       => 'own_shop_header_product_search_settings',
	            'type'          => 'textbox',
	            'label'         => esc_html__( 'Placeholder Text', 'own-shop' ),
	            'active_callback' => 'own_shop_header_product_search_enable',
	        )
	    );

	     // Title label
		$wp_customize->add_setting( 
			'own_shop_label_header_product_search_button', 
			array(
			    'sanitize_callback' => 'own_shop_sanitize_title',
			) 
		);

		$wp_customize->add_control( 
			new Own_shop_Title_Info_Control( $wp_customize, 'own_shop_label_header_product_search_button', 
			array(
			    'label'       => esc_html__( 'Button Settings', 'own-shop' ),
			    'section'     => 'own_shop_header_product_search_settings',
			    'type'        => 'own-shop-title',
			    'settings'    => 'own_shop_label_header_product_search_button',
			    'active_callback' => 'own_shop_header_product_search_enable',
			) 
		));

		// Add button text
	    $wp_customize->add_setting(
	        'own_shop_header_product_search_button_text',
	        array(
	            'type' => 'theme_mod',
	            'default'           => esc_html__( 'Search', 'own-shop' ),
	            'sanitize_callback' => 'own_shop_sanitize_text_field',
	        )
	    );

	    $wp_customize->add_control(
	        'own_shop_header_product_search_button_text',
	        array(
	            'settings'      => 'own_shop_header_product_search_button_text',
	            'section'       => 'own_shop_header_product_search_settings',
	            'type'          => 'textbox',
	            'label'         => esc_html__( 'Button Text', 'own-shop' ),
	            'active_callback' => 'own_shop_header_product_search_enable',
	        )
	    );


		// Section Login Links ===================================================
	    $wp_customize->add_section(
	        'own_shop_header_login_register_links_settings',
	        array (
	            'priority'      => 25,
	            'capability'    => 'edit_theme_options',
	            'title'         => esc_html__( 'Login Link', 'own-shop' ),
	            'panel'          => 'own_shop_header_settings_panel',
	        )
	    ); 

	    // Title label
		$wp_customize->add_setting( 
			'own_shop_label_header_login_register_links_show', 
			array(
			    'sanitize_callback' => 'own_shop_sanitize_title',
			) 
		);

		$wp_customize->add_control( 
			new Own_shop_Title_Info_Control( $wp_customize, 'own_shop_label_header_login_register_links_show', 
			array(
			    'label'       => esc_html__( 'Login Link Settings', 'own-shop' ),
			    'section'     => 'own_shop_header_login_register_links_settings',
			    'type'        => 'own-shop-title',
			    'settings'    => 'own_shop_label_header_login_register_links_show',
			) 
		));

		// Add an option to enable the links
		$wp_customize->add_setting( 
			'own_shop_enable_header_login_register_links', 
			array(
			    'default'           => true,
			    'type'              => 'theme_mod',
			    'sanitize_callback' => 'own_shop_sanitize_checkbox',
			) 
		);

		$wp_customize->add_control( 
			new Own_shop_Toggle_Control( $wp_customize, 'own_shop_enable_header_login_register_links', 
			array(
			    'label'       => esc_html__( 'Show Link', 'own-shop' ),
			    'section'     => 'own_shop_header_login_register_links_settings',
			    'type'        => 'own-shop-toggle',
			    'settings'    => 'own_shop_enable_header_login_register_links',
			) 
		));

		// Title label
		$wp_customize->add_setting( 
			'own_shop_label_header_login_link', 
			array(
			    'sanitize_callback' => 'own_shop_sanitize_title',
			) 
		);

		$wp_customize->add_control( 
			new Own_shop_Title_Info_Control( $wp_customize, 'own_shop_label_header_login_link', 
			array(
			    'label'       => esc_html__( 'Login Settings', 'own-shop' ),
			    'section'     => 'own_shop_header_login_register_links_settings',
			    'type'        => 'own-shop-title',
			    'settings'    => 'own_shop_label_header_login_link',
			    'active_callback' => 'own_shop_header_login_links_enable',
			) 
		));

		// Login text
	    $wp_customize->add_setting(
	        'own_shop_header_login_link_text',
	        array(
	            'type' => 'theme_mod',
	            'default'           => esc_html__( 'Sign in', 'own-shop' ),
	            'sanitize_callback' => 'own_shop_sanitize_text_field',
	        )
	    );

	    $wp_customize->add_control(
	        'own_shop_header_login_link_text',
	        array(
	            'settings'      => 'own_shop_header_login_link_text',
	            'section'       => 'own_shop_header_login_register_links_settings',
	            'type'          => 'textbox',
	            'label'         => esc_html__( 'Login Text', 'own-shop' ),
	            'active_callback' => 'own_shop_header_login_links_enable',
	        )
	    );

	    // Title label
		$wp_customize->add_setting( 
			'own_shop_label_header_myaccount_link', 
			array(
			    'sanitize_callback' => 'own_shop_sanitize_title',
			) 
		);

		$wp_customize->add_control( 
			new Own_shop_Title_Info_Control( $wp_customize, 'own_shop_label_header_myaccount_link', 
			array(
			    'label'       => esc_html__( 'Myaccount Settings', 'own-shop' ),
			    'section'     => 'own_shop_header_login_register_links_settings',
			    'type'        => 'own-shop-title',
			    'settings'    => 'own_shop_label_header_myaccount_link',
			    'active_callback' => 'own_shop_header_login_links_enable',
			) 
		));

		// Myaccount text
	    $wp_customize->add_setting(
	        'own_shop_header_myaccount_link_text',
	        array(
	            'type' => 'theme_mod',
	            'default'           => esc_html__( 'My Account', 'own-shop' ),
	            'sanitize_callback' => 'own_shop_sanitize_text_field',
	        )
	    );

	    $wp_customize->add_control(
	        'own_shop_header_myaccount_link_text',
	        array(
	            'settings'      => 'own_shop_header_myaccount_link_text',
	            'section'       => 'own_shop_header_login_register_links_settings',
	            'type'          => 'textbox',
	            'label'         => esc_html__( 'Myaccount Text', 'own-shop' ),
	            'active_callback' => 'own_shop_header_login_links_enable',
	        )
	    );


		// Section Cart ===================================================
	    $wp_customize->add_section(
	        'own_shop_header_menucart_settings',
	        array (
	            'priority'      => 25,
	            'capability'    => 'edit_theme_options',
	            'title'         => esc_html__( 'Cart', 'own-shop' ),
	            'panel'          => 'own_shop_header_settings_panel',
	        )
	    ); 

	    // Title label
		$wp_customize->add_setting( 
			'own_shop_label_header_menucart_show', 
			array(
			    'sanitize_callback' => 'own_shop_sanitize_title',
			) 
		);

		$wp_customize->add_control( 
			new Own_shop_Title_Info_Control( $wp_customize, 'own_shop_label_header_menucart_show', 
			array(
			    'label'       => esc_html__( 'Cart Settings', 'own-shop' ),
			    'section'     => 'own_shop_header_menucart_settings',
			    'type'        => 'own-shop-title',
			    'settings'    => 'own_shop_label_header_menucart_show',
			) 
		));

		// Add an option to enable the menu cart
		$wp_customize->add_setting( 
			'own_shop_enable_header_menucart', 
			array(
			    'default'           => true,
			    'type'              => 'theme_mod',
			    'sanitize_callback' => 'own_shop_sanitize_checkbox',
			) 
		);

		$wp_customize->add_control( 
			new Own_shop_Toggle_Control( $wp_customize, 'own_shop_enable_header_menucart', 
			array(
			    'label'       => esc_html__( 'Show Cart', 'own-shop' ),
			    'section'     => 'own_shop_header_menucart_settings',
			    'type'        => 'own-shop-toggle',
			    'settings'    => 'own_shop_enable_header_menucart',
			) 
		));


		// Title label
		$wp_customize->add_setting( 
			'own_shop_label_header_menucart_text_show', 
			array(
			    'sanitize_callback' => 'own_shop_sanitize_title',
			) 
		);

		$wp_customize->add_control( 
			new Own_shop_Title_Info_Control( $wp_customize, 'own_shop_label_header_menucart_text_show', 
			array(
			    'label'       => esc_html__( 'Cart Text Settings', 'own-shop' ),
			    'section'     => 'own_shop_header_menucart_settings',
			    'type'        => 'own-shop-title',
			    'settings'    => 'own_shop_label_header_menucart_text_show',
			    'active_callback' => 'own_shop_header_menucart_enable',
			) 
		));

		// cart text
	    $wp_customize->add_setting(
	        'own_shop_header_menucart_text',
	        array(
	            'type' => 'theme_mod',
	            'default'           => esc_html__( 'Your Cart', 'own-shop' ),
	            'sanitize_callback' => 'own_shop_sanitize_text_field',
	        )
	    );

	    $wp_customize->add_control(
	        'own_shop_header_menucart_text',
	        array(
	            'settings'      => 'own_shop_header_menucart_text',
	            'section'       => 'own_shop_header_menucart_settings',
	            'type'          => 'textbox',
	            'label'         => esc_html__( 'Cart Text', 'own-shop' ),
	            'active_callback' => 'own_shop_header_menucart_enable',
	        )
	    );

		// Title label
		$wp_customize->add_setting( 
			'own_shop_label_header_menucart_style_show', 
			array(
			    'sanitize_callback' => 'own_shop_sanitize_title',
			) 
		);

		$wp_customize->add_control( 
			new Own_shop_Title_Info_Control( $wp_customize, 'own_shop_label_header_menucart_style_show', 
			array(
			    'label'       => esc_html__( 'Change Cart Style', 'own-shop' ),
			    'section'     => 'own_shop_header_menucart_settings',
			    'type'        => 'own-shop-title',
			    'settings'    => 'own_shop_label_header_menucart_style_show',
			    'active_callback' => 'own_shop_header_menucart_enable',
			) 
		));

		// Add an option to enable the dark style cart
		$wp_customize->add_setting( 
			'own_shop_enable_header_menucart_dark_style', 
			array(
			    'default'           => false,
			    'type'              => 'theme_mod',
			    'sanitize_callback' => 'own_shop_sanitize_checkbox',
			) 
		);

		$wp_customize->add_control( 
			new Own_shop_Toggle_Control( $wp_customize, 'own_shop_enable_header_menucart_dark_style', 
			array(
			    'label'       => esc_html__( 'Change Cart Style to Black', 'own-shop' ),
			    'section'     => 'own_shop_header_menucart_settings',
			    'type'        => 'own-shop-toggle',
			    'settings'    => 'own_shop_enable_header_menucart_dark_style',
			    'active_callback' => 'own_shop_header_menucart_enable',
			) 
		));
	endif;


	// Section Menu ===================================================
    $wp_customize->add_section(
        'own_shop_header_menu_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Menu', 'own-shop' ),
            'panel'          => 'own_shop_header_settings_panel',
        )
    ); 

    // Title label
	$wp_customize->add_setting( 
		'own_shop_label_header_menu_show', 
		array(
		    'sanitize_callback' => 'own_shop_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Own_shop_Title_Info_Control( $wp_customize, 'own_shop_label_header_menu_show', 
		array(
		    'label'       => esc_html__( 'Menu Settings', 'own-shop' ),
		    'section'     => 'own_shop_header_menu_settings',
		    'type'        => 'own-shop-title',
		    'settings'    => 'own_shop_label_header_menu_show',
		) 
	));

	// Add an option to enable the menu cart
	$wp_customize->add_setting( 
		'own_shop_enable_header_menu_align', 
		array(
		    'default'           => false,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'own_shop_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Own_shop_Toggle_Control( $wp_customize, 'own_shop_enable_header_menu_align', 
		array(
		    'label'       => esc_html__( 'Align Menu to right', 'own-shop' ),
		    'section'     => 'own_shop_header_menu_settings',
		    'type'        => 'own-shop-toggle',
		    'settings'    => 'own_shop_enable_header_menu_align',
		) 
	));

	// Title label
	$wp_customize->add_setting( 
		'own_shop_label_header_menu_spacing_top_show', 
		array(
		    'sanitize_callback' => 'own_shop_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Own_shop_Title_Info_Control( $wp_customize, 'own_shop_label_header_menu_spacing_top_show', 
		array(
		    'label'       => esc_html__( 'Menu Spacing from Top', 'own-shop' ),
		    'section'     => 'own_shop_header_menu_settings',
		    'type'        => 'own-shop-title',
		    'settings'    => 'own_shop_label_header_menu_spacing_top_show',
		) 
	));

	// spacing from top //
    $wp_customize->add_setting(
        'own_shop_menu_spacing_from_top',
        array(
            'type' => 'theme_mod',
            'default'           => '0',
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_control(
        'own_shop_menu_spacing_from_top',
        array(
            'settings'      => 'own_shop_menu_spacing_from_top',
            'section'       => 'own_shop_header_menu_settings',
            'type'          => 'number',
            'label'         => esc_html__( 'Spacing from Top (px)', 'own-shop' ),
        )
    );


}
endif;

add_action( 'customize_register', 'own_shop_customizer_header_register' );