<?php
SESSION_START();

include 'konek.php';

/*
	Semua halaman baiknya dikasih SESSION_START() dan `konek.php`

	Jika dia gagal login, maka akan langsung ke halaman index.php

	Jika berhasil, maka akan langsung ke beranda.
*/

if (isset($_POST['sign-in'])) 
{
	
	$username = $_POST['username'];
	$password = $_POST['password'];

	if (!empty($username) && !empty($password)) 
	{
		
		$query_admin = "SELECT * FROM `akun` WHERE `akun`.username = '".$username."' AND `akun`.password='".$password."'";

		$exc = $konek->query($query_admin);

		$row = $exc->num_rows;

		$fetch = $exc->fetch_assoc();

		if ($row == 1) 
		{

			$level = $fetch['level'];

			if ($level == "Superadmin") {
 				$_SESSION['superadmin'] 		= $username;
			} else if ($level == "Admin") {
				$_SESSION['admin'] 	= $username;
			}

			

			if ($_SESSION['superadmin']) 
			{
				header("location:/industri/admin/admin-dashboard.php");
			
			} else if ($_SESSION['admin']) 
			{
				header("location:/industri/admin-pegawai/admin-dashboard.php");
			}
		
		}
			else
		{

			$_SESSION['err'] = '<h4 style="text-align: center;color:#ff0000;margin: 25px 0;">Username atau Password anda Salah</h4>';
			header("location:login.php");

		}

	}

}