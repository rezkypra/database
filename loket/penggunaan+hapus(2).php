<?php
SESSION_START();

    include('../konek.php');

    if(isset($_GET['IDPenggunaan'])) {
        $hapus = mysqli_query($konek, "DELETE FROM penggunaan WHERE IDPenggunaan = '" .$_GET['IDPenggunaan']. "' ");
        echo "<script>
                    alert('Berhasil Menghapus data Penggunaan pelanggan !');
                    document.location='penggunaan.php';
                </script>";
    }

?>