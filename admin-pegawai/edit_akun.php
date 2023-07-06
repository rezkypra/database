<?php
SESSION_START();

include '../konek.php';

if (isset($_SESSION['admin'])) {
	
	if (isset($_SESSION['err'])) {
		$msg_err = $_SESSION['err'];
		unset($_SESSION['err']);
	}

	if ($_GET['kode_user']) {
		$kodeuser = $_GET['kode_user'];
		$query = mysqli_query($konek, "SELECT * from `akun` WHERE `kode_user` = '{$kodeuser}'");
		foreach ($query as $row) {

			$kodeuser                =    $row['kode_user'];
            $vusername                =    $row['username'];
            $vnamauser                 =   $row['nama_user'];
            $vpassword                 =   $row['password'];
            $vemail                 =   $row['email'];
            $vnohp                 =   $row['no_hp'];
            $vlevel                 =   $row['level'];
            
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
    <title>Edit Akun</title>
	<link href="../css/tambah_data.css" rel="stylesheet" type="text/css" />
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
					<li class="dropdown" style="margin-right: -165px">Administrator
					<ul class="dropdown-child">
						<li  style="margin-top: -10px;margin-bottom: -20px;"><a href="edit_profile.php">Edit Akun</a></li>
						<li><a href="../logout.php">Logout</a></li>
					</ul>
					</li>
				</div>

			
		</div>


		<!-- Konten -->

		<div class="form-konten">
			<div class="pad-tambah" style="height: 680px; margin-top: -150px;">
			<h2 style="margin-top: -35px;">Edit Data Akun - <?= @$kodeuser ?></h2>
            <br><br>
      		<form action="akun_proses.php" method="POST">
			  <div style="margin-bottom: 25px;">
			  	<br>
				  <p style="width: 35%;padding: 10px 20px; margin-top: -60px; margin-left: 20px; margin-bottom: 5px;color:darkslategray; font-weight:bold;font-size: 20px;font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Kode User</p>
				  <input type="text" name="kode_user" required="true" style="font-weight:700;width: 40%;text-decoration: none;padding: 15px 10px;border-radius: 5px;border: 1px solid; margin-top: -10px; margin-left: -40%" autocomplete="off" value="<?= @$kodeuser ?>">
				</div>
                <div>
					<p style="width: 35%;padding: 10px 20px; margin-top: -30px; margin-left: 15px; margin-bottom: 10px;color:darkslategray; font-weight:bold;font-size: 20px;font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Username</p>
					<input type="text" name="username" required="true" style="font-weight:700;width: 70%;text-decoration: none;padding: 15px 10px;border-radius: 5px;border: 1px solid; margin-top: -40px;margin-left: -10%" autocomplete="off" value="<?= @$vusername ?>">
				</div>
				<div>
					<p style="width: 35%;padding: 10px 20px; margin-top: -5px; margin-left: 20px; margin-bottom: 10px;color:darkslategray; font-weight:bold;font-size: 20px;font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Nama User</p>
					<input type="text" name="nama_user" required="true" style="font-weight:700;width: 70%;text-decoration: none;padding: 15px 10px;border-radius: 5px;border: 1px solid; margin-top: -40px;margin-left: -10%" autocomplete="off" value="<?= @$vnamauser ?>">
				</div>
                <div>
					<p style="width: 35%;padding: 10px 20px; margin-top: -5px; margin-left: 10px; margin-bottom: 5px;color:darkslategray; font-weight:bold;font-size: 20px;font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Password</p>
					<input type="password" name="password" required="true" style="font-weight:700;width: 70%;text-decoration: none;padding: 15px 10px;border-radius: 5px;border: 1px solid; margin-top: -10px;margin-left: -10%" autocomplete="off" value="<?= @$vpassword ?>">
				</div>
                <div>
					<p style="width: 35%;padding: 10px 20px; margin-top: -5px; margin-left: -5px; margin-bottom: 5px;color:darkslategray; font-weight:bold;font-size: 20px;font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Email</p>
					<input type="text" name="email" required="true" style="font-weight:700;width: 70%;text-decoration: none;padding: 15px 10px;border-radius: 5px;border: 1px solid; margin-top: -10px;margin-left: -10%" autocomplete="off" value="<?= @$vemail ?>">
				</div>
                <div>
					<p style="width: 40%;padding: 10px 20px; margin-top: -3px; margin-left: 25px; margin-bottom: 5px;color:darkslategray; font-weight:bold;font-size: 20px;font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">No Handphone</p>
					<input type="text" name="no_hp" required="true" style="font-weight:700;width: 70%;text-decoration: none;padding: 15px 10px;border-radius: 5px;border: 1px solid; margin-top: -10px;margin-left: -10%" autocomplete="off" value="<?= @$vnohp ?>">
				</div>
                <div>
					<p style="width: 35%;padding: 10px 20px; margin-top: -5px; margin-left: -5px; margin-bottom: 2px;color:darkslategray; font-weight:bold;font-size: 20px;font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Level</p>
					<select name="level" id="level" style="border:1px solid;border-radius:5px;font-weight:700;width: 50%;text-decoration: none;padding: 7px 10px; margin-top: -20px;margin-left: -30%" required="true" autocomplete="off">
						<option value="">Edit Level Akun</option>
                        <option value="Superadmin">Superadmin</option>					
                        <option value="Admin">Admin</option>
                    </select>	
                </div>
				<div style="text-align:center; margin-left: 40px; margin-right: 40px;  margin-top: 20px;">
					<button style="padding: 10px 20px;border: 1px solid;font-weight: bold;border-radius: 10px;font-size: 16px;background: rgb(30, 144, 89);color: whitesmoke; width: 30%;" name="edit">Update</button>
				</div>
			</form>
			</div>
		</div>

	</div>

</body>
</html>
			