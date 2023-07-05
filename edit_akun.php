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
      $tampil =mysqli_query($koneksi,"SELECT * FROM admin where username1='$username'");
      $aa =mysqli_fetch_array($tampil);
      $tampilan =mysqli_query($koneksi,"SELECT * FROM user where username='$username'");
      $bb =mysqli_fetch_array($tampilan);
    ?>
    <section>
    <form class="form_add g-3 needs-validation" novalidate action="update_admin.php?op=in" method="POST">
    <center>
      <a href="data_admin.php"><i class="fas fa-arrow-circle-left fa-3x mb-3" style="color: #235F5B"></i></a>
      <h4 style="color: #F4F9F8">EDIT DATA</h4></a><hr class="bg-dark">
    </center>
      <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Username</label>
        <input type="text" class="form-control" style="width: 43vh;" id="validationCustom01" required name="username" value="<?php echo $username; ?>">
      </div>
      <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Password</label>
        <input type="password" class="form-control" style="width: 43vh;" id="validationCustom01" name="password" value="<?=$bb['password']?>" required>
      </div>
      <div class="col-md-4">
        <label for="validationCustom01" class="form-label" style="width: 43vh;">Nama Lengkap</label>
        <input type="text" class="form-control" style="width: 43vh;" id="validationCustom01" name="nm_admin" value="<?=$aa['nm_admin']?>" required>
      </div>
      <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Email</label>
        <input type="email" class="form-control" style="width: 43vh;" id="validationCustom01" name="email_admin" value="<?=$aa['email_admin']?>" required>
      </div>
      <br><div class="dropdown">
          <select class="btn btn-#235F5B dropdown-toggle text-white" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" style="width: 43vh;" aria-expanded="false" style="color: #235F5B" name="level" required>
            <option value="<?=$bb['level']?>" selected><?=$bb['level']?></option>
            <option value="Admin">Admin</option>
            <option value="Dosen">Dosen</option>
            <option value="Asisten Praktikum">Asisten Praktikum</option>
            <option value="Mahasiswa">Mahasiswa</option>
          </select>
        </div>
      <br><div class="col-12">
        <button class="btn btn-primary" type="submit" style="width: 43vh;">Edit</button>
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