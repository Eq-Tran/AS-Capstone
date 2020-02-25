<?php

 
    session_start();
    include __DIR__. '/../../Models/model_functions.php';
    include __DIR__. '/../../Models/post_request_functions.php';
    
    if(!isset($_SESSION['admin']))
    {
        header('Location:admin.php');
    }
    
    
    $profile = showUser($_SESSION['admin']);
    
    $userid = filter_input(INPUT_GET, 'userid');
    $uname = filter_input(INPUT_GET, 'uname');
    $email = filter_input(INPUT_GET, 'email');
    $first = filter_input(INPUT_GET, 'first');
    $middle = filter_input(INPUT_GET, 'middle');
    $last = filter_input(INPUT_GET, 'last');
    
      
    echo "Hello ", $profile['uname'];
    echo "<a href='logout.php'> Logout</a> ";   
    
?>

<html lang="en">
    
<head>
    
  <title>Test Front Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>

<body>
 <br>
    <?php 
    /*Test for user login after login works*/
        echo "Welcome User";
        
    ?>
 <br>
 <br>
    <?php
    /*Test for Admin Cred after login works*/
        echo "ONLY ADMINS SEE THIS";
        $show = showAllUserPosts();
    ?>

</body>
</html>

