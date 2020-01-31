<?php
    include __DIR__. '/../Models/model_functions.php';
    include __DIR__. '/../Models/post_request_functions.php';
    
    
    $totalDaysInMonth = date("t");
    $currDayInMonth = date("j");
    $lastDayInMonth = $totalDaysInMonth;
    $numOfWeeksInMonth = (int)($totalDaysInMonth / 7);
    $numOfDaysInWeek = (int)($totalDaysInMonth / 4);

     var_dump($numOfWeeksInMonth);
     var_dump($numOfDaysInWeek);
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="#">
    </head>
    <main>
        <body>
            <div class="main">
            <select id="month">
                <option value="1">Jan</option>
                <option value="2">Feb</option>
                <option value="3">Mar</option>
                <option value="4">Apr</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">Aug</option>
                <option value="9">Sep</option>
                <option value="10">Oct</option>
                <option value="11">Nov</option>
                <option value="12">Dec</option>
            </select>
            </div>
            
            <div id="weekHeader">
            <div class="dayHeader">Sunday</div>
            <div class="dayHeader">Monday</div>
            <div class="dayHeader">Tuesday</div>
            <div class="dayHeader">Wednesday</div>
            <div class="dayHeader">Thursday</div>
            <div class="dayHeader">Friday</div>
            <div class="dayHeader">Saturday</div>
            </div>
            
            
            <div id="results"></div>
            
            <div class="footer-btn">
            <input type="button" value="Pick Day" style="background-color:green;" id="yes" />
            <input type="button" value="APick time" style="background-color:red;" id="no" />
            </div>
            
            
            
        </body>
    </main>
</html>