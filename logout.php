<?php
session_start();

$flash_messages = $_SESSION[ 'flash_messages' ];

session_unset();
//session_destroy();

$_SESSION['flash_messages'] = $flash_messages;

header( 'location: ./login.php' );