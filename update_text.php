<?php
session_start();


require "includes/db_connect.php";
require_once "includes/usermedia_file_upload.php";


    $id = $_GET["id"];
    $sql = "select * from standardtexte where stexte_id = $id";
    $sqlupdatetext="SELECT standardtexte.stext, text_art.textart FROM standardtexte INNER JOIN text_art ON standardtexte.fk_textart = text_art.art_id where art_id=10";
    $resultupdate = mysqli_query ($connect, $sqlupdatetext);

    $row1=mysqli_fetch_assoc($resultupdate);
    $admin_updatetext = $row1["stext"];


$result = mysqli_query($connect, $sql);

//$row = mysqli_fetch_assoc($result);
if (mysqli_num_rows($result) == 1) {
    $data = mysqli_fetch_assoc($result);
    $text = $data['stext'];

    if (isset($_POST["submit"])) {
        $text = $_POST["stext"];
  
        $sqlupdate = "UPDATE `standardtexte` SET `stext`='$text'  WHERE stexte_id = $id";


        if (mysqli_query($connect, $sqlupdate)) {
            header("Location: texte.php");
        } else {
            echo "something went wrong";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="includes/css/beisl23.css">
    <link rel="stylesheet" href="includes/css/bootstrap.css">
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
                <p class="hours textcenter"> <?php echo $admin_updatetext ?></p>
                <a href='dashboard.php' class='btn btn-info'>Dashboard Home</a>
                <a href='texte.php' class='btn btn-info'>See Texte for Website</a>
                <a href='createuser.php' class='btn btn-info disabled'>Create User</a>
                <a href='update_wochenkarte.php'  class='btn btn-info'>Upload Wochenkarte</a>
                <a href='update_speisekarte.php'  class='btn btn-info'>Upload Speisekarte</a>
                <a href='logout.php?logout' class='btn btn-warning'>Logout</a>
                <br>
  </div>     

    <br>
    <div class="container" class="form-group">
        <!-- action="actions/a_update.php" -->
        <form method="POST" enctype="multipart/form-data">
            <input type="text" placeholder="text" class="form-control" name="stext" value="<?= $text ?>">
            <input type="submit" name="submit" value="Update Text" class="btn btn-success">
        </form>
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
<!-- Ende Footer-Menü -->>
<script src="includes/js/bootstrap.js"></script>
</body>

</html>