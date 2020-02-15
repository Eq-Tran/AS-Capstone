<?php
    include __DIR__. '/../../Models/model_functions.php';
    include __DIR__. '/../../Models/post_request_functions.php';
    include (__DIR__ . '/model_calendar.php');
    
  
    
    
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="#">
    </head>
    <style>
        .CalBox{
            width:300px;
            height:600px;
            box-sizing:border-box;
            border:1px solid black;
        }
        #data{
            width:200px;
            height:50px;
            box-sizing:border-box;
            border:1px solid black;
            margin:10px;
            position:relative;
        }
    </style>
        <body>
            <div class="CalBox">
                <div id="data">This
                    
                </div>
                
                
                
                
            </div>
            <div class="inputData">
                <input type="submit" onclick="executeAjaxRequest()"></button
            </div>
        </body>
    </main>
    <script>
    // AJAX function that executes the AJAX request
    function executeAjaxRequest(){
        
            // Create a new instance of a XMLHttpRequest Object.
            var xmlhttp = new XMLHttpRequest();
            
            // new XML onreadystate change defines a function to be executed.
            xmlhttp.onreadystatechange = function(){
                
                // if AJAX request readyState == 4 and request status == OK (200).
                if(this.readyState == 4 && this.status == 200){
                    
                    // Execute this code 
                    document.getElementById("data").innerHTML = this.responseText;
                    
                }
            };
            
            // Specify the request type and the URL you want to get the information from.
            xmlhttp.open("GET", "AjaxDataPage.php?", true);
            // Send the request.
            xmlhttp.send();
            //comment here
            // adding another comment here for git branching assignment.
            //AJAX stuff here
            //More stuff
            //sadfsadfasdfsdfaasdf
        
    }
    
    /* When there are multiple AJAX tasks on a website. You should use Call Back functions,
     * Call Back functions are functions that are passed as parameters to other AJAX functions. 
     */
    
    // Example
    /* function executeAjaxRequest(url, myCallBackFunction){
    
         var xhttp = new XMLHttpRequest();
         xhttp.onreadystatechange = function(){
       
                if(this.readyState == 4 && this.status == 200){
             
                    myCallBackFunction(this);
          
                }
            }// close function
        
            xhttp.open("GET", URL, true);
            xhttp.send();
          
        } // close AJAX function 
     */
  
  
    /* function myCallBackFunction(xhttp){
   
            // Code here
        }
    */
    
    /* function myCallBackFunction2(xhttp){
    
        // Code here
    
    }*/
    </script>
</html>