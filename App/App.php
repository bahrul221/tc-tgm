<?php

namespace App;

use App\Database\Connection;
use App\Miscellaneous\Sessions;

/**
 * Description of App
 *
 * @author mbkom
 */
final class App {

    private static $connection;
    private static $resetFlash = TRUE;

    public static function begin() {
        self::$connection = new Connection();

        session_start();
    }

    public static function setResetFlash( $reset ) {
        self::$resetFlash = $reset;
    }

    public static function end() {
        if ( self::$resetFlash ) {
            Sessions::resetFlash();
        }
    }

    public static function getConnection( $mysqli = FALSE ) {
        if ( $mysqli ) {
            return self::$connection->getConnection();
        }
        return self::$connection;
    }

}
