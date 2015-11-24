<?php

namespace App\Authentication;

use App\View\View;

/**
 * Description of RegisterController
 *
 */
class RegisterController{

    public static function registerPage() {
        $pageSetup = array (
            "title" => "Register",
            "js" => array(
                "plugins/jquery-validation/js/jquery.validate.min.js",
                "assets/js/register.js"
            )
        );
        View::renderPage( "auth/register.php", $pageSetup );
    }

    public static function registerInfoPage() {
        $pageSetup = array (
            "title" => "Register Info"
        );
        View::renderPage( "auth/register-info.php", $pageSetup );
    }

}
