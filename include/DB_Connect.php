<?php

    // private $conn;
    // koneksi ke database
    $DB_HOST = "localhost";
    $DB_USER = "root";
    $DB_PASSWORD = "";

    // $"DB_DATABASE" = "MetroAttendance");
         
        // koneksi ke mysql database
        $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD);
         
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }
          echo "Connected successfully";

          
        // return database handler

    
?>