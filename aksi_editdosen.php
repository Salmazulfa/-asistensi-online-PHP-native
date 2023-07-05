<?php 
	include 'koneksi.php';
	$username = $_POST['username'];
	$password = $_POST['password'];
	$nm_dosen = $_POST['nm_dosen'];
	$email = $_POST['email'];
	$alamat = $_POST['alamat'];
	$level = $_POST['level'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$matkul = $_POST['matkul'];

	$sql = "UPDATE user SET password='$password' WHERE username='$username'";
	$query = mysqli_query($koneksi, $sql);

	$sql = "UPDATE dosen SET id_matkul='$matkul', nm_dosen='$nm_dosen', tempat_lahir='$tempat_lahir', tgl_lahir='$tgl_lahir', jenis_kelamin='$jenis_kelamin', email='$email', alamat='$alamat' WHERE username2='$username'";
	$query = mysqli_query($koneksi, $sql);

	if ($query) {
		?>
		<script lang="javascript">
		alert("Data berhasil diperbarui");
		document.location="data_dosen.php";
		</script>
		<?php
	}else{
		?>
		<script lang="javascript">
		alert("Gagal Memproses Pembaruan");
		window.history.back();
		</script>
		<?php
	}
?>