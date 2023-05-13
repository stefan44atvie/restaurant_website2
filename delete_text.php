<?php
session_start();

if(!isset($_SESSION["adm"])){
    header("Location: login.php");
 }

    require_once "includes/db_connect.php";
    $id = $_GET["id"];
    
    $sql = "DELETE FROM `standardtexte` WHERE stexte_id = $id";
    
    if(mysqli_query($connect, $sql)){
            header("Location: texte.php");
        }
    

?>