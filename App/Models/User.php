<?php

namespace App\Models;

use App\App;

/**
 * Description of User
 *
 */
class User extends Model {

    protected $table = "users";
    protected $key = "user_id";

//    public function __construct( $id ) {
//        $mysqli = App::getConnection( true );
//        $sql = "SELECT * FROM users LEFT JOIN user_meta ON users.user_id = user_meta.user_id WHERE users.user_id='".$id."'";
//        if ( !$query = $mysqli->query( $sql ) ) {
//            return;
//        }
//        $this->data = $query->fetch_assoc();
//    }
    
    public function getRole(){
        return $this->data['role'];
    }

}
