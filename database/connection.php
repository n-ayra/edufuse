<?php

$servername = "localhost";
$username = "root";  
$password = "";    
$db = "edufuse";

try {
    $conn = new mysqli($servername, $username, $password, $db);
    if ($conn->connect_error) {
        throw new Exception("Database connection failed: " . $conn->connect_error);  
    }

    if (!$conn->set_charset("utf8mb4")) {
        throw new Exception("Error setting character set: " . $conn->error); 
    }

} catch (Exception $e) {
    error_log($e->getMessage()); 
    die("Connection failed. Please try again later."); 
}

?>
