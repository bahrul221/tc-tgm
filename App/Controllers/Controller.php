<?php

namespace App\Controllers;

use App\View\View;
use App\Authentication\Authentication;

/**
 * Description of Controller
 *
 */
class Controller {
    protected $view = "pages/index.php";
    protected $content = "";
    protected $setup = array();
    protected $data = array();

    public function render(){
        
        $this->data['user'] = Authentication::getUser()->getData();
        $this->data['content'] = $this->content;
        
        
        
        View::renderPage( $this->view, $this->setup, $this->data );
    }
}
