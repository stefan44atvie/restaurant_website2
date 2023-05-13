<?php

    session_start();
    require_once "includes/db_connect.php";

    if(!isset($_SESSION["adm"]) ){
      header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
 
  <!-- Meta Tags -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Fonts Links (Roboto 400, 500 and 700 included) -->
 
  <!-- CSS Files Links -->
  <link rel="stylesheet" href="includes/css/beisl23.css">
  <link rel="stylesheet" href="includes/css/bootstrap.css">

  <!-- Title -->
</head>
<body>

<!-- Hauptmenü oben  -->
<nav class="nav nav-pills flex-column flex-sm-row opacity_dark50">
<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="speisekarte.php">Speisekarte</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="wochenkarte.php">Wochenkarte</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="kontakt.php">Kontakt&Öffnungszeiten</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="events.php">Events</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="dashboard.php" tabindex="-1" aria-disabled="true">Dashboard</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="login.php" tabindex="-1" aria-disabled="true">Login</a>
  </li>
</ul>
</nav>
<!-- Ende Hauptmenü  -->
 
<div class="container">
                <h1 class="title_hours textcenter">ADMIN DASHBOARD</h1>
                <p class="hours textcenter"> Hallo, was möchten Sie tun? <?php echo $admin_dashtext ?></p>
                <a href='dashboard.php' class='btn btn-info'>Dashboard Home</a>
                <a href='texte.php' class='btn btn-info'>See Texte for Website</a>
                <a href='createuser.php' class='btn btn-info'>Create User</a>
                <a href='update_wochenkarte.php'  class='btn btn-info'>Upload Wochenkarte</a>
                <a href='usersearch.php' class='btn btn-info disabled'>Search User</a>
                <a href='logout.php?logout' class='btn btn-warning'>Logout</a>
                <br>
  </div>  
  
  <div class="container">
    <div class="row">
      <br>
      <!-- Search Bar -->
        <input class="w-75 form-control m-md-auto" type="search" id="search" name="search" placeholder="Search">
      <br>
      
  </div>       
  <div class="container">
        <div class='card col-sm-3 overflow-scroll bg-opacity-50 row' id = "searchdarst" style='width: 18rem;'>
  

        </div>
  </div>          
  <script>
                  function search() {
                              let xhttp = new XMLHttpRequest();
                              let value = document.getElementById('search').value;
                              console.log(value);
                              xhttp.onload = function () {
                                  if (this.status == 200) {
                                      document.getElementById("searchdarst").innerHTML =
                                          this.responseText;
                                      console.log(this.responseText);

                                  }
                              };
                              xhttp.open("GET", "search.php?search=" + value, true);
                              xhttp.send();
                          }
                          document.getElementById('search').addEventListener('input', search);
              </script>   
</div>
<!-- Menü unten im Footer-Bereich -->
<div class="nav nav-pills flex-column  d-flex opacity_dark50 fixed-bottom">
        <ul class="nav nav-pills justify-content-end d-flex">
          <li class="nav-item">
            <a class="nav-link" aria-current="datenschutz.php" href="datenschutz.php">Datenschutz</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Impressum.php">Impressum</a>
          </li>
      </ul>
</div>
<!-- Ende Footer-Menü -->

<script>

    function search() {
                let xhttp = new XMLHttpRequest();
                let value = document.getElementById('search').value;
                console.log(value);
                xhttp.onload = function () {
                    if (this.status == 200) {
                        document.getElementsByTagName("tbody")[0].innerHTML =
                            this.responseText;
                        console.log(this.responseText);

                    }
                };
                xhttp.open("GET", "search.php?search=" + value, true);
                xhttp.send();
            }
            document.getElementById('search').addEventListener('input', search);
    </script>



  <noscript>Your browser don't support JavaScript!</noscript>
  <script src="includes/js/bootstrap.js"></script>
</body>
</html>