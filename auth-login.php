<?php
session_start();
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Mazer Admin Dashboard</title>
  <link rel="shortcut icon" href="./assets/compiled/svg/favicon.svg" type="image/x-icon">
  <link rel="stylesheet" href="./assets/compiled/css/app.css">
  <link rel="stylesheet" href="./assets/compiled/css/app-dark.css">
  <link rel="stylesheet" href="./assets/compiled/css/auth.css">
</head>

<body>
  <script src="assets/static/js/initTheme.js"></script>
  <div id="auth">
    <div class="row h-100">
      <div class="col-lg-5 col-12">
        <div id="auth-left">
          <div class="auth-logo">
            <a href="beranda.php"><img src="./assets/compiled/svg/logo.svg" alt="Logo"></a>
          </div>
          <h1 class="auth-title">Log in.</h1>
          <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>
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
          <form method="post">
            <div class="form-group position-relative has-icon-left mb-4">
              <input type="email" name="email" class="form-control form-control-xl" placeholder="Username">
              <div class="form-control-icon">
                <i class="bi bi-person"></i>
              </div>
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
              <input type="password" name="password" class="form-control form-control-xl" placeholder="Password">
              <div class="form-control-icon">
                <i class="bi bi-shield-lock"></i>
              </div>
            </div>
            <div class="form-check form-check-lg d-flex align-items-end">
              <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
              <label class="form-check-label text-gray-600" for="flexCheckDefault">
                Keep me logged in
              </label>
            </div>
            <button type="submit" name="login" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
          </form>
          <div class="text-center mt-5 text-lg fs-4">
            <p class="text-gray-600">Don't have an account? <a href="auth-register.php" class="font-bold">Sign
                up</a>.</p>
            <p><a class="font-bold" href="#">Forgot password?</a>.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">
        </div>
      </div>
    </div>

  </div>
</body>

</html>