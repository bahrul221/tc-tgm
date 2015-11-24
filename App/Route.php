<?php

namespace App;

/**
 * Page controller
 *
 */
class Route {

    private static $default = "App\Controllers\NotFoundController@index";
    private static $index = "App\Controllers\DashboardController@index";
    private static $pages = array (
        "dashboard" => "App\Controllers\DashboardController@index",
        // member profile
        "profile" => "App\Controllers\MemberProfileController@view",
        "profile-edit" => "App\Controllers\MemberProfileController@edit",
        "profile-save" => "App\Controllers\MemberProfileController@save",
        // staff profile
        "staff-profile" => "App\Controllers\StaffProfileController@view",
        "staff-profile-edit" => "App\Controllers\StaffProfileController@edit",
        "staff-profile-save" => "App\Controllers\StaffProfileController@save",
        // members
        "members" => "App\Controllers\MembersController@viewList",
    );

    public static function get() {

        $get = filter_input( INPUT_GET, "p", FILTER_SANITIZE_STRING );

        $route = self::$default;

        if ( isset( self::$pages[ $get ] ) ) {
            $route = self::$pages[ $get ];
        }

        if ( is_null( $get ) ) {
            $route = self::$index;
        }

        $route_arr = explode( "@", $route );
        $class = $route_arr[ 0 ];
        $method = $route_arr[ 1 ];

        $controller = new $class();
        $controller->$method();
    }

}
