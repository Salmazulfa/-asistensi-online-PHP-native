<?php 
  session_start();
  include 'koneksi.php';
  $id_tugas = $_GET['id_tugas'];
  if (!isset($_SESSION['username']) OR empty($_SESSION['username'])) {
  echo "<script>alert('Anda belum login, silahkan login dulu :))')</script>";
  echo "<script>location='home.php'</script>";
  exit();
  }
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/28c8a75296.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style1.css">
	<title>Edit Tugas</title>
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
                <a class="nav-link text-white" href="#">Data Nilai</a>
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

  <?php
    $tampil =mysqli_query($koneksi,"SELECT * FROM file_tugas INNER JOIN praktikum ON file_tugas.prak=praktikum.id_prak WHERE id_tugas='$id_tugas'");
    $aa =mysqli_fetch_array($tampil);
    $id = $aa['id_tugas'];
  ?>
  <div class="kotak3 mt-3">
          <a href="dosen.php"><i class="fas fa-arrow-circle-left fa-3x mt-1 mb-3" style="color: #235F5B"></i></a>
    <h4 style="color: #F4F9F8">Pemrograman Web</h4></a><hr>
    <!-- <div class="upload"> -->
       
      <form  method="post" enctype="multipart/form-data" action="aksi_editFileTugas1.php">
        <div class="col-md mt-2">
          <input type="hidden" class="form-control" id="validationServer01" required name="id" value="<?php echo $id; ?>">
          <label for="validationServer02" class="form-label">Praktikum ke-</label>
          <select class="form-select" aria-label="Default select example" name="prak">
          <option value="<?=$aa['prak']?>" selected><?=$aa['prak_ke']?></option>
          <?php
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
        <div class="mb-3">
          <label for="formFile" class="form-label mt-3">Nama File</label><br>
          <label for="formFile" class="form-label mt-1" style="color: #333667"><b><?=$aa['nm_file1']?></b><hr></label><br>
          <label for="formFile" class="form-label">Masukkan File</label>
          <input class="form-control" type="hidden" id="formFile" name="fileLama" value="<?=$aa['nm_file']?>">
          <input class="form-control" type="file" id="formFile" name="myFile">
        </div>
        <div class="mt-2">
          <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="deskripsi" required><?=$aa['deskripsi']?></textarea>
        </div>
        <div class="col-md-3 mt-1 mb-5">
          <br><button class="btn btn-primary" type="submit" name="upload">Save</button>
        </div>
        </form>
      </div>
    <!-- </div> -->
</body>
</html>