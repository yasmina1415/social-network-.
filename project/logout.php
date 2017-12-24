<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <title></title>
</head>
<body>

</body>
</html>

<?php

include"connection.php";

if(isset($_POST['logout'])){

session_start();

session_unset();


session_destroy();
 
 echo '<h1> Good Bye ! ^^ </h1>';
header('REFRESH:1;URL=login1.php');
exit();}