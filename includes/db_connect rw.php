<?php

    $hostname="w0123896.kasserver.com";
    $username="d03cf5d5";
    $password="aft7FFMnx64DsnGp";
    $databasename="d03cf5d5";

    $connect = mysqli_connect($hostname,$username,$password,$databasename);

    if(!$connect){
        die("connection failed".mysqli_connect_error());
    }
?>