<?php

SESSION_START();

include '../konek.php';


if (isset($_SESSION['admin'])) {
	
	$query = "SELECT pembayaran.*, total_bayar.TOTAL FROM `pembayaran`,`total_bayar` WHERE pembayaran.IDBayar = total_bayar.IDBayar";
	$exc = $konek->query($query);

} else {
	header("location:../login.php");
}
	// $query = "SELECT tagihan.IDtagihan, tagihan.IDPenggunaan, tagihan.Bulan AS BulanTagihan, tagihan.Tahun AS TahunTagihan, tagihan.Jumlahmeter, tagihan.Status, pembayaran.IDBayar, pembayaran.Tanggal AS Tanggalbayar, pembayaran.Bulanbayar, pembayaran.Biayaadmin   FROM `tagihan` LEFT JOIN `pembayaran` ON tagihan.IDTagihan=pembayaran.IDTagihan";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pelanggan</title>
	<link href="../css/index-admin.css" rel="stylesheet" type="text/css" />
    <style>
		* {
			font-family: 'Arial', sans-serif;
			margin: 0;
		}
	</style>
</head>
<body>

	<div style="width: 99.8%;display: flex;height: 110%;background: #ebe771;position:fixed">
		
		<!-- Sidebar -->
		<div style="width: 15%;display: block;border-right: 2px solid;background: #f5b56c">
			<img src="../image/electripay.png" alt="" style="margin-left: 15px; margin-top: -10px;width: 150px;">	
			<a href="admin-dashboard.php">
				<div class="bg_slider act" style="padding: 15px 15px 15px 10px; text-align: center;margin: 20px;background: #3f41bf;color: white;border-radius: 10px;">
					Dashboard
				</div>
			</a>
			<a href="riwayat+transaksi.php">
				<div class="bg_slider act" style="padding: 15px 15px 15px 10px; text-align: center;margin: 20px;background: #ebe771;color: black;">
					Riwayat Transaksi
				</div>
			<a href="tarif.php">
				<div class="bg_slider act" style="padding: 15px 15px 15px 10px; text-align: center;margin: 20px;background: #3f41bf;color: white;border-radius: 10px;">
					Tarif
				</div>
			</a>
			<a href="akun.php">
				<div class="bg_slider act" style="padding: 15px 15px 15px 10px; text-align: center;margin: 20px;background: #3f41bf;color: white;border-radius: 10px;">
					Akun
				</div>
			</a>
			
			</a><br><br><br><br><br>
			<a href="../logout.php">
                <div class="bg_slider act" style="padding: 15px 15px 15px 10px; text-align: center;margin: 20px;background: #3cc29e;color: white;border-radius: 10px;">
                    Logout
                </div>
            </a>
        </div>

		<!-- Konten -->

		<div class="content" style="width: 85%; display: block;text-align: center;line-height: 2;padding-bottom:20px">
            <br><br>
            <h1>Riwayat Pembayaran</h1>
            <br>
			
			<table cellpadding="0" cellspacing="0" border="1px" style="border-color: black;width: 90%;margin:auto;text-align: center">
				<thead style="text-align: center;font-size: 16px;background-color: #51bfe0">
					<tr>
						<th>ID Pembayaran</th>
						<th>ID Tagihan</th>
						<th>Tanggal Pembayaran</th>
						<th>Bulan Pembayaran</th>
						<th>Biaya Administrasi</th>
					</tr>
				</thead>
				<tbody style="font-size: 12px;background-color: #b1fad2">
				
					<?php foreach ($exc as $row): ?>
					
					<tr>
						<td style="padding-left: 15px;"><?= $row['IDBayar'] ?></td>
						<td style="padding-left: 15px;"><a style="color: RED;" href="riwayat_detail.php?IDTagihan=<?= $row['IDTagihan'] ?>"> <?= $row['IDTagihan'] ?> </a> </td>
						<td style="padding-left: 15px;"><?= $row['Tanggal'] ?></td>
						<td style="padding-left: 15px;"><?= $row['Bulanbayar'] ?></td>
						<td style="padding-left: 15px;"><?= $row['Biayaadmin'] ?></td>
						
					</tr>
					
					<?php endforeach ?>
				
				</tbody>
			</table>

		</div>

	</div>
</body>
</html>