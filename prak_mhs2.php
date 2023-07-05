<?php  
  include 'koneksi.php';
  session_start();
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

    <title>Daftar Tugas</title>
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
                    <a class="nav-link text-white" href="tugas_mhs.php">Daftar Laporan</a>
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

    <!-- <section> -->
  <div class="container_tugas">
    <div class="tugas">
      <center><h4>Grafika Komputer</h4></center><br>
    <?php
    include "koneksi.php";
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
    ?>
      <table class="table table-secondary table-striped">
        <thead>
          <tr>
            <th scope="col">Prak ke-</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Nama</th>
            <th scope="col">Tipe</th>
            <th scope="col">Ukuran</th>
            <!-- <th scope="col">Status</th> -->
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
           <?php
          $no=1;
          include 'koneksi.php';
          $a = "SELECT * FROM file_tugas INNER JOIN dosen ON file_tugas.id_dosen=dosen.id_dosen where id_matkul='3'";
          $b = $koneksi->query($a);
          while ($c=$b->fetch_array()) { ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $c['tgl']; ?></td>
            <td><?php echo $c['deskripsi']; ?></td>
            <td><?php echo $c['nm_file1']; ?></td>
            <td><?php echo $c['tipe_file']; ?></td>
            <td><?php echo bytesToSize($c['size_file']); ?></td>
           <!--  <td>
            <?php
            $cek = "SELECT * FROM file_laporan INNER JOIN file_tugas ON file_laporan.id_tugas=file_tugas.id_tugas INNER JOIN mhs ON file_laporan.id_mhs=mhs.id_mhs where kode_matkul='3'";
            $cek1 = $koneksi->query($cek);
            while ($cek2=$cek1->fetch_array()) {
              // if ($cek2['username4']!=$username) {
              //   echo $username;
              // }else if ($cek2['username4']==$username) {
              //   echo $username;
              // }
              echo $cek2['username4'];
            }
            ?>
            YUHUU
            </td> -->
            <td><a href="coba_kerjakan.php?id_tugas=<?php echo $c['id_tugas']; ?>"><i class="fas fa-edit" style="color: #40A2AE"></i> Kerjakan</a><br>
                <a href="uploads/<?php echo $c['nm_file1']; ?>" ><i class="fas fa-download" style="color: #40A2AE"></i> Download</a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
    <!-- </section> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>