<?php
SESSION_START();

include '../konek.php';


if (isset($_SESSION['loket'])) {
	
	
	

} else {
	header("location:../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
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
			<a href="#">
				<div class="bg_slider act" style="padding: 15px 15px 15px 10px; text-align: center; margin: 20px;margin-top: -10px;">
					Dashboard
				</div>
			</a>
			<a href="pelanggan.php">
				<div class="bg_slider" style="padding: 15px 15px 15px 10px; text-align: center;margin: 20px;background: #c323fc;color: white;border-radius: 10px;">
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

		<div class="content" style="width: 85%;text-align: center;line-height: 2;">

			<img src="../image/pay.png" style="margin-right: 120px; width: 300px; float: right; margin-top: 100px">

			<h2>Selamat Datang <br> <p> LOKET</p>  Bekerja yang jujur <br> reward datang dari Tuhan YME.</h2>

		</div>

	</div>
</body>
</html>