<?php
/**
 * Own Shop functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package own-shop
 */

/**
 *  Defining Constants
 */

// Core Constants
define('OWN_SHOP_REQUIRED_PHP_VERSION', '5.6' );
define('OWN_SHOP_DIR_PATH', get_template_directory());
define('OWN_SHOP_DIR_URI', get_template_directory_uri());
define('OWN_SHOP_THEME_AUTH','https://www.spiraclethemes.com/');
define('OWN_SHOP_THEME_URL','https://www.spiraclethemes.com/own-shop-free-wordpress-theme/');
define('OWN_SHOP_THEME_PRO_URL','https://www.spiraclethemes.com/own-shop-pro-addons/');
define('OWN_SHOP_THEME_DOC_URL','https://www.spiraclethemes.com/own-shop-documentation/');
define('OWN_SHOP_THEME_VIDEOS_URL','https://www.spiraclethemes.com/own-shop-video-tutorials/');
define('OWN_SHOP_THEME_SUPPORT_URL','https://wordpress.org/support/theme/own-shop/');
define('OWN_SHOP_THEME_RATINGS_URL','https://wordpress.org/support/theme/own-shop/reviews/#new-post');
define('OWN_SHOP_THEME_CHANGELOGS_URL','https://themes.trac.wordpress.org/log/own-shop/');
define('OWN_SHOP_THEME_CONTACT_URL','https://www.spiraclethemes.com/contact/');
define('OWN_SHOP_CONTAINER_CLASS', esc_html(get_theme_mod('own_shop_layout_content_width_ratio','os-container')));


//Register Required plugin
require_once(get_template_directory() .'/inc/class-tgm-plugin-activation.php');

/**
* Check for minimum PHP version requirement 
*
*/
function own_shop_check_theme_setup( $oldtheme_name, $oldtheme ) {
	// Compare versions.
	if ( version_compare(phpversion(), OWN_SHOP_REQUIRED_PHP_VERSION, '<') ) :
	// Theme not activated info message.
	add_action( 'admin_notices', 'own_shop_php_admin_notice' );
	function own_shop_php_admin_notice() {
		?>
			<div class="update-nag">
		  		<?php esc_html_e( 'You need to update your PHP version to a minimum of 5.6 to run Own Shop Theme.', 'own-shop' ); ?> <br />
		  		<?php esc_html_e( 'Actual version is:', 'own-shop' ) ?> <strong><?php echo phpversion(); ?></strong>, <?php esc_html_e( 'required is', 'own-shop' ) ?> <strong><?php echo OWN_SHOP_REQUIRED_PHP_VERSION; ?></strong>
			</div>
		<?php
	}
	// Switch back to previous theme.
	switch_theme( $oldtheme->stylesheet );
		return false;
	endif;
}
add_action( 'after_switch_theme', 'own_shop_check_theme_setup', 10, 2  );


if ( ! function_exists( 'own_shop_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function own_shop_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Own Shop, use a find and replace
	 * to change 'own-shop' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'own-shop', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'own-shop' ),
		'topbar' => esc_html__( 'Top Bar', 'own-shop' ),
		'categorymenu' => esc_html__( 'Category Menu', 'own-shop' ),
		'footer-social' => esc_html__( 'Footer Social Menu', 'own-shop' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(		
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );


	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Remove theme support for new widgets block editor
	if(true===get_theme_mod( 'own_shop_disable_widgets_block_editor',true)) :
		remove_theme_support( 'widgets-block-editor' );
	endif;

	/**
	* Own Shop theme info
	*/
	require get_template_directory() . '/inc/theme-info.php';

	// Load default block styles.
	add_theme_support( 'wp-block-styles' );

	// Support for align full and align wide option.
	add_theme_support( 'align-wide' );

	// Add support for responsive embeds.
    add_theme_support( 'responsive-embeds' );

    // Add support for automatic feed links.
    add_theme_support( 'automatic-feed-links' );

	/**
	 * Own Shop custom posts image size
	 */
	add_image_size( 'own-shop-posts', 765, 500, true );

	/**
	 * Own Shop custom posts thumbs size
	 */
	add_image_size( 'own-shop-posts-thumb', 150, 100, true );

	/*
	* About page instance
	*/
	$config = array();
	Own_Shop_About_Page::own_shop_init( $config );

}
endif;
add_action( 'after_setup_theme', 'own_shop_setup' );


/**
* Custom Logo 
*
*/
function own_shop_logo_setup() {
    add_theme_support( 'custom-logo', array(
	   'height'      => 65,
	   'width'       => 350,
	   'flex-height' => true,
	   'flex-width' => true,	   
	) );
}
add_action( 'after_setup_theme', 'own_shop_logo_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function own_shop_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'own_shop_content_width', 640 );
}
add_action( 'after_setup_theme', 'own_shop_content_width', 0 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function own_shop_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'own-shop' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'own-shop' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	if ( own_shop_is_active_woocommerce() ) :
		register_sidebar( array(
			'name'          => esc_html__( 'WooCommerce Sidebar', 'own-shop' ),
			'id'            => 'woosidebar',
			'description'   => esc_html__( 'Add widgets here.', 'own-shop' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	endif;

	if ( true === get_theme_mod( 'own_shop_enable_page_sidebar', false )) :
		register_sidebar( array(
			'name'          => esc_html__( 'Page Sidebar', 'own-shop' ),
			'id'            => 'page-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'own-shop' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	endif;

	//Footer widget columns
    $widget_num = absint(get_theme_mod( 'own_shop_footer_widgets', '3' ));
    for ( $i=1; $i <= $widget_num; $i++ ) :
        register_sidebar( array(
            'name'          => esc_html__( 'Footer Column', 'own-shop' ) . $i,
            'id'            => 'footer-' . $i,
            'description'   => '',
            'before_widget' => '<div id="%1$s" class="section %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ) );
    endfor;

}
add_action( 'widgets_init', 'own_shop_widgets_init' );


/**
* Admin Scripts
*/
if ( ! function_exists( 'own_shop_admin_scripts' ) ) :
function own_shop_admin_scripts($hook) {
  	wp_enqueue_style( 'own-shop-info-css', get_template_directory_uri() . '/css/own-shop-theme-info.min.css', false ); 
}
endif;
add_action( 'admin_enqueue_scripts', 'own_shop_admin_scripts' );


/**
 * Display Dynamic CSS.
 */
function own_shop_dynamic_css_wrap() {
	require_once( get_parent_theme_file_path( '/css/dynamic.css.php' ) );  
	?>
  		<style type="text/css" id="own-shop-dynamic-style">
    		<?php echo own_shop_dynamic_css_stylesheet(); ?>
  		</style>
	<?php 
}
add_action( 'wp_head', 'own_shop_dynamic_css_wrap' );


/**
 * Google Font Preconnect
 */
function own_shop_fonts_preconnect() {  
    ?> 
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php
} 
add_action( 'wp_head', 'own_shop_fonts_preconnect' );


/**
 * Enqueue Styles and Scripts
 */
function own_shop_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7');
	
	wp_register_style( 'own-shop-main', get_template_directory_uri() . '/css/style-main.min.css', array(), wp_get_theme()->get('Version'));
	wp_style_add_data( 'own-shop-main', 'rtl', 'replace' );
	wp_style_add_data( 'own-shop-main', 'suffix', '.min' );
	wp_enqueue_style( 'own-shop-main' );

	wp_register_style( 'blocks-frontend', get_template_directory_uri() . '/css/blocks-frontend.min.css', array(), wp_get_theme()->get('Version'));
	wp_style_add_data( 'blocks-frontend', 'rtl', 'replace' );
	wp_style_add_data( 'blocks-frontend', 'suffix', '.min');
	wp_enqueue_style( 'blocks-frontend' );

	wp_enqueue_style( 'line-awesome', get_template_directory_uri() . '/css/line-awesome.min.css', array(), '1.3.0');
	wp_enqueue_style( 'm-customscrollbar', get_template_directory_uri() . '/css/jquery.mCustomScrollbar.min.css', array(), '3.1.5');
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.min.css', array(), '3.7.2');
	wp_enqueue_style( 'poppins-google-font', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap', array(), '1.0'); 
	wp_enqueue_style( 'Josefins-google-font', 'https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;600;700&display=swap', array(), '1.0'); 
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) :
		wp_enqueue_script( 'comment-reply' );
	endif;

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.7', true );
	wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/js/jquery.easing.1.3.min.js', array('jquery'), '1.3', true );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.min.js', array(), '2.6.2', true );
	wp_enqueue_script( 'resize-sensor', get_template_directory_uri() . '/js/ResizeSensor.min.js',array(),'1.0.0', true );	
	wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/js/theia-sticky-sidebar.min.js',array(),'1.7.0', true );
	wp_enqueue_script( 'm-customscrollbar-js', get_template_directory_uri() . '/js/jquery.mCustomScrollbar.min.js',array(),'3.1.5', true );
	wp_enqueue_script( 'own-shop-script', get_template_directory_uri() . '/js/main.min.js', array('jquery'), wp_get_theme()->get('Version'), true );
	wp_localize_script( 'own-shop-script', 'own_shop_object',
        array( 
            'add_to_cart' => esc_html__( 'Add to Cart', 'own-shop' ),
            'quick_view' => esc_html__( 'Quick View', 'own-shop' ),
            'add_to_wishlist' => esc_html__( 'Add to Wishlist', 'own-shop' ),
        )
    );
	wp_enqueue_script( 'html5shiv',get_template_directory_uri().'/js/html5shiv.min.js',array(), '3.7.3');
	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'respond', get_template_directory_uri().'/js/respond.min.js' );
    wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );

}
add_action( 'wp_enqueue_scripts', 'own_shop_scripts' );


/**
* Custom search form
*/
function own_shop_search_form( $form ) {
    $form = '<form method="get" id="searchform" class="searchform" action="' . esc_url(home_url( '/' )) . '" >
    <div class="search">
      <input type="text" value="' . get_search_query() . '" class="blog-search" name="s" id="s" placeholder="'. esc_attr__( 'Search here','own-shop' ) .'">
      <label for="searchsubmit" class="search-icon"><i class="la la-search"></i></label>
      <input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search','own-shop' ) .'" />
    </div>
    </form>';
    return $form;
}
add_filter( 'get_search_form', 'own_shop_search_form', 100 );


/** 
* Excerpt More
*/
function own_shop_excerpt_more( $more ) {
	if ( is_admin() ) :
		return $more;
	endif;
    return '&hellip;';
}
add_filter('excerpt_more', 'own_shop_excerpt_more');


/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function own_shop_pingback_header() {
 	if ( is_singular() && pings_open() ) :
    	printf( '<link rel="pingback" href="%s">' . "\n", esc_url(get_bloginfo( 'pingback_url' )) );
  	endif;
}
add_action( 'wp_head', 'own_shop_pingback_header' );


/**
 * Load our Block Editor styles to style the Editor like the front-end
 */
if ( ! function_exists( 'own_shop_block_editor_width_styles' ) ) :
function own_shop_block_editor_width_styles() {
	$own_shop_layout_width = 1200;
	$styles = '';

	wp_enqueue_style( 'own-shop-blocks-style', trailingslashit( get_template_directory_uri() ) . 'css/blocks-style.min.css', array(), '1.0.0', 'all' );

	// Increase width of Title
	$styles .= 'body.gutenberg-editor-page .edit-post-visual-editor .editor-post-title .editor-post-title__block {max-width: ' . esc_attr( $own_shop_layout_width - 10 ) . 'px;}';

	// Increase width of all Blocks & Block Appender
	$styles .= 'body.gutenberg-editor-page .edit-post-visual-editor .editor-block-list__block {max-width: ' . esc_attr( $own_shop_layout_width - 10 ) . 'px;}';
	$styles .= 'body.gutenberg-editor-page .edit-post-visual-editor .editor-default-block-appender {max-width: ' . esc_attr( $own_shop_layout_width - 10 ) . 'px;}';

	// Increase width of Wide blocks
	$styles .= 'body.gutenberg-editor-page .edit-post-visual-editor .editor-block-list__block[data-align="wide"] {max-width: ' . esc_attr( $own_shop_layout_width - 10 + 400 ) . 'px;}';

	// Remove max-width on Full blocks
	$styles .= 'body.gutenberg-editor-page .edit-post-visual-editor .editor-block-list__block[data-align="full"] {max-width: none;}';

	// Output our styles into the <head> whenever our block styles are enqueued
	wp_add_inline_style( 'own-shop-blocks-style', $styles );
}
endif;
add_action( 'enqueue_block_editor_assets', 'own_shop_block_editor_width_styles' );

/** 
*  Plugins Required
*/
function own_shop_register_required_plugins() {
    $plugins = array(      
      array(
          'name'               => 'WooCommerce',
          'slug'               => 'woocommerce',
          'source'             => '',
          'required'           => false,          
          'force_activation'   => false,
      ),
      array(
          'name'               => 'Elementor Website Builder',
          'slug'               => 'elementor',
          'source'             => '',
          'required'           => false,          
          'force_activation'   => false,
      ),
      array(
          'name'               => 'YITH WooCommerce Quick View',
          'slug'               => 'yith-woocommerce-quick-view',
          'source'             => '',
          'required'           => false,          
          'force_activation'   => false,
      ),
      array(
          'name'               => 'One Click Demo Import',
          'slug'               => 'one-click-demo-import',
          'source'             => '',
          'required'           => false,          
          'force_activation'   => false,
      ),
      array(
          'name'               => 'Spiraclethemes Site Library',
          'slug'               => 'spiraclethemes-site-library',
          'source'             => '',
          'required'           => false,          
          'force_activation'   => false,
      ),    
    );

    $config = array(
            'id'           => 'own-shop',
            'default_path' => '',
            'menu'         => 'tgmpa-install-plugins',
            'has_notices'  => true,
            'dismissable'  => true,
            'dismiss_msg'  => '',
            'is_automatic' => false,
            'message'      => '',
            'strings'      => array()
    );

    tgmpa( $plugins, $config );

}
add_action( 'tgmpa_register', 'own_shop_register_required_plugins' );

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Template functions
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom template hooks for this theme.
 */
require get_template_directory() . '/inc/template-hooks.php';

/**
 * Extra classes for this theme.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * WooCommerce Functions.
 */
if ( own_shop_is_active_woocommerce() ) :
	require get_template_directory() . '/inc/woocommerce-functions.php';
endif;

/**
 * Load Widgets.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Upgrade Pro
 */
require_once( trailingslashit( get_template_directory() ) . 'own-shop-pro/class-customize.php' );