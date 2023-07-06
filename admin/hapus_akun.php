<?php
SESSION_START();

    include('../konek.php');

    if(isset($_GET['kode_user'])) {
        $hapus = mysqli_query($konek, "DELETE FROM akun WHERE kode_user = '" .$_GET['kode_user']. "' ");
        echo "<script>
                    alert('hapus data sukses!');
                    document.location='akun.php';
                </script>";
    }

?>