<?php

include_once __DIR__ . "/../model/modelFriend.php";
  
function isPostRequest() {
      return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
  }

  function isGetReq() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET' );
}

  
?>