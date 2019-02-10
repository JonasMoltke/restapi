<?php
/**
 * @author Jonas.Sørensen
 * @created 10-02-2019
 */

require_once("../config/dbConnect.php");
require_once("../logs/logger.php");

class dataHandler {

    /**
     * @author Jonas.Sørensen
     * @created 10-02-2019
     * @param $str
     * @return mixed
     *
     * Get data from table products matching search string
     */
    public function findData($str, $storeId) {

        try {

            //Make SQL Query
            $sql = "SELECT `name`, `picture`, `link` FROM `products` WHERE `name` LIKE '%" . $str . "%' AND `store_id` = " . $storeId . "";

            //Make CB connection
            $db_connection = dbConnect::connect();

            //Fire SQL command
            $query = $db_connection->query($sql);

            //Fetch all results
            $result = $query->fetch_all(MYSQLI_ASSOC);

            //Close DB connection
            dbConnect::close();

        } catch(Exception $e) {

            //Close DB connection
            dbConnect::close();

            //Log exception
            Logger::log('Error: ' . $e->getMessage(), 'exception');
            die("Couldn't fire findData");

        }

        //Return result
        return $result;

    }

    /**
     * @author Jonas.Sørensen
     * @created 10-02-2019
     * @param $p_name
     * @param $p_picture
     * @param $p_link
     * @param $storeId
     * @return mixed
     *
     * * Add data to table products
     */
    public function createData($p_name, $p_picture, $p_link, $storeId) {

        try {

            //Make SQL Query
            $sql = "INSERT INTO `products` (name, picture, link, store_id) VALUES ('" . $p_name . "', '" . $p_picture . "', '" . $p_link . "', " . $storeId;

            //Make CB connection
            $db_connection = dbConnect::connect();

            //Fire SQL command
            $result = $db_connection->query($sql);

            //Close DB connection
            dbConnect::close();

        } catch(Exception $e) {

            //Close DB connection
            dbConnect::close();

            //Log exception
            Logger::log('Error: ' . $e->getMessage(), 'exception');
            die("Couldn't fire createData");

        }

        //Return result
        return $result;

    }

    /**
     * @author Jonas.Sørensen
     * @created 10-02-2019
     * @param $p_name
     * @param $p_picture
     * @param $p_link
     * @param $storeId
     * @return mixed
     *
     * * Update data in table products
     */
    public function updateData($p_name, $p_picture, $p_link, $storeId) {

        try {

            //Make SQL Query
            $sql = "UPDATE `products` set name='" . $p_name . "', picture='" . $p_picture . "', link='" . $p_link . "' WHERE storeId = " . $storeId;

            //Make CB connection
            $db_connection = dbConnect::connect();

            //Fire SQL command
            $result = $db_connection->query($sql);

            //Close DB connection
            dbConnect::close();

        } catch(Exception $e) {

            //Close DB connection
            dbConnect::close();

            //Log exception
            Logger::log('Error: ' . $e->getMessage(), 'exception');
            die("Couldn't fire updateData");

        }

        //Return result
        return $result;

    }

    /**
     * @author Jonas.Sørensen
     * @created 10-02-2019
     * @param $p_name
     * @param $p_picture
     * @param $p_link
     * @param $storeId
     * @return mixed
     *
     * Delete row in table products
     */
    public function deleteData($p_id, $storeId) {

        try {

            //Make SQL Query
            $sql = "DELETE from `products` WHERE id = " . $p_id . " AND storeId = " . $storeId;

            //Make CB connection
            $db_connection = dbConnect::connect();

            //Fire SQL command
            $result = $db_connection->query($sql);

            //Close DB connection
            dbConnect::close();

        } catch(Exception $e) {

            //Close DB connection
            dbConnect::close();

            //Log exception
            Logger::log('Error: ' . $e->getMessage(), 'exception');
            die("Couldn't fire deleteData");

        }

        //Return result
        return $result;

    }

}