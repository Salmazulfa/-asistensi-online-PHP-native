<?php 
  include 'koneksi.php';
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

    <title>Add new admin</title>
  </head>
  <body style="background-image: animasi praktikum1.jpg">
    <nav class="navbar">
      <div class="container">
          <img src="logo tanpa tulisan3.png" alt="AsLine" width="60" height="50">
          <h5 style="color: white">Administrator</h5>
      </div>
    </nav>

    <!-- <div class="navigasi"> -->
    <!-- <section> -->
    <form class="form_add needs-validation" novalidate action="aksi_add.php?op=in" method="POST">
        <a href="data_admin.php"><i class="fas fa-arrow-circle-left fa-3x mb-2" style="color: #235F5B"></i></a>
        <h5 style="color: #F4F9F8">Add New Admin</h5></a><hr class="bg-dark">
      <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Username</label>
        <input type="text" class="form-control" style="width: 43vh;" id="validationCustom01" name="username" required>
      </div>
      <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Password</label>
        <input type="password" class="form-control" style="width: 43vh;" id="validationCustom01" name="password" required>
      </div>
      <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" style="width: 43vh;" id="validationCustom01" name="nm_admin" required>
      </div>
      <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Email</label>
        <input type="email" class="form-control" style="width: 43vh;" id="validationCustom01" name="email_admin" required>
      </div>
      <br><div class="dropdown">
          <select class="btn btn-#235F5B dropdown-toggle text-white" style="width: 40vh;" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false" style="color: #235F5B" name="level">
            <option value="Admin" selected>Admin</option>
            <option value="Admin">Admin</option>
            <option value="Dosen">Dosen</option>
            <option value="Asisten Praktikum">Asisten Praktikum</option>
            <option value="Mahasiswa">Mahasiswa</option>
          </select>
        </div>
      <br><div class="col-12">
        <button class="btn btn-primary mb-5" style="width: 40vh;" type="submit">Add New Account</button>
      </div>
    </form>
  <!-- </div> -->

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