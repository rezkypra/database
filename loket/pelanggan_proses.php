<?php
SESSION_START();

include('../konek.php');


if (isset($_POST['tambah'])) {

    $IDPelanggan               =   $_POST['IDPelanggan'];
    $Nama                      =    $_POST['Nama'];
    $NoMeter                   =    $_POST['NoMeter'];
    $Alamat                    =    $_POST['Alamat'];
    $KodeTarif                 =    $_POST['KodeTarif'];




    $simpan = mysqli_query($konek, "INSERT INTO `pelanggan`(`IDPelanggan`, `NoMeter`, `Nama`, `Alamat`, `KodeTarif`)   VALUES ('{$IDPelanggan}','{$NoMeter}','{$Nama}','{$Alamat}','{$KodeTarif}')");

    if($simpan)
    {
        echo "<script>
            alert('Anda Sukses Menambah Pelanggan {$Nama} !');
            document.location='pelanggan.php';
        </script>";
    }
    
    else
    {
        echo "<script>
            alert('Gagal menambah Pelanggan !!!! Cek Kembali Inputan anda !!!!');
            document.location='pelanggan_tambah.php';
        </script>";
    }
}

if(isset($_POST['edit']))
   {
    $IDPelanggan               =    $_POST['IDPelanggan'];
    $Nama                      =    $_POST['Nama'];
    $NoMeter                   =    $_POST['NoMeter'];
    $Alamat                    =    $_POST['Alamat'];
    $KodeTarif                 =    $_POST['KodeTarif'];

    $edit = mysqli_query($konek, "UPDATE `pelanggan` SET `NoMeter` = '{$NoMeter}', `Nama` = '{$Nama}', `Alamat` = '{$Alamat}', `KodeTarif` = '{$KodeTarif}' WHERE `pelanggan`.`IDPelanggan` = '{$IDPelanggan}'");
    if($edit)
    {
        echo "<script>
            alert('Berhasil Mengupdate Data = {$Nama} !');
            document.location='pelanggan.php';
        </script>";
    }
    
    else
    {
        echo "<script>
            alert('Gagal Mengupdate Data {$Nama} !!!!');
            document.location='pelanggan_edit.php?id=".$IDPelanggan."';
        </script>";
    }
}
    
