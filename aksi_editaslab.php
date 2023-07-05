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

	$sql = "UPDATE user SET password='$password' WHERE username='$username'";
	$query = mysqli_query($koneksi, $sql);

	$sql = "UPDATE aslab SET Id_matkull='$matkul', nm_aslab='$nm_aslab', tempat_lahir='$tempat_lahir', tgl_lahir='$tgl_lahir', jenis_kelamin='$jenis_kelamin', email='$email', alamat='$alamat' WHERE username3='$username'";
	$query = mysqli_query($koneksi, $sql);

	if ($query) {
		?>
		<script lang="javascript">
		alert("Data berhasil diperbarui");
		document.location="data_aslab.php";
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