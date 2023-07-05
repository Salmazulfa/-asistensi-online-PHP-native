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
    <!-- <link rel="stylesheet" type="text/css" href="responsive (1).css"> -->

    <title>Dashboard</title>
  </head>
  <body>
    <nav class="navbar">
      <div class="container">
        <img src="logo tanpa tulisan3.png" alt="AsLine" width="60" height="50">
        <div class="navbar_mhs">
          <nav class="navbar1 navbar-expand">
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item1">
                    <a class="nav-link active text-white" aria-current="page" href="mhs_dashboard.php">Dashboard</a>
                  </li>
                  <li class="nav-item1 dropdown" name="menu_matkul">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Praktikum
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <!-- <?php
                         include 'koneksi.php';
                        
                         //Perintah sql untuk menampilkan semua data pada tabel jurusan
                          $sql = "SELECT * FROM matkul";

                          $hasil=mysqli_query($koneksi,$sql);
                          $data = mysqli_fetch_array($hasil);
                         ?>
                          <li><a class="dropdown-item" href="#"><?php echo $data['nm_matkul'];?></a></li>
                          <li><a class="dropdown-item" href="#"><?php echo $data['nm_matkul'];?></a></li>
                          <li><a class="dropdown-item" href="#"><?php echo $data['nm_matkul'];?></a></li> -->
                          <li><a class="dropdown-item" href="prak_mhs.php">Pemrograman Web</a></li>
                          <li><a class="dropdown-item" href="prak_mhs1.php">Jaringan Komputer</a></li>
                          <li><a class="dropdown-item" href="prak_mhs2.php">Grafika Komputer</a></li>
                    </ul>
                  </li>
                  <li class="nav-item1">
                    <a class="nav-link text-white" href="tugas_mhs.php">Laporan</a>
                  </li>
                  <li class="nav-item1">
                    <a class="nav-link text-white" href="profil_mhs.php">Profile</a>
                  </li>
                  </ul>
                </div>
            </nav>
        </div>
        <a class="logout" href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar ?')"><i class="fas fa-sign-out-alt fa-2x" style="color: #40A2AE"></i></a>
      </div>
    </nav>

  <div class="navigasi">
   <div class="kartun">
     <center><img src="praktikum.png" width="500px" height="300px">
     <h5>"Setiap orang bisa mencuri idemu, tapi tidak setiap orang bisa mencuri eksekusimu."<br></h5><h6>– Nadiem Makarim</h6></center>
   </div>


  <div class="kotak5">
    <h4 style="color: #F4F9F8">MATA KULIAH PRAKTIKUM</h4></a><hr>
    <div class="row">
        <div class="kotak6 mb-3"  style="width: 18rem;">
          <div class="card-body1">
            <h5 class="card-title mt-3 mb-3">Pemrograman Web</h5>
            <center><div class="display-4"><i class="fas fa-blog"></i></div></center>
            <a href="prak_mhs.php"><p class="card-text">Lihat detail <i class="fas fa-angle-double-right"></i></p></a>
          </div>
        </div>
        <div class="kotak6 mb-3" style="width: 18rem;">
          <div class="card-body1">
            <h5 class="card-title mt-3">Jaringan Komputer</h5>
            <center><div class="display-4"><i class="fas fa-project-diagram"></i></div></center>
            <a href="prak_mhs1.php"><p class="card-text">Lihat detail <i class="fas fa-angle-double-right"></i></i></p></a>
          </div>
        </div>
        <div class="kotak6 mb-3" style="width: 18rem;">
          <div class="card-body1">
            <h5 class="card-title mt-3">Grafika Komputer</h5>
            <center><div class="display-4"><i class="fas fa-baby"><i class="fas fa-alien-monster"></i></i></div></center>
            <a href="prak_mhs2.php"><p class="card-text">Lihat detail <i class="fas fa-angle-double-right"></i></p></a>
          </div>
        </div>
        </div>
      </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>