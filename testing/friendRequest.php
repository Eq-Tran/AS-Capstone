<?php

session_start(); 

  include __DIR__ . '/model/modelFriend.php';
  include __DIR__ . '/include/includes.php';
    
  $myId= $_SESSION['userid'];
  echo $myId;
  $friendId = filter_input(INPUT_GET, 'friendId');
  sendFriendRequest($myId, $friendId);
  
  
  var_dump($_GET['friendId']);

?>
<DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Sending a friend request</title>    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  </head>
  <body>
    <div class="container">
      <nav>
        <ul>
          <li><a href="search.php">search</a></li>
          <li><a href="notifications.php" class="active">notifications</a></li>
          </ul>
      </nav>
    </div>
    <div class = "container">
      <h1>Friend Request has been sent</h1>

      <a href="search.php">go back</a>
    </div>
  </body>
</html>