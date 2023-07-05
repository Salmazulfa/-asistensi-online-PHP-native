<?php 
	include 'koneksi.php';
	$username = $_POST['username'];
	$password = $_POST['password'];
	$nm_mhs = $_POST['nm_mhs'];
	$email = $_POST['email'];
	$alamat = $_POST['alamat'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$jenis_kelamin = $_POST['jenis_kelamin'];

	$sql = "UPDATE user SET password='$password' WHERE username='$username'";
	$query = mysqli_query($koneksi, $sql);

	$sql = "UPDATE mhs SET nm_mhs='$nm_mhs', tempat_lahir='$tempat_lahir', tgl_lahir='$tgl_lahir', jenis_kelamin='$jenis_kelamin', email='$email', alamat='$alamat' WHERE username4='$username'";
	$query = mysqli_query($koneksi, $sql);

	if ($query) {
		?>
		<script lang="javascript">
		alert("Data berhasil diperbarui");
		document.location="profil_mhs.php";
		</script>
		<?php
	}else{
		?>
		<script lang="javascript">
		alert("Gagal Memproses Pembaruan");
		document.location="profil_mhs.php";
		</script>
		<?php
	}
?>