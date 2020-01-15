<?php

  include_once __DIR__ . "/../models/model_movie.php";
    
    function isPostRequest() {
        return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
    }
     
 ?>

