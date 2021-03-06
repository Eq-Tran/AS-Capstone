<?php
    session_start();
    include __DIR__. '/../Models/model_functions.php';
    include __DIR__. '/../Models/post_request_functions.php';
    
    $myId = $_SESSION['use'];
    $friendStatus ="";
    $friendId = filter_input(INPUT_GET, 'id');
    $friendId = (int)$friendId;
    $status = filter_input(INPUT_GET, 'status');
    //var_dump($friendId);
    
    //var_dump($friendId);
    $friendStatus= checkFriends($myId, $friendId);
    $profile = showUser($friendId);
    
    
    // Add Image get
    $userid = filter_input(INPUT_GET, 'userid');
    $uname = filter_input(INPUT_GET, 'uname');
    $profile_image = filter_input(INPUT_GET, 'profile_image');
    $email = filter_input(INPUT_GET, 'email');
    $first = filter_input(INPUT_GET, 'first');
    $middle = filter_input(INPUT_GET, 'middle');
    $last = filter_input(INPUT_GET, 'last');
    $birthday = filter_input(INPUT_GET, 'birthday');
    $bio = filter_input(INPUT_GET, 'bio');
    $pw = filter_input(INPUT_GET, 'pass');
    $location = filter_input(INPUT_GET, 'location');

    if($status === 'add')
    {
        sendFriendRequest($myId, $friendId);
    }
    if($status === 'delete')
    {
        deleteFriends($myId, $friendId);
    }
    
?>

<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GO - Profile</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!--Google fonts using Oswald and Hind Siliguri -->
    <link href="https://fonts.googleapis.com/css?family=Hind+Siliguri|Oswald&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="styles/style.css">
    </head>
    
    <body>
        
        <nav class="navbar">
            <div class="container-fluid">
                
              <!--<div class="collapse navbar-collapse" id="myNavbar">-->
                  
              <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php"><i >GO</i></a>
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
    
        <div class="profileContainer container">

            <div class="profileImage">
                <img src="images/<?php echo $profile['profile_image']; ?>" alt="profile image" height="150" width="150">
            </div>      

            <div class= "profileStuff">

                
                <div class="proName"><h1><?php echo $profile['first']; echo " "; echo $profile['middle']; echo " "; echo $profile['last']; ?></h1><br /></div>
                        
                    <div class="proinfo"> 
                            
                        <td>Username: <?php echo $profile['uname']; ?></td><br />
                        <td>Email Address: 
                            <?php if($friendStatus==true){ echo $profile['email'];}  ?>
                        </td><br />
                        <td>Location: <?php if($friendStatus==true){echo $profile['location']; }?></td><br />
                        <td>Birthday:<?php if($friendStatus==true){echo $profile['birthday']; }?></td><br />
                        
                     </div>  
                    <br />
                    <div class="proabout"> 
                        <td><?php if($friendStatus==true){ echo $profile['bio'];} ?></td>
                    </div>
                    <div class="prorequest">
                        <?php 
                        if ($friendStatus==true){
                            echo "<a href='friendProfile.php?status=delete&id=".$friendId."' class ='btn button' name='deleteFriend'><i class='material-icons'>delete</i></a>";
                        }
                        else {
                            if(checkRequest($myId, $friendId)==true)
                            {
                                echo "<a href='notifications.php'>Friend Request Pending</a>";
                            }
                            else{
                            echo "<a href='friendProfile.php?status=add&id=".$friendId."' class ='btn btn-success' name='addFriend'>Add Friend</a>";
                            }
                        }
                        ?>
                     </div>
            
             </div>
            <div class ="proposts">
                    
                <div class ="addpost">
                        
                </div>
                    
                <div class="showpost">
                    
                </div>
                
             </div>
                
         </div>
            
    </body>
<footer class="page-footer iekfooter"><p>Created by: Ethan Tran, Karissa Smith, Ian Shippee</p></footer>           
</html>  
