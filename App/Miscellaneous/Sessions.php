<?php

namespace App\Miscellaneous;

/**
 * Description of Sessions
 *
 */
class Sessions {

//    private static $flash = array ();

    public static function check( $name ) {
        if ( isset( $_SESSION[ $name ] ) ) {
            return TRUE;
        }
        return FALSE;
    }

    public static function get( $name, $default = false ) {
        if ( self::check( $name ) ) {
            return $_SESSION[ $name ];
        }
        return $default;
    }
    
    public static function resetFlash(){
        $_SESSION['flash_messages'] = array();
    }

    /**
     * add session flash
     */
//    public function flash( $flash ) {
//        if ( !is_array( $flash ) ) {
//            return;
//        }
//    }

}
