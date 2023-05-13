<?php
      require_once "includes/db_connect.php";

   if(isset($_FILES['wochenkarte'])){
      $errors= array();
      $fileName = $_FILES['wochenkarte']['name'];
      $file_size =$_FILES['wochenkarte']['size'];
      $file_tmp =$_FILES['wochenkarte']['tmp_name'];
      $file_type=$_FILES['wochenkarte']['type'];
      $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
      $uploadError ="";
      $filesAllowed = array ["pdf", "pdf", "pdf"];

      //$file_ext=strtolower(end(explode('.',$_FILES['wochenkarte']['name'])));
      
      $extensions = array("pdf","pdf","pdf");
            
      if(in_array($fileExtension,$extensions)=== false){
        // $errors[]="extension not allowed, please choose a JPEG or PNG file.";
         $uploadError = "<br>Bitte nur *.pdf hochladen";
      }
      
      if($file_size > 4000000){
         $errors[]='File size must be excately 2 MB';
      }
      // $wochenkarte = file_upload($_FILES["wochenkarte"]);
      if(empty($errors)==true){
        $fileNewName = "wochenkarte" . "." . $fileExtension; // 1233343434.jpg i.e
        $fileName = $fileNewName;
        $sql = "INSERT INTO wochenkarte(`wochenkarte`) VALUES ('$fileName')";
        $res = mysqli_query($connect, $sql);
         move_uploaded_file($file_tmp,"uploads/pdf/".$fileName);
         echo "Success";
      }else{
         print_r($errors);
         print_r($uploadError);
      }
   }
?>
<html>
   <body>
      
      <form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="wochenkarte" />
         <input type="submit"/>
      </form>
      
   </body>
</html>