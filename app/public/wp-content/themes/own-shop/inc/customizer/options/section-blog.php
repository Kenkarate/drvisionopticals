<?php
/**
 * Theme Customizer Controls
 *
 * @package own-shop
 */


if ( ! function_exists( 'own_shop_customizer_blog_register' ) ) :
function own_shop_customizer_blog_register( $wp_customize ) {
	
	$wp_customize->add_panel(
        'own_shop_blog_settings_panel',
        array (
            'priority'      => 30,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Blog Settings', 'own-shop' ),
        )
    );

	// Section Posts ===================================================
    $wp_customize->add_section(
        'own_shop_posts_settings',
        array (
        	'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Posts', 'own-shop' ),
            'panel'          => 'own_shop_blog_settings_panel',
        )
    ); 

	// Title label
	$wp_customize->add_setting( 
		'own_shop_label_sidebar_layout', 
		array(
		    'sanitize_callback' => 'own_shop_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Own_shop_Title_Info_Control( $wp_customize, 'own_shop_label_sidebar_layout', 
		array(
		    'label'       => esc_html__( 'Sidebar', 'own-shop' ),
		    'section'     => 'own_shop_posts_settings',
		    'type'        => 'own-shop-title',
		    'settings'    => 'own_shop_label_sidebar_layout',
		) 
	));

	// Sidebar layout
    $wp_customize->add_setting(
        'own_shop_blog_sidebar_layout',
        array(
            'default'			=> 'right',
            'type'				=> 'theme_mod',
            'capability'		=> 'edit_theme_options',
            'sanitize_callback'	=> 'own_shop_sanitize_select'
        )
    );
    $wp_customize->add_control(
        new Own_shop_Radio_Image_Control( $wp_customize,'own_shop_blog_sidebar_layout',
            array(
                'settings'		=> 'own_shop_blog_sidebar_layout',
                'section'		=> 'own_shop_posts_settings',
                'label'			=> esc_html__( 'Sidebar Layout', 'own-shop' ),
                'choices'		=> array(
                    'right'	        => OWN_SHOP_DIR_URI . '/inc/customizer/assets/images/cr.png',
                    'left' 	        => OWN_SHOP_DIR_URI . '/inc/customizer/assets/images/cl.png',
                    'no' 	        => OWN_SHOP_DIR_URI . '/inc/customizer/assets/images/cn.png',
                )
            )
        )
    );


	// Section Single Post ===================================================
    $wp_customize->add_section(
        'own_shop_single_post_settings',
        array (
        	'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Single Post', 'own-shop' ),
            'panel'          => 'own_shop_blog_settings_panel',
        )
    ); 

    // Title label
	$wp_customize->add_setting( 
		'own_shop_label_single_post_category_show', 
		array(
		    'sanitize_callback' => 'own_shop_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Own_shop_Title_Info_Control( $wp_customize, 'own_shop_label_single_post_category_show', 
		array(
		    'label'       => esc_html__( 'Post Category', 'own-shop' ),
		    'section'     => 'own_shop_single_post_settings',
		    'type'        => 'own-shop-title',
		    'settings'    => 'own_shop_label_single_post_category_show',
		) 
	));

	// Add an option to enable the category
	$wp_customize->add_setting( 
		'own_shop_enable_single_post_cat', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'own_shop_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Own_shop_Toggle_Control( $wp_customize, 'own_shop_enable_single_post_cat', 
		array(
		    'label'       => esc_html__( 'Show Category', 'own-shop' ),
		    'section'     => 'own_shop_single_post_settings',
		    'type'        => 'own-shop-toggle',
		    'settings'    => 'own_shop_enable_single_post_cat',
		) 
	));

	// Title label
	$wp_customize->add_setting( 
		'own_shop_label_single_post_tag_show', 
		array(
		    'sanitize_callback' => 'own_shop_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Own_shop_Title_Info_Control( $wp_customize, 'own_shop_label_single_post_tag_show', 
		array(
		    'label'       => esc_html__( 'Post Tags', 'own-shop' ),
		    'section'     => 'own_shop_single_post_settings',
		    'type'        => 'own-shop-title',
		    'settings'    => 'own_shop_label_single_post_tag_show',
		) 
	));

	// Add an option to enable the tags
	$wp_customize->add_setting( 
		'own_shop_enable_single_post_tags', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'own_shop_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Own_shop_Toggle_Control( $wp_customize, 'own_shop_enable_single_post_tags', 
		array(
		    'label'       => esc_html__( 'Show Tags', 'own-shop' ),
		    'section'     => 'own_shop_single_post_settings',
		    'type'        => 'own-shop-toggle',
		    'settings'    => 'own_shop_enable_single_post_tags',
		) 
	));

	// Title label
	$wp_customize->add_setting( 
		'own_shop_label_single_pos_meta_show', 
		array(
		    'sanitize_callback' => 'own_shop_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Own_shop_Title_Info_Control( $wp_customize, 'own_shop_label_single_pos_meta_show', 
		array(
		    'label'       => esc_html__( 'Post Meta', 'own-shop' ),
		    'section'     => 'own_shop_single_post_settings',
		    'type'        => 'own-shop-title',
		    'settings'    => 'own_shop_label_single_pos_meta_show',
		) 
	));

	// Add an option to enable the date
	$wp_customize->add_setting( 
		'own_shop_enable_single_post_meta_date', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'own_shop_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Own_shop_Toggle_Control( $wp_customize, 'own_shop_enable_single_post_meta_date', 
		array(
		    'label'       => esc_html__( 'Show Date', 'own-shop' ),
		    'section'     => 'own_shop_single_post_settings',
		    'type'        => 'own-shop-toggle',
		    'settings'    => 'own_shop_enable_single_post_meta_date',
		) 
	));

	// Add an option to enable the author
	$wp_customize->add_setting( 
		'own_shop_enable_single_post_meta_author', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'own_shop_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Own_shop_Toggle_Control( $wp_customize, 'own_shop_enable_single_post_meta_author', 
		array(
		    'label'       => esc_html__( 'Show Author', 'own-shop' ),
		    'section'     => 'own_shop_single_post_settings',
		    'type'        => 'own-shop-toggle',
		    'settings'    => 'own_shop_enable_single_post_meta_author',
		) 
	));

	// Add an option to enable the comments
	$wp_customize->add_setting( 
		'own_shop_enable_single_post_meta_comments', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'own_shop_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Own_shop_Toggle_Control( $wp_customize, 'own_shop_enable_single_post_meta_comments', 
		array(
		    'label'       => esc_html__( 'Show Comments', 'own-shop' ),
		    'section'     => 'own_shop_single_post_settings',
		    'type'        => 'own-shop-toggle',
		    'settings'    => 'own_shop_enable_single_post_meta_comments',
		) 
	));

	// Title label
	$wp_customize->add_setting( 
		'own_shop_label_single_sidebar_layout', 
		array(
		    'sanitize_callback' => 'own_shop_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Own_shop_Title_Info_Control( $wp_customize, 'own_shop_label_single_sidebar_layout', 
		array(
		    'label'       => esc_html__( 'Sidebar', 'own-shop' ),
		    'section'     => 'own_shop_single_post_settings',
		    'type'        => 'own-shop-title',
		    'settings'    => 'own_shop_label_single_sidebar_layout',
		) 
	));

	// Sidebar layout
    $wp_customize->add_setting(
        'own_shop_blog_single_sidebar_layout',
        array(
            'default'			=> 'no',
            'type'				=> 'theme_mod',
            'capability'		=> 'edit_theme_options',
            'sanitize_callback'	=> 'own_shop_sanitize_select'
        )
    );
    $wp_customize->add_control(
        new Own_shop_Radio_Image_Control( $wp_customize,'own_shop_blog_single_sidebar_layout',
            array(
                'settings'		=> 'own_shop_blog_single_sidebar_layout',
                'section'		=> 'own_shop_single_post_settings',
                'label'			=> esc_html__( 'Sidebar Layout', 'own-shop' ),
                'choices'		=> array(
                    'right'	        => OWN_SHOP_DIR_URI . '/inc/customizer/assets/images/cr.png',
                    'left' 	        => OWN_SHOP_DIR_URI . '/inc/customizer/assets/images/cl.png',
                    'no' 	        => OWN_SHOP_DIR_URI . '/inc/customizer/assets/images/cn.png',
                )
            )
        )
    );

}
endif;

add_action( 'customize_register', 'own_shop_customizer_blog_register' );