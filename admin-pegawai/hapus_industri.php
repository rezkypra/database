<?php
SESSION_START();

    include('../konek.php');

    if(isset($_GET['kode_industri'])) {
        $hapus = mysqli_query($konek, "DELETE FROM ikm WHERE kode_industri = '" .$_GET['kode_industri']. "' ");
        echo "<script>
                    alert('Berhasil Menghapus Industri !');
                    document.location='industri.php';
                </script>";
    }

?>