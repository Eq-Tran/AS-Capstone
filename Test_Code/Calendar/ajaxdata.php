<?php
include_once __DIR__ . '/functions.php';
include_once __DIR__ . '/Models/post_request_functions.php';


$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

if($contentType === "application/json"){
    
    
    $content = trim(file_get_contents("php://input"));
    $decoded = json_decode($content, true);
    
    // If json decode fails
    if(is_array($decoded)){
            

        if($action == 'add'){
            
           
            $first = $decoded["first"];
            $middle = $decoded["middle"];
            $last = $decoded["last"];
            $action = $decoded['action'];
            $results = add($first,$middle,$last);
            echo json_encode($results);
            
        }elseif($action == 'delete'){
         
          
            $first = $decoded["first"];
            $middle = $decoded["middle"];
            $last = $decoded["last"];
            $results = delete($first,$middle,$last);
            
        }
        

    }else{
        
        echo "error";
        
    }
}
    


?>