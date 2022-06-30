    <?php 
        $nik = $_POST['nik'];
        // echo 'nik: '. $nik;
        
        $dir = '/';
        $file = basename($_FILES['image']['name']);
        // echo $file;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $file)) {
            $photoBase = base64_encode(file_get_contents($file));
            echo $photoBase;

        } else {
            echo "Error.\n";
        }
    
        $DB_HOST = "localhost";
        $DB_USER = "root";
        $DB_PASSWORD = "";
    
        $DB_DATABASE = "MetroAttendance";
            
        $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_DATABASE);
        
        if ($conn->connect_error) {
            die(" | Connection failed: " . $conn->connect_error);
        }
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
          $sql = "INSERT INTO `attendance` (NIK, AttendanceDate, CheckIn, CheckOut, CheckInPhoto, CheckOutPhoto)
                  VALUES ($nik, CURDATE(), CURRENT_TIME(), NULL, 'test', NULL)
                  ON DUPLICATE KEY
                  UPDATE `CheckInPhoto` = 'testUpdate'";
        
            if ($conn->query($sql) === TRUE) {
            //   echo " | New record created successfully";
            } else {
              echo " | Error: " . $sql . "<br>" . $conn->error;
            }
              
    
        }
    ?>