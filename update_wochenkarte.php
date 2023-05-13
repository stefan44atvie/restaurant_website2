<?php 
      require_once "includes/db_connect.php";
      require_once "includes/pdf_file_upload.php";

      // wenn user oder adm bereits angemeldet sind, werden diese auf Unterseiten umgeleitet
      session_start();

      $sql="SELECT standardtexte.stext, text_art.textart FROM standardtexte INNER JOIN text_art ON standardtexte.fk_textart = text_art.art_id where art_id=7";
      $result = mysqli_query ($connect, $sql);

      $row=mysqli_fetch_assoc($result);
      $admin_updateWoche = $row["stext"];
    

      function cleanInput($param){
        $clean = trim($param);
        $clean = strip_tags($param);
        $clean = htmlspecialchars($param);

        return $clean;
      }

      $wochenkarteError = "";

      if(isset($_POST["register"])){
        $wochenkarte = cleanInput($_POST["wochenkarte"]);
       
        
        $error = false;

        // Validation of $username
        
        
        if(empty($wochenkarte)){
          $error = false;
          $wochenkarteError="huhuh";
          // $wochenkarteError ="Bitte Wochenkarte einfügen!";
        }elseif(strlen($wochenkarte) < 3){
          $error = true;
          $wochenkarteError ="Der Name muss aus mindestens 3 Zeichen bestehen!";
        }elseif(!preg_match("/^[a-zA-Z]+$/", $wochenkarte)){
          $error = true;
          $wochenkarteError ="Bitte nur Zeichen aus dem Alphabet eingeben!";
        }
        
        
        
        $wochenkarte = file_upload($_FILES["wochenkarte"]);

        if(!$error){
          $sql = "INSERT INTO wochenkarte(`wochenkarte`) VALUES ('$wochenkarte->fileName')";
          $res = mysqli_query($connect, $sql);

          if($res){
            // $sql = "INSERT INTO wochenkarte(`wochenkarte`) VALUES ('$wochenkarte->fileName')";
            // $res = mysqli_query($connect, $sql);
            $errType = "success";
            $trt=2;
            $errMsg = "Wochenkarte erfolgreich hochgeladen";
            // $username = "";
            // $email = "";
            $uploadError = ($wochenkarte >$error != 0 ) ? $wochenkarte->ErrorMessage : "";
          }else{
            $errType = "danger";
            $trt=3;
          $errMsg = "something went wrong, try again later!!";
          $uploadError = ($wochenkarte >$error != 0 ) ? $wochenkarte->ErrorMessage : ""; 
          }
        
      }else{
        $errType="danger";
        $errMsg = "Fehler 1";
        $trt=4;
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
 
<!-- Hier die Box für die Registrierung -->
<div class="container">
                <h1 class="title_hours textcenter">ADMIN DASHBOARD</h1>
                <p class="hours textcenter"> <?php echo $admin_updateWoche ?></p>
                <a href='dashboard.php' class='btn btn-info'>Dashboard Home</a>
                <a href='texte.php' class='btn btn-info'>See Texte for Website</a>
                <a href='createuser.php' class='btn btn-info'>Create User</a>
                <a href='update_wochenkarte.php'  class='btn btn-info disabled'>Upload Wochenkarte</a>
                <a href='update_speisekarte.php'  class='btn btn-info'>Upload Speisekarte</a>
                <a href='logout.php?logout' class='btn btn-warning'>Logout</a>
                <br>
             
               
<div class="loginbox opacity_dark50 box_top5 w-50">
            
        <div class="container">
            <h1 class="title_hours">Laden Sie hier die aktuelle Wochenkarte für das PSV-Beisl hoch</h1>
            <?php
              if(isset($errMsg)){
              ?>
                <div class = "alert alert-<?= $errType ?>" role="alert">
                  <?= $errMsg ?> 
                  <?= $uploadError ?> 

                </div> 
                
                <?php 
              }
            ?>
            
                <form class="w-50" method="POST" action="<?= htmlspecialchars($_SERVER['SCRIPT_NAME'])?>" enctype="multipart/form-data">
                      <input type="file" placeholder="Bitte Wochenkarte einfügen" class="form-control" name= "wochenkarte">
                      <input type="submit" class="form-control" name="register" value="upload Wochenkarte">
                      <span class="text-danger"><?= $wochenkarteError ?></span class="text-danger">


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