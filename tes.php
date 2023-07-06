<!DOCTYPE html>
<html>
<head>
	<title>Electric Pay</title>
	<link href="css/index.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
</head>
<body>
/** 	<?php if(isset($_GET['msg'])):?>
		<?php if($_GET['msg'] == "success"):?>
			<script language="javascript">
				alert("Anda Telah Logout");
			</script>
		<?php endif;?>
	<?php endif;?> */

	<div class="topbar">
		<div class="judul">
            <li class="logo"><img src="image/idea.png" alt=""></li>
            <ul>
			    <li><a href="index.php">Home</a></li>
                <li><a href="tarif.php">Tarif</a></li>
                <li><a href="faq.php">FaQ</a></li>
            </ul>
        </div> 
            <div class="logo-login">
                <a href="login.php">
				    <button type="submit" class="login" >
                    <p>Login</p>
                    </button>
                </a>
    </div>
        <!-- <div>
            <a href="login.php">
				<button type="submit" class="login" >
				    <img src="image/login.png" alt="none">
					<p>Login</p>
				</button>
			</a>
        </div> -->
	</div>
	
	<div class="container">
		<div class="content">
        <h2>Selamat datang di</h2>
        <span>Electric Pay</span>
        <p>Solusi Pembayaran Tagihan Listrik Anda</p>
			<div class="isi">
                <img src="image/kota.png" alt="">
                <h1>Periksa tagihan rumah anda disini!</h1>
                <form action="">
                    <p>
                        <input type="text" name="cari" placeholder="ID Pelanggan">
                    </p>
                </form>
			</div>
        </div>
	</div>
				<!-- <a href="alatmusik.php">
					<button type="submit" class="login" >
						<img src="image/login.png" alt="none"> -->
						<!-- <p>Lihat Alat Musik</p>
					</button> -->

    
	<!-- </div class="admin">
        <details class="admin">
            <summary>Anda Admin ? Klik disini</summary>
            <form action="admin/admin.php" method="post">
                <p>
                    <label for="nama">Username </label>
                    <input type="text" name="username">
                </p>
                <p>
                    <label for="alamat">Password </label>
                    <input type="password" name="password" id="">
                </p>
                <p>
                    <input type="submit" value="Login" name="login">
                </p>
            </form>
        </details>
    </div> -->

	<!-- <div class="footer">
		<p>©2020-YAMAHA Music Indonesia</p>
	</div> -->
</body>
</html>