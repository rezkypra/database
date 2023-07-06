<?php

SESSION_START();

include '../konek.php';


if (isset($_SESSION['admin'])) {
	
	$query = "SELECT * FROM `tarif`";
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
	<title>Tarif</title>
	<link href="../css/index-admin.css" rel="stylesheet" type="text/css" />
    <style>
		
		* {
			font-family: 'Arial', sans-serif;
			margin: 0
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
				<div class="bg_slider act" style="padding: 15px 15px 15px 10px; text-align: center;margin: 20px;background: #3f41bf;color: white;border-radius: 10px;">
					Riwayat Transaksi
				</div>
			</a>
			<a href="tarif.php">
				<div class="bg_slider act" style="padding: 15px 15px 15px 10px; text-align: center;margin: 20px;background: #ebe771;color: black;">
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

		<div class="content" style="width: 85%; display: block;text-align: center;line-height: 2;overflow-y: auto; padding-bottom:20px">
            <br><br>
			<h1>Data Tarif</h1>
			<br>
			<div style="width: 95%;text-align: right;"><a href="tarif+tambah.php">Tambah Data Tarif</a></div>


			<table cellpadding="0" cellspacing="0" border="1px" style="border-color: black;width: 90%;margin:auto;text-align: center">
				<thead style="text-align: center;font-size: 16px;background-color: #51bfe0">
					<tr>
						<th>Kode Tarif</th>
						<th>Daya</th>
						<th>Tarif per kWH</th>
						<th>Action</th>

					</tr>
				</thead>
				<tbody style="font-size: 12px;background-color: #b1fad2">
				
					<?php foreach ($exc as $row): ?>
					
					<tr>
						<td style="padding-left: 15px;"><?= $row['KodeTarif'] ?></td>
						<td style="padding-left: 15px;"><?= $row['Daya'] ?></td>
						<td style="padding-left: 15px;"><?= $row['Tarifperkwh'] ?></td>
						<td style="text-align: center;display: flex;">
							<div style="width: 50%"><a href="tarif+edit.php?KodeTarif=<?= $row['KodeTarif'] ?>">Edit</a></div>
							<div style="width: 50%;border-left: 2px solid"><a href="tarif+hapus.php?KodeTarif=<?= $row['KodeTarif'] ?>">Hapus</a></div>
						</td>
					</tr>
					
					<?php endforeach ?>
				
				</tbody>
			</table>

		</div>

	</div>
</body>
</html>
