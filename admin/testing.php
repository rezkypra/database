<?php

SESSION_START();

	include '../konek.php';


	if (isset($_SESSION['admin'])) {
		
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Data Event</title>
	<link href="../css/index-admin.css" rel="stylesheet" type="text/css" />
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
					<li>Administrator
					<ul>
						<li><a href="../logout.php">Logout</a></li>
					</ul>
					</li>
				</div>
		</div>

        <div class="form-konten">
			<div class="pad-tambah" style="height: max-content;">
			<h2>Detail Event <?= $row['nama_event'] ?> </h2>
            <br><br>
            <table style="width: 60%;overflow-x: scroll;margin:auto" cellpadding="0" cellspacing="0" border="1px">
					<tr>
						<td style="width: 35%;font-weight:700;padding: 10px 20px;text-align: center;font-size: 15px;background-color: #f0b971">Kode Event :</td>
						<td style="width: 45%;padding: 10px 20px;text-align: center;background-color: #71c6f0"><?= $row['kode_event'] ?></td>
					</tr>
                    <tr>
                        <td style="width: 35%;font-weight:700;padding: 10px 20px;text-align: center;font-size: 15px;background-color: #f0b971">Nama Event :</td>
                        <td style="width: 65%;padding: 10px 20px;text-align: center;background-color: #71c6f0"><?= $row['nama_event'] ?></td>
                    </tr>
					<tr>
						<td style="width: 35%;font-weight:700;padding: 10px 20px;text-align: center;font-size: 15px;background-color: #f0b971">Tanggal Event :</td>
						<td style="width: 65%;padding: 10px 20px;text-align: center;background-color: #71c6f0"><?= $row['tanggal_event'] ?></td>
					</tr>
					<tr>
						<td style="width: 35%;font-weight:700;padding: 10px 20px;text-align: center;font-size: 15px;background-color: #f0b971">Lokasi Event :</td>
						<td style="width: 65%;padding: 10px 20px;text-align: center;background-color: #71c6f0"><?= $row['lokasi_event'] ?></td>
					</tr>
					<tr>
						<td style="width: 35%;font-weight:700;padding: 10px 20px;text-align: center;font-size: 15px;background-color: #f0b971">Keterangan :</td>
						<td style="width: 65%;padding: 10px 20px;text-align: center;background-color: #71c6f0"><?= $row['keterangan'] ?></td>
					</tr>
                    <tr>
						<td style="width: 35%;font-weight:700;padding: 20px 10px;text-align: center;font-size: 15px;background-color: #f0b971">Dokumentasi :</td>
						<td style="width: 65%;padding: 50px 20px;text-align: center;background-color: #71c6f0"><img src="../image/<?php echo $row['gambar'].".jpg";?>" alt=""></td>
					</tr>
				</table>
		</div>

	</div>

        <footer style="position:fixed; width: 100%; height: 30px; bottom: 0">
		<p align="middle" style="margin-top: 7px;position:relative;">© 2022 Dinas Perindustrian Samarinda</p>
	</footer>
</body>
</html>