<?php

include __DIR__ . '/Models/model_functions.php';
include __DIR__ . '/Models/post_request_functions.php';

$data = showAllUserPosts();

foreach($data as $d => $user){
    
    echo $user['post'];    
    
}
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        
    </head>
    <body>
        <div>
            <table>
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Uname</td>
                        <td>PID</td>
                        <td>Post</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $d):?>
                    <tr>
                        <td><?php echo $d['userid'];?></td>
                        <td><?php echo $d['uname'];?></td>
                        <td><?php echo $d['postid'];?></td>
                        <td><?php echo $d['post'];?></td>
                        
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
       
        </div>
    </body>
</html>