<?php
$servername = "localhost";
$username = "root";
$password = ""; // Replace with your password if any
$dbname = "bookclub-users"; // Replace with your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    //  echo "Connection Successfully";
}
?>