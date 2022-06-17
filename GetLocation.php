<?php

require_once 'include/DB_Functions.php';

$DB_HOST = "localhost";
$DB_USER = "root";
$DB_PASSWORD = "";

$DB_DATABASE = "MetroAttendance";
    
    // koneksi ke mysql database
    $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_DATABASE);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $officeName = $_GET['officeName'];
        
        if (empty($officeName)) {
            echo "empty";
            } else {
              $select = mysqli_query($conn, "SELECT * FROM `office` WHERE OfficeName = 'Kedoya';");

              if (mysqli_num_rows($select) > 0) {
                

                while( $row = mysqli_fetch_assoc($select)) {
                  echo $officeName ."found";
                }
            }
        
            else {
              exit('office not found');
            }
          }
        }
?>