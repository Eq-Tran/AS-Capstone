<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type ="text/css" href="mainpage.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   
    </head>
    <body>
        <title>Capstone Winter 2020</title>
        
        <h1 id="page-header"> Capstone Project - Ian S., Ethan T., Karissa S.</h1>
        <hr>

            <div class="col-sm-4" style="width:55%;">
            <div class="panel panel-default" style="border-color: rgba(102,0,204, 1.0);">
            <div class="panel-heading" style="background-color: rgba(102,0,204, .1);"> Status Reports </div>
                <div class="panel-body">
            <table class="table" >
                <thead>
                <tr>
                 <th scope="col">Ethan</th>
                 <th scope="col">Ian</th>
                 <th scope="col">Karissa</th>
                </tr>
            </thead>
            <tbody id="table-body">
                
                <tr>
                <td><a href="">Status 1</a></td>
                <td><a href="">Status 1</a></td>
                <td><a href="">Status 1</a></td>
                </tr>
                
                <tr>
                <td></td>
                <td></td>
                <td></td>
                </tr>
                
                <tr>
                <td></td>
                <td></td>
                <td></td>
                </tr>
                
                <tr>
                <td></td>
                <td></td>
                <td></td>
                </tr>
                
                <tr>
                <td></td>
                <td></td>
                <td></td>
                </tr>
                
                <tr>
                <td></td>
                <td></td>
                <td></td>
                </tr>
                
                <tr>
                <td></td>
                <td></td>
                <td></td>
                </tr>
                
            </tbody>
            </table>
                    
                </div>
        </div>
            </div>     
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
                    <div class="col-sm-4">
                    <div class="panel panel-danger" style="border-color: rgba(178, 0, 1.0); border: .1em solid rgba(178, 0, 1.0); position: relative; margin-bottom: 10px; ">
                        <!-- ADD LINK TO GITHUB PROFILE HERE -->
                        <div class="panel-heading"  style="color:white;"> Team Github Repositories </div>  
                        <div class="panel-body">
                         <li><a href="https://github.com/Eq-Tran/AS-Capstone">Capstone Repository</a></li>
                         <li><a href="https://github.com/Eq-Tran">Ethan's Repository</a></li>
                         <li><a href="https://github.com/HHarukana">Ian's Repository</a></li>
                         <li><a href="https://github.com/klsmith6">Karissa's Repository</a></li>
                        </div>
                    </div>
                    </div>
          
                
                
                
                
           
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
                <div class="col-sm-4">
                <div class="panel panel-primary"  >
                    <div class="panel-heading" style="background-color:rgba(0, 121, 178, .4);"> Deliverables </div>  
                    <div class="panel-body">
                        <li><a href="">AS Capstone Proposal</a></li>
                        <li><a href="">AS Capstone Prototype</a></li>
                        <li><a href="">AS Capstone Database Design</a></li>
                        <li><a href="">AS Capstone Implementation</a></li>
                    
                    
                    </div>
                    
                </div>
                
                    <div class="panel panel-warning" style="width:35%; margin-left:10%; border:1px solid rgba(244, 232, 0, 1.0); float:right; margin-right:70%;">
                    <div class="panel-heading" style="border:1px solid rgba(244, 232, 0, .8);" >Date:</div>
                    <div class="panel-body">
                     <?php
                            $file = "mainpage.php";
                            $mod_date=date("F d Y h:i:s A", filemtime("mainpage.php"));

                            echo "Last modified " .date("F / d / Y h:m:s A", filemtime("mainpage.php"));
                           
                     ?>
                    </div>
                </div>
            </div>



        
        <footer>&copy; Ethan Tran, Ian Shippee, Karissa Smith 2020</footer>
        
   
    <script>
       var clicked = document.querySelectorAll(".click");
       
       for(let i = 0 ; i < clicked.length ; i++){
           
           clicked[i].addEventListener("click", function(e){
            
            e.preventDefault();
           console.log("clicked");
           alert("Work in progress......");
           
               
               
           });
           
           
           
       }
  
    
    
    </script>
   
    </body>
</html>    
    
    
  