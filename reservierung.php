<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" type="text/css" media="screen"href="css/basicstyles.css"/>
    <link rel="stylesheet" type="text/css" media="screen"href="css/menu.css"/>
    <link rel="stylesheet" type="text/css" media="screen"href="css/frames.css"/> -->
    <link rel="stylesheet" type="text/css" media="screen"href="includes/css/beisl23.css"/>
    <link rel="stylesheet" type="text/css" media="screen"href="includes/css/bootstrap.css"/>

    <title>PSV-Beisl</title>
<style>

</style>
</head>

<body>
    
<div class="bg">
    
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
  
</ul>
</nav>
<!-- Ende Hauptmenü  -->
   <div class="box_firstline">
        <div class="infobox_first_top"></div>
        <div class="infobox_central">
                <!-- <H1 class="reservierung_h1">WILLKOMMEN IM PSV-BEISL</H1> -->
               
               <div class="container w-50 mt-5">
                      <!-- Beginn Eingabeformular  -->
                  <form class="form-control  bg-dark"> 
                    <p class="form-text text-white text-center"> Anfrageformular</p>   
                    <div class="input-group mb-3">
                          <!-- <span class="input-group-text" id="basic-addon1">@</span> -->
                          <input type="text" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="basic-addon1" name="name">
                        </div>

                        <div class="input-group mb-3">
                          <input type="date" class="form-control" placeholder="datum" aria-label="Recipient's username" aria-describedby="basic-addon2" name="datum">
                          <span class="input-group-text" id="basic-addon2">Ihr gewünschtes Datum</span>
                        </div>
                        <div class="input-group mb-3">
                          <span class="input-group-text" id="basic-addon3">Personenanzahl</span>
                          <input type="number" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="anzahl">
                        </div>

                        <div class="input-group mb-3">
                          <span class="input-group-text">Rückrufnummer</span>
                          <input type="text" class="form-control" aria-label="Telefonnummer" name="phone">
                        </div>
                        <div class="input-group mb-3">
                        <span class="input-group-text">@</span>
                          <input type="text" class="form-control" placeholder="email" aria-label="email" name="email">
                        </div>

                        <div class="input-group">
                          <span class="input-group-text">Anmerkungen</span>
                          <textarea class="form-control" aria-label="With textarea" name="notes"></textarea>
                        </div>
                        <input type="submit" name="sumbit" class="btn btn-primary mt-1" value="Termin anfragen">
                  </form>
          <!-- Ende des Formulars -->
               </div>
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
<script src="includes/js/bootstrap.js"></script>
</body>
</html>

