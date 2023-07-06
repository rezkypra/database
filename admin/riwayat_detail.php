<?php

SESSION_START();

include '../konek.php';


if (isset($_SESSION['admin'])) {
	
	$IDTagihan = $_GET['IDTagihan'];


    $query = $konek->query("SELECT tagihan.*, total_bayar.Biayaadmin, total_bayar.TOTAL FROM `tagihan`,`total_bayar` WHERE tagihan.IDTagihan = total_bayar.IDTagihan AND tagihan.IDTagihan='".$IDTagihan."'");
	
    $num = $query->num_rows;

    if ($num == 1) {
        
        $row = $query->fetch_assoc();
    
    } else {

        header("location:riwayat+transaksi.php");
    
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

		<div class="content" style="width: 60%; display: block;text-align: center;line-height: 2;padding-bottom:20px;margin-left:100px;">
			<br><br>
			<h1 style="text-align: center;margin-bottom: 15px;margin-top:-50px;">Detail Tagihan Pelanggan <?=$IDTagihan?> </h1>
				<table style="width: 60%;;margin:auto" cellpadding="0" cellspacing="0" border="1px">
					<tr>
						<td style="width: 35%;font-weight:700;padding: 10px 20px;text-align: center;font-size: 15px;background-color: #9d8af2">ID Tagihan</td>
						<td style="width: 65%;padding: 10px 20px;text-align: center;background-color: #f07892"><?= $row['IDTagihan'] ?></td>
					</tr>
					<tr>
						<td style="width: 35%;font-weight:700;padding: 10px 20px;text-align: center;font-size: 15px;background-color: #9d8af2">ID Penggunaan</td>
						<td style="width: 65%;padding: 10px 20px;text-align: center;background-color: #f07892"><?= $row['IDPenggunaan'] ?></td>
					</tr>
					<tr>
						<td style="width: 35%;font-weight:700;padding: 10px 20px;text-align: center;font-size: 15px;background-color: #9d8af2">ID Pelanggan</td>
						<td style="width: 65%;padding: 10px 20px;text-align: center;background-color: #f07892"><?= $row['IDPelanggan'] ?></td>
					</tr>
                    <tr>
                        <td style="width: 35%;font-weight:700;padding: 10px 20px;text-align: center;font-size: 15px;background-color: #9d8af2">Bulan Tagihan</td>
                        <td style="width: 65%;padding: 10px 20px;text-align: center;background-color: #f07892"><?= $row['Bulan'] ?></td>
                    </tr>
					<tr>
						<td style="width: 35%;font-weight:700;padding: 10px 20px;text-align: center;font-size: 15px;background-color: #9d8af2">Tahun Tagihan</td>
						<td style="width: 65%;padding: 10px 20px;text-align: center;background-color: #f07892"><?= $row['Tahun'] ?></td>
					</tr>
					<tr>
						<td style="width: 35%;font-weight:700;padding: 10px 20px;text-align: center;font-size: 15px;background-color: #9d8af2">Jumlah Meter</td>
						<td style="width: 65%;padding: 10px 20px;text-align: center;background-color: #f07892"><?= $row['Jumlahmeter'] ?></td>
					</tr>
					<tr>
						<td style="width: 35%;font-weight:700;padding: 10px 20px;text-align: center;font-size: 15px;background-color: #74db98">Status Tagihan</td>
						<td style="width: 65%;padding: 10px 20px;text-align: center;background-color: #f07892"><?= $row['Status'] ?></td>
					</tr>
					<tr>
						<td style="width: 35%;font-weight:700;padding: 10px 20px;text-align: center;font-size: 15px;background-color: #e096cf">Biaya Admin</td>
						<td style="width: 65%;padding: 10px 20px;text-align: center;background-color: #f07892"><?= $row['Biayaadmin'] ?></td>
					</tr>
					<tr>
						<td style="width: 35%;font-weight:700;padding: 10px 20px;text-align: center;font-size: 15px;background-color: #6a6ce6">Sub Total</td>
						<td style="width: 65%;padding: 10px 20px;text-align: center;background-color: #f07892"><?= $row['sub_total'] ?></td>
					</tr>
					<tr>
						<td style="width: 35%;font-weight:700;padding: 10px 20px;text-align: center;font-size: 15px;background-color: #e87474">Total</td>
						<td style="width: 65%;padding: 10px 20px;text-align: center;background-color: #f07892"><?= $row['TOTAL'] ?></td>
					</tr>
				</table>

		</div>

	</div>
</body>
</html>
