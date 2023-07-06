<?php

include 'konek.php';
$query = "SELECT * FROM `event`" ;
$exc = $konek->query($query);
$kolom = 2;


?>

<!DOCTYPE html>
<html>

<head>
    <title>Acara dan Berita : E-Industri</title>
    <link href="css/index.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <div class="topbar" style="margin-top: -100px;">
        <div class="judul">
            <li class="logo"><img src="image/dinas_kaltim.png" alt="" style="width: 12%;"></li>
            <ul class="app">E-Industri</ul>
            <ul class="navbar">
                <li><a href="index.php">Beranda</a></li>
                <li><a href="profil-web.php">Profil</a></li>
                <li class="dropdown"><a href="">Bidang</a>
                    <ul class="dropdown-child">
                        <li><a href="bidang1.php">Bidang Industri Agro, Hasil Hutan, Kimia Bangunan</a></li>
                        <li><a href="bidang2.php">Bidang Industri Logam, Mesin, Perekayasaan, Elektronik, Alat Transportasi</a></li>
                    </ul>
                    </li>
                <li><a href="acara.php">Acara & Berita</a></li>
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

            <div class="title-event"> 
                <h2>Informasi Acara & Berita</h2>
                    <div class="data" style="margin-bottom: 10px; z-index: 20">
                        <form method="post" action="">
                            <input style="float:left; font-weight:700; width: 25%; text-decoration: none; padding: 10px 10px; border-radius: 5px; border-left: 5px solid rgb(63, 186, 127); margin: 10px 10px -10px 600px " type="text" name="keyword" placeholder="Pencarian Event & Berita" autocomplete="off">
                            <img src="image/search.png" alt="" style="float: left; width: 25px; margin-left: -3%; display:block; margin-top: 15px;">
                            <button type="submit" name="cari" style="visibility:hidden;"></button>
                        </form>
                    </div>

                    <div class="content-berita">
                        <div class="list-event" style="background-color: none; margin-top: -150px; display: inline-flex;">
                            <?php if (isset($_POST["cari"])) : ?>
                            <?php $keyword = $_POST["keyword"]; ?>
                            <?php $result = mysqli_query($konek, "SELECT * FROM `event` where kode_event like '%$keyword' OR nama_event LIKE '%$keyword%' OR tanggal_event LIKE '%$keyword%' OR lokasi_event LIKE '%$keyword%' "); ?>
                            <?php $jumlah = mysqli_num_rows($result); ?> 
                            <?php $total = mysqli_num_rows($exc); ?> 
                            <?php if($jumlah > 0) : ?>
                            <h2 style="width: 100%;padding: 8px 20px;text-align:center; margin-left: -10px;margin-bottom: -100px;position:absolute; color: #204f38; font-size: 20px"><?= $jumlah ?> dari <?= $total ?> data ditemukan</h2>
                            <?php while ($data = $result->fetch_assoc()) : ?>
                            <li style="margin-top: 250px; margin-left: 26px;">
                                <a href="detail_berita.php?kode_event=<?= $data['kode_event'] ?>">
                                <img src=image/<?= $data['gambar'] ?> style="width: 250px; height: 200px"/>
                                <div class="contain">
                                    <h3><?= $data['nama_event'] ?></h3>
                                    <p> Administrator | <?= $data['tanggal_event'] ?></p>
                                    <p style="margin-left: -10px;"> di <?= $data['lokasi_event'] ?> </p>
                                </div>
                                </a>
                            </li>
                            <?php endwhile ?>
                            <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>

                <div class="content-berita">
                    <div class="list-event" style=" background-color: none;display: inline-flex;">
                        <?php while ($data = $exc->fetch_assoc()) : ?>
                        <li style="margin-top: 100px; margin-left: 26px">
                            <a href="detail_berita.php?kode_event=<?= $data['kode_event'] ?>">
                            <img src=image/<?= $data['gambar'] ?> style="width: 250px; height: 200px"/><br>
                            <div class="contain">
                                <h3><?= $data['nama_event'] ?></h3>
                                <p> Administrator | <?= $data['tanggal_event'] ?></p>
                                <p style="margin-left: -10px;"> di <?= $data['lokasi_event'] ?> </p>
                            </div>
                            </a>
                        </li>
                        <?php endwhile ?>
                    </div>
                </div>
    

    <div class="footer-distributed" style="margin-top: 150px;height: 320px;">
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
</body>
</html>