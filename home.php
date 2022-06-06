<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css'>
  </head>
  <body>
  <?php 
    session_start ();
    $name = $_SESSION['name'];
    $nik = $_SESSION['nik'];
  ?>
    <section class="vh-100">
        <div class="container py-5 h-100">
          <div class="row content">
            <div>
              <div style="float:right">
                <form action="index.php">
                  <button type="submit" class="btn btn-link btn-lg"><span class='bi bi-door-open' style="font-size: 30px;"></span></button> 
                </form>
              </div>
            <div class="mainTop" id="top">
              <div style="margin-top: 250px">
                <br>
              </div>
              
                <h2><?php echo $name; ?></h2>
                <h3 class='med'>KARYAWAN - <?php echo $nik; ?></h3>
                <br>
                <h3 id="current_date"></h3>
                <h2>CHECK-IN: BELUM</h2>
              
              <a href="#bottom" class="btn btn-dark btn-lg" role="button"><i class="bi bi-arrow-down"></i></a>
            </div>
            <div class="d-flex justify-content-center flex-wrap" style="height: 100px" id="bottom">
              <div class="d-flex flex-column" style="padding-bottom: 50px">
                <div class="p-2" style="padding: 10px;"><a class="btn btn-primary" href="attendance.html" role="button">ATTENDANCE</a></div>
                <div class="p-2" style="padding: 10px;"><a class="btn btn-primary" href="history.html" role="button">HISTORY</a></div>
              </div>
            </div>
          </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <script>
      function ordinal_suffix_of(i) {
          var j = i % 10,
              k = i % 100;
          if (j == 1 && k != 11) {
              return i + "st";
          }
          if (j == 2 && k != 12) {
              return i + "nd";
          }
          if (j == 3 && k != 13) {
              return i + "rd";
          }
          return i + "th";
      }

      const weekday = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
      const months = ["January","February","March","April","May","June","July","August","September","October","November","December"];

      const d = new Date();
      let day = weekday[d.getDay()];
      let month = months[d.getMonth()];
      let date = ordinal_suffix_of(d.getDate());
      let year = d.getFullYear();
      

      document.getElementById("current_date").innerHTML = day + ', ' + date + ' ' + month + ' ' + year;

    </script>  
  </body>
</html>
