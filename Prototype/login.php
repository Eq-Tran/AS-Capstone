    <?php
    
        session_start();
        include_once (__DIR__ . '/../Models/model_functions.php');
        include_once (__DIR__ . '/../Models/model_functions.php');
        
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
    

    </div>
  </form>
</div>
    
</body>
</html>

