<?php
SESSION_START();

include '../konek.php';

if (!isset($_SESSION['admin'])) {
    $_SESSION['msg'] = "You have to log in first";
    header('location: login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['admin']);
    header("location: login.php");
}

else if (isset($_SESSION['admin'])) {
	
	if (isset($_SESSION['err'])) {
		$msg_err = $_SESSION['err'];
		unset($_SESSION['err']);
	}

	if ($_GET['kode_event']) {
		$kodeevent = $_GET['kode_event'];
		$query = mysqli_query($konek, "SELECT * from `event` WHERE `kode_event` = '{$kodeevent}'");
		foreach ($query as $row) {

			$kodeevent                =    $row['kode_event'];
            $vnamaevent                 =   $row['nama_event'];
            $vtanggalevent                 =   $row['tanggal_event'];
            $vlokasievent                 =   $row['lokasi_event'];
			$vketerangan                 =   $row['keterangan'];
			$vgambar                 =   $row['gambar'];
            
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
    <title>Edit Event</title>
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
					<li class="dropdown"><?= $_SESSION['admin'] ?>
					<ul class="dropdown-child">
						<li  style="margin-top: -10px;margin-bottom: -20px;"><a href="edit_profile.php">Edit Akun</a></li>
						<li><a href="../logout.php">Logout</a></li>
					</ul>
					</li>
				</div>

			
		</div>


		<!-- Konten -->

		<div class="form-konten">
			<div class="pad-tambah" style="height: 1000px; margin-top: -120px; margin-bottom: 50px">
			<h2>Edit Data Event - <?= @$kodeevent ?></h2>
            <br><br>
      		<form action="event_proses.php" method="POST" enctype="multipart/form-data">
			  <div style="margin-bottom: 25px;">
			  	<br>
				  <p style="width: 35%;padding: 10px 20px; margin-top: -50px; margin-left: 20px; margin-bottom: 15px;color:darkslategray; font-weight:bold;font-size: 20px;font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Kode Event</p>
				  <input type="text" name="kode_event" required="true" style="font-weight:700;width: 40%;text-decoration: none;padding: 15px 10px;border-radius: 5px;border: 1px solid; margin-top: -40px; margin-left: -40%" autocomplete="off" value="<?= @$kodeevent ?>">
				</div>
				<div>
					<p style="width: 35%;padding: 10px 20px; margin-top: -20px; margin-left: 25px; margin-bottom: 15px;color:darkslategray; font-weight:bold;font-size: 20px;font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Nama Event</p>
					<input type="text" name="nama_event" required="true" style="font-weight:700;width: 70%;text-decoration: none;padding: 15px 10px;border-radius: 5px;border: 1px solid; margin-top: -40px;margin-left: -10%" autocomplete="off" value="<?= @$vnamaevent ?>">
				</div>
                <div>
					<p style="width: 35%;padding: 10px 20px; margin-top: 10px; margin-left: 25px; margin-bottom: 10px;color:darkslategray; font-weight:bold;font-size: 20px;font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Tanggal Event</p>
					<input type="date" name="tanggal_event" required="true" style="font-weight:700;width: 70%;text-decoration: none;padding: 15px 10px;border-radius: 5px;border: 1px solid; margin-top: -10px;margin-left: -10%" autocomplete="off" value="<?= @$vtanggalevent ?>">
				</div>
                <div>
					<p style="width: 35%;padding: 10px 20px; margin-top: 10px; margin-left: 25px; margin-bottom: 10px;color:darkslategray; font-weight:bold;font-size: 20px;font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Lokasi Event</p>
					<input type="text" name="lokasi_event" required="true" style="font-weight:700;width: 70%;text-decoration: none;padding: 15px 10px;border-radius: 5px;border: 1px solid; margin-top: -10px;margin-left: -10%" autocomplete="off" value="<?= @$vlokasievent ?>">
				</div>
				<div>
					<p style="width: 35%;padding: 10px 20px; margin-top: 10px; margin-left: 25px; margin-bottom: 10px;color:darkslategray; font-weight:bold;font-size: 20px;font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Keterangan</p>
					<textarea type="text" name="keterangan" style="font-weight:700;width: 70%;text-decoration: none;border-radius: 5px;border: 1px solid; margin-top: -10px;margin-left: -10%;text-align:justify"><?php echo htmlspecialchars($vketerangan); ?></textarea>
				</div>
				<div>
					<p style="width: 35%;padding: 10px 20px; margin-top: 10px; margin-left: 25px; margin-bottom: 10px;color:darkslategray; font-weight:bold;font-size: 20px;font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Dokumentasi</p>
					<img src="../image/<?= @$vgambar ?>" style ="width: 150px; height: 120px; margin-top: -15px; margin-left: -10px; margin-bottom: 20px; margin-right: 50px" />
					
						<input type="file" name="gambar" id="gambar" style="font-weight:700;width: 70%;text-decoration: none;padding: 15px 10px;border-radius: 5px;border: 1px solid; margin-top: -40px;margin-left: -20px" autocomplete="off">
					
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
			