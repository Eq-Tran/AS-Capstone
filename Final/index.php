<?php
    session_start();
    include (__DIR__ . '/../Models/model_functions.php');
    include (__DIR__ . '/../Models/post_request_functions.php');
    
    if(!isset($_SESSION['use']))
    {
        header('Location:login.php');
    }
    $i =0 ;
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
    
    
   /*if(isPostRequested()){
        $userid = $_SESSION['use'];   
        $postid = $postid;
        $comment = filter_input(INPUT_POST, 'comment');
        
    }*/

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
                        <a class="navbar-brand" href="index.php"><i >GO</i></a>
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
       <form action ="index.php" class="form-inline" method="post">     
                <input type="text" class ="form-control" name="posts" placeholder = "add a post" value="">      
                <div class ="commentbtn">   
                <button class="btn button" type="submit" value ="posts">Submit a Post</button>
                <?php if (isPostRequested())  
                  
                   if (empty($_POST['posts'])){
                       
                   }
                   else{
                   $userid = $_SESSION['use'];   
                   $uname = filter_input(INPUT_POST, $uname);
                   $post = filter_input(INPUT_POST, 'posts');
                   $results = addPost($post, $userid, $uname);
                   header("refresh: 0; url = index.php");
                   }
                   
                ?>
   </div>
        <div class="postscommentscontainer container">
            <div class ="posts">
                
                <?php foreach($posts as $p):?>
                <?php $userid = $p['userid'];
                $postid= $p['postid'];
                $image = getImage($p['userid']);?>
                <?php $i= $i +1; ?>
                <br><br>
            <div class="postimage">      
                <td><img class="" src="images/<?php echo $image['profile_image']; ?>" alt="profile image" height="100" width="100">
                </div>  
                <a href = "friendProfile.php?id=<?php echo $p['userid'] ?>"><?php echo $p['uname']?></a>
                <p class = ""><?php echo $p['post']?></p>
                <?php $comments = showPostComments($postid);?>
            </div>
            <div class ="comments">
                    <?php foreach($comments as $c): ?>
                        <?php $Commenter = showUser($c['userid']);?>
                        <a href = "friendProfile.php?id=<?php echo $c['userid'] ?>"><?php echo $Commenter['uname']; ?></a>
                        <p class = ""><?php echo $c['comment']; ?></p>
                    <?php endforeach;?>
                
                <form action ="index.php" class="form-inline" method="post">     
                <input type="text" class ="form-control" name="comment_<?php echo $i ?>" placeholder = "add a comment" value="">      
                <div class ="commentbtn">   
                <button class="btn button" type="submit" value ="">Comment</button>
                </div>
                
                <?php if (isPostRequested())
                    
                   if (empty($_POST["comment_".$i])){
                       
                   }
                   
                   else{
                   $userid = $_SESSION['use'];   
                   $postid = $postid;
                   $comment = filter_input(INPUT_POST, 'comment_'.$i); 
                   $results = addComment($userid, $postid, $comment);
                   header("refresh: 0; url = index.php");
                   }
                   
                ?>
                <?php endforeach;?>
                </form>    
            </div> 
                
                <br>
                
                    

        </div>     
</body>
<footer class="iekfooter"><p>Created by: Ethan Tran, Karissa Smith, Ian Shippee</p></footer>
</html>
