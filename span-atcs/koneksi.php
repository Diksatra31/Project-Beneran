<?php
    $host = "localhost";
    $username = "root";
    $password = "root";
    $db = "span-atcs";

    $conn = new mysqli($host, $username, $password, $db);
    if ($conn){
        //echo "Berhasil Konek";
    }else{echo "Masih Belum Konek";}
?>
