<?php
$servername = getenv('DB_HOST') ?: "db"; 
$username   = getenv('DB_USER') ?: "gallery_user"; 
$password   = getenv('DB_PASS') ?: "secure_password"; 
$dbname     = getenv('DB_NAME') ?: "my_database"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}
?>