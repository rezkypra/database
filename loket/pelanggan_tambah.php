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
    <title>Tambah Pelanggan</title>
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
				<div class="bg_slider " style="padding: 15px 15px 15px 10px; text-align: center;margin: 20px;background: #c323fc;color: white;border-radius: 10px;">
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

		<div class="content" style="width: 80%; display: block;text-align: left;line-height: 2;padding-bottom:20px">
		<br><br>
			<h1 style="text-align: center;margin-bottom: 25px">Tambah Pelanggan</h1>
      		<form action="pelanggan_proses.php" method="POST">
				<table style="width: 60%;overflow-x: scroll;margin:auto" cellspacing="0">
					<tr>
						<td style="width: 35%;padding: 10px 20px">ID Pelanggan</td>
						<td style="width: 65%;padding: 10px 20px"><input type="text" name="IDPelanggan" style="border:1px solid;border-radius:5px;font-weight:700;width: 100%;text-decoration: none;padding: 7px 10px;" required="true" autocomplete="off"></td>
					</tr>
					<tr>
						<td style="width: 35%;padding: 10px 20px">Nama</td>
						<td style="width: 65%;padding: 10px 20px"><input type="text" name="Nama" style="border:1px solid;border-radius:5px;font-weight:700;width: 100%;text-decoration: none;padding: 7px 10px;" required="true" autocomplete="off"></td>
					</tr>
					<tr>
						<td style="width: 35%;padding: 10px 20px">Nomor Meter</td>
						<td style="width: 65%;padding: 10px 20px"><input type="text" name="NoMeter" style="border:1px solid;border-radius:5px;font-weight:700;width: 100%;text-decoration: none;padding: 7px 10px;" required="true" autocomplete="off"></td>
					</tr>
					<tr>
						<td style="width: 35%;padding: 10px 20px">Alamat</td>
						<td style="width: 65%;padding: 10px 20px"><input type="text" name="Alamat" style="border:1px solid;border-radius:5px;font-weight:700;width: 100%;text-decoration: none;padding: 7px 10px;" required="true" autocomplete="off"></td>
					</tr>
					<tr>
						<td style="width: 35%;padding: 10px 20px">Daya</td>
                        <td style="width: 65%;padding: 10px 20px;padding-right: 0">
							<select name="KodeTarif" id="KodeTarif" style="border:1px solid;border-radius:5px;font-weight:700;width: 100%;text-decoration: none;padding: 7px 10px;" required="true" autocomplete="off">
								<option value="">Pilih Daya (satuan kWH)</option>

								<?php 

									$query = $konek->query("SELECT * FROM tarif");

									while ($row = $query->fetch_assoc()) {
								 ?>
								<option value="<?= $row['KodeTarif'] ?>"><?= $row['Daya'] ?></option>
									<?php } ?>

							</select>
                        </td>
                    </tr>
					<tr>
						<td colspan="2" style="width: 100%;padding: 10px 20px;padding-right: 0;text-align: right;">
							<button style="padding: 14px 31px;border: 1px solid;font-weight: 700;border-radius: 3px;font-size: 17px;background: #e3c454;color:#225710;" name="tambah">Tambah</button>
						</td>
					</tr>
				</table>
			</form>

		</div>

	</div>

</body>
</html>