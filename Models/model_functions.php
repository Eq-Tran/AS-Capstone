<?php


include (__DIR__ .'/databaseconnect.php');

function addUser($first, $last, $email, $uname, $pw){
    
    global $db;
 
    // Results var to store validation string
    $results = [];
 
    // Database query string
    $statement  = $db->prepare("INSERT INTO users SET first = :first, last = :last, email = :email, uname = :uname, password = :pw ");
    
    // Array binding function variables to database columns
    $bindParams = array(
        
        ":first" => $first,
        ":last" => $last,
        ":email" => $email,
        ":uname" => $uname,
        ":pw" => $pw
    );
    
    // Conditonal to create validation when insert is successful
    if($statement->execute($bindParams) && $statement->rowCount() > 0){
        
        $results = "User Added!";
       
    }
    
    // Returns results value if condition is met
    return($results);
}

function deleteUser($userid){
    
    global $db;
    
    $results = [];
    
    $statement = $db->prepare("DELETE FROM users WHERE userid = :userid");
    
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
    $statement = $db->prepare("SELECT first, last, email, uname, birthday, bio, location FROM users WHERE userid = :userid");
    
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
        
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        
    }
    return($results);
}

function addPost($post, $userid){
    
    global $db;
    
    $results = [];
    $statement = $db->prepare("INSERT INTO posts SET post = :post ,userid = :userid");
    $bind = array(
        
        ":post" => $post,
        ":userid" => $userid
        
    );
    
    if($statement->execute($bind) && $statement->rowCount() > 0){
        
        $results = "post added";
        
        
    }
    return $results; 
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

function showuserPost($userid){
    
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





//$delUser = deleteUser(2);
//var_dump($delUser);

//$userTest = addUser("User4", "user4", "user4@user.xom", "User4", "password4");
//var_dump($userTest);

//$postTest = addPost("this is a test post", 1);
//var_dump($postTest);

//$showPost = showPosts();
//var_dump($showPost);

//$showPostinfo = showAllUserPosts();
//var_dump($showPostinfo);
 
?>