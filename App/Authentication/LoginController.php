<?php

namespace App\Authentication;

use App\App;
use App\View\View;
use App\View\Form;
use App\Database\Connection;
use App\Miscellaneous\Sessions;

/**
 * Description of LoginController
 *
 */
class LoginController {

    /**
     * render login page
     */
    public static function loginPage() {
        $pageSetup = array (
            "title" => "Login",
            "js" => array (
            )
        );
        View::renderPage( "auth/login.php", $pageSetup );
    }

    /**
     * login process
     */
    public static function login() {
        // form validation
        if ( !filter_input( INPUT_POST, "form_token" ) || Form::isFormTokenValid( filter_input( INPUT_POST, "form_token" ) ) ) {
            View::setMessageFlash( "danger", "Form tidak valid" );
            return FALSE;
        }

        if ( !filter_input( INPUT_POST, "username" ) || !filter_input( INPUT_POST, "password" ) ) {
            View::setMessageFlash( "danger", "Masukkan Username dan Password" );
            return FALSE;
        }

        $username = filter_input( INPUT_POST, "username", FILTER_SANITIZE_STRING );
        $password = md5( filter_input( INPUT_POST, "password", FILTER_SANITIZE_STRING ) );

        $mysqli = App::getConnection( true );

        $sql = "SELECT user_id FROM users WHERE username='$username' AND password='$password'";
        if ( !$query = $mysqli->query( $sql ) ) {
            View::setMessageFlash( "danger", $mysqli->error );
            return FALSE;
        }
        if ( $query->num_rows == 0 ) {
            View::setMessageFlash( "danger", "Username dan Password Salah" );
            return FALSE;
        }

        $row = $query->fetch_row();

        $_SESSION[ 'user_id' ] = $row[ 0 ];

        return TRUE;
    }

}
