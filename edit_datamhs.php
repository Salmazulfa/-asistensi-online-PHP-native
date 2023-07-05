<?php 
  session_start();
  include 'koneksi.php';
  $username = $_GET['username'];
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

    <title>Edit Account</title>
  </head>
  <body style="background-image: animasi praktikum1.jpg">
    <nav class="navbar">
      <div class="container">
          <img src="logo tanpa tulisan3.png" alt="AsLine" width="60" height="50">
          <h5 style="color: white">Administrator</h5>
      </div>
    </nav>

    <?php
      $tampil =mysqli_query($koneksi,"SELECT * FROM mhs WHERE username4='$username'");
      $aa =mysqli_fetch_array($tampil);
      $tampilan =mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username'");
      $bb =mysqli_fetch_array($tampilan);
    ?>
    <section>
    <form class="form_add g-3 needs-validation" action="aksi_editmhs.php?op=in" method="POST">
    <center><h5 style="color: #F4F9F8">Edit Data (Mahasiswa)</h5></a><hr class="bg-dark"></center>
    <div class="add_kiri">
      <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Username</label>
        <input type="text" class="form-control" style="width: 41vh;" id="validationCustom01" required name="username" value="<?php echo $username;?>">
      </div>
      <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Password</label>
        <input type="password" class="form-control" style="width: 41vh;" id="validationCustom01" required name="password" value="<?=$bb['password']?>">
      </div>
      <div class="col-md-4">
        <label for="validationCustom01" class="form-label" style="width: 41vh;">Nama Lengkap</label>
        <input type="text" class="form-control" style="width: 41vh;" id="validationCustom01" required name="nm_mhs" value="<?=$aa['nm_mhs']?>">
      </div>
      <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Email</label>
        <input type="email" class="form-control" style="width: 41vh;" id="validationCustom01" required name="email" value="<?=$aa['email']?>">
      </div>
       <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Alamat</label>
        <input type="text" class="form-control" style="width: 41vh;" id="validationCustom01" required name="alamat" value="<?=$aa['alamat']?>">
      </div>
      <a href="data_mhs.php"><i class="fas fa-arrow-circle-left fa-3x mt-3 mb-3" style="color: #235F5B"></i></a>
    </div>

    <div class="add_kanan">
      <br><div class="dropdown mt-2">
          <select class="btn btn-#235F5B dropdown-toggle text-white" type="button" style="width: 41vh;" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false" style="color: #235F5B" name="level">
            <option value="<?=$bb['level']?>"><?=$bb['level']?></option>
            <option value="Admin">Admin</option>
            <option value="Dosen">Dosen</option>
            <option value="Asisten Praktikum">Asisten Praktikum</option>
            <option value="Mahasiswa">Mahasiswa</option>
          </select>
      </div>
      <div class="col-md-4">
        <label for="validationServer02" class="form-label" style="width: 41vh;">Tempat Lahir</label>
        <input type="text" class="form-control" style="width: 41vh;" id="validationServer02" name="tempat_lahir" value="<?=$aa['tempat_lahir']?>">
      </div>
      <div class="col-md-4">
        <label for="validationServer02" class="form-label" style="width: 41vh;">Tanggal Lahir</label>
        <input type="date" class="form-control" style="width: 41vh;" id="validationServer02" name="tgl_lahir" value="<?=$aa['tgl_lahir']?>">
      </div>
      <div class="col-md-4 mt-3">
        <label for="validationServer02" class="form-label" style="width: 41vh;">Jenis Kelamin</label>
        <table><tr><td>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="jenis_kelamin" id="flexRadioDefault1" checked value="Laki-Laki" <?php if($aa['jenis_kelamin']=='Laki-Laki') echo 'checked'?>>
            <label class="form-check-label" for="flexRadioDefault1" style="width: 10vh;">
                  Laki-Laki
            </label>
          </div></td>
          <td><div class="form-check">
            <input class="form-check-input" type="radio" name="jenis_kelamin" id="flexRadioDefault2" value="Perempuan" <?php if($aa['jenis_kelamin']=='Perempuan') echo 'checked'?>>
            <label class="form-check-label ml-3" for="flexRadioDefault2">
                  Perempuan
            </label>
          </div></td>
        </tr></table>
      </div>
      <br><div class="col-12">
        <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
      </div>
    </div>
    </form>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
    -->
  </section>
  </body>
</html>