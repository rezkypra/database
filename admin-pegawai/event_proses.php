<?php
SESSION_START();

include('../konek.php');


if (isset($_POST['tambah'])) {

    $kodeevent                   =    $_POST['kode_event'];
    $namaevent                  =    $_POST['nama_event'];
    $tanggalevent                =    $_POST['tanggal_event'];
    $lokasievent                =    $_POST['lokasi_event'];
    $keterangan                =    $_POST['keterangan'];
    $sumber = $_FILES['gambar']['tmp_name'];
    $target = '../image/';
    $image = $_FILES['gambar']['name'];
    $pindah = move_uploaded_file($sumber, $target.$image);
    if($pindah)
       echo 'successfully file uploaded';
    else
       echo 'something went wrong'; 

    $simpan = mysqli_query($konek, "INSERT INTO `event`(`kode_event`, `nama_event`,`tanggal_event`, `lokasi_event`, `keterangan`, `gambar`)  VALUES ('{$kodeevent}','{$namaevent}','{$tanggalevent}','{$lokasievent}','{$keterangan}','{$image}')");

    if($simpan)
    {
        echo "<script>
            alert('simpan data sukses!');
            document.location='event.php';
        </script>";
    }
    
    else
    {
        echo "<script>
            alert('simpan data gagal !!!!');
            document.location='tambah_event.php';
        </script>";
    }
}

if(isset($_POST['edit']))
    {
    $kodeevent                   =    $_POST['kode_event'];
    $namaevent                 =    $_POST['nama_event'];
    $tanggalevent                =    $_POST['tanggal_event'];
    $lokasievent                =    $_POST['lokasi_event'];
    $keterangan                =    $_POST['keterangan'];
    $sumber = $_FILES['gambar']['name'];
    $image = $_FILES['gambar']['tmp_name'];
    $fotobaru = date('dmYHis').$sumber;
    $path = "../image/".$fotobaru;

    if (isset($_POST['ubah_foto'])) {
            $sumber = $_FILES['gambar']['name'];
            $nama_gambar = $_FILES['gambar']['tmp_name'];
            $fotobaru = date('dmYHis').$sumber;
            $path = "../image/".$fotobaru;
        if(move_uploaded_file($image, $path)){ // Cek apakah gambar berhasil diupload atau tidak

            // Query untuk menampilkan data event berdasarkan kode event yang dikirim

            $query = "SELECT * FROM `event` WHERE kode_event='".$kodeevent."'";
            $sql = mysqli_query($konek, $query); // Eksekusi/Jalankan query dari variabel $query
            $data = mysqli_fetch_array($sql);


            
            

            // Proses ubah data ke Database
            $edit = mysqli_query($konek, "UPDATE `event` SET `nama_event` = '{$namaevent}', `tanggal_event` = '{$tanggalevent}', `lokasi_event` = '{$lokasievent}', `keterangan` = '{$keterangan}', `gambar` = '{$fotobaru}' WHERE `event`.`kode_event` = '{$kodeevent}'");
            if(is_file("../image/".$data['gambar'])) {// Jika gambar ada

                unlink("../image/".$data['gambar']); // Hapus file gambar sebelumnya yang ada di folder images
            }
            if($edit)
            {
                echo "<script>
                    alert('Berhasil Mengupdate Data = {$namaevent} !');
                    document.location='event.php';
                </script>";
            }
        
            else
            {
                echo "<script>
                    alert('Gagal Mengupdate Data {$namaevent} !!!!');
                    document.location='edit_event.php?id=".$kodeevent."';
                </script>";
            }
        }
        else
        {
            $query = "UPDATE `event` SET `nama_event` = '{$namaevent}', `tanggal_event` = '{$tanggalevent}', `lokasi_event` = '{$lokasievent}', `keterangan` = '{$keterangan}',  WHERE `event`.`kode_event` = '{$kodeevent}'";
            $sql = mysqli_query($konek, $query);

            if($sql){ // Cek jika proses simpan ke database sukses atau tidak

                echo "<script>
                    alert('Berhasil Mengupdate Data = {$namaevent} !');
                    document.location='event.php';
                </script>";
        
            }else{
        
                // Jika Gagal, Lakukan :
        
                echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
        
                echo "<script>
                alert('Gagal Mengupdate Data {$namaevent} !!!!');
                document.location='edit_event.php?id=".$kodeevent."';
            </script>";
        
            }
    }
}
}
?>