<?php
    session_start();
    include (__DIR__ . '/../Models/model_functions.php');
    include (__DIR__ . '/../Models/post_request_functions.php');
    
    $profile = showUser($_SESSION['use']);
    $posts = showAllUserPosts();
    
    $dt = new DateTime;
    if (isset($_GET['year']) && isset($_GET['week'])) {
        $dt->setISODate($_GET['year'], $_GET['week']);
    } else {
        $dt->setISODate($dt->format('o'), $dt->format('W'));
    }
    
    $year = $dt->format('o');
    $week = $dt->format('W');
    $post = filter_input(INPUT_POST, 'postbody');
    $day = filter_input(INPUT_POST, 'selectOp');
    $userid = filter_input(INPUT_POST, $_SESSION['use']);
    
    if(!isset($_SESSION['use']))
    {
        header('Location:login.php');
    }
    
    $i = 0 ;
    $userid = filter_input(INPUT_POST, 'userid');
    $uname = filter_input(INPUT_GET, 'uname');
    $email = filter_input(INPUT_GET, 'email');
    $first = filter_input(INPUT_GET, 'first');
    $middle = filter_input(INPUT_GET, 'middle');
    $last = filter_input(INPUT_GET, 'last');
    $profile_image = filter_input(INPUT_GET, 'profile_image');
    $postid = filter_input(INPUT_GET, 'postid');
 
      /*if(isPostRequested()){
        $userid = $_SESSION['use'];   
        $postid = $postid;
        $comment = filter_input(INPUT_POST, 'comment');
        
    }*/
    
    /*********************Calendar******************************/
    
    //$calPosts = showPosts();

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
            <table class="table table-responsive" style="display:block; overflow-y:scroll;">
                <thead>
                    
                         <?php

                            do {
                                echo "<th>" . $dt->format('l') . "<br>" . $dt->format('d M') . "</th>\n";
                                $dt->modify('+1 day');
                            } while ($week == $dt->format('W'));


                            ?>
                    
                </thead>
                           

                    <tbody>
                        <?php foreach($posts as $p):?>
                        <tr>
                            <td><?php ?></td>
                      
                        </tr>
                        <?php endforeach;?>
                </tbody>
                </table>
           
           
       </div>
       
       <!--<form method="POST">
           <input type="text" name="postbody" placeholder="Add Post" id="postbody">
            <select name="selectOp" id="selectOp">
                    <option value="Mon">Mon</option>
                    <option value="Tue">Tue</option>
                    <option value="Wed">Wed</option>
                    <option value="Thu">Thu</option>
                    <option value="Fri">Fri</option>
                    <option value="Sat">Sat</option>
                    <option value="Sun">Sun</option>
                </select>
           <input type="hidden" name="userid" id="userid" value=""> -->
           
               
       </form>



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
                   //header("refresh: 0; url = index.php");
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
                   //header("refresh: 0; url = index.php");
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
window.addEventListener('load', loadPosts);  
var button = document.querySelector("#add");
button.addEventListener('click', addPost);
    
   
function showPosts(posts){
    
    for(var i = 0; i < posts.length; i++){
        
        $("tbody").append('<td><a href="#">' + posts[i].postid + " " + posts[i].userid + '' + posts[i].post + '' + posts[i].day + '</a></td>');
        
    }
    
}

async function addPost(){
    
  //event.preventDefault();
    var post = document.querySelector("#postbody").value;
    var day = document.querySelector("#selectOp").value;
    var userid = document.querySelector("#userid").value;
    const url = 'handlecalendarajax.php';
    const data = {post:post, day:day, userid:userid};
    
    try{
        
        const response = await fetch(url, {
            
            'method': 'POST',
            'body': JSON.stringify(data),
            'headers': {
                
                'content-type': 'application/json',  
            }
            
            
            
        });
        
        
    }catch(error){
        
        console.log(error, "error");
        
    }
    
      $("tbody").append('<td><a href="#">' + post + '' + day + '</a></td>');
         document.querySelector(".container").innerHTML = "Added Name " + post + '' + day ;
    
} // end addPost

async function loadPosts(){
    
    const url = 'showcalendardata.php';
    
    try{
        
        const response = await fetch(url,{
            
            'method':'GET',
            
            
        });
        
        
        const json = await response.json();
        console.log(json);
        showPosts(json);
        
    }catch(error){
        
        console.error(error, 'erroor');    
    }
    
}// end loadPosts


</script>
</html>
