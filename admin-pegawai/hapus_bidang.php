<?php
SESSION_START();

    include('../konek.php');

    if(isset($_GET['kode_bidang'])) {
        $hapus = mysqli_query($konek, "DELETE FROM bidang_ikm WHERE kode_bidang = '" .$_GET['kode_bidang']. "' ");
        echo "<script>
                    alert('hapus data sukses!');
                    document.location='bidang_ikm.php';
                </script>";
    }

?>