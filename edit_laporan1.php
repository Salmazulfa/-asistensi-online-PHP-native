<?php  
  session_start();
  include 'koneksi.php';
  $username = $_SESSION['username'];
  $id_laporan = $_GET['id_laporan'];
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

    <title>Edit laporan</title>
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
                    <?php
                         include 'koneksi.php';
                        
                         //Perintah sql untuk menampilkan semua data pada tabel jurusan
                          $sql = "SELECT * FROM matkul";

                          $hasil=mysqli_query($koneksi,$sql);
                          $data = mysqli_fetch_array($hasil);
                         ?>
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
      
  <?php
    $tampil =mysqli_query($koneksi,"SELECT * FROM mhs WHERE username4='$username'");
    $aa =mysqli_fetch_array($tampil);
    $tampilan =mysqli_query($koneksi,"SELECT * FROM file_laporan INNER JOIN praktikum ON file_laporan.prakke=praktikum.id_prak INNER JOIN matkul ON file_laporan.kode_matkul=matkul.id_matkul WHERE id_laporan='$id_laporan'");
    $bb =mysqli_fetch_array($tampilan);
    $id = $bb['id_laporan'];
  ?>

  <div class="kotak3 mt-3">
      <h4 style="color: #F4F9F8">Edit Laporan</h4></a><hr>
      <div class="upload">
        <form  method="post" enctype="multipart/form-data" action="aksi_editLaporan1.php">
            <input type="hidden" class="form-control" id="validationServer01" required name="id" value="<?php echo $id;?>">
          <div class="col-md mt-2">
            <label for="validationServer02" class="form-label">Username</label>
            <input type="text" class="form-control" id="validationServer01" required name="user" value="<?=$username?>">
          </div>
          <div class="col-md mt-2">
            <label for="validationServer02" class="form-label">Praktikum ke-</label>
            <select class="form-select" aria-label="Default select example" name="prakke">
            <option value="<?=$bb['prakke']?>" selected><?=$bb['prak_ke']?></option>
            <?php  
                //Perintah sql untuk menampilkan semua data pada tabel jurusan
                $sql1 = "SELECT * FROM praktikum";

                $hasil1=mysqli_query($koneksi,$sql1);
                $no=0;
                while ($data1 = mysqli_fetch_array($hasil1)) {
                $no++;
               ?>
                <option value="<?php echo $data1['id_prak'];?>"><?php echo $data1['prak_ke'];?></option>
            <?php } ?>
            </select>
          </div>
        <div class="col-md-4 mt-2">
          <label for="validationServer02" class="form-label">Mata Kuliah/Kelas</label>
          <select class="form-select col-md-4" style="width: 44vh;" aria-label="Default select example" name="kode_matkul" required>
            <option class="col-md-3" value="<?=$bb['nm_matkul']?>" selected><?=$bb['nm_matkul']?></option>
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
        <div class="mb-3 mt-2">
          <label for="formFile" class="form-label mt-3">Nama File</label><br>
          <label for="formFile" class="form-label mt-1" style="color: #333667"><b><?=$bb['nm_file']?></b><hr></label>
          <br><label for="formFile" class="form-label">Masukkan File</label>
          <input class="form-control" type="file" id="formFile" name="myFile" >
        </div>
        <div class="col-md-3 mb-3 mt-1">
          <button class="btn btn-primary" type="submit" name="upload">Save</button><br>
           <a href="tugas_mhs.php"><i class="fas fa-arrow-circle-left fa-3x mt-3 mb-3" style="color: #235F5B"></i></a>
        </div>
        </form>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script> -->
    
  </body>
</html>