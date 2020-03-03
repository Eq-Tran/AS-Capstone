<?php
    include __DIR__. '/../Models/model_functions.php';
    include __DIR__. '/../Models/post_request_functions.php';
    
    
    $userid = filter_input(INPUT_GET, 'id');
    
    
    deleteUser($userid);
    
    header("Location: admin.php");
?>