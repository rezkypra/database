<?php
SESSION_START();

    include('../konek.php');

    if(isset($_GET['kode_event'])) {
        $hapus = mysqli_query($konek, "DELETE FROM `event` WHERE kode_event = '" .$_GET['kode_event']. "' ");
        echo "<script>
                    alert('hapus data event sukses!');
                    document.location='event.php';
                </script>";
    }

?>