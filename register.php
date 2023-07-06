<?php
SESSION_START();

include 'konek.php';

/*
	Semua halaman baiknya dikasih SESSION_START() dan `konek.php`

	Jika dia sudah login, maka akan langsung ke halaman beranda.php
*/

// $msg_err = '';

// if (!isset($_SESSION['loket1']) || !isset($_SESSION['admin'])) {
	
// 	if (isset($_SESSION['err'])) {
// 		$msg_err = $_SESSION['err'];
// 		unset($_SESSION['err']);
// 	}

// } else {
// 	header("location:industri/admin/admin-dashboard.php");
// }
// ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
	<link href="css/register.css" rel="stylesheet" type="text/css" />
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
		<a href="login.php">
			<p style="font-weight: bold; float:left; margin-left: -20px; margin-top: -10px; color:black">Login</p></a>
			<br>
			<center>
				<img src="image/dinas_kaltim.png" alt="" srcset="" style="margin-top: -30px; width: 100px; margin-left: 180px;">
			</center>
			<br><br>
			<h1 style="text-align: center;color: black;font-weight:bold; margin-top: 60px; color: rgb(98, 55, 150); font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Create New Account </h1>
			<br><br>
			<form action="login_proses.php" method="post">
				<div style="margin-bottom: 25px;">
							<!-- <div style="max-width: 36%;border:2px solid;margin:auto;margin-bottom:10px">
								<div style="padding: 10px 15px;width: 100%;display: flex"> -->
									<!-- <div style="font-weight:700;width: 40%;margin-top:5px;margin-left:100px">Username : -->
									<!-- <div style="font-weight:700;width: 3%;margin-top:5px;">:</div> -->
									<!-- <div style="font-weight:700;margin-right: 20px;width: 47%"> -->
					<input style="font-weight:700;width: 80%;text-decoration: none;padding: 15px 10px;border-radius: 5px;border: 4px; margin-top: -40px;" type="text" name="username" autocomplete="off" placeholder="First Name">
				</div >
				<div>
					<input style="font-weight:700;width: 80%;text-decoration: none;padding: 15px 10px;border-radius: 5px;border: 4px;  margin-top: -20px;" type="text" name="last_name" autocomplete="off" placeholder="Last Name">
				</div>
                <div>
					<input style="font-weight:700;width: 80%;text-decoration: none;padding: 15px 10px;border-radius: 5px;border: 4px; margin-top: 12px;" type="text" name="email" autocomplete="off" placeholder="Email">
				</div>
				<div>
					<input style="font-weight:700;width: 80%;text-decoration: none;padding: 15px 10px;border-radius: 5px;border: 4px; margin-top: 12px;" type="text" name="email" autocomplete="off" placeholder="Password">
				</div>
				<div style="text-align:center; margin-left: 40px; margin-right: 40px;  margin-top: 20px;">
					<button style="padding: 10px 20px;border: 1px solid;font-weight: bold;border-radius: 10px;font-size: 16px;background: rgb(201, 121, 37);color: whitesmoke; width: 100%;" name="sign-in">Sign Up</button>
				<!-- </div>
				<p style="margin-left: -150px; margin-top: 20px;">Belum memiliki akun? <a href="register.php" style="text-decoration: none;"><span>Sign Up</span></a></p>
				</div> -->
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