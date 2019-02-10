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
    private $db_host = '127.0.0.1'; //database host
    private $db_user = 'wa_autobalancer'; //database username
    private $db_pass = 'password123'; //database password
    private $db_database = 'wa'; //database to use
    private $connection;

    /**
     * @author Jonas.Sørensen
     * @created 10-02-2019
     * @return PDO|null
     *
     * make the connection
     * if error, make use of our logger
     */
    public function connection() {

        $this->connection = null;

        try {
            //Establish connection
            $this->connection = new PDO('
                mysql:host=' . $this->db_host . ';
                dbname=' . $this->db_database,
                $this->db_user,
                $this->db_pass
            );

            //Execute connection
            $this->connection->exec("set names utf8");

        } catch(PDOException $e) {
            //Log exception
            Logger::log('Error: ' . $e->getMessage(), 'exception');
            die();
        }

        return $this->connection;
    }

}