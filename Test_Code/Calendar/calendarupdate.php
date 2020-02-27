<?php

include __DIR__ . '/Models/model_functions.php';
include __DIR__ . '/Models/post_request_functions.php';

$data = showAllUserPosts();

$s = json_encode($data);

echo $s;
?>
