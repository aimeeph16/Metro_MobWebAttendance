<!-- <script src="test.js"></script> -->
<!-- <script src="js/camscript.js"></script> -->

<script type="text/javascript">
    var abc = "hi there";
    <?php $abc = "<script>document.write(abc)</script>"?>   
</script>

<?php 
    session_start();
    if(isset($_POST['image'])){
        $img = $_POST['image']; 
        // echo 'halo';
    }else{
        $img = "image tidak diset di Method GET";
    }
    // $img = $_POST['image'];
    $folderPath = "photos/";
  
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];

    $photoBase = $image_parts[1];
  
    $image_base64 = base64_decode($photoBase);

    $nik = $_SESSION['nik'];
    // $nik = 333;
    $fileName = $nik."_".date("dmy")."_1". '.jpg';
    // $fileName = uniqid() . '.png';
  
    $file = $folderPath . $fileName;
    file_put_contents($file, $image_base64);
  
    // print_r($image_parts[1]);

    $DB_HOST = "localhost";
    $DB_USER = "root";
    $DB_PASSWORD = "";

    $DB_DATABASE = "MetroAttendance";
        
    $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_DATABASE);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $sql = "INSERT INTO `attendance` (NIK, AttendanceDate, CheckIn, CheckOut, CheckInPhoto, CheckOutPhoto)
              VALUES ($nik, CURDATE(), CURRENT_TIME(), NULL, '$folderPath$fileName', NULL)
              ON DUPLICATE KEY
              UPDATE `CheckInPhoto` = '$folderPath$fileName'";
    
        if ($conn->query($sql) === TRUE) {
          echo "New record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
          

    }

?>