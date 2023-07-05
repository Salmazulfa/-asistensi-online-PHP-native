<!DOCTYPE html>
<html>
<head>
	<title>Koneksi Database</title>
</head>
<body>

	<?php
		$host = "localhost";
		$user = "root";
		$pass = "";
		$database = "asline";
		$koneksi = mysqli_connect($host, $user, $pass, $database);
		if ($koneksi){
			// echo "Status : server connected<br><br>";
		} else {
			echo "Status : server not connected";
		}
	?> 
</body>
</html>