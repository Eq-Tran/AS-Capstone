<?php


include __DIR__ . '/functions.php';

/*
$first = filter_input(INPUT_POST, 'first');
$middle = filter_input(INPUT_POST, 'middle');
$last = filter_input(INPUT_POST, 'last');


$results =  add($first, $middle, $last);

*/


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
                <input type="text" name="first" placeholder="First" id="first" value="">
                Middle Name:
                <input type="text" name="middle" placeholder="Middle" id="middle" value="">
                Last Name:
                <input type="text" name="last" placeholder="Last" id="last" value="">
                <input type="submit"  id="add" value="Add">Add</input>
            </form>
            <div id="data">
          
                
            </div>
            
            
            <h1>Names</h1>
                <ol id="names_list">
                    
                </ol>
        </main>
    </body>
    <script>
        
        window.addEventListener('load', loadPage);
       function displayNames(names){
           
           for(var i = 0; i < names.length; i++){
               
               
               $("#names_list").append('<li><a href="#">' + names[i].first + '' + names[i].middle + '' + names[i].last + '</a></li>');
               
           }
              
       }

     
        var button = document.querySelector("#add");
        button.addEventListener("click", addName);
        
        // adds name to the database through a php script 
        async function addName(){
            
             //event.preventDefault();
             
            var first = document.getElementById("first").value;
            var middle = document.getElementById("middle").value;
            var last = document.getElementById("last").value;
            
            
            const url = 'ajaxdata.php';
            const data = {first: first, middle: middle, last: last};
            
            try{
                
                const response =  await fetch(url,{
                    
                   'method' : 'POST',
                   'body' : JSON.stringify(data),
                   'headers' : {
                       
                       'content-type' : 'application/json'
                       
                   }
                }).then(function(data)
                {
                    console.log(data);
                });
        
                 console.log(response)
                 //const id = await response.json();
               
                
                 $("#names_list").append('<li><a href="#">' + first + '' + middle + '' + last + '</a></li>');
                    document.getElementById("data").innerHTML = "Added Name " + first + '' + middle + '' + last ;
                   
            }catch(error){
                
                console.error(error);
            }
        }
        
        
       async function loadPage(){

            const url = 'AjaxDatapage.php';
            //const error = 'Not working';
            
            try{
                
                const response = await fetch(url, {
                    
                    'method' : 'GET',
                    'headers' : {
                       
                       'content-type' : 'application/json'
                       
                   }
           
                });
                
                const json = await response.json();
                console.log(json);
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