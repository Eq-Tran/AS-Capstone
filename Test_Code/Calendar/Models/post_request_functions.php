<?php


function isPostRequested(){
  
    return(filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST');
    
}


function isGetRequested(){
  
    return(filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET');
    
}


?>