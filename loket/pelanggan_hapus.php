<?php
SESSION_START();

    include('../konek.php');

    if(isset($_GET['IDPelanggan'])) {
        $hapus = mysqli_query($konek, "DELETE FROM pelanggan WHERE IDPelanggan = '" .$_GET['IDPelanggan']. "' ");
        echo "<script>
                    alert('Berhasil Menghapus Pelanggan !');
                    document.location='pelanggan.php';
                </script>";
    }

?>