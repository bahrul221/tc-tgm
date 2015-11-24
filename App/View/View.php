<?php

namespace App\View;

use App\Miscellaneous\Sessions;
use App\App;

/**
 * Description of View
 *
 */
class View {

    protected static $pageSetup = array (
        "title" => "",
        "css_main" => array (
            "plugins/bootstrap/css/bootstrap.min.css",
            "plugins/font-awesome/css/font-awesome.min.css",
            "assets/css/app.css"
        ),
        "css" => array (),
        "js_main" => array (
            "plugins/jquery.js",
            "plugins/bootstrap/js/bootstrap.min.js",
            "assets/js/app.js"
        ),
        "js" => array (),
    );

    /**
     * messages
     */
    protected static $messages = array ();

    /**
     * flash messages
     */
    protected static $flashMessages = array ();

    public function __construct() {
//        var_dump( "ok" );
    }

    /**
     * render a page ( menampilkan sebuah halaman utuh)
     * 
     * @param array $pageSetup Page Setup
     */
    public static function renderPage( $view = "", $pageSetup, $data = array () ) {
        // merge array ( gabungkan array)
        self::$pageSetup = array_merge( self::$pageSetup, $pageSetup );

        // add site name at title
        if ( isset( $pageSetup[ 'title' ] ) ) {
            self::$pageSetup[ 'title' ] = $pageSetup[ 'title' ] . ' - ' . SITE_NAME;
        }

        // if view file not found, render 404.php
        $inc_file = ( file_exists( SITE_DIR . '/views/' . $view ) ) ?
            SITE_DIR . '/views/' . $view :
            SITE_DIR . '/views/' . "404.php";

        // set form token
        Form::setFormToken();

        // include view file
        include $inc_file;
    }

    // get pagesetup value by key
    public static function get( $key ) {
        return self::$pageSetup[ $key ];
    }

    public static function getCSS() {
        $css = "";
        foreach ( self::get( 'css_main' ) as $href ) {
            $css .= '<link rel="stylesheet" href="' . $href . '"> ';
        }
        foreach ( self::get( 'css' ) as $href ) {
            $css .= '<link rel="stylesheet" href="' . $href . '"> ';
        }
        return $css;
    }

    public static function getJS() {
        $js = "";
        foreach ( self::get( 'js_main' ) as $src ) {
            $js .= '<script src="' . $src . '"></script> ';
        }
        foreach ( self::get( 'js' ) as $src ) {
            $js .= '<script src="' . $src . '"></script> ';
        }
        return $js;
    }

    public static function redirect( $url, $resetFlash = TRUE ) {
        header( 'Location: ' . $url );
        App::setResetFlash( $resetFlash );        
    }

    public static function setMessage( $type, $msg ) {
        array_push( self::$messages, [$type, $msg ] );
//        $_SESSION[ 'messages' ] = self::$messages;
    }

    public static function setMessageFlash( $type, $msg ) {
        array_push( self::$flashMessages, [$type, $msg ] );
        $_SESSION[ 'flash_messages' ] = self::$flashMessages;
    }

    public static function renderFlashMessages() {
        $e_msg = "";
        $messages = Sessions::get( 'flash_messages', array () );
        foreach ( $messages as $msg ) {
            $e_msg .= '<div class="alert alert-' . $msg[ 0 ] . '">' . $msg[ 1 ] .
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        }
        return $e_msg;
    }

}
