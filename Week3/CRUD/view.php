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
        $getCorps = getCorp();
        
    ?>
  
    <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Corporation</th>
                </tr>
            </thead>
            <tbody>
                
                <a href="addCorporate.php">Add Company</a>

            <?php foreach ($getCorps as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['corp']; ?></td>
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

