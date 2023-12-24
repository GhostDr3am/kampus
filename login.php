<?php
session_start();
include "koneksi.php";
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Halaman Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-4">
        <div class="card">
          <div class="card-header text-center">
            <h5><b>Silahkan <span class="text-primary">LOGIN</span></b></h5>
          </div>
          <div class="card-body">
            <?php
            if (isset($_POST['login'])) {
              $email = $_POST['email'];
              $password = md5($_POST['password']);
              $sql = "select * from user where email='$email' and password='$password'";
              $query = mysqli_query($koneksi, $sql);
              $row = mysqli_num_rows($query);
              $data = mysqli_fetch_array($query);
              if ($row > 0) {
                if ($data['verifikasi'] == 'N') {
                  echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
					    <strong>Warning!</strong> Akun ada belum diverifikasi!
					    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
					    </div>";
                } else {
                  $_SESSION['email'] = $data['email'];
                  $_SESSION['level'] = $data['level'];
                  $_SESSION['nama_lengkap'] = $data['nama_lengkap'];
                  header("location:beranda.php");
                }
              } else {
                echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
					  <strong>Warning!</strong> Email atau password anda salah, ulangi lagi!
					  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
					</div>";
              }
            }
            ?>
            <form method="post" action="">
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan email!">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Password</label>
                <input type="password" name="password" id="inputPassword5" class="form-control" placeholder="Masukkan password!">
              </div>
              <div class="mb-3 d-md-flex justify-content-md-end">
                <input type="submit" name="login" value="Login" class="btn btn-primary">
              </div>
            </form>
            Anda belum punya akun? <a href='register.php'>Daftar disini</a>.
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>