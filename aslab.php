<?php
session_start();
include 'koneksi.php';
$username = $_SESSION['username'];
if (!isset($_SESSION['username']) or empty($_SESSION['username'])) {
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

  <title>Dashboard</title>
</head>

<body>
  <nav class="navbar">
    <div class="container bg=light">
      <img src="logo tanpa tulisan3.png" alt="AsLine" width="60" height="50">
      <div class="navbar_mhs">
        <nav class="navbar1 navbar-expand">
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item1">
                <a class="nav-link active text-white" aria-current="page" href="aslab.php">Laporan</a>
              </li>
              <li class="nav-item1">
                <a class="nav-link text-white" href="daftar_tugas(aslab).php">Daftar Tugas</a>
              </li>
              <li class="nav-item1">
                <a class="nav-link text-white" href="nilai(aslab).php">Daftar Nilai</a>
              </li>
              <li class="nav-item1">
                <a class="nav-link text-white" href="profil_aslab.php">Profil</a>
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
      $tampil = mysqli_query($koneksi, "SELECT * FROM aslab INNER JOIN matkul ON aslab.Id_matkull=matkul.id_matkul where username3='$username'");
      $aa = mysqli_fetch_array($tampil);
      $id_matkul = $aa['id_matkul'];
      $nm_aslab = $aa['nm_aslab']; ?>
      <center>
        <h4><?= $aa['nm_matkul'] ?><? echo $nm_aslab;
                                  echo $id_matkul; ?></h4>
      </center><br>

      <?php

      // include "koneksi.php";
      function bytesToSize($bytes, $precision = 2)
      {
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
      ?>
      <table class="table table-secondary table-striped">
        <thead>
          <tr>
            <th scope="col">NIM (Mahasiswa)</th>
            <th scope="col">Nama File</th>
            <th scope="col">Prak ke-</th>
            <th scope="col">Komentar</th>
            <th scope="col">Nilai</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          include 'koneksi.php';
          $a = "SELECT * FROM file_laporan INNER JOIN praktikum ON file_laporan.prakke=praktikum.id_prak INNER JOIN mhs ON file_laporan.id_mhs=mhs.id_mhs WHERE kode_matkul='$id_matkul'";
          $b = $koneksi->query($a);
          while ($c = $b->fetch_array()) {
            echo '
          <tr>
            <td>' . $c['username4'] . '</td>
            <td>' . $c['nm_file'] . '</td>
            <td>' . $c['prak_ke'] . '</td>
            <td>' . $c['komentar'] . '</td>
            <td>' . $c['nilai'] . '</td>
            <td><a href="uploads/' . $c['nm_file'] . '" ><i class="fas fa-download" style="color: #40A2AE"></i> Download</a><br>
                <a href="penilaian.php?id_laporan=' . $c['id_laporan'] . ';"><i class="fas fa-edit" style="color: #40A2AE"></i> Nilai</a>
            </td>
          </tr>
          ';
          } ?>
        </tbody>
      </table>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>