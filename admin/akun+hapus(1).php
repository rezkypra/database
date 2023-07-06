<?php
SESSION_START();

    include('../konek.php');

    if(isset($_GET['IDAkun'])) {
        $hapus = mysqli_query($konek, "DELETE FROM user WHERE IDAkun = '" .$_GET['IDAkun']. "' ");
        echo "<script>
                    alert('hapus data sukses!');
                    document.location='akun.php';
                </script>";
    }

?>