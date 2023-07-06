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
	$kodebidang = $_POST['kode_bidang'];
	$namabidang=$_POST['nama_bidang'];
		
	// update user data
	$result = mysqli_query($konek, "UPDATE bidang_ikm SET nama_bidang='$namabidang' WHERE kode_bidang=$kodebidang");
	
	// Redirect to homepage to display updated user in list
	if($result)
    {
        echo "<script>
            alert('Berhasil Mengupdate Data = {$namabidang} !');
            document.location='bidang_ikm.php';
        </script>";
    }
    
    else
    {
        echo "<script>
            alert('Gagal Mengupdate Data {$namabidang} !!!!');
            document.location='edit_bidang.php?id=".$kodebidang."';
        </script>";
    }
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$kodebidang = $_GET['kode_bidang'];
 
// Fetech user data based on id
$result = mysqli_query($konek, "SELECT * FROM bidang_ikm WHERE kode_bidang=$kodebidang");
 
while($row = mysqli_fetch_array($result))
{
	$namabidang = $row['nama_bidang'];
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
    <title>Edit Bidang</title>
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
			<div class="pad-tambah">
			<h2>Edit Data Bidang - <?= $kodebidang ?></h2>
            <br><br>
      		<form action="edit_bidang.php" method="POST" name="update">
			  <div style="margin-bottom: 20px;">
			  <br>
              <br>
				  <p style="width: 35%;padding: 10px 10px; margin-top: -70px; margin-left: 20px; margin-bottom: 5px;color:darkslategray; font-weight:bold;font-size: 20px;font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Kode Industri</p>
					<input type="text" name="kode_bidang" required="true" style="font-weight:700;width: 40%;text-decoration: none;padding: 10px 10px;border-radius: 5px;border: 1px solid; margin-top: -40px; margin-left: -42%" autocomplete="off" value=" <?= $kodebidang ?>">
				</div>
				<div>
                    <p style="width: 35%;padding: 10px 10px; margin-top: -20px; margin-left: 25px; margin-bottom: 5px;color:darkslategray; font-weight:bold;font-size: 20px;font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Nama Industri</p>
					<input type="text" name="nama_bidang" required="true" style="font-weight:700;width: 70%;text-decoration: none;padding: 10px 10px;border-radius: 5px;border: 1px solid; margin-left: -12%; margin-top: -30px" autocomplete="off"  value="<?= $namabidang ?>">
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