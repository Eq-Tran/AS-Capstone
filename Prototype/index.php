<?php
  
    session_start();
    include (__DIR__ . '/Models/model_functions.php');
    include (__DIR__ . '/Models/post_request_functions.php');
    
    if(!isset($_SESSION['use']))
    {
        header('Location:login.php');
    }
    
    echo "Hello ";
    echo $_SESSION['use'];
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
 <br>
 <br>
 <br>
    <?php 
    /*Test for user login after login works*/
        echo "Welcome User";
        
    ?>
 <br>
 <br>
 <br>
 <br>
    <?php
    
    ?>

</body>
</html>