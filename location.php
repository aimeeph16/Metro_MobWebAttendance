<?php
        session_start();
        // require_once 'include/DB_Functions.php';

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
                        // echo $officeName ."found";
                        echo $officeName ." latitude: " .$row['Latitude'];
                        
                        }
                    }
                
                    else {
                    exit('office not found');
                    }
                }
                }
        ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Location Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/location.css">
    <link rel="stylesheet" href="css/selection.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css'>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.2/css/bulma.min.css"> -->
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- <script src="js/locationscript.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  </head>
  <body style="background-color: #002A7F;">
    <div id="holder">
        <div class="menu-container" id="header">
            <br>
            <br>
            <div class="select animated zoomIn">
                <!-- You can toggle select (disabled) -->
                <input type="radio" name="option">
                <i class="toggle icon icon-arrow-down"></i>
                <i class="toggle icon icon-arrow-up"></i>
                <span class="placeholder">Choose your location</span>
        
                <label class="option">
                    <input type="radio" name="option" onclick="checkOffice();" value="Kedoya" id="kdy">
                    <span class="title animated fadeIn"><label for="kdy">Kedoya</label></span>
                    <!-- <span class="title animated fadeIn"><i class="icon icon-fire"></i>Fire</span> -->
                </label>
                <label class="option">
                    <input type="radio" name="option" onclick="checkOffice();" value="Bandung" id="bdg">
                    <span class="title animated fadeIn"><label for="bdg">Bandung</label></span>
                    <!-- <span class="title animated fadeIn"><i class="icon icon-handbag"></i>Handbag</span> -->
                </label>
                <label class="option">
                    <input type="radio" name="option" onclick="checkOffice();" value="Joglo" id="jgl">
                    <span class="title animated fadeIn"><label for="jgl">Joglo</label></span>
                        <!-- <i class="icon icon-badge"></i>Badge -->
                </label>
                <label class="option">
                    <input type="radio" name="option" onclick="checkOffice();" value="Aceh" id="ach">
                    <span class="title animated fadeIn"><label for="ach">Aceh</label></span>
                </label>
                <label class="option">
                    <input type="radio" name="option" onclick="checkOffice();" value="Biro Semarang" id="bsm">
                    <span class="title animated fadeIn"><label for="bsm">Biro Semarang</label></span>
                </label>
                <label class="option">
                    <input type="radio" name="option" onclick="checkOffice();" value="Makasar" id="mks">
                    <span class="title animated fadeIn"><label for="mks">Makasar</label></span>
                </label>
                <label class="option">
                    <input type="radio" name="option" onclick="checkOffice();" value="Transmisi Semarang" id="tsm">
                    <span class="title animated fadeIn"><label for="tsm">Transmisi Semarang</label></span>
                </label>
                <label class="option">
                    <input type="radio" name="option" onclick="checkOffice();" value="Transmisi Surabaya" id="tsb">
                    <span class="title animated fadeIn"><label for="tsb">Transmisi Surabaya</label></span>
                </label>
                <label class="option">
                    <input type="radio" name="option" onclick="checkOffice();" value="Transmisi Denpasar" id="tdp">
                    <span class="title animated fadeIn"><label for="tdp">Transmisi Denpasar</label></span>
                </label> 
                <label class="option">
                    <input type="radio" name="option" onclick="checkOffice();" value="Transmisi Yogyakarta" id="tyk">
                    <span class="title animated fadeIn"><label for="tyk">Transmisi Yogyakarta</label></span>
                </label>
        
            
            </div>
              <!-- <div class="center">
                  <select name="sources" class="custom-select sources" placeholder="Source Type" id="office" onChange="update()">
                      <option value="kdy">Kedoya</option>
                      <option value="bdg">Bandung</option>
                      <option value="jgl">Joglo</option>
                  </select>
                </div> -->
            <!-- <div class="dropdown">Menu<span class="bi bi-chevron-down"></span></div> -->
            <!-- <div class="dropdown">Menu<span class="fas fa-bars"></span></div>   -->
            
             <!-- <ul>
                <li><a href="#" onClick="checkOffice()">Kedoya</a></li>
                <li><a href="#" onClick="checkOffice()">Bandung</a></li>
                <li><a href="#" onClick="checkOffice()">Joglo</a></li>
                <li><a href="#" onClick="checkOffice()">Aceh</a></li>
                <li><a href="#" onClick="checkOffice()">Biro Semarang</a></li> 
                <li><a href="#" onClick="checkOffice()">Makasar</a></li>
                <li><a href="#" onClick="checkOffice()">Transmisi Semarang</a></li>
                <li ><a href="#" onClick="checkOffice()">Transmisi Surabaya</a></li>
                <li><a href="#" onClick="checkOffice()">Transmisi Denpasar</a></li>
                <li><a href="#" onClick="checkOffice()">Transmisi Yogyakarta</a></li>
              </ul> -->
    
              <!-- <select class="selectOffice" id="office" onChange="update()">
                <option value="kdy">Kedoya</option>
                <option value="bdg">Bandung</option>
                <option value="jgl">Joglo</option>
              </select> -->
            
    
              
              
              
            </div>
    
        <div class="d-flex justify-content-center">
              <div class="mainBottom">
                  <div class="d-flex align-items-center flex-column">
                    <div class="p-2" style="margin: 0 35px 0 35px; text-align: center">
                        <p style="overflow: auto;"> *Pilih lokasi kantor/biro tempat anda bekerja </p>
                    </div>
                    <div class="p-2" id="getLocationContent" style="display:none;">
                      <!-- <div class="p-2"> -->
                        <div class="p-2"> 
                            <div class="d-flex align-items-center flex-column">
                                <!-- <button type="button" class="btn btn-primary" id="getDistance" onclick="getLocation()"> Get your current location </button> -->
                                <button type="button" method="get" class="btn btn-primary" id="btn"> Get your current location </button>
                            </div>
                            <div id="showPosition" class="d-flex align-items-center flex-column">
                      
                                <h2 class="p-2">Position:</h2>
                                <p class="p-2" id="location"></p>
                                <p class="p-2" id="distance"></p>
                                <p class="p-2" id="office"></p>
                                <p class="p-2">Work status: WFO</p>
                            </div>
                        </div>
                        <div class="p-2">
                            <form action="attendance.html">
                                <button type="submit" class="btn btn-primary" style="width: 270px" id="confirmBtn"> Confirm</button>
                            </form>
                            
                        </div>
                    </div>    
                  </div>
              </div>
          </div>
    </div>
    
    
      <script src="js/locationscript.js" type="text/javascript"></script>
      <!-- <script type="text/javascript"> -->
 
  </body>
</html>