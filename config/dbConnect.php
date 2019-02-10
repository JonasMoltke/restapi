<?php
/**
 * @author Jonas.Sørensen
 * @created 10-02-2019
 */

//Include logging functionality
require_once '../logs/log.php';

/**
 * Class DBConnect
 *
 * Connect to database and make ready to execute SQL commands
 */
class dbConnect
{

    /**
     * Our database information for connecting to the database
     */
    private $db_host = 'localhost'; //database host
    private $db_user = 'wa_autobalancer'; //database username
    private $db_pass = 'password123'; //database password
    private $db_database = 'wa'; //database to use

    public $connection;

    /**
     * @author Jonas.Sørensen
     * @created 10-02-2019
     * @return mysqli
     *
     * make the connection
     * if error, make use of our logger
     */
    public function connect() {

        $this->connection = null;

        try {

            //Establish connection
            $this->connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_database) or die("Couldn't connect to database");

        } catch(Exception $e) {

            //Log exception
            Logger::log('Error: ' . $e->getMessage(), 'exception');
            die("Couldn't connect to database");

        }

        //Return connection
        return $this->connection;
    }

    /**
     * @author Jonas.Sørensen
     * @created 10-02-2019
     *
     * Close SQL connection
     */
    public function close() {

        try {

            //Close connection
            $this->connection->close();

        } catch(Exception $e){

            //Log exception
            Logger::log('Error closing SQL: ' . $e->getMessage(), 'exception');
            die("Couldn't close SQL");

        }
    }

}