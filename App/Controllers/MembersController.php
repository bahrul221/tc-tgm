<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\View\Menu;

/**
 * Description of MembersController
 *
 */
class MembersController extends Controller {

    public function viewList() {
        $this->setup = array (
            "title" => "Member List"
        );

        Menu::setActiveParent( 'members' );
        Menu::setActiveMenu( 'member_list' );

        $this->content = "pages/members/list.php";


        $this->render();
    }

}
