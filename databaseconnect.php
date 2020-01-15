<?php

function getDatabase(){
    
    
    $config = array(
        'DB_DNS' => "mysql:host=127.0.0.1;port=3306;dbname=capstone",
        'DB_USER' => 'root',
        'DB_PASSWORD' => 'password'
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
var_dump($db);



?>