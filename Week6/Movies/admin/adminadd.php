<?php

    session_start();
        if(!isset($_SESSION['use'])) 
       {
           header('Location: adminlogin.php');  
       }
          echo "Welcome ";
          echo $_SESSION['use'];
          echo "<a href='adminlogout.php'> Logout</a> ";
    
    include __DIR__. '/../models/model_movie.php';
    include __DIR__ . '/../includes/functions.php';
    
    if (isPostRequest())
    {
        
        $movie_name = filter_input(INPUT_POST, 'movie_name');
        $movie_year = filter_input(INPUT_POST, 'movie_year');
        $movie_rating = filter_input(INPUT_POST, 'movie_rating');
        $movie_description = filter_input(INPUT_POST, 'movie_description');
        $movie_active = filter_input(INPUT_POST, 'movie_active');
        $results = addMovie ($movie_name, $movie_year, $movie_rating, $movie_description, $movie_active);
        
        
    }
    
?>

<html lang="en">
    
<head>
    
  <title>Admin Add Movie</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>

<body>
   
<div class="container">
    
  <h2>Add Movie</h2>
  
  <form class="form-horizontal" action="adminadd.php" method="post">
      
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Movie Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="team" placeholder="Enter Movie Name" name="movie_name">
      </div>
    </div>
      
    <div class="form-group">
      <label class="control-label col-sm-2" for="year">Year Released:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="division" placeholder="Enter Year Released" name="movie_year">
      </div>
    </div>
      
    <div class="form-group">
      <label class="control-label col-sm-2" for="rating">Movie Rating:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="division" placeholder="Enter Short Rating" name="movie_rating">
      </div>
    </div>
      
    <div class="form-group">
      <label class="control-label col-sm-2" for="description">Movie Description:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="division" placeholder="Enter Movies Description" name="movie_description">
      </div>
    </div>
      
    <div class="form-group">
      <label class="control-label col-sm-2" for="active">Movie Active:</label>
      <div class="col-sm-10">          
        <input type="checkbox" name="movie_active" value="1" />
      </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Add Movie</button>
        <?php
            if (isPostRequest()) {
                echo "Movie Added";
                
                
            }
            
            else
            {
                echo "Movie Not Added";
            }
        ?>
      </div>
    </div>
  </form>
  
  <div class="col-sm-offset-2 col-sm-10"><a href="adminview.php">Return to View</a></div>
</div>

</body>
</html>