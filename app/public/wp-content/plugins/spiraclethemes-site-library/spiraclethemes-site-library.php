<?php
/**
 * Plugin Name:       Spiraclethemes Site Library
 * Plugin URI:        https://wordpress.org/plugins/spiraclethemes-site-library/
 * Description:       A plugin made by spiraclethemes.com to extends its free themes features by adding functionality to import demo data content in just a click.
 * Version:           1.1.6
 * Author:            SpiracleThemes
 * Author URI:        https://spiraclethemes.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       spiraclethemes-site-library
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

// Define SPIR_SITE_LIBRARY_FILE
if( ! defined( 'SPIR_SITE_LIBRARY_FILE' ) ) :
    define( 'SPIR_SITE_LIBRARY_FILE', __FILE__ );
endif;

// Define SPIR_SITE_LIBRARY_URL
if( ! defined( 'SPIR_SITE_LIBRARY_URL' ) ) :
    define( 'SPIR_SITE_LIBRARY_URL', plugins_url( '/', __FILE__ ) );
endif;

// Define SPIR_SITE_LIBRARY_DIR_URL
if( ! defined( 'SPIR_SITE_LIBRARY_DIR_URL' ) ) :
    define( 'SPIR_SITE_LIBRARY_DIR_URL', plugin_dir_url( __FILE__ ) );
endif;

// Define SPIR_SITE_LIBRARY_PATH
if( ! defined( 'SPIR_SITE_LIBRARY_PATH' ) ) :
    define( 'SPIR_SITE_LIBRARY_PATH', plugin_dir_path( __FILE__ ) );
endif;


use \YeEasyAdminNotices\V1\AdminNotice;

class Spiraclethemes_Site_Library {
    /**
     * Get the theme name using wp_get_theme.
     *
     * @var string $theme_name The theme name.
     */
    private $theme_name;
    /**
     * Get the theme slug ( theme folder name ).
     *
     * @var string $theme_slug The theme slug.
     */
    private $theme_slug;
    /**
     * The current theme object.
     *
     * @var WP_Theme $theme The current theme.
     */
    private $theme;
    /**
     * Holds the theme version.
     *
     * @var string $theme_version The theme version.
     */
    private $theme_version;
    /**
     * Holds the ocdi slug.
     *
     * @var string $ocdi_slug The ocdi slug.
     */
    private $ocdi_slug;
    /**
     * Define the html notification content displayed upon activation.
     *
     * @var string $notification The html notification content.
     */
    private $notification;

    // Activate
    function activate() {
        if ( ! is_plugin_active( 'one-click-demo-import/one-click-demo-import.php' ) and current_user_can( 'activate_plugins' ) ) {
            // Stop activation redirect and show error
            wp_die('Sorry, but this plugin requires the <a href="' . esc_url( 'https://wordpress.org/plugins/one-click-demo-import/' ) . '" target="_blank"> One Click Demo Import Plugin </a> to be installed and active. <br><a href="' . admin_url( 'plugins.php' ) . '">&laquo; Return to Plugins</a>');
        }
        //Add options
        add_option( 'spiraclethemes_sitelib_install_date', date('Y-m-d G:i:s'), '', 'yes');
    }
    
    // Deactivate
    function deactivate() {
    	global $current_user;
    	$user_id = $current_user->ID;
        AdminNotice::cleanUpDatabase('spiraclethemes-site-library-');
        delete_option( 'spiraclethemes_sitelib_install_date');
        delete_user_meta($user_id, 'spiraclethemes_sitelib_rating_ignore_notice');
    }

    function __construct() {
        require_once SPIR_SITE_LIBRARY_PATH . '/vendor/admin-notices/AdminNotice.php';

        $theme = wp_get_theme();
        if ( get_template_directory() !== get_stylesheet_directory() ) :
            $this->theme_name = $theme->get( 'Name' );
            $this->theme      = $theme->get( 'Name' );
        else :
            $this->theme_name = $theme->get( 'Name' );
            $this->theme      = $theme->parent();
        endif;

        $this->theme_version = $theme->get( 'Version' );
        $this->theme_slug    = $theme->get( 'TextDomain');

        $this->ocdi_slug    = 'one-click-demo-import';
        $this->notification  =  '<p>' . sprintf( 'Get Started with the demo starter templates we have created for this theme. This will save you time creating pages from scratch. Once imported you can edit the content easily.','spiraclethemes-site-library'). ' <a href="' . esc_url( admin_url( 'themes.php?page=' . $this->ocdi_slug) ) . '" class="button" style="text-decoration: none;">' . sprintf( 'Start Importing Templates','spiraclethemes-site-library' ) . '</a></p>';

         if ( is_admin()) :
            add_action( 'admin_notices', array( $this, 'spiraclethemes_site_library_welcome_admin_notice' ), 99 );
            add_action( 'admin_init', array( $this, 'spiraclethemes_site_library_rating_ignore' ), 99 );

        endif;
        
    }
  
    // spiraclethemes site library functions
    function spiraclethemes_site_library_functions() {

        if ('own-shop' == $this->theme_slug ) :
            require_once SPIR_SITE_LIBRARY_PATH . '/inc/own-shop-functions.php';
        endif;
        if ('purea-magazine' == $this->theme_slug ) :
            require_once SPIR_SITE_LIBRARY_PATH . '/inc/purea-magazine-functions.php';
        endif;
        if ('colon' == $this->theme_slug ) :
            require_once SPIR_SITE_LIBRARY_PATH . '/inc/colon-functions.php';
        endif;
        if ('somalite' == $this->theme_slug ) :
            require_once SPIR_SITE_LIBRARY_PATH . '/inc/somalite-functions.php';
        endif;
        if ('purea-fashion' == $this->theme_slug ) :
            require_once SPIR_SITE_LIBRARY_PATH . '/inc/purea-fashion-functions.php';
        endif;
        if ('own-store' == $this->theme_slug ) :
            require_once SPIR_SITE_LIBRARY_PATH . '/inc/own-store-functions.php';
        endif;
        if ('colon-plus' == $this->theme_slug ) :
            require_once SPIR_SITE_LIBRARY_PATH . '/inc/colon-plus-functions.php';
        endif;
        if ('own-shop-lite' == $this->theme_slug ) :
            require_once SPIR_SITE_LIBRARY_PATH . '/inc/own-shop-lite-functions.php';
        endif;
        if ('mestore' == $this->theme_slug ) :
            require_once SPIR_SITE_LIBRARY_PATH . '/inc/mestore-functions.php';
        endif;
        
    }

    //register styles
    function spiraclethemes_site_library_register_styles() {
       add_action( 'admin_enqueue_scripts', array( $this, 'spiraclethemes_site_library_admin_styles' ), 0 );         
    }

    // Admin Script include
    function spiraclethemes_site_library_admin_styles() {
        // Main css
        wp_enqueue_style( 'spiraclethemes-site-library-main', plugins_url( '/css/main.min.css', __FILE__ ) );
    }
    
    //Load plugin text domain
    function spiraclethemes_site_library_load_plugin_textdomain() {
        load_plugin_textdomain('spiraclethemes-site-library', false, dirname(plugin_basename(__FILE__)) . '/languages/');
    }

    //Display an admin notice
    function spiraclethemes_site_library_welcome_admin_notice() {
        if ( ! empty( $this->notification ) ) :
            AdminNotice::create('spiraclethemes-site-library-notice-id')->persistentlyDismissible(AdminNotice::DISMISS_PER_SITE)
            ->success( $this->notification )->show();
        endif;

        $install_date = get_option( 'spiraclethemes_sitelib_install_date', '');
  		$install_date = date_create( $install_date );
  		$date_now     = date_create( date('Y-m-d G:i:s') );
  		$date_diff    = date_diff( $install_date, $date_now );

  		if ( $date_diff->format("%d") <= 7 ) :
    		return false;
    	else:

		    global $current_user ;
		    $user_id = $current_user->ID;

		    if ( ! get_user_meta($user_id, 'spiraclethemes_sitelib_rating_ignore_notice' ) ) :
		    	?>
		       		<div class="rating-div updated" style="padding: 15px 20px;">
		        		<?php 
		        			$rating_url = esc_url('https://wordpress.org/support/theme/'.$this->theme_slug.'/reviews/?filter=5');
		        			$rating_ignore =esc_url('themes.php?page='.$this->theme_slug.'-theme-info&wp_spiraclethemes_sitelib_rating_ignore=0');
		        			$rating_theme_info = esc_url('themes.php?page='.$this->theme_slug.'-theme-info');
		        			$rating_theme = $this->theme_name;
		        			printf( esc_html__('Awesome, you\'ve been using','spiraclethemes-site-library') .
		        				'<a href="'. $rating_theme_info.'">&nbsp;'. $rating_theme .'&nbsp;</a>'.
		        				esc_html__('theme for more than 1 week. May we ask you to give it a 5-star rating on WordPress?','spiraclethemes-site-library'). ' 
		     					| <a href="'.$rating_url.'" target="_blank"> '.esc_html__('Ok, you deserved it','spiraclethemes-site-library').'
		     					</a> | <a href="'.$rating_ignore.'">'.esc_html__('I already did','spiraclethemes-site-library').'
		     					</a> | <a href="'.$rating_ignore.'">'.esc_html__('No, not good enough','spiraclethemes-site-library').'
		     					</a>'
		     				);
		        		?>
		        	</div>
		        <?php
		    endif;
		endif;
	}

	function spiraclethemes_site_library_rating_ignore() {
	    global $current_user;
	    $user_id = $current_user->ID;
	    if ( isset($_GET['wp_spiraclethemes_sitelib_rating_ignore']) && '0' == $_GET['wp_spiraclethemes_sitelib_rating_ignore'] ) :
	        add_user_meta($user_id, 'spiraclethemes_sitelib_rating_ignore_notice', 'true', true);
	    endif;
	}

}

// Class Register

if ( class_exists( 'Spiraclethemes_Site_Library' ) ) :
    # code...
    $spiraclethemes_site_library = new Spiraclethemes_Site_Library();
    $spiraclethemes_site_library->spiraclethemes_site_library_register_styles();
    $spiraclethemes_site_library->spiraclethemes_site_library_functions();
    $spiraclethemes_site_library->spiraclethemes_site_library_load_plugin_textdomain();

endif;

// Activation
register_activation_hook( __FILE__, array( $spiraclethemes_site_library, 'activate' ) );
// Deactivation
register_deactivation_hook( __FILE__, array( $spiraclethemes_site_library, 'deactivate' ) );