<?php
include_once __DIR__ . '/functions.php';
include_once __DIR__ . '/Models/post_request_functions.php';




$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

if($contentType === "application/json"){
    
    
    $content = trim(file_get_contents("php://input"));
    $decoded = json_decode($content, true);
    
    // If json decode fails
    if(is_array($decoded)){
        
        //need to figure out some kind of validation for this
        // echo json_encdoe($decoded['first"])
        //if($first["first"] != null ||  $last["last"] != null)
        //{
            $id = $decoded['id'];
            $first = $decoded["first"];
            $middle = $decoded["middle"];
            $last = $decoded["last"];
            $action = $decoded['action'];
            
            if($action == "add"){
                
                $results = add($first,$middle,$last);
                echo json_encode($results);         
                
            }else if($action == "delete"){
                
                $results = delete($id);
                echo json_encode($results);
                
            }
       // }else{
            
            
           // echo "First and Last Required Try Again";
            
       // }
        
    }else{
        
        echo "ERROR could not make request";
        
    }
    
}



?>