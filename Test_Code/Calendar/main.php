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
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <main>
            <form method="POST">
                First Name:
                <input type="text" name="first" placeholder="First" id="first">
                Middle Name:
                <input type="text" name="middle" placeholder="Middle" id="middle">
                Last Name:
                <input type="text" name="last" placeholder="Last" id="last">
                <button type="submit"  id="add" value="Add">Add</button>
            </form>
            <div class="data">
                
                <h1>Names</h1>
                <ul id="names_list">
                    
                </ul>
                
                
                
            </div>
            
            
            
        </main>
    </body>
    <script>
        
        
       function displayNames(names){
           
           for(var i = 0; i < names.length; i++){
               
               
               $("#names_list").append('<li><a href="#">' + names[i].first + '' + names[i].middle + '' + names[i].last + '</a></li>');
               
           }
              
       }
        
        window.addEventListener('load', loadPage);
        var button = document.querySelector("#add");
        button.addEventListener("click", addName);
        async function addName(){
            
            var first = document.querySelector("#first");
            var middle = document.querySelector("#middle");
            var last = document.querySelector("#last");
            
            
            const url = 'ajaxdata.php';
            const data = {first: first, middle:middle , last:last};
            
            try{
                
                const response = fetch(url,{
                    
                   'method' : 'POST',
                   'body' : JSON.stringify(data),
                   'headers' : {
                       
                       'content-type' : 'application/json'
                       
                   }
                });
                
                const id = await response.json();
                 $("#team_list").append('<li><a href="#">' + first + '' + middle + '' + last + '</a></li>');
                    document.getElementById("message").innerHTML = "Added Name " + first + '' + middle + '' + last + '' +  ". Id: " + id;
            }catch(error){
                
                console.error(error);
            }
        }
        
        async function loadPage(){
            
            const url = 'AjaxDataPage.php';
            
            try{
                
                const response = fetch(url, {
                    
                    'method' : 'GET'
                    
                });
                
                const json = await response.json();
                
                displayNames(json);
            }catch(error){
                
                console.error(error);
                
            }
            
        }
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