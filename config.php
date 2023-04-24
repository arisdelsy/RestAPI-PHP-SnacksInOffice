<?php
    $DB_USER = "admin";
    $DB_PASSWORD = "";
    $DB_NAME = "Interview";
    $DB_HOST = "";
    
    $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

?>