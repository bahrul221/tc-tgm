<?php

use App\App;
use App\Route;
use App\Authentication\Authentication;

include './config.php';
include './autoload.php';

App::begin();

Authentication::auth();

Route::get();

App::end();