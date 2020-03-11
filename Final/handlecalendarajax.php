<?php


include __DIR__ . '/../Models/model_functions.php';
include __DIR__ . '/../Models/post_request_functions.php';

//var_dump($_SESSION['use']);
;


$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
if($contentType === "application/json"){
    


    $content = trim(file_get_contents("php://input"));
    $decoded = json_decode($content, true);

    // If json decode fails
    if(is_array($decoded)){

             
            $post = $decoded["post"];
            $day = $decoded["day"];
            //$action = $decoded['action'];
            $userid = $decoded["userid"];
            
            $results = addPost($post, $userid, $day);
            echo json_encode($results);
            

    }else{
        
        echo "error";
        
    }
}
    


?>