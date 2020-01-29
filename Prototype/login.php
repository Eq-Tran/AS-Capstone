    <?php
    
        session_start();
        include_once (__DIR__ . '/Models/model_functions.php');
        include_once (__DIR__ . '/Models/post_request_functions.php');
        
        $login = filter_input(INPUT_POST,'login');
        
        //User/Admin Login Session (Admin, username:ian, password:ian)(normal user username:User2, password:password2)
        
        if(isset($_SESSION['admin']))
        {
           header('Location:index.php');
        } 
          
        if(isset($_SESSION['use']))
        {
           header('Location:index.php');
        } 
        
        if(isset($login))
        {
            
            $uname = filter_input(INPUT_POST,'user');
            $password = filter_input(INPUT_POST,'pass');
            
            //model for login
            $results = checkLogin($uname, $password);
            //model for admin cred
            $check = checkUserCred($uname);
            
            //checks username and password
            if($results == true)
            {
                //checks for tiny int 1 for admin (Admin is stored as TinyINT(4) 0 is user, 1 is admin)
                if($check == 1){
                 
                //set session name to Username    
                $_SESSION['admin'] = $uname;
                //redirect to index.php
                header('Location:admin.php');
                }
                
                //no admin
                else
                {
                    
                $_SESSION['use'] = $uname;
                header('Location:index.php');
                
                }
            }
            
            //login credentials wrong
            else
            {
                echo "Wrong Username  or Password";
                
                
            }
            
        }
        
       
       /* if (isPostRequest())
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
        
    }*/
        
    ?>

<html lang="en">
<head>
  <title>Capstone Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>
    
    <h1>Capstone Login</h1>
    
    
<form method="post" name="signin" action = "login.php">
    
    <div class="form-element">
        <label>Username: </label>
        <input type="text" name="user" required />
    </div>
    <br>
    <div class="form-element">
        <label>Password: </label>
        <input type="password" name="pass" required />
    </div>
    <br>
    <button type="submit" name="login" value="login">Log In</button>
</form>
    
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

