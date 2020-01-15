<?php
        
        include __DIR__ . '/models/model_movie.php';
        
        $movie_id = filter_input(INPUT_GET, 'id');
        $movie_name = filter_input(INPUT_GET, 'movie_name');
        $movie_description = filter_input(INPUT_GET, 'movie_description');
        $movie_year = filter_input(INPUT_GET, 'movie_year');
        $movie_rating = filter_input(INPUT_GET, 'movie_rating');
        $avg_rating = filter_input(INPUT_GET, 'avg_rating');
        
        $movie = getMovie($movie_id);
        
        
    ?>


<html lang="en">
    
<head>
  <title>Movie View</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        
    <div class="col-sm-offset-2 col-sm-10">
        <h1>Movie Read</h1>
    
    
  
    <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Movie Name</th>
                    <th>Description</th>
                    <th>Year</th>
                    <th>Rating</th>
                    <th>Average Review Score</th>
                </tr>
            </thead>
            <tbody>

                <a href="index.php">Return</a>
                <br>
                <a href="reviewadd.php">Add Review</a>
                    
                <tr>
                    <td><?php echo $movie['movie_id']; ?></td>
                    <td><?php echo $movie['movie_name']; ?></td>
                    <td><?php echo $movie['movie_description']; ?></td>
                    <td><?php echo $movie['movie_year']; ?></td>
                    <td><?php echo $movie['movie_rating']; ?></td>
                    <td><?php echo $movie['avg_rating']; ?></td>
                </tr>
          
            </tbody>
        </table>
        
        
        
    </div>
    </div>
</body>
</html>
