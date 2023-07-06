<?php

include('../konek.php');



$IDTagihan = $_GET['IDTagihan'];


	$query = $konek->query("SELECT tagihan.*, total_bayar.Biayaadmin, total_bayar.TOTAL FROM `tagihan`,`total_bayar` WHERE tagihan.IDTagihan = total_bayar.IDTagihan AND tagihan.IDTagihan='".$IDTagihan."'");
	
    $num = $query->num_rows;

    if ($num == 1) {
        
        $row = $query->fetch_assoc();
    
    } else {

        header("location:riwayat+transaksi.php");
    
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cetak Invoice Pelanggan</title>
	<style>
		* {
			font-family: 'Arial', sans-serif;
			margin: 0
		}

		a {
			text-decoration: none;
			color: #225710;
			font-weight: 600;
			text-transform: uppercase;
		}

		.bg_slider:hover {
			color: #D6EBA8;
			cursor: pointer;
			background-position: -50% 100%;
		}

		.act {
			background: #4B783C;
			color: white
		}
	</style>
</head>

<body>
	<div style="width: 100%;display: flex;height: 100px">

		<!-- Konten -->
		<div class="content" style="width: 100%; display: block;text-align: left;line-height: 2;padding: 20px;">
			<div style="width: 103.2%;height:70px;background: #FFDE59;color: black;font-weight:750;margin-left:-20px;margin-top:-20px;">
				<div style="padding-top: 25px;padding-left: 30px;">
					<a href="pembayaran.php"><h1 style="text-align: center;margin-bottom: 15px;margin-top: -20px;">Struk Pembayaran Listrik Online - Electric Pay </h1></a>
			<table style="width: 45%;;margin:auto" cellpadding="0" cellspacing="0" border="1px">
					<tr>
						<td style="width: 30%;font-weight:700;padding: 10px 20px;text-align: center;font-size: 15px;background-color: #68f2d2">ID Tagihan</td>
						<td style="width: 60%;padding: 10px 20px;text-align: center"><?= $row['IDTagihan'] ?></td>
					</tr>
					<tr>
						<td style="width: 40%;font-weight:700;padding: 10px 20px;text-align: center;font-size: 15px;background-color: #68f2d2">ID Penggunaan</td>
						<td style="width: 60%;padding: 10px 20px;text-align: center"><?= $row['IDPenggunaan'] ?></td>
					</tr>
					<tr>
						<td style="width: 40%;font-weight:700;padding: 10px 20px;text-align: center;font-size: 15px;background-color: #68f2d2">ID Pelanggan</td>
						<td style="width: 60%;padding: 10px 20px;text-align: center"><?= $row['IDPelanggan'] ?></td>
					</tr>
					<tr>
						<td style="width: 40%;font-weight:700;padding: 10px 20px;text-align: center;font-size: 15px;background-color: #68f2d2">Bulan Tagihan</td>
						<td style="width: 60%;padding: 10px 20px;text-align: center"><?= $row['Bulan'] ?></td>
					</tr>
					<tr>
						<td style="width: 40%;font-weight:700;padding: 10px 20px;text-align: center;font-size: 15px;background-color: #68f2d2">Tahun Tagihan</td>
						<td style="width: 60%;padding: 10px 20px;text-align: center"><?= $row['Tahun'] ?></td>
					</tr>
					<tr>
						<td style="width: 40%;font-weight:700;padding: 10px 20px;text-align: center;font-size: 15px;background-color: #68f2d2">Jumlah Meter</td>
						<td style="width: 60%;padding: 10px 20px;text-align: center"><?= $row['Jumlahmeter'] ?></td>
					</tr>
					<tr>
						<td style="width: 40%;font-weight:700;padding: 10px 20px;text-align: center;font-size: 15px;background-color: #68f2d2">Status Tagihan</td>
						<td style="width: 60%;padding: 10px 20px;text-align: center"><?= $row['Status'] ?></td>
					</tr>
					<tr>
						<td style="width: 40%;font-weight:700;padding: 10px 20px;text-align: center;font-size: 15px;background-color: #2edff0">Sub Total</td>
						<td style="width: 60%;padding: 10px 20px;text-align: center"><?= $row['sub_total'] ?></td>
						<?php $subtotal = $row['sub_total'] ?>
					</tr>
					<tr>
						<td style="width: 40%;font-weight:700;padding: 10px 20px;text-align: center;font-size: 15px;background-color: #4694d4">Biaya Admin</td>
						<td style="width: 60%;padding: 10px 20px;text-align: center"><?= $row['Biayaadmin'] ?></td>
					</tr>
					<tr>
						<td style="width: 40%;font-weight:700;padding: 10px 20px;text-align: center;font-size: 15px;background-color: #e9f266">Total</td>
						<td style="width: 60%;padding: 10px 20px;text-align: center"><?= $row['TOTAL'] ?></td>
					</tr>

			</table>
		</div>
		<script>
		window.print();
	</script>

	</div>
		</div>
</body>
</html>