<?php
SESSION_START();

include('../konek.php');


if (isset($_POST['tambah'])) {

    $kodebidang               =    $_POST['kode_bidang'];
    $namabidang               =    $_POST['nama_bidang'];




    $simpan = mysqli_query($konek, "INSERT INTO `bidang_ikm`(`kode_bidang`, `nama_bidang`)   VALUES ('{$kodebidang}','{$namabidang}')");

    if($simpan)
    {
        echo "<script>
            alert('simpan data sukses!');
            document.location='bidang_ikm.php';
        </script>";
    }
    
    else
    {
        echo "<script>
            alert('simpan data gagal !!!!');
            document.location='tambah_bidang.php';
        </script>";
    }
}

if(isset($_POST['edit'], $_POST['kode_bidang']))
   {
    $kodebidang          =    $_POST['kode_bidang'];
    $namabidang            =  $_POST['nama_bidang'];
    $edit = mysqli_query($konek, "UPDATE `bidang_ikm` SET `nama_bidang ` = '{$namabidang}' WHERE `bidang_ikm`.`kode_bidang` = '{$kodebidang}'");
    
    if($edit)
    {
        echo "<script>
            alert('edit data sukses!');
            document.location='bidang_ikm.php';
        </script>";
    }
    
    else
    {
        echo "<script>
            alert('edit data gagal !!!!');
            document.location='edit_bidang.php?id=".$kodebidang."';
        </script>";
    }
}