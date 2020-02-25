<?php
    session_start();
    include __DIR__. '/../Models/model_functions.php';
    include __DIR__. '/../Models/post_request_functions.php';
        
    $login = filter_input(INPUT_POST,'login');
        
        //User/Admin Login Session (Admin, username:ian, password:ian)(normal user username:User2, password:password2)
        
    if(isset($_SESSION['admin']))
        {
           header('Location:admin.php');
        } 
          
    if(isset($_SESSION['use']))
        {
           header('Location:index.php');
        } 
        
    if(isset($login))
        {
                    
            $uname = filter_input(INPUT_POST,'user');
            $pw = filter_input(INPUT_POST,'pass');
            
            //model for login
            $results = checkLogin($uname, $pw);
            //model for admin cred
            $check = checkUserCred($uname);
            
            //checks username and password
            if($results == true)
                {
                    //checks for tiny int 1 for admin (Admin is stored as TinyINT(4) 0 is user, 1 is admin)
                    if($check == 1)
                        {
                            //set session name to userid    
                            $_SESSION['admin'] = $results['userid'];
                            //redirect to index.php
                            header('Location:admin.php');
                        }
                        
                    //no admin
                    else
                        {
                            $_SESSION['use'] = $results['userid'];
                            header('Location:index.php');
                        }
                }
            
            //login credentials wrong
            else
                {
                    echo "Wrong Username  or Password";                
                }
            
        }
    
    //Sign up isPostRequest
    if(isPostRequested())
        {
            $first = filter_input(INPUT_POST, 'first');
            $last = filter_input(INPUT_POST, 'last');
            $email = filter_input(INPUT_POST, 'email');
            $uname = filter_input(INPUT_POST, 'uname');
            $pw = filter_input(INPUT_POST, 'pass');
            $results = addUser($first, $last, $email, $uname, $pw);    
        }
 ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GO - Login</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <div>
        <nav class="navbar">
            <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                  Sign In
                </button>
                <a class="navbar-brand" href="#">GO</a>
              </div>
              <div class="collapse navbar-collapse" id="myNavbar">

                <ul class="nav navbar-nav navbar-right">
                  <form action="login.php" class="form-inline" name="signin" method="post">
                      <input type="text" class="form-control" placeholder="Username" name="user" required>
                      <input type="text" class="form-control" placeholder="Password" name="pass" required>
                      <button class="btn button" type="submit" name="login" value ="login">Log In</button>
                  </form>
                  
                </ul>
              </div>
            </div>
          </nav>
    </div
    
    
    <main class = "container">

        <div class="signup">
            <h2>Don't Have an Account?</h2>
            </br>

            <form method ="post" action="login.php">
                <div class="form-group">
                  <input type="text" class="form-control" id="first" name="first" placeholder="First Name" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="last" name="last" placeholder="Last Name" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="username" name="uname" placeholder="Username" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="password" name="pass" placeholder="Password" required>
                </div>
                <!--<div class="form-group">
                    <input type="text" class="form-control" id="confirmpassword" name="" placeholder="Confirm Password" required>
                  </div>-->
                  <div class="form-group">
                    <input type="text" class="form-control" id="email" name="email" placeholder="E-Mail" required>
                  </div>
                <div class="form-group">
                    <button type="submit" class="btn button">Sign Up</button>
                    <?php
                                if (isPostRequested()) 
                                    {
                                        echo "Signed up";
                            
                                    }

                            ?>
                </div>
              </form>
        </div>
    </main>
</body>
<footer class="iekfooter"><p>Created by: Ethan Tran, Karissa Smith, Ian Shippee</p></footer>
</html>