<?php

namespace App\Database;

/**
 * connection to database
 *
 */
class Connection {

    /**
     * mysqli object
     * 
     * @var object mysqli instance
     */
    private $connection = null;

    public function __construct() {
        
        $server = DB_SERVER;
        $username = DB_USER;
        $password = DB_PASS;
        $dbname = DB_NAME;

        // set try-catch for mysqli connection and stop the script
        mysqli_report( MYSQLI_REPORT_STRICT );
        try {
            $this->connection = new \mysqli( $server, $username, $password, $dbname );
        } catch ( mysqli_sql_exception $ex ) {
            // do error
            die( $ex->getMessage() );
        }
    }

    /**
     * get mysqli instance
     * 
     * @return object
     */
    public function getConnection() {
        return $this->connection;
    }

}
