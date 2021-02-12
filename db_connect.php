<?php
//connecting to database
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'realtimeChat';
$conn = new mysqli($servername, $username, $password, $database);
// if($conn->connect_error)
//     die('Connect Error: ' . $conn->connect_error);
// else
//     echo 'success';
?>