<?php 
  session_start();  
  include __DIR__ . '/model/modelFriend.php';
  include __DIR__ . '/include/includes.php';
  $_SESSION['loggedOn'];
  $myId= $_SESSION['id'];
  $err = "";
  $User = filter_input(INPUT_POST,'username');
  $friendId = '';
  $results=[];
  $results = findUser($User);
  $friendId= filter_input(INPUT_GET, 'friendId');
  
  echo "My Id is: ";
  echo $myId;
  echo "<br> My friends id id: ";
  echo $friendId;
  var_dump($_SESSION['id']);
  var_dump($myId);
  send_friend_request($myId, $friendId);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search Friends</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
</head>
<body>
<div class="container">
        <nav>
            <ul>
                <li><a href="index.php">index</a></li>
                <li><a href="notifications.php" class="active">notifications</a></li>
            </ul>
        </nav>
    </div>
<div class="container">
        <h1>Search Users</h1>

        <form class="form-horizontal" action="search.php" method="post">
        <div class="form-group">

          <label class="control-label col-sm-2" for="username">UserName:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="username" placeholder="Enter Username" >
          </div>
        </div>
        <div class="form-group">        
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default" name="search">Search</button>

          </div>
        </div>
        <table class="table table-striped">
          <thead>
              <th>ID</th>
            <th>Username</th>
            <th>Add Friend Button</th>
          </thead>
          <tbody>
            <?php foreach($results as $row):?>
              <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['username']; ?></td>
              <td><a href="search.php?friendId=<?php echo $row['id']; ?>" class ="btn btn-success" name="friendId">Add Friend</a></td>

              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>

        </form>

        </table>
    </div>

</body>
</html>