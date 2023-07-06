<?php

SESSION_START();

	include '../konek.php';


	if (isset($_SESSION['superadmin'])) {
		
		$kodebidang = $_GET['kode_bidang'];
		$query = $konek->query("SELECT * FROM `bidang_ikm` WHERE kode_bidang = '".$kodebidang."'");
		$num = $query->num_rows;

		if ($num == 1) {
			
			$row = $query->fetch_assoc();
		
		} else {

			header("location:bidang_ikm.php");
		
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
				<li class="dropdown" style="margin-right: -165px">Administrator
				<ul class="dropdown-child">
					<li ><a href="../logout.php"  style="margin-bottom: -40px;">Logout</a></li>
				</ul>
				</li>
			</div>
		</div>

        <div class="form-konten">
			<div class="pad-tambah" style="height: fit-content; margin-bottom: 30px">
			<h2>Detail Bidang <?= $row['nama_bidang'] ?> </h2>
            <br><br>
            <table style="width: 110%;overflow-x: scroll;margin-left: -25px" cellpadding="1" cellspacing="1" border="1px" >
					<tr>
						<td style="width: 30%;font-weight:700;padding: 10px 20px;text-align: center;font-size: 15px;background-color: white">Kode Bidang :</td>
						<td style="width: 40%;padding: 5px 20px;text-align: center;background-color: white"><?= $row['kode_bidang'] ?></td>
					</tr>
                    <tr>
                        <td style="width: 35%;font-weight:700;padding: 10px 20px;text-align: center;font-size: 15px;background-color: white">Nama Bidang :</td>
                        <td style="width: 65%;padding: 15px 20px;text-align: center;background-color: white"><?= $row['nama_bidang'] ?></td>
                    </tr>
				</table>
				<div style="text-align:center; margin-left: 40px; margin-right: 40px;  margin-top: 30px;">
					<button style="padding: 10px 20px;border: 1px solid;font-weight: bold;border-radius: 10px;font-size: 16px;background: #6aebbea0;color: brown; width: 30%;"><a href="bidang_ikm.php" style="text-decoration: none;">Kembali</a></button>
				</div>
		</div>

	</div>

</body>
</html>