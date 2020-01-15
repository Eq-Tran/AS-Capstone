<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Update Corporation</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
        
            include './model/db.php';
            include './functions.php';
            
            
            global $db;
            
            $result = '';
            $corp = '';
            $email = '';
            $zipcode = '';
            $owner = '';
            $phone = '';
            

            if (isPostRequest()) {
                $id = filter_input(INPUT_POST, 'id');
                $corp = filter_input(INPUT_POST, 'corp');
                $email = filter_input(INPUT_POST, 'email');
                $zipcode = filter_input(INPUT_POST, 'zipcode');
                $owner = filter_input(INPUT_POST, 'owner');
                $phone = filter_input(INPUT_POST, 'phone');
                $stmt = $db->prepare("UPDATE corps set corp = :corp, email = :email, zipcode = :zipcode, owner = :owner, phone = :phone where id = :id");
                
                $binds = array(
                    ":id" => $id,
                    ":corp" => $corp,
                    ":email" => $email,
                    ":zipcode" => $zipcode,
                    ":owner" => $owner,
                    ":phone" => $phone
                );
                
                if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                   $result = 'Corporation updated';
                } 
            }
            
            else {
                
                $id = filter_input(INPUT_GET, 'id');
                $stmt = $db->prepare("SELECT * FROM corps where id = :id");
                $binds = array(
                    ":id" => $id
                );
                if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                   
                   $results = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                    $corp = $results['corp'];
                    $email = $results['email'];
                    $zipcode = $results['zipcode'];
                    $owner = $results['owner'];
                    $phone = $results['phone'];
                    
                } 
            }
        
        ?>
        
        
    
  <h2>Update Corporation</h2>
  
  <form class="form-horizontal" action="updatedCorporate.php" method="post"> 
      
     <input type="hidden" name="id" value="<?php echo $id; ?>">
     
      
    <div class="form-group">
      <label class="control-label col-sm-2" for="corporation name">Corporation Name:</label>
      <div class="col-sm-10">
        <!--<input type="text" class="form-control" id="corp" name="corp" >-->
            <input type="text" value="<?php echo $corp; ?>" name="corp">
      </div>
    </div>
      
    <div class="form-group">
      <label class="control-label col-sm-2" for="corporate email">Corporate Email:</label>
      <div class="col-sm-10">          
        <!--<input type="text" class="form-control" id="email" name="email">-->
            <input type="text" value="<?php echo $email; ?>" name="email">
      </div>
    </div>
      
    <div class="form-group">
      <label class="control-label col-sm-2" for="corporate zip">Corporate Zip Code:</label>
      <div class="col-sm-10">          
         <!--<input type="text" class="form-control" id="zip" name="zip">-->
          <input type="text" value="<?php echo $zipcode; ?>" name="zipcode">
      </div>
    </div>
      
    <div class="form-group">
      <label class="control-label col-sm-2" for="corporate owner">Corporation Owner:</label>
      <div class="col-sm-10">          
        <!--<input type="text" class="form-control" id="owner" name="owner">-->
          <input type="text" value="<?php echo $owner; ?>" name="owner" >
      </div>
    </div>
      
    <div class="form-group">
      <label class="control-label col-sm-2" for="corporate phone">Corporate Phone Number:</label>
      <div class="col-sm-10">          
        <!--<input type="text" class="form-control" id="phone" name="phone">-->
          <input type="text" value="<?php echo $phone; ?>" name="phone">
      </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Update Corporation</button>
        <?php
            if (isPostRequest()) {
                echo "Corporation Updated";
                
            }
        ?>
      </div>
    </div>
  </form>
  
  <div class="col-sm-offset-2 col-sm-10"><a href="./view.php">Return</a></div>
</div>
        
    </body>
</html>