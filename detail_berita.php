<?php

include 'konek.php';

    $kodeevent = $_GET['kode_event'];
	$query = $konek->query("SELECT * FROM `event` WHERE kode_event = '".$kodeevent."'");
	$num = $query->num_rows;

	if ($num == 1) {
			
		$row = $query->fetch_assoc();
		
	} else {

		header("location:acara.php");
		
	}

    ?>

<head>
    <title><?= $row['nama_event'] ?> : E-Industri</title>
    <link href="css/index-detail-berita.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <div class="topbar" style="margin-top: -100px">
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
        <h2><?= $row['nama_event'] ?></h2>
        <div class="content-berita">
            <div class="gambar"><img src="image/<?= $row['gambar']?>" alt=""></div>
            <div class="isinya">
                <div class="col3">
                <div class="isiberita">
                <div class="judul-berita"><?= $row['nama_event']?></div>
                <div class="tanggal">Penulis : Administrator | Tanggal : <?= $row['tanggal_event'] ?></div>
                <div style="color: white;"><?= $row['keterangan'] ?></div>
                    <br>
                </div>
            </div>
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
</body>
</html>
