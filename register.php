<?php
session_start();
include "koneksi.php";
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Halaman Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header text-center">
            <h5><b>Silahkan <span class="text-primary">DAFTAR AKUN</span></b></h5>
          </div>
          <div class="card-body">
            <?php
            if (isset($_POST['daftar'])) {
              $nama_lengkap = $_POST['nama_lengkap'];
              $email = $_POST['email'];
              $password = md5($_POST['password']);
              $level = $_POST['level'];
              $sql = "insert into user values('$email','$password','$nama_lengkap','','','','user_default.jpg'
				      ,'$level')";
              $query = mysqli_query($koneksi, $sql);
              if ($query) {
                header("location:regsukses.php?email=$email");
              }
            }
            ?>
            <form method="POST" action="">
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control" id="exampleFormControlInput1" placeholder="Ketik nama Anda!">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Ketik email!">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Password</label>
                <input type="password" name="password" id="inputPassword5" class="form-control" placeholder="Ketik password baru!">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Daftar Sebagai</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="level" id="gridRadios1" value="pembeli" checked>
                  <label class="form-check-label" for="gridRadios1">
                    Pembeli
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="level" id="gridRadios1" value="penjual">
                  <label class="form-check-label" for="gridRadios1">
                    Penjual
                  </label>
                </div>
              </div>
              <div>
                <input type="submit" name="daftar" value="DAFTAR" class="btn btn-primary">
              </div>
            </form>
            Anda sudah punya akun? <a href='auth-login.php'>Login disini</a>.
          </div>
        </div><br>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
</body>

</html>