<?php
/**
 * Function to extablish a databse connection
 * 
 * @return PDO Object
 */  
function getDatabase() {
    $config = array(
            'DB_DNS' => 'mysql:host=ict.neit.edu;port=5500;dbname=se266_008002648',
            'DB_USER' => 'se266_008002648',
            'DB_PASSWORD' => '008002648'
        );

    try {
        /* Create a Database connection and 
         * save it into the variable */
        $db = new PDO($config['DB_DNS'], $config['DB_USER'], $config['DB_PASSWORD']);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (Exception $ex) {
        /* If the connection fails we will close the 
         * connection by setting the variable to null */
        $db = null;
        echo $ex->getMessage();
        exit();
    }

    return $db;
}

$db = getDatabase();

?>