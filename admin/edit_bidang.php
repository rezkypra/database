<?php
SESSION_START();

include '../konek.php';

if (isset($_SESSION['superadmin'])) {
	
	if (isset($_SESSION['err'])) {
		$msg_err = $_SESSION['err'];
		unset($_SESSION['err']);
	}

	if (isset($_GET['kode_bidang'])) {
		$kodebidang = $_GET['kode_bidang'];
		$query = mysqli_query($konek, "SELECT * from `bidang_ikm` WHERE `kode_bidang` = '{$kodebidang}'");
		foreach ($query as $row) {

			$kodebidang                =    $row['kode_bidang'];
            $vnamabidang                 =   $row['nama_bidang'];
		}
	}

} else {
	header("location:../login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Bidang</title>
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
			<div class="pad-tambah">
			<h2>Edit Data Bidang - <?php echo $kodebidang ?></h2>
            <br><br>
      		<form action="bidang_proses.php" method="POST">
			  <div style="margin-bottom: 25px;">
			  	<br>
				  <p style="width: 35%;padding: 10px 20px; margin-top: -30px; margin-left: 20px; margin-bottom: 15px;color:darkslategray; font-weight:bold;font-size: 20px;font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Kode Bidang</p>
				  <input type="text" name="kode_bidang" style="font-weight:700;width: 40%;text-decoration: none;padding: 15px 10px;border-radius: 5px;border: 1px solid; margin-top: -40px; margin-left: -40%" autocomplete="off" value="<?= $kodebidang ?>">
				</div>
				<div>
					<p style="width: 35%;padding: 10px 20px; margin-top: -20px; margin-left: 25px; margin-bottom: 15px;color:darkslategray; font-weight:bold;font-size: 20px;font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Nama Bidang</p>
					<input type="text" name="nama_bidang" required="true" style="font-weight:700;width: 70%;text-decoration: none;padding: 15px 10px;border-radius: 5px;border: 1px solid; margin-top: -40px;margin-left: -10%" autocomplete="off" value="<?= $vnamabidang ?>">
				</div>
                
				<div style="text-align:center; margin-left: 40px; margin-right: 40px;  margin-top: 30px;">
					<button style="padding: 10px 20px;border: 1px solid;font-weight: bold;border-radius: 10px;font-size: 16px;background: rgb(30, 144, 89);color: whitesmoke; width: 30%;" name="edit">Update</button>
				</div>
			</form>
			</div>
		</div>

	</div>

</body>
</html>
			