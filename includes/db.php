<?php 
$connection = mysqli_connect('localhost', 'root', '', 'cms');

if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}


?>