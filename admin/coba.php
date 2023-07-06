<?php 
    include("../koneksi.php"); 
	$sql = $db->query('SELECT * from event');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Laptop</title>
    <link href="../css/index-admin.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="header">
        <h2 class="atas" id="atas">DATA ALAT MUSIK</h2>
    </div>
    
    <div class="bar">
        <ul>
            <li><a href="admin-dashboard.php">Kembali</a></li>
            <li><a href="../logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="konten">
        <div class="daftar">
            <ul class="list">
                <?php while($row = $sql->fetch_assoc()) :?>
                    <li>
                        <a><img src="../image/<?php echo $row["nama"].".jpg";?>" alt=""></a>
                        <span>
                            <?php echo "Nama : ".$row["nama_event"];?>
                            <br>
                            <?php echo "Jenis : ".$row["kode_event"];?>
                            <br>
                            <?php echo "Jenis : ".$row["tanggal_event"];?>
                            <br>
                            <?php echo "Jenis : ".$row["lokasi_event"];?>
                            <br>
                            <?php echo "Jenis : ".$row["keterangan"];?>
                        </span>
                    </li>
                <?php endwhile;?>
            </ul>
            <?php $sql->close();?>
        </div>
    </div>
    <div class="auto">
        <a href="#atas"><img src="../image/up.png" alt=""></a>
    </div>
</body>
</html>