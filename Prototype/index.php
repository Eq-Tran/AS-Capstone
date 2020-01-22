<?php
    
    session_start();
    
    if(!isset($_SESSION['use'])) 
       {
        header("Location: index.php");
       }    
    else{
        header("Location: login.php");
    }   
       
          

          


    include __DIR__. '/model.php';
    include __DIR__. '/function.php';
    
    
    
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
   
<?php echo "Welcome to Page one";
 echo "<a href='logout.php'> Logout</a> ";
?>

</body>
</html>