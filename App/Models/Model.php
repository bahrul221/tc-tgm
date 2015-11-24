<?php

namespace App\Models;

use App\App;

/**
 * Description of Model
 *
 */
class Model {

    /**
     * table name
     */
    protected $table = "";

    /**
     * primary key
     */
    protected $key = "";

    /**
     * array key for primary key
     */
    protected $key_data;

    /**
     * data
     * 
     * @var array
     */
    protected $data = array ();
    protected $query = "";

    public function __construct( $id ) {

        $mysqli = App::getConnection( true );

        $sql = "SELECT * FROM " . $this->table . " WHERE " . $this->key . " = '" . $id . "'";
        if ( !$query = $mysqli->query( $sql ) ) {
            return;
        }
        $this->data = $query->fetch_assoc();
    }

    public function getData( $key = "" ) {
        if ( $key != "" ) {
            return $this->data[ $key ];
        }
        return $this->data;
    }

    public function setData( $key, $value ) {
        $this->data[ $key ] = $value;
    }

    public function update() {
    }

}
