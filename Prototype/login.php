    <?php
    
        session_start();
        include __DIR__ . '/model.php';
        include __DIR__ . '/function.php';
        
        
        //page load process
        if(isset($_SESSION['use']))
        {
             header('Location: index.php');
        }
        
        if(isset($_POST['login']))
        {
            
            $user = $_POST["user"];
            
            $pass = $_POST["pass"];
            
            
            $result = checkLogin($user, $pass);
            if($results = true){
                
                $_SESSION['use'] = $user;
                
                
                header('Location: index.php');
                
            }
            
            else
            {
                echo "Wrong Username or Password";
            }
            
        }
        
        
    ?>

<html lang="en">
<head>
  <title>Capstone Login</title>
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
</body>
</html>
