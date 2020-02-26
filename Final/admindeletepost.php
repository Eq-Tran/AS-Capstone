<?php
    include __DIR__. '/../Models/model_functions.php';
    include __DIR__. '/../Models/post_request_functions.php';
    
    $postid = filter_input(INPUT_GET, 'id');
    
    deleteUserPost($postid);
    
    header("Location: admin.php");
?>

