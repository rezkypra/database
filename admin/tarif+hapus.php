<?php
SESSION_START();

    include('../konek.php');

    if(isset($_GET['KodeTarif'])) {
        $hapus = mysqli_query($konek, "DELETE FROM tarif WHERE KodeTarif = '" .$_GET['KodeTarif']. "' ");
        echo "<script>
                    alert('hapus data sukses!');
                    document.location='tarif.php';
                </script>";
    }

?>