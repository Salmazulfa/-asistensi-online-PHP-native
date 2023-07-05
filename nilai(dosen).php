<?php  
  session_start();
  include 'koneksi.php';
  if (!isset($_SESSION['username']) OR empty($_SESSION['username'])) {
  echo "<script>alert('Anda belum login, silahkan login dulu :))')</script>";
  echo "<script>location='home.php'</script>";
  exit();
  }
  $username = $_SESSION['username'];
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
                      <a class="nav-link active text-white" aria-current="page" href="dosen.php">Praktikum</a>
                   </li>
                  <li class="nav-item1">
                    <a class="nav-link text-white" href="nilai(dosen).php">Data Nilai</a>
                  </li>
                  <li class="nav-item1">
                    <a class="nav-link text-white" href="profil_dosen.php">Profile</a>
                  </li>
                  </ul>
                </div>
            </nav>
        </div>
        <a class="logout" href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar ?')"><i class="fas fa-sign-out-alt fa-2x" style="color: #40A2AE"></i></a>
      </div>
    </nav>

    <div class="container_tugas">
    <div class="tugas">

      <?php  
      $tampil =mysqli_query($koneksi,"SELECT * FROM dosen INNER JOIN matkul ON dosen.id_matkul=matkul.id_matkul where username2='$username'");
      $aa =mysqli_fetch_array($tampil);
      $id_matkul = $aa['id_matkul'];?>

      <center><h4>Data Nilai Mahasiswa</h4></center><br>
          <table class="table table-secondary table-striped">
            <thead>
              <tr>
                <th scope="col">Username</th>
                <th scope="col">Nama</th>
                <th scope="col">Prak ke-</th>
                <th scope="col">Presensi</th>
                <th scope="col">Nilai Prak</th>
                <th scope="col">Nama Asisten Prak.</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
             <?php
              $no=1;
              $a = "SELECT * FROM file_laporan INNER JOIN praktikum ON file_laporan.prakke=praktikum.id_prak INNER JOIN mhs ON file_laporan.id_mhs=mhs.id_mhs INNER JOIN aslab ON aslab.id_aslab=file_laporan.id_aslab INNER JOIN presensi ON file_laporan.id_presensi=presensi.id_presensi WHERE kode_matkul='$id_matkul'";
              $b = $koneksi->query($a);
              while ($c=$b->fetch_array()) { ?>
                  <tr>
                    <td><?php echo $c['username4']; ?></td>
                    <td><?php echo $c['nm_mhs']; ?></td>
                    <td><?php echo $c['prak_ke']; ?></td>
                    <td><?php echo $c['keterangan']; ?></td>
                    <td><?php echo $c['nilai']; ?></td>
                    <td><?php echo $c['nm_aslab']; ?></td>
                    <center><td><a href="edit_nilai(dosen).php?id_laporan=<?php echo $c['id_laporan']; ?> "><i class="far fa-edit" style="color: #40A2AE"></i>Edit</a></td>
                    </center>
                  </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>