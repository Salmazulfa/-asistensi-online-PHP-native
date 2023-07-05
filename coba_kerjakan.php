<?php  
  session_start();
  include 'koneksi.php';
  $username = $_SESSION['username'];
  $id_tugas = $_GET['id_tugas'];
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

    <title>Form Pengumpulan Laporan</title>
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
    $tampilan =mysqli_query($koneksi,"SELECT * FROM file_tugas INNER JOIN dosen ON file_tugas.id_dosen=dosen.id_dosen INNER JOIN matkul ON dosen.id_matkul=matkul.id_matkul INNER JOIN praktikum ON file_tugas.prak=praktikum.id_prak WHERE id_tugas='$id_tugas'");
    $bb =mysqli_fetch_array($tampilan);
  ?>

  <div class="kotak3 mt-3">
      <h4 style="color: #F4F9F8">Upload Laporan</h4></a><hr>
      <div class="upload">
        <form  method="post" enctype="multipart/form-data">
          <div class="col-md">
            <input type="hidden" class="form-control" id="validationServer01" required name="id_mhs" value="<?=$aa['id_mhs']?>">
            <input type="hidden" class="form-control" id="validationServer01" name="id_tugas" required value="<?=$bb['id_tugas']?>">
          </div>
          <div class="col-md-4 mt-2">
            <label for="validationServer02" class="form-label">Presensi</label><br>
            <?php
                $sql1 = "SELECT * FROM presensi";

                $hasil1=mysqli_query($koneksi,$sql1);
                $no=0;
                while ($data1 = mysqli_fetch_array($hasil1)) {
                $no++;
               ?>
                <input class="form-check-input" type="radio" name="id_presensi" id="flexRadioDefault1" checked value="<?php echo $data1['id_presensi'];?>">
                <label class="form-check-label" for="flexRadioDefault1"><?php echo $data1['keterangan'];?>
                </label>
              <?php 
              }
            ?>
          </div>
          <div class="col-md mt-2">
            <label for="validationServer02" class="form-label">Username</label>
            <input type="text" class="form-control" style="width: 43vh;" id="validationServer01" required name="user" value="<?=$username?>">
          </div>
          <div class="col-md mt-2">
            <label for="validationServer02" class="form-label">Praktikum ke-</label>
            <select class="form-select" style="width: 43vh;" aria-label="Default select example" name="prakke">
            <option value="<?=$bb['id_prak']?>" selected><?=$bb['prak_ke']?></option>
            <?php
                $sql2 = "SELECT * FROM praktikum";

                $hasil2=mysqli_query($koneksi,$sql2);
                $no=0;
                while ($data2 = mysqli_fetch_array($hasil2)) {
                $no++;
               ?>
                <option value="<?php echo $data2['id_prak'];?>"><?php echo $data2['prak_ke'];?></option>
              <?php 
              }
            ?>
            </select>
          </div>
        <div class="col-md-4 mt-2">
          <label for="validationServer02" class="form-label">Mata Kuliah/Kelas</label>
          <select class="form-select col-md-4" style="width: 43vh;" aria-label="Default select example" name="kode_matkul" required>
            <option class="col-md-7" value="<?=$bb['id_matkul']?>" selected><?=$bb['nm_matkul']?></option>
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
        <div class="mb-3">
          <label for="formFile" class="form-label mt-3">Masukkan File</label>
          <input class="form-control" type="file" id="formFile" name="myFile" >
          <label for="formFile" class="form-label mt-1" style="color: red"><b>*Forma nama file harus sesuai contoh : NIM_Nama_Laporan-ke1</b></label>
        </div>
        <div class="col-md-3">
          <button class="btn btn-primary mt-1" type="submit" name="upload">Upload</button><br>
          <br><input class="btn btn-primary mt-1 mb-5" type="button" value="Back" onclick="history.back(-1)" />
        </div>
        </form>

        <?php
        // definisi folder upload
        define("UPLOAD_DIR", "uploads/");

        if (!empty($_FILES["myFile"])) {
          $myFile   = $_FILES["myFile"];
          $ext      = pathinfo($_FILES["myFile"]["name"], PATHINFO_EXTENSION);
          $ukuran   = $_FILES["myFile"]["size"];
          $kode_matkul = $_POST['kode_matkul'];
          $tgl      = date("Y-m-d");
          $prakke     = $_POST['prakke'];
          $id_mhs = $_POST['id_mhs'];
          $id_presensi = $_POST['id_presensi'];
          $id_tugas = $_POST['id_tugas'];

          if ($myFile["error"] !== UPLOAD_ERR_OK) {
            ?>
              <script lang="javascript">
              alert("Periksa kembali! gagap upload laporan");
              </script>
            <?php
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
            ?>
              <script lang="javascript">
              alert("Periksa kembali! gagap upload laporan");
              </script>
            <?php
            exit;
          }else{

            $insert = $koneksi->query("INSERT INTO file_laporan (id_mhs, id_tugas, kode_matkul, id_presensi, prakke, tgl, nm_file, size_file, tipe_file) VALUES ('$id_mhs', '$id_tugas', '$kode_matkul', '$id_presensi', '$prakke','$tgl', '$name', '$ukuran', '$ext') ");
            if($insert){
              ?>
                <script lang="javascript">
                alert("Laporan berhasil diupload");
                document.location="tugas_mhs.php";
                </script>
              <?php
            }else{
              echo "$prakke";
            }
          }
          // set permisi file
          chmod(UPLOAD_DIR . $name, 0644);
        }
        ?>
      </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script> -->
    
  </body>
</html>