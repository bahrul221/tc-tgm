<?php

namespace App\View;

use App\Authentication\Authentication;

/**
 * Description of Menu
 *
 */
class Menu {

    protected static $activeParent = '';
    protected static $activeMenu = '';
    private static $menu_collection = array (
        "dashboard" =>
        array (
            "title" => "Dashboard",
            "icon" => "fa fa-dashboard",
            "url" => "./",
            "active" => "",
            "role" => 'all',
            "sub" => array (),
        ),
        "member_profile" =>
        array (
            "title" => "Profil",
            "icon" => "fa fa-user",
            "url" => "javascript:;",
            "active" => "",
            "open" => "",
            "role" => ['member'],
            "sub" => array (
                "member_profile_view" =>
                array (
                    "title" => "Lihat Profil",
                    "icon" => "fa fa-user",
                    "url" => "./?p=profile",
                    "active" => "",
                    "role" => ['member'],
                ),
                "member_profile_edit" => array (
                    "title" => "Edit Profil",
                    "icon" => "fa fa-edit",
                    "url" => "./?p=profile-edit",
                    "active" => "",
                    "role" => ['member'],
                )
            )
        ),
        "staff_profile" =>
        array (
            "title" => "Staff",
            "icon" => "fa fa-user",
            "url" => "javascript:;",
            "active" => "",
            "open" => "",
            "role" => ['staff'],
            "sub" => array (
                "staff_profile_view" =>
                array (
                    "title" => "Lihat Profil",
                    "icon" => "fa fa-user",
                    "url" => "./?p=staff-profile",
                    "active" => "",
                    "role" => ['staff'],
                ),
                "staff_profile_edit" => array (
                    "title" => "Edit Profil",
                    "icon" => "fa fa-edit",
                    "url" => "./?p=staff-profile-edit",
                    "active" => "",
                    "role" => ['staff'],
                )
            )
        ),
        "members" =>
        array (
            "title" => "Members",
            "icon" => "fa fa-users",
            "url" => "javascript:;",
            "active" => "",
            "open" => "",
            "role" => ['super_admin','staff'],
            "sub" => array (
                "member_add" =>
                array (
                    "title" => "Add Member",
                    "icon" => "fa fa-user-plus",
                    "url" => "./?p=member-add",
                    "active" => "",
                    "role" => ['super_admin','staff'],
                ),
                "member_list" =>
                array (
                    "title" => "Member List",
                    "icon" => "fa fa-users",
                    "url" => "./?p=members",
                    "active" => "",
                    "role" => ['super_admin','staff'],
                ),
            )
        ),
        "logout" =>
        array (
            "title" => "Logout",
            "icon" => "fa fa-sign-out",
            "url" => "./logout.php",
            "active" => "",
            "role" => 'all',
            "sub" => array ()
        )
    );

    public static function getMenu() {

        $menus = array ();

        /**
         * collect menu by role, also add active parent and menu
         */
        $user_role = Authentication::getUser()->getRole();

        foreach ( self::$menu_collection as $slug => $menu ) {
            if ( $menu[ 'role' ] == 'all' || in_array( $user_role, $menu[ 'role' ] ) ) {

                // set active
                if ( count( $menu[ 'sub' ] ) > 0 ) {
                    if ( self::$activeParent == $slug ) {
                        $menu['active'] = "active";
                        $menu['open'] = "open";
                    }
                } else {
                    if ( self::$activeMenu == $slug ) {
                        $menu['active'] = "active";
                    }
                }

                $submenu = $menu[ 'sub' ];
                $menu[ 'sub' ] = array ();

                foreach ( $submenu as $slug => $sub ) {
                    
                    if ( self::$activeMenu == $slug ) {
                        $sub['active'] = "active";
                    }
                    
                    if ( $sub[ 'role' ] == 'all' || in_array( $user_role, $sub[ 'role' ] ) ) {
                        array_push( $menu[ 'sub' ], $sub );
                    }
                }

                array_push( $menus, $menu );
            }
        }

        return $menus;
    }

    public static function setActiveParent( $slug ) {
        self::$activeParent = $slug;
    }

    public static function setActiveMenu( $slug ) {
        self::$activeMenu = $slug;
    }

}
