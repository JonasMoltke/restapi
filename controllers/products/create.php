<?php
/**
 * @author Jonas.Sørensen
 * @created 10-02-2019
 */

/** ADD headers here. We probably need some access-control-max-age and access-control-allow-headers aswell, this i did not add */
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");

//Add requires
require_once '../../config/dbConnect.php';
require_once '../product.php';

class create
{

    //Make call to handleData function
    private function __construct() {
        $this->handleData();
    }

    /**
     * @author Jonas.Sørensen
     * @created 10-02-2019
     *
     * Handle delete API requests
     */
    private function handleData()
    {

        //Get posted data end JSON decode it
        $postedData = json_decode(file_get_contents("php://input"));

        //Check if any necessary fields empty
        if (empty($postedData) OR empty($postedData->name) OR empty($postedData->picture) OR empty($postedData->link) OR empty($postedData->store_id)) {
            exit('One or several of the required fields were found empty');
        }

        $product = new Product();

        $result = array();
        $result["body"] = array();

        try {

            //Find products matching search terms
            $product->createProduct($postedData->name, $postedData->picture, $postedData->link, $postedData->store_id);

            $result =
                json_encode(
                    array(
                        "result" => 'success'
                    )
                );

        } catch(Exception $e) {

            $result =
                json_encode(
                    array(
                        "result" => 'fail'
                    )
                );

        }

        //Echo result
        echo $result;

    }
}
?>