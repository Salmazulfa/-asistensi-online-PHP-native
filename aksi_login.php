<?php 
session_start();
include 'koneksi.php';
 
$username = $_POST['username'];
$password = $_POST['password'];
 
$login = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");
$cek = mysqli_num_rows($login);
 
if($cek > 0){
	$data = mysqli_fetch_assoc($login);
	if($data['level']=="Admin"){
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "Admin";
		header("location:admin.php");
	}else if($data['level']=="Dosen"){
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "Dosen";
		header("location:dosen.php");
	}else if($data['level']=="Asisten Praktikum"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "Asisten Praktikum";
		header("location:aslab.php");
	}else if($data['level']=="Mahasiswa"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "Mahasiswa";
		header("location:mhs_dashboard.php");
	}else{
 		mysql_error();
		header("location:aksi_login.php?pesan=gagal");
	}	
}else{
	// mysql_error();
	header("location:aksi_login.php?pesan=gagal");
}
?>