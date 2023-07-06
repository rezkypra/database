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
	
	$query = "SELECT ikm.*, bidang_ikm.nama_bidang, kecamatan.nama_kecamatan FROM `ikm`, bidang_ikm, kecamatan WHERE bidang_ikm.kode_bidang = ikm.kode_bidang AND kecamatan.kode_kecamatan = ikm.kode_kecamatan";
	$exc = $konek->query($query);
	// $query2 = "SELECT * FROM `akun`";
	// $exc2 = $konek->query($query2);

} else {
	header("location:../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Data IKM</title>
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
			<button type="submit" class="tambah-data"><a href="tambah_industri.php">+</a></button>
		</div>

		<!-- FILTER Data -->
		
		<div class="data" style="margin-top: -10px; background-color: white; width: 20%; padding: 10px; border-radius: 5px; border: 1px solid black">
			<h4 style="margin-top: 10px; text-align:center">Filter Data Berdasarkan Nama Bidang</h4>
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="get" style="margin-left: 10px; ">
			<select name="nama_bidang" id="">
				<?php
					$sql = mysqli_query($konek, "SELECT * FROM bidang_ikm GROUP BY nama_bidang");
					while ($data = mysqli_fetch_array($sql)) : 
				?>
				<option value="<?=$data['nama_bidang']?>" ><?=$data['nama_bidang'] ?></option>
				<br>
				<?php endwhile ?>
			</select>
			<br>
			<br>
				<input type="submit" name="pilih" value="Pilih" style="margin-left: 30px; width: 70px; background-color: #76cfa8; border: 1px black; padding: 5px">
			</form>
		</div>

		<div class="data" style="margin-left: 550px; margin-top: -145px; background-color: white; width: 22%; padding: 8px; border-radius: 5px; border: 1px solid black">
			<h4 style="margin-top: 10px; text-align:center">Filter Data Berdasarkan Lokasi Kecamatan</h4>
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="get" style="margin-left: 10px; ">
			<select name="nama_kecamatan" id="">
				<?php
					$sql = mysqli_query($konek, "SELECT * FROM kecamatan GROUP BY nama_kecamatan");
					while ($data = mysqli_fetch_array($sql)) : 
				?>
				<option value="<?=$data['nama_kecamatan']?>" ><?=$data['nama_kecamatan'] ?></option>
				<br>
				<?php endwhile ?>
			</select>
			<br>
			<br>
				<input type="submit" name="submit" value="Pilih" style="margin-left: 30px; width: 70px; background-color: #76cfa8; border: 1px black; padding: 5px">
			</form>
		</div>
           
		   <!-- Cari Data -->

		<div class="tabel-content">
    		<?php if (isset($_POST["cari"])) : ?>
        	<?php $keyword = $_POST["keyword"]; ?>
        	<?php $result = mysqli_query($konek, "SELECT ikm.*, bidang_ikm.nama_bidang, kecamatan.nama_kecamatan FROM `ikm`, bidang_ikm, kecamatan WHERE bidang_ikm.kode_bidang = ikm.kode_bidang AND kecamatan.kode_kecamatan = ikm.kode_kecamatan AND (kode_industri LIKE '%$keyword%' OR nama_industri LIKE '%$keyword%' OR nama_pemilik LIKE '%$keyword%' OR kontak LIKE '%$keyword%' OR alamat_industri LIKE '%$keyword%' OR nama_kecamatan LIKE '%$keyword%' OR nama_bidang LIKE '%$keyword%')"); ?>
			<h2 style="width: 70%;padding: 8px 20px;margin-left: 12%">Data IKM yang dicari</h2>
			<table cellpadding="0" cellspacing="0" style="width: 70%;margin-left: 12%;text-align: center">
				<tbody style="text-align: center;font-size: 12px;">
					<tr>
						<th>Kode Industri</th>
						<th>Nama Industri</th>
                        <th>Nama Pemilik</th>
                        <th>No Kontak</th>
                        <th>Alamat Industri</th>
						<th>Kecamatan</th>
						<th>Nama Bidang</th>
						<th>Action</th>

					</tr>
				</thead>
				<tbody style="font-size: 16px;">
				
					<?php error_reporting(0); ?>
               		<?php foreach ($result as $row) : ?>
					<tr>
						<td style="padding-left: 10px;"><?= $row['kode_industri'] ?></td>
						<td style="padding-left: 10px;"><?= $row['nama_industri'] ?></td>
                        <td style="padding-left: 10px;"><?= $row['nama_pemilik'] ?></td>
                        <td style="padding-left: 10px;"><?= $row['kontak'] ?></td>
                        <td style="padding-left: 10px;"><?= $row['alamat_industri'] ?></td>
						<td style="padding-left: 10px;"><?= $row['nama_kecamatan'] ?></td>
						<td style="padding-left: 10px;"><?= $row['nama_bidang'] ?></td>
						<td style="text-align: center;display: flex;">
							<div style="width: 50%;"><a href="edit_industri.php?kode_industri=<?= $row['kode_industri'] ?>"><img src="../image/edit.png" alt=""></a></div>
							<div style="width: 50%;"><a href="hapus_industri.php?kode_industri=<?= $row['kode_industri'] ?>"><img src="../image/delete.png" alt=""></a></div>
						</td>
					</tr>
					
					<?php endforeach ?>
				
				</tbody>
			</table>
			<?php endif; ?>
		</div>

		<!-- Hasil Filter Data -->
		
		<div class="tabel-content" style="margin-top: 5px; margin-bottom: 60px">
		<?php if (isset($_GET['pilih'])) : ?>
				<h2 style="width: 70%;padding: 8px 20px;margin-left: 12%">Data IKM berdasarkan bidang yang dipilih</h2>
				<table cellpadding="0" cellspacing="0" style="width: 70%;margin-left: 12%;text-align: center">
					<tbody style="text-align: center;font-size: 12px;">
						<tr>
							<th>Kode Industri</th>
							<th>Nama Industri</th>
							<th>Nama Pemilik</th>
							<th>No Kontak</th>
							<th>Alamat Industri</th>
							<th>Kecamatan</th>
							<th>Nama Bidang</th>
							<th>Action</th>

						</tr>
					</thead>
					<tbody style="font-size: 16px;">
					<?php 
						if (isset($_GET['nama_bidang'])) {
							$nama_bidang = trim($_GET['nama_bidang']);
							$sql = mysqli_query($konek, "SELECT ikm.*, bidang_ikm.nama_bidang, kecamatan.nama_kecamatan FROM ikm, bidang_ikm, kecamatan WHERE bidang_ikm.kode_bidang = ikm.kode_bidang AND kecamatan.kode_kecamatan = ikm.kode_kecamatan AND (nama_bidang = '$nama_bidang')");
						}
					?>
						<?php error_reporting(0); ?>
						<?php foreach ($sql as $row) : ?>
						<tr>
							<td style="padding-left: 10px;"><?= $row['kode_industri'] ?></td>
							<td style="padding-left: 10px;"><?= $row['nama_industri'] ?></td>
							<td style="padding-left: 10px;"><?= $row['nama_pemilik'] ?></td>
							<td style="padding-left: 10px;"><?= $row['kontak'] ?></td>
							<td style="padding-left: 10px;"><?= $row['alamat_industri'] ?></td>
							<td style="padding-left: 10px;"><?= $row['nama_kecamatan'] ?></td>
							<td style="padding-left: 10px;"><?= $row['nama_bidang'] ?></td>
							<td style="text-align: center;display: flex;">
								<div style="width: 50%;"><a href="edit_industri.php?kode_industri=<?= $row['kode_industri'] ?>"><img src="../image/edit.png" alt=""></a></div>
								<div style="width: 50%;"><a href="hapus_industri.php?kode_industri=<?= $row['kode_industri'] ?>"><img src="../image/delete.png" alt=""></a></div>
						</td>
						</tr>
						
						<?php endforeach ?>
					
					</tbody>
				</table>
				<?php endif; ?>
		</div>

		<!-- Hasil Filter Data -->
		
		<div class="tabel-content" style="margin-top: 5px; margin-bottom: 60px">
		<?php if (isset($_GET['submit'])) : ?>
				<h2 style="width: 70%;padding: 8px 20px;margin-left: 12%">Data IKM berdasarkan lokasi kecamatan yang dipilih</h2>
				<table cellpadding="0" cellspacing="0" style="width: 70%;margin-left: 12%;text-align: center">
					<tbody style="text-align: center;font-size: 12px;">
						<tr>
							<th>Kode Industri</th>
							<th>Nama Industri</th>
							<th>Nama Pemilik</th>
							<th>No Kontak</th>
							<th>Alamat Industri</th>
							<th>Kecamatan</th>
							<th>Nama Bidang</th>
							<th>Action</th>

						</tr>
					</thead>
					<tbody style="font-size: 16px;">
					<?php 
						if (isset($_GET['nama_kecamatan'])) {
							$nama_kecamatan = trim($_GET['nama_kecamatan']);
							$sql = mysqli_query($konek, "SELECT ikm.*, bidang_ikm.nama_bidang, kecamatan.nama_kecamatan FROM ikm, bidang_ikm, kecamatan WHERE bidang_ikm.kode_bidang = ikm.kode_bidang AND kecamatan.kode_kecamatan = ikm.kode_kecamatan AND (nama_kecamatan = '$nama_kecamatan')");
						}
					?>
						<?php error_reporting(0); ?>
						<?php foreach ($sql as $row) : ?>
						<tr>
							<td style="padding-left: 10px;"><?= $row['kode_industri'] ?></td>
							<td style="padding-left: 10px;"><?= $row['nama_industri'] ?></td>
							<td style="padding-left: 10px;"><?= $row['nama_pemilik'] ?></td>
							<td style="padding-left: 10px;"><?= $row['kontak'] ?></td>
							<td style="padding-left: 10px;"><?= $row['alamat_industri'] ?></td>
							<td style="padding-left: 10px;"><?= $row['nama_kecamatan'] ?></td>
							<td style="padding-left: 10px;"><?= $row['nama_bidang'] ?></td>
							<td style="text-align: center;display: flex;">
								<div style="width: 50%;"><a href="edit_industri.php?kode_industri=<?= $row['kode_industri'] ?>"><img src="../image/edit.png" alt=""></a></div>
								<div style="width: 50%;"><a href="hapus_industri.php?kode_industri=<?= $row['kode_industri'] ?>"><img src="../image/delete.png" alt=""></a></div>
						</td>
						</tr>
						
						<?php endforeach ?>
					
					</tbody>
				</table>
				<?php endif; ?>
		</div>


		<div class="tabel-content" style="margin-bottom: 60px;">
			<h2 style="width: 70%;padding: 8px 20px;margin-left: 12%">Data Industri</h2>
			<table cellpadding="0" cellspacing="0" style="width: 70%;margin-left: 12%;text-align: center">
				<tbody style="text-align: center;font-size: 12px;">
					<tr>
						<th>Kode Industri</th>
						<th>Nama Industri</th>
                        <th>Nama Pemilik</th>
                        <th>No Kontak</th>
                        <th>Alamat Industri</th>
						<th>Kecamatan</th>
						<th>Nama Bidang</th>
						<th>Action</th>

					</tr>
				</thead>
				<tbody style="font-size: 16px;">
				
					<?php foreach ($exc as $row): ?>
					
					<tr>
						<td style="padding-left: 10px;"><?= $row['kode_industri'] ?></td>
						<td style="padding-left: 10px;"><?= $row['nama_industri'] ?></td>
                        <td style="padding-left: 10px;"><?= $row['nama_pemilik'] ?></td>
                        <td style="padding-left: 10px;"><?= $row['kontak'] ?></td>
                        <td style="padding-left: 10px;"><?= $row['alamat_industri'] ?></td>
						<td style="padding-left: 10px;"><?= $row['nama_kecamatan'] ?></td>
						<td style="padding-left: 10px;"><?= $row['nama_bidang'] ?></td>
						<td style="text-align: center;display: flex;">
							<div style="width: 50%;"><a href="edit_industri.php?kode_industri=<?= $row['kode_industri'] ?>"><img src="../image/edit.png" alt=""></a></div>
							<div style="width: 50%;"><a href="hapus_industri.php?kode_industri=<?= $row['kode_industri'] ?>"><img src="../image/delete.png" alt=""></a></div>
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
