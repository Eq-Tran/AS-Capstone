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
$post = filter_input(INPUT_POST, 'post');
$posts = showAllUserPosts();
$addpost = addPost($post, 6);


// Add post based from User ID
// Show Uname for posts in Calendar
// Delete Post 
// Calendar should only show Uname date/time
// post list should show username post body date time
?>
<!DOCYTYPE HTML>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link type="text/javascript" href="#">
        <link type="text/css" rel="stylesheet" href="cal.css">
    </head>
    <body>
        <div id="cal-box" >
            <a href="<?php echo $_SERVER['PHP_SELF'].'?week='.($week-1).'&year='.$year; ?>">Pre Week</a> <!--Previous week-->
            <a href="<?php echo $_SERVER['PHP_SELF'].'?week='.($week+1).'&year='.$year; ?>">Next Week</a> <!--Next week-->
            
            <table class="table table-responsive">
            
                        <?php
                        
                        do {
                            echo "<th>" . $dt->format('l') . "<br>" . $dt->format('d M') . "</th>\n";
                            $dt->modify('+1 day');
                        } while ($week == $dt->format('W'));
                         
                         
                        ?>
              
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
        <div id="data">
            
            
        </div>
        <div class="post-box">
            <form method="POST">
                <input type="text" name="post" >
                <select>
                    <option>Mon</option>
                    <option>Tue</option>
                    <option>Wed</option>
                    <option>Thu</option>
                    <option>Fri</option>
                    <option>Sat</option>
                    <option>Sun</option>
                </select>
                <input type="submit" name="submit">
            </form>
        </div>
        <div class="posts-table" >

            <div class="box" style="width:200px; height:60px; border:1px solid black;">
       
        </div>
        
    </body>
    <script>
         // Vanilla Javascript ajax call
     function executeAjaxReq(){
 
         var xhttp = new XMLHttpRequest();
         
         xhttp.onreadystatechange = function(){
             
             
             if(this.readyState == 4 && this.status == 200){
                 
                 

                 document.getElementById("cal-box").innerHTML = this.responseText;

                 document.querySelector("td").innerHTML = this.responseText;

                 alert("clicked");
                 
             }
         };
         
         xhttp.open("GET", "calendarupdate.php?", true);
         xhttp.send();
         
     }
    
    /*
    // Example POST method implementation:
    async function postData(url = "", data = {}) {
      // Default options are marked with *
      const response = await fetch(url, {
        method: 'POST', // *GET, POST, PUT, DELETE, etc.
        mode: 'cors', // no-cors, *cors, same-origin
        cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
        credentials: 'same-origin', // include, *same-origin, omit
        headers: {
          'Content-Type': 'application/json'
          // 'Content-Type': 'application/x-www-form-urlencoded',
        },
        redirect: 'follow', // manual, *follow, error
        referrerPolicy: 'no-referrer', // no-referrer, *client
        body: JSON.stringify(data) // body data type must match "Content-Type" header
      });
      return await response.json(); // parses JSON response into native JavaScript objects
    }

    postData('calendarupdate.php', {})
      .then((data) => {
        console.log(data); // JSON data parsed by `response.json()` call
        //alert("this stuff");
        document.querySelector("td").innerHTML = JSON.stringify(data);
      });
      */
    
    </script>
</html>