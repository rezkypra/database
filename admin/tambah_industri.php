<?php
SESSION_START();

include '../konek.php';


if (isset($_SESSION['superadmin'])) {


} else {
	header("location:../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah IKM</title>
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
			<div class="pad-tambah" style="height: max-content;margin-top: -140px;">
			<h2>Tambah Data Industri</h2>
            <br><br>
      		<form action="industri_proses.php" method="POST">
			  <div style="margin-bottom: 25px;">
			  <br>
					<input type="text" name="kode_industri" required="true" style="font-weight:700;width: 40%;text-decoration: none;padding: 15px 10px;border-radius: 5px;border: 1px solid; margin-top: -30px; margin-left: -40%" autocomplete="off" placeholder="Kode Industri">
				</div>
				<div>
					<input type="text" name="nama_industri" required="true" style="font-weight:700;width: 70%;text-decoration: none;padding: 15px 10px;border-radius: 5px;border: 1px solid; margin-left: -10%; margin-top: -30px" autocomplete="off" placeholder="Nama Industri">
				</div>
				<div>
					<input type="text" name="nama_pemilik" required="true" style="font-weight:700;width: 70%;text-decoration: none;padding: 15px 10px;border-radius: 5px;border: 1px solid; margin-left: -10%; margin-top: 10px" autocomplete="off" placeholder="Nama Pemilik">
				</div>
				<div>
					<input type="text" name="kontak" required="true" style="font-weight:700;width: 40%;text-decoration: none;padding: 15px 10px;border-radius: 5px;border: 1px solid; margin-left: -40%; margin-top: 10px" autocomplete="off" placeholder="No Kontak">
				</div>
				<div>
					<textarea type="text" name="alamat_industri" required="true" style="font-weight:700;width: 70%;text-decoration: none;padding: 10px 10px;border-radius: 5px;border: 1px solid; margin-left: -10%; margin-top: 10px" autocomplete="off" placeholder="Alamat Industri"></textarea>
				</div>
				<div>
					<select name="kode_bidang" id="kode_bidang" style="border:1px solid;border-radius:5px;font-weight:700;width: 70%;text-decoration: none;padding: 7px 10px; margin-left: -10%; margin-top: 10px" required="true" autocomplete="off">
							<option value="">Pilih Nama Bidang</option>

							<?php 

								$query = $konek->query("SELECT * FROM bidang_ikm");

								while ($row = $query->fetch_assoc()) {
							?>
							<option value="<?= $row['kode_bidang'] ?>"><?= $row['nama_bidang'] ?></option>
									<?php } ?>

							</select>
				</div>
				<div style="text-align:center; margin-left: 40px; margin-right: 40px;  margin-top: 50px;">
					<button style="padding: 10px 20px;border: 1px solid;font-weight: bold;border-radius: 10px;font-size: 16px;background: rgb(30, 144, 89);color: whitesmoke; width: 30%;" name="tambah">Tambah</button>
				</div>
			</form>
			</div>
		</div>

	</div>

</body>
</html>