<?php  
  include 'koneksi.php';

  $komen = $_POST['komen'];
  $yuhuu = $_POST['yuhuu'];
  $prak = $_POST['prak'];
  $id_laporan = $_POST['id_laporan'];

  $insert = $koneksi->query("UPDATE file_laporan SET komentar='$komen', nilai='$yuhuu' where id_laporan='$id_laporan'");
  if($insert){
  ?>
  <script lang="javascript">
  alert("Edit nilai berhasil");
  document.location="nilai_mhs.php";
  </script>
  <?php
  }else{ ?>
    <script lang="javascript">
      alert("Gagal melakukan edit nilai");
      document.location="nilai_mhs.php";
    </script>
  <?php
  }
?>