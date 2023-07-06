<?php

SESSION_START();

include('../konek.php');


if (isset($_POST['tambah'])) {

    $kodeuser            =    $_POST['kode_user'];
    $namauser            =    $_POST['nama_user'];
    $username          =    $_POST['username'];
    $password          =    $_POST['password'];
    $email          =    $_POST['email'];
    $nohp          =    $_POST['no_hp'];
    $level             =    $_POST['level'];





    $simpan = mysqli_query($konek, "INSERT INTO `akun`(`kode_user`, `nama_user`, `username`, `password`, `email`, `no_hp`, `level`)   VALUES ('{$kodeuser}','{$namauser}','{$username}','{$password}','{$email}','{$nohp}','{$level}')");

    if($simpan)
    {
        echo "<script>
            alert('simpan data sukses!');
            document.location='akun.php';
        </script>";
    }
    
    else
    {
        echo "<script>
            alert('simpan data gagal !!!!');
            document.location='tambah_akun.php';
        </script>";
    }
}

if(isset($_POST['edit']))
   {
    $kodeuser            =    $_POST['kode_user'];
    $namauser            =    $_POST['nama_user'];
    $username          =    $_POST['username'];
    $password          =    $_POST['password'];
    $email          =    $_POST['email'];
    $nohp          =    $_POST['no_hp'];
    $level             =    $_POST['level'];
    
    $edit = mysqli_query($konek, "UPDATE `akun` SET `nama_user` = '{$namauser}', `username` = '{$username}', `password` = '{$password}', `email` = '{$email}', `no_hp` = '{$nohp}', `level` = '{$level}'  WHERE `akun`.`kode_user` = '{$kodeuser}'");
    
    if($edit)
    {
        echo "<script>
            alert('edit data sukses!');
            document.location='akun.php';
        </script>";
    }
    
    else
    {
        echo "<script>
            alert('edit data gagal !!!!');
            document.location='edit_akun.php?id=".$kodeuser."';
        </script>";
    }
}