<?php

include __DIR__ . '/Models/model_functions.php';
include __DIR__ . '/Models/post_request_functions.php';

$datetime = new DateTime;

if(isset($_GET['year']) && isset($_GET['week'])){
    
    $datetime->setISODate($_GET['year'], $_GET['week']);
    
}else{
    
    $datetime->setISODate($datetime->format('o'), $datetime->format('W'));
    
}

$year = $datetime->format('o');
$week = $datetime->format('W');
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GO - Profile</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    
    <!-- Link to Javascript Scripts -->
    <script src="calendarAjax.js"></script>
    
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!--Google fonts using Oswald and Hind Siliguri -->
    <link href="https://fonts.googleapis.com/css?family=Hind+Siliguri|Oswald&display=swap" rel="stylesheet">


    </head>
    <style>
        html, body{
            
            width:100%;
            height:100vh;
            
            
        }
        .calendar{
            width:80%;
            height:60vh;
            border:1px solid black;
            margin-left: 10%;
        }
        
        #add{
            
            margin-left:800px;
            
        }
    </style>
    <body>
        <div id="cal-container-main">
            
            <div id="calendar-nav-links">
                <a href="<?php echo '?week='.($week-1).'&year='.$year; ?>">Pre Week</a> <!--Previous week-->
                <a href="<?php echo '?week='.($week+1).'&year='.$year; ?>">Next Week</a> <!--Next week-->
            </div>
            
            <div class="calendar">
                <table class="table table-responsive">
                    <thead>
                        <?php
                         do {
                                echo "<th>" . $datetime->format('l') . "<br>" . $datetime->format('d M') . "</th>\n";
                                $datetime->modify('+1 day');
                            } while ($week == $datetime->format('W'));
                        ?>
                    </thead>
                    <tbody>
                        <tr>
                            <td>ello</td>
                            <td>ello</td>
                            <td>ello</td>
                            <td>ello</td>
                            <td>ello</td>
                            <td>ello</td>
                            <td>ello</td>
                        </tr>
                        <tr>
                            <td>ello</td>
                            <td>ello</td>
                            <td>ello</td>
                            <td>ello</td>
                            <td>ello</td>
                            <td>ello</td>
                            <td>ello</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            <div id="add">
                <form method="POST">
                    <input type="text" name="post" placeholder="Add A Post!">
                    <select>
                    <option>Mon</option>
                    <option>Tue</option>
                    <option>Wed</option>
                    <option>Thu</option>
                    <option>Fri</option>
                    <option>Sat</option>
                    <option>Sun</option>
                    </select>
                    <input type='submit' name='submit' placeholder="Add">
                    
                    
                </form>
                
                
            </div>
            <div id="post-table">
                
                
                
                
                
                
                
                
                
                
                
                
            </div>

            
        </div>
    </body>
</html>