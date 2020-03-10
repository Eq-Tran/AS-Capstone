<?php
    session_start();  
    include (__DIR__ . '/../Models/model_functions.php');
    include (__DIR__ . '/../Models/post_request_functions.php');
    //session 'use' keeps users logged on-- stores their id
    $_SESSION['use'];
    $myId= $_SESSION['use'];
    $err = "";
    //friendId will store the other user's IDs
    $friendId = '';
    //if user has no friends results will list all of the users in the system so that new user can start searching for friends
    //if user has friends it will list their friends
    $results=[];
    //getAllFriends true sends back an array of the friends
    //getAllFriends false returns the number of friends the user has
    $results = getAllFriends($myId, true);
    $friendsNum = getAllFriends($myId, false);
    //echo $friendsNum;
    //var_dump($results);
    //$results = getusers($myId);
    //grabs friendId from the href so request can be set   
    $friendId= filter_input(INPUT_GET, 'friendId');

    if (isPostRequested('search'))
    {
      $User = filter_input(INPUT_POST,'username');
      $results = findUser($User,$myId);
      //echo "search";
    }

    //this is here for testing purposes--making sure that it is grabbing correct id numbers
    /*
    echo "My Id is: ";
    echo $myId;
    echo "<br> My friends id is: ";
    echo $friendId;
    */
    //var_dump($results);
    //var_dump($myId);
    sendFriendRequest($myId, $friendId);
    
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search Friends</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
            <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <div>
        
        <nav class="navbar">
            <div class="container-fluid">
                
              <!--<div class="collapse navbar-collapse" id="myNavbar">-->
                  
              <ul class="nav navbar-nav navbar-right">
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
        <h1>Looking for Someone?</h1>

        <form class="form-horizontal searchform" action="friends.php" method="post">
          <div class="form-group">

            <!-- <label class="control-label col-sm-2" for="username">UserName:</label>-->
            <div class="col-sm-10 ">
              <input type="text" class="form-control searchbox" name="username" placeholder="Enter Username" >
              
            </div>
          </div>
          <div class="form-group">        
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn button" name="search">Search</button>
            </div>
          </div>
         </form>
          <form class="form-horizontal" action="friends.php" method="get">
          <table class="table table-hover friendstable">
            <thead>
                <th></th>
              <th></th>
              <th></th>
            </thead>
            <tbody>
            <?php foreach($results as $row):?>
              <tr>
              <td><img src="images/<?php echo $row['profile_image']; ?>" alt="profile image"></td>
              
              <td><span><a href="friendProfile.php?id=<?php echo $row['userid'] ?>"><?php echo $row['uname']; ?></a></span></td>
              
              <?php 
              if (checkFriends($myId, $row['userid']) === false){
                if (checkRequest($myId, $row['userid']) === true)
                {
                  
                  echo "<td><a href='notifications.php'>Request Pending</a></td>";

                }
                else{
                  echo "<td><a href='friends.php?friendId='" . $row['userid']. "' class ='btn btn-success' name='addFriend'>Add Friend</a></td>";
                }
                
              }else{
                echo "<td> </td>";
              }
              ?>   
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
                  
        </form>

        
    </div>

</body>
<footer class="page-footer iekfooter"><p>Created by: Ethan Tran, Karissa Smith, Ian Shippee</p></footer>   
</html>