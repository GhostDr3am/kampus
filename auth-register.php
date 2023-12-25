<?php
session_start();
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register </title>
  <link rel="shortcut icon" href="./assets/compiled/svg/favicon.svg" type="image/x-icon">
  <link rel="stylesheet" href="./assets/compiled/css/app.css">
  <link rel="stylesheet" href="./assets/compiled/css/app-dark.css">
  <link rel="stylesheet" href="./assets/compiled/css/auth.css">
</head>

<body>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-8">
        <div class="card">
          <div class="card">
            <div class="card-header text-center">
              <h4 class="card-title"><b>Silahkan <span class="text-primary">DAFTAR AKUN</span></b></h4>
            </div>
            <div class="card-content">
              <div class="card-body">
                <?php
                if (isset($_POST['daftar'])) {
                  $nama_lengkap = $_POST['nama_lengkap'];
                  $email = $_POST['email'];
                  $password = md5($_POST['password']);
                  $level = $_POST['level'];
                  $sql = "insert into user values('$email','$password','$nama_lengkap','','','','user_default.jpg',''
				      ,'$level')";
                  $query = mysqli_query($koneksi, $sql);
                  if ($query) {
                    header("location:regsukses.php?email=$email");
                  }
                }
                ?>
                <form method="POST" class="form form-vertical">
                  <div class="form-body">
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group has-icon-left">
                          <label for="first-name-icon">Nama Lengkap</label>
                          <div class="position-relative">
                            <input type="text" name="nama_lengkap" class="form-control" placeholder="Ketik nama Anda!" id="first-name-icon" />
                            <div class="form-control-icon">
                              <i class="bi bi-person"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group has-icon-left">
                          <label for="email-id-icon">Email</label>
                          <div class="position-relative">
                            <input type="email" name="email" class="form-control" placeholder="Email" id="email-id-icon" />
                            <div class="form-control-icon">
                              <i class="bi bi-envelope"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group has-icon-left">
                          <label for="mobile-id-icon">Password</label>
                          <div class="position-relative">
                            <input type="password" name="password" class="form-control" placeholder="*******" id="mobile-id-icon" />
                            <div class="form-control-icon">
                              <i class="bi bi-lock"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group has-icon-left">
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
                      </div>
                      <div class="col-12">
                        <div class="form-check">
                          <div class="checkbox mt-2">
                            <input type="checkbox" id="remember-me-v" class="form-check-input" checked />
                            <label for="remember-me-v">Remember Me</label>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 d-flex justify-content-end">
                        <button type="submit" name="daftar" class="btn btn-primary me-1 mb-1">
                          Submit
                        </button>
                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                          Reset
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
                <p class="text-center mt-2">
                  <span>Sudah punya akun?</span>
                  <a href="auth-login.php">
                    <span>Login disini</span>
                  </a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script src="assets/static/js/initTheme.js"></script>

</html>