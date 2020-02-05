<?php
  session_start();
  include __DIR__ . '/model/modelFriend.php';
  include __DIR__ . '/include/includes.php';
  $user = filter_input(INPUT_GET, 'user');
  $_SESSION['loggedOn'];
  $myId = $_SESSION['userid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <title>Home Page</title>

</head>
<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="search.php?">search</a></li>
                <li><a href="notifications.php" class="active">notifications</a></li>
            </ul>
        </nav>
    </div>
    <div class = "container">
        <h2>My id is : <?php $myId ?></h2>

        <p>
            
            This is the index. not sure whats going on here yet. this is just some filler text
        </p>
        <p></p>
    </div>
</body>
</html>