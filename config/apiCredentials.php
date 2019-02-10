<?php
/**
 * @author Jonas.Sørensen
 * @created 10-02-2019
 */

class apiCredentials
{

    private $credentials = array();

    /**
     * @author Jonas.Sørensen
     * @created 10-02-2019
     * @return mixed
     *
     * Set credentials, get them and return them
     */
    public static function getCredentials() {
        $credentials['email'] = 'test@gmail.com';
        $credentials['password'] = 'hello123';

        //Return credentials
        return $credentials;
    }

}