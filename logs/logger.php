<?php
/**
 * @author Jonas.Sørensen
 * @created 10-02-2019
 */

/**
 * Class Logger
 *
 * Make use of this class to log errors, system messages, debug etc.
 */
class Logger
{

    /**
     * @author Jonas.Sørensen
     * @created 10-02-2019
     * @param $str
     * @param string $file
     * @return bool
     *
     * Logs string + file. Fallback file is system.log
     */
    public static function log($str, $file = 'system')
    {
         try {
             //Define file name
             $filename = $file . '.log';

             //Get current content
             $fileContent = file_get_contents($filename);

             //Add extra content
             $fileContent .= $str . '\n';

            //Update content
            file_put_contents($filename, $fileContent);

            return true;
         } catch(Exception $e) {
             //Echo out error directly
             echo 'ERROR: ' . $e->getMessage();

             return false;
         }
    }
}