<?php
$servername = "local";
$username = ""; //replace with cpanel username
$password = ""; // Replace with your cpanel password if any
$dbname = "bookclub_users"; // Replace with your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    //  echo "Connection Successfully";
}
?>