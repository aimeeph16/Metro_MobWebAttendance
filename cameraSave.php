<!-- <script src="test.js"></script> -->
<script src="js/camscript.js"></script>
<script type="text/javascript">
    <?php $abc = "<script>document.write(abc)</script>"?>   
</script>

<?php 
    session_start();

    file_put_contents();

    // $nik = $_SESSION['nik'];
    $nik = 111111;
    $fileName = "testFile";

    $check;

    // $fileName = $nik.date("dmy")."_".$check;

    require_once 'include/DB_Functions.php';

        $DB_HOST = "localhost";
        $DB_USER = "root";
        $DB_PASSWORD = "";

        $DB_DATABASE = "MetroAttendance";
            
            $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_DATABASE);
            
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }

        $sql = "INSERT INTO attendance (NIK, AttendanceDate, CheckIn, CheckOut, CheckInPhoto, CheckOutPhoto)
        VALUES ($nik, CURDATE(), CURRENT_TIME(), NULL, $filename, NULL)";
        
        if ($conn->query($sql) === TRUE) {
          echo "New record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }

    echo $abc;

?>