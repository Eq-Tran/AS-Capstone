<?php

include (__DIR__ . '/db.php');
    
    function getCorp() 
    {
        global $db;
        
        $results = [];
        $stmt = $db->prepare("SELECT id, corp, incorp_dt, email, zipcode, owner, phone FROM corps");
        $stmt->execute();
        
        
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
             $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        
         }
         
         return ($results);
    }
    
    function readCorp($id)
    {
        global $db;
        
        $results = [];
        $stmt = $db->prepare("SELECT * FROM corps WHERE id = :id");
        $bind= array(
            ":id" => $id
            
        );
        if ( $stmt->execute($bind) && $stmt->rowCount() > 0 ) {
             $results = $stmt->fetch(PDO::FETCH_ASSOC);
                        
         }
         
         return ($results);
        
    }
    
    function addCorp ($corp, $incorp_dt, $email, $zipcode, $owner, $phone) {
        global $db;
        
        $stmt = $db->prepare("INSERT INTO corps SET corp = :corp, incorp_dt = now(), email = :email, zipcode = :zip, owner = :owner, phone = :phone");

        $binds = array(
            ":corp" => $corp,
            ":email" => $email,
            ":zip" => $zipcode,
            ":owner" => $owner,
            ":phone" => $phone,
        );
            
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = 'Corp Added';
        }
        
        return ($results);
    }
    
    function sortCorps ($column, $order){
        global $db;
        
        $results = [];
        $stmt = $db->prepare("SELECT * FROM corps ORDER BY $column $order");
     
        
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
             $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        
         }
         
         return ($results);
        
        
    }
    

    function searchCorps ($colum, $keyword){
 
    $db = dbconnect();
    
     
    $stmt = $db->prepare("SELECT * FROM corps WHERE ($colum LIKE '%$keyword%')");
    
    $results = array();
   
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
    return $results;
    }
    
?>