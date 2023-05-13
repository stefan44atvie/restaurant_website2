<?php
    session_start();
  
    if(isset($_SESSION["user"])){
      header("Location: userhome.php");
    }
    if(isset($_SESSION["adm"])){
      header("Location: dashboard.php");
    }

require_once "includes/db_connect.php";

    function cleanInput($param){
        $clean = trim($param);
        $clean = strip_tags($param);
        $clean = htmlspecialchars($param);

        return $clean;
      }

    if(isset($_POST["login"])){
        $error = false;

        $email = cleanInput($_POST["email"]);
        $password = cleanInput($_POST["password"]);
        
         // Validation of email
         if(empty($email)){
            $error = true;
            $emailError = "Plase enter email!";
         }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error = true;
            $emailError = "Enter vailid email";
         }
         if(empty($password)){
            $error = true;
            $passError = "Please enter password";
         }

         if(!$error){
            $password = hash("sha256", $password);

            $sql = "Select * from users where email = '$email' and password ='$password'";
            $result = mysqli_query($connect, $sql);
            $count = mysqli_num_rows($result);
            $row = mysqli_fetch_assoc($result);
            if($count == 1){
                if($row["status"] =="adm"){
                  $_SESSION["adm"] = $row["id"];
                  header ("Location: dashboard.php"); 
                }else{
                  $_SESSION["user"] =$row["id"];
                  $_SESSION["name"] =$row["username"];
                  header ("Location: userhome.php");
                }

            }
         }
  
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
    <a class="nav-link text-white" href="kontakt.php">Kontakt&Öffnungszeiten</a>
  </li>
  <!-- <li class="nav-item">
    <a class="nav-link" href="events.php">Events</a>
  </li> -->
  <li class="nav-item">
    <a class="nav-link text-white" href="reservierung.php">Reservierung</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="dashboard.php" tabindex="-1" aria-disabled="true">Dashboard</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="login.php" tabindex="-1" aria-disabled="true">Login</a>
  </li>
</ul>
</nav>
<!-- Ende Hauptmenü  -->
 
<div class="loginbox opacity_dark50 box_top5">

<form class="w-50" method="POST" action="<?= htmlspecialchars($_SERVER['SCRIPT_NAME'])?>" enctype="multipart/form-data">

                <h1 class="title_hours">LOGIN</h1>
                <?php
            if (isset($errMSG)) {
                echo $errMSG;
            }
            ?>
                  <span class="text-danger"><?= $usernameError ?></span class="text-danger">
                  <input type="email" placeholder="Bitte Ihre email-Adresse einfügen" class="form-control" name="email" value="<?= $email ?>">
                  <span class="text-danger"><?= $emailError ?></span class="text-danger">
                  <input type="password" placeholder="Bitte Passwort einfügen" class="form-control" name= "password">
                  <span class="text-danger"><?= $passError ?></span class="text-danger">
                  <input type="submit" class="form-control" name="login" value="Einloggen">


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
<!-- Ende Footer-Menü -->



  <noscript>Your browser don't support JavaScript!</noscript>
  <script src="includes/js/bootstrap.js"></script>
</body>
</html>