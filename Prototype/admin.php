<?php

 
    session_start();
    include __DIR__. '/../Models/model_functions.php';
    include __DIR__. '/../Models/post_request_functions.php';
    
    if(!isset($_SESSION['admin']))
    {
        header('Location:login.php');
    }
    
    echo "Hello ";
    echo $_SESSION['admin'];
    echo "<a href='logout.php'> Logout</a> ";
    
    $userid = filter_input(INPUT_GET, 'userid');
    $uname = filter_input(INPUT_GET, 'uname');
    $email = filter_input(INPUT_GET, 'email');
    $first = filter_input(INPUT_GET, 'first');
    $middle = filter_input(INPUT_GET, 'middle');
    $last = filter_input(INPUT_GET, 'last');
    $profile = showUser($userid);
      
       
    
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
    ?>
 <br>
 
 <table class="table">
     <thread>
         <tr>
             <th>userid</th>
             <th>uname</th>
             <th>email</th>
             <th>first</th>
             <th>middle</th>
             <th>last</th>             
         </tr>
     </thread>
 </table>
 
<tbody>
    <tr>
       <td><?php echo $_SESSION['userid']; ?></td>
                    <td><?php echo $profile['uname']; ?></td>
                    <td><?php echo $profile['email']; ?></td>
                    <td><?php echo $profile['first']; ?></td>
                    <td><?php echo $profile['middle']; ?></td>
                    <td><?php echo $profile['last']; ?></td> 
    </tr>
</tbody>

</body>
</html>
