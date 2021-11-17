<?php

$host = '127.0.0.1:3308';
$username = 'rahul';
$password = '1999';
$db = 'banking_system';
$connection = mysqli_connect($host,$username,$password,$db);

if(!$connection) {
    die("Unbale to connect:".mysqli_connect_error());
}

?>