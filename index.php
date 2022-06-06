<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Login</title>
        <link rel="stylesheet" href="css/login.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <!-- <link rel="stylesheet" href="css/style.css"> -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap" rel="stylesheet">
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css'>
      </head>
    <body>
        <section class="vh-100">
            <div class="container py-5 h-100">

              <!-- Logo -->
              <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6" align="center">
                  <!-- <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                    class="img-fluid" alt="Phone image"> -->
                  <img src="assets/Logo_Media_Group_(2020).png" class="img-fluid" alt="Phone image">
                </div>
                
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                  <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                      <!-- <i class='bi bi-person-fill'></i> -->
                      <!-- <i class="fa fa-user icon"></i> -->
                      <input placeholder="NIP" type="text" id="form1Example13" class="form-control form-control-lg" name="nik"/>
                    </div>
              
                    <div class="form-outline mb-4">
                      <input placeholder="Password" type="password" id="form1Example23" class="form-control form-control-lg" name="password"/>
                    </div>
          
                    <!-- Submit button -->
                    <div class="Button" align="center">
                      <button type="submit" class="loginButton"><span>Login</span></button>
                    </div>
          
                  </form>
                </div>
              </div>
            </div>
          </section>

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


        // $db = new DB_Functions();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // collect value of input field
            // require_once 'include/DB_Functions.php';
            // $db = new DB_Functions();
            $nik = $_POST['nik'];
            $password = $_POST['password'];
            if (empty($nik) || empty($password)) {
            echo "empty";
            } else {
              // echo $password;
              // echo $nik;

              $hash = hash('sha256', $password);

              // echo $hash;

              // //prepare the statement
              // $stmt = $pdo->prepare("SELECT * FROM user WHERE NIK=?");
              // //execute the statement
              // $stmt->execute([$NIK]); 
              // //fetch result
              // $user = $stmt->fetch();

              // if ($user) {
              //     header("Location:home.php");
              // } else {
              //     // NIK does not exist
              //     echo "<p>user not found</p>";
              // } 



              $select = mysqli_query($conn, "SELECT * FROM `user` WHERE `NIK` = $nik");

              if (mysqli_num_rows($select) > 0) {
                echo "nik found";

                while( $row = mysqli_fetch_assoc($select)) {
                  echo "nik: " .$row['NIK']. "name: " .$row['Name'];
                  // echo hash('sha256', $password);
                  // echo password_verify($row['salt'], hash('sha256', $password));
                    if ($hash == $row["salt"]) {
                      echo "user found";
                      header("Location:home.php");
                    }
                }
            }
        
            else {
              exit('user not found');
            }

              
            }
        }



        // json response array
        // $response = array("error" => FALSE);
        // if (isset($_POST['NIK']) && isset($_POST['password'])) {
        //     // menerima parameter POST ( NIK dan password )
        //     $NIK = $_POST['NIK'];
        //     $password = $_POST['password'];
        //     // get the user by NIK and password
        //     // get user berdasarkan NIK dan password
        //     $user = $db->getUserByNIKAndPassword($NIK, $password);
        //     if ($user != false) {
        //         // user ditemukan
        //         $response["error"] = FALSE;
        //         $response["uid"] = $user["unique_id"];
        //         $response["user"]["nama"] = $user["nama"];
        //         $response["user"]["NIK"] = $user["NIK"];
        //         echo json_encode($response);
        //     } else {
        //         // user tidak ditemukan password/NIK salah
        //         $response["error"] = TRUE;
        //         $response["error_msg"] = "Login gagal. Password/NIK salah";
        //         echo json_encode($response);
        //     }
        // } else {
        //     $response["error"] = TRUE;
        //     $response["error_msg"] = "Parameter (NIK atau password) ada yang kurang";
        //     echo json_encode($response);
        // }
        ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
        <script src="js/api.js"></script>
        
    </body>

    
    <!-- <button type="button" onclick="alert('Successfully Logged In')">Login</button> -->

</html>