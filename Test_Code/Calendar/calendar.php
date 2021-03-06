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
$day = filter_input(INPUT_POST, 'selectOp');
$posts = showAllUserPosts();
$addpost = addPost($post, $day, 6);


// Add post based from User ID
// Show Uname for posts in Calendar
// Delete Post 
// Calendar should only show Uname date/time
// post list should show username post body date time
// need to show the posts for the day chosen in the post
// need to show the posts
// how?
// give a sql query search params? maube have it already looking for the days
?>
<!DOCYTYPE HTML>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <script dwwtype="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <link type="text/css" rel="stylesheet" href="cal.css">
    </head>
    <body>
        <div id="nav-links" >
            <a href="<?php echo '?week='.($week-1).'&year='.$year; ?>">Pre Week</a> <!--Previous week-->
            <a href="<?php echo '?week='.($week+1).'&year='.$year; ?>">Next Week</a> <!--Next week-->
        </div>    
            <div id="Calendar">
                <table class="table table-responsive">

                            <?php

                            do {
                                echo "<th>" . $dt->format('l') . "<br>" . $dt->format('d M') . "</th>\n";
                                $dt->modify('+1 day');
                            } while ($week == $dt->format('W'));


                            ?>

                    <tbody>
                        <?php foreach($posts as $row):?>
                        <tr>
                            <td><?php echo $row['day']['Mon'];?></td>
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
                        <?php endforeach;?>
                </tbody>
                </table>
            </div>
   
       
        <div class="post-box">
            <form method="POST">
                <input type="text" name="post" >
                <select name="selectOp">
                    <option value="Mon">Mon</option>
                    <option value="Tue">Tue</option>
                    <option value="Wed">Wed</option>
                    <option value="Thu">Thu</option>
                    <option value="Fri">Fri</option>
                    <option value="Sat">Sat</option>
                    <option value="Sun">Sun</option>
                </select>
                <input type="submit" name="submit" onclick="executeAjaxReq()">
            </form>
        </div>
        <div class="posts-table" >

            <div class="box" style="width:200px; height:60px; border:1px solid black;">
                 <div id="data">
            
            
        </div>
        </div>
        </div>
    </body>
    <script>
         // Vanilla Javascript ajax call
     function executeAjaxReq(){
 
         var xhttp = new XMLHttpRequest();
         
         xhttp.onreadystatechange = function(){
             
             
             if(this.readyState == 4 && this.status == 200){
                 
                 

                 //document.getElementById("data").innerHTML = this.responseText;
                 alert("clicked");
                 
             }
         };
         
         xhttp.open("GET", "calendarupdate.php?", true);
         xhttp.send();
         
     }
    

    // PEEK ERIKS GITHUB SHOWS HOW TO INSERT INTO A DB 

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
        alert("this stuff");
        document.querySelector("td").innerHTML = JSON.stringify(data);
      });
      
    
    </script>
</html>