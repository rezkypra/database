<?php
SESSION_START();

include('../konek.php');


if (isset($_POST['tambah'])) {

    $IDBayar                   =    $_POST['IDBayar'];
    $IDTagihan                 =    $_POST['IDTagihan'];
    $Tanggal                   =    $_POST['Tanggal'];
    $Bulanbayar                =    $_POST['Bulanbayar'];
    $Biayaadmin                =    $_POST['Biayaadmin'];



    
    $simpan = mysqli_query($konek, "INSERT INTO `pembayaran`(`IDBayar`, `IDTagihan`, `Tanggal`, `Bulanbayar`, `Biayaadmin`)   VALUES ('{$IDBayar}','{$IDTagihan}','{$Tanggal}','{$Bulanbayar}','{$Biayaadmin}')");

    if($simpan)
    {
        echo "<script>
            alert('simpan data sukses! cetak ');
            document.location='pembayaran_detail.php?IDTagihan=$IDTagihan';
        </script>";
    }
    
    else
    {
        echo "<script>
            alert('simpan data gagal !!!!');
            document.location='pembayaran.php';
        </script>";
    }
}