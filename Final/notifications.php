<?php
    session_start();
    include __DIR__. '/../Models/model_functions.php';
    include __DIR__. '/../Models/post_request_functions.php';
    
    $myId= $_SESSION['use'];
    //echo $myId;
  //Counts the number of notifications that the user has
    $requestNum = requestNotification($myId, false);
    $allrequests = requestNotification($myId, true);
    $response = filter_input(INPUT_GET, 'response');
    $friendId = intval(filter_input(INPUT_GET, 'friendId'));
    $sentRequests = [];
    $sentRequests= getSentRequests($myId, true);
    $sentRequestsNum = getSentRequests($myId, false);
    //echo $response;
    //var_dump($sentRequestsNum);
    //this works but doesnt refresh the first time
    if (isGetRequested())
    {

        //echo $response;
        if ($response === 'accept')
        {
            //echo 'accepted friend request';
            //$friendId = filter_input(INPUT_GET, 'friendId');

            //testing to make sure we are grabbing the correct friend ID
            //echo '<br> Your friends ID: ' . $friendId;
            $friends= makeFriends($myId, $friendId);
            //echo $friends;
    
        }
        else if ($response === 'deny'){
            //echo "deny friend request";
            //echo '<br> Your friends ID: ' . $friendId;
            $results = deleteFromRequests($myId, $friendId);
            //var_dump($results);
            //echo $results;
            
        }


        //header("location: notifications.php");
    }
?>

<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <!-- Latest compiled and minified CSS -->
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
            <link rel="stylesheet" href="styles/style.css">
    <title>Notification Page</title>
   
    
</head>
<body>
    
    <div>
        
        <nav class="navbar">
            <div class="container-fluid">
                
              <div class="navbar-header">
                <!--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>-->
                
                
              </div>
              <!--<div class="collapse navbar-collapse" id="myNavbar">-->
                  
                <ul class="nav navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php"><i>GO</i></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="profile.php"><i class=" material-icons">person</i></a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="friends.php"><i class=" material-icons">group</i></a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="notifications.php"><i class=" material-icons">person_add</i></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="logout.php"><i class=" material-icons">power_settings_new</i></a>
                      </li>
                      
                    </ul>
                
              <!--</div>-->
            </div>
          </nav>
    </div>
    <div class="container">
        <div class="tab nav-tabs">
          <button class="tablinks " onclick="openRequest(event, 'friendRequests')" id="defaultOpen">Friend Requests</button>
          <button class="tablinks " onclick="openRequest(event, 'requestsSent')">Requests Sent</button>
        </div>

        <div id="friendRequests" class="tabcontent">
          <?php
              if ($requestNum > 0)
              {             
                //echo "You Have ";
              //echo $requestNum;
              //echo " friend requests";            
                  echo '
                  <form action="notifications.php" id="form">
                  <div class="user_box">
                  <table id="table" class="table table-hover friendstable" >
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
                      <td><a href="notifications.php?response=accept&friendId='. $row->sender .'" class= "btn btn-success" type="button"  name="acceptFriend" id="button" value="accept">Accept</a></td>
                      <td><a href="notifications.php?response=deny&friendId='. $row->sender .'" class= "btn btn-danger" type="button" name="denyFriend" id="button" value="deny">Deny</a></td>';
                  echo '</div>';
                      
                  }
                  echo '</form>';
                  
              }
              else{
                  
                  echo '<div><h4>You have no friend requests today</h4></div>';
              }
              //echo $_POST['friendResponse'];

                  
              ?>
        </div>
        <div id="requestsSent" class="tabcontent" >
          <?php
              //echo $sentRequestsNum;
              if ($sentRequestsNum > 0)
              {
                echo '
                <form action="notifications.php" id="form">
                <div class="user_box">
                <table id="table" class="table table-hover friendstable" >
                <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                </tr>';
                //echo "You Have ";
                //echo $sentRequestsNum;
                //echo " sent requests";       
                  foreach($sentRequests as $row)
                  {
            
                    echo '
                    <tr>
                    <td><span><a href="friendProfile.php?id='.$row->receiver.'" class="see_profileBtn">'.$row->uname.'</a></span></td>
                    <td><a href="notifications.php?response=deny&friendId='. $row->receiver .'" class= "btn btn-danger" type="button" name="cancelFriend" id="button" value="cancel">Cancel</a></td>';
                    echo '</div>';
                    
                }
                echo '</form>';
                
              }
              else{
                echo '<div><h4>You have no Sent Requests</h4></div>';
              }
          ?>


        </div>
      </div>
    <footer class="page-footer iekfooter"><p>Created by: Ethan Tran, Karissa Smith, Ian Shippee</p></footer>   
    <script>
      function openRequest(evt, requests) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(requests).style.display = "block";
        evt.currentTarget.className += " active";
      }

      // Get the element with id="defaultOpen" and click on it
      document.getElementById("defaultOpen").click();
</script>
</body>

</html>