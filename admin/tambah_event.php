<?php
SESSION_START();

include '../konek.php';


if (isset($_SESSION['superadmin'])) {
	
	$query = mysqli_query($konek, "SELECT * FROM `event`");
	

} else {
	header("location:../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Event</title>
	<link href="../css/tambah_data.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <!-- <div style="width: 80%;height:70px;background: #FFDE59;color: black;font-weight:750;float:right">
		<div style="padding-top: 27px;padding-left: 30px;">
			E-INDUSTRI - MANAJEMEN DINAS PERINDUSTRIAN SAMARINDA
		</div>
	</div> -->

		<!-- Navbar -->
		<div class="header-admin">
			<div class="corner-header">
				<li class="logo-admin"><img src="../image/dinas_kaltim.png" alt="" style="width: 50px;"></li>
            	<ul class="title-app">E-Industri</ul>
            	<ul class="navbar-admin">
                	<li><a href="admin-dashboard.php">Dashboard</a></li>
               		<li><a href="bidang_ikm.php">Bidang IKM</a></li>
                	<li><a href="industri.php">Industri</a></li>
                	<li><a href="event.php">Event</a></li>
					<li><a href="akun.php">Akun</a></li>
				</ul>
			</div>
            	
			<div class="ikon-profil">
				<img src="../image/worker.png">
				<li>Administrator
				<ul>
					<li><a href="../logout.php">Logout</a></li>
				</ul>
				</li>
			</div>

			
		</div>
        
        <!-- Konten -->

		<div class="form-konten">
			<div class="pad-tambah" style="height: max-content;">
			<h2>Tambah Data Event</h2>
            <br><br>
      		<form action="event_proses.php" method="POST"  enctype="multipart/form-data">
			  <div style="margin-bottom: 5px;">
					<input type="text" name="kode_event" required="true" style="font-weight:700;width: 40%;text-decoration: none;padding: 15px 10px;border-radius: 5px;border: 1px solid; margin-top: -50px; margin-left: -40%" autocomplete="off" placeholder="Kode Event">
				</div>
				<div>
					<input type="text" name="nama_event" required="true" style="font-weight:700;width: 70%;text-decoration: none;padding: 15px 10px;border-radius: 5px;border: 1px solid; margin-top: 10px; margin-left: -10%" autocomplete="off" placeholder="Nama Event">
				</div>
                <div>
					<input type="date" name="tanggal_event" required="true" style="font-weight:700;width: 70%;text-decoration: none;padding: 15px 10px;border-radius: 5px;border: 1px solid; margin-top: 10px; margin-left: -10%" autocomplete="off" placeholder="Tanggal">
				</div>
                <div>
					<input type="text" name="lokasi_event" required="true" style="font-weight:700;width: 70%;text-decoration: none;padding: 15px 10px;border-radius: 5px;border: 1px solid; margin-top: 10px; margin-left: -10%" autocomplete="off" placeholder="Lokasi Event">
				</div>
				<div>
					<textarea type="text" name="keterangan" required="true" style="font-weight:700;width: 70%;text-decoration: none;padding: 10px 10px;border-radius: 5px;border: 1px solid; margin-left: -10%; margin-top: 10px" autocomplete="off" placeholder="Penjelasan"></textarea>
				</div>
				<div>
					<input type="file" name="gambar" id="gambar" required="true" style="font-weight:700;width: 70%;text-decoration: none;padding: 15px 10px;border-radius: 5px;border: 1px solid; margin-top: 10px; margin-left: -10%" autocomplete="off" placeholder="Masukkan Gambar">
				</div>
				<div style="text-align:center; margin-left: 40px; margin-right: 40px;  margin-top: 20px;">
					<button style="padding: 10px 20px;border: 1px solid;font-weight: bold;border-radius: 10px;font-size: 16px;background: rgb(30, 144, 89);color: whitesmoke; width: 30%;" name="tambah">Tambah</button>
				</div>
			</form>
			</div>
		</div>

	</div>

</body>
</html>
