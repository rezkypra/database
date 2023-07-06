<?php
SESSION_START();

include 'konek.php';

/*
	Semua halaman baiknya dikasih SESSION_START() dan `konek.php`

	Jika dia sudah login, maka akan langsung ke halaman beranda.php
*/

$msg_err = '';

if (!isset($_SESSION['rezky123']) || !isset($_SESSION['superadmin'])) {
	
	if (isset($_SESSION['err'])) {
		$msg_err = $_SESSION['err'];
		unset($_SESSION['err']);
	}

} else {
	header("location:industri/admin/admin-dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link href="css/login.css" rel="stylesheet" type="text/css" />
    <style>
		* {
			font-family: 'Arial', sans-serif;
			margin: 0;
		}
	</style>
</head>
<body>
	<div class="konten-login">
		<!-- <h2 style="text-align: center;">Electripay<br>Website Pembayaran Listrik Online</h2>
		<img src="image/electrician.png" alt="">
		<br><br> -->
		<div class="pad-login">
		<a href="index.php">
			<p style="font-weight: bold; float:left; margin-left: -20px; margin-top: -10px; color:black">Beranda</p></a>
			<br>
			<center>
				<img src="image/dinas_kaltim.png" alt="" srcset="" style="margin-top: -30px; width: 100px; margin-left: 180px;">
			</center>
			<br><br>
			<h1 style="text-align: center;color: black;font-weight:bold; margin-top: 60px; color: rgb(98, 55, 150); font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Sign in </h1>
			<br><br>
			<form action="login_proses.php" method="post">
				<div style="margin-bottom: 25px;">
							<!-- <div style="max-width: 36%;border:2px solid;margin:auto;margin-bottom:10px">
								<div style="padding: 10px 15px;width: 100%;display: flex"> -->
									<!-- <div style="font-weight:700;width: 40%;margin-top:5px;margin-left:100px">Username : -->
									<!-- <div style="font-weight:700;width: 3%;margin-top:5px;">:</div> -->
									<!-- <div style="font-weight:700;margin-right: 20px;width: 47%"> -->
					<input style="font-weight:700;width: 80%;text-decoration: none;padding: 15px 10px;border-radius: 5px;border: 4px; margin-top: -40px;" type="text" name="username" autocomplete="off" placeholder="Username">
				</div>
				<div>
					<input style="font-weight:700;width: 80%;text-decoration: none;padding: 15px 10px;border-radius: 5px;border: 1px;margin-bottom: -5px" type="password" name="password" id="myInput" autocomplete="off" placeholder="Password">
					<br><br>
					<input type="checkbox" onclick="myFunction()" style="margin-left: -250px; margin-top: -10px; margin-right: 5px; margin-bottom: -20px">Show Password
					<script>
						function myFunction() {
						var x = document.getElementById("myInput");
						if (x.type === "password") {
							x.type = "text";
						} else {
							x.type = "password";
						}
						}
					</script>
				</div>
				<div style="text-align:center; margin-left: 40px; margin-right: 40px;  margin-top: 20px;">
					<button style="padding: 10px 20px;border: 1px solid;font-weight: bold;border-radius: 10px;font-size: 16px;background: rgb(201, 121, 37);color: whitesmoke; width: 100%;" name="sign-in">Log In</button>
				</div>
				</div>
		</div>
	</div>
							<!-- <div style="max-width: 36%;border:2px solid;margin:auto;margin-bottom:25px">
								<div style="padding: 10px 15px;width: 100%;display: flex"> -->
									<!-- <div style="font-weight:700;width: 40%;margin-top:5px;">Password</div>
									<div style="font-weight:700;width: 3%;margin-top:5px;">:</div> -->
									<!-- <div style="font-weight:700;margin-right: 20px;width: 47%"> -->
	
								</div>
							</div>
							
						</div>
					</form>

				</div>

			</div>
		</div>
	</div>
</body>
</html>