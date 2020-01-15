<?php
    
    include __DIR__. '/models/model_movie.php';
    include __DIR__ . '/includes/functions.php';
    
    if (isPostRequest())
    {
        
        $movie_review_rating = filter_input(INPUT_POST, 'movie_review_rating');
        $movie_review_narrative = filter_input(INPUT_POST, 'movie_review_narrative');
        $results = insertMovieReview ($movie_review_rating, $movie_review_narrative);
        
        
    }
    
?>

<html lang="en">
    
<head>
    
  <title>Add Movie Review</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>

<body>
   
<div class="container">
    
  <h2>Add Movie Review</h2>
  
  <form class="form-horizontal" action="adminadd.php" method="post">
      
    <div class="form-group">
      <label class="control-label col-sm-2" for="rating">Movie Rating:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="team" placeholder="Enter Movie Rating" name="movie_review_rating">
      </div>
    </div>
      
    <div class="form-group">
      <label class="control-label col-sm-2" for="narrative">Review Description:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="division" placeholder="Enter Your Review" name="movie_review_narrative">
      </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Add Review</button>
        <?php
            if (isPostRequest()) {
                echo "Review Added";
                
                
            }
            
            else
            {
                echo "Review Not Added";
            }
        ?>
      </div>
    </div>
  </form>
  
  <div class="col-sm-offset-2 col-sm-10"><a href="adminview.php">Return to View</a></div>
</div>

</body>
</html>