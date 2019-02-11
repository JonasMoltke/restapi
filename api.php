<?php
/**
 * @author Jonas.Sørensen
 * @created 10-02-2019
 */

/**
 * This class should include routing files to make the create, remove, update, get events actually fire on correct URL paths
 * Unfortunate i didn't have time to make this logic happen
 *
 * Nginx/Apache should use this file as main file for the path
 *
 * Router should point to those locations:
 * controllers/products/create.php
 * controllers/products/delete.php
 * controllers/products/find.php
 * controllers/products/update.php
 */
class api
{
    private function __construct()
    {
        require_once("controllers/product.php");
    }
}