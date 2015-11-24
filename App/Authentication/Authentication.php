<?php

namespace App\Authentication;

use App\Miscellaneous\Sessions;
use App\View\View;
use App\Models\User;
use App\Models\Staff;
use App\Models\Member;

/**
 * Description of Authentication
 *
 */
class Authentication {

    protected static $user = null;

    public static function auth() {

        // redirect to login page if id session is not exist
        if ( !Sessions::check( 'user_id' ) ) {
            self::redirectLogin();
        }

        // get user_id
        $id = Sessions::get( 'user_id' );

//        self::$user = new User( $id );
        $user = new User( $id );
        $user_role = $user->getRole();
        switch ( $user_role ) {
            case 'member':
                $user = new Member( $id );
                break;
            case 'staff':
                $user = new Staff( $id );
                break;
            case 'super_admin':
                break;
            default:
                $user = null;
                break;
        }

        self::$user = $user;

        if ( is_null( self::$user->getData() ) ) {
            View::setMessageFlash( 'danger', 'User Error' );
            self::redirectLogin( TRUE );
        }
    }

    public static function authLogin() {
        if ( Sessions::check( 'user_id' ) ) {
            self::redirectIndex();
        }
    }

    private static function redirectIndex() {
        View::redirect( './' );
    }

    private static function redirectLogin( $hasMessage = FALSE ) {
        View::redirect( './logout.php', !$hasMessage );
    }

    public static function getUser() {
        return self::$user;
    }

    public static function isVerified( $user = null ) {
        $data = $user->getData();
        if ( !$data[ 'verified' ] ) {
            return FALSE;
        }
        return TRUE;
    }

    public static function authRole( $role, $user = null ) {
        if ( $user == null ) {
            $user = self::getUser();
        }
        
        if ( !is_object( $user ) && get_class( $user ) != "App\Models\User" ) {
            return FALSE;
        }
        if ( in_array( $user->getRole(), $role ) ) {
            return TRUE;
        }
        return FALSE;
    }

}
