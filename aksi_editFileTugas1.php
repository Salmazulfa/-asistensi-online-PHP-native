<?php
include "koneksi.php";
 
$id_tugas = $_POST['id'];
$tgl      = date("Y-m-d");
$prak     = $_POST['prak'];
$deskripsi = $_POST['deskripsi'];
$myFile   = $_FILES["myFile"];


function bytesToSize($bytes, $precision = 2){  
$kilobyte = 1024;
$megabyte = $kilobyte * 1024;
$gigabyte = $megabyte * 1024;
$terabyte = $gigabyte * 1024;
       
if (($bytes >= 0) && ($bytes < $kilobyte)) {
  return $bytes . ' B';
} elseif (($bytes >= $kilobyte) && ($bytes < $megabyte)) {
  return round($bytes / $kilobyte, $precision) . ' KB';
} elseif (($bytes >= $megabyte) && ($bytes < $gigabyte)) {
  return round($bytes / $megabyte, $precision) . ' MB';
} elseif (($bytes >= $gigabyte) && ($bytes < $terabyte)) {
  return round($bytes / $gigabyte, $precision) . ' GB';
} elseif ($bytes >= $terabyte) {
  return round($bytes / $terabyte, $precision) . ' TB';
} else {
  return $bytes . ' B';
}
}

// definisi folder upload
        define("UPLOAD_DIR", "uploads/");

        if ($myFile["error"] !== UPLOAD_ERR_OK){
            $edit = "UPDATE file_tugas SET prak='$prak', deskripsi='$deskripsi' WHERE id_tugas='$id_tugas'";
            $query = mysqli_query($koneksi, $edit);
            if($query){
              ?>
                <script lang="javascript">
                alert("File berhasil diperbarui");
                document.location="dosen.php";
                </script>
              <?php
            }else{
              echo "Kurang moco sholawat!! Moco seng akeh makane :))";
            }
        }else if ($_FILES["myFile"]!="") {
          $myFile   = $_FILES["myFile"];
          $ext      = pathinfo($_FILES["myFile"]["name"], PATHINFO_EXTENSION);
          $ukuran   = $_FILES["myFile"]["size"];

          // if ($myFile["error"] !== UPLOAD_ERR_OK) {
          //   echo '<div >Gagal upload file.</div>';
          // }

          // filename yang aman
          $name = preg_replace("/[^A-Z0-9.-]/i", "", $myFile["name"]);

          // mencegah overwrite filename
          $i = 0;
          $parts = pathinfo($name);
          while (file_exists(UPLOAD_DIR . $name)) {
            $i++;
            $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
          }

          // upload file
          $success = move_uploaded_file($myFile["tmp_name"],
            UPLOAD_DIR . $name);
          if (!$success){ 
            echo '<div >Gagal upload file.</div>';
            exit;
          }else{

            // $sql = "UPDATE file_laporan SET kode_matkul='$kode_matkul', prakke='$prakke', tgl='$tgl', nm_file='$name', size_file='$ukuran', tipe_file='$ext' WHERE id_laporan='$id_laporan'";
            $sql = "UPDATE file_tugas SET prak='$prak', deskripsi='$deskripsi', nm_file1='$name', size_file='$ukuran', tipe_file='$ext' WHERE id_tugas='$id_tugas'";
            $query = mysqli_query($koneksi, $sql);
            if($query){
              ?>
                <script lang="javascript">
                alert("File berhasil diperbarui");
                document.location="dosen.php";
                </script>
              <?php
            }else{
              echo "Kurang moco sholawat!! Moco seng akeh makane :))";
            }
        }
  }
?>