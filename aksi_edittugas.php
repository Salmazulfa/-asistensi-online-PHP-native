<?php 
	include 'koneksi.php';
	define("UPLOAD_DIR", "uploads/");

        if (!empty($_FILES["myFile"])) {
          $myFile   = $_FILES["myFile"];
          $ext      = pathinfo($_FILES["myFile"]["name"], PATHINFO_EXTENSION);
          $ukuran   = $_FILES["myFile"]["size"];
          $deskripsi= $_POST['deskripsi'];
          // $dosen = $_POST['matkul'];
          $tgl      = date("Y-m-d");
          // $user     = $_POST['user'];
          $prak     = $_POST['prak'];
          // $id_dosen = $_POST['id_dosen'];

          if ($myFile["error"] !== UPLOAD_ERR_OK) {
            echo '<div >Gagal upload file.</div>';
            exit;
          }

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

            $insert = $koneksi->query("UPDATE file_tugas SET prak=$prak, tgl=$tgl, deskripsi=$deskripsi, nm_file=$name, size_file=$ukuran, tipe_file=$ext where id_tugas=$id_tugas");
            if($insert){
              ?>
                <script lang="javascript">
                alert("Data berhasil diperbarui");
                document.location="edit_filetugas.php";
                </script>
              <?php
            }else{
              ?>
                <script lang="javascript">
                alert("Gagal Menyimpan Perubahan");
                document.location="edit_filetugas.php";
                </script>
              <?php
            }
          }
          // set permisi file
          chmod(UPLOAD_DIR . $name, 0644);
        }
        ?>
?>