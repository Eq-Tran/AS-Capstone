<?php
  
    session_start();
    include (__DIR__ . '/../../Models/model_functions.php');
    include (__DIR__ . '/../../Models/post_request_functions.php');
    
    if(!isset($_SESSION['use']))
    {
        header('Location:login.php');
    }
    
    
    echo "<a href='logout.php'> Logout</a> ";
    
    $showMine = showUserPost($userid);
    $showAll = showPosts();
       
    
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
 <br>
 <br>
 <br>
    <?php 
        echo "User Posts Systems";
        //post for posts
    ?>
        
    <div id="div_post_content">
        <textarea id="post_textarea">
        </textarea>
    </div>
        <div class="div_post_submit">
        <input type="button" value="Create New Post" id="btn_new_post" class="button_style"/>
    </div>
 <br>
 <br>
    <?php foreach($showAll as $ap):?>
        <p>POST ID: <?php echo $ap['postid']?></p>
        <p>User ID: <?php echo $ap['userid']?></p>
        <p>User NAME: <?php echo $ap['uname']?></p>
        <p>POST BODY: <?php echo $ap['post']?></p>
    <?php endforeach;?>
 <br>
    <?php foreach($showMine as $up):?>
        <p>POST ID: <?php echo $up['postid']?></p>
        <p>User ID: <?php echo $up['userid']?></p>
        <p>User NAME: <?php echo $up['uname']?></p>
        <p>POST BODY: <?php echo $up['post']?></p>
    <?php endforeach;?>
 <br>
    <?php
    echo "From here you can choose to see your profile";
    echo "<a href='profile.php'> Profile</a> ";
    ?>

</body>
</html>