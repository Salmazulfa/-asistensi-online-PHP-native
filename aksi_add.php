<?php  
	include 'koneksi.php';
	$username = $_POST['username'];
	$password = $_POST['password'];
	$nm_admin = $_POST['nm_admin'];
	$email_admin = $_POST['email_admin'];
	$level = $_POST['level'];

	if ($username=="" || $password=="" || $nm_admin=="" || $email_admin=="" || $level!="Admin") {
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
			document.location="add_new.php";
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

			$sql = "INSERT INTO admin (username1, nm_admin, email_admin) values ('".$username."', '".$nm_admin."', '".$email_admin."')";
			$query = mysqli_query($koneksi, $sql);

			if ($query) {
				?>
				<script lang="javascript">
				alert("Akun berhasil dibuat");
				document.location="add_new.php";
				</script>
				<?php
			}else{
				?>
				<script lang="javascript">
				alert("Data sudah ada!");
				document.location="add_new.php";
				</script>
				<?php
			}
		}
	}
?>