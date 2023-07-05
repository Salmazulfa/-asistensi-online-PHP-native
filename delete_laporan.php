<?php
	session_start();
	include 'koneksi.php';
	$id_laporan = $_GET['id_laporan'];
	$sql = "DELETE FROM file_laporan where id_laporan = $id_laporan";
	$query = $koneksi->query($sql);
	if ($query) { ?>
		<script lang="javascript">
			alert("File berhasil dihapus");
			document.location="tugas_mhs.php";
		</script>
	<?php
	}else {
	 	echo "gaiso wooyyy";
	} 
?>