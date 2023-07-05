<?php 
  session_start();
  include 'koneksi.php'; 
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
    <link rel="stylesheet" type="text/css" href="responsive (1).css">

    <title>admin</title>
  </head>
  <body>

    <nav class="navbar">
      <div class="container bg=light">
        <img src="logo tanpa tulisan3.png" alt="AsLine" width="60" height="50">
        <h5 style="color: white">Administrator</h5>
        <a class="logout" href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar ?')"><i class="fas fa-sign-out-alt fa-2x" style="color: #40A2AE"></i></a>
      </div>
    </nav>

    <div class="navigasi">
    <!-- <section> -->
    <div class="kotak">
      <!-- <div class="col-md-2 bg-light"> -->
        <ul class="nav flex-column ml-3 mb-3 bg-light">
          <li class="nav-item">
            <a class="nav-link active text-white ml-2 mt-3 pr-3" href="admin.php"><i class="fas fa-tachometer-alt ml-3"></i>  Dashboard</a><hr class="bg-light">
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="data_admin.php"><i class="fas fa-users-cog"></i>  Data Admin</a><hr class="bg-light">
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="data_dosen.php"><i class="fas fa-chalkboard-teacher"></i>  Data Dosen</a><hr class="bg-light">
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="data_mhs.php"><i class="fas fa-user-graduate"></i>  Data Mahasiswa</a><hr class="bg-light">
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="data_aslab.php"><i class="fas fa-hands-helping"></i>  Asisten Praktikum</a><hr class="bg-light">
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="nilai_mhs.php"><i class="fas fa-chart-bar"></i>  Nilai Mahasiswa</a><hr class="bg-light">
          </li>
          <li class="nav-item">
            <a class="nav-link text-white mr-2" href="profil_admin.php"><i class="fas fa-user-alt"></i>  Profil</a><hr class="bg-light">
          </li>
        </ul>
      </div>
    </div>

    <div class="kotak1 mt-3">
      <h4 style="color: #F4F9F8">DASHBOARD</h4></a><hr>
        <div class="row">
          <div class="kotak2 ml-3" style="width: 17rem;">
            <div class="card-body">
              <h5 class="card-titl">Jumlah Mahasiswa</h5>
              <center><div class="display-4">
                <?php  
                  include 'koneksi.php';
                  $sql = "select * from mhs";
                  $a=$koneksi->query($sql);
                  $jml_mhs = mysqli_num_rows($a);
                  echo $jml_mhs;
                ?>
              </div></center>
              <a href="data_mhs.php"><p class="card-text">Lihat detail <i class="fas fa-angle-double-right"></i></p></a>
            </div>
          </div>
          <div class="kotak2 ml-3" style="width: 17rem;">
            <div class="card-body">
              <h5 class="card-title">Jumlah Dosen</h5>
              <center><div class="display-4">
                <?php  
                  include 'koneksi.php';
                  $sql = "select * from dosen";
                  $a=$koneksi->query($sql);
                  $jml_mhs = mysqli_num_rows($a);
                  echo $jml_mhs;
                ?>
              </div></center>
              <a href="data_dosen.php"><p class="card-text">Lihat detail <i class="fas fa-angle-double-right"></i></i></p></a>
            </div>
          </div>
          <div class="kotak2 ml-3" style="width: 17rem;">
            <div class="card-body">
              <h5 class="card-title">Jumlah Admin</h5>
              <center><div class="display-4">
                <?php  
                  include 'koneksi.php';
                  $sql = "select * from admin";
                  $a=$koneksi->query($sql);
                  $jml_mhs = mysqli_num_rows($a);
                  echo $jml_mhs;
                ?>
              </div></center>
              <a href="data_admin.php"><p class="card-text">Lihat detail <i class="fas fa-angle-double-right"></i></p></a>
            </div>
          </div>
          <div class="kotak2 ml-3" style="width: 17rem;">
            <div class="card-body">
              <h5 class="card-title">Nilai Mahasiswa</h5>
              <div class="display-4"><center><i class="fas fa-chart-bar fas-3x"></i></center></div>
              <a href="nilai_mhs.php"><p class="card-text">Lihat detail <i class="fas fa-angle-double-right"></i></p></a>
            </div>
          </div>
        </div>
      </div>
    <!-- </section> -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>