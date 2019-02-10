<?php
/**
 * @author Jonas.Sørensen
 * @created 10-02-2019
 */
require_once("../helper/authChecker.php");
require_once("../helper/dataCollector.php");

class product extends dataCollector {

    public function find() {

        //Make middleware check
        if(authChecker::check($username, $password, $storeId) == true) {
            dataCollector::findData($searchStr);
        }
    }

    public function create() {

    }

    public function update() {

    }

    public function remove() {

    }

}