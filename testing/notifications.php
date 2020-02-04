<?php
  session_start();
  include __DIR__ . '/model/modelFriend.php';
  include __DIR__ . '/include/includes.php';
  $myId= $_SESSION['userid'];
  echo $myId;
  //Counts the number of notifications that the user has
    $requestNum = request_notification($myId, false);
    //friend number counts the number of friends
    $friendNum = getAllFriends($myId, false);
    $allrequests = request_notification($myId, true);
    $response = filter_input(INPUT_GET, 'response');
            
    if (isPostRequest())
    {

        
        echo $response;
        if ($response == 'accept')
        {
            echo 'accepted friend request';
            $friendId = filter_input(INPUT_GET, 'friendId');
            echo '<br> Your friends ID: ' . $friendId;
        }
        else if ($response == 'deny'){

            echo 'deny friend Request';
        }
    }

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
            echo '
            <form action="notifications.php" method="post">
            <div class="user_box">
            <div class="user_info">
            <table class="table table-striped" >
            <tr>
            <th>Name</th>
            <th></th>
            <th></th>
            <th></th>
            </tr>';
            foreach($allrequests as $row)
            {
                echo '
                <tr>
                <td><span><a href="friendProfile.php?id='.$row->sender.'" class="see_profileBtn">'.$row->uname.'</a></span></td>
                <td><a href="notifications.php?friendId='.$row->sender.'&response=accept" class= "btn btn-success" type="submit" name="friendResponse" value="accept">Accept</a></td>
                <td><a href="notifications.php?friendId='.$row->sender.'&response=deny" class= "btn btn-danger" type="submit" name="friendResponse"  value="deny">Deny</a></td>
            </div>';
                
            }
            echo '</form>';
            
        }
        else{
            echo '<h4>You have no friend reuests today</h4>';
        }
        //echo $_POST['friendResponse'];


        ?>
    </div>
</body>
</html>