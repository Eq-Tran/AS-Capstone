<?php

    //include (__DIR__ . '/../../Models/model_functions.php');
    //include (__DIR__ . '/../../post_request_functions.php');
    
    // need to figure out how to pull data from a function and load it into the box on the ajax test page.
    // need to figure out how to create a function that allows you to add to the box as an event.
    // need to figure out how to create a delete function for the box.
    
    //TEST PROG
    $arr = array(
        
        "Ethan" => array("Username" => "Etran"),
        "Ian" => array("Username" => "Ishippee"),
        "Karissa" => array("Username" => "Ksmith"),
        
        
    );
    
    var_dump($arr);
    foreach($arr as $var){
        
       echo $var["Username"]; 
        
        
    }
    

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="#">
    </head>
    <body>
        <div class="box">
            <form method="GET">
                <textarea class="textarea" name="textarea"></textarea>
                <input type="submit" name="button1">
                <p>hello</p>
            </form>
        </div>
    </body>
</html>