<?php  
  session_start();
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

    <title>Admin</title>
  </head>
  <body>
    <nav class="navbar">
      <div class="container">
          <img src="logo tanpa tulisan3.png" alt="AsLine" width="60" height="50">
          <h5 style="color: white">Administrator</h5>
          <a class="logout" href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar ?')"><i class="fas fa-sign-out-alt fa-2x" style="color: #40A2AE"></i></a>
      </div>
    </nav>

    <div class="navigator">
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
            <a class="nav-link text-white" href="data_aslab.php"><i class="fas fa-hands-helping"></i>  Asisten Praktikum</a><hr class="bg-light">
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="data_mhs.php"><i class="fas fa-user-graduate"></i>  Data Mahasiswa</a><hr class="bg-light">
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
      <h4 style="color: #F4F9F8">DATA ASISTEN RAKTIKUM</h4></a><hr class="bg-dark">
      <h6><a href="add_aslab.php" style="color: #13405C"><i class="fas fa-plus-circle"></i> Add new asistent praktikum</a></h6>
        <div class="tabel_dosen">
          <!-- On tables -->
          <table class="table table-secondary table-striped">
            <thead>
              <tr>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">Nama</th>
                <th scope="col">TTL</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Email</th>
                <th scope="col">Alamat</th>
                <th scope="col">Mata Kuliah</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no=1;
              include 'koneksi.php';
              $a = "SELECT * FROM user INNER JOIN aslab ON user.username=aslab.username3 INNER JOIN matkul ON aslab.Id_matkull = matkul.id_matkul ORDER BY username3 ASC";
              $b = $koneksi->query($a);

              while ($c=$b->fetch_array()) { ?>
                  <tr>
                    <td><?php echo $c['username3']; ?></td>
                    <td><?php echo $c['password']; ?></td>
                    <td><?php echo $c['nm_aslab']; ?></td>
                    <td><?php echo $c['tempat_lahir'].", ".$c['tgl_lahir']; ?></td>
                    <td><?php echo $c['jenis_kelamin']; ?></td>
                    <td><?php echo $c['email']; ?></td>
                    <td><?php echo $c['alamat']; ?></td>
                    <td><?php echo $c['nm_matkul']; ?></td>
                    <center><td><a href="edit_dataaslab.php?username=<?php echo $c['username']; ?> "><i class="far fa-edit" style="color: #40A2AE"></i>Edit</a><br>
                      <a class="delete" href="delete_aslab.php?username=<?php echo $c['username']; ?> " onClick="return confirm('Apakah Anda Ingin Menghapus Data?')"><i class="fas fa-trash" style="color: #40A2AE"></i> Delete</a>
                  </tr>
                  <?php
                }  
              ?>
            </tbody>
          </table>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>