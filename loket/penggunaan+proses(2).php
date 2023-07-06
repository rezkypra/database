<?php
SESSION_START();

include('../konek.php');


if (isset($_POST['tambah'])) {

    $IDPenggunaan               =    $_POST['IDPenggunaan'];
    $IDPelanggan                =    $_POST['IDPelanggan'];
    $Bulan                      =    $_POST['Bulan'];
    $Tahun                      =    $_POST['Tahun'];
    $Meterawal                  =    $_POST['Meterawal'];
    $Meterakhir                 =    $_POST['Meterakhir'];

    $getTarif = mysqli_query($konek,"SELECT pelanggan.*, tarif.Tarifperkwh FROM `pelanggan`, tarif WHERE tarif.KodeTarif=pelanggan.KodeTarif AND pelanggan.IDPelanggan = '{$IDPelanggan}'");
    $fetch = mysqli_fetch_assoc($getTarif);
    $tarif = $fetch['Tarifperkwh'];


    $simpan = mysqli_query($konek, "CALL hitungsub ('{$IDPenggunaan}','{$IDPelanggan}','{$Bulan}','{$Tahun}','{$Meterawal}','{$Meterakhir}', {$tarif})");

    if($simpan)
    {
        echo "<script>
            alert('Berhasil Menambahkan Data Penggunaan !');
            document.location='penggunaan.php';
        </script>";
    }
    
    else
    {
        echo "<script>
            alert('GAGAL Menambahkan Data Penggunaan !!!!');
            document.location='penggunaan+tambah.php';
        </script>";
    }
}

if(isset($_POST['edit']))
   {
    $IDPenggunaan               =    $_POST['IDPenggunaan'];
    $IDPelanggan                =    $_POST['IDPelanggan'];
    $Bulan                      =    $_POST['Bulan'];
    $Tahun                      =    $_POST['Tahun'];
    $Meterawal                  =    $_POST['Meterawal'];
    $Meterakhir                 =    $_POST['Meterakhir'];

    $edit = mysqli_query($konek, "UPDATE `penggunaan` SET `Bulan` = '{$Bulan}', `Tahun` = '{$Tahun}', `Meterawal` = '{$Meterawal}', `Meterakhir` = '{$Meterakhir}' WHERE `penggunaan`.`IDPenggunaan` = '{$IDPenggunaan}'");
    
    if($edit)
    {
        echo "<script>
            alert('Berhasil Mengupdate Data Penggunaan !');
            document.location='penggunaan.php';
        </script>";
    }
    
    else
    {
        echo "<script>
            alert('GAGAL Mengupdate Data Penggunaan !!!!');
            document.location='penggunaan+edit.php?id=".$IDPenggunaan."';
        </script>";
    }
}