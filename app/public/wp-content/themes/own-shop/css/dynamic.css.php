<?php
/**
 * Own Shop : Dynamic CSS Stylesheet
 *
 */

function own_shop_dynamic_css_stylesheet() {

    $primary_color= sanitize_hex_color(get_theme_mod( 'own_shop_site_primary_color','#ed516c' ));
    $secondary_color= sanitize_hex_color(get_theme_mod( 'own_shop_site_secondary_color','#ca2e49' ));
    $menu_spacing_from_top= absint(get_theme_mod( 'own_shop_menu_spacing_from_top','0' ));

    $css = '

    a {
        color: #555;
        text-decoration: none;
        transition: all 0.3s ease-in-out;
    }

    a:hover,a:focus {
        color: ' . $secondary_color . ';
        text-decoration: none;
        transition: all 0.3s ease-in-out;
    }

    h1,h2,h3,h4,h5,h6 {
        color: #555;
    }

    .pagination .nav-links .current {
        background: ' . $primary_color . ' !important;
    }

    form.wpcf7-form input,
    form.wpcf7-form textarea,
    form.wpcf7-form radio,
    form.wpcf7-form checkbox {
        border: 1px solid #d0d0d0;
        color: #555;
    }

    form.wpcf7-form input::placeholder,
    form.wpcf7-form textarea::placeholder {
        color: #555;
    }

    form.wpcf7-form input[type="submit"] {
        color: #fff;
    }

    form.wpcf7-form label {
        color: #555;
    }

    button.navbar-toggle,
    button.navbar-toggle:hover {
        background: none !important;
        box-shadow: none;
    }

    .menu-social li a {
        color: #555;
    }

    .menu-social li a:hover {
        color: #555;
    }

    header .top-menu-wrapper {
        margin-top: ' . $menu_spacing_from_top . 'px;
    }

    aside h4.widget-title:hover {
        color: inherit;
    }

    .wp-block-group article {
        width: 100%;
    }

    .wp-block-group article footer {
        line-height: 1.5;
    }

    .single h1.entry-title a {
        color: #555;
        transition: all 0.3s ease-in-out;
    }

    .blog.single-no-sidebar article {
        width: 49%;
    }

    .top-menu .navigation > li span.menu-bubble-description,
    header button[type="submit"],
    .top-menu .navigation > li > ul > li:hover > a,
    .top-menu .navigation > li > a:before {
        background: ' . $primary_color . ';
    }


    .top-menu .navigation > li > ul > li > a:focus,
    .top-menu .dropdown-menu > li > a:focus,
    .top-menu .navigation > li > ul > li:focus > a  {
        color: #fff !important;
        background: ' . $primary_color . ';
    }

    .top-menu .navigation > li > ul > li > ul > li > a:hover {
        background-color: ' . $primary_color . ';
    }

    article .blog-post .post-date {
        background: ' . $primary_color . ';
        box-shadow: -1px 0px 10px 0px ' . $primary_color . ';
        -moz-box-shadow: -1px 0px 10px 0px ' . $primary_color . ';
        -webkit-box-shadow: -1px 0px 10px 0px ' . $primary_color . ';
    }

    article .read-more a {
        color: ' . $secondary_color . ';
    }

    .top-menu .navigation > li span.menu-bubble-description:after,
    .header-product-custom-menu ul li span.menu-bubble-description:after {
        border-color: ' . $primary_color . ' transparent;
    }

    header button[type="submit"]:hover {
        background: ' . $secondary_color . ';
    }

    .btntoTop.active:hover {
        background: ' . $primary_color . ';
        border: 1px solid ' . $primary_color . ';
    }

    button, input[type="submit"], 
    input[type="reset"] {
        background: ' . $primary_color . ';
    }

    button, input[type="submit"]:hover, 
    input[type="reset"]:hover {
        background: ' . $secondary_color . ';
    }

    .wp-block-pullquote.alignfull blockquote,
    .wp-block-pullquote.alignfull p {
        max-width: 100%;
    }

    footer.entry-footer {
        display: none;
    }

    .comment-metadata .edit-link a,
    .comment-meta .reply a {
    	text-decoration: underline;
    }

';

if ( own_shop_is_active_woocommerce() ) :
    $css .='
        li.menu-cart a span.badge,
        .header-product-custom-menu ul li span.menu-bubble-description, 
        .woocommerce div.product form.cart .button,
        .woocommerce div.product .woocommerce-tabs ul.tabs li.active,
        .woocommerce #review_form #respond .form-submit input,
        .woocommerce .widget_shopping_cart .buttons a,
        .page .woocommerce-mini-cart__buttons a, 
        .woocommerce.widget_shopping_cart .buttons a {
            background: ' . $primary_color . ';
         }

        .header-product-custom-menu ul li:hover,
        .header-product-custom-menu ul li:focus,
        .header-product-custom-menu ul li .dropdown-menu > li:focus,
        .header-product-custom-menu ul li .dropdown-menu > li > a:focus {
            background: #f6f6f6;
            color: #000;
        }

        .woocommerce div.product form.cart .button:hover {
            background: ' . $secondary_color . ';
        }

        .list-products-section .nav-tabs > li.active > a,
        .woocommerce-Price-amount {
            color: ' . $primary_color . ';
        }

        .woocommerce span.onsale {
            background-color: ' . $primary_color . ';
        }

        .woocommerce ul.products .button.yith-wcqv-button:hover {
            background: ' . $primary_color . ' url(' . OWN_SHOP_DIR_URI . '/img/quick-view-hover.svg) no-repeat scroll center 12px !important;
            background-size: 20px !important;
        }

        .woocommerce ul.products li.product .product_type_grouped:hover, 
        .woocommerce-page ul.products li.product .product_type_grouped:hover, 
        .woocommerce ul.products li.product .product_type_external:hover, 
        .woocommerce-page ul.products li.product .product_type_external:hover, 
        .woocommerce ul.products li.product .product_type_variable:hover, 
        .woocommerce-page ul.products li.product .product_type_variable:hover {
            background: ' . $primary_color . ' url(' . OWN_SHOP_DIR_URI . '/img/hand-hover.svg) no-repeat scroll center 5px !important;
            background-size: 20px !important;
        }

        .woocommerce ul.products li.product .product_type_simple:hover, 
        .woocommerce-page ul.products li.product .product_type_simple:hover {
            background: ' . $primary_color . ' url(' . OWN_SHOP_DIR_URI . '/img/cart-hover.svg) no-repeat scroll center 10px !important;
            background-size: 20px !important;
        }

        .woocommerce .widget_shopping_cart .buttons a:hover, 
        .woocommerce.widget_shopping_cart .buttons a:hover {
            background: ' . $secondary_color . ';
        }

        .woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
        .woocommerce button.button,
        .woocommerce .widget_price_filter .price_slider_amount .button {
            background: ' . $primary_color . ';
        }

        .woocommerce button.button:hover,
        .woocommerce .widget_price_filter .price_slider_amount .button:hover {
            background: ' . $secondary_color . ';
        }

        .woocommerce-account .woocommerce a.button,
        .woocommerce #respond input#submit.alt, 
        .woocommerce a.button.alt, 
        .woocommerce button.button.alt, 
        .woocommerce input.button.alt,
        .woocommerce .return-to-shop a.button {
            background: ' . $primary_color . ';
        }

        .woocommerce #respond input#submit.alt:hover, 
        .woocommerce a.button.alt:hover, 
        .woocommerce button.button.alt:hover, 
        .woocommerce input.button.alt:hover,
        .woocommerce #review_form #respond .form-submit input:hover,
        .woocommerce .return-to-shop a.button:hover {
            background: ' . $secondary_color . ';
        }

        .woocommerce nav.woocommerce-pagination ul li a:focus, 
        .woocommerce nav.woocommerce-pagination ul li a:hover, 
        .woocommerce nav.woocommerce-pagination ul li span.current {
            background: ' . $primary_color . ';
        }

        .woocommerce .page-title {
            background: none;
            padding: 0;
        }


    ';
endif;


if(false===get_theme_mod( 'own_shop_display_site_title_tagline',true)) :
    $css .='
         h1.site-title,
         p.site-description {
            display: none;
        }
    ';
endif;

if(false===get_theme_mod( 'own_shop_enable_posts_meta_date',true)) :
    $css .='
         span.separator,
         span.date {
            display: none;
         }
    ';
endif;

if(false===get_theme_mod( 'own_shop_enable_posts_meta_author',true)) :
    $css .='
         span.author,
         span.by {
            display: none;
         }
    ';
endif;

if(false===get_theme_mod( 'own_shop_enable_posts_meta_comments',true)) :
    $css .='
         span.comments {
            display: none;
         }
    ';
endif;

if(false===get_theme_mod( 'own_shop_enable_single_post_cat',true)) :
    $css .='
        .single div.post-categories {
            display: none;
         }
    ';
endif;

if(false===get_theme_mod( 'own_shop_enable_single_post_tags',true)) :
    $css .='
        .single div.post-tags {
            display: none;
         }
    ';
endif;

if(false===get_theme_mod( 'own_shop_enable_single_post_meta_date',true)) :
    $css .='
        .single span.date-single {
            display: none;
         }
    ';
endif;

if(false===get_theme_mod( 'own_shop_enable_single_post_meta_author',true)) :
    $css .='
        .single span.author-single {
            display: none;
         }
    ';
endif;

if(false===get_theme_mod( 'own_shop_enable_single_post_meta_comments',true)) :
    $css .='
        .single span.comments-single {
            display: none;
         }
    ';
endif;

if(true===get_theme_mod( 'own_shop_enable_page_title_bg',false) && !is_front_page()) :
    $css .='
        .page-title {
            background: ' . $primary_color . ';
         }

         .page-title h1 {
            color: #fff;
         }

         .page .content-inner {
            margin-top: 70px;
            margin-bottom: 70px;
         }
    ';
else:
    if ( !own_shop_is_active_woocommerce() ) :
        $css .='
            header {
                border-bottom: 1px solid #efefef;
            }
        ';
    endif;
endif;

if('container'===esc_html(get_theme_mod('own_shop_layout_content_width_ratio','os-container'))) :
    $css .='
        .custom-menu-wrapper a.title {
            font-size: 12px;
        }

        .header-woo-links {
            margin-right: 0;
        }
    ';
endif;


// WooCommerce //

if(true===get_theme_mod( 'own_shop_enable_header_menu_align',false)) :
    $css .='
        .style1 .top-menu {
            text-align: right;
        }
    ';
endif;

if(true===get_theme_mod( 'own_shop_enable_header_menucart_dark_style',false)) :
    $css .='
        #site-header-cart .widget.woocommerce.widget_shopping_cart {
            background: #000;
            color: #fff;
            opacity: 0.9;
        }

        #site-header-cart .list-products-section .nav-tabs > li.active > a, 
        #site-header-cart .woocommerce-Price-amount {
            color: #fff;
        }

        .site-header-cart .woocommerce a.remove {
            color: #fff !important;
        }

        .woocommerce.widget_shopping_cart .buttons a {
            background: #fff;
            color: #555;
        }

        .site-header-cart .widget.woocommerce.widget_shopping_cart a {
            color: #fff;
        }

        .site-header-cart .woocommerce-mini-cart__buttons a {
            background: #fff;
            color: #555 !important;
        }
    ';
endif;


if ( own_shop_is_active_woocommerce() ) :
    if ( is_page( 'cart' ) || is_cart() ) :
        if('left'===esc_html(get_theme_mod('own_shop_cart_page_sidebar_layout','right'))) :
            $css .='
                aside#secondary {
                    margin-right: 30px;
                }
            ';
        else :
            $css .='
                aside#secondary {
                    margin-right: 0;
                }
            ';
        endif;
    endif;
    if ( is_page( 'checkout' ) || is_checkout() ) :
        if('left'===esc_html(get_theme_mod('own_shop_checkout_page_sidebar_layout','right'))) :
            $css .='
                aside#secondary {
                    margin-right: 30px;
                }
            ';
        else :
            $css .='
                aside#secondary {
                    margin-right: 0;
                }
            ';
        endif;
    endif;
endif;


// Blog Single Sidebar //
if(is_single()) :
    if('right'===esc_html(get_theme_mod('own_shop_blog_single_sidebar_layout','no'))) :
        $css .='
            .single .content {
                width: 100%;
            }
        ';
    elseif('left'===esc_html(get_theme_mod('own_shop_blog_single_sidebar_layout','no'))) :
        $css .='
            .single .content {
                width: 100%;
            }
        ';
    else:
        $css .='
            .single .content {
                width: 90%;
                margin: 0 auto;
            }
        ';
    endif;
endif;

// RTL css
if(is_rtl()) :
     $css .='
        .menu-search:after {
            content: "";
            display: inline-block;
            height: 10px;
            -webkit-transform: translateX(50%) translateY(50%) rotate(-45deg);
            -moz-transform: translateX(50%) translateY(50%) rotate(-45deg);
            -ms-transform: translateX(50%) translateY(50%) rotate(-45deg);
            -o-transform: translateX(50%) translateY(50%) rotate(-45deg);
            transform: translateX(50%) translateY(50%) rotate(45deg);
            width: 1px;
        }

        .btntoTop{
            right: 95%;
            left: 30px;
        }

        a{
            display: inline;
        }

        #menu-social-menu li a{
            display: inline-block;
        }
    }
    '; 

    if('container'===esc_html(get_theme_mod('own_shop_layout_content_width_ratio','os-container'))) :
        $css .='
            .custom-menu-wrapper span.title > i {
                padding-left: 15px;
            }
        ';
    else:
        $css .='
            @media only screen and (min-width: 768px) and (max-width: 872px) {
                .custom-menu-wrapper .navbar-toggle {
                    margin-top: 0;
                    margin-bottom: 0;
                }
            }
        ';
    endif;

endif;

return apply_filters( 'own_shop_dynamic_css_stylesheet', own_shop_minimize_css($css));

}