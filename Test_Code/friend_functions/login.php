<?php
session_start();
include __DIR__ . '/model/modelFriend.php';
include __DIR__ . '/include/includes.php';



$err = "";
 if (isset($_POST['logIn']))
    {
      $user = $_POST['username'];
      $pass = $_POST['password'];
      $info = [];
      
      $results = checkLogin($user, $pass); 
      if (empty($_POST['username']) || empty($_POST['password'])) 
      {
        $err = "Username or Password is invalid";
      }
      

       if($results == false)
       {
         echo "Wrong Username or Password <br /> Please Try Again.";
       }
       else
       {
         $_SESSION['loggedOn'] = true;
         $myId = findUserId($user);
         $_SESSION['id']= $myId;

         header('Location: search.php');
       }
      

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <title>Add Friends Testing</title>
</head>
<body>
    <div class="container">
        <h1>Please Log In</h1>
    
        <form class="form-horizontal" action="login.php" method="post">
        <div class="form-group">
          <label class="control-label col-sm-2" for="User">Username:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="username" placeholder="Enter Username" >
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="Pass">Password:</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" name="password" placeholder="Enter Password" >
          </div>
        </div>
        <div class="form-group">        
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success" name="logIn">Log In</button>

          </div>
        </div>
        <span><?php echo $err ?></span>
        </form>
    </div>


</body>
</html>