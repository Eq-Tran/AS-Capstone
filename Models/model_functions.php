<?php


include (__DIR__ .'/databaseconnect.php');

function addUser($first, $last, $email, $uname, $pw){
    
    global $db;
 
    // Results var to store validation string
    $results = [];
    
 
    // Database query string
    $statement  = $db->prepare("INSERT INTO users SET first = :first, last = :last, email = :email, uname = :uname, pw = :pass, profile_image = 'defaultProfileimage.jpg' ");
    
    // Array binding function variables to database columns
    $bindParams = array(
        
        ":first" => $first,
        ":last" => $last,
        ":email" => $email,
        ":uname" => $uname,
        ":pass" => $pw
           
    );
    
    // Conditonal to create validation when insert is successful
    if($statement->execute($bindParams) && $statement->rowCount() > 0){
        
        $results = "User Added!";
       
    }
    
    // Returns results value if condition is met
    return($results);
}

function updateProfile($userid, $first, $middle, $last, $birthday, $bio, $location, $pw){
    
    global $db;
 
    // Results var to store validation string
    $results = [];
    
 
    // Database query string
    $statement  = $db->prepare("UPDATE users SET first = :first, middle = :middle, last = :last, birthday = :birthday, bio = :bio, location = :location, pw = :pass WHERE userid =:userid");
    
    // Array binding function variables to database columns
    $bindParams = array(
        
        ":userid" => $userid,
        ":first" => $first,
        ":middle" => $middle,
        ":last" => $last,
        ":birthday" => $birthday,
        ":bio" => $bio,
        ":location" => $location,
        ":pass" => $pw    
           
    );
    
    // Conditonal to create validation when insert is successful
    if($statement->execute($bindParams) && $statement->rowCount() > 0){
        
        $results = "User Updated!";
       
    }
    
    // Returns results value if condition is met
    return($results);
}

function killprocess(){
    exit();
    return;
    die();
    
}

function updateProfileImage($userid, $profile_image){
    
    global $db;
 
    // Results var to store validation string
    $results = [];
    
 
    // Database query string
    $statement  = $db->prepare("UPDATE users SET profile_image = :profile_image WHERE userid =:userid");
    
    // Array binding function variables to database columns
    $bindParams = array(
        
        ":userid" => $userid,
        ":profile_image" => $profile_image
           
    );
    
    // Conditonal to create validation when insert is successful
    if($statement->execute($bindParams) && $statement->rowCount() > 0){
        
        $results = "User Updated!";
       
    }
    
    // Returns results value if condition is met
    return($results);
}

function deleteUser($userid){
    
    global $db;
    
    $results = [];
    
    $statement = $db->prepare("DELETE FROM users WHERE userid =:userid");
    
    $bindParam = array(
        ":userid" => $userid,
    );
    
    if($statement->execute($bindParam) && $statement->rowCount() > 0){
                
         $results = "User Deleted";
                
   }
    return($results);
}

// Show single user
function showUser($userid){
    
    global $db;
    
    $results = [];
    $statement = $db->prepare("SELECT first, middle, last, email, uname, birthday, bio, location, profile_image FROM users WHERE userid = :userid");
    $bindParam = array(
        
        ":userid" => $userid,
        
    );
    
    if($statement->execute($bindParam) && $statement->rowCount() > 0){
        
        $results = $statement->fetch(PDO::FETCH_ASSOC);
        
        
    }
    return($results);
}

// Show all users
function showUsers(){
    
    global $db;
    
    $results = [];
    $statement = $db->prepare("SELECT * FROM users ");
    
    
    if($statement->execute() && $statement->rowCount() > 0){
        
        $results = $statement->fetchall(PDO::FETCH_ASSOC);
        
        
    }
    return($results);
}

function deleteUsers($postid){
    
    global $db;
    
    $results = [];
    
    $statement = $db->prepare("DELETE FROM users WHERE userid = :userid");
    
    $bindParam = array(
        ":userid" => $postid,
    );
    
    if($statement->execute($bindParam) && $statement->rowCount() > 0){
                
         $results = "User Deleted";
                
   }
    return($results);
}

function addPost($post, $userid, $uname){
    
    global $db;
    $results = [];
    $statement = $db->prepare("INSERT INTO posts SET post = ? ,userid = ?, uname = ?, day = 'monday'");
    /*
    $bind = array(
        
        ":post" => $post,
        ":userid" => $userid,
        ":uname"   => $uname
            
        
    );*/
 
    if($statement->execute([$post, $userid, $uname]) && $statement->rowCount() > 0){
        
        $results = "post added";
        
        
    }
    return $results; 
}

/*AJAX POST*/
/*function addPost2($post, $day, $userid){
    
    // RETURN DATA AS JSON FORMAT
    global $db;
    $results = [];
    $statement = $db->prepare("INSERT INTO posts SET post = :post ,userid = :userid,  day = :day");
    $bind = array(
        
        ":post" => $post,
        ":userid" => $userid,
        ":day"   => $day
            
        
    );
    
    if($statement->execute([$post, $userid, $uname]) && $statement->rowCount() > 0){
        
        $results = "post added";
        
        
    }
    return $results; 
}*/



function deleteUserPost($postid){
    
    global $db;
    
    $results = [];
    
    $statement = $db->prepare("DELETE FROM posts WHERE postid = :postid");
    
    $bindParam = array(
        ":postid" => $postid,
    );
    
    if($statement->execute($bindParam) && $statement->rowCount() > 0){
                
         $results = "User Deleted";
                
   }
    return($results);
}

function getImage($userid){
    global $db;
    
    
    $statement = $db->prepare("SELECT profile_image FROM users where userid = :userid ");
    
    $bindParam = array(
        
        ":userid" => $userid,
        
    );
    
    if($statement->execute($bindParam) && $statement->rowCount() > 0){
        
        $results = $statement->fetch(PDO::FETCH_ASSOC);
        
        
    }
    return($results);
}

function showPost($postid){
    
    global $db;
    
    $results = [];
    $statement = $db->prepare("SELECT post FROM posts WHERE postid = :postid");
    $bind = array(
        
        ":postid" => $postid
        
    );
    
    if($statement->execute($bind) && $statement->rowCount() > 0){
        
        $results = $statement->fetch(PDO::FETCH_ASSOC);
        
    }
    
    return $results;
}

function showPosts(){
    global $db;
    
    $results = [];
    $statement = $db->prepare("SELECT * FROM posts");
    
    if($statement->execute() && $statement->rowCount() > 0){
        
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        
    }
    
    return ($results);
}

function showUserPost($userid){
    
    global $db;
    
    $results = [];
    $statement = $db->prepare("
            SELECT posts.userid, posts.postid, posts.post, users.uname
            FROM users
            INNER JOIN posts ON posts.userid = users.userid
            WHERE posts.userid = :userid;
    ");
   
    $binds = array(
        ":userid" => $userid
    );       
    
    if($statement->execute($binds) && $statement->rowCount() > 0){
        
        $results = $statement->fetch(PDO::FETCH_ASSOC);
    }
    
    return($results);
}

function showAllUserPosts(){
    
    global $db;
    
    $results = [];
    $statement = $db->prepare("
            SELECT posts.userid, posts.postid, posts.post, users.uname
            FROM users
            INNER JOIN posts ON posts.userid = users.userid;
    ");
   
  
    if($statement->execute() && $statement->rowCount() > 0){
        
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    return($results);
}

function addPostComment($comment, $postid, $userid){
    global $db;
    
    $results = [];
    $statement = $db->prepare("INSERT INTO comments SET postid = :postid ,userid = :userid, comment = :comment");
    $bind = array(
        
        ":postid" => $postid,
        ":userid" => $userid,
        ":comment" => $comment   
        
    );
    
    if($statement->execute($bind) && $statement->rowCount() > 0){
        
        $results = "post added";
        
        
    }
    return $results; 
}

function showPostComments($postid){
    global $db;
    
    $results = [];
    $statement = $db->prepare("SELECT * from comments where postid = :postid");
   
    $binds = array(
        ":postid" => $postid
    );       
    
    if($statement->execute($binds) && $statement->rowCount() > 0){
        
        $results = $statement->fetchall(PDO::FETCH_ASSOC);
    }
    
    return($results);
}

function addComment($userid, $postid, $comment){
    global $db;
    
    $results = [];
    $statement = $db->prepare("INSERT INTO comments SET userid = :userid, postid = :postid, comment = :comment");
    $bind = array(
        
        ":userid" => $userid,
        ":postid" => $postid,   
        ":comment" => $comment
    );
    
    if($statement->execute($bind) && $statement->rowCount() > 0){
        
        $results = "comment added";
        
        
    }
    return $results;
    
}

function checkLogin ($uname, $pw) {
       global $db;
       
       $results = [];
       $stmt = $db->prepare("SELECT * FROM users WHERE uname = :user AND pw = :pass");
       
       $binds = array(
           ":user" => $uname,
           ":pass" => $pw
       
        );
       
       if($stmt->execute($binds) && $stmt->rowCount() > 0){
          
          $results = $stmt->fetch(PDO::FETCH_ASSOC);
          
       }
       else{
           
           return (false);
           
       }
       
       
       return ($results);
   }
   
   
   
   //check for admin credentials
   function checkUserCred ($uname)
   {
       global $db;
       
       $check = [];
       $stmt = $db->prepare("SELECT admin from users WHERE uname =:user");
       
       $binds = array(
           ":user" => $uname,
       
        );
       
       if($stmt->execute($binds) && $stmt->rowCount() > 0){
          
          $check = $stmt->fetchAll(PDO::FETCH_ASSOC);
          foreach($check as $row)
          {
              $admin= $row['admin'];
          }
          return ($admin);
       }
       else{
           
           return (false);
           
       }
       
       
       
   }
   
   
   function getUsers($myId)
{
    global $db;
    
    $results = [];
    $stmt = $db ->prepare("SELECT * FROM users WHERE NOT userid =:id");
    $binds = array(":id" => $myId);
    //$stmt -> execute($binds);
    
    if ( $stmt->execute($binds) && $stmt->rowCount() > 0 ) 
    {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        
    }
         
    return ($results);
}
//this function will add a school to the table


//this function will search through the database and find all that fit the criteria
function findUser($User, $myId) {
    global $db;
    $results = [];
    
    $binds = array();
    $sql = "SELECT * FROM users WHERE 0=0 AND NOT userid = :id";
    if ($User != "") {
         $sql .= " AND uname LIKE :username";
         $binds['username'] = '%'.$User.'%';
         $binds = array(
            ':username' => $User,
            ':id' => $myId
         );
    }
   
    $stmt = $db->prepare($sql);
      
    $results = array();
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    

    }
    //var_dump($results);
    //echo $id;
    return ($results);
}
function findUserId($User) {
    global $db;
    $results = [];
    $id = "";
    $binds = array();
    $sql = "SELECT * FROM users WHERE 0=0 ";
    if ($User != "") {
         $sql .= " AND uname LIKE :username";
         $binds['username'] = '%'.$User.'%';
    }
   
    $stmt = $db->prepare($sql);
      
    $results = array();
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        foreach ($results as $row)
        {
            $id = $row['userid'];
        }
    }
    //var_dump($results);
    //echo $id;
    return ($id);
}
//this grabs all the info for each individual user
function getuserinfo($user)
{
    global $db;
    
    $results = [];
    

    $binds = array(
        ":user" => $user,

    );
    $stmt = $db ->prepare("SELECT userid FROM users WHERE uname = :user");
    $stmt -> execute();
    
    if ( $stmt->execute() && $stmt->rowCount() > 0 ) 
    {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        
    }
         
    return ($results);
}

//this is to send a friend request to another friend
function sendFriendRequest($myId, $friendId)
{
    global $db;

    $stmt = $db->prepare("INSERT INTO friend_request (sender, receiver) VALUES(?,?)");
    $stmt->execute([$myId, $friendId]);


}
//this is used to count the amount of friend requests you have to be used as a notification
function requestNotification($myId, $sendData)
{
    global $db;

    $stmt = $db->prepare("SELECT sender, uname FROM `friend_request` JOIN users ON friend_request.sender = users.userid WHERE receiver = ?");
    $stmt->execute([$myId]);  
    if($sendData){
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    else{
        return $stmt->rowCount();
    }
}
//this is used to delete you and friend off of friend request table and add you to friends table
function makeFriends($myId, $friendId)
{
    global $db;
    $stmt = $db->prepare("INSERT INTO friends (user_one, user_two) VALUES( ?, ?)");
    $stmt->execute([$myId, $friendId]);

    
    if ($stmt->rowCount() > 0) 
    {
        $results= deleteFromRequests($myId, $friendId);
    }
    else{
        $results = "did not leave make friends function";
    }
    return($results);
}
//this function deletes the request from request table
function deleteFromRequests($myId, $friendId)
{
    global $db;
    $results = [];
    $sql="SELECT id from friend_request WHERE (sender = ? AND receiver = ?) OR (sender = ? AND receiver = ?)";
    //statement works in sql tested multiple times
    //$sql = "DELETE FROM friend_request WHERE sender = :myId, receiver = :friendId OR sender = :friendId, receiver = :myId";
    $stmt = $db->prepare($sql);

    if ($stmt->execute([$myId, $friendId, $friendId, $myId]) && $stmt->rowCount() > 0)
    {
        //$results = 'Data deleted from friend requests';
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($results as $row)
        {
            $requestId =  $row['id'];
            $sql2 = "DELETE FROM friend_request WHERE id = :id";
            $stmt2 = $db->prepare($sql2);
            $binds = array(":id" => $requestId);

        }
        if($stmt2->execute($binds) && $stmt2->rowCount() > 0)
        {
            $results = 'request deleted from request lists';
            header("Refresh: 0;");
        }
    }
    else{
        $results = 'couldnt delete from friend requests';
    };
    return($results);
}
//this gets all of the people in database you are friends with
function getAllFriends($myId, $sendData)
{
    global $db;
    $stmt = $db -> prepare("SELECT distinct user_one, user_two FROM `friends` WHERE user_one = ? OR user_two = ?");
    
   //echo "inside get all friends function";
    if ( $stmt->execute([$myId, $myId]) && $stmt->rowCount() > 0 ) 
    {
        //echo "statement binded";
        if($sendData == true){
            $results = [];
            $users = [];
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            //var_dump($myId);
            //var_dump($users);
            foreach($users as $row)
            {
                
                //var_dump($row);
                if($row['user_one'] == $myId){
                    
                    $userStmt = $db->prepare("SELECT userid, uname, profile_image FROM `users` WHERE userid = :id");
                    $binds=array(":id"=> $row['user_two']);
                    $userStmt ->execute($binds);
                    //array push pushes one or more items to an array to be stored
                    //$results = array($userStmt->fetch(PDO::FETCH_ASSOC));
                    //return $results;
                    //echo "User one";
                }
                else{
                    //echo "user two";
                    
                    $userStmt = $db->prepare("SELECT userid, uname, profile_image FROM `users` WHERE userid = :id");
                    $binds = array(":id" => $row['user_one']);
                    $userStmt ->execute($binds);
                    //array push pushes one or more items to an array to be stored
                    
                    //return $results;
                }
                $results[] =  $userStmt->fetch(PDO::FETCH_ASSOC);
                
                
            }
            return ($results);
            
            
        }
        else{
            //echo "total number of friends you have: ";
            return $stmt->rowCount();

        }

    }
    if ($stmt->execute([$myId, $myId]) && $stmt->rowCount() == 0){
        //  echo "You Have no friends, look for someone!";
        $results = getUsers($myId);
        return ($results);
    }
}
//this checks if youve recieved any friend requests
/*function getFriendRequests($myId, $friendId)
{
    global $db;
    $stmt = $db -> prepare("SELECT * FROM `friend_request` WHERE sender = ? AND receiver = ?");
    if ( $stmt->execute([$friendId, $myId]) && $stmt->rowCount() > 0 ) 
    {
        if($stmt-> rowCount()===1)
        {
            return true;
        }
        else{
            return false;
        }
    }
}
*/
//this function will check if the user if friends with person(so you can search for friends and people not in your friends list)
//will only return true or false(for add button)
function checkFriends($myId, $friendId)
{
    global $db;
    $sql = "SELECT * from friends where user_one = ? and user_two = ? OR user_one = ? and user_two = ?";
    $stmt = $db ->prepare($sql);
    if($stmt -> execute([$myId, $friendId, $friendId, $myId]) && $stmt->rowCount() > 0)
    {
        return true;
    }
    else{
        return false;
    }
}

//this funciton will delete people off of your friends list
function deleteFriends($myId, $friendId)
{
    global $db;
    $sql = "DELETE FROM friends where user_one= ".$myId." and user_two = ".$friendId." OR user_one = ".$friendId." and user_two = ".$myId;
    $stmt = $db ->prepare($sql);
    /*$binds = array(
        ':myId' => $myId,
        ':friendId' => $friendId
    );
    var_dump($binds);
    */
    if($stmt->execute() && $stmt->rowCount() > 0)
    {
        
        header("Refresh: 0;");
        //echo "Friend Deleted";
    }

}
//getSentRequests will find all the friend requests that the user sent out to other people
function getSentRequests($myId, $sendData)
{
    global $db;
    //echo "in sent requests function";
    $stmt = $db->prepare("SELECT DISTINCT receiver, uname FROM `friend_request` JOIN users ON friend_request.receiver = users.userid WHERE sender = ?");
    $stmt->execute([$myId]);
    if($sendData){
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    else{
        return $stmt->rowCount();
    }
}


//this function will check if the user already sent a friend request
function checkRequest($myId, $friendId)
{
    global $db;
    //var_dump($myId);
    //var_dump($friendId);
    $sql = "SELECT * from friend_request where sender = ? and receiver = ? or sender = ? and receiver = ?";
    $stmt = $db ->prepare($sql);
    //binds array wasnt working
    /*$binds = array(
        ':sender' => $myId,
        ':receiver' => $friendId
    );*/
    //var_dump($binds);
    if($stmt -> execute([$myId, $friendId, $friendId, $myId]) && $stmt->rowCount() > 0)
    {
        //echo "<br /> check requests"; 
        return true;
    }
    else{
        return false;  
    }
}

?>