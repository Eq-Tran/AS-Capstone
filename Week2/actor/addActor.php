<?php

    include __DIR__. '/model/model_actor.php';
    include __DIR__. '/functions.php';
    
    if (isPostRequest())
    {
        
        $firstname = filter_input(INPUT_POST, 'firstname');
        $lastname = filter_input(INPUT_POST, 'lastname');
        $dob = filter_input(INPUT_POST, 'dob');
        $height = filter_input(INPUT_POST, 'height');
        $results = addActor ($firstname, $lastname, $dob, $height);
        
    }
    
?>

<html lang="en">
    
<head>
    
  <title>Add Famous Actor</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>

<body>
   
<div class="container">
    
  <h2>Add Actor</h2>
  
  <form class="form-horizontal" action="addActor.php" method="post">
      
    <div class="form-group">
      <label class="control-label col-sm-2" for="actor first name">Actor First Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="team" placeholder="Enter actor first name" name="firstname">
      </div>
    </div>
      
    <div class="form-group">
      <label class="control-label col-sm-2" for="actor last name">Actor Last Name:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="division" placeholder="Enter actor last name" name="lastname">
      </div>
    </div>
      
    <div class="form-group">
      <label class="control-label col-sm-2" for="actor date of birth">Actor Date of Birth:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="division" placeholder="Enter actor date of birth" name="dob">
      </div>
    </div>
      
    <div class="form-group">
      <label class="control-label col-sm-2" for="actor height">Actor Height:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="division" placeholder="Enter actor height" name="height">
      </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Add Actor</button>
        <?php
            if (isPostRequest()) {
                echo "Actor Archived";
                
            }
        ?>
      </div>
    </div>
  </form>
  
  <div class="col-sm-offset-2 col-sm-10"><a href="./view.php">View Actors Table</a></div>
</div>

</body>
</html>