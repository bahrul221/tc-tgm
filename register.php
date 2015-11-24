<?php

use App\App;
use App\View\View;
use App\Authentication\Authentication;
use App\Authentication\LoginController;

include './config.php';
include './autoload.php';

App::begin();

Authentication::authLogin();

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
    
}else{
    if ( isset( $_GET[ 's' ] ) ) {
        RegisterController::registerInfoPage();
    } else {
        RegisterController::registerPage();
    }
}


App::end();