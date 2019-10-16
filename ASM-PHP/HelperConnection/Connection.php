<?php
  // set the access details as contants
DEFINE('DB_USER', '3175187_mobileshop');
DEFINE('DB_PASSWORD','Dong2kvp');
DEFINE('DB_HOST', 'fdb25.runhosting.com');
DEFINE('DB_NAME', '3175187_mobileshop');
DEFINE('DB_PORT', '3306');

// make connection
$conn =  new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
// set the encoding .. optional but recommended
$conn->set_charset("utf8");
?>