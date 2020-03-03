<?php

 
    session_start();
    include __DIR__. '/../Models/model_functions.php';
    include __DIR__. '/../Models/post_request_functions.php';
    
    if(!isset($_SESSION['admin']))
    {
        header('Location:admin.php');
    }
    
    
    $profile = showUser($_SESSION['admin']);
    
    $userid = filter_input(INPUT_GET, 'userid');
    $uname = filter_input(INPUT_GET, 'uname');
    $email = filter_input(INPUT_GET, 'email');
    $first = filter_input(INPUT_GET, 'first');
    $middle = filter_input(INPUT_GET, 'middle');
    $last = filter_input(INPUT_GET, 'last'); 
    
    $posts = showAllUserPosts();
    $users = getusers();
    
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GO - Admin</title>
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
        <a class="navbar-brand" href="#">GO</a>
            <div class="container-fluid">
                <div class="navbar-header">
                    <ul class="nav navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link" href="logout.php"><i class=" material-icons">power_settings_new</i></a>
                      </li>
                      
                    </ul>
                </div>
            </div>
          </nav>
    </div>
 <br>
                <h1>Users</h1>
                <?php foreach($users as $u):?>
                <p>User ID: <?php echo $u['userid']?></p>
                <p>User NAME: <?php echo $u['uname']?></p>
                <p>USER DELETE:<a href="admindeleteusers.php?id=<?php echo $u['userid']; ?>">Delete</a></p>
                <?php endforeach;?> 
 
                <h1>User Posts</h1>
                <?php foreach($posts as $p):?>
                <p>User: <?php echo $p['uname']?></p>
                <p>Post: <?php echo $p['post']?></p>
                <p><a href="admindeletepost.php?id=<?php echo $p['postid']; ?>">Delete</a></p>
                <?php endforeach;?> 
        
   
 <br>
    

</body>
<footer class="iekfooter"><p>Created by: Ethan Tran, Karissa Smith, Ian Shippee</p></footer>
</html>

