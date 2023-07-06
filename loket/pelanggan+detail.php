<?php

SESSION_START();

	include '../konek.php';


	if (isset($_SESSION['loket'])) {
		
		$IDPelanggan = $_GET['IDPelanggan'];
		$query = $konek->query("SELECT * FROM pelanggan WHERE IDPelanggan = '".$IDPelanggan."'");
		$num = $query->num_rows;

		if ($num == 1) {
			
			$row = $query->fetch_assoc();
		
		} else {

			header("location:pelanggan.php");
		
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

		<div class="content" style="width: 60%; display: block;text-align: center;line-height: 2;padding-bottom:20px;margin-left:100px;">
			<br><br>
			<h1 style="text-align: center;margin-bottom: 25px">Detail Pelanggan <?= $row['Nama'] ?> </h1>
				<table style="width: 60%;overflow-x: scroll;margin:auto" cellpadding="0" cellspacing="0" border="1px">
					<tr>
						<td style="width: 35%;font-weight:700;padding: 10px 20px;text-align: center;font-size: 15px;background-color: #f0b971">ID Pelanggan :</td>
						<td style="width: 45%;padding: 10px 20px;text-align: center;background-color: #71c6f0"><?= $row['IDPelanggan'] ?></td>
					</tr>
                    <tr>
                        <td style="width: 35%;font-weight:700;padding: 10px 20px;text-align: center;font-size: 15px;background-color: #f0b971">Nomor Meter :</td>
                        <td style="width: 65%;padding: 10px 20px;text-align: center;background-color: #71c6f0"><?= $row['NoMeter'] ?></td>
                    </tr>
					<tr>
						<td style="width: 35%;font-weight:700;padding: 10px 20px;text-align: center;font-size: 15px;background-color: #f0b971">Nama :</td>
						<td style="width: 65%;padding: 10px 20px;text-align: center;background-color: #71c6f0"><?= $row['Nama'] ?></td>
					</tr>
					<tr>
						<td style="width: 35%;font-weight:700;padding: 10px 20px;text-align: center;font-size: 15px;background-color: #f0b971">Alamat :</td>
						<td style="width: 65%;padding: 10px 20px;text-align: center;background-color: #71c6f0"><?= $row['Alamat'] ?></td>
					</tr>
					<tr>
						<td style="width: 35%;font-weight:700;padding: 10px 20px;text-align: center;font-size: 15px;background-color: #f0b971">KodeTarif :</td>
						<td style="width: 65%;padding: 10px 20px;text-align: center;background-color: #71c6f0"><?= $row['KodeTarif'] ?></td>
					</tr>
				</table>

		</div>

	</div>
</body>
</html>
