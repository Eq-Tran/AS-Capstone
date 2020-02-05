<?php


include (__DIR__ .'/databaseconnect.php');

function addUser($first, $last, $email, $uname, $password){
    
    global $db;
 
    // Results var to store validation string
    $results = [];
 
    // Database query string
    $statement  = $db->prepare("INSERT INTO users SET first = :first, last = :last, email = :email, uname = :uname, password = :password ");
    
    // Array binding function variables to database columns
    $bindParams = array(
        
        ":first" => $first,
        ":last" => $last,
        ":email" => $email,
        ":uname" => $uname,
        ":password" => $password
    );
    
    var_dump($bindParams);
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
        
        $results = $statement->fetch(PDO::FETCH_ASSOC);
        
        
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

function checkLogin ($uname, $password) {
       global $db;
       
       $results = [];
       $stmt = $db->prepare("SELECT * FROM users WHERE uname = :user AND password = :pass");
       
       $binds = array(
           ":user" => $uname,
           ":pass" => $password
       
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
   
   /*
    * 
    * COMMENTED OUT FOR TESTING 
    * 
   function findUserId($user) {
    global $db;
    $results = [];
    $id = "";
    $binds = array();
    $sql = "SELECT * FROM users WHERE 0=0 ";
    if ($user != "") {
         $sql .= " AND uname LIKE :user";
         $binds['uname'] = '%'.$user.'%';
    }
   
    $stmt = $db->prepare($sql);
      
    $results = array();
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        foreach ($results as $row)
        {
            $id = $row['id'];
        }
    }
    //var_dump($results);
    //echo $id;
    return ($id);
}

*/



//$delUser = deleteUser(2);
//var_dump($delUser);

//$userTest = addUser("User4", "user4", "user4@user.xom", "User4", "password4");
//var_dump($userTest);

//$postTest = addPost("this is a test post", 1);
//var_dump($postTest);

//$showPost = showPosts();
//var_dump($showPost);


//$showpostUname = getPostnameById(1);
//var_dump($showpostUname);


//$showPostinfo = showAllUserPosts();
//var_dump($showPostinfo);
 

?>