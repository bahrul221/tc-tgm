<?php
 namespace App\Controllers;

 use App\Controllers\Controller;
 
/**
 * Description of DashboardPage
 *
 */
class NotFoundController extends Controller{
    
    protected $view = "pages/404.php";
    protected $setup = array(
        "title" => "404 Not Found"
    );
    protected $data = array();

    public function index(){
        $this->render();
    }
    
   
    
}
