<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Member;
use App\View\View;
use App\View\Form;
use App\View\Menu;
use App\Authentication\Authentication;

/**
 * Description of DashboardPage
 *
 */
class MemberProfileController extends Controller {

    public function view() {

        if ( !Authentication::authRole( ['member' ] ) ) {
            View::redirect( './' );
            return;
        }

        $this->setup = array (
            "title" => "Profile"
        );

        Menu::setActiveParent( 'member_profile' );
        Menu::setActiveMenu( 'member_profile_view' );

        $this->content = "pages/member-profile/view.php";

        $this->render();
    }

    public function edit() {

        if ( !Authentication::authRole( ['member' ] ) ) {
            View::redirect( './' );
            return;
        }

        $this->setup = array (
            "title" => "Edit Profile"
        );

        Menu::setActiveParent( 'member_profile' );
        Menu::setActiveMenu( 'member_profile_edit' );

        $this->content = "pages/member-profile/edit.php";

        $this->render();
    }

    public function save() {

        if ( !Authentication::authRole( ['member' ] ) ) {
            View::redirect( './' );
            return;
        }
        
        $this->saveProcess();
        
        View::redirect( './?p=profile-edit', FALSE );
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
        $member = Authentication::getUser();
        $member->setData( 'name', $input[ 'name' ] );
        $member->setData( 'phone', $input[ 'phone' ] );
        $member->setData( 'address', $input[ 'address' ] );

        if ( !$update = $member->update() ) {
            View::setMessageFlash( "danger", "Penyimpanan Gagal" );
            return;
        }

        View::setMessageFlash( "success", "Penyimpanan Berhasil" );
    }

}
