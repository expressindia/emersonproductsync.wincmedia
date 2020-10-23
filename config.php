<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_SERVER['HTTP_HOST']=='localhost:8888')
{
  $dbInfo = array(
    'host'      => "localhost",
    'user'      => "root",
    'pass'      => "root",
    'dbname'    => "wincmedi"
);


}
else
{
  $dbInfo = array(
    'host'      => "localhost",
    'user'      => "wincmedi_Mohammed",
    'pass'      => "tjHAvoW2Hx0T!@#%$#!&*",
    'dbname'    => "wincmedi_CuratedSupplementsProducts"
);

}
?>
<!-- // ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
//
// if($_SERVER['HTTP_HOST']=='localhost:8888')
// {
//   $mysqli = new mysqli("localhost","root","root","wincmedi");
// }else {
//   $mysqli = new mysqli("localhost","wincmedi_Mohammed","tjHAvoW2Hx0T!@#%$#!&*","wincmedi_CuratedSupplementsProducts");
// }
//
//
// if (mysqli_connect_errno()) {
//     printf("Connect failed: %s\n", mysqli_connect_error());
//     exit();
// } -->
