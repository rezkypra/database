<?php
SESSION_START();

include('../konek.php');


if (isset($_POST['tambah'])) {

    $KodeTarif               =    $_POST['KodeTarif'];
    $Daya                =    $_POST['Daya'];
    $Tarifperkwh                      =    $_POST['Tarifperkwh'];





    $simpan = mysqli_query($konek, "INSERT INTO `tarif`(`KodeTarif`, `Daya`, `Tarifperkwh`)   VALUES ('{$KodeTarif}','{$Daya}','{$Tarifperkwh}')");

    if($simpan)
    {
        echo "<script>
            alert('simpan data sukses!');
            document.location='tarif.php';
        </script>";
    }
    
    else
    {
        echo "<script>
            alert('simpan data gagal !!!!');
            document.location='tarif.php';
        </script>";
    }
}

if(isset($_POST['edit']))
   {
    $KodeTarif           =    $_POST['KodeTarif'];
    $Daya                =    $_POST['Daya'];
    $Tarifperkwh         =    $_POST['Tarifperkwh'];
    $edit = mysqli_query($konek, "UPDATE `tarif` SET `Daya` = '{$Daya}', `Tarifperkwh` = '{$Tarifperkwh}'  WHERE `tarif`.`KodeTarif` = '{$KodeTarif}'");
    
    if($edit)
    {
        echo "<script>
            alert('edit data sukses!');
            document.location='tarif.php';
        </script>";
    }
    
    else
    {
        echo "<script>
            alert('edit data gagal !!!!');
            document.location='tarif+edit.php?id=".$KodeTarif."';
        </script>";
    }
}