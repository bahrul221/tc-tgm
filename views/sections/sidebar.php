<?php

use App\View\Menu; ?>

<div id="site_sidebar">
    <nav id="sidebar_nav">
        <ul>
            <?php
            $menus = Menu::getMenu();

            foreach ( $menus as $menu ) {
                if ( count( $menu[ 'sub' ] ) > 0 ) {
                    echo '<li class="nav-item ' . $menu[ 'open' ] . '">';
                    echo '<a href="' . $menu[ 'url' ] . '" class="nav-toggle ' . $menu[ 'active' ] . '">';
                    echo '<span class=" nav-icon"><i class="' . $menu[ 'icon' ] . '"></i></span> ';
                    echo '<span class="nav-title">' . $menu[ 'title' ] . '</span>';
                    echo '<span class="nav-arrow"></span>';
                    echo '</a>';
                    echo '<ul class="sub-nav">';
                    foreach ( $menu[ 'sub' ] as $sub ) {
                        echo '<li class="nav-item ' . $sub[ 'active' ] . '">';
                        echo '<a href="' . $sub[ 'url' ] . '">';
                        echo '<span class=" nav-icon"><i class="' . $sub[ 'icon' ] . '"></i></span> ';
                        echo '<span class="nav-title">' . $sub[ 'title' ] . '</span>';
                        echo '</a>';
                        echo '</li>';
                    }
                    echo '</ul>';
                    echo '</li>';
                } else {
                    echo '<li class="nav-item ' . $menu[ 'active' ] . '">';
                    echo '<a href="' . $menu[ 'url' ] . '">';
                    echo '<span class=" nav-icon"><i class="' . $menu[ 'icon' ] . '"></i></span> ';
                    echo '<span class="nav-title">' . $menu[ 'title' ] . '</span>';
                    echo '</a>';
                    echo '</li>';
                }
            }
            ?>
        </ul>
    </nav>
</div>