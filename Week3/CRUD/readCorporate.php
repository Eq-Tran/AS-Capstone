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
        <h1>Corporate Read</h1>
    
    <?php
        
        include __DIR__ . '/model/model_Corporate.php';
        
        $id = filter_input(INPUT_GET, 'id');
        $corp = filter_input(INPUT_GET, 'corp');
        $incorp_dt = filter_input(INPUT_GET, 'incorp_dt');
        $email = filter_input(INPUT_GET, 'email');
        $zipcode = filter_input(INPUT_GET, 'zipcode');
        $owner = filter_input(INPUT_GET, 'owner');
        $phone = filter_input(INPUT_GET, 'phone');
        
        $corps = readCorp($id);
        
        
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

                <a href="view.php">Return</a>
                    
                <tr>
                    <td><?php echo $corps['id']; ?></td>
                    <td><?php echo $corps['corp']; ?></td>
                    <td><?php echo $corps['incorp_dt']; ?></td>
                    <td><?php echo $corps['email']; ?></td>
                    <td><?php echo $corps['zipcode']; ?></td>
                    <td><?php echo $corps['owner']; ?></td>
                    <td><?php echo $corps['phone']; ?></td>
                </tr>
          
            </tbody>
        </table>
        
        
        
    </div>
    </div>
</body>
</html>
