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
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
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
            
               
                    <canvas id="myChart">
                        
                    </canvas>
              
            
        </body>
    </main>
    <script>
    function showChart(){
        
      var chrt = document.getElementById("myChart").getContext("2d");
      
      
      var data = {
            labels: ["match1", "match2", "match3", "match4", "match5"],
            datasets: [
              {
                label: "TeamA Score",
                data: [10, 50, 25, 70, 40],
                backgroundColor: [
                  "rgba(10,20,30,0.3)",
                  "rgba(10,20,30,0.3)",
                  "rgba(10,20,30,0.3)",
                  "rgba(10,20,30,0.3)",
                  "rgba(10,20,30,0.3)"
                ],
                borderColor: [
                  "rgba(10,20,30,1)",
                  "rgba(10,20,30,1)",
                  "rgba(10,20,30,1)",
                  "rgba(10,20,30,1)",
                  "rgba(10,20,30,1)"
                ],
                borderWidth: 1
              },
              {
                label: "TeamB Score",
                data: [20, 35, 40, 60, 50],
                backgroundColor: [
                  "rgba(50,150,200,0.3)",
                  "rgba(50,150,200,0.3)",
                  "rgba(50,150,200,0.3)",
                  "rgba(50,150,200,0.3)",
                  "rgba(50,150,200,0.3)"
                ],
                borderColor: [
                  "rgba(50,150,200,1)",
                  "rgba(50,150,200,1)",
                  "rgba(50,150,200,1)",
                  "rgba(50,150,200,1)",
                  "rgba(50,150,200,1)"
                ],
                borderWidth: 1
              }
            ]
          };

          //options
          var options = {
            responsive: true,
            title: {
              display: true,
              position: "top",
              text: "Bar Graph",
              fontSize: 18,
              fontColor: "#111"
            },
            legend: {
              display: true,
              position: "bottom",
              labels: {
                fontColor: "#333",
                fontSize: 16
              }
            },
            scales: {
              yAxes: [{
                ticks: {
                  min: 0
                }
              }]
            }
          };
      var ctx = new Chart(chrt,{
          
          
          type:'bar',
          data: data,
          options: options
              
         
      });
        
    }
    
    showChart();
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
                    alert("hello");
                    
                    for( let i = 0; i < 10 ; i++){
                        
                        document.getElementById("Calbox").innerHTML = i;
                    }
                    
                }
            };
            
            // Specify the request type and the URL you want to get the information from.
            xmlhttp.open("GET", "AjaxDataPage.php?x=8&y=5", true);
            // Send the request.
            xmlhttp.send();

            //comment here
            // adding another comment here for git branching assignment.
            //AJAX stuff here

            //More stuffasdfasdf

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