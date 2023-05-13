<?php
session_start();

if (isset($_SESSION["adm"])) {
  header("Location: dashboard.php");
}
// Umleitung, falls User/Adm nicht angemeldet ist, da hier nur User sein dürfen
if (isset($_SESSION["adm"])) {
  header("Location: dashboard.php");
} elseif (!isset($_SESSION["user"])) {
  header("Location: login.php");
}

?>
<?php
require "includes/db_connect.php";

$sql = "SELECT * FROM `users` WHERE id=" . $_SESSION["user"];
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);
$id = $_SESSION["user"];

// $sqlUser="select * from `users` where id =".$_SESSION["user"];
// $resultUser = mysqli_query($connect, $sql);
// $rowUser=mysqli_fetch_assoc($resultUser);
$body = "";
$body .= "
  <div class='userbox opacity_dark50 box_top5'>
    <div class='card w-100' style='width: 18rem;'>
        <div class='card-header'>
            <h1 class='titletext'>Hier ist dein Userprofil</h1>
            <a class='profiltext'>Hallo {$row["username"]}</a>
        </div>
        <img class='card-img-top ' src='uploads/pictures/user/" . $row['picture'] . "' width='50' alt='Card image cap'>
        <div class='card-body'>
        <h5 class='card-title'> </h5>
        <p class='card-text'> <br>
        <table class='table'>
            <tbody>
                <tr>
                    <td>Username: </td>
                    <td>{$row["username"]} </td>
                </tr>
                <tr>
                    <td>email: </td>
                    <td>{$row["email"]} </td>
                </tr>
                <tr>
                <td>Status: </td>
                <td>{$row["status"]} </td>
            </tr>
            

            </tbody>
        </table>
        
        <a href='update_profile.php?id=$id ' class='btn btn-primary'>Update</a>
        <a href='delete.php?id={$row["id"]}' class='btn btn-danger disabled'>Delete</a>
        <a href='logout.php?logout' class='btn btn-warning'>Logout</a>

        </div>
    </div>
  </div>
  ";





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
<title>PSV-Beisl</title>
<!-- Hauptmenü oben  -->
<nav class="nav nav-pills flex-column flex-sm-row opacity_dark50">
<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link active text-white" aria-current="page" href="index.php">Home</a>
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
<nav class="nav nav-pills flex-column flex-sm-row mt-3">
  <a class="flex-sm-fill text-sm-center nav-link text-white active" aria-current="page" href="userhome.php">Dein Profil</a>
  <a class="flex-sm-fill text-sm-center nav-link text-white" href="us_uploadWochenkarte.php">Upload Wochenkarte</a>
  <a class="flex-sm-fill text-sm-center nav-link text-white" href="us_uploadSpeisekarte.php">Upload Speisekarte</a>
</nav>






  <div class="infobox_oeffnungszeiten">
    <?php
    echo $body;
    ?>
  </div>
  <!-- Menü unten im Footer-Bereich -->
<div class="nav nav-pills flex-column  d-flex opacity_dark50 fixed-bottom">
        <ul class="nav nav-pills justify-content-end d-flex">
          <li class="nav-item">
            <a class="nav-link text-white" aria-current="datenschutz.php" href="datenschutz.php">DatenXXschutz</a>
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