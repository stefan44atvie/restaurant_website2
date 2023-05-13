<?php  
        session_start();
        require_once "includes/db_connect.php";

        $sql="SELECT standardtexte.stext, text_art.textart FROM standardtexte INNER JOIN text_art ON standardtexte.fk_textart = text_art.art_id where art_id=6";
        $resultText = mysqli_query ($connect, $sql);

        $rowX=mysqli_fetch_assoc($resultText);
        $admin_createtext = $rowX["stext"];
     
        $sqlKat ="Select * from text_art";
        $result = mysqli_query($connect,$sqlKat);
        $options= "";
       
        while($row = mysqli_fetch_assoc($result)){
            $options .= "<option value='{$row["art_id"]}'>{$row["textart"]}</option>";
        }

        $all_categories = mysqli_query($connect,$sqlKat);
    
        if(!isset($_SESSION["adm"])){
          header("Location: login.php");
        }
        
        if(isset($_POST["register"])){
            $text = $_POST["text"];
            $cat = $_POST["category"];
            
            $error = false;
    
            // Validation of $text
            if(empty($text)){
              $error = true;
              
              $textError ="Bitte text einfügen!";
            }elseif(strlen($text) < 3){
              $error = true;
              $textError ="Der Name muss aus mindestens 3 Zeichen bestehen!";
            }
            // elseif(!preg_match("/^[\w\,\.\;\:\öäüÖÄÜ]*^[a-zA-Z]+$/", $text)){
            //   $error = true;
            //   $textError ="Bitte nur Zeichen aus dem Alphabet eingeben!";
            // }
           try {
            if(!$error){
                $sql = "INSERT INTO `standardtexte`(`stext`, `fk_textart`) VALUES ('$text', '$cat')  ";
             
                $res = mysqli_query($connect, $sql);
                if($res){
                  $errType = "success";
                  $errMsg = "Erfolgreich gespeichert!!";
                  $text = "";
                }else{
                  $errType = "danger";
                  $errMsg = "something went wrong, try again later!!";
                      // $sql = "Select art_id from text_art where art_id = '$cat'";
                      // $result = mysqli_query($connect, $sql);
                      // if(mysqli_num_rows($result) != 0){
                      //     $error = true;
                      //     $emailError = "Diese email ist bereits in unserem System!";
                      // }
                }
                
              
            }
           } catch (Exception $e){
           {
            // echo $e;
            $errType = "danger";
            $errMsg = "Dieser Eintrag ist leider schon vorhanden!";
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
 
<!-- Hier die Box für die Registrierung -->

<div class="container">
                <h1 class="title_hours textcenter">ADMIN DASHBOARD</h1>
                <p class="hours textcenter"> <?php echo $admin_createtext ?></p>
                <!-- <p class="hours textcenter"> <?php echo "Hallo".$_SESSION["name"] ?></p> -->

                <a href='dashboard.php' class='btn btn-info'>Dashboard Home</a>
                <a href='texte.php' class='btn btn-info'>See Texte for Website</a>
                <a href='create_text.php' class='btn btn-info disabled'>Create Text</a>
                <a href='createuser.php' class='btn btn-info'>Create User</a>
                <a href='update_wochenkarte.php'  class='btn btn-info'>Upload Wochenkarte</a>
                <a href='update_speisekarte.php'  class='btn btn-info'>Upload Speisekarte</a>
                <a href='logout.php?logout' class='btn btn-warning'>Logout</a>
                <br>
  </div> 
<div class="loginbox opacity_dark50 box_top5 w-50">
            <h1 class="title_hours">Erstelle neuen Text</h1>
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
            
                <form class="w-50" method="POST" action="<?= htmlspecialchars($_SERVER['SCRIPT_NAME'])?>">
                      <input type="text" placeholder="Bitte den gewünschten Text einfügen" class="form-control" name="text" value="<?= $text ?>">
                      <span class="text-danger"><?= $textError ?></span class="text-danger">
                        <select class="form-control dropdown-toggle" name="category">
                            <option value="none">Choose Category</option>
                            <?= $options;?>
                         </select>
                        
                         <input type="submit" class="form-control" name="register" value="Speichern">

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