<?php
  session_start();

    require_once "includes/db_connect.php";

    $sqldetails="SELECT standardtexte.stext, text_art.textart FROM standardtexte INNER JOIN text_art ON standardtexte.fk_textart = text_art.art_id where art_id=9";
    $resultdetails = mysqli_query ($connect, $sqldetails);

    $row1=mysqli_fetch_assoc($resultdetails);
    $admin_detailstext = $row1["stext"];

    
    require_once "includes/db_connect.php";
    $id=$_GET["id"];    
    
    $sql="SELECT * FROM standardtexte INNER JOIN text_art ON standardtexte.fk_textart = text_art.art_id where stexte_id=$id;";
    $result = mysqli_query ($connect, $sql);
    $row=mysqli_fetch_assoc($result);
    

    $body.="
                <div class='container'>
                <table class='table table-striped thead-dark w-75'>
                <thead>
                <tr>
                    <th scope='col'>Details</th>
                    <th scope='col'>Text</th>
                    
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <a href='delete_text.php?id={$row["stexte_id"]}' class='btn btn-danger'>Delete</a>
                        <a href='update_text.php?id={$row["stexte_id"]}' class='btn btn-primary'>Update</a>
                    </td>
                    <td><a class='tabletext'>{$row["stext"]}</td>
                </tr>
                
                </tbody>
            </table>
            
            </div>
            </div>
        </div>
        ";
      $body2 = "<div class='col-sm-6'>
      <div class='card mx-auto w-50'>
          <div class='card-body'>
            <h5 class='card-title'>{$row["textart"]}</h5>
            <p class='card-text'>{$row["stext"]}</p>
            <a href='delete_text.php?id={$row["stexte_id"]}' class='btn btn-danger'>Delete</a>
            <a href='update_text.php?id={$row["stexte_id"]}' class='btn btn-primary'>Update</a>          </div>
</div>
</div>";



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
  <li class="nav-item">
    <a class="nav-link text-white" aria-current="page" href="index.php">Home</a>
  </li>
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
                <p class="hours textcenter"> <?php echo $admin_detailstext ?></p>
                <a href='dashboard.php' class='btn btn-info'>Dashboard Home</a>
                <a href='texte.php' class='btn btn-info'>See Texte for Website</a>
                <a href='createuser.php' class='btn btn-info'>Create User</a>
                <a href='update_wochenkarte.php'  class='btn btn-info'>Upload Wochenkarte</a>
                <a href='update_speisekarte.php'  class='btn btn-info'>Upload Speisekarte</a>
                <a href='logout.php?logout' class='btn btn-warning'>Logout</a>
                <br>
  </div> 
  


  <?php
                echo $body2;
            ?>
<!-- Menü unten im Footer-Bereich -->
<div class="nav nav-pills flex-column  d-flex opacity_dark50 fixed-bottom">
        <ul class="nav nav-pills justify-content-end d-flex">
          <li class="nav-item">
            <a class="nav-link" aria-current="datenschutz.php" href="datenschutz.php">DatenXXschutz</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="impressum.php">Impressum</a>
          </li>
      </ul>
</div>
<!-- Ende Footer-Menü -->  



  <noscript>Your browser don't support JavaScript!</noscript>
  <script src="includes/js/bootstrap.js"></script>
</body>
</html>