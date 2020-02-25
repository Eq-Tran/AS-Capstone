<?php

function getDatabase(){
    
    
    $config = array(
        'DB_DNS' => "mysql:host=ict.neit.edu;port=5500;dbname=se266_ethan",
        'DB_USER' => 'se266_ethan',
        'DB_PASSWORD' => 'ethan'
    );
        //Creates a database connection and saves it into a variable
    $db = new PDO($config['DB_DNS'], $config['DB_USER'], $config['DB_PASSWORD']);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    /*
    try{
        //Creates a database connection and saves it into a variable
    $db = new PDO($config['DB_DNS'], $config['DB_USER'], $config['DB_PASSWORD']);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch(Exception $ex){
        
        //if connection fails the connection gets closed by setting the variable to null
        $db = null;
        
        echo $ex->getMessage();
        exit();
    }*/
    
    return $db;
}

$db = getDatabase();
//var_dump($db);



?>