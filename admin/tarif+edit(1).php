<?php
SESSION_START();

include '../konek.php';

if (isset($_SESSION['admin'])) {
	
	if (isset($_SESSION['err'])) {
		$msg_err = $_SESSION['err'];
		unset($_SESSION['err']);
	}

	if ($_GET['KodeTarif']) {
		$KodeTarif = $_GET['KodeTarif'];
		$query = mysqli_query($konek, "SELECT * from tarif WHERE KodeTarif = '{$KodeTarif}'");
		foreach ($query as $row) {

			$KodeTarif                  =    $row['KodeTarif'];
			$vDaya                      =    $row['Daya'];
			$vTarifperkwh               =    $row['Tarifperkwh'];
		}
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
	<title>Edit Tarif</title>
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

		<div class="content" style="width: 80%; display: block;text-align: left;line-height: 2;overflow-y: scroll;padding-bottom:20px">
			<br><br>
			<h1 style="text-align: center;margin-bottom: 25px">Edit Data Tarif - <?= @$KodeTarif ?></h1>
			<form action="tarif+proses.php" method="POST">
				<table style="width: 60%;overflow-x: scroll;margin:auto" cellspacing="0">
					<tr style="display:none">
						<td style="width: 35%;padding: 10px 20px">Kode Tarif</td>
						<td style="width: 65%;padding: 10px 20px"><input type="hidden" name="KodeTarif" style="border:1px solid;border-radius:5px;font-weight:700;width: 100%;text-decoration: none;padding: 7px 10px;" required="true" autocomplete="off" value="<?= @$KodeTarif ?>"></td>
					</tr>
					<tr>
						<td style="width: 35%;padding: 10px 20px">Daya</td>
						<td style="width: 65%;padding: 10px 20px"><input type="text" name="Daya" style="border:1px solid;border-radius:5px;font-weight:700;width: 100%;text-decoration: none;padding: 7px 10px;" required="true" autocomplete="off" value="<?= @$vDaya ?>"></td>
					</tr>
					<tr>
						<td style="width: 35%;padding: 10px 20px">Tarif per kWH</td>
						<td style="width: 65%;padding: 10px 20px"><input type="text" name="Tarifperkwh" style="border:1px solid;border-radius:5px;font-weight:700;width: 100%;text-decoration: none;padding: 7px 10px;" required="true" autocomplete="off" value="<?= @$vTarifperkwh ?>"></td>
					</tr>

					<tr>
						<td colspan="2" style="width: 100%;padding: 10px 20px;padding-right: 0;text-align: right;">
							<button style="padding: 14px 31px;border: 1px solid;font-weight: 700;border-radius: 3px;font-size: 17px;background: #87c0e6;color:#225710;" name="edit">Update</button>
						</td>
					</tr>
				</table>
			</form>

		</div>

	</div>

</body>

</html>