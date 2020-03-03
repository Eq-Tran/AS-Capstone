<?php

include (__DIR__ .'/databaseconnect.php');

    /*

     * DB TABLE
     * ID
     * First
     * Middle 
     * Last
      
     
    */


   function add($first, $middle, $last){
       
       global $db;
       
       $results = [];
       $query = $db->prepare("INSERT INTO test SET first = :first, middle = :middle, last = :last");
       $paramBind = array(
           
           ":first" => $first,
           ":middle" => $middle,
           ":last" => $last,
           
       );
       
       
       
       if($query->execute($paramBind) && $query->rowCount() > 0){
           
           
           $results = "Added!";
           
           
       }
       
       
       return $results;
   }






?>