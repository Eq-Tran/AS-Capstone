<?php
session_start();
    include __DIR__. '/../Models/model_functions.php';
    include __DIR__. '/../Models/post_request_functions.php';
    
    if(!isset($_SESSION['use']))
        {
            header("Location:profile.php");
        }
    
    $profile = showUser($_SESSION['use']);
    
    // Add Image get
    $userid = filter_input(INPUT_GET, 'userid');
    $uname = filter_input(INPUT_GET, 'uname');
    $profile_image = filter_input(INPUT_GET, 'profile_image');
    $email = filter_input(INPUT_GET, 'email');
    $first = filter_input(INPUT_GET, 'first');
    $middle = filter_input(INPUT_GET, 'middle');
    $last = filter_input(INPUT_GET, 'last');
    $birthday = filter_input(INPUT_GET, 'birthday');
    $bio = filter_input(INPUT_GET, 'bio');
    $pw = filter_input(INPUT_GET, 'pass');
    $location = filter_input(INPUT_GET, 'location');
    
    if(isPostRequested())
        {
          
            $userid = $_SESSION['use'];
            $first = filter_input(INPUT_POST, 'first');
            $middle = filter_input(INPUT_POST, 'middle');
            $last = filter_input(INPUT_POST, 'last');
            $birthday = filter_input(INPUT_POST, 'birthday');
            $bio = filter_input(INPUT_POST, 'bio');
            $location = filter_input(INPUT_POST, 'location');
            $pw = filter_input(INPUT_POST, 'pass'); 
            $results = updateProfile($userid, $first, $middle, $last, $birthday, $bio, $location, $pw);
        
        }
    
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GO - Profile</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!--Google fonts using Oswald and Hind Siliguri -->
    <link href="https://fonts.googleapis.com/css?family=Hind+Siliguri|Oswald&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="styles/style.css">
    </head>
    
    <body>
        
        <nav class="navbar">
            <a class="navbar-brand" href="index.php">GO</a>
            <div class="container-fluid">
                
              <div class="navbar-header">
                <!--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>-->
                
                
              </div>
              <!--<div class="collapse navbar-collapse" id="myNavbar">-->
                  
                <ul class="nav navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php"><i class=" material-icons">home</i></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="profile.php"><i class=" material-icons">person</i></a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="friends.php"><i class=" material-icons">group</i></a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="notifications.php"><i class=" material-icons">person_add</i></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="logout.php"><i class=" material-icons">power_settings_new</i></a>
                      </li>
                      
                    </ul>
                
              <!--</div>-->
            </div>
         </nav>
    
    <div class="profileContainer container">

            <div class="profileImage">
            <img src="images/<?php echo $profile['profile_image']; ?>" alt="profile image" height="150" width="150">
            </div>      

            <div class= "profileStuff">

            
                <div class="proName"><h1><?php echo $profile['first']; echo " "; echo $profile['middle']; echo " "; echo $profile['last']; ?></h1><br /></div>
                    
                    <div class="proinfo"> 
                        
                        <td>Username: <?php echo $profile['uname']; ?></td><br />
                        <td>Email Address: <?php echo $profile['email']; ?></td><br />
                        <td>Location: <?php echo $profile['location']; ?></td><br />
                        <td>Birthday:<?php echo $profile['birthday']; ?></td><br />
                    
                    </div>  
                <br />
                <div class="proabout"> 
                    <td><?php echo $profile['bio']; ?></td>
                </div>
                        <div class="btnedit">
            
            <button class="proedit btn button" data-toggle="collapse" data-target="#updatecollapse"><i class="material-icons">settings</i></button>

            <div id="updatecollapse" class="collapse">
            
            
          
            
<<<<<<< HEAD
        <br>
            <form name ="profileupdate" method="post" action = "profile.php" enctype="multipart/form-data">
                <div class="form-element">
                    <label>First Name: </label>
                    <input type="text" name="first" value="<?php echo $profile['first']; ?>"/>
                </div>
        <br>
                <div class="form-element">
                    <label>Middle Name: </label>
                    <input type="text" name="middle" value="<?php echo $profile['middle']; ?>"/>
                </div>
        <br>
                <div class="form-element">
                    <label>Last Name: </label>
                    <input type="text" name="last" value="<?php echo $profile['last']; ?>"/>
                </div>
        <br>
                <div class="form-element">
                    <!--YYYY-MM-DD-->
                    <label>Birthday: </label>
                    <input type="text" name="birthday" placeholder="YYYY-DD-MM" value="<?php echo $profile['birthday']; ?>" required pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" oninvalid="this.setCustomValidity('YYYY-MM-DD Format Required')"oninput="this.setCustomValidity('')" />
                </div>
        <br>
                <div class="form-element">
                    <!--Max 15 Characters-->
                    <label>Location: </label>
                    <input type="text" name="location" value="<?php echo $profile['location']; ?>" required pattern="^([a-zA-Z ]+)(?:,([ A-Z]{3,200}))$" oninvalid="this.setCustomValidity('Coventry, RI - Format Required')"oninput="this.setCustomValidity('')"/>
                </div>
        <br>
                
                <div class="form-element">
                    <label>Bio: </label>
                    <textarea type="text" name="bio" class=" form-control" id="exampleFormControlArea1" rows="4"><?php echo $profile['bio']; ?></textarea>
                </div>
        <br>        
                <div class="form-element">
                   <label>Change Password: </label> 
                  <!--UpperCase, LowerCaser, Number & Special Character, Min 8 Characters-->
                  <input type="password" class="form-control" id="password" name="pass" value ="<?php echo $profile['pw']; ?>" placeholder="Password" required pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" oninvalid="this.setCustomValidity('UpperCase, LowerCaser, Number & Special Character, Min 8 Characters')"oninput="this.setCustomValidity('')">
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
                
                <form action="fileUpload.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="myfile" id="fileToUpload">
                    <input type="submit" name="submit" value="Upload File Now" >
                    </form>
        
        </div>

            </div>   
            </div>

     </div>    
         
        
        <div class ="proposts">
            
            <div class ="addpost">
                
            </div>
            
            <div class="showpost">
                
            </div>
            
        </div>
            
           
        
    </body>
        <footer class="iekfooter"><p>Created by: Ethan Tran, Karissa Smith, Ian Shippee</p></footer>
</html>        