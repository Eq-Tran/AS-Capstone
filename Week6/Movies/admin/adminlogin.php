    <?php
    
        session_start();
        include __DIR__ . '/../models/model_movie.php';
        include __DIR__ . '/../includes/functions.php';
        
        
        //page load process
        if(isset($_SESSION['use']))
        {
             header('Location: adminview.php');
        }
        
        if(isset($_POST['login']))
        {
            
            $user = $_POST["user"];
            
            $pass = $_POST["pass"];
            
            
            $result = checkLogin($user, $pass);
            if($results = true){
                
                $_SESSION['use'] = $user;
                header('Location: adminview.php');
                
            }
            
            else
            {
                echo "Wrong Username or Password";
            }
            
        }
        
        
    ?>

<html lang="en">
<head>
  <title>Movie Admin</title>
</head>

<body>
    <a href="/Week6/Movies/index.php">Main Page</a>
    <h1>Movie Admin Login</h1>
    
    
    
    
<form method="post" name="signin" action = "adminlogin.php">
    
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
