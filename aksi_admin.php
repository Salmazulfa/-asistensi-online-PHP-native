<?php  
	include 'koneksi.php';
	$username = $_POST['username'];
	$password = $_POST['password'];
	$nm_admin = $_POST['nm_admin'];
	$email_admin = $_POST['email_admin'];
	
	$sql = "UPDATE user SET password='$password' WHERE username='$username'";
	$query = mysqli_query($koneksi, $sql);
	$sql = "UPDATE admin SET nm_admin='$nm_admin', email_admin='$email_admin' WHERE username1='$username'";
	$query = mysqli_query($koneksi, $sql);
	if ($query) {?>
		<script lang="javascript">
		alert("Data berhasil diperbarui");
		document.location="profil_admin.php";
		</script>
		<?php
		}else{
		mysql_error();
		?>
		<script lang="javascript">
		alert("Data gagal diperbarui!");
		document.location="profil_admin.php";
		</script>
	<?php
	}
?>