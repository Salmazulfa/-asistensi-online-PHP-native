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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/28c8a75296.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style1.css">
    <link rel="stylesheet" type="text/css" href="responsive (1).css">

    <title>Dashboard</title>
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
                    <a class="nav-link text-white" href="nilai(dosen).php">Data Nilai</a>
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
      $tampil =mysqli_query($koneksi,"SELECT * FROM dosen WHERE username2='$username'");
      $aa =mysqli_fetch_array($tampil);
    ?>
    <div class="navigator">
    <div class="kotak3 mt-3">
      <h4 style="color: #F4F9F8">Upload Tugas</h4></a><hr>
        <form  method="post" enctype="multipart/form-data">
          <div class="col-md">
          <input type="hidden" class="form-control" id="validationServer01" required name="id_dosen" value="<?=$aa['id_dosen']?>">
        </div>
          <div class="col-md mt-2">
            <label for="validationServer02" class="form-label">Username</label>
            <input type="text" class="form-control" id="validationServer01" required name="user" value="<?php echo $_SESSION['username'] ?>">
          </div>
          <div class="col-md mt-2">
            <label for="validationServer02" class="form-label">Praktikum ke-</label>
            <select class="form-select" aria-label="Default select example" name="prak">
            <option value="" selected>Pilih</option>
            <?php  
                for ($prak=1; $prak <= 5; $prak++) { ?>
                  <option value="<?php echo $prak ?>"><?php echo $prak ?></option>
            <?php } ?>
            </select>
          </div>
        <div class="mb-3">
          <label for="formFile" class="form-label mt-3">Masukkan File</label>
          <input class="form-control" type="file" id="formFile" name="myFile" >
        </div>
        <div class="mt-2">
          <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="deskripsi" required></textarea>
        </div>
        <div class="col-md-3 mt-2">
          <br><button class="btn btn-primary" type="submit" name="upload">Upload</button>
        </div>
        </form>

        <?php
        // definisi folder upload
        define("UPLOAD_DIR", "uploads/");

        if (!empty($_FILES["myFile"])) {
          $myFile   = $_FILES["myFile"];
          $ext      = pathinfo($_FILES["myFile"]["name"], PATHINFO_EXTENSION);
          $ukuran   = $_FILES["myFile"]["size"];
          $deskripsi= $_POST['deskripsi'];
          $tgl      = date("Y-m-d");
          $prak     = $_POST['prak'];
          $id_dosen = $_POST['id_dosen'];

          if ($myFile["error"] !== UPLOAD_ERR_OK) {
            echo '<div >Gagal upload file.</div>';
            exit;
          }

          // filename yang aman
          $name = preg_replace("/[^A-Z0-9.-]/i", "", $myFile["name"]);

          // mencegah overwrite filename
          $i = 0;
          $parts = pathinfo($name);
          while (file_exists(UPLOAD_DIR . $name)) {
            $i++;
            $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
          }

          // upload file
          $success = move_uploaded_file($myFile["tmp_name"],
            UPLOAD_DIR . $name);
          if (!$success){ 
            echo '<div >Gagal upload file.</div>';
            exit;
          }else{

            $insert = $koneksi->query("INSERT INTO file_tugas (id_dosen, prak, tgl, deskripsi, nm_file1, size_file, tipe_file) values ('$id_dosen', '$prak', '$tgl', '$deskripsi', '$name', '$ukuran', '$ext')");
            if($insert){
              ?>
                <script lang="javascript">
                alert("File berhasil diupload");
                document.location="dosen.php";
                </script>
              <?php
            }else{
              mysqli_error();
            }
          }
          // set permisi file
          chmod(UPLOAD_DIR . $name, 0644);
        }
        ?>
    </div>
  </div>

    <!-- <section> -->
    <div class="container_tugas">
    <div class="tugas">
    <center><h4>Daftar Tugas Praktikum</h4></center><br>
    <?php

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
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $no=1;
          $a = "SELECT * FROM file_tugas INNER JOIN praktikum ON file_tugas.prak=praktikum.id_prak INNER JOIN dosen ON file_tugas.id_dosen=dosen.id_dosen AND username2='$username' order by prak asc";
          $b = $koneksi->query($a);
          while ($c=$b->fetch_array()) { ?>
          <tr>
            <td><?php echo $c['prak_ke']; ?></td>
            <td><?php echo $c['tgl']; ?></td>
            <td><?php echo $c['deskripsi']; ?></td>
            <td><?php echo $c['nm_file1']; ?></td>
            <td><?php echo $c['tipe_file']; ?></td>
            <td><?php echo bytesToSize($c['size_file']); ?></td>
            <td><a href="edit_filetugas.php?id_tugas=<?php echo $c['id_tugas']; ?>"><i class="fas fa-edit" style="color: #40A2AE"></i> Edit</a><br>
                <a href="uploads/<?php echo $c['nm_file1']; ?>" ><i class="fas fa-download" style="color: #40A2AE"></i> Download</a><br>
                <a class="delete" href="delete_filetugas.php?id_tugas=<?php echo $c['id_tugas']; ?>" onclick="return confirm('Apakah anda ingin menghapus file?')"><i class="fas fa-trash" style="color: #40A2AE"></i> Delete</a>
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