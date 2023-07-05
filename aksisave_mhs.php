<?php  
	include 'koneksi.php';
	$username = $_POST['username'];
	$password = $_POST['password'];
	$nm_mhs = $_POST['nm_mhs'];
	$email = $_POST['email'];
	$alamat = $_POST['alamat'];
	$level = $_POST['level'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$jenis_kelamin = $_POST['jenis_kelamin'];

	if ($username=="" || $password=="" || $nm_mhs=="" || $email=="" || $alamat=="" || $level!="Mahasiswa" || $tempat_lahir=="" || $tgl_lahir=="" || $jenis_kelamin=="") {
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
			document.location="add_mhs.php";
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

			$sql = "INSERT INTO mhs (username4, nm_mhs, tempat_lahir, tgl_lahir, jenis_kelamin, email, alamat) values ('".$username."', '".$nm_mhs."', '".$tempat_lahir."', '".$tgl_lahir."','".$jenis_kelamin."', '".$email."', '".$alamat."')";
			$query = mysqli_query($koneksi, $sql);

			if ($query) {
				?>
				<script lang="javascript">
				alert("Akun berhasil dibuat");
				document.location="add_mhs.php";
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