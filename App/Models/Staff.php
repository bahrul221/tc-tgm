<?php

namespace App\Models;

use App\App;
use App\Models\User;

/**
 * Description of Staff
 *
 */
class Staff extends User {

    protected $table = "staff";
    protected $key = "staff_id";

    public function __construct( $id ) {
        $mysqli = App::getConnection( true );
        $sql = "SELECT * FROM users INNER JOIN staff ON users.user_id = staff.user_id WHERE users.user_id='" . $id . "'";
        if ( !$query = $mysqli->query( $sql ) ) {
            var_dump($query->error);
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
