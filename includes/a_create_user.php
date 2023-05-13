<?php
    require "db_connect.php";
    require "usermedia_file_upload.php";

    if($_POST){
       $username = $_POST["username"];
       $password = $_POST["password"];
       $email =  $_POST["email"];
       $status = $_POST["status"];
       $picture = $_POST["picture"];
       




        $sql = "INSERT INTO `users`(username, password, email, status, picture) VALUES ('$username', '$password','$email', '$status', '$picture')";

       if(mysqli_query($connect, $sql)){
          header("Location: ../dashboard.php");
       }else{
            echo "some got wrong";
       }
    }
    function cleanInput($param){
        $clean = trim($param);
        $clean = strip_tags($param);
        $clean = htmlspecialchars($param);

        return $clean;
      }

      $usernameError = $emailError = $passError = $username = $email = $password = "";
      if(isset($_POST["register"])){
        $username = cleanInput($_POST["username"]);
        $password = cleanInput($_POST["password"]);
        $email = cleanInput($_POST["email"]);
        
        $error = false;

        // Validation of $username
        if(empty($username)){
          $error = true;
          $usernameError ="Bitte Usernamen einfügen!";
        }elseif(strlen($username) < 3){
          $error = true;
          $usernameError ="Der Name muss aus mindestens 3 Zeichen bestehen!";
        }elseif(!preg_match("/^[a-zA-Z]+$/", $username)){
          $error = true;
          $usernameError ="Bitte nur Zeichen aus dem Alphabet eingeben!";
        }
        // $username Validation END
        
        // Validation of email
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
          $error = true;
          $emailError = "Bitte eine korrekte email eingeben!";
        }else{
          $sql = "Select email from users where email = '$email'";
          $result = mysqli_query($connect, $sql);
          if(mysqli_num_rows($result) != 0){
            $error = true;
            $emailError = "Diese email ist bereits in unserem System!";
          }
        }
        if(empty($password)){
          $error = true;
          $passError = "Bitte Passwort eingeben!";
        }elseif(strlen($password) < 6){
          $error = true;
          $passError = "Passwort muss aus mindestens 6 Zeichen bestehen";
        }

        $password = hash("sha256", $password);

        $picture = file_upload($_FILES["picture"]);

        if(!$error){
          $sql = "INSERT INTO `users`(`username`, `password`, `email`, `picture`) 
          VALUES ('$username','$password','$email','$picture->fileName') ";
          $res = mysqli_query($connect, $sql);
          if($res){
            $errType = "success";
            $errMsg = "Erfolgreich registriert!! Sie können sich nun einloggen";
            $username = "";
            $email = "";
            $uploadError = ($picture >$error != 0 ) ? $picture->ErrorMessage : "";
          }else{
            $errType = "danger";
          $errMsg = "something went wrong, try again later!!";
          $uploadError = ($picture >$error != 0 ) ? $picture->ErrorMessage : ""; 
          }
        
      }
    }
?>