<?php
  session_start();
  include __DIR__ . '/model/modelFriend.php';
  include __DIR__ . '/include/includes.php';
  
  
    $requestNum = request_notification($_SESSION['loggedOn'], false);
    $friendNum = getAllFriends($_SESSION['loggedOn'], false);
    $allrequests = request_notification($_SESSION['loggedOn'], true);
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
    <title>Notification Page</title>
</head>
<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="search.php">search</a></li>
                <li><a href="index.php" class="active">index</a></li>
            </ul>
        </nav>
    </div>
    <div class="container">
        <?php
         echo "You Have ";
         echo $requestNum;
         echo " friend requests";
        if ($requestNum > 0)
        {                
            echo '<div class="user_box">
            <div class="user_info">
            <table class="table table-striped">
            <tr>
            <th>Name</th>
            <th>Request</th>
            </tr>';
            foreach($allrequests as $row)
            {
                echo '
                <tr>
                <td><span><a href="friendProfile.php?id='.$row->sender.'" class="see_profileBtn">'.$row->username.'</a></span></td>
                <td>Request</td>
            </div>';
            }
        
        }
        else{
            echo '<h4>You have no friend reuests today</h4>';
        }
        ?>
    </div>
</body>
</html>