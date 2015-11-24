<?php

namespace App\Models;

use App\App;
use App\Models\User;

/**
 * Description of Member
 *
 */
class Member extends User {

    protected $table = "members";
    protected $key = "member_id";

    public function __construct( $id ) {
        $mysqli = App::getConnection( true );
        $sql = "SELECT * FROM users INNER JOIN members ON users.user_id = members.user_id WHERE users.user_id='" . $id . "'";
        if ( !$query = $mysqli->query( $sql ) ) {
            return;
        }
        $this->data = $query->fetch_assoc();
    }

    public function update() {
        
        $mysqli = App::getConnection( true );
        $sql = "UPDATE " . $this->table . " SET ";
        $sql .= "name='" . $this->data['name'] . "', ";
        $sql .= "phone='" . $this->data['phone'] . "', ";
        $sql .= "address='" . $this->data['address'] . "' ";
        $sql .= "WHERE ". $this->key. "='" . $this->data[$this->key] . "' ";
        
        if ( !$query = $mysqli->query( $sql ) ) {
            return FALSE;
        }
        return TRUE;
    }

}
