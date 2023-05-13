<?php
  session_start();

  require_once "includes/db_connect.php";

  $sql="SELECT standardtexte.stext, text_art.textart FROM standardtexte INNER JOIN text_art ON standardtexte.fk_textart = text_art.art_id where art_id=3;";
  $result = mysqli_query ($connect, $sql);

  $row=mysqli_fetch_assoc($result);
  $text = $row["stext"];

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
    <a class="nav-link active" href="kontakt.php">Kontakt&Öffnungszeiten</a>
  </li>
  <!-- <li class="nav-item">
    <a class="nav-link" href="events.php">Events</a>
  </li> -->
  
</ul>
</nav>
<!-- Ende Hauptmenü  -->
 
<div class="legalbox opacity_dark50 box_top5">
                <h1 class="title_hours textcenter">Unsere Öffnungszeiten</h1>
                <p class="hours textcenter">Montag - Freitag: 7:30 - 23:00 </p>
                <p class="hours textcenter">Samstag, Sonntag, Feiertag: 8:00 - 21:00</p>
                <p></p>
                <h1 class="title_hours textcenter">Kontakt</h1>
                <p class="hours textcenter"> Adresse: Dampfschiffhaufen 2, 1220 Wien
                <p class="hours textcenter"> Telefon: +43 (1) 263 36 66-32</p>
                <p class="hours textcenter"> email: <a class="text-white" href="mailto:office@psvbeisl.at">office@psvbeisl.at</a>
                <p class="hours textcenter"> <?php echo $text ?></a>
    
</div> 
</div>
<!-- Menü unten im Footer-Bereich -->
<div class="nav nav-pills flex-column  d-flex opacity_dark50 fixed-bottom">
        <ul class="nav nav-pills justify-content-end d-flex">
          <li class="nav-item">
            <a class="nav-link text-white" aria-current="datenschutz.php" href="datenschutz.php">Datenschutz</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="impressum.php">Impressum</a>
          </li>
      </ul>
</div>
<!-- Ende Footer-Menü -->  


  <noscript>Your browser don't support JavaScript!</noscript>
  <script src="includes/js/bootstrap.js"></script>
</body>
</html>