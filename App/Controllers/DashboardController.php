<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\View\Menu;

/**
 * Description of DashboardPage
 *
 */
class DashboardController extends Controller {

    public function index() {
        $this->setup = array(
            "title" => "Dashboard"
        );

        Menu::setActiveMenu( 'dashboard' );
        
        $this->content = "pages/dashboard/dashboard.php";
        

        $this->render();
    }

}
