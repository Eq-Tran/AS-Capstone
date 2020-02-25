<?php

include __DIR__ . '/Models/model_functions.php';
include __DIR__ . '/Models/post_request_functions.php';

$dt = new DateTime;
if (isset($_GET['year']) && isset($_GET['week'])) {
    $dt->setISODate($_GET['year'], $_GET['week']);
} else {
    $dt->setISODate($dt->format('o'), $dt->format('W'));
}
$year = $dt->format('o');
$week = $dt->format('W');


function click(){
    
    $results = "clicked";
    return $results;
    
}
// Add post based from User ID
// Show Uname for posts in Calendar
// Delete Post 
// Calendar should only show Uname date/time
// post list should show username post body date time
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link type="text/javascript" href="#">
        <link type="text/css" rel="stylesheet" href="cal.css">
    </head>
    <body>
        <div class="cal-box">
            <a href="<?php echo $_SERVER['PHP_SELF'].'?week='.($week-1).'&year='.$year; ?>">Pre Week</a> <!--Previous week-->
            <a href="<?php echo $_SERVER['PHP_SELF'].'?week='.($week+1).'&year='.$year; ?>">Next Week</a> <!--Next week-->
            
            <table class="table table-responsive">
                <tr>
                  


            <?php
            do {
                echo "<td>" . $dt->format('l') . "<br>" . $dt->format('d M Y') . "</td>\n";
                $dt->modify('+1 day');
            } while ($week == $dt->format('W'));
            ?>
                </tr>
                <td>hello</td>
                <td>hello</td>
                <td>hello</td>
                <td>hello</td>
                <td>hello</td>
                <td>hello</td>
                <td>hello</td>
            </table>
        </div>
       
            <input type="submit" name="Add" value="Add" onclick="executeAjaxReq()">
            <input type="submit" name="Delete" value="Delete">
        
    </body>
    <script>
     function executeAjaxReq(){
         
         var xhttp = new XMLHttpRequest();
         
         xhttp.onreadystatechage = function(){
             
             
             if(this.readyState == 4 && this.status == 200){
                 
                 
                 document.querySelector("cal-box").innerHTML = this.responseText;
                 alert("clicked");
                 
             }
         };
         
         xhttp.open("GET", "calendarupdate.php", true);
         xhttp.send();
         
     }
    
    
    </script>
</html>