<?php

include 'konek.php';

?>


<!DOCTYPE html>
<html>

<head>
    <title>E-Industri</title>
    <link href="css/index.css" rel="stylesheet" type="text/css" />
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

   <div>
        <div class="pic-home">
            <img src="image/dinas_industri_2.jpg" >
        </div>
        <div class="container">
            <div class="content">
                <h2>Selamat datang di</h2>
                <span>E-Industri</span>
                <p>Industri bangkit dengan mengajak seluruh masyarakat</p>
                <p style="margin-top: -15px;font-size: 20px;color: rgb(55, 107, 150);margin-left: 50px;">untuk maju, lestari berbudaya, dan adil bagi semua</p>
                <div class="isi">
                    <img src="image/dinas_industri_3.jpg" alt="" style="width: 40%;">
 
                <!-- <form method="post" action="">
                    <input type="text" name="keyword" placeholder="ID Pelanggan" autocomplete="off" style="width:500px;">
                    <button type="submit" name="cari" style="visibility:hidden;"></button> -->
                </form>
                </div>
                <h1>Industri - industri yang ada di kota Samarinda</h1>
                    <button type="submit">
                        <a href="list-ikm.php" style="font-size: 15px; margin-top: 6px; margin-bottom: 10px; margin-right: 5px;">Selengkapnya</a>
                    </button>
            </div>
        </div>
        
        <div class="container-2">
            <div class="content-2">
            <h2>Event</h2>
            <ul class="list-event">
            <?php $sql = $konek->query('SELECT * from `event` limit 4'); ?>
            <?php while($row = $sql->fetch_assoc()) :?>
                <li>
                    <a href="detail_berita.php?kode_event=<?= $row['kode_event'] ?>">
                    <img src=image/<?= $row['gambar'] ?> style="width: 200px; height: 200px"/></a>
                    <span>
                    <?= $row['nama_event'] ?>
                    <br>
                    <p>Administrator | <?= date('D, j M Y', strtotime($row['tanggal_event']));  ?> </p>
                    <p> di <?= $row['lokasi_event'] ?> </p>
                    </span>
                </li>
            <?php endwhile; ?>
            </ul>
                <button type="submit">
                    <a href="acara.php" style="font-size: 15px; margin-top: 16px; margin-bottom: 10px; margin-right: 5px; margin-left: 5px; color: rgb(43, 120, 87); text-decoration: none">Selengkapnya</a>
                </button>
                <!-- <img src="image/dinas_industri_4.jpg">
                <p>Industri 1</p> -->
                <!-- <form method="post" action="">
                    <input type="text" name="keyword" placeholder="ID Pelanggan" autocomplete="off" style="width:500px;">
                    <button type="submit" name="cari" style="visibility:hidden;"></button> -->
                <!-- </form> -->
            </div>
        </div>

        <div class="footer-distributed">
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
   
            <!-- <img src="image/dinas_industri_4.jpg" style="width:20%; border-radius: 20px; margin-left: 300px; margin-top: -130px;">
            <p style="margin-top: 5px; font-size: 30px; color: rgb(52, 71, 65); margin-left: 31.1%; font-weight: bold; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Industri 2</p>
            <img src="image/dinas_industri_4.jpg" style="width:20%; border-radius: 20px; margin-left: 30px; margin-top: -70px;">
            <p>Industri 3</p>
            <img src="image/dinas_industri_4.jpg" style="width:20%; border-radius: 20px; margin-left: 30px; margin-top: -30px;">
            <p>Industri 4</p>
            -->
    
    
    
</body>

</html>