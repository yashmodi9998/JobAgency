<?php

$env = file(__DIR__.'/../../.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

foreach($env as $value)
{
    

  $value = explode('=', $value);  

  define($value[0], $value[1]);
  
}
$con = mysqli_connect(
    DB_HOST, 
    DB_USERNAME, 
    DB_PASSWORD, 
    DB_DATABASE);
if (!$con) {
    die("Connection Failed: " . mysqli_connect_error());
}

