<?php
    session_start();
    include __DIR__. '/../../Models/model_functions.php';
    include __DIR__. '/../../Models/post_request_functions.php';
        
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
        
        <title>Go Main Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link href="../../CSS/styles.css" rel="stylesheet" type="text/css">
        
    </head>
       
</html>


<body>
    
    <div class="navbar">
        
        <div class="logo">
            
        </div>
        
        <div class ="signin">
            
            <form name="signin" action = "login.php" method="post">
    
                <div class="form-element">
                    
                    <label>Username: </label>
                    <input type="text" name="user" required />
                    
                    <label>Password: </label>
                    <input type="password" name="pass" required />
                    
                    <button type="submit" name="login" value="login">Log In</button>
                    
                </div>
                
            </form>
            
        </div>
        
    </div>
        
    
    <div class="signsheets">
        
        <form method="post" action = "login.php">
    
            <div class="form-element">
                <label>First Name: </label>
                <input type="text" name="first" required />
            </div>
            
    <br>
    
            <div class="form-element">
            <label>Last Name: </label>
            <input type="text" name="last" required />
        </div>
    
    <br>
    
        <div class="form-element">
                <label>Email: </label>
                <input type="text" name="email" required />
            </div>
    
    <br>
    
            <div class="form-element">
                <label>Username: </label>
                <input type="text" name="uname" required />
            </div>
    
    <br>
    
            <div class="form-element">
                <label>Password: </label>
                <input type="text" name="pass" required />
            </div>
    
    <br>    
    
            <div class="form-group">  
            
                    <div class="submissionbtn">
                
                        <button type="submit" class="btnSign">Sign Up</button>
                            <?php
                                if (isPostRequested()) 
                                    {
                                        echo "Signed up";
                            
                                    }

                            ?>
            
                    </div>
                
            </div>
    
        </form>
        
    </div>
    
</body>

<footer class="iekfooter"><p>Created by: Ethan Tran, Karissa Smith, Ian Shippee</p></footer>

