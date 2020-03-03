<?php

include (__DIR__ .'/databaseconnect.php');

    /*

     * DB TABLE
     * ID
     * First
     * Middle 
     * Last
      
     
    */

   function show(){
       
       global $db;
       
       $results = [];
       $query = $db->prepare("SELECT * FROM test");
       
       if($query->execute() && $query->rowCount() > 0){
           
           $results = $query->fetchAll(PDO::FETCH_ASSOC);
           
       }
       
       return ($results);
       
   }
   
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