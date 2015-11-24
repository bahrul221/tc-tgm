<?php

use App\View\View; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo View::get( 'title' ); ?></title>

        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>

        <!--main css-->
<?php echo View::getCSS(); ?>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div id="sidebar_overlay"></div>

        <!--BEGIN HEADER-->

        <header id="site_header">
            <nav class="navbar navbar-default navbar-fixed-top" id="site_navbar">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <!--<a class="navbar-brand" href="#">MBKom Admin</a>-->
                        <a class="navbar-brand navbar-brand-img" href="#">
                            <img src="assets/img/logo.png" >

                        </a>
                        <div class="navbar-toggle pull-left" id="toggle_sidebar_left">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </div>
                        <div class="navbar-toggle" id="toggle_sidebar_right">
                            <img src="assets/img/avatar.png" class="nav-user-avatar" />
                        </div>

                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse">

                        <ul class="nav navbar-nav navbar-right" id="nav_user">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <?php echo $data['user']['username']; ?> <img src="assets/img/avatar.png" class="nav-user-avatar" /> <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Profile</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </header>

        <!--END HEADER-->