<?php

SESSION_START();

include '../konek.php';


if (isset($_SESSION['loket'])) {
	
	$query = "SELECT * FROM `pelanggan`";
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
	<title>Pelanggan</title>
	<link href="../css/index-loket.css" rel="stylesheet" type="text/css" />
    <style>
		* {
			font-family: 'Arial', sans-serif;
			margin: 0
		}
	</style>
</head>
<body>
<div style="width: 99.8%;display: flex;height: 110%;background: #54f785;position:fixed">	
		
		<!-- Sidebar -->
		<div style="width: 15%;display: block;border-right: 2px solid;background: #38e9f2">
		<img src="../image/electripay.png" alt="" style="margin-left: 15px; margin-top: -10px;width: 150px;">
			<a href="loket-dashboard.php">
				<div class="bg_slider" style="padding: 15px 15px 15px 10px; text-align: center; margin: 20px;margin-top: -10px;background: #c323fc;color: white;border-radius: 10px;">
					Dashboard
				</div>
			</a>
			<a href="pelanggan.php">
				<div class="bg_slider act" style="padding: 15px 15px 15px 10px; text-align: center;margin: 20px;">
					Pelanggan
				</div>
			</a>
			<a href="penggunaan.php">
				<div class="bg_slider" style="padding: 15px 15px 15px 10px; text-align: center;margin: 20px;background: #c323fc;color: white;border-radius: 10px;">
					Penggunaan
				</div>
			</a>
			<a href="tagihan.php">
				<div class="bg_slider" style="padding: 15px 15px 15px 10px; text-align: center;margin: 20px;background: #c323fc;color: white;border-radius: 10px;">
					Tagihan
				</div>
			</a>
			<a href="pembayaran.php">
				<div class="bg_slider" style="padding: 15px 15px 15px 10px; text-align: center;margin: 20px;background: #c323fc;color: white;border-radius: 10px;">
					Pembayaran
				</div>
			</a>
			<a href="tarif.php">
				<div class="bg_slider" style="padding: 15px 15px 15px 10px; text-align: center;margin: 20px;background: #c323fc;color: white;border-radius: 10px;">
				Tarif
				</div>
			</a>
			<!-- <a href="ubah-sandi.php"> -->
				<div class="bg_slider" style="padding: 20px 10px 15px 20px;">
				 
				</div>
			</a>
			<a href="../logout.php">
				<div class="bg_slider" style="padding: 15px 15px 15px 10px; text-align: center;margin: 20px;background: #f04164;color: white;border-radius: 10px;margin-top: -5px;">
					Logout
				</div>
			</a>
		</div>

		<!-- Konten -->

		<div class="content" style="width: 85%; display: block;text-align: center;line-height: 2;overflow-y: scroll;padding-bottom:20px">
            <br><br>
			<h1>Data Pelanggan</h1>
			<div style="width: 95%;text-align: right;"><a href="pelanggan_tambah.php">Tambah Pelanggan Baru</a></div>
			
			<table cellpadding="0" cellspacing="0" border="1px" style="border-color: black;width: 90%;margin:auto;text-align: center">
				<thead style="text-align: center;font-size: 16px;background-color: #de6949">
					<tr>
						<th>ID Pelanggan</th>
						<th>Nama Pelanggan</th>
						<th>Alamat</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody style="font-size: 12.5px;background-color: #ebed82">
				
					<?php foreach ($exc as $row): ?>
					
					<tr>
						<td style="padding-left: 15px;"><?= $row['IDPelanggan'] ?></td>
						<td style="padding-left: 15px;"><?= $row['Nama'] ?></td>
						<td style="padding-left: 15px;"><?= $row['Alamat'] ?></td>
						<td style="text-align: center;display: flex;">
							<div style="width: 33.3%;border-right: 2px solid"><a href="pelanggan+detail.php?IDPelanggan=<?= $row['IDPelanggan'] ?>">Detail</a></div>
							<div style="width: 33.3%"><a href="pelanggan_edit.php?IDPelanggan=<?= $row['IDPelanggan'] ?>">Edit</a></div>
							<div style="width: 33.3%;border-left: 2px solid"><a href="pelanggan_hapus.php?IDPelanggan=<?= $row['IDPelanggan'] ?>">Hapus</a></div>
						</td>
					</tr>
					
					<?php endforeach ?>
				
				</tbody>
			</table>

		</div>

	</div>
</body>
</html>