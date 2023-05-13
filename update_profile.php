<?php
session_start();


require "includes/db_connect.php";
require_once "includes/usermedia_file_upload.php";


$id = $_GET["id"];
$sql = "select * from users where id = $id";
$result = mysqli_query($connect, $sql);

//$row = mysqli_fetch_assoc($result);
if (mysqli_num_rows($result) == 1) {
    $data = mysqli_fetch_assoc($result);
    $username = $data['username'];
    $email = $data['email'];
    $picture = $data['picture'];

    if (isset($_POST["submit"])) {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $picturearray = file_upload($_FILES['picture']);

        $picture = $picturearray->fileName;


        if ($picturearray->error === 0) {
            ($_POST['picture'] == "avatar.png") ?: unlink("./uploads/pictures/user/{$_POST['picture']}");
            $sqlupdate = "UPDATE `users` SET `username`='$username',`picture`='$picturearray->fileName', `email`='$email'  WHERE id = $id";
        } else {
            $sqlupdate = "UPDATE `users` SET `username`='$username',`email`='$email'  WHERE id = $id";
        }


        if (mysqli_query($connect, $sqlupdate)) {
            header("Location: userhome.php");
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
    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="speisekarte.php">Speisekarte</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="wochenkarte.php">Wochenkarte</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="reservierung.php">Reservierung</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="kontakt.php">Kontakt&Öffnungszeiten</a>
  </li>
  <!-- <li class="nav-item">
    <a class="nav-link" href="events.php">Events</a>
  </li> -->
  <li class="nav-item">
    <a class="nav-link" href="dashboard.php" tabindex="-1" aria-disabled="true">Dashboard</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="login.php" tabindex="-1" aria-disabled="true">Login</a>
  </li>
</ul>
</nav>
<!-- Ende Hauptmenü  -->


    <h1> Update the article</h1>
    <br>
    <div class="container" class="form-group">
        <!-- action="actions/a_update.php" -->
        <form method="POST" enctype="multipart/form-data">
            <input type="text" placeholder="username" class="form-control" name="username" value="<?= $username ?>">
            <input type="text" placeholder="email" class="form-control" name="email" value="<?= $email ?>">
            <input type="file" placeholder="Bild (HTTP-LINK)" class="form-control" name="picture">
            <input type="submit" name="submit" value="Update Profile" class="btn btn-success">
        </form>
    </div>
 
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
<!-- Ende Footer-Menü -->>
<script src="includes/js/bootstrap.js"></script>
</body>

</html>