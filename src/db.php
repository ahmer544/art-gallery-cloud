<?php
$servername = getenv('DB_HOST') ?: "mysql.railway.internal"; 
$port       = getenv('DB_PORT') ?: 3306;
$username   = getenv('DB_USER') ?: "root"; 
$password   = getenv('DB_PASS') ?: "aYcNVkRykEpZBfnXlAalpjEBSHPdpINL"; 
$dbname     = getenv('DB_NAME') ?: "railway"; 

$conn = new mysqli($servername, $username, $password, $dbname, (int)$port);

if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}
?>
