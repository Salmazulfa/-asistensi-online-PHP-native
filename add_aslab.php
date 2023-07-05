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

    <title>Add New Account (Asistent Prak.)</title>
  </head>
  <body style="background-image: animasi praktikum1.jpg">
    <nav class="navbar">
      <div class="container">
          <img src="logo tanpa tulisan3.png" alt="AsLine" width="60" height="50">
          <h5 style="color: white">Administrator</h5>
      </div>
    </nav>

    <!-- <section> -->
    <!-- <div class="navigasi"> -->
    <form class="form_add g-3 needs-validation" action="aksi_addaslab.php?op=in" method="POST">
    <h5 style="color: #F4F9F8">Add New Account (Asisten Praktikum)</h5></a><hr class="bg-dark">
    <div class="add_kiri">
      <div class="col-md-4">
        <label for="validationCustom01" class="form-label" style="width: 43vh;">Username</label>
        <input type="text" class="form-control" style="width: 43vh;" id="validationCustom01" required name="username">
      </div>
      <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Password</label>
        <input type="password" class="form-control" style="width: 43vh;" id="validationCustom01" required name="password">
      </div>
      <div class="col-md-4">
        <label for="validationCustom01" class="form-label" style="width: 43vh;">Nama Lengkap</label>
        <input type="text" class="form-control" style="width: 43vh;" id="validationCustom01" required name="nm_aslab">
      </div>
      <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Email</label>
        <input type="email" class="form-control" style="width: 43vh;" id="validationCustom01" required name="email">
      </div>
       <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Alamat</label>
        <input type="text" class="form-control" style="width: 43vh;" id="validationCustom01" required name="alamat">
      </div>
      <a href="data_aslab.php"><i class="fas fa-arrow-circle-left fa-3x mt-3 mb-3" style="color: #235F5B"></i></a>
    </div>

    <div class="add_kanan">
      <br><div class="dropdown">
        <select class="btn btn-#235F5B dropdown-toggle text-white" style="width: 43vh;" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false" style="color: #235F5B" name="level">
          <option value="Asisten Praktikum" selected>Asisten Praktikum</option>
          <!-- <option value="Admin">Admin</option>
          <option value="Dosen">Dosen</option>
          <option value="Asisten Praktikum">Asisten Praktikum</option>
          <option value="Mahasiswa">Mahasiswa</option> -->
        </select>
      </div>
      <div class="col-md-4">
        <label for="validationServer02" class="form-label">Mata Kuliah/Kelas</label>
        <select class="form-select col-md-4" style="width: 43vh;" aria-label="Default select example" name="matkul">
          <option class="col-md-7" value="" selected>Pilih</option>
          <?php
             include 'koneksi.php';
            
             //Perintah sql untuk menampilkan semua data pada tabel jurusan
              $sql = "SELECT * FROM matkul";

              $hasil=mysqli_query($koneksi,$sql);
              $no=0;
              while ($data = mysqli_fetch_array($hasil)) {
              $no++;
             ?>
              <option value="<?php echo $data['id_matkul'];?>"><?php echo $data['nm_matkul'];?></option>
            <?php 
            }
          ?>
        </select>
      </div>
      <div class="col-md-4">
        <label for="validationServer02" class="form-label">Tempat Lahir</label>
        <input type="text" class="form-control" style="width: 43vh;" id="validationServer02" name="tempat_lahir" value="Asisten Praktikum">
      </div>
      <div class="col-md-4">
        <label for="validationServer02" class="form-label">Tanggal Lahir</label>
        <input type="date" class="form-control" style="width: 43vh;" id="validationServer02" name="tgl_lahir">
      </div>
      <div class="col-md-4 mt-3">
        <label for="validationServer02" class="form-label">Jenis Kelamin</label>
        <table><tr><td>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="jenis_kelamin" id="flexRadioDefault1" checked value="Laki-Laki">
            <label class="form-check-label" for="flexRadioDefault1">
                  Laki-Laki
            </label>
          </div></td>
          <td><div class="form-check">
            <input class="form-check-input" type="radio" name="jenis_kelamin" id="flexRadioDefault2" value="Perempuan">
            <label class="form-check-label ml-3" for="flexRadioDefault2">
                  Perempuan
            </label>
          </div></td>
        </tr></table>
      </div>
      <br><div class="col-12">
        <button class="btn btn-primary" type="submit">Add New Account</button>
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
  <!-- </section> -->
<!-- </div> -->
  </body>
</html>