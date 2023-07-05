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

    <title>profil</title>
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
      $tampil =mysqli_query($koneksi,"SELECT * FROM dosen where username2='$username'");
      $aa =mysqli_fetch_array($tampil);
      $tampilan =mysqli_query($koneksi,"SELECT * FROM user where username='$username'");
      $bb =mysqli_fetch_array($tampilan);
    ?>
    <div class="navigator">
    <form class="kotak3 g-3 mt-3" method="POST" action="edit_profildosen.php">
      <h4 style="color: #F4F9F8"><i class="fas fa-user-alt"></i>  PROFIL - <?php echo $_SESSION['username'] ?></h4><hr class="bg-dark">
      <div class="add_kiri">
      <div class="col-md-4">
        <label for="validationServer01" class="form-label" style="width: 43vh;">NIM (Username)</label>
        <input type="text" class="form-control" style="width: 43vh;" id="validationServer01" required name="username" value="<?php echo $_SESSION['username'] ?>">
      </div> 
      <div class="col-md-4 mt-2">
        <label for="validationServer01" class="form-label">Password</label>
        <input type="password" class="form-control" style="width: 43vh;" id="validationServer01" required name="password" value="<?=$bb['password']?>">
      </div>
      <div class="col-md-4 mt-2">
        <label for="validationServer01" class="form-label" style="width: 43vh;">Nama Lengkap</label>
        <input type="text" class="form-control" style="width: 43vh;" id="validationServer01" required name="nm_dosen" value="<?=$aa['nm_dosen']?>">
      </div>
      <div class="col-md-4 mt-2">
        <label for="validationServerUsername" class="form-label">Email</label>
        <div class="input-group has-validation" style="width: 43vh;">
          <span class="input-group-text" id="inputGroupPrepend3">@</span>
          <input type="email" class="form-control" style="width: 36vh;" id="validationServerUsername" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" name="email" value="<?=$aa['email']?>">
        </div>
      </div>
      <div class="col-md-4 mt-3">
        <label for="validationServer02" class="form-label" style="width: 43vh;">Jenis Kelamin</label>
        <table><tr><td>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="jenis_kelamin" id="flexRadioDefault1" checked value="Laki-Laki" <?php if($aa['jenis_kelamin']=='Laki-Laki') echo 'checked'?>>
            <label class="form-check-label" style="width: 10vh;" for="flexRadioDefault1">
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
      </div>
      <div class="add_kanan">
      <div class="col-md-4">
        <label for="validationServer02" class="form-label">Tempat Lahir</label>
        <input type="text" class="form-control" style="width: 45vh;" id="validationServer02" name="tempat_lahir" value="<?=$aa['tempat_lahir']?>">
      </div>
      <div class="col-md-4 mt-2">
        <label for="validationServer02" class="form-label">Tanggal Lahir</label>
        <input type="date" class="form-control" style="width: 45vh;" id="validationServer02" name="tgl_lahir" value="<?=$aa['tgl_lahir']?>">
      </div>
      <div class="mb-4 mt-2 mb-1">
        <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat" value="<?=$aa['alamat']?>"><?=$aa['alamat']?></textarea>
      </div>
      <div class="col-md-3 mt-5">
        <br><button class="btn btn-primary" style="width: 40vh;" type="submit">Edit</button>
      </div>
      </div>
    </form>
  </div>
    

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script> -->
    
  </body>
</html>