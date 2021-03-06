<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Staff;
use App\View\View;
use App\View\Form;
use App\View\Menu;
use App\Authentication\Authentication;

/**
 * Description of DashboardPage
 *
 */
class StaffProfileController extends Controller {
    
    public function view() {
        
        if ( !Authentication::authRole( ['staff' ] ) ) {
            View::redirect( './' );
            return;
        }
        
        $this->setup = array (
            "title" => "Staff Profile"
        );

        Menu::setActiveParent( 'staff_profile' );
        Menu::setActiveMenu( 'staff_profile_view' );

        $this->content = "pages/staff-profile/view.php";

        $this->render();
    }

    public function edit() {

        if ( !Authentication::authRole( ['staff' ] ) ) {
            View::redirect( './' );
            return;
        }
        
        $this->setup = array (
            "title" => "Edit Staff Profile"
        );

        Menu::setActiveParent( 'staff_profile' );
        Menu::setActiveMenu( 'staff_profile_edit' );

        $this->content = "pages/staff-profile/edit.php";

        $this->render();
    }

    public function save() {

        if ( !Authentication::authRole( ['staff' ] ) ) {
            View::redirect( './' );
            return;
        }
        
        $this->saveProcess();
        
        View::redirect( './?p=staff-profile-edit', FALSE );
    }

    private function saveProcess() {
        if ( $_SERVER[ 'REQUEST_METHOD' ] != 'POST' ) {
            View::setMessageFlash( "danger", "Form tidak valid" );
            return FALSE;
        }

        // form validation
        if ( !filter_input( INPUT_POST, "form_token" ) || Form::isFormTokenValid( filter_input( INPUT_POST, "form_token" ) ) ) {
            View::setMessageFlash( "danger", "Form tidak valid" );
            return FALSE;
        }

        // required fields
        $filter = array
            (
            "name" => FILTER_SANITIZE_STRING,
            "phone" => FILTER_SANITIZE_STRING,
            "address" => FILTER_SANITIZE_STRING,
        );
        $input = filter_input_array( INPUT_POST, $filter );

        if ( in_array( '', $input ) || in_array( NULL, $input ) ) {
            View::setMessageFlash( "danger", "Kolom tidak boleh kosong" );
            return FALSE;
        }

        // set member object
        $staff = Authentication::getUser();
        $staff->setData( 'name', $input[ 'name' ] );
        $staff->setData( 'phone', $input[ 'phone' ] );
        $staff->setData( 'address', $input[ 'address' ] );

        if ( !$update = $staff->update() ) {
            View::setMessageFlash( "danger", "Penyimpanan Gagal" );
            return;
        }

        View::setMessageFlash( "success", "Penyimpanan Berhasil" );
    }
    
}
