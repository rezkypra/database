<?php
    $host = "localhost"; // Nama hostnya
    $username = "root"; // Username
    $password = ""; // Password (Isi jika menggunakan password)
    $database = ""; 
    $db = mysqli_connect($host, $username, $password, $database);
    if(!$db){
        die("Gagal terhubung : " . mysqli_connect_error());
    }
?>