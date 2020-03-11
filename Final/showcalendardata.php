<?php

include_once __DIR__ . '/../Models/model_functions.php';
include_once __DIR__ . '/../Models/post_request_functions.php';

echo json_encode(showPosts());

?>