<?php
	session_start();
	include 'koneksi.php';
	$username = $_GET['username'];

	if ($username) {
		$sql = "DELETE FROM aslab where username3='$username'";
		$query = mysqli_query($koneksi, $sql);

		$sql = "DELETE FROM user where username='$username'";
		$query = mysqli_query($koneksi, $sql);
	}?>
	<script lang="javascript">
	alert("Akun berhasil dihapus");
	document.location="data_aslab.php";
	</script>
	<?php
	exit();
?>