<?php

include (__DIR__ . '/db.php');
    
    function getActors () {
        global $db;
        
        $results = [];
        $stmt = $db->prepare("SELECT id, firstname, lastname, dob, height FROM actors");
        $stmt->execute();
        
        
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
             $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        
         }
         
         return ($results);
    }
    
    function addActor ($firstname, $lastname, $dob, $height) {
        global $db;
        
        $stmt = $db->prepare("INSERT INTO actors SET firstname = :fname, lastname = :lname, dob = :dob, height = :height");

        $binds = array(
            ":fname" => $firstname,
            ":lname" => $lastname,
            ":dob" => $dob,
            ":height" => $height
        );
            
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = 'Data Added';
        }
        
        return ($results);
    }
    


