<?php
        
            
            include __DIR__ . '/../includes/functions.php';
            include __DIR__. '/../models/db.php';
            
            
            global $db;
            
            $result = '';
            $movie_name = '';
            $movie_year = '';
            $movie_rating = '';
            $movie_description = '';
            $movie_active = '';
            

            if (isPostRequest()) {
                $movie_id = filter_input(INPUT_POST, 'movie_id');
                $movie_name = filter_input(INPUT_POST, 'movie_name');
                $movie_year = filter_input(INPUT_POST, 'movie_year');
                $movie_rating = filter_input(INPUT_POST, 'movie_rating');
                $movie_description = filter_input(INPUT_POST, 'movie_description');
                $movie_active = filter_input(INPUT_POST, 'movie_active');
                $stmt = $db->prepare("UPDATE movies SET movie_name = :mname, movie_year = :myear, movie_rating = :mrating, movie_description = :mdescription, movie_active = :mactive WHERE movie_id = :id");
                
                $binds = array(
                    ":id" => $movie_id,
                    ":mname" => $movie_name,
                    ":myear" => $movie_year,
                    ":mrating" => $movie_rating,
                    ":mdescription" => $movie_description,
                    ":mactive" => $movie_active 
                );
                
                if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                   $result = 'Movie updated';
                } 
            }
            
            else {
                
                $movie_id = filter_input(INPUT_GET, 'id');
                $stmt = $db->prepare("SELECT * FROM movies WHERE movie_id = :id");
                $binds = array(
                    ":id" => $movie_id
                );
                
                if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                   
                   $results = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                    $movie_name = $results['movie_name'];
                    $movie_year = $results['movie_year'];
                    $movie_rating = $results['movie_rating'];
                    $movie_description = $results['movie_description'];
                    $movie_active = $results['movie_active'];
                    
                } 
            }
        
        ?>
        

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Update Movie</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>
    
  <h2>Update Corporation</h2>
  
  <form class="form-horizontal" action="movieupdate.php" method="post"> 
      
     <input type="hidden" name="movie_id" value="<?php echo $movie_id; ?>">
     
      
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Movie Name:</label>
      <div class="col-sm-10">
            <input type="text" value="<?php echo $movie_name; ?>" name="movie_name">
      </div>
    </div>
      
    <div class="form-group">
      <label class="control-label col-sm-2" for="year">Year Released:</label>
      <div class="col-sm-10">          
            <input type="text" value="<?php echo $movie_year; ?>" name="movie_year">
      </div>
    </div>
      
    <div class="form-group">
      <label class="control-label col-sm-2" for="rating">Movie Rating:</label>
      <div class="col-sm-10">          
          <input type="text" value="<?php echo $movie_rating; ?>" name="movie_rating">
      </div>
    </div>
      
    <div class="form-group">
      <label class="control-label col-sm-2" for="description">Movie Description:</label>
      <div class="col-sm-10">          
          <input type="text" value="<?php echo $movie_description; ?>" name="movie_description" >
      </div>
    </div>
      
    <div class="form-group">
      <label class="control-label col-sm-2" for="active">Movie Active:</label>
      <div class="col-sm-10">          
          <input type="checkbox" value="<?php echo $movie_active; ?>" name="movie_active">
      </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Update Movie</button>
        <?php
            if (isPostRequest()) {
                echo "Movie Updated";
                
            }
        ?>
      </div>
    </div>
  </form>
  
  <div class="col-sm-offset-2 col-sm-10"><a href="./adminview.php">Return</a></div>
</div>
        
    </body>
</html>