<?php

$host = "cosc360.ok.ubc.ca";
$database = "db_60823176";
$user = "60823176";
$password = "60823176";

$connection = mysqli_connect($host, $user, $password, $database);

$error = mysqli_connect_error();
if($error != null)
{
  $output = "<p>Unable to connect to database!</p>";
  exit($output);
}

?>