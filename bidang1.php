<?php

include 'konek.php';

?>

<!DOCTYPE html>
<html>

<head>
    <title>Bidang Industri Agro, Hasil Hutan, Kimia dan Bangunan : E-Industri</title>
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

   <div class="slider-wrapper">
        <div class="slider">
                <div class="slide">
                    <figure class="slide-figure">
                        <img class="slide-img" src="image/industri-hasil-hutan.jpg" style="float: left;margin-top: 52px">
                        <figcaption class="slide-caption-bidang">
                            <h2 class="slide-title-bidang" style="float: right;">Bidang Agro, Hasil Hutan, dan Kimia Bangunan</h2>
                            <p style="text-indent: 45px">Bidang Industri Agro, Hasil Hutan, Kimia dan Bahan Bangunan mempunyai tugas <br> 
                            melaksanakan penyusunan dan pelaksanaan kebijakan, pemberian pendampingan serta <br>
                            pemantauan dan evaluasi di bidang industri Agro, Hasil Hutan, Kimia dan Bahan Bangunan.</p>
                            <p style="text-indent: 45px">Industri Agro, Hasil Hutan, Kimia dan Bahan Bangunan dipimpin oleh kepala bidang <br>
                            yang berada dibawah dan bertanggung jawab langsung pada Kepala Dinas. </p>
                            <p style="text-indent: 45px">Industri Agro, Hasil Hutan, Kimia dan Bahan Bangunan membawahkan seksi <br> 
                            yang dipimpin oleh kepala seksi dan bertanggungjawab langsung pada kepala bidang</p></figcaption>
                    </figure>
                </div>
        </div>
</div>

   <div class="container-bidang">
        <br><h2>Menu Bidang</h2>
        <div class="content-bidang1">
            <img src="image/agro.jpeg" alt="">
            <div class="pad-bidang1">
                <a href="bidang-agro.php" style="margin-left: 55px;">Bidang Agro</a>
            </div>
        </div>

        <div class="content-bidang1" style="margin-top: -231px; margin-left: 355px;">
            <img src="image/kayu.jpg" alt="" style="width: 360px;height: 189px">
            <div class="pad-bidang1" style="width: 360px;">
                <a href="bidang-hasil-hutan.php" style="padding: 1px;">Bidang Hasil Hutan</a>
            </div>
        </div>

        <div class="content-bidang1" style="margin-top: -232px; margin-left: 64%;">
            <img src="image/kimia.jpg" alt="" style="width: 330px;height: 189px">
            <div class="pad-bidang1" style="width: 330px;">
            <a href="bidang-kimia-bangunan.php" style="margin-left: 20px;text-align:center;font-size: 20px;">Bidang Kimia dan Bangunan</a>
            </div>
        </div>
        <!-- <img src="image/industrial.png" alt="" style="width: 70px; margin-left: 26%; margin-top: -100px; "> -->
   </div>

        <div class="footer-distributed" style="margin-top: 10px">
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
    
    
     <div class="konten">
    <?php if (isset($_POST["cari"])) : ?>
        <?php $keyword = $_POST["keyword"]; ?>
        <?php $result = mysqli_query($konek, "SELECT IDTagihan, IDPenggunaan, Bulan, Tahun , Jumlahmeter, sub_total, Status FROM tagihan WHERE IDPelanggan LIKE '%$keyword%'"); ?>
        <div class="konten-index">
            <h2 style="text-align: center;">Data Tagihan Anda</h2>
        </div>
        <table cellpadding="0" cellspacing="0" border="1px" style="border-color: black;width: 80%;margin: 50px;text-align: center; border-radius:10px;margin-top: 10px;margin-bottom: 30px;margin-left: 10%;">
            <thead style="text-align: center;font-size: 20px;background-color: #d6915c">
                <tr>
                    <th>ID Tagihan</th>
                    <th>ID Penggunaan</th>
                    <th>Bulan</th>
                    <th>Tahun</th>
                    <th>Jumlah Meter</th>
                    <th>Sub Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody style="font-size: 15px;background-color: #de5d66;">
                <?php error_reporting(0); ?>
                <?php foreach ($result as $row) : ?>
                    <tr>
                        <td style="padding-left: 15px;"><?= $row['IDTagihan'] ?></td>
                        <td style="padding-left: 15px;"><?= $row['IDPenggunaan'] ?></td>
                        <td style="padding-left: 15px;"><?= $row['Bulan'] ?></td>
                        <td style="padding-left: 15px;"><?= $row['Tahun'] ?></td>
                        <td style="padding-left: 15px;"><?= $row['Jumlahmeter'] ?></td>
                        <td style="padding-left: 15px;"><?= $row['sub_total'] ?></td>
                        <td style="padding-left: 15px;"><?= $row['Status'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?> -->
    </div>
</body>

</html>