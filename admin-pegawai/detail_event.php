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
		
		$kodeevent = $_GET['kode_event'];
		$query = $konek->query("SELECT * FROM `event` WHERE kode_event = '".$kodeevent."'");
		$num = $query->num_rows;

		if ($num == 1) {
			
			$row = $query->fetch_assoc();
		
		} else {

			header("location:event.php");
		
		}

	} else {
		header("location:../login.php");
	}

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Data Event</title>
	<link href="../css/tambah_data.css" rel="stylesheet" type="text/css" />
</head>

<body>
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
						<li><a href="edit_profile.php">Edit Akun</a></li>
						<li><a href="../logout.php">Logout</a></li>
					</ul>
					</li>
				</div>
		</div>

        <div class="form-konten">
			<div class="pad-tambah" style="height: fit-content; margin-bottom: 30px">
			<h2>Detail Event <?= $row['nama_event'] ?> </h2>
            <br><br>
            <table style="width: 110%;overflow-x: scroll;margin-left: -25px" cellpadding="1" cellspacing="1" border="1px" >
					<tr>
						<td style="width: 30%;font-weight:700;padding: 10px 20px;text-align: center;font-size: 15px;background-color: white">Kode Event :</td>
						<td style="width: 40%;padding: 5px 20px;text-align: center;background-color: white"><?= $row['kode_event'] ?></td>
					</tr>
                    <tr>
                        <td style="width: 35%;font-weight:700;padding: 10px 20px;text-align: center;font-size: 15px;background-color: white">Nama Event :</td>
                        <td style="width: 65%;padding: 15px 20px;text-align: center;background-color: white"><?= $row['nama_event'] ?></td>
                    </tr>
					<tr>
						<td style="width: 35%;font-weight:700;padding: 10px 20px;text-align: center;font-size: 15px;background-color: white">Tanggal Event :</td>
						<td style="width: 65%;padding: 12px 20px;text-align: center;background-color: white"><?= $row['tanggal_event'] ?></td>
					</tr>
					<tr>
						<td style="width: 35%;font-weight:700;padding: 10px 20px;text-align: center;font-size: 15px;background-color: white">Lokasi Event :</td>
						<td style="width: 65%;padding: 20px 20px;text-align: center;background-color: white"><?= $row['lokasi_event'] ?></td>
					</tr>
					<tr>
						<td style="width: 35%;font-weight:700;padding: 10px 20px;text-align: center;font-size: 15px;background-color: white">Keterangan :</td>
						<td style="width: 65%;padding: 50px 20px;text-align: justify;background-color: white"><?= $row['keterangan'] ?></td>
					</tr>
                    <tr>
						<td style="width: 35%;font-weight:700;padding: 20px 10px;text-align: center;font-size: 15px;background-color: white">Dokumentasi :</td>
						<td style="width: 65%;padding: 20px 20px;text-align: center;background-color: white"><img src="../image/<?= $row['gambar'] ?>" alt="" width="300px" height="250px"></td>
					</tr>
				</table>
				<div style="text-align:center; margin-left: 40px; margin-right: 40px;  margin-top: 30px;">
					<button style="padding: 10px 20px;border: 1px solid;font-weight: bold;border-radius: 10px;font-size: 16px;background: #6aebbea0;color: brown; width: 30%;"><a href="event.php" style="text-decoration: none;">Kembali</a></button>
				</div>
		</div>

	</div>

</body>
</html>