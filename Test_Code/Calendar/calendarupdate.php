<?php

include __DIR__ . '/Models/model_functions.php';
include __DIR__ . '/Models/post_request_functions.php';



$data = showAllUserPosts();


$s = json_encode($data);



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
                
            </form>
        </div>
    </body>
</html>
=======
echo $s;
?>
