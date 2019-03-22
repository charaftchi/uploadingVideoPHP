<?php

require_once 'cnxServer.php';
// Create database
$sql = "CREATE DATABASE IF NOT EXISTS myVideoDB";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}


?>