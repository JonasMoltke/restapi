<?php
/**
 * @author Jonas.Sørensen
 * @created 10-02-2019
 */
require_once("../helper/authChecker.php");
require_once("../helper/dataHandler.php");
require_once("../config/apiCredentials.php");

class product {

    public $name;
    public $picture;
    public $link;
    private $credentials;

    public function __construct() {
        $this->credentials = apiCredentials::getCredentials();
    }

    public function find($str, $storeId) {
        //Make middleware check
        if(authChecker::check($this->credentials->username, $this->credentials->password, $storeId) == true) {
            dataHandler::findData($str, $storeId);
        }
    }

    public function create($p_name, $p_picture, $p_link, $storeId) {
        //Make middleware check
        if(authChecker::check($this->credentials->username, $this->credentials->password, $storeId) == true) {
            dataHandler::createData($p_name, $p_picture, $p_link, $storeId);
        }
    }

    public function update($p_name, $p_picture, $p_link, $storeId) {
        //Make middleware check
        if(authChecker::check($this->credentials->username, $this->credentials->password, $storeId) == true) {
            dataHandler::updateData($p_name, $p_picture, $p_link, $storeId);
        }
    }

    public function remove($productId, $storeId) {
        //Make middleware check
        if(authChecker::check($this->credentials->username, $this->credentials->password, $storeId) == true) {
            dataHandler::removeData($productId, $storeId);
        }
    }

}