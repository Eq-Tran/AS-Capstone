<?php
    session_start();
    include (__DIR__ . '/../Models/model_functions.php');
    include (__DIR__ . '/../Models/post_request_functions.php');
    
    $dt = new DateTime;
    if (isset($_GET['year']) && isset($_GET['week'])) {
        $dt->setISODate($_GET['year'], $_GET['week']);
    } else {
        $dt->setISODate($dt->format('o'), $dt->format('W'));
    }
    
    $year = $dt->format('o');
    $week = $dt->format('W');
    $post = filter_input(INPUT_POST, 'post');
    $day = filter_input(INPUT_POST, 'selectOp');
    
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
    
    /*********************Calendar******************************/
 

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
       <div class="calendar-box">
            <div id="nav-links" >
            <a href="<?php echo '?week='.($week-1).'&year='.$year; ?>">Pre Week</a> <!--Previous week-->
            <a href="<?php echo '?week='.($week+1).'&year='.$year; ?>">Next Week</a> <!--Next week-->
        </div>    
            <table class="table table-responsive">

                            <?php

                            do {
                                echo "<th>" . $dt->format('l') . "<br>" . $dt->format('d M') . "</th>\n";
                                $dt->modify('+1 day');
                            } while ($week == $dt->format('W'));


                            ?>

                    <tbody>
                        <?php foreach($posts as $row):?>
                        <tr>
                            <td><?php echo $row['day'];?></td>
                            <td>ello</td>
                            <td>ello</td>
                            <td>ello</td>
                            <td>ello</td>
                            <td>ello</td>
                            <td>ello</td>
                        </tr>
                        <tr>
                            <td>ello</td>
                            <td>ello</td>
                            <td>ello</td>
                            <td>ello</td>
                            <td>ello</td>
                            <td>ello</td>
                            <td>ello</td>
                        </tr>
                        <?php endforeach;?>
                </tbody>
                </table>
           
           
       </div>
       
       <form method="POST">
           <input type="text" name="post" placeholder="Add Post">
            <select name="selectOp">
                    <option value="Mon">Mon</option>
                    <option value="Tue">Tue</option>
                    <option value="Wed">Wed</option>
                    <option value="Thu">Thu</option>
                    <option value="Fri">Fri</option>
                    <option value="Sat">Sat</option>
                    <option value="Sun">Sun</option>
                </select>
           <input type="submit" name="add">
       </form>
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
<script>

async function addPost(){
    
    var post = document.querySelector("#post").value;
    var day = document.querySelector("selectOp").value;

    const url = 'handlecalendarajax.php';
    const data = {};
    
    try{
        
        const response = await fetch(url, {
            
            'method': 'POST',
            'body': JSON.stringify(data),
            'headers': {
                
                'content-type': 'application/json',  
            }
            
            
            
        }).then(function(data){
            
            console.log(data);
            
            
        });
        
        console.log(response);
        const json = await response.json();
        
    }catch(error){
        
        console.log(error, "error");
        
    }
    
} // end addPost

async function loadPosts(){
    
    const url = 'showcalendardata.php';
    
    try{
        
        const response = await fetch(url,{
            
            'method':'GET',
            
            
        }).then(function(data){
            
            
            
        });
        
        
        const json = await response.json();
        console.log(json);
        //displayPosts;
        
    }catch(error){
        
        console.error(error, 'erroor');    
    }
    
}// end loadPosts


</script>
</html>
