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
	
	if (isset($_SESSION['err'])) {
		$msg_err = $_SESSION['err'];
		unset($_SESSION['err']);
	}

	// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['edit']))
{	
	$kodeindustri = $_POST['kode_industri'];
	
	$namaindustri=$_POST['nama_industri'];
	$namapemilik=$_POST['nama_pemilik'];
	$kontak=$_POST['kontak'];
	$alamatindustri=$_POST['alamat_industri'];
	$namakecamatan=$_POST['kode_kecamatan'];
	$namabidang=$_POST['kode_bidang'];
		
	// update user data
	$result = mysqli_query($konek, "UPDATE ikm SET nama_industri='$namaindustri',nama_pemilik='$namapemilik',alamat_industri='$alamatindustri',kontak='$kontak',kode_kecamatan='$namakecamatan',kode_bidang='$namabidang' WHERE `ikm`.`kode_industri` ='$kodeindustri'");
	
	// Redirect to homepage to display updated user in list
	if($result)
    {
        echo "<script>
            alert('Berhasil Mengupdate Data = {$namaindustri} !');
            document.location='industri.php';
        </script>";
    }
    
    else
    {
        echo "<script>
            alert('Gagal Mengupdate Data {$namaindustri} !!!!');
            document.location='edit_industri.php?id=".$kodeindustri."';
        </script>";
    }
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$kodeindustri = $_GET['kode_industri'];
 
// Fetech user data based on id
$result = mysqli_query($konek, "SELECT * FROM ikm WHERE kode_industri='{$kodeindustri}'");
 
while($row = mysqli_fetch_array($result))
{
	$namaindustri = $row['nama_industri'];
	$namapemilik = $row['nama_pemilik'];
	$alamatindustri = $row['alamat_industri'];
	$kontak = $row['kontak'];
	$vnamakecamatan = $row['kode_kecamatan'];
	$vnamabidang = $row['kode_bidang'];
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
    <title>Edit IKM</title>
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
			<div class="pad-tambah" style="height: 680px;margin-top: -150px;">
			<h2>Edit Data Industri - <?= @$kodeindustri ?></h2>
            <br><br>
      		<form action="edit_industri.php" method="POST" name="update">
			  <div style="margin-bottom: 20px;">
			  <br>
              <br>
				  <p style="width: 35%;padding: 10px 10px; margin-top: -70px; margin-left: 20px; margin-bottom: 5px;color:darkslategray; font-weight:bold;font-size: 20px;font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Kode Industri</p>
					<input type="text" name="kode_industri" required="true" style="font-weight:700;width: 40%;text-decoration: none;padding: 10px 10px;border-radius: 5px;border: 1px solid; margin-top: -40px; margin-left: -42%" autocomplete="off" value=" <?= $kodeindustri ?>">
				</div>
				<div>
                    <p style="width: 35%;padding: 10px 10px; margin-top: -20px; margin-left: 25px; margin-bottom: 5px;color:darkslategray; font-weight:bold;font-size: 20px;font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Nama Industri</p>
					<input type="text" name="nama_industri" required="true" style="font-weight:700;width: 70%;text-decoration: none;padding: 10px 10px;border-radius: 5px;border: 1px solid; margin-left: -12%; margin-top: -30px" autocomplete="off"  value="<?= $namaindustri ?>">
				</div>
				<div>
                    <p style="width: 35%;padding: 10px 10px; margin-top: 5px; margin-left: 25px; margin-bottom: 5px;color:darkslategray; font-weight:bold;font-size: 20px;font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Nama Pemilik</p>
					<input type="text" name="nama_pemilik" required="true" style="font-weight:700;width: 70%;text-decoration: none;padding: 10px 10px;border-radius: 5px;border: 1px solid; margin-left: -12%; margin-top: -10px" autocomplete="off" value="<?= $namapemilik ?>">
				</div>
				<div>
                    <p style="width: 35%;padding: 10px 10px; margin-top: 5px; margin-left: 10px; margin-bottom: 5px;color:darkslategray; font-weight:bold;font-size: 20px;font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">No Kontak</p>
					<input type="text" name="kontak" required="true" style="font-weight:700;width: 40%;text-decoration: none;padding: 10px 10px;border-radius: 5px;border: 1px solid; margin-left: -42%; margin-top: -10px" autocomplete="off" value="<?= $kontak ?>">
				</div>
				<div>
                    <p style="width: 35%;padding: 10px 10px; margin-top: 5px; margin-left: 32px; margin-bottom: 5px;color:darkslategray; font-weight:bold;font-size: 20px;font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Alamat Industri</p>
					<input type="text" name="alamat_industri" required="true" style="font-weight:700;width: 70%;text-decoration: none;padding: 20px 10px;border-radius: 5px;border: 1px solid; margin-left: -12%; margin-top: -10px" autocomplete="off" value="<?= $alamatindustri ?>">
				</div>
				<div>
                <p style="width: 35%;padding: 10px 10px; margin-top: 5px; margin-left: 22px; margin-bottom: 5px;color:darkslategray; font-weight:bold;font-size: 20px;font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Nama Kecamatan</p>
					<select name="kode_kecamatan" id="kode_kecamatan" style="border:1px solid;border-radius:5px;font-weight:700;width: 70%;text-decoration: none;padding: 7px 10px; margin-left: -12%; margin-top: -10px" required="true" autocomplete="off">
					<?php
						$query = $konek->query("SELECT * FROM kecamatan");
						while ($row = $query->fetch_assoc()) {
							if ($row['kode_kecamatan'] == $vnamakecamatan) { ?>
								<option value="<?= $row['kode_kecamatan'] ?> selected"><?= $row['nama_kecamatan'] ?></option>
						<?php } else { ?>
							<option value="<?= $row['kode_kecamatan'] ?>"><?= $row['nama_kecamatan'] ?></option>
						<?php }
						} 
					?>      
                    </select>
				</div>
				<div>
                <p style="width: 35%;padding: 10px 10px; margin-top: 5px; margin-left: 22px; margin-bottom: 5px;color:darkslategray; font-weight:bold;font-size: 20px;font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Nama Bidang</p>
				<select name="kode_bidang" id="kode_bidang" style="border:1px solid;border-radius:5px;font-weight:700;width: 70%;text-decoration: none;padding: 7px 10px; margin-left: -12%; margin-top: -10px" required="true" autocomplete="off">
				<?php
						$query = $konek->query("SELECT * FROM bidang_ikm");
						while ($row = $query->fetch_assoc()) {
							if ($row['kode_bidang'] == $vnamabidang) { ?>
								<option value="<?= $row['kode_bidang'] ?>"><?= $row['nama_bidang'] ?></option>
						<?php } else { ?>
							<option value="<?= $row['kode_bidang'] ?>"><?= $row['nama_bidang'] ?></option>
						<?php }
						} 
					?>     
                    </select>
				</div>
				<div style="text-align:center; margin-left: 40px; margin-right: 40px;  margin-top: 30px;">
					<button style="padding: 10px 20px;border: 1px solid;font-weight: bold;border-radius: 10px;font-size: 16px;background: rgb(30, 144, 89);color: whitesmoke; width: 30%;" name="edit">Update</button>
				</div>
			</form>
			</div>
		</div>

	</div>


</body>
</html>
			