<?php
	session_start();
	include 'koneksi.php';
	$id_tugas = $_GET['id_tugas'];
	$sql = "DELETE FROM file_tugas where id_tugas = $id_tugas";
	$query = $koneksi->query($sql);
	if ($query) { ?>
		<script lang="javascript">
			alert("File berhasil dihapus");
			document.location="dosen.php";
		</script>
	<?php
	}else {
	 	echo "Kurang moco sholawat!!";
	 	echo $id_tugas;
	} 
?>