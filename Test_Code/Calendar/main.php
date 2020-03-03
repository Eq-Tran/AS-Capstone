<?php


include __DIR__ . '/functions.php';


$first = filter_input(INPUT_POST, 'first');
$middle = filter_input(INPUT_POST, 'middle');
$last = filter_input(INPUT_POST, 'last');


  $results =  add($first, $middle, $last);




?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    </head>
    <body>
        <main>
            <form method="POST">
                First Name:
                <input type="text" name="first" placeholder="First">
                Middle Name:
                <input type="text" name="middle" placeholder="Middle">
                Last Name:
                <input type="text" name="last" placeholder="Last">
                <button type="submit" >Button</button>
            </form>

        </main>
    </body>
    <script>
        
        
  

/*
        //AJAX REq to see if you can use php function from different URL
        function Request(){
            
            var xhttp = new XMLHttpRequest();
            
            xhttp.onreadystatechange = function(){
                
                if(this.readyState == 4 && this.status == 200){
                    
                    
                    document.querySelector().innerHTML = this.responseText;
                    
                }
                
                
            };
            
            xhttp.open("GET", "", true);
            xhttp.send();
            
            
        }
        */

        
        
        
        
        
        
        
        
        
        
        
    </script>
</html>