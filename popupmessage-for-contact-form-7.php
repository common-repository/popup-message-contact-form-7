<?php
/**
* Plugin Name: Popup Message Contact Form 7
* Description: This plugin allows create Popup Message Contact Form 7 plugin.
* Version: 1.0
* Copyright: 2020
* Text Domain: popup-message-contact-form-7
* Domain Path: /languages 
*/


if (!defined('ABSPATH')) {
    die('-1');
}
if (!defined('OCCF7POPUP_PLUGIN_NAME')) {
    define('OCCF7POPUP_PLUGIN_NAME', 'Popup Message Contact Form 7');
}
if (!defined('OCCF7POPUP_PLUGIN_VERSION')) {
    define('OCCF7POPUP_PLUGIN_VERSION', '1.0.0');
}
if (!defined('OCCF7POPUP_PLUGIN_FILE')) {
    define('OCCF7POPUP_PLUGIN_FILE', __FILE__);
}
if (!defined('OCCF7POPUP_PLUGIN_DIR')) {
    define('OCCF7POPUP_PLUGIN_DIR',plugins_url('', __FILE__));
}
if (!defined('OCCF7POPUP_BASE_NAME')) {
    define('OCCF7POPUP_BASE_NAME', plugin_basename(OCCF7POPUP_PLUGIN_FILE));
}
if (!defined('OCCF7POPUP_DOMAIN')) {
    define('OCCF7POPUP_DOMAIN', 'popup-message-contact-form-7');
}


if (!class_exists('OCCF7POPUPMAIN')) {

    add_action('plugins_loaded', array('OCCF7POPUPMAIN', 'OCCF7POPUPMAIN_instance'));
    class OCCF7POPUPMAIN {

        protected static $OCCF7POPUPMAIN_instance;

    	function OCCF7POPUPMAIN_load_plugin() {
            if ( ! ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) ) {
                add_action( 'admin_notices', array($this,'OCCF7POPUPMAIN_install_error') );
            }
        }

        function OCCF7POPUPMAIN_install_error() {
            deactivate_plugins( plugin_basename( __FILE__ ) );
            delete_transient( get_current_user_id() . 'cf7error' );
            echo '<div class="error"><p> This plugin is deactivated because it require <a href="plugin-install.php?tab=search&s=contact+form+7">Contact Form 7</a> plugin installed and activated.</p></div>';
        }

        function OCCF7POPUPMAIN_load_admin_script_style() {
            wp_enqueue_media();
            wp_enqueue_script( 'pmfcf-wp-media-uploader', OCCF7POPUP_PLUGIN_DIR.'/js/wp_media_uploader.js' );
        }

        function OCCF7POPUPMAIN_load_front_script_style() {
            wp_enqueue_script( 'pmfcf-script-popupscript', plugins_url( '/js/popupscript.js', __FILE__ ) );
            wp_enqueue_script( 'pmfcf-script-sweetalert2', plugins_url( '/js/sweetalert2.all.min.js', __FILE__ ) );
            wp_enqueue_script( 'pmfcf-jscolor', plugins_url( '/js/jscolor.js', __FILE__ ) );
            wp_enqueue_style( 'pmfcf-sweetalert2-style', plugins_url( '/css/sweetalert2.min.css', __FILE__ ) );
            wp_enqueue_style( 'pmfcf-style', plugins_url( '/css/style.css', __FILE__ ) );
        }

        function includes() {
            include_once('popup_panel.php');
            include_once('save_popup_setting.php');
            include_once('submit_popup_settings.php');
        }

        function CF7POPUP_plugin_row_meta( $links, $file ) {
            if ( OCCF7POPUP_BASE_NAME === $file ) {
                $row_meta = array(
                    'rating'    =>  '<a href="https://www.xeeshop.com/popup-message-contact-form-7/" target="_blank">Documentation</a> | <a href="https://www.xeeshop.com/support-us/?utm_source=aj_plugin&utm_medium=plugin_support&utm_campaign=aj_support&utm_content=aj_wordpress" target="_blank">Support</a> | <a href="https://wordpress.org/support/plugin/popup-message-contact-form-7/reviews/?filter=5" target="_blank"><img src="'.OCCF7POPUP_PLUGIN_DIR.'/images/star.png" class="occf7popup_rating_div"></a>',
                );
                return array_merge( $links, $row_meta );
            }
            return (array) $links;
        }

        function OCCF7POPUPMAIN_css_admin() {
            ?>
            <style type="text/css">
                .occf7popup_rating_div {
                   width: 100px;
                   vertical-align: middle;
                }
            </style>
            <?php
        }

        function init() {
            add_action( 'admin_init', array($this, 'OCCF7POPUPMAIN_load_plugin'), 11 );
            add_action( 'admin_enqueue_scripts', array($this, 'OCCF7POPUPMAIN_load_admin_script_style'));
            add_action( 'wp_enqueue_scripts',  array($this, 'OCCF7POPUPMAIN_load_front_script_style'));
            add_action( 'admin_enqueue_scripts',  array($this, 'OCCF7POPUPMAIN_load_front_script_style'));
            add_filter( 'plugin_row_meta', array( $this, 'CF7POPUP_plugin_row_meta' ), 10, 2 );
            add_filter( 'admin_footer', array( $this, 'OCCF7POPUPMAIN_css_admin' ), 10, 2 );
        }

        public static function OCCF7POPUPMAIN_instance() {
            if (!isset(self::$OCCF7POPUPMAIN_instance)) {
                self::$OCCF7POPUPMAIN_instance = new self();
                self::$OCCF7POPUPMAIN_instance->init();
                self::$OCCF7POPUPMAIN_instance->includes();
            }
            return self::$OCCF7POPUPMAIN_instance;
        }
    }
}


add_action( 'plugins_loaded', 'OCCF7POPUPMAIN_load_textdomain' );
function OCCF7POPUPMAIN_load_textdomain() {
    load_plugin_textdomain( 'popup-message-contact-form-7', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}
function OCCF7POPUPMAIN_load_my_own_textdomain( $mofile, $domain ) {
    if ( 'popup-message-contact-form-7' === $domain && false !== strpos( $mofile, WP_LANG_DIR . '/plugins/' ) ) {
        $locale = apply_filters( 'plugin_locale', determine_locale(), $domain );
        $mofile = WP_PLUGIN_DIR . '/' . dirname( plugin_basename( __FILE__ ) ) . '/languages/' . $domain . '-' . $locale . '.mo';
    }
    return $mofile;
}
add_filter( 'load_textdomain_mofile', 'OCCF7POPUPMAIN_load_my_own_textdomain', 10, 2 );