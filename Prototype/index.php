<?php

    include __DIR__. '/model.php';
    include __DIR__. '/function.php';
    
    if (isPostRequest())
    {
        
        $username = filter_input(INPUT_POST, 'Username');
        $email = filter_input(INPUT_POST, 'Email');
        $pass = filter_input(INPUT_POST, 'Password');
        $firstname = filter_input(INPUT_POST, 'FirstName');
        $middlename = filter_input(INPUT_POST, 'MiddleName');
        $lastname = filter_input(INPUT_POST, 'LastName');
        $birthday = filter_input(INPUT_POST, 'Birthday');
        $profile_image = filter_input(INPUT_POST, 'ProfileImage');
        $image_test = filter_input(INPUT_POST, 'ImageTest');
        $create_time = filter_input(INPUT_POST, 'Date');
        $results = addUser ($username, $email, $pass, $firstname, $middlename, $lastname, $birthday, $profile_image, $image_test, $create_time);
        
    }
    
?>

<html lang="en">
    
<head>
    
  <title>Add Corporation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>

<body>
   
<div class="container">
    
  <h2>Add User</h2>
  
  <form class="form-horizontal" action="index.php" method="post">
      
    <div class="form-group">
      <label class="control-label col-sm-2" for="username">Username:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="team" placeholder="Username" name="Username">
      </div>
    </div>
      
    <div class="form-group">
      <label class="control-label col-sm-2" for="pass">Password:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="division" placeholder="Password" name="Password">
      </div>
    </div>
      
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email Address:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="division" placeholder="Email Address" name="Email">
      </div>
    </div>
      
    <div class="form-group">
      <label class="control-label col-sm-2" for="first">First Name:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="division" placeholder="First Name" name="FirstName">
      </div>
    </div>
      
    <div class="form-group">
      <label class="control-label col-sm-2" for="middle">Middle Name:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="division" placeholder="Middle Name" name="MiddleName">
      </div>
    </div>
      
    <div class="form-group">
      <label class="control-label col-sm-2" for="last">Last Name:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="division" placeholder="Last Name" name="LastName">
      </div>
    </div>
      
    <div class="form-group">
      <label class="control-label col-sm-2" for="birth">Birthday:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="division" placeholder="xxxx/xx/xx" name="Birthday">
      </div>
    </div>
      
    <div class="form-group">
      <label class="control-label col-sm-2" for="profile">Profile Image:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="division" placeholder="Profile Image" name="ProfileImage">
      </div>
    </div>
      
    <div class="form-group">
      <label class="control-label col-sm-2" for="test">Image Test:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="division" placeholder="test" name="Imagetest">
      </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Sign Up</button>
        <?php
            if (isPostRequest()) {
                echo "User Archived";
                
            }
        ?>
      </div>
    </div>
  </form>
</div>

</body>
</html>