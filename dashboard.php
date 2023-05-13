<?php

  session_start();
   
  
  require_once "includes/db_connect.php";

  $sql="SELECT standardtexte.stext, text_art.textart FROM standardtexte INNER JOIN text_art ON standardtexte.fk_textart = text_art.art_id where art_id=4;";
  $result = mysqli_query ($connect, $sql);

  $row=mysqli_fetch_assoc($result);
  $admin_dashtext = $row["stext"];

  // Umleitung, falls User/Adm nicht angemeldet ist, da hier nur User sein dürfen
  //if(isset($_SESSION["adm"]) ){
    //header("Location: dashboard.php");
  //}elseif(!isset($_SESSION["user"]) ){
     // header("Location: login.php");
    //}
      if(!isset($_SESSION["adm"]) ){
        header("Location: login.php");
      }

      
?>
<?php 
    require "includes/db_connect.php";

    $sql="SELECT * from users";
    $result = mysqli_query ($connect, $sql);
    $id=$_SESSION["id"];

    $layout ="";

    if (mysqli_num_rows ($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $layout .= "
            
                    <tr>
                    <td><a class='btn btn-info' href='details_user.php?id={$row["id"]}'>Details</a></td>
                    <td><a class='tabletext'>{$row["username"]}</a></td>
                    <td><img src='uploads/pictures/user/" .$row['picture']."' width='100' alt='Card image cap'</img></td>

                    <td><a class='tabletext'>{$row["email"]}</a></td>
                    <td><a class='tabletext'>{$row["status"]}</a></td>
                   
                </tr>  
                ";
              $layout2 .= "
              <div class='card col-sm-3 overflow-scroll bg-opacity-50' style='width: 18rem;'>
              <img class='card-img-top ' src='uploads/pictures/user/" .$row['picture']."' width='100' alt='Card image cap'>
              <div class='card-body'>
                <h5 class='card-title'>{$row["username"]}</h5>
                <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
              <ul class='list-group list-group-flush'>
                <li class='list-group-item'><b>Email</b>: {$row["email"]}</li>
                <li class='list-group-item'><b>Rolle</b>: {$row["status"]}</li>
                <li class='list-group-item'>A third item</li>
              </ul>
              <div class='card-body'>
                <a href='details_user.php?id={$row["id"]}' class='btn mybtn btn-success' role='button' tabindex='-1'>Details</a>
                <a href='delete.php?id={$row["id"]}' class='btn mybtn' role='button' tabindex='-1'>Delete User</a>

              </div>
            </div>
              
              ";
        };
    }else{
        $layout .= "no result";        
    };




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
  <title>PSV-Beisl</title>
</head>
<body>

<!-- Hauptmenü oben  -->
<nav class="nav nav-pills flex-column flex-sm-row opacity_dark50">
<ul class="nav nav-pills">
<a class="navbar-brand" href="index.php"><img src="media/Logos/psvbeisl.png" height="50"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  <li class="nav-item">
    <a class="nav-link text-white" href="speisekarte.php">Speisekarte</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="wochenkarte.php">Wochenkarte</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="reservierung.php">Reservierung</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="kontakt.php">Kontakt&Öffnungszeiten</a>
  </li>
  <!-- <li class="nav-item">
    <a class="nav-link" href="events.php">Events</a>
  </li> -->
  <li class="nav-item">
    <a class="nav-link text-white" href="dashboard.php" tabindex="-1" aria-disabled="true">Dashboard</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="login.php" tabindex="-1" aria-disabled="true">Login</a>
  </li>
</ul>
</nav>
<!-- Ende Hauptmenü  -->

<div class="container">
                <h1 class="title_hours textcenter">ADMIN DASHBOARD</h1>
                <p class="hours textcenter"> Hallo, was möchten Sie tun? <?php echo $admin_dashtext ?></p>
                <a href='dashboard.php' class='btn btn-info disabled'>Dashboard Home</a>
                <a href='texte.php' class='btn btn-info'>See Texte for Website</a>
                <a href='createuser.php' class='btn btn-info'>Create User</a>
                <a href='update_wochenkarte.php'  class='btn btn-info'>Upload Wochenkarte</a>
                <a href='update_speisekarte.php'  class='btn btn-info'>Upload Speisekarte</a>
                <a href='usersearch.php' class='btn btn-info'>Search User</a>
                <a href='logout.php?logout' class='btn btn-warning'>Logout</a>
                <br>
  </div>  
  <div class="container">
    <div class="row">
      <br>
      <br>
      <?php
          echo $layout2;
      ?>
  </div>                    
</div>


          
            




<!-- Menü unten im Footer-Bereich -->
<div class="nav nav-pills flex-column  d-flex opacity_dark50 fixed-bottom">
        <ul class="nav nav-pills justify-content-end d-flex">
          <li class="nav-item">
            <a class="nav-link" aria-current="datenschutz.php" href="datenschutz.php">Datenschutz</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="impressum.php">Impressum</a>
          </li>
      </ul>
</div>
<!-- Ende Footer-Menü -->
<!-- Suchfunktion -->



  <noscript>Your browser don't support JavaScript!</noscript>
  <script src="includes/js/bootstrap.js"></script>
  <script src="includes/js/bootstrap.min.js"></script>
  <script src="includes/js/bootstrap.js.map"></script>
</body>
</html>