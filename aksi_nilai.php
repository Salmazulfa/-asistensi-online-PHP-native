<?php  
  include 'koneksi.php';

  $id_aslab = $_POST['id_aslab'];
  $komen = $_POST['komen'];
  $yuhuu = $_POST['yuhuu'];
  $prak = $_POST['prak'];
  $id_laporan = $_POST['id_laporan'];

  if ($yuhuu == "") {
   $insert = $koneksi->query("UPDATE file_laporan SET id_aslab='$id_aslab', komentar='$komen' where id_laporan='$id_laporan'");
    if($insert){
    ?>
    <script lang="javascript">
    alert("Penilaian berhasil");
    document.location="aslab.php";
    </script>
    <?php
    }else{ 
      echo $yuhuu;
    }
  } else if ($komen == "") {
    $insert = $koneksi->query("UPDATE file_laporan SET id_aslab='$id_aslab', nilai='$yuhuu' where id_laporan='$id_laporan'");
    if($insert){
    ?>
    <script lang="javascript">
    alert("Penilaian berhasil");
    document.location="aslab.php";
    </script>
    <?php
    }else{ 
      echo $komen;
    }
  } else if ($yuhuu != "" && $komen != "") {
    $insert = $koneksi->query("UPDATE file_laporan SET id_aslab='$id_aslab', komentar='$komen', nilai='$yuhuu' where id_laporan='$id_laporan'");
    if($insert){
    ?>
    <script lang="javascript">
    alert("Penilaian berhasil");
    document.location="aslab.php";
    </script>
    <?php
    }else{ 
      echo $id_aslab.'-'.$komen.'-'.$yuhuu;
    }
  } else {
    echo "Tidak ada kolom yang terisi";
  }
?>