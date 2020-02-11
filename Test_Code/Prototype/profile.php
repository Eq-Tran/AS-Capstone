<?php

    session_start();
    include __DIR__. '/../../Models/model_functions.php';
    include __DIR__. '/../../Models/post_request_functions.php';
    
    if(!isset($_SESSION['use']))
    {
        header("Location:profile.php");
    }
    
    $profile = showUser($_SESSION['use']);
    
    
    $userid = filter_input(INPUT_GET, 'userid');
    $uname = filter_input(INPUT_GET, 'uname');
    $email = filter_input(INPUT_GET, 'email');
    $first = filter_input(INPUT_GET, 'first');
    $last = filter_input(INPUT_GET, 'last');
    $birthday = filter_input(INPUT_GET, 'birthday');
    $bio = filter_input(INPUT_GET, 'bio');
    $location = filter_input(INPUT_GET, 'location');
    
    if(isPostRequested())
    {
        $userid = $_SESSION['use'];
        $first = filter_input(INPUT_POST, 'first');
        $last = filter_input(INPUT_POST, 'last');
        $birthday = filter_input(INPUT_POST, 'birthday');
        $bio = filter_input(INPUT_POST, 'bio');
        $location = filter_input(INPUT_POST, 'location');
        $results = updateProfile($userid, $first, $last, $birthday, $bio, $location);
        
    }
    
    
    echo "Hello ", $profile['uname'];
    echo "<a href='logout.php'> Logout</a> ";
    
?>
<html lang="en">
    
<head>
    
  <title>Test Profile Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>

<body>
 
 <table class="table">
     <thread>
         <tr>
             <th>First Name</th>
             <th>Last Name</th>
             <th>Email</th>
             <th>User Name</th>
             <th>Birthday</th>
             <th>Bio</th>
             <th>Location</th>             
         </tr>
     </thread>
 
 
    <tbody>
        <tr>
                    
                    <td><?php echo $profile['first']; ?></td>
                    <td><?php echo $profile['last']; ?></td>
                    <td><?php echo $profile['email']; ?></td>
                    <td><?php echo $profile['uname']; ?></td>
                    <td><?php echo $profile['birthday']; ?></td>
                    <td><?php echo $profile['bio']; ?></td>
                    <td><?php echo $profile['location']; ?></td> 
                    
        </tr>
    </tbody>
</table>
    
    
<button data-toggle="collapse" data-target="#demo">Update Profile</button>

<div id="demo" class="collapse">

    <h1>Profile Update</h1>
    
    <form name ="profileupdate" method="post" action = "profile.php">
    
        <div class="form-element">
            <label>First Name: </label>
            <input type="text" name="first" value="<?php echo $profile['first']; ?>"/>
        </div>
    <br>
        <div class="form-element">
            <label>Last Name: </label>
            <input type="text" name="last" value="<?php echo $profile['last']; ?>"/>
        </div>
    <br>
        <div class="form-element">
            <label>Birthday: </label>
            <input type="text" name="birthday" required />
        </div>
    <br>
    <div class="form-element">
            <label>Bio: </label>
            <input type="text" name="bio" required />
        </div>
    <br>
    <div class="form-element">
            <label>Location: </label>
            <input type="text" name="location" required />
        </div>
    <br>
            <div class="form-group">        
                <div class="">
                    <button type="submit" class="btn btn-default">Submit</button>
                    <?php
                        if (isPostRequested()) 
                        {
                            
                            echo "Profile Updated";
                            echo "<meta http-equiv='refresh' content='0'>";
                            
                        }
                        
                        
                    ?>
                </div>
            </div>       
        </form>
    
</div>
    
    
</body>
</html>
