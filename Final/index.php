<?php
    session_start();
    include (__DIR__ . '/../Models/model_functions.php');
    include (__DIR__ . '/../Models/post_request_functions.php');
    
    if(!isset($_SESSION['use']))
    {
        header('Location:login.php');
    }
    
    $userid = filter_input(INPUT_GET, 'userid');
    $uname = filter_input(INPUT_GET, 'uname');
    $email = filter_input(INPUT_GET, 'email');
    $first = filter_input(INPUT_GET, 'first');
    $middle = filter_input(INPUT_GET, 'middle');
    $last = filter_input(INPUT_GET, 'last');
    $profile_image = filter_input(INPUT_GET, 'profile_image');
    $postid = filter_input(INPUT_GET, 'postid');
    
    $profile = showUser($_SESSION['use']); 

    $posts = showAllUserPosts($_SESSION['use']);
    $image = getImage($_SESSION['use']);

    
    if(isPostRequested())
        {
            $userid = $_SESSION['use'];   
            $postid = $posts['postid'];
            $comment = filter_input(INPUT_POST, 'comment');
                
        }
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GO - Home</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
            <link rel="stylesheet" href="styles/style.css">
    </head>

    <body>
    <div>
<nav class="navbar">
    
            <div class="container-fluid">
              <div class="navbar-header">
                
              </div>

                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">GO</a>
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
       **Calendar is going here
   </div>
        <div class="posts">
            <div class ="">
                
                <?php foreach($posts as $p):?>
                <?php $userid = $p['userid'];
                $postid= $p['postid'];?>
                <br><br>
                <img class="" src="images/<?php echo $image['profile_image']; ?>" alt="profile image" height="150" width="150">
                <p class = "">User: <?php echo $p['uname']?></p>
                <p class = "">Post: <?php echo $p['post']?></p>
                <?php $comments = showPostComments($postid);?>
                
                    <?php foreach($comments as $c):?>
                        <?php $Commenter = showUser($c['userid']);?>
                        <p class = "">Commenter: <?php echo $Commenter['uname']; ?></p>
                        <p class = "">Comment: <?php echo $c['comment']; ?></p>
                    <?php endforeach;?>
                
                <form action ="index.php" class="form-inline" name="comment" method="post">
                    <input type="text" class ="form-control" placeholder = "add a comment">      
                </form>
                <button class="btn button" type="submit" name="comment" value ="add a comment">Comment</button>
                <?php endforeach;?> 
                </div>
                <br>
                
                <?php if (isPostRequested())
                    $results = addComment($userid, $postid, $comment);
                ?>    
        </div>     
</body>
<footer class="iekfooter"><p>Created by: Ethan Tran, Karissa Smith, Ian Shippee</p></footer>
</html>
