<?php

    include (__DIR__ . '/db.php');
    
    function addSchool ($name, $city, $state) {
        global $db;
        $results = "";
        $stmt = $db->prepare("INSERT INTO schools SET schoolName = :name, schoolCity = :city, schoolState = :state");

        $binds = array(
            ":name" => htmlspecialchars ($name),
            ":city" => htmlspecialchars ($city),
            ":state" => htmlspecialchars ($state)
            
        );
            
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = 'Data Added';
        }
        
        if ($results == "") {
            var_dump ($binds);
            exit;
        }
        return ($results);
    }
    
    function getAllSchools () {
        global $db;
        
        $results = [];
        $stmt = $db->prepare("SELECT id, schoolName, schoolCity, schoolState FROM schools");
 
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
             $results = $stmt->fetchAll(PDO::FETCH_ASSOC);               
         }
         
         return ($results);
    }
    
   function deleteAllSchools () {
       global $db;
       
       $stmt = $db->query("DELETE FROM schools;");
       
       
       return 0;
   }
   
   function checkLogin ($user, $pass) {
       global $db;
       
       $results = [];
       $stmt = $db->prepare("SELECT * FROM user WHERE user_name = :user AND pass = sha1(:pass)");
       
       $binds = array(
           ":userame" => $user,
           ":password" => $pass
       
        );
       
       if($stmt->execute($binds) && $stmt->rowCount() > 0){
          
          $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
          
       }
       else{
           
           return (false);
           
       }
       
       
       return ($results);
   }
   
   function getSchools ($name, $city, $state) {
       global $db;
       
       $binds = array();
       $sql = "SELECT * FROM schools WHERE 0=0 ";
       if ($name != "") {
            $sql .= " AND schoolName LIKE :schoolName";
            $binds['schoolName'] = '%'.$name.'%';
       }
       if ($city != "") {
           $sql .= " AND schoolCity LIKE :city";
           $binds['city'] = '%'.$city.'%';
       }
       if ($state != "") {
           $sql .= " AND schoolState LIKE :state";
           $binds['state'] = '%'.$state.'%';
       }
       
       $stmt = $db->prepare($sql);
      
        $results = array();
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return ($results);
   }
   
   function insertSchools($file_name){
       $file = fopen($file_name, 'rb');
       $school = fgetcsv($file);
       
       while(!feof($file)){
           
           $school = fgetcsv($file);
           $addSchool = addSchool($school[0], $school[1], $school[2]);
          echo $addSchool[0].$addSchool[1].$addSchool[2];
          
        }
       
   }
   
   $file_Name = "schools.csv";
   $s = insertSchools($file_name);
   
   var_dump($s);
   echo $s;
   ?>
   
