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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/28c8a75296.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style1.css">
    <link rel="stylesheet" type="text/css" href="responsive (1).css">

    <title>Profile</title>
  </head>
  <body>
    <nav class="navbar">
      <div class="container">
          <img src="logo tanpa tulisan3.png" alt="AsLine" width="60" height="50">
          <h5 style="color: white">Administrator</h5>
          <a class="logout" href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar ?')"><i class="fas fa-sign-out-alt fa-2x" style="color: #40A2AE"></i></a>
      </div>
    </nav>

    <div class="navigasi">
    <!-- <section> -->
    <div class="kotak">
      <!-- <div class="col-md-2 bg-light"> -->
        <ul class="nav flex-column ml-3 mb-3">
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

    <?php
      $tampil =mysqli_query($koneksi,"SELECT * FROM admin where username1='$username'");
      $aa =mysqli_fetch_array($tampil);
      $tampilan =mysqli_query($koneksi,"SELECT * FROM user where username='$username'");
      $bb =mysqli_fetch_array($tampilan);
    ?>
    <!-- <div class="navigasi"> -->
    <form class="kotak13 mt-3" action="aksi_admin.php?op=in" method="POST">
      <h4 style="color: #F4F9F8">DATA ADMIN</h4></a><hr class="bg-dark">
      <div class="col-md-4 mb-2">
        <label for="validationServer01" class="form-label">Username</label>
        <input type="text" class="form-control" style="width: 43vh;" id="validationServer01" required name="username" value="<?= $username; ?>">
        <!-- <div class="valid-feedback">
          Looks good!
        </div> -->
      </div>
      <div class="col-md-4 mb-2">
        <label for="validationServer01" class="form-label">Password</label>
        <input type="password" class="form-control" style="width: 43vh;" id="validationServer01" required name="password" value="<?=$bb['password']?>">
        <span class="glyphicon glyphicon-eye-open"></span>
        <!-- <div class="valid-feedback">
          Looks good!
        </div> -->
      </div>
      <div class="col-md-4 mb-2">
        <label for="validationServer02" class="form-label" style="width: 43vh;">Nama Lengkap</label>
        <input type="text" class="form-control" style="width: 43vh;" id="validationServer02" name="nm_admin" value="<?=$aa['nm_admin']?>">
      </div>
      <div class="col-md-4 mb-2">
        <label for="validationServerUsername" class="form-label">Email</label>
        <div class="input-group has-validation" style="width: 43vh;">
          <span class="input-group-text" id="inputGroupPrepend3">@</span>
          <input type="text" class="form-control" id="validationServerUsername" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" name="email_admin" value="<?=$aa['email_admin']?>">
        </div>
      </div>
      <div class="col-12">
        <br><button class="btn btn-primary" type="submit">Save</button>
      </div>
    </form>
      <div class="profil">
      <center><i class="fas fa-user fa-10x" style="color: #A9CCE3"></i>
      <h4><?=$aa['nm_admin']?></h4></center>
     </div>
  <!-- </div> -->

    
    

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script> -->
    
  </body>
</html>