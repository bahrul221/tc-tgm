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
    if ( LoginController::login() ) {
        View::redirect( './' );
    } else {
        View::redirect( './login.php', FALSE );
    }
} else {
    LoginController::loginPage();
}


App::end();