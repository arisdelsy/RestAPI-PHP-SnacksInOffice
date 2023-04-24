<?php
    $DB_USER = "admin";
    $DB_PASSWORD = "Phan3vUp?Bod";
    $DB_NAME = "Interview";
    $DB_HOST = "interview-db.c2t9xgikwij8.us-east-2.rds.amazonaws.com";
    
    $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

?>