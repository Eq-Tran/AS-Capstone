<?php
    include __DIR__ . '/model/model_Corporate.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
 
        <?php
        
        $action = filter_input(INPUT_POST, 'action');
        
        if ( $action === 'sort' ) {
            $colum = filter_input(INPUT_GET, 'column');
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
               $results = sortCorps($column, $keyword);   
            
        }
        
        else if ($action === 'reset'){
            
             $results = getCorp();
               
        }
        
        include_once __DIR__ . '/includes/searchform.php';
        include_once __DIR__ . '/includes/sortform.php';
        
 
        
        ?>
    </body>
</html>