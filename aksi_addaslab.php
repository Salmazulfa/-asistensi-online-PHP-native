<?php  
	include 'koneksi.php';
	$username = $_POST['username'];
	$password = $_POST['password'];
	$nm_aslab = $_POST['nm_aslab'];
	$email = $_POST['email'];
	$alamat = $_POST['alamat'];
	$level = $_POST['level'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$matkul = $_POST['matkul'];

	if ($username=="" || $password=="" || $nm_aslab=="" || $email=="" || $alamat=="" || $level!="Asisten Praktikum" || $tempat_lahir=="" || $tgl_lahir=="" || $jenis_kelamin=="" || $matkul=="") {
		?>
		<script lang="javascript">
		alert("Data tidak bolek kosong!! Teliti data anda! Data sudah ada");
		window.history.back();
		</script>
		<?php
	}else {
		$result = mysqli_query($koneksi, "SELECT username FROM user where username='$username'");
		if (mysqli_fetch_assoc($result)) {
			?>
			<script lang="javascript">
			alert("Data sudah ada!");
			document.location="add_aslab.php";
			</script>
			<?php
		} else {
			$sql = "INSERT INTO user (username, password, level) values 
					('".$username."', '".$password."', '".$level."')";
			$query = mysqli_query($koneksi, $sql);

			$sql = "SELECT max(no) AS last_no FROM user LIMIT 1";
			$query = mysqli_query($koneksi, $sql);

			$data = mysqli_fetch_array($query);
			$last_no = $data['last_no'];

			$sql = "INSERT INTO aslab (username3, Id_matkull, nm_aslab, tempat_lahir, tgl_lahir, jenis_kelamin, email, alamat) values ('".$username."', '".$matkul."', '".$nm_aslab."', '".$tempat_lahir."', '".$tgl_lahir."','".$jenis_kelamin."', '".$email."', '".$alamat."')";
			$query = mysqli_query($koneksi, $sql);

			if ($query) {
				?>
				<script lang="javascript">
				alert("Akun berhasil dibuat");
				document.location="add_aslab.php";
				</script>
				<?php
			}else{
				?>
				<script lang="javascript">
				alert("Username yang anda masukkan sudah ada!");
				window.history.back();
				</script>
				<?php

			}
		}
	}
?>