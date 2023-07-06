<?php
SESSION_START();

include('../konek.php');


if (isset($_POST['tambah'])) {

    $kodeindustri               =   $_POST['kode_industri'];
    $namaindustri               =   $_POST['nama_industri'];
    $namapemilik                =   $_POST['nama_pemilik'];
    $kontak                     =   $_POST['kontak'];
    $alamatindustri             =   $_POST['alamat_industri'];
    $kodebidang                 =   $_POST['kode_bidang'];




    $simpan = mysqli_query($konek, "INSERT INTO `ikm`(`kode_industri`, `nama_industri`, `nama_pemilik`, `kontak`, `alamat_industri`, `kode_bidang`)   VALUES ('{$kodeindustri}','{$namaindustri}','{$namapemilik}','{$kontak}, '{$alamatindustri}','{$kodebidang}')");

    if($simpan)
    {
        echo "<script>
            alert('Anda Sukses Menambah Industri {$namaindustri} !');
            document.location='industri.php';
        </script>";
    }
    
    // else
    // {
    //     echo "<script>
    //         alert('Gagal menambah Industri !!!! Cek Kembali Inputan anda !!!!');
    //         document.location='tambah_industri.php';
    //     </script>";
    // }
}

if(isset($_POST['edit']))
   {
    $kodeindustri               =   $_POST['kode_industri'];
    $namaindustri               =   $_POST['nama_industri'];
    $namapemilik                =   $_POST['nama_pemilik'];
    $kontak                     =   $_POST['kontak'];
    $alamatindustri             =   $_POST['alamat_industri'];
    $kodebidang                 =   $_POST['kode_bidang'];

    $edit = mysqli_query($konek, "UPDATE `ikm` SET `nama_industri` = '{$namaindustri}', `nama_pemilik` = '{$namapemilik}', `kontak` = '{$kontak}', `alamat_industri` = '{$alamatindustri}', `kode_bidang` = '{$kodebidang}' WHERE `ikm`.`kode_industri` = '{$kodeindustri}'");
    if($edit)
    {
        echo "<script>
            alert('Berhasil Mengupdate Data = {$namaindustri} !');
            document.location='industri.php';
        </script>";
    }
    
    else
    {
        echo "<script>
            alert('Gagal Mengupdate Data {$namaindustri} !!!!');
            document.location='edit_industri.php?id=".$kodeindustri."';
        </script>";
    }
}