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
	<title>Bayar Tagihan</title>
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
				<div class="bg_slider act" style="padding: 15px 15px 15px 10px; text-align: center;margin: 20px;background: #c323fc;color: white;border-radius: 10px;">
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
				<div class="bg_slider act" style="padding: 15px 15px 15px 10px; text-align: center;margin: 20px;">
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
			<h1 style="text-align: center;margin-bottom: 25px">Bayar Tagihan Pelanggan</h1>
      		<form action="pembayaran_proses.php" method="POST">
				<table style="width: 60%;overflow-x: scroll;margin:auto" cellspacing="0">
					<tr>
						<td style="width: 35%;padding: 10px 20px">ID Pembayaran</td>
						<td style="width: 65%;padding: 10px 20px"><input type="text" name="IDBayar" style="border:1px solid;border-radius:5px;font-weight:700;width: 100%;text-decoration: none;padding: 7px 10px;" required="true" autocomplete="off"></td>
					</tr>
					<tr>
						<td style="width: 35%;padding: 10px 20px">ID Pelanggan</td>
                        <td style="width: 65%;padding: 10px 20px;padding-right: 0">
							<select name="IDTagihan" id="IDPelanggan" style="border:1px solid;border-radius:5px;font-weight:700;width: 100%;text-decoration: none;padding: 7px 10px;" required="true" autocomplete="off">
								<option value="">Pilih ID Pelanggan</option>

								<?php 

									$query = $konek->query("SELECT * FROM tagihan WHERE STATUS = 'Belum Lunas'");

									while ($row = $query->fetch_assoc()) {
								 ?>
								<option value="<?= $row['IDTagihan'] ?>"><?= $row['IDPelanggan'] ?>  -  <?= $row['Bulan']?></option>
									<?php } ?>

							</select>
                        </td>
                    </tr>
					<tr>
						<td style="width: 35%;padding: 10px 20px">Tanggal</td>
						<td style="width: 65%;padding: 10px 20px"><input type="date" name="Tanggal" style="border:1px solid;border-radius:5px;font-weight:700;width: 100%;text-decoration: none;padding: 7px 10px;" required="true" autocomplete="off"></td>
					</tr>
					<tr>
						<td style="width: 35%;padding: 10px 20px">Bulan Bayar</td>
						<td style="width: 65%;padding: 10px 20px;padding-right: 0">
							<select name="Bulanbayar" id="Bulan" style="border:1px solid;border-radius:5px;font-weight:700;width: 100%;text-decoration: none;padding: 7px 10px;" required="true" autocomplete="off">
									<option value="">Pilih Bulan Pembayaran</option>
									<option value="Januari">Januari</option>
									<option value="Februari">Februari</option>
									<option value="Maret">Maret</option>
									<option value="April">April</option>
									<option value="Mei">Mei</option>
									<option value="Juni">Juni</option>
									<option value="Juli">Juli</option>
									<option value="Agustus">Agustus</option>
									<option value="September">September</option>
									<option value="Oktober">Oktober</option>
									<option value="November">November</option>
									<option value="Desember">Desember</option>
							</select>
						</td>
					</tr>
					<tr>
						<td style="width: 35%;padding: 10px 20px">Biaya Administrasi</td>
						<td style="width: 65%;padding: 10px 20px"><input type="text" name="Biayaadmin" style="border:1px solid;border-radius:5px;font-weight:700;width: 100%;text-decoration: none;padding: 7px 10px;" required="true" autocomplete="off" value="2000"></td>

					</tr>
					<tr>
						<td colspan="2" style="width: 100%;padding: 10px 20px;padding-right: 0;text-align: right;">
							<button style="padding: 14px 31px;border: 1px solid;font-weight: 700;border-radius: 3px;font-size: 17px;background: #a4b5eb;color:#225710;" name="tambah">Bayar</button>
						</td>
					</tr>
				</table>
			</form>

		</div>

	</div>

</body>
</html>