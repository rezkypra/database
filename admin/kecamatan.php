<?php

SESSION_START();

include '../konek.php';


if (isset($_SESSION['superadmin'])) {
	
	$query = "SELECT * FROM `kecamatan`";
	$exc = $konek->query($query);

} else {
	header("location:../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Data Bidang Industri</title>
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
				<li class="dropdown" style="margin-right: -165px">Administrator
				<ul class="dropdown-child">
					<li ><a href="../logout.php"  style="margin-bottom: -40px;">Logout</a></li>
				</ul>
				</li>
			</div>
		</div>

		<!-- Konten -->

		<div class="data">
			<form method="post" action="">
                <input style="font-weight:700; width: 80%; text-decoration: none; padding: 10px 10px; border-radius: 5px; border-left: 5px solid rgb(63, 186, 127); margin-top: -40px;" type="text" name="keyword" placeholder="Pencarian Data" autocomplete="off">
				<img src="../image/search.png" alt="" style="width: 25px; margin-left: 77%; display:block; margin-top: -32px;">
                <button type="submit" name="cari" style="visibility:hidden;"></button>
            </form>
		</div>
           
		<div class="tabel-content">
    		<?php if (isset($_POST["cari"])) : ?>
        	<?php $keyword = $_POST["keyword"]; ?>
        	<?php $result = mysqli_query($konek, "SELECT kode_kecamatan, nama_kecamatan FROM kecamatan WHERE kode_kecamatan LIKE '%$keyword%' OR nama_kecamatan LIKE '%$keyword%'"); ?>
			<h2>Data Bidang Industri</h2>
			<table cellpadding="0" cellspacing="0" style="width: 45%;margin-left: 25%;text-align: center">
				<tbody style="text-align: center;font-size: 16px;">
					<tr>
						<th>Kode Kecamatan</th>
						<th>Nama Kecamatan</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody style="font-size: 16px;">
				
					<?php error_reporting(0); ?>
               		<?php foreach ($result as $row) : ?>
					<tr>
						<td style="padding-left: 10px;"><?= $row['kode_kecamatan'] ?></td>
						<td style="padding-left: 10px;"><?= $row['nama_kecamatan'] ?></td>
						<td style="text-align: center;display: flex;">
							<div style="width: 50%; margin-left: 27px"><a href="detail_kecamatan.php?kode_kecamatan=<?= $row['kode_kecamatan'] ?>"><img src="../image/detail.png" alt=""></a></div>
						</td>
					</tr>
					
					<?php endforeach ?>
				
				</tbody>
			</table>
			<?php endif; ?>
		</div>

		<div class="tabel-content">
			<h2>Data Bidang Industri</h2>
			<table cellpadding="0" cellspacing="0" style="width: 45%;margin-left: 25%;text-align: center">
				<tbody style="text-align: center;font-size: 16px;">
					<tr>
						<th>Kode Bidang</th>
						<th>Nama Bidang</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody style="font-size: 16px;">
				
					<?php foreach ($exc as $row) : ?>
					
					<tr>
						<td style="padding-left: 10px;"><?= $row['kode_bidang'] ?></td>
						<td style="padding-left: 10px;"><?= $row['nama_bidang'] ?></td>
						<td style="text-align: center;display: flex;">
							<div style="width: 50%; margin-left: 27px"><a href="detail_bidang.php?kode_bidang=<?= $row['kode_bidang'] ?>"><img src="../image/detail.png" alt=""></a></div>
						</td>
					</tr>
					
					<?php endforeach ?>
				
				</tbody>
			</table>
		</div>

	</div>

	<footer style="position:fixed; width: 100%; height: 30px; bottom: 0">
		<p align="middle" style="margin-top: 7px;position:relative;">© 2022 Dinas Perindustrian Samarinda</p>
	</footer>
</body>
</html>