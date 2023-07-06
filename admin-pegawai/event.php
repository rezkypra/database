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
	
	$query = "SELECT * FROM `event`";
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
					<li class="dropdown"><?= $_SESSION['admin'] ?>
					<ul class="dropdown-child">
						<li  style="margin-top: -10px;margin-bottom: -20px;"><a href="edit_profile.php">Edit Akun</a></li>
						<li><a href="../logout.php">Logout</a></li>
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
			<button type="submit" class="tambah-data"><a href="tambah_event.php">+</a></button>
		</div>

            <!-- Cari Data -->

		<div class="tabel-content">
    		<?php if (isset($_POST["cari"])) : ?>
        	<?php $keyword = $_POST["keyword"]; ?>
        	<?php $result = mysqli_query($konek, "SELECT * FROM `event` WHERE kode_event LIKE '%$keyword%' OR nama_event LIKE '%$keyword%' OR tanggal_event LIKE '%$keyword%' OR lokasi_event LIKE '%$keyword%'"); ?>
			<h2 style="width: 65%;padding: 8px 20px;margin-left: 15%">Data Event</h2>
			<table cellpadding="0" cellspacing="0" style="width: 65%;margin-left: 15%;text-align: center">
				<tbody style="text-align: center;font-size: 12px;">
					<tr>
						<th>Kode Event</th>
						<th>Nama Event</th>
                        <th>Tanggal Event</th>
                        <th>Lokasi Event</th>
						<th>Action</th>

					</tr>
				</thead>
				<tbody style="font-size: 16px;">
				
					<?php error_reporting(0); ?>
               		<?php foreach ($result as $row) : ?>
					<tr>
						<td style="padding-left: 10px;"><?= $row['kode_event'] ?></td>
						<td style="padding-left: 10px;"><?= $row['nama_event'] ?></td>
                        <td style="padding-left: 10px;"><?= $row['tanggal_event'] ?></td>
                        <td style="padding-left: 10px;"><?= $row['lokasi_event'] ?></td>
						<td style="text-align: center;display: flex;">
							<div style="width: 50%;"><a href="edit_event.php?kode_event=<?= $row['kode_event'] ?>"><img src="../image/edit.png" alt=""></a></div>
							<div style="width: 50%;border-left: 2px solid"><a href="hapus_event.php?kode_event=<?= $row['kode_event'] ?>"><img src="../image/delete.png" alt=""></a></div>
						</td>
					</tr>
					
					<?php endforeach ?>
				
				</tbody>
			</table>
			<?php endif; ?>
		</div>

			<!-- Tabel Data -->

		<div class="tabel-content">
			<h2 style="width: 65%;padding: 8px 20px;margin-left: 15%">Data Event</h2>
			<table cellpadding="0" cellspacing="0" style="width: 65%;margin-left: 15%;text-align: center">
				<tbody style="text-align: center;font-size: 12px;">
					<tr>
						<th>Kode Event</th>
						<th>Nama Event</th>
                        <th>Tanggal Event</th>
                        <th>Lokasi Event</th>
						<th>Action</th>

					</tr>
				</thead>
				<tbody style="font-size: 16px;">
				
					<?php foreach ($exc as $row): ?>
					
					<tr>
						<td style="padding-left: 10px;"><?= $row['kode_event'] ?></td>
						<td style="padding-left: 10px;"><?= $row['nama_event'] ?></td>
                        <td style="padding-left: 10px;"><?= $row['tanggal_event'] ?></td>
                        <td style="padding-left: 10px;"><?= $row['lokasi_event'] ?></td>
						<td style="text-align: center;display: flex;">
							<div style="width: 50%"><a href="edit_event.php?kode_event=<?= $row['kode_event'] ?>"><img src="../image/edit.png" alt="" style="margin-left: -10px;"></a></div>
                            <div style="width: 55%;margin-left: 10px;"><a href="detail_event.php?kode_event=<?= $row['kode_event'] ?>"><img src="../image/detail.png" alt="" style="margin-left: -5px;"></a></div>
							<div style="width: 55%; margin-left: 5px;"><a href="hapus_event.php?kode_event=<?= $row['kode_event'] ?>"><img src="../image/delete.png" alt=""></a></div>
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