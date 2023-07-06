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


} else {
	header("location:../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah IKM</title>
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
					<li class="dropdown"><?= $_SESSION['admin'] ?>
					<ul class="dropdown-child">
						<li><a href="edit_profile.php">Edit Akun</a></li>
						<li><a href="../logout.php">Logout</a></li>
					</ul>
					</li>
				</div>
		</div>
        
        <!-- Konten -->

		<div class="form-konten">
			<div class="pad-tambah" style="height: max-content;margin-top: -140px;">
			<h2>Tambah Data Industri</h2>
            <br><br>
      		<form action="tambah_industri.php" method="POST" name="form1">
			  <div style="margin-bottom: 25px;">
			  <br>
					<input type="text" name="kode_industri" required="true" style="font-weight:700;width: 40%;text-decoration: none;padding: 15px 10px;border-radius: 5px;border: 1px solid; margin-top: -30px; margin-left: -40%" autocomplete="off" placeholder="Kode Industri">
				</div>
				<div>
					<input type="text" name="nama_industri" required="true" style="font-weight:700;width: 70%;text-decoration: none;padding: 15px 10px;border-radius: 5px;border: 1px solid; margin-left: -10%; margin-top: -30px" autocomplete="off" placeholder="Nama Industri">
				</div>
				<div>
					<input type="text" name="nama_pemilik" required="true" style="font-weight:700;width: 70%;text-decoration: none;padding: 15px 10px;border-radius: 5px;border: 1px solid; margin-left: -10%; margin-top: 10px" autocomplete="off" placeholder="Nama Pemilik">
				</div>
				<div>
					<input type="text" name="kontak" required="true" style="font-weight:700;width: 40%;text-decoration: none;padding: 15px 10px;border-radius: 5px;border: 1px solid; margin-left: -40%; margin-top: 10px" autocomplete="off" placeholder="No Kontak">
				</div>
				<div>
					<textarea type="text" name="alamat_industri" required="true" style="font-weight:700;width: 70%;text-decoration: none;padding: 10px 10px;border-radius: 5px;border: 1px solid; margin-left: -10%; margin-top: 10px" autocomplete="off" placeholder="Alamat Industri"></textarea>
				</div>
				<div>
					<select name="kode_kecamatan" id="kode_kecamatan" style="border:1px solid;border-radius:5px;font-weight:700;width: 70%;text-decoration: none;padding: 7px 10px; margin-left: -10%; margin-top: 10px" required="true" autocomplete="off">
							<option value="">Pilih Nama Kecamatan</option>

							<?php 

								$query = $konek->query("SELECT * FROM kecamatan");

								while ($row = $query->fetch_assoc()) {
							?>
							<option value="<?= $row['kode_kecamatan'] ?>"><?= $row['nama_kecamatan'] ?></option>
									<?php } ?>

							</select>
				</div>
				<div>
					<select name="kode_bidang" id="kode_bidang" style="border:1px solid;border-radius:5px;font-weight:700;width: 70%;text-decoration: none;padding: 7px 10px; margin-left: -10%; margin-top: 10px" required="true" autocomplete="off">
							<option value="">Pilih Nama Bidang</option>

							<?php 

								$query = $konek->query("SELECT * FROM bidang_ikm");

								while ($row = $query->fetch_assoc()) {
							?>
							<option value="<?= $row['kode_bidang'] ?>"><?= $row['nama_bidang'] ?></option>
									<?php } ?>

							</select>
				</div>
				<div style="text-align:center; margin-left: 40px; margin-right: 40px;  margin-top: 50px;">
					<button style="padding: 10px 20px;border: 1px solid;font-weight: bold;border-radius: 10px;font-size: 16px;background: rgb(30, 144, 89);color: whitesmoke; width: 30%;" name="tambah">Tambah</button>
				</div>
			</form>
			</div>
		</div>

	</div>

	<?php
 
	// Check If form submitted, insert form data into users table.
	if(isset($_POST['tambah'])) {
		$kodeindustri = $_POST['kode_industri'];
		$namaindustri = $_POST['nama_industri'];
		$namapemilik = $_POST['nama_pemilik'];
		$kontak = $_POST['kontak'];
		$alamatindustri = $_POST['alamat_industri'];
		$namakecamatan = $_POST['kode_kecamatan'];
		$namabidang = $_POST['kode_bidang'];
		
		// include database connection file
		include_once("../konek.php");
				
		// Insert user data into table
		$result = mysqli_query($konek, "INSERT INTO ikm (kode_industri,nama_industri,nama_pemilik,kontak,alamat_industri,kode_kecamatan,kode_bidang) VALUES('$kodeindustri','$namaindustri','$namapemilik','$kontak','$alamatindustri','$namakecamatan','$namabidang')");
		
		// Show message when user added
		if($result)
    	{
        echo "<script>
            alert('Anda Sukses Menambah Industri {$namaindustri} !');
            document.location='industri.php';
        </script>";
    	}
		else
    	{
        echo "<script>
            alert('Gagal menambah Industri !!!! Cek Kembali Inputan anda !!!!');
            document.location='tambah_industri.php';
        </script>";
    	}
	}
	?>

</body>
</html>
