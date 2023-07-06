<?php

include 'konek.php';
    
$query = "SELECT * FROM `tarif`";
$exc = $konek->query($query);
    
?>
<!DOCTYPE html>
<html>
<head>
	<title>Electric Pay</title>
	<link href="css/index.css" rel="stylesheet" type="text/css" />
</head>
<body>

    <div class="topbar">
		<div class="judul">
            <li class="logo"><img src="image/electripay.png" alt=""></li>
            <ul>
			    <li><a href="index.php">Home</a></li>
                <li><a href="tarif.php">Tarif</a></li>
                <li><a href="about.php">About Us</a></li>
            </ul>
        </div> 
        <div class="logo-login">
            <a href="login.php">
				<button type="submit" class="login">
                <p>Login</p>
                </button>
            </a>
        </div>
    </div>

    <div class="container">
		<div class="konten-tarif">
            <br>
            <h2 style="margin-bottom: -50px;">Cek tarif listrik<br>terbaru disini<br></h2>
            <img src="image/tags.png" alt="">
            <br><br><br><br>
            <h1>Data Tarif per kWh</h1>
			<div class="konten"> 
                <table cellpadding="0" cellspacing="0" border="1px">
				<thead style="text-align: center;font-size: 25px;background-color: #d6915c">
					<tr>
						<th>Golongan Tarif Listrik</th>
						<th>Batas Daya</th>
						<th>Tarif per kWh</th>
						<!-- <th>&nbsp;</th> -->

					</tr>
				</thead>
				<tbody style="font-size: 26px;background-color: #de5d66;">
				
					<?php foreach ($exc as $row): ?>
					
					<tr>
						<td style="padding-left: 15px;"><?= $row['KodeTarif'] ?></td>
						<td style="padding-left: 15px;"><?= $row['Daya'] ?></td>
						<td style="padding-left: 15px;"><?= $row['Tarifperkwh'] ?></td>
						<!-- <td style="text-align: center;display: flex;">
							<div style="width: 50%"><a href="tarif+edit.php?KodeTarif=<?= $row['KodeTarif'] ?>"></a></div>
							<div style="width: 50%;border-left: 2px solid"><a href="tarif+hapus.php?KodeTarif=<?= $row['KodeTarif'] ?>">Hapus</a></div>
						</td> -->
					</tr>
					
					<?php endforeach ?>
				
				</tbody>
			</table>

			</div>
        </div>
	</div>