<?php
/**
 * @author Jonas.Sørensen
 * @created 10-02-2019
 */

require_once("../config/dbConnect.php");
require_once("../logs/logger.php");

class dataHandler
{
    /**
     * @author Jonas.Sørensen
     * @created 10-02-2019
     * @param $str
     * @return mixed
     *
     * Get data from table products matching search string
     */
    public static function findData($str, $storeId)
    {
        try {
            //Make SQL Query
            $sql = "SELECT name, picture, link FROM `products` WHERE name LIKE ? AND store_id = ?";

            //Make CB connection
            $db_connection = dbConnect::connect();

            //Fire SQL command
            $query = $db_connection->prepare($sql);

            //We want a LIKE %$str% (contains match)
            $str = '%' . $str . '%';

            //Bind params
            $query->bind_param("si", $str, $storeId);

            //Execute prepared query
            $result = $query->execute();

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
    public static function createData($p_name, $p_picture, $p_link, $storeId)
    {
        try {
            //Make SQL Query
            $sql = "INSERT INTO `products` (name, picture, link, store_id) VALUES (?, ?, ?, ?)";

            ///Make CB connection
            $db_connection = dbConnect::connect();

            //Fire SQL command
            $query = $db_connection->prepare($sql);

            //Bind params
            $query->bind_param("sssi", $p_name, $p_picture, $p_link, $storeId);

            //Execute prepared query
            $result = $query->execute();

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
    public static function updateData($p_name, $p_picture, $p_link, $storeId)
    {
        try {

            //Make SQL Query
            $sql = "UPDATE `products` set name=?, picture=?, link=? WHERE storeId=?";

            //Make CB connection
            $db_connection = dbConnect::connect();

            //Fire SQL command
            $query = $db_connection->prepare($sql);

            //Bind params
            $query->bind_param("sssi", $p_name, $p_picture, $p_link, $storeId);

            //Execute prepared query
            $result = $query->execute();

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
    public static function deleteData($p_id, $storeId)
    {
        try {

            //Make SQL Query
            $sql = "DELETE from `products` WHERE id=? AND storeId=?";

            //Make CB connection
            $db_connection = dbConnect::connect();

            //Fire SQL command
            $query = $db_connection->prepare($sql);

            //Bind params
            $query->bind_param("si", $p_id, $storeId);

            //Execute prepared query
            $result = $query->execute();

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