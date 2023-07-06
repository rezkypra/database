<?php
SESSION_START();

include '../konek.php';

if (!isset($_SESSION['admin'])) {
    $_SESSION['msg'] = "You have to log in first";
    header('location: login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['admin']);
    header("location: login.php");
}

else if (isset($_SESSION['admin'])) {
	
	$query = mysqli_query($konek, "SELECT * FROM bidang_ikm");
	$query2 = mysqli_query($konek, "SELECT * FROM ikm");
	$query3 = mysqli_query($konek, "SELECT * FROM event");
	$query4 = mysqli_query($konek, "SELECT * FROM akun");
	$jumlah_industri = mysqli_num_rows($query);
	$data_industri = mysqli_num_rows($query2);
	$data_event = mysqli_num_rows($query3);
	$data_akun = mysqli_num_rows($query4);
	

	

} else {
	header("location:../login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin E-Industri</title>
	<link href="../css/index-admin.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <!-- <div style="width: 80%;height:70px;background: #FFDE59;color: black;font-weight:750;float:right">
		<div style="padding-top: 27px;padding-left: 30px;">
			E-INDUSTRI - MANAJEMEN DINAS PERINDUSTRIAN SAMARINDA
		</div>
	</div> -->

		<!-- Navbar -->
		<div class="header-admin">
			<div class="corner-header">
				<li class="logo-admin"><img src="../image/dinas_kaltim.png" alt="" style="width: 50px;"></li>
            	<ul class="title-app">E-Industri</ul>
            	<ul class="navbar-admin">
                	<li><a href="admin-dashboard.php">Dashboard</a></li>
               		<li><a href="bidang_ikm.php">Bidang IKM</a></li>
                	<li><a href="industri.php">Industri</a></li>
                	<li><a href="event.php">Event</a></li>
					<li><a href="akun.php">Akun</a></li>
				</ul>
			</div>
            	
			<div class="ikon-profil">
					<img src="../image/worker.png">
					<li class="dropdown">
						<?= $_SESSION['admin'] ?>
					<ul class='dropdown-child'>
						<li><a href="edit_profile.php">Edit Akun</a></li>
						<li><a href='../logout.php'>Logout</a></li>
					</ul>
					</li>

				</div>
			
		</div>

        <!-- Konten -->

		<div class="content">

			<h2>Dashboard<br> 

			<div class="pad-content-1">
				<a href="bidang_ikm.php">
				
				<span style="position: absolute;text-align: center; margin-left: 70px;font-size: 40px;">
				<?php echo $jumlah_industri?><br></span>
				Bidang Industri</a>
				<img src="../image/industrial.png" alt="">
			</div>

			<div class="pad-content-2">
				<a href="industri.php"> 
				<span style="position:absolute;text-align:center; margin-left: 70px; font-size: 40px;">
				<?php echo $data_industri?><br></span>
				Data Industri</a>
				<img src="../image/industri.png" alt="">
			</div>

			<div class="pad-content-3">
				<a href="event.php">
				<span style="position:absolute; text-align:center; margin-left: 70px;font-size: 40px;">
				<?php echo $data_event ?><br></span>
				Data Event</a>
				<img src="../image/event.png" alt="">
			</div>

			<div class="pad-content-4">
				<a href="akun.php">
				<span style="position:absolute; text-align:center; margin-left: 70px;font-size: 40px;">
				<?php echo $data_akun ?><br></span>
				Data Akun</a>
				<img src="../image/user.png" alt="">
			</div>

		</div>

		<footer style="position:fixed; width: 100%; height: 30px; bottom: 0">
			<p align="center" style="margin-top: 10px;">© 2022 Dinas Perindustrian Samarinda</p>
		</footer>
</body>
</html>