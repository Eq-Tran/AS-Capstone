<?php
    session_start();
    include __DIR__. '/../../Models/model_functions.php';
    include __DIR__. '/../../Models/post_request_functions.php';
    
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
            $results = updateProfile($userid, $first, $middle, $last, $birthday, $bio, $location);
        
        }
    
    
    
    
?>

<html lang="en">
    
    <head>
        
        <title>Go Profile</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link href="../../CSS/styles.css" rel="stylesheet" type="text/css">
        
    </head>
    
    <body>
        
        <div class="navbar">
        
            <div class="logo">
            
            </div>
        
            <div class ="logout">
                    
                <?PHP echo "<a href='logout.php'> Logout</a> ";?>
            
            </div>
        
        </div>
        
        <div class="content1">
        
        <div class ="proimg">
                    
                    <td><img src="../images/<?php echo $profile['profile_image']; ?>" alt="profile image"></td>
                    <td><?php echo $profile['birthday']; ?></td>
                    <td><?php echo $profile['location']; ?></td>
                    
        </div>
        
        <div class ="proabout">
                    
                    <td><?php echo $profile['uname']; ?></td>
                    <td><?php echo $profile['first']; echo " "; echo $profile['middle']; echo " "; echo $profile['last']; ?></td>
                    <td><?php echo $profile['email']; ?></td>
                    <td><?php echo $profile['bio']; ?></td>
                    
        </div>
        
        <div class="btnedit">
            
            <button data-toggle="collapse" data-target="#updatecollapse">Update Profile</button>
            <button data-toggle="collapse" data-target="#uploadcollapse">Upload Profile Image</button>
            
        </div>
            
            <!--posts stuff goes here-->

        <div id="updatecollapse" class="collapse">
            
            
                
            
    
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
            
        <div id="uploadcollapse" class="collapse">
            
                <form action="fileUpload.php" method="post" enctype="multipart/form-data">
                <input type="file" name="myfile" id="fileToUpload">
                <input type="submit" name="submit" value="Upload File Now" >
                </form>
                
        </div>    
        
        </div> 
        
        <div class ="proposts">
            
            <div class ="addpost">
                
            </div>
            
            <div class="showpost">
                
            </div>
            
        </div>
            
           
        
    </body>
    
</html>
