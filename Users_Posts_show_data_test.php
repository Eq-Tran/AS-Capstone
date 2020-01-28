<?php
    include_once (__DIR__ . '/Models/model_functions.php');
    
    $users = showUsers();
    $posts = showAllUserPosts();
?>
<!doctype html>
<html lang="en">
    <head>
        
    </head>
    <body>
        <main>
            <div>
                <!-- User and post are not integrated they are hard coded need to figure out how to make it dynamic -->
                <?php foreach($users as $u):?>
                <p>USERID: <?php echo $u['userid']?></p>
                <p>USERName: <?php echo $u['uname']?></p>
                
                <?php endforeach;?>
                <hr>
                <?php foreach($posts as $p):?>
                <p>POST ID: <?php echo $p['postid']?></p>
                <p>User ID: <?php echo $p['userid']?></p>
                <p>User NAME: <?php echo $p['uname']?></p>
                <p>POST BODY: <?php echo $p['post']?></p>
                <?php endforeach;?>
                
            </div>
        </main>
    </body>
</html>