<?php 
    session_start();
    
    if(!isset($_SESSION['use'])) 
       {
           header('Location: login.php');  
       }
          echo "Welcome ";
          echo $_SESSION['use'];

          echo "<a href='logout.php'> Logout</a> ";
          
          include __DIR__ . '/models/model_schools.php';
          include __DIR__ . '/includes/functions.php';
          
          $school = filter_input(INPUT_POST, 'schoolName');
          $city = filter_input(INPUT_POST, 'schoolCity');
          $state = filter_input(INPUT_POST, 'schoolState');
          
          $getSchools = getSchools($school, $city, $state);
          
          
          
          
?>

<head>
  <title>Schools Search</title>
</head>

<body>
    
    <h1>Schools Search</h1>
    
<form method="post"  name="search" action = "search.php">
    
    <div class="form-element">
        <label>School Name: </label>
        <input type="text" name="schoolName" value="">
    </div>
    <br>
    <div class="form-element">
        <label>City: </label>
        <input type="text" name="city" value="">
    </div>
    <br>
    <div class="form-element">
        <label>State: </label>
        <input type="text" name="state" value="">
    </div>
    <br>
    <button type="submit" name="search" value="Search">Search</button>
</form>
    
    <table class="table table-striped">
            <thead>
                <tr>
                    <th>School</th>
                    <th>City</th>
                    <th>State</th>
                </tr>
            </thead>
            <tbody>
            
            <?php foreach ($getSchools as $row): ?>
                <tr>
                    <td><?php echo $row['schoolName']; ?></td>
                    <td><?php echo $row['schoolCity']; ?></td>
                    <td><?php echo $row['schoolState']; ?></td>
                </tr>
            <?php endforeach; ?>
              
            </tbody>
        </table>
    
</body>
