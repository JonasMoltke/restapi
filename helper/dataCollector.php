<?php
/**
 * @author Jonas.Sørensen
 * @created 10-02-2019
 */

require_once("../config/dbConnect.php");
require_once("../logs/logger.php");

class dataCollector extends dbConnect {

    //Define class variables
    private $connection;

    /**
     * dataCollector constructor.
     * @param $connection
     *
     * Keep and make use of database connection
     */
    public function __construct($connection) {

        //Initialize connection
        $this->connection = $connection;

    }

    /**
     * @author Jonas.Sørensen
     * @created 10-02-2018
     * @param $query
     * @return mixed
     *
     * Read from database with PDO
     */
    public function read($query) {

        //Prepare SQL command
        $result = $this->connection->prepare($query);

        //Execute SQL command
        $result->execute();

        //Return SQL result
        return $result;

    }

    public function create() {

    }

    public function update() {

    }

    public function delete() {

    }

    /**
     * @author Jonas.Sørensen
     * @created 10-02-2019
     * @param $str
     * @return mixed
     *
     * Get data from table products matching search string
     */
    public function findData($str) {

        //Make SQL Query
        $result = $this->read("SELECT name, picture, link FROM products WHERE name LIKE '%" . $str . "%'");

        //Return result
        return $result;

    }

}