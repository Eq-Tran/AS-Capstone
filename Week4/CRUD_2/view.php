<html lang="en">
    
<head>
  <title>Corporate Table</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        
    <div class="col-sm-offset-2 col-sm-10">
        <h1>Corporate</h1>
    
    <?php
        
        include __DIR__ . '/model/model_Corporate.php';
        $results = getCorp();
        $action = filter_input(INPUT_GET, 'action');
        
        if ( $action === 'sort' ) {
            $column = filter_input(INPUT_GET, 'column');
            $order = filter_input(INPUT_GET, 'order');
            
            $check = rowCheck1($column, $order);
               
               if($check > 0){
                echo "Check: {$check}";
              }
              else
              {
                  echo "Nothing Found";
              }
               $results = sortCorps($column, $order);
            
        }
        
        else if ( $action === 'search' ) {
            $colum = filter_input(INPUT_GET, 'column');
            $order = filter_input(INPUT_GET, 'keyword');
            
            $check = rowCheck2($column, $keyword);
               
               if($check > 0){
                echo "Check: {$check}";
              }
              else
              {
                  echo "Nothing Found";
              }
               $results = searchCorps($column, $keyword);   
            
        }
        
        else if ($action === 'reset'){
               $results = getCorp();
        }
        
        include __DIR__ . '/includes/searchform.php';
        include __DIR__ . '/includes/sortform.php';
    ?>
  
    <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Corporation</th>
                    <th>Date Added</th>
                    <th>Email</th>
                    <th>Zip Code</th>
                    <th>Owner</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
            <br>
            <a href="addCorporate.php">Add Company</a> &nbsp;&nbsp; &nbsp; &nbsp;
            
            <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['corp']; ?></td>
                    <td><?php echo $row['incorp_dt']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['zipcode']; ?></td>
                    <td><?php echo $row['owner']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    
                    <td><a href="readCorporate.php?id=<?php echo $row['id']; ?>">Read</a></td>
                    <td><a href="updatedCorporate.php?id=<?php echo $row['id']; ?>">Update</a></td>
                    <td><a href="deleteCorporate.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        
        
        
    </div>
    </div>
</body>
</html>

