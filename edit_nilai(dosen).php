<?php 
  session_start();
  include 'koneksi.php';
  $id_laporan = $_GET['id_laporan'];
  $username = $_SESSION['username'];
  if (!isset($_SESSION['username']) OR empty($_SESSION['username'])) {
  echo "<script>alert('Anda belum login, silahkan login dulu :))')</script>";
  echo "<script>location='home.php'</script>";
  exit();
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/28c8a75296.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style1.css">

    <title>Penilaian</title>
  </head>
  <body>
    <nav class="navbar">
      <div class="container bg=light">
        <img src="logo tanpa tulisan3.png" alt="AsLine" width="60" height="50">
        <a class="logout" href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar ?')"><i class="fas fa-sign-out-alt fa-2x" style="color: #40A2AE"></i></a>
      </div>
    </nav>

    <?php  
      $tampil =mysqli_query($koneksi,"SELECT * FROM dosen where username2='$username'");
      $aa =mysqli_fetch_array($tampil);
      $tampilan =mysqli_query($koneksi,"SELECT * FROM file_laporan INNER JOIN praktikum ON file_laporan.prakke=praktikum.id_prak WHERE id_laporan='$id_laporan'");
      $bb =mysqli_fetch_array($tampilan);
    ?>
    <div class="kotak3 mt-3">
      <h4 style="color: #F4F9F8">Form Penilaian</h4></a><hr>
      <div class="upload">
        <form  method="post" enctype="multipart/form-data" action="aksi_nilai(dosen).php">
          <div class="col-md">
          <input type="hidden" class="form-control" id="validationServer01" required name="id_laporan" value="<?=$bb['id_laporan']?>">
          </div>
          <div class="col-md">
            <label for="validationServer02" class="form-label">Praktikum ke-</label>
            <select class="form-select" aria-label="Default select example" name="prak">
            <option value="<?=$bb['prakke']?>" selected><?=$bb['prak_ke']?></option>
            <?php
                $sql1 = "SELECT * FROM praktikum";

                $hasil1=mysqli_query($koneksi,$sql1);
                $no=0;
                while ($data1 = mysqli_fetch_array($hasil1)) {
                $no++;
               ?>
                <option value="<?php echo $data1['id_prak'];?>"><?php echo $data1['prak_ke'];?></option>
            <?php } ?>
            </select>
          </div>
          <div class="mt-2">
            <label for="exampleFormControlTextarea1" class="form-label">Komentar</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="komen"><?=$bb['komentar']?></textarea>
          </div>
          <div class="col-md mt-2">
            <label for="validationServer02" class="form-label">Nilai</label>
            <input type="text" class="form-control" id="validationServer01" name="yuhuu" value="<?=$bb['nilai']?>">
            <!-- <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required name="yuhuu"></textarea> -->
          </div>
          <div class="col-md-2">
            <br><button class="btn btn-primary" type="submit" name="nilai">Nilai</button>
            <a href="nilai(dosen).php"><i class="fas fa-arrow-circle-left fa-3x mt-2 mb-3" style="color: #235F5B"></i></a>
          </div>
        </form>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>