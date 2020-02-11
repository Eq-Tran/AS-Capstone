<?php


include (__DIR__ . '/db.php');
//this function will grab users from the table
function getusers($myId)
{
    global $db;
    
    $results = [];
    $stmt = $db ->prepare("SELECT * FROM users WHERE 0=0 AND NOT userid = :id");
    $binds = array(":id" => $myId);
    $stmt -> execute($binds);
    
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
//this checks if they have an accound in the database
function checkLogin($user, $pass)
{
    global $db;

    $stmt = $db->prepare("SELECT * FROM users WHERE uname = :user and pw = :pass");

    $results = [];

    $binds = array(
        ":user" => $user,
        ":pass" => $pass

    );

    if ( $stmt->execute($binds) && $stmt->rowCount() > 0 ) 
    {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    else 
    {
        $results = false;
    }
    return ($results);
}
function userinfo()
{
    
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
    $stmt = $db -> prepare("SELECT * FROM `friends` WHERE user_one = :myId OR user_two = :myId");
    $binds = array(
        ":myId" => $myId
    );
    if ( $stmt->execute($binds) && $stmt->rowCount() > 0 ) 
    {
        if($sendData){
            $results = [];
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach($users as $row)
            {
                if($row->user_one == $myId){
                    $userStmt = $db->prepare("SELECT userid, uname FROM `users` WHERE userid = :id");
                    $binds = array(
                        ':id' -> $myId
                    );
                    $userStmt ->execute([$row->user_two]);
                    //array push pushes one or more items to an array to be stored
                    $results = array($userStmt->fetch(PDO::FETCH_OBJ));
                }
                else{
                    $userStmt = $db->prepare("SELECT userid, uname FROM `users` WHERE userid = ?");
                    $userStmt ->execute([$row->user_one]);
                    //array push pushes one or more items to an array to be stored
                    $results = array($userStmt->fetch(PDO::FETCH_OBJ));
                }
                return $results;

            }

        }
        else{
            return $stmt->rowCount();
        }

    }
}
//this checks if youve recieved any friend requests
function getFriendRequests($myId, $friendId)
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


?>