<?php

    include __DIR__. '/model/model_Corporate.php';
    include __DIR__. '/functions.php';
    
    if (isPostRequest())
    {
        
        $corp = filter_input(INPUT_POST, 'corp');
        $incorp_dt = filter_input(INPUT_POST, 'date');
        $email = filter_input(INPUT_POST, 'email');
        $zipcode = filter_input(INPUT_POST, 'zip');
        $owner = filter_input(INPUT_POST, 'owner');
        $phone = filter_input(INPUT_POST, 'phone');
        $results = addCorp ($corp, $incorp_dt, $email, $zipcode, $owner, $phone);
        
    }
    
?>

<html lang="en">
    
<head>
    
  <title>Add Corporation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>

<body>
   
<div class="container">
    
  <h2>Add Corporation</h2>
  
  <form class="form-horizontal" action="addCorporate.php" method="post">
      
    <div class="form-group">
      <label class="control-label col-sm-2" for="corporation name">Corporation Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="team" placeholder="Enter Corp Name" name="corp">
      </div>
    </div>
      
    <div class="form-group">
      <label class="control-label col-sm-2" for="corporate email">Corporate Email:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="division" placeholder="Enter Corp Email" name="email">
      </div>
    </div>
      
    <div class="form-group">
      <label class="control-label col-sm-2" for="corporate zip">Corporate Zip Code:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="division" placeholder="Enter Corp Zip" name="zip">
      </div>
    </div>
      
    <div class="form-group">
      <label class="control-label col-sm-2" for="corporate owner">Corporation Owner:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="division" placeholder="Enter Corp Owner" name="owner">
      </div>
    </div>
      
    <div class="form-group">
      <label class="control-label col-sm-2" for="corporate phone">Corporate Phone Number:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="division" placeholder="Enter Corp Phone" name="phone">
      </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Add Corporation</button>
        <?php
            if (isPostRequest()) {
                echo "Corporation Archived";
                
            }
        ?>
      </div>
    </div>
  </form>
  
  <div class="col-sm-offset-2 col-sm-10"><a href="./view.php">View Corporate Table</a></div>
</div>

</body>
</html>