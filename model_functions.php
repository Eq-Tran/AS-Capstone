<?php


include (__DIR__ .'/databaseconnect.php');

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



$addTest = addUser('Ethan', 'Tran', 'etran@email.neit.edu', 'Eq-Tran', 'test');
var_dump($addTest);


?>