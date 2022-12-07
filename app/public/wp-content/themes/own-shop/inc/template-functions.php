<?php
/**
 * @package own-shop
 */


/**
* Header
*/

if ( ! function_exists( 'own_shop_header_menu_styles' ) ) :
function own_shop_header_menu_styles() {
    get_template_part( 'inc/header-menu/content',esc_html(get_theme_mod('own_shop_header_menu_style','style1')));
}
endif;
add_action( 'own_shop_action_header', 'own_shop_header_menu_styles' );   


/**
* Footer
*/

if ( ! function_exists( 'own_shop_footer_copyrights' ) ) :
function own_shop_footer_copyrights() {
	?>
		<div class="row">
            <div class="copyrights">
                <p>
                    <?php

                        if("" != esc_html(get_theme_mod( 'own_shop_footer_copyright_text'))) :
                            echo esc_html(get_theme_mod( 'own_shop_footer_copyright_text')); 
                            if(get_theme_mod('own_shop_en_footer_credits',true)) :
                                ?><span><?php esc_html_e(' | Theme by ','own-shop') ?><a href="<?php echo esc_url(OWN_SHOP_THEME_AUTH); ?>" target="_blank"><?php esc_html_e('Spiracle Themes','own-shop') ?></a></span>
                                <?php   
                            endif;
                        
                        else :
                            echo date_i18n(
                                /* translators: Copyright date format, see https://secure.php.net/date */
                                _x( 'Y', 'copyright date format', 'own-shop' )
                            );
                            ?>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
                                <span><?php esc_html_e(' | Theme by ','own-shop') ?><a href="<?php echo esc_url(OWN_SHOP_THEME_AUTH); ?>" target="_blank"><?php esc_html_e('Spiracle Themes','own-shop') ?></a></span>
                            <?php
                        endif;
                    ?>
                </p>
            </div>
        </div>
	<?php
}
endif;
add_action( 'own_shop_action_footer', 'own_shop_footer_copyrights' );	


/**
* Custom excerpt length.
*/
if ( ! function_exists( 'own_shop_my_excerpt_length' ) ) :
function own_shop_my_excerpt_length($length) {
	if ( is_admin() ) :
		return $length;
	endif;
  	return absint(get_theme_mod( 'own_shop_excerpt_length',70));
}
endif;
add_filter('excerpt_length', 'own_shop_my_excerpt_length');


/**
 * Get Page Title
 */

if( !function_exists( 'own_shop_get_title' ) ):
    function own_shop_get_title() {
        if(!is_front_page()) :
            ?>
                <div class="page-title">
                    <?php own_shop_before_title_content(); ?>
                    <div class="<?php echo esc_attr(OWN_SHOP_CONTAINER_CLASS) ?>">
                        <h1 class="main-title"><?php the_title(); ?></h1>
                    </div>
                    <?php own_shop_after_title_content(); ?>
                </div>
            <?php    
        endif;
    }
endif;


/**
 * Top Bar
 */
if ( ! function_exists( 'own_shop_enable_header_topbar_style1' ) ) :
function own_shop_enable_header_topbar_style1() {
    ?>  
        <div class="top-bar">
            <div class="<?php echo esc_attr(OWN_SHOP_CONTAINER_CLASS) ?>">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <ul class="top-menu-bar top-bar">
                            <?php
                                wp_nav_menu( array(                             
                                    'theme_location'    => 'topbar',
                                    'depth'             => 1,
                                    'container'         => 'ul',
                                    'container_class'   => 'top-bar',
                                    'container_id'      => 'menu-topbar',
                                    'menu_class'        => 'top-bar-menu',
                                    )
                                );
                            ?>  
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <?php
}
endif;
add_action('own_shop_action_enable_header_topbar_style1', 'own_shop_enable_header_topbar_style1');


/**
 * Header Menu Cart
 */
if ( ! function_exists( 'own_shop_header_menucart' ) ) :
function own_shop_header_menucart() {
    if(true===get_theme_mod( 'own_shop_enable_header_menucart',true)) :
        ?>
            <ul class="header-woo-cart">
                <li>
                    <?php
                        if ( own_shop_is_active_woocommerce() ) :
                            own_shop_woocommerce_header_cart();
                        endif;
                    ?>
                </li>
            </ul>
        <?php
    endif;
}
endif;
add_action('own_shop_action_header_menucart', 'own_shop_header_menucart');


/**
 * Header Login/Register Links
 */
if ( ! function_exists( 'own_shop_header_login_register_links' ) ) :
function own_shop_header_login_register_links() {
    if(true===get_theme_mod( 'own_shop_enable_header_login_register_links',true)) :
        ?>
            <ul class="header-woo-links">
                <li>
                    <?php
                        if ( own_shop_is_active_woocommerce() ) :
                            own_shop_woocommerce_header_signup_links();
                        endif;
                    ?>
                </li>
            </ul>   
        <?php
    endif;
}
endif;
add_action('own_shop_action_header_login_register_links', 'own_shop_header_login_register_links');


/**
 * Header Inner Content
 */
if ( ! function_exists( 'own_shop_header_inner_content' ) ) :
function own_shop_header_inner_content() {
    ?>
        <div class="header-inner">
            <div class="<?php echo esc_attr(OWN_SHOP_CONTAINER_CLASS) ?>">
                <div class="left-column col-md-3 col-sm-4">
                    <div class="all-categories">
                        <nav class="category-menu" role="navigation">
                            <div class="category-menu-wrapper">
                                <?php
                                    if ( own_shop_is_active_woocommerce() ) :
                                        if(true===get_theme_mod( 'own_shop_enable_header_category_menu',true)) :
                                            //CUSTOM MENU
                                            own_shop_header_product_custom_menu();
                                        endif;
                                    endif;
                                ?>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="right-column col-md-9 col-sm-8">
                    <div class="header-product-search">
                        <?php
                            if ( own_shop_is_active_woocommerce() ) :
                                if(true===get_theme_mod( 'own_shop_enable_header_product_search',true)) :
                                    own_shop_product_search_form();
                                endif;
                            endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    <?php
}
endif;
add_action('own_shop_action_header_inner_content', 'own_shop_header_inner_content');


/**
 * Sidebar Product Search Form
 */
if ( ! function_exists( 'own_shop_sidebar_product_search_content' ) ) :
function own_shop_sidebar_product_search_content() {
    ?>  
        <div class="header-product-search">
            <?php
                if ( own_shop_is_active_woocommerce() ) :
                    if(true===get_theme_mod( 'own_shop_enable_header_product_search',true)) :
                        own_shop_sidebar_product_search_form();
                    endif;
                endif;
            ?>
        </div> 
    <?php
}
endif;
add_action('own_shop_action_sidebar_product_search_content', 'own_shop_sidebar_product_search_content');


/**
 * Function for displaying menu item description
 * 
 */
function own_shop_nav_description( $item_output, $item, $depth, $args ) {
    if( isset($args->theme_location) && !empty($item->description) ) :
        $description_html = '<span class="menu-bubble-description">'.$item->description.'</span>';
        return $item_output.$description_html;
    endif;
    return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'own_shop_nav_description', 10, 4 );


/** 
* Disable Plugin Redirect
*/
function own_shop_prevent_plugins_redirect() {
    delete_transient( 'elementor_activation_redirect' );
}
add_action('admin_init', 'own_shop_prevent_plugins_redirect');


/**
 * Function for Minimizing dynamic CSS
 */
function own_shop_minimize_css($css){
    $css = preg_replace('/\/\*((?!\*\/).)*\*\//', '', $css);
    $css = preg_replace('/\s{2,}/', ' ', $css);
    $css = preg_replace('/\s*([:;{}])\s*/', '$1', $css);
    $css = preg_replace('/;}/', '}', $css);
    return $css;
}

/**
 * Adding blog sidebar classes to body
 */
if ( ! function_exists( 'own_shop_add_blog_sidebar_classes_to_body' ) ) :
function own_shop_add_blog_sidebar_classes_to_body($classes = '') {
    if('right'===esc_html(get_theme_mod('own_shop_blog_single_sidebar_layout','no')) && is_single()) :
        $classes[] = 'single-right-sidebar';
    
    elseif('left'===esc_html(get_theme_mod('own_shop_blog_single_sidebar_layout','no')) && is_single()) :
        $classes[] = 'single-left-sidebar';   
    
    elseif('no'===esc_html(get_theme_mod('own_shop_blog_single_sidebar_layout','no')) && is_single()) :
        $classes[] = 'single-no-sidebar';
    endif;
    return $classes;
}
endif;
add_filter('body_class', 'own_shop_add_blog_sidebar_classes_to_body');


/**
 * Check if woocommerce is activated.
 */
if ( ! function_exists( 'own_shop_is_active_woocommerce' ) ) {
    function own_shop_is_active_woocommerce() {
        if ( class_exists( 'WooCommerce' ) ) :
            return true;
        else :
            return false;
        endif;
    }
}