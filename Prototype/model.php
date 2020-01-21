<?php
include (__DIR__ .'/db.php');

function addUser($first, $last, $email, $uname, $pw){
    
    global $db;
 
    // Results var to store validation string
    $results = [];
 
    // Database query string
    $statement  = $db->prepare("INSERT INTO users SET first = :first, last = :last, email = :email, uname = :uname, pw = :pw ");
    
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

function deleteUser($user_id){
    
    global $db;
    
    $results = [];
    
    $statement = $db->prepare("DELETE FROM users WHERE user_id = :user_id");
    
    $bindParam = array(
        ":user_id" => $user_id,
    );
    
    if($statement->execute($bindParam) && $statement->rowCount > 0){
                
         $results = "User Deleted";
                
   }
    return($results);
}

// Show single user
function showUser($user_id, $first, $last, $email, $uname, $age, $bio, $location){
    
    global $db;
    
    $results = [];
    $statement = $db->prepare("SELECT first, last, email, uname, age, bio, location FROM users WHERE user_id = :user_id");
    
    $bindParam = array(
        
        ":user_id" => $user_id,
        
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
    $statement = $db->prepare("SELECT userid, first, last, email, birthday, uname, bio, location FROM users ");
    
    
    if($statement->execute() && $statement->rowCount() > 0){
        
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        
    }
    return($results);
}

$addTest = showUsers(1);
var_dump($addTest);

function checkLogin ($user, $pass) {
       global $db;
       
       $results = [];
       $stmt = $db->prepare("SELECT * FROM users WHERE username = :user AND pass = :pass");
       
       $binds = array(
           ":userame" => $user,
           ":password" => $pass
       
        );
       
       if($stmt->execute($binds) && $stmt->rowCount() > 0){
          
          $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
          
       }
       else{
           
           return (false);
           
       }
       
       
       return ($results);
   }
?> 
    
    