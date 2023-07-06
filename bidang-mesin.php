<?php

include 'konek.php';
$query = "SELECT * FROM `ikm` WHERE `nama_bidang` = 'Mesin'" ;
$exc = $konek->query($query);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Bidang Mesin : E-Industri</title>
    <link href="css/index-data.css" rel="stylesheet" type="text/css" />
</head>

<body>

     <div class="topbar">
        <div class="judul">
            <li class="logo"><img src="image/dinas_kaltim.png" alt="" style="width: 12%;"></li>
            <ul class="app">E-Industri</ul>
            <ul class="navbar">
                <li><a href="index.php">Beranda</a></li>
                <li><a href="profil-web.php">Profil</a></li>
                <li class="dropdown" style="border-bottom: 0px;"><a href="">Bidang</a>
                    <ul class="dropdown-child">
                        <li><a href="bidang1.php">Bidang Industri Agro, Hasil Hutan, Kimia Bangunan</a></li>
                        <li><a href="bidang2.php">Bidang Industri Logam, Mesin, Perekayasaan, Elektronik, Alat Transportasi</a></li>
                    </ul>
                    </li>
                <li class="margin-top: -35px;margin-left: 200px;"><a href="acara.php">Acara & Berita</a></li> 
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

        <!-- Konten -->

    <div class="title-data">
        <h2>Data Industri Bidang Mesin</h2>
    </div> 

    <div class="data">
		<form method="post" action="">
            <input style="float:right; font-weight:700; width: 25%; text-decoration: none; padding: 10px 10px; border-radius: 5px; border-left: 5px solid rgb(63, 186, 127); margin-top: 50px; margin-right: -380px;" type="text" name="keyword" placeholder="Pencarian Data" autocomplete="off">
			<img src="image/search.png" alt="" style="float: right; width: 25px; margin-right: -370px; display:block; margin-top: 55px;">
            <button type="submit" name="cari" style="visibility:hidden;"></button>
        </form>
	</div>

	<div class="data" style="margin-left: 165px; margin-top: -50px; width: 22%; padding: 8px;">
			<h4 style="margin-top: -1px; margin-bottom: 15px; text-align:center">Filter Data Berdasarkan Lokasi Kecamatan</h4>
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="get" style="margin-left: 10px; ">
			<select name="nama_kecamatan" id="">
				<?php
					$sql = mysqli_query($konek, "SELECT * FROM ikm GROUP BY nama_kecamatan");
					while ($data = mysqli_fetch_array($sql)) : 
				?>
				<option value="<?=$data['nama_kecamatan']?>" ><?=$data['nama_kecamatan'] ?></option>
				<br>
				<?php endwhile ?>
			</select>
			<br>
				<input type="submit" name="submit" value="Pilih" style="margin-top: 5px; width: 50px; background-color: #76cfa8; border-radius: 5px; padding: 5px">
			</form>
		</div>

        <!-- Cari Data -->

    <div class="tabel-content">
    		<?php if (isset($_POST["cari"])) : ?>
        	<?php $keyword = $_POST["keyword"]; ?>
        	<?php $result = mysqli_query($konek, "SELECT * FROM `ikm` WHERE kode_industri LIKE '%$keyword%' OR nama_industri LIKE '%$keyword%' OR nama_pemilik LIKE '%$keyword%' OR kontak LIKE '%$keyword%' OR alamat_industri LIKE '%$keyword%' OR nama_kecamatan LIKE '%$keyword%' OR nama_bidang LIKE '%$keyword%'"); ?>
			<h2 style="width: 70%;padding: 8px 20px;margin-left: 12%">Data Industri yang anda cari</h2>
			<table cellpadding="0" cellspacing="0" style="width: 70%;margin-left: 12%;text-align: center">
				<tbody style="text-align: center;font-size: 12px;">
					<tr>
						<th>Kode Industri</th>
						<th>Nama Industri</th>
                        <th>Nama Pemilik</th>
                        <th>No Kontak</th>
                        <th>Alamat Industri</th>
						<th>Nama Kecamatan</th>
                    </tr>
                </tbody>
                
                <tbody style="font-size: 16px;">
				
					<?php error_reporting(0); ?>
               		<?php foreach ($result as $row) : ?>
					<tr>
						<td style="padding-left: 10px;"><?= $row['kode_industri'] ?></td>
						<td style="padding-left: 10px;"><?= $row['nama_industri'] ?></td>
                        <td style="padding-left: 10px;"><?= $row['nama_pemilik'] ?></td>
                        <td style="padding-left: 10px;"><?= $row['kontak'] ?></td>
                        <td style="padding-left: 10px;"><?= $row['alamat_industri'] ?></td>
						<td style="padding-left: 10px;"><?= $row['nama_kecamatan'] ?></td>
                    </tr>
					
					<?php endforeach ?>
				
				</tbody>
			</table>
			<?php endif; ?>
		</div>

		<!-- Hasil Filter Data -->
		
		<div class="tabel-content" style="margin-top: 5px; margin-bottom: 60px">
		<?php if (isset($_GET['submit'])) : ?>
				<h2 style="width: 70%;padding: 8px 20px;margin-left: 12%">Data IKM berdasarkan lokasi kecamatan yang dipilih</h2>
				<table cellpadding="0" cellspacing="0" style="width: 70%;margin-left: 12%;text-align: center">
					<tbody style="text-align: center;font-size: 12px;">
						<tr>
							<th>Kode Industri</th>
							<th>Nama Industri</th>
							<th>Nama Pemilik</th>
							<th>No Kontak</th>
							<th>Alamat Industri</th>
							<th>Kecamatan</th>
						</tr>
					</thead>
					<tbody style="font-size: 16px;">
					<?php 
						if (isset($_GET['nama_kecamatan'])) {
							$nama_kecamatan = trim($_GET['nama_kecamatan']);
							$sql = mysqli_query($konek, "SELECT * FROM ikm WHERE nama_kecamatan = '$nama_kecamatan'");
						}
					?>
						<?php error_reporting(0); ?>
						<?php foreach ($sql as $row) : ?>
						<tr>
							<td style="padding-left: 10px;"><?= $row['kode_industri'] ?></td>
							<td style="padding-left: 10px;"><?= $row['nama_industri'] ?></td>
							<td style="padding-left: 10px;"><?= $row['nama_pemilik'] ?></td>
							<td style="padding-left: 10px;"><?= $row['kontak'] ?></td>
							<td style="padding-left: 10px;"><?= $row['alamat_industri'] ?></td>
							<td style="padding-left: 10px;"><?= $row['nama_kecamatan'] ?></td>
						</tr>
						
						<?php endforeach ?>
					
					</tbody>
				</table>
				<?php endif; ?>
		</div>

        <div class="tabel-content">
			<table cellpadding="0" cellspacing="0" style="width: 70%;margin-left: 12%;text-align: center">
				<tbody style="text-align: center;font-size: 12px;">
					<tr>
						<th>Kode Industri</th>
						<th>Nama Industri</th>
                        <th>Nama Pemilik</th>
                        <th>No Kontak</th>
                        <th>Alamat Industri</th>
						<th>Kecamatan</th>
					</tr>
				</thead>
				<tbody style="font-size: 16px;">
				
					<?php foreach ($exc as $row): ?>
					
					<tr>
						<td style="padding-left: 10px;"><?= $row['kode_industri'] ?></td>
						<td style="padding-left: 10px;"><?= $row['nama_industri'] ?></td>
                        <td style="padding-left: 10px;"><?= $row['nama_pemilik'] ?></td>
                        <td style="padding-left: 10px;"><?= $row['kontak'] ?></td>
                        <td style="padding-left: 10px;"><?= $row['alamat_industri'] ?></td>
						<td style="padding-left: 10px;"><?= $row['nama_kecamatan'] ?></td>
					</tr>
					
					<?php endforeach ?>
				
				</tbody>
			</table>

		</div>

	</div>

    <div class="footer-distributed" style="margin-top: 100px">
        <div class="footer-left">
            <img src="image/kementrian perindustrian indonesia.png" style="width: 100px;">
            <img src="image/dinas_kaltim.png" style="width: 100px;">
				<h3>E-<span>Industri</span></h3>
				<p class="footer-links">
					<a href="#">Beranda</a>
					|
					<a href="#">Profil</a>
					|
					<a href="#">Berita</a>
					|
					<a href="#">Tentang Kami</a>
				</p>

				<p class="footer-company-name">© 2022 Dinas Perindustrian Samarinda.</p>
			</div>

			<div class="footer-center">
				<div>
					<i class="fa fa-map-marker"></i>
					  <p><span>Gedung Graha Ruhui Rahayu, Jl. Ir. H. Juanda No.81, Kota Samarinda, Kalimantan Timur</p>
				</div>

				<div>
					<i class="fa fa-phone"><img src="image/phone-call.png" alt="" style="margin-top: 10px; margin-left: 220px; width: 7%;"></i>
				</div>
                <p style="margin-top: -20px; margin-left: 200px;">(0541) 742159</p>
				<div>
					<i class="fa fa-envelope"><img src="image/email.png" alt="" style="margin-top: 10px; margin-left: 220px; width: 7%;" ></i>
				</div>
                <p style="margin-left: 150px;"><a href="mailto:disperin.samarinda@gmail.com?subject=Ini%20adalah%20judul%20email%20default&body=Hai%20nama%20saya%20">disperin.samarinda@gmail.com</a></p>
			</div>
			<div class="footer-right">
				<p class="footer-company-about" style="text-align: center;">
					<span>Visi Dinas Perindustrian Samarinda</span>
					Terwujudnya Sektor Industri yang Berdaya Saing sebagai Penggerak Ekonomi Masyarakat.</p>
				<div class="footer-icons" align="middle">
					<a class="social-media-icon" href="#"><i class="fab fa-facebook"><img src="image/facebook.png" style="width: 80%;"></i></a>
					<a class="social-media-icon" href="#"><i class="fa fa-twitter"><img src="image/twitter.png" style="width: 80%;"></i></a>
					<a class="social-media-icon" href="#"><i class="fa fa-instagram"><img src="image/instagram.png" style="width: 80%;"></i></a> 
					<a class="social-media-icon" href="#"><i class="fa fa-youtube"><img src="image/youtube.png" style="width: 80%;"></i></a>
				</div>
			</div>
        </div>
            </div>
        </div>
</body>
</html>
